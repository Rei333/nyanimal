<?php
    Class Users {
        private $pseudo;

        public function __construct($pseudo){
            $this->pseudo = $pseudo;
        }

        public function get_user_infos() {
            GLOBAL $db;
            $req = $db->prepare("SELECT * FROM users WHERE pseudo = ?");
            $req->execute([$this->pseudo]);
            return $req->fetch();
        }
    }
?>