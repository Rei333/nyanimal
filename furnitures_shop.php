<?php
    require "config.php";
    check_connected();
    require_once "model/model_user.php";
    require_once "model/model_furniture.php";
    require_once "model/model_user_furniture.php";

    $furnitures = Furniture::get_all();
    $user = User::get($_SESSION["id"]);

    if(isset($_POST["id_furniture"])) {
        $product = Furniture::get($_POST["id_furniture"]);

        if($product && $user->money >= $product->price) {
            //Tries to get the user's furniture that has a given category
            $user_furniture = $user->get_furniture_from_category($product->category);

            //Check if the user already has a furniture with the same category
            if($user_furniture) {
                $furniture = $user_furniture->get_furniture();

                //Check if the new furniture is the current furniture
                if($furniture->category == $product->category && $furniture->variation == $product->variation) {
                    set_banner_message("Tu possèdes déjà ce meuble.");
                } else {
                    //Buy the new furniture
                    $user->spend_money($product->price);

                    //Replace old furniture with the new furniture
                    $user_furniture->replace($product->id);

                    set_banner_message("Le meuble à bien été acheté !");
                }
            } else {
                //Buy the new furniture
                $user->spend_money($product->price);

                //Insert the new furniture
                User_Furniture::create($user->id, $product->id);

                set_banner_message("Le meuble à bien été acheté !");
            }
        } else {
            set_banner_message("Tu n'as pas assez d'argent pour acheter ce meuble.");
        }
    }

    include "view/view_furnitures_shop.php";
?>