<?php
    session_start();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Ressources/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styleAccueil.css">
    <title>Jeu - CODING</title>
</head>
<body>
    <header>
        <?php include('../Ressources/Commun/banniere.html')?>
    </header>
    <nav>
        <?php include('../Ressources/Commun/navbar.php')?>
    </nav>
    <div class="containerJeu">
        <?php if(isset($_SESSION['check']) == 'log'): ?>
            <div class="jeu">
                pwet
                <button type="button" class="btn btn-dark">Dark</button>
            </div>
        <?php endif; ?>
    </div>
    <?php include('../Ressources/Commun/footer.html')?>
</body>
</html>