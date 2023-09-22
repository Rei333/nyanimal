<!DOCTYPE html>

<?php
    require "config.php";

    $stmt = $db->prepare("SELECT id, image FROM nyanimal.furnitures");
    $stmt->execute();
    $furniture = $stmt->fetch();
?>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Jeu</title>
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/index.css">
    </head>

    <body>
        <?php require "header.php"; ?>

        <main id="game">
            <?php while($furniture) { ?>
                <card style="display: flex; align-items: center">
                    <img style="margin: 10px; height: 200px" src="<?= $furniture["image"] ?>" alt="">
                    <a href="/test2/<?= $furniture["id"] ?>"><button>Acheter ce truc</button></a>
                </card>
                <?php $furniture = $stmt->fetch();
            } ?>
        </main>

        <?php require "footer.php" ?>
    </body>
</html>