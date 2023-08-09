<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Compte</title>
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/account.css">
    </head>

    <body>
        <?php require "header.php" ?>

        <main>
            <section class="important_section">
                <h1>Mon Compte</h1>
                <form action="" method="post">
                    <div>
                        <label for="mail">E-mail :</label>
                        <input type="email" name="mail" id="mail" placeholder="Email">
                    </div>
                    <div>
                        <label for="title">Objet :</label>
                        <input type="text" name="title" id="title" placeholder="Objet">
                    </div>
                    <div>
                        <input type="submit" value="Envoyer">
                        <input type="submit" value="Supprimer mon compte">
                    </div>
                </form>
            </section>
        </main>

        <?php require "footer.php" ?>
    </body>
</html>