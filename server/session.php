<?php
    require_once 'env-config.php';
    session_start();
    if(isset($_SESSION['logined_user'])) 
        echo 200;
    else 
        echo 404; 
?>