<?php

require_once 'Database.php';

class EnnemiModel{
    public static function getEnnemi(Int $id){
        $db = Database::getDB();
        $stat = "SELECT nom, atq, vie FROM ennemi WHERE niveau =$id";
        $req = $db->query($stat);
        return $req->fetch(PDO::FETCH_OBJ);
    }
}