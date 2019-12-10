<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Projet YSCHOOLS fin d'année">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../Ressources/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <title>Projet Yschools - Jeu de Rôles</title>
</head>
<body>
    <header>
        <?php include("../Ressources/Commun/banniere.html") ?>
    </header>
    <?php include("../Ressources/Commun/navbar.php") ?>
    <div class="container">
        <div class="texte">
            blablabla
        </div>
            <div class="card">
                <div class="connexion">
                <?php if(isset($_SESSION['check']) == null): ?>
                    <form method="POST" action="postlogin.php">
                        <div class="identifiant">
                            <input class="form-control mr-sm-2" type="text" id="username" name ="username" placeholder="Identifiant">
                        </div>
                        <div class="motDePasse">
                            <input class="form-control mr-sm-2" type="password" id ="password" name="password" placeholder="Mot de passe">
                        </div>
                        <div class="bouton">
                            <button class="btn btn-primary" type="submit">Se connecter</button>
                        </div>    
                        <div class="inscription">
                            Pas de compte ? <a href="inscription.php">S'enregistrer</a>
                        </div>
                    <form>
                <?php endif; ?>
                <?php if(isset($_SESSION['check']) == 'log'): ?>
                    Bonjour !
                    <a href="logout.php">Se déconnecter</a>
                    </form>
                <?php endif; ?>
                </div>
            </div>
    </div>
</body>
<?php include("../Ressources/Commun/footer.html") ?>
</html>