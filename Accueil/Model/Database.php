<?php 

class Database {
    private $host = 'localhost';
    private $dbname = "projetcoding";
    private $user = 'root';
    private $pass = null;
    private static $_db;

    public function __construct(){
        $pdo = new PDO("mysql:host={$this->host}; dbname={$this->dbname}; charset=utf8;", $this->user, $this->pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        self::$_db = $pdo;
    }

    public static function getDB(){
        if(!self::$_db){
            new Database;
        }

        return self::$_db;
    }
}