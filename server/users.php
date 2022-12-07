<?php 
require_once 'env-config.php';
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
        <?php 
include ("theme.php");
session_start();
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query ("SELECT * FROM Users");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//if ($_SESSION['Users']['role'] == "Admin") 
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
        <td>" . $table['firstname'] . " " .$table['lastname'] . "</td>
        <td>" . $table['email'] . "</td>
        <td>" . $table['role'] . "</td>
        <td>" . $table['created_at'] . "</td>
        </tr>";
    }
endforeach;
echo "</table>";
}

// elseif ($_SESSION['Users']['role'] == "Member")
// {
// alert("Only Admins may view the users. You are a member.");
// }

// else 
// {
// alert("Only Admins may view the users. You are not signed in.");
// }


function alert($message) 
{
echo "<script type = 'text/javascript'> alert($message);< /script>";
}

?>

 </div>
</body>
</html>