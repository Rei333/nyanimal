<?php
    session_start();
    require ".env.php";
    require "function.php";

    $db = new PDO("mysql:host=".$dbhost."; dbname=".$dbname, $dbuser, $dbpasswd);
?>