<?php 

require_once 'Database.php';

class PersoModel{
    public static function getPerso(Int $id){
        //select
        $db = Database::getDB();
        $stat = "SELECT nom, atq, vie FROM perso WHERE perso.id = $id";
        $req = $db->query($stat);

        return $req->fetch(PDO::FETCH_OBJ);
    }
    public static function createPerso(Personnage $perso){
        //insert into
        $db = Database::getDB();
        $stat = "INSERT INTO perso (nom, atq, vie) VALUES (nom=:nom, atq=:atq, vie=:vie)";
        $req = $db->prepare($stat);
        $req->execute(
            [
                ':nom' => $perso->nom,
            ]
        )

    }
    public static function savePerso(Personnage $perso){
        //update
        $db = Database::getDB();
        $stat = "UPDATE perso SET vie=$perso->vie, atq=$perso->atq WHERE id=$perso->id";
        $req = $db->query($stat);

        $req->execute();
    }
    public static function deletePerso(Personnage $perso){
        //delete
        $db = Database::getDB();
        $stat = "DELETE FROM perso WHERE id=$perso->id";
        $req = $db->query($stat);

        $req->execute();
    }
}