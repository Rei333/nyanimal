<?php
    function get_user_infos($pseudo, $db) {
        $req = $db->prepare("SELECT * FROM users WHERE pseudo = ?");
        $req->execute([$pseudo]);
        return $req->fetch();
    }
?>