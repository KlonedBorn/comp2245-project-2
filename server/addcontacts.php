<?php session_start();

    require_once 'env-config.php';
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $stmt = $conn->query ("SELECT * FROM Users");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href = "../public/css/styles.css">
    <script type="text/javascript" src="../public/js/addcontacts.js"></script>
</head>
<body>
    <div class="container">
        <?php include ("theme.php");?>
        <div id="form1">
            <h1>New User</h1>
            <form id="newuser">
            <label> Title </label><br>
                <select name ="title" id ="title">
                    <option value = "Mr.">Mr.</option>
                    <option value = "Ms.">Ms.</option>
                    <option value = "Mrs.">Mrs.</option>
                </select>
                <br>
                <label> Firstname </label><br>
                <input type="text" name="firstname" id="firstname"><br>
                <label> Lastname </label><br>
                <input type="text" name="lastname" id="lastname"><br>
                <label> Email </label><br>
                <input type="email" name="email" id="email"><br><br>
                <label> Telephone </label><br>
                <input type="text" name="telephone" id="telephone"><br>
                <label> Company </label><br>
                <input type="text" name="company" id="company"><br>
                <label> Type </label><br>
                <select name ="type" id ="type">
                    <option value = "Sales Lead">Sales Lead</option>
                    <option value = "Support">Support</option>
                </select>
                <br>
                <label> Assigned To </label><br>
                <select name ="assigned" id ="assigned">
                    <?php 
                    foreach ($results as $employee):
                       {
                        echo "<option value =" . $employee['firstname'] . " " .$employee['lastname'] .">" . $employee['firstname'] . " " .$employee['lastname'] . "</option>";
                       }
                    endforeach;
                    ?>
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
$title = $_GET['title'];
$firstname = $_GET['fname'];
$lastname = $_GET['lname'];
$email = $_GET['email'];
$telephone = $_GET['telephone'];
$company = $_GET['company'];
$assigned = $_GET['assigned'];
$assignedValue;

foreach ($results as $employee):
    {
     if ( ($assigned == ($employee['firstname']) + " " + $employee['lastname']) ) 
     {
        $assignedValue = $employee['id'];
     }
    }
 endforeach;

$emailRegex = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$totalChecks = false;


if ($totalChecks == true)
{
    $sql = "INSERT INTO Users (title, firstname, lastname, email, telephone, company, assigned_to)
    VALUES ('$title', '$firstname', '$lastname', '$email', '$telephone', '$company', '$assignedValue')";     
}

if ($conn->query($sql) == TRUE ) 
{
    echo "Contact successfully created";
}

else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>