<?php
    require "config.php";

    unset($_SESSION["id"]);
    header("Location: /connexion");
?>