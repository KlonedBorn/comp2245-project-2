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
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href = "styles.css">
    <script type="text/javascript" src="addusers.js"></script>
</head>
<body>
    <div class="container">
        <?php include ("theme.php");?>
        <div id="form1">
            <h1>New User</h1>
            <form id="newuser">
                <label> Firstname </label><br>
                <input type="text" name="firstname" id="firstname"><br>
                <label> Lastname </label><br>
                <input type="text" name="lastname" id="lastname"><br>
                <label> Email </label><br>
                <input type="email" name="email" id="email" placeholder="alright@gmail.com"><br><br>
                <label> Password </label><br>
                <input type="text" name="password" id="password"><br>
                <label> Role </label><br>
                <select name ="role" id ="role">
                    <option value ="Admin">Admin</option>
                    <option selected value = "Member">Member</option>
                </select>
                <br>
                <!--<input type="text" name="role" id="role"><br> -->

                <button type="submit" name="addBtn" id="addBtn"> Submit </button>
            </form>
            <div id="result"></div>
        </div>
    </div>
</body>
</html>

<?php 
//include("env-config.php");
if (isset($_POST['addBtn'])) 
{
$firstname = $_GET['fname'];
$lastname = $_GET['lname'];
$email = $_GET['email'];
$emailPassword = $_GET['password'];
$role = $_GET['role'];

$passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{8,}$/";
$emailRegex = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$totalChecks = false;


if ($totalChecks == true)
{
    $sql = "INSERT INTO Users (firstname, lastname, email, password, role)
    VALUES ('$firstname', '$lastname', '$email', '$password', '$role')";
        
}

else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>