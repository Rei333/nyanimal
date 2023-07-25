<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Inscription</title>
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/inscription.css">
    </head>

    <body>
        <?php include "header.php" ?>

        <main>
            <section>
                <h1>Inscription</h1>
                <form action="" method="post">
                    <label class="col1 row1" for="pseudo">Pseudo :</label>
                    <input class="col1 row1" type="text" name="pseudo" id="pseudo" placeholder="Pseudo">
                    <label class="col2 row1" for="mail">E-mail :</label>
                    <input class="col2 row1" type="email" name="mail" id="mail" placeholder="Pseudo">

                    <label class="col1 row2" for="password">Mot de passe :</label>
                    <input class="col1 row2" type="password" name="password" id="password" placeholder="Mot de passe">
                    <input class="col2 row2" type="checkbox" id="cgu" name="cgu">
                    <label class="col2 row2" for="cgu">J'ai lu et j'accepte les <a href="">CGU</a></label>
                    
                    <input type="submit" value="Inscription">
                </form>
                <div>
                    <a href="/connexion">J'ai déjà un compte</a>
                </div>
            </section>
        </main>

        <?php include "footer.php" ?>
    </body>
</html>