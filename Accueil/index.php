<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Projet YSCHOOLS fin d'année">
    <link rel="stylesheet" href="../Ressources/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
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
                <div class="identifiant">
                    <input class="form-control mr-sm-2" type="text" placeholder="Identifiant">
                </div>
                <div class="motDePasse">
                    <input class="form-control mr-sm-2" type="password" placeholder="Mot de passe">
                </div>
                <div class="bouton">
                    <button class="btn btn-primary" type="submit">Se connecter</button>
                </div>
                <div class="inscription">
                    Pas de compte ? <a href="inscription.php">S'enregistrer</a>
                </div>
            </div>
        </div>
    </div>

</body>
<?php include("../Ressources/Commun/footer.html") ?>
</html>