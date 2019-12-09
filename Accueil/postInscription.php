<?php 
    session_start();

    if(!isset($_POST['username']) || !isset($_POST['email']) || !isset($_POST['password']) || empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])){
        $_SESSION['inscriptionError'] = "Olala ! Certains champs sont vides !";
        header('Location: inscription.php');
        exit();
    }

//On se connecte à la BDD
    $connexion = new PDO('mysql:host=localhost;dbname=projetcoding;charset=utf8;','root',NULL);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//On affecte des variables pour une meilleure lisibilité
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

//Test si les passwords correspondent
    if($password != $_POST['confirm_password']){
        $_SESSION['inscriptionError'] = "Le mot de passe n'est pas identique";
        header('Location: inscription.php');
        exit();
    }

//Test si le password a 8 caracteres, 1 majuscule et 1 chiffre
    $password_pattern='#^(?=.*[A-Z])(?=.*[0-9]).{8,}$#';
    if(!preg_match($password_pattern, $password)) {
        $_SESSION['inscriptionError'] = "Le mot de passe n'est pas conforme";
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

//On test si l'email n'est pas déjà existant et est valide
    if($email){
        $emailCheck = 'SELECT email FROM user WHERE email=:email';
        $requeteEmailCheck = $connexion->prepare($emailCheck);
        $requeteEmailCheck->execute([':email'=>$email]);
        $emailBon = $requeteEmailCheck->fetch(PDO::FETCH_ASSOC);
            if($emailBon){
                $_SESSION['inscriptionError'] = "E-mail déjà existant";
                header('Location: inscription.php');
                exit();
            }
    }

    $email_pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i';
    $email_ok = preg_match($email_pattern, $email);
    if(!$email_ok){
        $_SESSION['inscriptionError'] = 'E-mail incorrect';
        header('Location: inscription.php');
        exit();
    }

//On hash le password
    $password_hashed=password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]);

//On envoie notre requète, on envoie une variable de session de confirmation et on renvoie l'utilisateur sur la page login
    $statement= 'INSERT INTO user(user.username, user.password, user.email) VALUES ("'.$username.'","'.$password_hashed.'","'.$email.'")';
    $requete = $connexion->query($statement);

    $_SESSION['confirm'] = "Votre compte a été créé avec succès !";
    header('Location: index.php');
    exit();
?>