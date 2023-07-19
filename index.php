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

            <section id="presentation">
                <h1>Découvrez Nyanimal en quelques images :</h1>
                <div>
                    <img class="left" src="img/logo.png" alt="img1">
                    <div class="right">
                        <h2>Prends soin de ton Nyanimal</h2>
                        Joue avec lui, veille sur lui, gagne de l'argent et décore ta maison !
                        Plus ton Nyanimal est heureux, plus tu gagnes d'argent, plus ta maison est belle !
                    </div>

                    <div class="left">
                        <h2>Habille ton Nyanimal</h2>
                        Achète à la boutique des habits pour pouvoir personnaliser ton Tamagochi !
                        Texte texte texte texte
                    </div>
                    <img class="right" src="img/logo.png" alt="img1">

                    <img class="left" src="img/logo.png" alt="img1">
                    <div class="right">
                        <h2>Joue avec ton Nyanimal</h2>
                        Texte texte texte texte texte texte texte texte texte texte texte texte texte texte
                    </div>
                    <div>
                        Prêt(e) pour l'aventure ?
                        <div>
                            <button><a href="">Connexion</a></button>
                            <button><a href="">Inscription</a></button>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <?php include "footer.php" ?>
    </body>
</html>