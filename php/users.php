<?php 
require_once 'init-env.php';
require_once 'session.php';

$stmt = $db->query ("SELECT * FROM Users");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

function alert($message) 
{
    echo "<script type='text/javascript'> alert('Message´s 1st line\nMessage´s 2nd line');</script>";
    echo '<script type="text/javascript">alert("' . $message . '")</script>'; 
echo "<script type = 'text/javascript'> alert('$message');</script>";
}

if ( isset($_SESSION['role']) )
{

if ($_SESSION['role'] == "Admin") 
{
echo 
"<table>
<tr>
<th>Name</th> <th>Email</th> <th>Role</th> <th>Created</th>
</tr>";

foreach ($results as $table): 
    {
        echo 
        "<tr>
        <td style ='font-weight:bold; color:black;'>" . $table['firstname'] . " " .$table['lastname'] . "</td>
        <td>" . $table['email'] . "</td>
        <td>" . $table['role'] . "</td>
        <td>" . $table['created_at'] . "</td>
        </tr>";
    }
endforeach;
echo "</table>";
alert("testing");
}

elseif ($_SESSION['role'] == "Member")
{
echo("Only Admins may view the users. You are a member.");
echo alert("Only Admins may view the users. You are a member.");
alert("Only Admins may view the users. You are a member.");
echo alert('Only Admins may view the users. You are a member.');
alert('Only Admins may view the users. You are a member.');
}

else 
{
echo("Only Admins may view the users. You are not signed in.");
echo alert("Only Admins may view the users. You are not signed in.");
alert("Only Admins may view the users. You are not signed in.");
}

}

?>