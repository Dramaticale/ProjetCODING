<?php 

require_once 'Database.php';

class PersoModel{
    public static function getPerso(Int $id){
        //select
        $db = Database::getDB();
        $stat = 'SELECT * FROM perso INNER JOIN user_has_perso ON (perso.id = user_has_perso.perso_id) INNER JOIN user ON (user_has_perso.user_id = user.id) WHERE user.id = '. $id .'';
        $req = $db->query($stat);

        return $req->fetch(PDO::FETCH_OBJ);
    }
    public static function createPerso(Int $userID, Personnage $perso){
        //insert into
        $db = Database::getDB();
        $stat = "INSERT INTO perso (nom, atq, vie) VALUES (nom=:nom, atq=:atq, vie=:vie)";
        $req = $db->prepare($stat);
        $req->execute(
            [
                ':nom' => $perso->nom, ':atq' => $perso->atq, ':vie' => $perso->vie
            ]
            );
        $idUser = $db->lastInsertId();
        $stat2 = "INSERT INTO user_has_perso (user_id, perso_id) VALUES ($userID,$idUser)";
        $req2 = $db->prepare($stat2);
        $req2->execute();
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