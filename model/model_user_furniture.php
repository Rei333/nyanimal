<?php
    require_once "model/model_furniture.php";
    Class User_Furniture {
        public $user_id;
        public $furniture_id;

        public function __construct($user_id, $furniture_id){
            $this->user_id = $user_id;
            $this->furniture_id = $furniture_id;
        }

        public static function get_all_from_user($user_id) {
            GLOBAL $db;
            $req = $db->prepare("SELECT * FROM users_furnitures WHERE user_id=?");
            $req->execute([$user_id]);
            $models = $req->fetchAll();

            $furnitures = [];
            foreach($models as $model) {
                array_push($furnitures, new User_Furniture($model["user_id"], $model["furniture_id"]));
            }

            return $furnitures;
        }

        public function get_furniture() {
            return Furniture::get($this->furniture_id);
        }

        public static function get_from_category($user_id, $furniture_category) {
            GLOBAL $db;
            $req = $db->prepare("SELECT users_furnitures.* FROM users_furnitures INNER JOIN furnitures ON users_furnitures.furniture_id = furnitures.id WHERE user_id=? AND category=?");
            $req->execute([$user_id, $furniture_category]);
            $model = $req->fetch();

            if(!$model) return false;

            return new User_Furniture($model["user_id"], $model["furniture_id"]);
        }

        public function replace($new_furniture_id) {
            GLOBAL $db;
            $req = $db->prepare("UPDATE users_furnitures SET furniture_id = ? WHERE user_id=? AND furniture_id=?");
            $req->execute([$new_furniture_id, $this->user_id, $this->furniture_id]);
        }

        public static function create($user_id, $furniture_id) {
            GLOBAL $db;
            $req = $db->prepare("INSERT INTO users_furnitures (user_id, furniture_id) VALUES (?, ?);");
            $req->execute([$user_id, $furniture_id]);
        }
    }
?>