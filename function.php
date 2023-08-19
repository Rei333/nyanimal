<?php
    $banner_message = null;

    function banner() {
        GLOBAL $banner_message;
        if(!is_null($banner_message)) { ?>
            <div id="banner">
                <div><?= $banner_message ?></div>
                <img src="/img/close.png" alt="Réduire la bannière"  onclick="close_banner()">
            </div>
            <script>
                function close_banner() {
                    document.getElementById("banner").style.display="none";
                }
            </script>
        <?php }
    }

    function set_banner_message($message) {
        GLOBAL $banner_message;
        $banner_message = $message;
    }

    function check_connected() {
        if(!isset($_SESSION["id"])) {
            header("Location: /connexion");
            exit;
        }
    }
?>