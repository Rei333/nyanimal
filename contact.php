<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Contact</title>
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/contact.css">
    </head>

    <body>
        <?php include "header.php" ?>

        <main>
            <section class="important_section">
                <h1>Contacter le Webmaster</h1>
                <form action="POST">
                    <div>
                        <label for="mail">E-mail :</label>
                        <input type="email" name="mail" id="mail" placeholder="Email">
                    </div>
                    <div>
                        <label for="title">Objet :</label>
                        <input type="text" name="title" id="title" placeholder="Objet">
                    </div>
                    <label for="message">Message :</label>
                    <textarea name="message" id="message"></textarea>
                    <div>
                        <input type="submit" value="Envoyer">
                    </div>
                </form>
            </section>
        </main>

        <?php include "footer.php" ?>
    </body>
</html>