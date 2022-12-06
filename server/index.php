<!-- 
    Created by Deondre Mayers.
    Edited by Kyle King
 -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href = "styles.css">
        <script type="text/javascript" src="index.js"></script>
    </head>
    <body>
        <div class="container">
            <?php include 'header.php' ?>
            <div id="login-form">
                <h1 id="login-head">Login</h1>
                <label> Email: </label>
                <br>
                <input type="email" name="useremail" id="email">
                <br>
                <label> Password: </label>
                <br>
                <input type="text" name="userpassword" id="password">
                <br><br>
                <button id="loginbtn" > Login </button>
                <span id="error"></span>
            </div>
        </div>
    </body>
</html>