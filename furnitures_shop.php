<!DOCTYPE html>

<?php
    require "config.php";
    check_connected();
?>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Jeu</title>
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/furnitures_shop.css">
    </head>

    <body>
        <?php require "header.php"; ?>

        <main id="game">
            <section id="furniture_selected">

            </section>

            <section id="products">
                <form action="GET">
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

                    <input type="submit" value="Appliquer">
                </form>

                <div id="shop">
                    <article>
                        <div class="img"></div>
                        <div class="tag">
                            <span>Table en granit rouge</span>
                            <div>120
                                <img src="/img/coin.png" alt="pièces">
                            </div>
                        </div>
                    </article>
                </div>
            </section>
        </main>

        <?php require "footer.php" ?>
    </body>
</html>