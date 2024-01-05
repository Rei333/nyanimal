<?php
    require "config.php";
    require "model/model_furnitures_shop.php";
    check_connected();

    $furniture_object = new Furniture_shop();
    $user_object = new User_furniture($_SESSION["id"]);
    $furnitures = $furniture_object->get_all_furnitures();
    $user = $user_object->get_user();

    if(isset($_POST["id_furniture"])) {
        $product = $furniture_object->get_furniture($_POST["id_furniture"]);

        if($user["money"] >= $product["price"]) {
            //Tries to get the user's furniture that has a given category
            $user_furniture = $user_object->get_furniture_from_category($product["category"]);

            //Check if the user already has a furniture with the same category
            if($user_furniture) {
                //Check if the new furniture is the current furniture
                if($user_furniture["category"] && $user_furniture["variation"] == $product["variation"] && $product["variation"]) {
                    set_banner_message("Tu possèdes déjà ce meuble.");
                } else {
                    //Buy the new furniture
                    $user_object->spend_money($product["price"]);

                    //Replace old furniture with the new furniture
                    $user_object->update_user_furniture($_POST["id_furniture"], $user_furniture["furniture_id"]);

                    set_banner_message("Le meuble à bien été acheté !");
                }
            } else {
                //Buy the new furniture
                $user_object->spend_money($product["price"]);

                //Insert the new furniture
                $user_object->insert_new_user_furniture($_POST["id_furniture"]);

                set_banner_message("Le meuble à bien été acheté !");
            }
        } else {
            set_banner_message("Tu n'as pas assez d'argent pour acheter ce meuble.");
        }
    }

    include "view/view_furnitures_shop.php";
?>