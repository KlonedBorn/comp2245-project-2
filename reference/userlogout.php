<?php
if (!isset($_SESSION))
  {
    session_start();
  }
    session_start();
    $_SESSION = array();
    session_destroy();
        header("Location: index.php");
?>