<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/index.css">
    </head>

    <body>
        <?php include "header.php" ?>

        <main>
            <section id="identification">
                <h2>Connexion</h2>
                <form action="" method="post">
                    <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo">
                    <input type="password" name="password" id="password" placeholder="Mot de passe">
                    <input type="submit" value="Connexion">
                </form>
                <div>
                    <a href="">Mot de passe oublié</a>
                    <a href="">S'inscrire</a>
                </div>
            </section>
        </main>

        <?php include "footer.php" ?>
    </body>
</html>