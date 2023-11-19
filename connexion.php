<!DOCTYPE html>

<?php
    require "config.php";

    if(isset($_POST["pseudo"]) && isset($_POST["password"])) {
        $stmt = $db->prepare("SELECT * FROM users WHERE pseudo = ?");
        $stmt->execute([$_POST["pseudo"]]);
        $user = $stmt->fetch();

        if($user && password_verify($_POST["password"], $user["password"])) {
            $_SESSION["id"] = $user["id"];
            header("Location: /");
            exit;
        } else {
            set_banner_message("Pseudo ou mot de passe incorrect.");
        }
    }
?>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/connexion.css">
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
                    <img class="left" src="img/connexion1.png" alt="Exemple maison">
                    <div class="right">
                        <h2>Prends soin de ton Nyanimal</h2>
                        Joue avec lui, habille-le, gagne de l'argent et décore ta maison ! 
                        N'oublie pas de lui donner à manger et de le coucher !
                    </div>

                    <div class="left">
                        <h2>Fais les boutiques !</h2>
                        Besoin de nourriture, meubles ou habits ? Fais un tour dans la ville pour accéder aux boutiques !
                    </div>
                    <img class="right" src="img/connexion2.png" alt="Ville">

                    <img class="left" src="img/connexion3.png" alt="Exemple boutique">
                    <div class="right">
                        <h2>Décore ta maison !</h2>
                        Achète des meubles pour décorer les pièces de ta maison ! 
                        Chaque modèle possède plusieurs coloris ! 
                    </div>
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