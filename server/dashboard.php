<?php 
    require_once 'env-config.php';

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

if ( isset($_GET['buttonValue']) ) 
{
$buttonValue = $_GET['buttonValue'];

if ($buttonValue == 1) 
{
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
}

elseif ($buttonValue == 2) 
{
foreach ($results as $table): 
    {
        if($table['type'] == "Sales Lead") 
        {
        echo 
        "<tr>
        <td>" .$table['title'] . $table['firstname'] . " " .$table['lastname'] . "</td>
        <td>" . $table['email'] . "</td>
        <td>" . $table['company'] . "</td>
        <td>" . $table['type'] . "</td>
        </tr>";
        }
    }
    
endforeach;
echo "</table>";
}

elseif ($buttonValue == 3) 
{
foreach ($results as $table): 
    {
        if($table['type'] == "Support") 
        {
        echo 
        "<tr>
        <td>" .$table['title'] . $table['firstname'] . " " .$table['lastname'] . "</td>
        <td>" . $table['email'] . "</td>
        <td>" . $table['company'] . "</td>
        <td>" . $table['type'] . "</td>
        </tr>";
        }
    }
    
endforeach;
echo "</table>";
}

}

else {echo "No button value found";}
// }

// elseif ($_SESSION['Users']['role'] == "Member")
// {
// alert("Only Admins may view the users. You are a member.");
// }

// else 
// {
// alert("Only Admins may view the users. You are not signed in.");
// }
?>