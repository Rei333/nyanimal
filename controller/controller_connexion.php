<?php
    require "config.php";
    require "model/model_connexion.php";

    if(isset($_POST["pseudo"]) && isset($_POST["password"])) {
        $user = get_user_infos($_POST["pseudo"], $db);

        if($user && password_verify($_POST["password"], $user["password"])) {
            $_SESSION["id"] = $user["id"];
            header("Location: /");
            exit;
        } else {
            set_banner_message("Pseudo ou mot de passe incorrect.");
        }
    }
?>