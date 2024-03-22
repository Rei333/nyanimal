<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Boutique de Meuble</title>
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/furnitures_shop.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <a id="tel_exit_button" href="/outside"><button class="danger">Revenir en arrière</button></a>
                <form method="GET">
                    <div id="filter_form">
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
                    <?php foreach($furnitures as $furniture) { ?>
                        <article id="product_<?= $furniture->id ?>" onclick="selected_article(<?= $furniture->id ?>, `<?= $furniture->image ?>`)">
                            <img class="product_img" src="<?= $furniture->image ?>" alt="<?= $furniture->category . " " . $furniture->variation ?>">
                            <div class="tag">
                                <span><?= $furniture->category . " " . $furniture->variation ?></span>
                                <div><?= $furniture->price ?>
                                    <img src="/img/coin.png" alt="pièces">
                                </div>
                            </div>
                        </article>
                    <?php } ?>
                </div>

                <!-- Mobile version of popup confirmation -->
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