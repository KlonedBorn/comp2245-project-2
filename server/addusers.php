<?php session_start();

    require_once 'env-config.php';
    require_once(ROOT_PATH . '/addusers.php');
    // if (!isset($_SESSION['logined_user']))
    // {
    // header('Location: userlogout.php');
    // }
    // if($_SESSION['logined_user']!='admin@project2.com'){
    //      $_SESSION["denied"]="denied";
    //     header("Location: dashboard.php");
    // }    
    ?>
<?php 
include("env-config.php");
$firstname = $_GET['fname'];
$lastname = $_GET['lname'];
$email = $_GET['email'];
$emailPassword = $_GET['password'];
$role = $_GET['role'];
$passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{8,}$/";
$emailRegex = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query ("SELECT * FROM Users");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$emailCheck = true;
$passwordCheck = false;
$totalChecks = false;
foreach($results as $table): 
    {
        if ($email == $table['email']) 
        {
            $emailCheck = false;
            echo "Email already in use.";
            break;
        }
    }
endforeach;
if ('l' == 'l') {}
if ($emailCheck) 
{
    $totalchecks = true;
}
{
    $sql = "INSERT INTO Users (firstname, lastname, email, password, role)
    VALUES ('$firstname', '$lastname', '$email', '$password', '$role')";    
}
if ($conn->query($sql) == TRUE ) 
{
    echo "User successfully created.";
    // alert("User successfully created.");
}
else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
    // alert(("Error:" . $sql . "<br>" . $conn->error));
}

// function alert($message) 
// {
// echo "<script type = 'text/javascript'> alert($message);</script>";
// }
?>