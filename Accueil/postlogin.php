<?php
    session_start();
    
    if(!isset($_POST['useremail']) || !isset($_POST['password']) || empty($_POST['useremail']) || empty($_POST['password'])){
        $_SESSION['error'] = "Olala ! Certains champs sont vides !";
        header('Location: login.php');
        exit();
    }

    $_SESSION['error']="";
    $username_email = htmlspecialchars($_POST['useremail']);
    $password = htmlspecialchars($_POST['password']);
    
    $connexion = new PDO('mysql:host=localhost;dbname=projetcoding;charset=utf8;','root',NULL);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $test_username= 'SELECT password FROM user WHERE username=:username';
    $test_email= 'SELECT password FROM user WHERE email=:email';

    $requete = $connexion->prepare($test_username);
    $requete->execute([':username'=>$username_email]);
    $identifiant_username = $requete->fetch(PDO::FETCH_ASSOC);

    $requete2 = $connexion->prepare($test_email);
    $requete2->execute([':email'=>$username_email]);
    $identifiant_email = $requete2->fetch(PDO::FETCH_ASSOC);

    if(password_verify($_POST['password'], $identifiant_username['password']) || password_verify($_POST['password'], $identifiant_email['password'])){
        $_SESSION['check'] = "log";
        header('Location: index.php');
        exit;
    }else{
        header('Location: index.php');
        $_SESSION['error'] = "Olala ! Certains champs sont incorrects !";
        exit();
    }

    
?>