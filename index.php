<!DOCTYPE html>

<?php
    require "config.php";
    check_connected();

    $req = $db->prepare("SELECT * FROM nyanimal.users WHERE id=?");
    $req->execute(array($_SESSION["id"]));
    $user = $req->fetch();

    if(!$user) {
        header("Location: /logout");
        exit;
    }

    $stmt = $db->prepare("SELECT category, variation, image FROM users_furnitures INNER JOIN furnitures ON users_furnitures.furniture_id = furnitures.id WHERE user_id=?");
    $stmt->execute(array($_SESSION["id"]));
    $furnitures = $stmt->fetchAll();
?>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Jeu</title>
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/index.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <?php require "header.php"; ?>

        <main id="game">
            <div id="infos">
                <section id="game_header">
                    <div id="gauges">
                        <div>Energie :</div>
                        <div class="gauge">
                            <div><?= $user["energy"] ?>%</div>
                            <div class="filled_color" style="width:<?= $user["energy"] ?>%"></div>
                        </div>
                        <div>Satiété :</div>
                        <div class="gauge">
                            <div><?= $user["satiety"] ?>%</div>
                            <div class="filled_color" style="width:<?= $user["satiety"] ?>%"></div>
                        </div>
                        <div>Bonheur :</div>
                        <div class="gauge">
                            <div><?= $user["hapiness"] ?>%</div>
                            <div class="filled_color" style="width:<?= $user["hapiness"] ?>%"></div>
                        </div>
                        <div>Santé :</div>
                        <div class="gauge">
                            <div><?= $user["health"] ?>%</div>
                            <div class="filled_color" style="width:<?= $user["health"] ?>%"></div>
                        </div>
                    </div>
                    <aside>
                        <div>
                            <div id="triangle"></div>
                            <div id="house">
                                <div id="up">
                                    <div class="room <?php if(!$user["bathroom"]) { echo("locked"); } ?> " title="Salle de bain"></div>
                                    <div class="room <?php if(!$user["bedroom"]) { echo("locked"); } ?> " title="Chambre"></div>
                                    <div class="room <?php if(!$user["office"]) { echo("locked"); } ?> " title="Bureau"></div>
                                </div>
                                <div id="down">
                                    <div class="room active" title="Salon"></div>
                                    <div class="room <?php if(!$user["dining_room"]) { echo("locked"); } ?> " title="Salle à manger"></div>
                                    <div class="room <?php if(!$user["kitchen"]) { echo("locked"); } ?> " title="Cuisine"></div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </section>
                <div id="nyanimal" style="background-image: url('/img/bdd/clothes/pants.png'), url('/img/bdd/clothes/truc.png'), url('/img/nyanimal.png');">
                </div>
                <nav id="actions">
                    <div class="action" id="feed"></div>
                    <div class="action" id="treat"></div>
                    <div class="action" id="sleep"></div>
                    <div class="action" id="dress"></div>
                    <a href="/outside"><div class="action" id="outside"></div></a>
                </nav>
            </div>
            <section id="appartment_view">
                <div id="appartment">
                    <div id="wall" style="background-color: #FBDA65">
                        <?php for ($i=0; $i<sizeof($furnitures); $i++) {
                            if($furnitures[$i]["category"]=="Bureau") { ?>
                            <img class="furnitures" id="bureau" src="<?= $furnitures[$i]["image"] ?>" alt="<?= $furnitures[$i]["category"] ?> <?= $furnitures[$i]["variation"] ?>">
                        <?php }
                        } ?>
                        <?php for ($i=0; $i<sizeof($furnitures); $i++) {
                            if($furnitures[$i]["category"]=="Commode") { ?>
                            <img class="furnitures" id="commode" src="<?= $furnitures[$i]["image"] ?>" alt="<?= $furnitures[$i]["category"] ?> <?= $furnitures[$i]["variation"] ?>">
                        <?php }
                        } ?>
                    </div>
                    <div id="floor" style="background-color: #D1891C"></div>
                </div>
            </section>
        </main>

        <?php require "footer.php" ?>
    </body>
</html>