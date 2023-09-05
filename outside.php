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
        <link rel="stylesheet" href="css/outside.css">
    </head>

    <body>
        <?php require "header.php"; ?>

        <main id="game">
            <a href="/"><button class="danger">Rentrer à la maison</button></a>
            <div id="sky">
                <div class="batiment">supermarché</div>
                <div class="batiment">boutique meubles</div>
                <div class="batiment">boutique mode</div>
                <div class="batiment">casino</div>
                <div class="batiment">entreprise</div>
            </div>
            <div id="floor"></div>
        </main>

        <?php require "footer.php" ?>
    </body>
</html>