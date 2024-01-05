<?php
    class Player_house {
        public function get_connected_user() {
            GLOBAL $db;
            $req = $db->prepare("SELECT * FROM nyanimal.users WHERE id=?");
            $req->execute([$_SESSION["id"]]);
            return $req->fetch();
        }

        public function get_furnitures_from_connected_user() {
            GLOBAL $db;
            $req = $db->prepare("SELECT category, variation, image FROM users_furnitures INNER JOIN furnitures ON users_furnitures.furniture_id = furnitures.id WHERE user_id=?");
            $req->execute([$_SESSION["id"]]);
            return $req->fetchAll();
        }
    }
?>