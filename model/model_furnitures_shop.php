<?php
    class Furniture_shop {

        public function get_all_furnitures() {
            GLOBAL $db;
            $req = $db->prepare("SELECT * FROM nyanimal.furnitures");
            $req->execute();
            return $req->fetchAll();
        }

        public function get_furniture($id) {
            GLOBAL $db;
            $req = $db->prepare("SELECT * FROM nyanimal.furnitures WHERE id=?");
            $req->execute([$id]);
            return $req->fetch();
        }
    }

    class User_furniture {
        private $user_id;

        public function __construct($user_id) {
            $this->user_id = $user_id;
        }

        public function get_user() {
            GLOBAL $db;
            $req = $db->prepare("SELECT id, money FROM nyanimal.users WHERE id=?");
            $req->execute([$this->user_id]);
            return $req->fetch();
        }

        public function get_furniture_from_category($furniture_category) {
            GLOBAL $db;
            $req = $db->prepare("SELECT users_furnitures.*, furnitures.* FROM users_furnitures INNER JOIN furnitures ON users_furnitures.furniture_id = furnitures.id WHERE user_id=? AND category=?");
            $req->execute([$this->user_id, $furniture_category]);
            return $req->fetch();
        }

        public function spend_money($price) {
            GLOBAL $db;
            $req = $db->prepare("UPDATE users SET money = money - ? WHERE id= ?");
            $req->execute([$price, $this->user_id]);
        }

        public function update_user_furniture($new_furniture_id, $old_furniture_id) {
            GLOBAL $db;
            $req = $db->prepare("UPDATE users_furnitures SET furniture_id = ? WHERE user_id=? AND furniture_id=?");
            $req->execute([$new_furniture_id, $this->user_id, $old_furniture_id]);
        }

        public function insert_new_user_furniture($furniture_id) {
            GLOBAL $db;
            $req = $db->prepare("INSERT INTO users_furnitures (user_id, furniture_id) VALUES (?, ?);");
            $req->execute([$this->user_id, $furniture_id]);
        }
    }
?>