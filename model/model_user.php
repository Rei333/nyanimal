<?php
    require_once "model/model_user_furniture.php";

    Class User {
        public $id;
        public $pseudo;
        public $password;
        public $mail;
        public $money;
        public $admin;
        public $energy;
        public $satiety;
        public $hapiness;
        public $health;
        public $living_room;
        public $dining_room;
        public $kitchen;
        public $bathroom;
        public $bedroom;
        public $office;

        public function __construct($id, $pseudo, $password, $mail, $money, $admin, $energy, $satiety, $hapiness, $health, $living_room, $dining_room, $kitchen, $bathroom, $bedroom, $office) {
            $this->id = $id;
            $this->pseudo = $pseudo;
            $this->password = $password;
            $this->mail = $mail;
            $this->money = $money;
            $this->admin = $admin;
            $this->energy = $energy;
            $this->satiety = $satiety;
            $this->hapiness = $hapiness;
            $this->health = $health;
            $this->living_room = $living_room;
            $this->dining_room = $dining_room;
            $this->kitchen = $kitchen;
            $this->bathroom = $bathroom;
            $this->bedroom = $bedroom;
            $this->office = $office;
        }

        public static function get($id) {
            GLOBAL $db;
            $req = $db->prepare("SELECT * FROM users WHERE id = ?");
            $req->execute([$id]);
            $model = $req->fetch();

            if(!$model) return false;

            return new User($model["id"], $model["pseudo"], $model["password"], $model["mail"], $model["money"], $model["admin"], $model["energy"], $model["satiety"], $model["hapiness"], $model["health"], $model["living_room"], $model["dining_room"], $model["kitchen"], $model["bathroom"], $model["bedroom"], $model["office"]);
        }

        public static function get_from_pseudo($pseudo) {
            GLOBAL $db;
            $req = $db->prepare("SELECT * FROM users WHERE pseudo = ?");
            $req->execute([$pseudo]);
            $model = $req->fetch();

            if(!$model) return false;

            return new User($model["id"], $model["pseudo"], $model["password"], $model["mail"], $model["money"], $model["admin"], $model["energy"], $model["satiety"], $model["hapiness"], $model["health"], $model["living_room"], $model["dining_room"], $model["kitchen"], $model["bathroom"], $model["bedroom"], $model["office"]);
        }

        public static function create($pseudo, $password, $mail) {
            GLOBAL $db;
            $req = $db->prepare("INSERT INTO users (pseudo, password, mail) VALUES (?, ?, ?)");
            $req->execute([$pseudo, password_hash($password, PASSWORD_DEFAULT), $mail]);
        }

        public function get_furnitures() {
            return User_Furniture::get_all_from_user($this->id);
        }

        public function get_furniture_from_category($category) {
            return User_Furniture::get_from_category($this->id, $category);
        }

        public function spend_money($price) {
            GLOBAL $db;
            $req = $db->prepare("UPDATE users SET money = money - ? WHERE id = ?");
            $req->execute([$price, $this->id]);
        }
    }
?>