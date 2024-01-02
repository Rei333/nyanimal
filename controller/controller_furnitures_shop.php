<?php
    require "config.php";
    require "model/model_furnitures_shop.php";
    check_connected();

    $furnitures = get_all_furnitures($db);
    $user = get_user($_SESSION["id"], $db);

    if(isset($_POST["id_furniture"])) {
        $product = get_furniture($_POST["id_furniture"], $db);

        if($user["money"] >= $product["price"]) {
            //Tries to get the user's furniture that has a given category
            $user_furniture = get_furniture_from_category($_SESSION["id"], $product["category"], $db);

            //Check if the user already has a furniture with the same category
            if($user_furniture) {
                //Check if the new furniture is the current furniture
                if($user_furniture["category"] && $user_furniture["variation"] == $product["variation"] && $product["variation"]) {
                    set_banner_message("Tu possèdes déjà ce meuble.");
                } else {
                    //Buy the new furniture
                    spend_money($product["price"], $_SESSION["id"], $db);

                    //Replace old furniture with the new furniture
                    update_user_furniture($_POST["id_furniture"], $user["id"], $user_furniture["furniture_id"], $db);

                    set_banner_message("Le meuble à bien été acheté !");
                }
            } else {
                //Buy the new furniture
                spend_money($product["price"], $_SESSION["id"], $db);

                //Insert the new furniture
                insert_new_user_furniture($_SESSION["id"], $_POST["id_furniture"], $db);

                set_banner_message("Le meuble à bien été acheté !");
            }
        } else {
            set_banner_message("Tu n'as pas assez d'argent pour acheter ce meuble.");
        }
    }
?>