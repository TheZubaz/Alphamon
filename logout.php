<?php
    session_start();
    require_once('./classes/classes.php');
    $_SESSION["account"] = null;
    header('Location: '.$GLOBALS["URl"]);exit;
?>
