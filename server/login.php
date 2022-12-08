<?php
// Created by Julian Piper.
// Edited by Kyle King & Dominic Olukoga.
require_once 'env-config.php';
session_start();
$email = $_GET['email'];
$emailPassword = $_GET['password'];
$passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{8,}$/";
$emailRegex = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if( preg_match($passwordRegex,$emailPassword) && preg_match($emailRegex,$email) )
{
    $stmt = $conn->query ("SELECT * FROM Users WHERE email LIKE '%$email%'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if( !empty($results[0]) ){
        $findps=$conn->query("SELECT DISTINCT password FROM Users WHERE email='$email'");
        $ps= $findps->fetchAll(PDO::FETCH_ASSOC);
        $hps = (isset($ps[0]['password']))? $ps[0]['password'] : null;
        if(hash_equals($hps,crypt($emailPassword,$hps))){
            $find=$conn->query("SELECT * FROM Users WHERE password='$hps' AND email='$email'");
            $resultsf= $find->fetch(PDO::FETCH_ASSOC);
            if(isset($resultsf)){
                $_SESSION['logined_user']=$resultsf['email'];
                $_SESSION['firstname']=$resultsf['firstname'];
                $_SESSION['lastname']=$resultsf['lastname'];
                $_SESSION['user_id']=$resultsf['id'];
                if(isset($_SESSION['logined_user'])){
                    $success_msg = array(
                        'status' => 200,
                        'message' => "User succesfully logged in"
                    );
                    echo json_encode($success_msg);
                }
            }
        }else{
            $error_msg = array(
                'status' => 401,
                'message' => "Login attempt denied. Password incorrect"
            );
            echo json_encode($error_msg);
        }
      
    } else{
        $error_msg = array(
            'status' => 401,
            'message' => "Login attempt denied. Email doesn't exist"
        );
        echo json_encode($error_msg);
    }
}
else{
    $error_msg = array(
        'status' => 422,
        'message' => "Password or Email is malformed. Doesn't match pattern"
    );
    echo json_encode($error_msg);
}
?>