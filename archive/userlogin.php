<?php session_start();
require 'dbconfig.php';
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $useremail= filter_input(INPUT_POST,"useremail",FILTER_SANITIZE_EMAIL); 
    $userpassword= filter_input(INPUT_POST,"userpassword",FILTER_SANITIZE_STRING);
    $useremail= filter_var($useremail,FILTER_VALIDATE_EMAIL);
    $findps=$conn->query("SELECT DISTINCT password FROM Users WHERE email='$useremail'");
    $ps= $findps->fetchAll(PDO::FETCH_ASSOC);
    $hps = (isset($ps[0]['password']))? $ps[0]['password'] : null;
    if(hash_equals($hps,crypt($userpassword,$hps))){
        $find=$conn->query("SELECT * FROM Users WHERE password='$hps' AND email='$useremail'");
        $resultsf= $find->fetch(PDO::FETCH_ASSOC);
        if(isset($resultsf)){
            $_SESSION['logined_user']=$resultsf['email'];
            $_SESSION['firstname']=$resultsf['firstname'];
            $_SESSION['lastname']=$resultsf['lastname'];
            $_SESSION['user_id']=$resultsf['id'];
            if(isset($_SESSION['logined_user'])){
            header("Location:dashboard.php" );
            }
        }
    }else{
        echo "<p id=\'loginerror\'>Login Failed. Invalid Email-address or Password</p>";
    }
?>
<!-- 
// Code for handling form validation.
// if(empty($_POST['useremail']) || !preg_match ($emailRegex, $_POST['useremail'])){
//     print("Please enter the correct format for a email");
//     $emailCondition = false;

// }
// else{
//     $email = $_POST['useremail'];
// }

// if(empty($_POST['password']) || !preg_match ($passwordRegex, $_POST['password'])){
//    if ($_POST ['password123'] === "password123"){
//     $password = $_POST['password'];
//    }else{
//     print("Please enter the correct password");
//     $passwordCondition = false;
//    }
// }
// else {
// $password = $_POST['password'];
//     if ($password !== "password123"){
//         $password =  password_hash($password, PASSWORD_DEFAULT);
//     }
// }
 -->