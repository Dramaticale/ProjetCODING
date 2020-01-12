<?php
    session_start();
    
    if(!isset($_POST['username']) || !isset($_POST['password']) || empty($_POST['username']) || empty($_POST['password'])){
        $_SESSION['error'] = "Olala ! Certains champs sont vides !";
        header('Location: index.php');
        exit();
    }

    $_SESSION['error']="";
    $_SESSION['userID'] ="";
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    
    $connexion = new PDO('mysql:host=localhost;dbname=projetcoding;charset=utf8;','root',NULL);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $test_username= 'SELECT user.password FROM user WHERE username=:username';
    $requete = $connexion->prepare($test_username);
    $requete->execute([':username'=>$username]);
    $identifiant_username = $requete->fetch(PDO::FETCH_ASSOC);

    $idUsername='SELECT user.id FROM user WHERE username=:username';
    $req2 = $connexion->prepare($idUsername);
    $req2->execute([':username'=>$username]);
    $resultID = $req2->fetch(PDO::FETCH_ASSOC);

    $userRoleStmt='SELECT user.role FROM user WHERE username=:username';
    $req3 = $connexion->prepare($userRoleStmt);
    $req3->execute([':username'=>$username]);
    $userRole = $req3->fetch(PDO::FETCH_ASSOC);

    $userStatutStmt='SELECT user.statut FROM user WHERE username=:username';
    $req4 = $connexion->prepare($userStatutStmt);
    $req4->execute([':username'=>$username]);
    $userStatut = $req4->fetch(PDO::FETCH_ASSOC);

    if(password_verify($_POST['password'], $identifiant_username['password'])){
        $_SESSION['check'] = "log";
        $_SESSION['username'] = $username;
        $_SESSION['userID'] = $resultID;
        $_SESSION['userRole'] = $userRole['role'];
        $_SESSION['userStatut'] = $userStatut['statut'];

        header('Location: index.php');
        exit;
    }else{
        header('Location: index.php');
        $_SESSION['error'] = "Nom d'utilisateur/Mot de passe incorrect";
        exit();
    }
    
?>