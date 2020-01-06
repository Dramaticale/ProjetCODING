<?php
    $connexion = new PDO('mysql:host=localhost;dbname=projetcoding;charset=utf8;','root',NULL);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>