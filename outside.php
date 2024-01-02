<!DOCTYPE html>

<?php
    require "config.php";
    check_connected();
?>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Nyaniville</title>
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/outside.css">
    </head>

    <body>
        <?php require "header.php"; ?>

        <main id="game">
            <a href="/"><button class="danger">Rentrer à la maison</button></a>
            <div id="sky">
                <a href="" class="batiment"><div>supermarché</div></a>
                <a href="/furnitures_shop" class="batiment"><div>boutique meubles</div></a>
                <a href="" class="batiment"><div>boutique mode</div></a>
                <a href="" class="batiment"><div>casino</div></a>
                <a href="" class="batiment"><div>entreprise</div></a>
            </div>
            <div id="floor"></div>
        </main>

        <?php require "footer.php" ?>
    </body>
</html>