<?php
    require_once 'init-env.php';
    require_once './session.php';
$stmt = $db->query ("SELECT * FROM Contacts");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $stmt2 = $db->query ("SELECT * FROM Users");
// $results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

if ( isset($_SESSION['email']) ) 
{
echo 
"<table>
<tr>
<th>Name</th> <th>Email</th> <th>Company</th> <th>Type</th> <th></th>
</tr>";

if ( !empty($_GET['buttonValue']) ) 
{
$buttonValue = $_GET['buttonValue'];

if ($buttonValue == 1) 
{
foreach ($results as $table): 
    {
        echo 
        "<tr>
        <td>" . $table['title'] . $table['firstname'] . " " .$table['lastname'] . "</td>
        <td>" . $table['email'] . "</td>
        <td>" . $table['company'] . "</td>";
        if ($table['type'] == "Sales Lead") 
        {
            echo "<td id = 'SalesLead'>" . $table['type'] . "</td>";
        }
        elseif($table['type'] == "Support") 
        {
            echo "<td id = 'Support'>" . $table['type'] . "</td>";
        }
       echo "<td> <a href= php/notes.php?contact=".$table['id']." alt = 'Contact Info Should go here'>View</a> </td> </tr>";
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
        <td id = 'SalesLead'>" . $table['type'] . "</td>
        <td> <a href= php/notes.php?contact=".$table['id']." alt = 'Contact Info Should go here'>View</a> </td> </tr>";
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
        <td id = 'Support'>" . $table['type'] . "</td>
        <td> <a href= php/notes.php?contact=".$table['id']." alt = 'Contact Info Should go here'>View</a> </td> </tr>";
    }
    }
    
endforeach;
echo "</table>";
}

elseif ($buttonValue == 4) 
{
foreach ($results as $table): 
    {
        if($table['assigned_to'] == $_SESSION['id']) 
        {
        echo 
        "<tr>
        <td>" .$table['title'] . $table['firstname'] . " " .$table['lastname'] . "</td>
        <td>" . $table['email'] . "</td>
        <td>" . $table['company'] . "</td>";
        if ($table['type'] == "Sales Lead") 
        {
            echo "<td id = 'SalesLead'>" . $table['type'] . "</td>";
        }
        elseif($table['type'] == "Support") 
        {
            echo "<td id = 'Support'>" . $table['type'] . "</td>";
        }
       echo "<td> <a href =php/notes.php?contact=".$table['id']." alt = 'Contact Info Should go here'>View</a> </td> </tr>";

        }
    }
    
endforeach;
echo "</table>";
}

}

else {echo "No button value found";}

}

// elseif ($_SESSION['Users']['role'] == "Member")
// {
// alert("Only Admins may view the users. You are a member.");
// }

// else 
// {
// alert("Only Admins may view the users. You are not signed in.");
// }
?>