<?php session_start();
    require_once 'dbconfig.php';
    if (!isset($_SESSION['logined_user']))
    {
    header('Location: userlogout.php');
    }
    if($_SESSION['logined_user']!='admin@project2.com'){
         $_SESSION["denied"]="denied";
        header("Location: dashboard.php");
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href = "styles.css">
        <script type="text/javascript" src="signup.js"></script>
    </head>
    <body>
        <div class="container">
            <header>
                <img src = "https://img.freepik.com/free-vector/cute-dolphin-attractions-sea-cartoon-illustration_138676-2751.jpg?w=740&t=st=1670093975~exp=1670094575~hmac=46c6a2f8fd7a2636f17f5fb58e415730249e834665cb658d302f2470f3ce8ad9">
                <h1>Dolphin CRM</h1>
            </header>
            <div class = "sidenav">
                <ul>
                    <div class = "home">
                        <img src="MdiHome.svg">
                        <a href="dashboard.php">Home</a> 
                    </div>
                    <div class = "adduser">
                        <img src = "IcBaselineAddCircle.svg">
                        <a href="addusers.php">Add User</a> 
                    </div>
                    <div class = "newissue">
                        <img src = "MdiAccountPlus.svg">
                        <a href="createissue.php">New Issue</a> 
                    </div>
                    <div class = "logout">
                        <img src = "MdiPower.svg">
                        <a href="userlogout.php">Logout</a>
                    </div>
                </ul>  
            </div>
            <div id="form1">
                <h1>New User</h1>
                <form id="newuser">
                    <label> Firstname </label><br>
                    <input type="text" name="firstname" id="firstname"><br>
                    <label> Lastname </label><br>
                    <input type="text" name="lastname" id="lastname"><br>
                    <label> Password </label><br>
                    <input type="text" name="password" id="password"><br>
                    <label> Email </label><br>
                    <input type="email" name="email" id="email"><br><br>
                    <button type="submit" name="form1btn" id="form1btn"> Submit </button>
                </form>
                <div id="result"></div>
            </div>
        </div>
    </body>
</html>