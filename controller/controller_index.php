<?php
    require "config.php";
    require "model/model_index.php";
    check_connected();

    $user = get_connected_user($db);

    if(!$user) {
        header("Location: /logout");
        exit;
    }

    $furnitures = get_furnitures_from_connected_user($db);
?>