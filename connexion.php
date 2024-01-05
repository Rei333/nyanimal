<?php
    require "config.php";
    require "model/model_connexion.php";

    if(isset($_POST["pseudo"]) && isset($_POST["password"])) {
        $user = new Users($_POST["pseudo"]);
        $info = $user->get_user_infos();

        if($info && password_verify($_POST["password"], $info["password"])) {
            $_SESSION["id"] = $info["id"];
            header("Location: /");
            exit;
        } else {
            set_banner_message("Pseudo ou mot de passe incorrect.");
        }
    }

    include "view/view_connexion.php";
?>