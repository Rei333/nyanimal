<?php
    Class Furniture {
        public $id;
        public $category;
        public $variation;
        public $price;
        public $image;

        public function __construct($id, $category, $variation, $price, $image) {
            $this->id = $id;
            $this->category = $category;
            $this->variation = $variation;
            $this->price = $price;
            $this->image = $image;
        }

        public static function get_all() {
            GLOBAL $db;
            $req = $db->prepare("SELECT * FROM nyanimal.furnitures");
            $req->execute();
            $models = $req->fetchAll();

            $furnitures = [];
            foreach($models as $model) {
                array_push($furnitures, new Furniture($model["id"], $model["category"], $model["variation"], $model["price"], $model["image"]));
            }

            return $furnitures;
        }

        public static function get($id) {
            GLOBAL $db;
            $req = $db->prepare("SELECT * FROM nyanimal.furnitures WHERE id=?");
            $req->execute([$id]);
            $model = $req->fetch();

            if(!$model) return false;

            return new Furniture($model["id"], $model["category"], $model["variation"], $model["price"], $model["image"]);
        }
    }
?>