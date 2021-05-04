<?php
    error_reporting(E_ERROR | E_PARSE);
    session_start();
    $_SESSION["logged"] = False;
    session_destroy();
    header("Location: login.php")
?> 