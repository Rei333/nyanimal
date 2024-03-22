<?php
    require "config.php";
    require "model/model_user.php";

    if(isset($_POST["pseudo"]) && isset($_POST["password"])) {
        $user = User::get_from_pseudo($_POST["pseudo"]);

        if($user && password_verify($_POST["password"], $user->password)) {
            $_SESSION["id"] = $user->id;
            header("Location: /");
            exit;
        } else {
            set_banner_message("Pseudo ou mot de passe incorrect.");
        }
    }

    include "view/view_connexion.php";
?>