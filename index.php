<?php
    require "config.php";
    require "model/model_index.php";
    check_connected();

    $player = new Player_house();
    $user = $player->get_connected_user();

    if(!$user) {
        header("Location: /logout");
        exit;
    }

    $furnitures = $player->get_furnitures_from_connected_user();

    include "view/view_index.php";
?>