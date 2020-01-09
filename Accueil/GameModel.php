<?php 

require_once 'Database.php';

class GameModel{
    public static function getGameData(Int $randomInt, Int $niveau){
        $gameData = [];

        $gameData['evennement'] = self::getEvent($randomInt, $niveau);
        $gameData['choix'] = self::getChoix($randomInt);

        return $gameData;
    }
    private static function getEvent(Int $randomInt, Int $niveau){
        $db = Database::getDB();
        $stat = "SELECT niveau, texte FROM evennement WHERE evennement.id = $randomInt AND evennement.niveau = $niveau";
        $req = $db->query($stat);

        return $req->fetch(PDO::FETCH_OBJ);
    }

    private static function getChoix(Int $event){
        $db = Database::getDB();
        $stat = "SELECT choix.id, choix.nom FROM evennement 
                JOIN type_event ON evennement.type_event_id = type_event.id
                JOIN type_event_has_choix ON type_event.id = type_event_has_choix.type_event_id
                JOIN choix ON type_event_has_choix.choix_id = choix.id
                WHERE evennement.id = $event";

        $req = $db->query($stat);
        $req->execute();

        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getPerso(Int $id_user){

    }
    public static function getConsequence(){

    }
}