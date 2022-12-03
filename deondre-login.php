// Copyright 2022 Kyle King
// 
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
// 
//     http://www.apache.org/licenses/LICENSE-2.0
// 
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

<?php
	if(isset($_SESSION['logined_user'])){
        header("Location:http://localhost/finalproject/dashboard.php" );
        
    }
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href = "styles.css">
        <script type="text/javascript" src="login.js"></script>
        
    </head>
    <body>
        <div class="container">
            <header>
                <img src = "https://img.freepik.com/free-vector/cute-dolphin-attractions-sea-cartoon-illustration_138676-2751.jpg?w=740&t=st=1670093975~exp=1670094575~hmac=46c6a2f8fd7a2636f17f5fb58e415730249e834665cb658d302f2470f3ce8ad9">
                <h1> Dolphin CRM </h1>
            </header>
            <div id="login-form">
                <h1 id="login-head">Login</h1>
                <form id="login" method="post" onsubmit="return Vali()">
                    <label> Email: </label>
                    <br>
                    <input type="email" name="useremail" id="email">
                    <br>
                    <label> Password: </label>
                    <br>
                    <input type="text" name="userpassword" id="password">
                    <br><br>
                    <button type="submit" name="loginbtn" id="loginbtn"> Login </button>
                </form>
                <span id="error"></span>
            </div>
        </div>
    </body>
</html>
<?php if (isset($_POST['loginbtn'])){
        include('userlogin.php');
    }