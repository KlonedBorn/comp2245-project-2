<?php
session_start();

$host = 'localhost';
$username = 'admin@project2.com';
$password ='password123';
$dbname = 'dolphin_crm';
$email = $_GET['email'];
$emailPassword = $GET['password'];
$emailCondition = true;
$passwordCondition = true;
$passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{8,}$/";
$emailRegex = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if(empty($_POST['email'])|| !preg_match ($emailRegex, $_POST['email'])){
    print("Please enter the correct format for a email");
    $emailCondition = false;

}else{
    $email = $_POST['email'];
}

if(empty($_POST['password'])|| !preg_match ($passwordRegex, $_POST['password'])){
   if ($_POST ['password123'] === "password123"){
    $password = $_POST['password'];
   }else{
    print("Please enter the correct password");
    $passwordCondition = false;
   }
}else {
$password = $_POST['password'];
    if ($password !== "password123"){
        $password =  password_hash($password, PASSWORD_DEFAULT);
    }
}
?>