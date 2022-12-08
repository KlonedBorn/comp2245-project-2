<?php session_start();

    require_once 'env-config.php';
    require_once(ROOT_PATH . '/addcontacts.php');
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $stmt = $conn->query ("SELECT * FROM Contacts");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // if (!isset($_SESSION['logined_user']))
    // {
    // header('Location: userlogout.php');
    // }
    // if($_SESSION['logined_user']!='admin@project2.com'){
    //      $_SESSION["denied"]="denied";
    //     header("Location: dashboard.php");
    // }    

//include("env-config.php");

$buttonValue = 0;
if (isset($_GET['buttonValue'])) //might need to be post
{
    $buttonValue = 1;
}

if ($buttonValue == 1) 
{
$title = $_GET['title'];
$firstname = $_GET['fname'];
$lastname = $_GET['lname'];
$email = $_GET['email'];
$telephone = $_GET['telephone'];
$company = $_GET['company'];
$assigned = $_GET['assigned'];
$assignedValue =0;
$type = $_GET['type'];

foreach ($results as $employee):
    {
     if ( ($assigned == ($employee['firstname']) . " " . $employee['lastname']) ) 
     {
        $assignedValue = $employee['id'];
     }
    }
 endforeach;

$emailRegex = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$totalChecks = false;


// if ($totalChecks == true)
{
    $sql = "INSERT INTO Contacts (title, firstname, lastname, email, telephone, company, assigned_to, type)
    VALUES ('$title', '$firstname', '$lastname', '$email', '$telephone', '$company', '$assignedValue', '$type')";     
}

if ($conn->query($sql) == TRUE ) 
{
    echo "Contact successfully created.";
   
}

else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}



?>$message);< /script>";
}
?>