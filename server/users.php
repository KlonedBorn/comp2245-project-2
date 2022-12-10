<?php 
require_once 'env-config.php';
require_once 'session.php';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query ("SELECT * FROM Users");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
alert("Only Admins may view the users. You are a member.");
}

else 
{
alert("Only Admins may view the users. You are not signed in.");
}

}


function alert($message) 
{
echo "<script type = 'text/javascript'> alert($message);</script>";
}

?>