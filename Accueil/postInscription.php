<?php 
    session_start();

    if(!isset($_POST['username']) || !isset($_POST['password']) || empty($_POST['username']) || empty($_POST['password'])){
        $_SESSION['inscriptionError'] = "Olala ! Certains champs sont vides !";
        header('Location: inscription.php');
        exit();
    }

//On se connecte à la BDD
    require('connexion.php');

//On affecte des variables pour une meilleure lisibilité
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

//Test si les passwords correspondent
    if($password != $_POST['confirm_password']){
        $_SESSION['inscriptionError'] = "Le mot de passe n'est pas identique";
        header('Location: inscription.php');
        exit();
    }

//Test si le password a 5 caracteres, 1 majuscule et 1 chiffre
    $password_pattern='#^(?=.*[A-Z])(?=.*[0-9]).{5,}$#';
    if(!preg_match($password_pattern, $password)) {
        $_SESSION['inscriptionError'] = "Le mot de passe n'est pas conforme (1 majuscule, 1 chiffre et 5 caracteres minimum";
        header('Location: inscription.php');
        exit();
    }

//On test si le username est en caractère uniquement alphanumérique
    if(!ctype_alnum($username)) {
        $_SESSION['inscriptionError'] = "Le nom d'utilisateur est invalide (aucun caractères spéciaux autorisés)";
        header('Location: inscription.php');
        exit();
    }

//BONUS : On test si l'username est pas déjà existant
    if($username){
        $usernameCheck = 'SELECT username FROM user WHERE username=:username';
        $requeteUsernameCheck = $connexion->prepare($usernameCheck);
        $requeteUsernameCheck->execute([':username'=>$username]);
        $usernameBon = $requeteUsernameCheck->fetch(PDO::FETCH_ASSOC);
            if($usernameBon){
                $_SESSION['inscriptionError'] = "Nom d'utilisateur déjà existant";
                header('Location: inscription.php');
                exit();
            }
    }

//On hash le password
    $password_hashed=password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]);

//On envoie notre requète, on envoie une variable de session de confirmation et on renvoie l'utilisateur sur la page login
    $statement= 'INSERT INTO user(user.username, user.password, user.role, user.statut) VALUES ("'.$username.'","'.$password_hashed.'", "membre", "libre")';
    $requete = $connexion->query($statement);

    $_SESSION['confirm'] = "Votre compte a été créé avec succès !";
    header('Location: index.php');
    exit();
?>