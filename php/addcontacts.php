<?php 
    require_once 'init-env.php';
    require_once 'session.php';
    $stmt = $db->query ("SELECT * FROM Users");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
if (isset($_SESSION['email']))
{
$buttonValue = 0;
if (isset($_GET['buttonValue'])) //might need to be post
{
    $buttonValue = $_GET['buttonValue'];
}

if ($buttonValue == 1) 
{
    $title = $_GET['title'];
    $firstname = $_GET['fname'];
    $lastname = $_GET['lname'];
    $email = $_GET['email'];
    $phone = $_GET['telephone'];
    $company = $_GET['company'];
    $assigned = $_GET['assigned'];
    $assignedValue = 0;
    $type = $_GET['type'];
    $createdBy = $_SESSION['id'];

    $emailCheck = false;
    $nameCheck = false;
    $phoneCheck = false;
    $totalChecks = false;

    foreach ($results as $employee): 
    {
        if ( ($assigned == ($employee['firstname'] . " " . $employee['lastname']) ) ) 
        {
            $assignedValue = $employee['id'];
        }
    }
    endforeach;

    if( preg_match($nameRegex, $firstname)  && preg_match($nameRegex, $lastname) ) {$nameCheck = true;}
    if( preg_match($emailRegex,$email) ) {$emailCheck = true;}
    if( preg_match($phoneRegex,$phone) ) {$phoneCheck = true;}
    
    if  ($emailCheck && $phoneCheck && $nameCheck) {$totalChecks = true;}

    if ($totalChecks)
    {
        $sql = "INSERT INTO Contacts (title, firstname, lastname, email, telephone, company, assigned_to, type, created_by)
        VALUES ('$title', '$firstname', '$lastname', '$email', '$phone', '$company', '$assignedValue', '$type', '$createdBy' )";     
        if ($db->query($sql) == TRUE ) 
        {
            echo "Contact successfully created.";
        }
        else 
        {
            echo ("Error: " . $sql . "<br>" . $db->error);
        }
    }

    else {echo "One of the fields was entered incorrectly";}
}
}
?>