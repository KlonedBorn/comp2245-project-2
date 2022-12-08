<?php
    require_once 'env-config.php';
    require_once(ROOT_PATH . '/userlogout.php');
if (!isset($_SESSION))
  {
    session_start();
  }
    session_start();
    $_SESSION = array();
    session_destroy();
    header("Location: index.php");
?>