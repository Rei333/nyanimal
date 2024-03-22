<?php
    require "config.php";
    require_once "model/model_user.php";
    require_once "model/model_user_furniture.php";
    check_connected();

    $user = User::get($_SESSION["id"]);

    if(!$user) {
        header("Location: /logout");
        exit;
    }

    $furnitures = $user->get_furnitures();

    include "view/view_index.php";
?>