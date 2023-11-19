<?php
    if (isset($_SESSION["id"])) {
        $req = $db->prepare("SELECT * FROM nyanimal.users WHERE id=?");
        $req->execute(array($_SESSION["id"]));
        $user = $req->fetch();
    }

    banner();
?>

<header>
    <?php if (isset($_SESSION["id"])) { ?>
        <a id="logo" href="/"><img src="img/logo.svg" alt="logo" title="Jeu"></a>
        <div>
            <div id="money">
                <img src="img/coin.png" alt="Pièce">
                <?= $user["money"] ?>
            </div>
            <a id="account" href="/account"><img src="img/user.svg" alt="compte" title="Mon Compte"></a>
            <button class="danger" id="logout">
                <a href="/logout">
                    <img src="img/logout.svg" alt="déconnexion" title="Déconnexion">
                </a>
            </button>
        </div>
    <?php } else { ?>
        <a id="logo" href="/connexion"><img src="img/logo.svg" alt="logo" title="Connexion"></a>
    <?php } ?>
</header>