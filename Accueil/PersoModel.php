<?php 

require_once 'Database.php';

class PersoModel{
    public static function getPerso(Int $id){
        //select
        $db = Database::getDB();
        $stat = "SELECT nom FROM perso WHERE perso.id = $id";
        $req = $db->query($stat);

        return $req->fetch(PDO::FETCH_OBJ);
    }
    public static function createPerso(Personnage $perso){
        //insert into
        $db = Database::getDB();
        $stat = "INSERT INTO perso (nom, atq, vie) VALUES (nom=:nom, atq=:atq, vie=:vie)";
        $req = $db->query($stat);

        return $req->fetch(PDO::FETCH_OBJ);
    }
    public static function savePerso(Personnage $perso){
        //update
        $db = Database::getDB();
        $stat = "UPDATE perso SET vie:=vie, atq:=atq WHERE nom=$perso";
        $req = $db->query($stat);

        return $req->fetch(PDO::FETCH_OBJ);
    }
    public static function deletePerso(Personnage $perso){
        //delete
        $db = Database::getDB();
        $stat = "DELETE FROM perso WHERE nom=$perso";
        $req = $db->query($stat);

        return $req->fetch(PDO::FETCH_OBJ);
    }
}