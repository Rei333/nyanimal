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
        <link rel="stylesheet" href="css/index.css">
    </head>

    <body>
        <?php require "header.php"; ?>

        <main id="game">
            <div id="infos">
                <div id="game_header">
                    <div id="gauges">
                        <div>Energie :</div>
                        <div class="gauge">
                            <div>80%</div>
                            <div style="width:80%"></div>
                        </div>
                        <div>Satiété :</div>
                        <div class="gauge">
                            <div>10%</div>
                            <div style="width:10%"></div>
                        </div>
                        <div>Bonheur :</div>
                        <div class="gauge">
                            <div>0%</div>
                            <div style="width:0%"></div>
                        </div>
                        <div>Santé :</div>
                        <div class="gauge">
                            <div>50%</div>
                            <div style="width:50%"></div>
                        </div>
                    </div>
                    <div id="right">
                        <div>
                            <div id="triangle"></div>
                            <div id="house">
                                <div id="up">
                                    <div class="room locked" title="Chambre"></div>
                                    <div class="room locked" title="Bureau"></div>
                                    <div class="room locked" title="Salle de bain"></div>
                                </div>
                                <div id="down">
                                    <div class="room active" title="Salon"></div>
                                    <div class="room" title="Cuisine"></div>
                                    <div class="room locked" title="Salle à manger"></div>
                                </div>
                            </div>
                        </div>
                        <div id="money">
                            <img src="img/user.svg" alt="Argent">
                            120
                        </div>
                    </div>
                </div>
                <div id="nyanimal"></div>
                <div id="actions">
                    <div class="action" id="feed"></div>
                    <div class="action" id="treat"></div>
                    <div class="action" id="sleep"></div>
                    <div class="action" id="dress"></div>
                    <div class="action" id="outside"></div>
                </div>
            </div>
            <div id="appartment_view">
                <div id="appartment">
                    <div id="wall" style="background-color: #FBDA65"></div>
                    <div id="floor" style="background-color: #D1891C"></div>
                </div>
            </div>
        </main>

        <?php require "footer.php" ?>
    </body>
</html>