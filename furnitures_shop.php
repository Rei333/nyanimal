<!DOCTYPE html>

<?php
    require "config.php";
    check_connected();

    $stmt = $db->prepare("SELECT * FROM nyanimal.furnitures");
    $stmt->execute();
    $furniture = $stmt->fetch();

    $req = $db->prepare("SELECT money FROM nyanimal.users WHERE id=?");
    $req->execute(array($_SESSION["id"]));
    $user = $req->fetch();

    if(isset($_POST["id_furniture"])) {
        $request = $db->prepare("SELECT * FROM nyanimal.furnitures WHERE id=?");
        $request->execute(array($_POST["id_furniture"]));
        $product = $request->fetch();

        if($user["money"] >= $product["price"]) {
            $verification = $db->prepare("SELECT users_furnitures.id, category, variation FROM users_furnitures INNER JOIN furnitures ON users_furnitures.furniture_id = furnitures.id WHERE user_id=? AND category=?");
            $verification->execute(array($_SESSION["id"], $product["category"]));
            $user_furniture = $verification->fetch();

            //Check if the user already have a furniture with the same category
            if($user_furniture) {
                //Check if the new furniture is the current furniture
                if($user_furniture["category"] && $user_furniture["variation"] == $product["variation"] && $product["variation"]) {
                    set_banner_message("Tu possèdes déjà ce meuble.");
                } else {
                    //Buy the new furniture
                    $spend=$db->prepare("UPDATE users SET money = money - ? WHERE id= ?");
                    $spend->execute(array($product["price"], $_SESSION["id"]));

                    //Replace old furniture id with the new id
                    $new=$db->prepare("UPDATE users_furnitures SET furniture_id = ? WHERE id=?");
                    $new->execute(array($_POST["id_furniture"], $user_furniture["id"]));

                    set_banner_message("Le meuble à bien été acheté !");
                }
            } else {
                //Buy the new furniture
                $spend=$db->prepare("UPDATE users SET money = money - ? WHERE id= ?");
                $spend->execute(array($product["price"], $_SESSION["id"]));

                //Insert the new furniture
                $new=$db->prepare("INSERT INTO users_furnitures (user_id, furniture_id) VALUES (?, ?);");
                $new->execute(array($_SESSION["id"], $_POST["id_furniture"]));

                set_banner_message("Le meuble à bien été acheté !");
            }
        } else {
            set_banner_message("Tu n'as pas assez d'argent pour acheter ce meuble.");
        }
    }
?>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Boutique de Meuble</title>
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/furnitures_shop.css">
        <script src="js/furnitures_shop.js" defer></script>
    </head>

    <body>
        <?php require "header.php"; ?>

        <main id="game">
            <section id="furniture_selected">
                <a href="/outside"><button class="danger">Revenir en arrière</button></a>
                <div id="selected_product">
                    <img src="">
                    <form method="POST" id="button">
                        <input type="hidden" name="id_furniture">
                        <button onclick="return confirm('Veux-tu vraiment acheter ce meuble ?')">Acheter</button>
                    </form>
                </div>

            </section>

            <section id="products">
                <form method="GET">
                    <div>
                        <div>
                            <label for="room">Pièce :</label>
                            <select id="room">
                                <option value="all">Tout</option>
                                <option value="living_room">Salon</option>
                                <option value="etc">etc</option>
                            </select>
                        </div>

                        <div>
                            <label for="sort">Trier par :</label>
                            <select id="sort">
                                <option value="ascending_p">Prix croissant</option>
                                <option value="decreasing_p">Prix décroissant</option>
                                <option value="ascending_n">Nom croissant</option>
                                <option value="decreasing_n">Nom décroissant</option>
                            </select>
                        </div>

                        <div>
                            <label for="type">Type de meuble :</label>
                            <select id="type">
                                <option value="all">Tout</option>
                                <option value="wall">Tapisserie</option>
                                <option value="floor">Sol</option>
                                <option value="table">Table</option>
                            </select>
                        </div>
                    </div>

                    <input type="submit" value="Filtrer">
                </form>

                <div id="shop">
                    <?php while($furniture) { ?>
                        <article id="product_<?= $furniture['id'] ?>" onclick="selected_article(<?= $furniture['id'] ?>, `<?= $furniture['image'] ?>`)">
                            <img class="product_img" src="<?= $furniture['image'] ?>" alt="<?= $furniture["category"] . " " . $furniture["variation"] ?>">
                            <div class="tag">
                                <span><?= $furniture["category"] . " " . $furniture["variation"] ?></span>
                                <div><?= $furniture["price"] ?>
                                    <img src="/img/coin.png" alt="pièces">
                                </div>
                            </div>
                        </article>
                        <?php $furniture = $stmt->fetch();
                        $i++;
                    } ?>
                </div>

                <div id="tel_selected_product">
                    <img src="">
                    <form method="POST" id="tel_button">
                        <input type="hidden" name="id_furniture">
                        <div>
                            <button onclick="return confirm('Veux-tu vraiment acheter ce meuble ?')">Acheter</button>
                            <button onclick="close_popup(); return false" class="danger">Annuler</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>

        <?php require "footer.php" ?>
    </body>
</html>