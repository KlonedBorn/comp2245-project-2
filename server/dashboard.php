<?php 
    require_once 'env-config.php';
    require_once(ROOT_PATH . '/dashboard.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href = "styles.css">
    <script type="text/javascript" src="addcontacts.js"></script>
</head>
<body>
    <div class="container">
        <?php 
include ("theme.php");
session_start();
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query ("SELECT * FROM Contacts");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//if ( isset($_SESSION['Users']) ) 
// {
echo 
"<table>
<tr>
<th>Name</th> <th>Email</th> <th>Company</th> <th>Type</th>
</tr>";


foreach ($results as $table): 
    {
        echo 
        "<tr>
        <td>" .$table['title'] . $table['firstname'] . " " .$table['lastname'] . "</td>
        <td>" . $table['email'] . "</td>
        <td>" . $table['company'] . "</td>
        <td>" . $table['type'] . "</td>
        </tr>";
    }
endforeach;
echo "</table>";
// }

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
echo "<script type = 'text/javascript'> alert($message);</script>";
}

?>

 </div>
</body>
</html>