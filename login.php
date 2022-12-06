<?php
include("config.php");
include("dbconfig.php");
session_start();
$email = $_GET['email'];
$emailPassword = $_GET['password'];
$emailCondition = true;
$passwordCondition = true;
$passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{8,}$/";
$emailRegex = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query ("SELECT * FROM Users WHERE email LIKE '%email%'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
if( preg_match($passwordRegex,$emailPassword) )
{
    echo "Password matches pattern";
}
if( preg_match($emailRegex,$email) )
{
    echo "Email matches pattern";
}
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

if ($emailCondition && $passwordCondition) 
{
    foreach ($results as $table):
        if ( ($table['useremail'] === $email) && ($table['password'] === $password) )
        {
            //INSERT WHATEVER SUCCESS STATEMENT OR COMMANDS HERE
        }
    endforeach;
}

?>