<?php session_start();

    require_once 'env-config.php';
    // if (!isset($_SESSION['logined_user']))
    // {
    // header('Location: userlogout.php');
    // }
    // if($_SESSION['logined_user']!='admin@project2.com'){
    //      $_SESSION["denied"]="denied";
    //     header("Location: dashboard.php");
    // }    
    
//include("env-config.php");
$firstname = $_GET['fname'];
$lastname = $_GET['lname'];
$email = $_GET['email'];
$telephone = $_GET['title'];
$title = $_GET['title'];

$passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{8,}$/";
$emailRegex = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $title);
$totalChecks = false;


if ($totalChecks == true)
{
    $sql = "INSERT INTO Users (firstname, lastname, email, telephone, title)
    VALUES ($)";
        
}
?>