<!DOCTYPE html>

<?php
    require "config.php";
    check_connected();

    $recup_furnitures = $db->prepare("SELECT furniture_id FROM nyanimal.users_furnitures WHERE user_id=1");
    $recup_furnitures->execute();
    $my_furnitures = $recup_furnitures->fetch();

    $img_recup = [];

    while($my_furnitures) {
        $stmt = $db->prepare("SELECT image FROM nyanimal.furnitures WHERE id=?");
        $stmt->execute([$my_furnitures[0]]);
        $img = $stmt->fetch();
        $my_furnitures = $recup_furnitures->fetch();
        array_push($img_recup, $img[0]);
    }
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
            <?php for($i=0; $i<sizeof($img_recup); $i++) { ?>
                <img style="margin-bottom: 10px; height: 200px" src="<?= $img_recup[$i] ?>" alt="">
            <?php } ?>
        </main>

        <?php require "footer.php" ?>
    </body>
</html>