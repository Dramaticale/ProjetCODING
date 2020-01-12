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
    <link rel="stylesheet" href="../Ressources/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styleAccueil.css">
    <title>Projet Yschools - Jeu de Rôles</title>
</head>
<body>
    <header>
        <?php include("../Ressources/Commun/banniere.html") ?>
    </header>
    <?php include("../Ressources/Commun/navbar.php") ?>
    <div class="container">
        <?php if(isset($_SESSION['check']) == null): ?>
            <div class="card">
                <div class="texte">
                    blablabla
                </div>
            </div>
        <?php endif; ?>
        <?php if(isset($_SESSION['check']) == 'log'): ?>
            <div class="containerArticle">
                <div class="card">
                    <div class="texte">
                        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias amet asperiores blanditiis
                            doloremque error esse fuga ipsum laborum minus odio odit omnis porro quaerat quo quod rerum,
                            sunt suscipit vel!
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="texte">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A blanditiis consequatur, ipsum iure libero magnam minima neque odit officia officiis, omnis, placeat quas quibusdam quis sunt tempora vitae. Aut, soluta.
                    </div>
                </div>
                <div class="card">
                    <div class="texte">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid assumenda commodi ducimus, et impedit inventore ipsum laboriosam nihil, porro possimus quibusdam quo, rem repudiandae sint voluptates voluptatibus voluptatum. Laudantium, quidem?
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if(isset($_SESSION['check']) == null): ?>
            <div class="card">
                <div class="connexion">
                    <form method="POST" action="postlogin.php">
                        <div class="identifiant">
                            <input class="form-control mr-sm-2" type="text" id="username" name ="username" placeholder="Identifiant">
                        </div>
                        <div class="motDePasse">
                            <input class="form-control mr-sm-2" type="password" id ="password" name="password" placeholder="Mot de passe">
                        </div>
                        <?php if(isset($_SESSION['error'])):?>
                            <div class="error"><font color="red"><?= $_SESSION['error']?></font></div>
                        <?php endif; ?>
                        <div class="bouton">
                            <button class="btn btn-outline-dark" type="submit">Se connecter</button>
                        </div>    
                        <div class="inscription">
                            Pas de compte ? <a href="inscription.php">S'enregistrer</a>
                        </div>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <?php include("../Ressources/Commun/footer.html") ?>
</body>
</html>
<?php $_SESSION['error'] = ''?>