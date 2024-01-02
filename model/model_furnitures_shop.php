<?php
    function get_all_furnitures($db) {
        $req = $db->prepare("SELECT * FROM nyanimal.furnitures");
        $req->execute();
        return $req->fetchAll();
    }

    function get_user($id, $db) {
        $req = $db->prepare("SELECT id, money FROM nyanimal.users WHERE id=?");
        $req->execute([$id]);
        return $req->fetch();
    }

    function get_furniture($id, $db) {
        $req = $db->prepare("SELECT * FROM nyanimal.furnitures WHERE id=?");
        $req->execute([$id]);
        return $req->fetch();
    }

    function get_furniture_from_category($user_id, $furniture_category, $db) {
        $req = $db->prepare("SELECT users_furnitures.*, furnitures.* FROM users_furnitures INNER JOIN furnitures ON users_furnitures.furniture_id = furnitures.id WHERE user_id=? AND category=?");
        $req->execute([$user_id, $furniture_category]);
        return $req->fetch();
    }

    function spend_money($price, $user_id, $db) {
        $req = $db->prepare("UPDATE users SET money = money - ? WHERE id= ?");
        $req->execute([$price, $user_id]);
    }

    function update_user_furniture($new_furniture_id, $user_id, $old_furniture_id, $db) {
        $req = $db->prepare("UPDATE users_furnitures SET furniture_id = ? WHERE user_id=? AND furniture_id=?");
        $req->execute([$new_furniture_id, $user_id, $old_furniture_id]);
    }

    function insert_new_user_furniture($user_id, $furniture_id, $db) {
        $req = $db->prepare("INSERT INTO users_furnitures (user_id, furniture_id) VALUES (?, ?);");
        $req->execute([$user_id, $furniture_id]);
    }
?>