<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/connexion.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <?php require "header.php"; ?>

        <main>
            <section id="identification" class="important_section">
                <h1>Connexion</h1>
                <form action="" method="post">
                    <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo">
                    <input type="password" name="password" id="password" placeholder="Mot de passe">
                    <input type="submit" value="Connexion">
                </form>
                <div>
                    <a href="">Mot de passe oublié</a>
                    <a href="/inscription">S'inscrire</a>
                </div>
            </section>

            <section id="presentation">
                <h2>Découvrez Nyanimal en quelques images :</h2>
                <div>
                    <article>
                        <img src="img/connexion1.png" alt="Exemple maison">
                        <div class="text">
                            <h2>Prends soin de ton Nyanimal !</h2>
                            Joue avec lui, habille-le, gagne de l'argent et décore ta maison !
                            N'oublie pas de lui donner à manger et de le coucher !
                        </div>
                    </article>

                    <article>
                        <div class="text">
                            <h2>Fais les boutiques !</h2>
                            Besoin de nourriture, meubles ou habits ? Fais un tour dans la ville pour accéder aux boutiques !
                        </div>
                        <img src="img/connexion2.png" alt="Ville">
                    </article>

                    <article>
                        <img src="img/connexion3.png" alt="Exemple boutique">
                        <div class="text">
                            <h2>Décore ta maison !</h2>
                            Achète des meubles pour décorer les pièces de ta maison !
                            Chaque modèle possède plusieurs coloris !
                        </div>
                    </article>
                    <div>
                        <h3>Prêt(e) pour l'aventure ?</h3>
                        <div id="buttons">
                            <button><a href="#identification">Connexion</a></button>
                            <button><a href="/inscription">Inscription</a></button>
                        </div>
                    </div>
                </div>
            </section>

        </main>

        <?php require "footer.php"; ?>
    </body>
</html>