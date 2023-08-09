<!DOCTYPE html>

<?php
    require "function.php";
    require "config.php";

    $message = null;
    if(isset($_POST["pseudo"]) && isset($_POST["password"]) && isset($_POST["mail"]) && isset($_POST["cgu"])) {
        if(strlen($_POST["pseudo"]) > 2 && strlen($_POST["password"]) > 6 && strlen($_POST["mail"]) > 6 && $_POST["cgu"] == "on") {
            try {
                $stmt = $db->prepare("INSERT INTO users (pseudo, password, mail) VALUES (?, ?, ?)");
                $stmt->execute([$_POST["pseudo"], $_POST["password"], $_POST["mail"]]);
                $message = "Votre compte a bien été créé. Vous pouvez vous connecter.";
            } catch(PDOException $e) {
                $message = "Le pseudo ou l'email existent déjà, veuillez en choisir un autre.";
            }
        } else {
            $message = "Une erreur s'est produite lors de l'inscription.";
        }
    }
?>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Inscription</title>
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/inscription.css">
    </head>

    <body>
        <?php if(!is_null($message)) {
            banner($message);
        }
        require "header.php" ?>

        <main>
            <section class="important_section">
                <h1>Inscription</h1>
                <form method="post">
                    <div class="col1 row1" >
                        <label for="pseudo">Pseudo :</label>
                        <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required>
                    </div>
                    <div class="col2 row1" >
                        <label for="mail">E-mail :</label>
                        <input type="email" name="mail" id="mail" placeholder="Email" required>
                    </div>

                    <div class="col1 row2">
                        <label for="password">Mot de passe :</label>
                        <input type="password" name="password" id="password" minlength="6" placeholder="Mot de passe" required>
                    </div>

                    <div class="col2 row2">
                        <input type="checkbox" id="cgu" name="cgu" required>
                        <label for="cgu">J'ai lu et j'accepte les <a href="/cgu">CGU</a></label>
                    </div>

                    <input type="submit" value="Inscription">
                </form>
                <div>
                    <a href="/connexion">J'ai déjà un compte</a>
                </div>
            </section>
        </main>

        <?php require "footer.php" ?>
    </body>
</html>