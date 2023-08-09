<?php
    function banner($message) { ?>
        <div id="banner">
            <div><?= $message ?></div>
            <img src="/img/close.png" alt="Réduire la bannière"  onclick="close_banner()">
        </div>
        <script>
            function close_banner() {
                document.getElementById("banner").style.display="none";
            }
        </script>
    <?php }
?>