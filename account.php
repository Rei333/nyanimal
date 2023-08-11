<!DOCTYPE html>

<?php
    require "config.php";
?>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Compte</title>
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/account.css">
    </head>

    <body>
        <?php require "header.php"; ?>

        <main>
            <section class="important_section">
                <h1>Mon Compte</h1>
                <form action="" method="post">
                    <div>
                        <div>
                            <label for="mail">Modifier mon pseudo :</label>
                            <input type="email" name="mail" id="mail" placeholder="Pseudo">
                        </div>
                        <div>
                            <label for="mail">Modifier mon e-mail :</label>
                            <input type="email" name="mail" id="mail" placeholder="Email">
                        </div>
                        <div>
                            <label for="mail">Modifier mon mot de passe :</label>
                            <input type="email" name="mail" id="mail" placeholder="Mot de passe">
                        </div>
                    </div>
                    <div>
                        <label for="mail">Entrer le mot de passe pour confirmer les changements :</label>
                        <input type="email" name="mail" id="mail" placeholder="Mot de passe">
                    </div>
                    <div>
                        <input type="submit" value="Sauvegarder">
                    </div>
                </form>
                <div id="delete">
                    <input class="danger" type="submit" value="Supprimer mon compte">
                </div>
            </section>
        </main>

        <?php require "footer.php"; ?>
    </body>
</html>