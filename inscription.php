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
                    <div class="col1 row1" >
                        <label for="pseudo">Pseudo :</label>
                        <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo">
                    </div>
                    <div class="col2 row1" >
                        <label for="mail">E-mail :</label>
                        <input type="email" name="mail" id="mail" placeholder="Pseudo">
                    </div>

                    <div class="col1 row2">
                        <label for="password">Mot de passe :</label>
                        <input type="password" name="password" id="password" placeholder="Mot de passe">
                    </div>

                    <div class="col2 row2">
                        <input type="checkbox" id="cgu" name="cgu">
                        <label for="cgu">J'ai lu et j'accepte les <a href="">CGU</a></label>
                    </div>
                    
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