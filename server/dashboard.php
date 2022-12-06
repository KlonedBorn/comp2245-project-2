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
<table>
                    <thead>
                        <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Company</th>
                        <th>Type</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <td>Mr. Micheal Scott</td>
                        <td>micheal.scott@paper.co</td>
                        <td>The Paper Company</td>
                        <td class="rounded">Sales Lead</td>
                        // AJAX request here.
                        <td><a href="#">View</a></td> -->
                    </tbody>
                </table>