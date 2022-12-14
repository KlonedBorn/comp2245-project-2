<?php
    require_once 'init-env.php';
    header('Content-Type: application/json; charset=utf-8');

    // // if (isset($_SESSION['email'])) 
    // {
        // code to change
    //     exit;
    // }

    if(isset($_GET['email']) && isset($_GET['password'])){
        $email = $_GET['email'];
        $pswd = $_GET['password'];
        if( preg_match($emailRegex,$email) && preg_match($passwordRegex,$pswd) ) {
            $sqlres = $db->query("SELECT id,firstname,lastname,role,email,password FROM Users WHERE email='$email'");
            $user = $sqlres->fetch(PDO::FETCH_ASSOC);
            if( $user && password_verify($pswd,$user['password'])) {
                session_start();
                
                $_SESSION['email']=$user['email'];
                $_SESSION['firstname']=$user['firstname'];
                $_SESSION['lastname']=$user['lastname'];
                $_SESSION['id']=$user['id'];
                $_SESSION['role']=$user['role'];
                if(isset($_SESSION['email'])) {
                    $response = array(
                        'status' => 200,
                        'message' => 'Login attemp succesful',
                        'session-id' => session_id()
                    );
                    echo json_encode($response);
                }
            }
            else {
                // Condition - Email doesn't exist or Password denied.
                $response = array(
                    'status' => 404,
                    'message' => 'User not found or password incorrect'
                );
                echo json_encode($response);
            }
        }
        else {
            // Condition - Email or Password doesn't match regex pattern.
            $response = array(
                'status' => 400,
                'message' => 'Email or password is illegally formatted'
            );
            echo json_encode($response);
        }
    } else {
        // Condition - Email or Password not set
        $response = array(
            'status' => 401,
            'message' => 'Email or password url parameter malformed'
        );
        echo json_encode($response);
    }
?>