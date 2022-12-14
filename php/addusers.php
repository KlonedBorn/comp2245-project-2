<?php 

require_once 'init-env.php';
require_once 'session.php';

function alert($message)  
{
    echo "<script type = 'text/javascript'> alert('".$message."');</script>";
}

if ( isset($_SESSION['role']) )
{

if ($_SESSION['role'] == "Admin") 
{

    $firstname = $_GET['fname'];
    $lastname = $_GET['lname'];
    $email = $_GET['email'];
    $password = $_GET['password'];
    $role = $_GET['role'];

    $stmt = $db->query ("SELECT * FROM Users");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $emailCheck = false;
    $passwordCheck = false;
    $nameCheck = false;
    $totalChecks = false;

    foreach($results as $table): 
    {
        if ($email == $table['email']) 
        {
            $emailCheck = false;
            echo "Email already in use.";
            // alert("Email already in use.");
            exit;
        }
    } 
    endforeach;

    if( preg_match($nameRegex, $firstname)  && preg_match($nameRegex, $lastname) ) {$nameCheck = true;}
    if( preg_match($emailRegex,$email) ) {$emailCheck = true;}
    if( preg_match($passwordRegex,$password) ) {$passwordCheck = true; $password = password_hash($password,PASSWORD_BCRYPT);}
    if ($emailCheck && $passwordCheck && $nameCheck) {$totalChecks = true;}
    
    if ($totalChecks) 
    {

    $sql = "INSERT INTO Users (firstname, lastname, email, password, role)
        VALUES ('$firstname', '$lastname', '$email', '$password', '$role')";    
    if ($db->query($sql) == TRUE ) 
    {
        echo "User successfully created.";
        // alert("User successfully created.");
    }

    else 
    {
        echo "Error:" . $sql . "<br>" . $db->error;
        // alert("Error:" . $sql . "<br>" . $db->error);
    }

    }

}

elseif ($_SESSION['role'] == "Member") {echo "Only Admins may create users.";}
}
?>