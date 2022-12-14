<?php
    session_start();
    if(!isset($_SESSION['email'])) {
        header("Location: ../login.html");
        throw new Exception("Error Processing Request; No User Log-In", 1);
        exit;
    }
?>