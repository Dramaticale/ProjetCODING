<html>
<head>
    <link rel="stylesheet" href="../Ressources/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Ressources/Commun/styleCommun.css">
</head>
<nav class="navbar navbar-expand-lg">
    <a class="nav-link" href="index.php">Accueil</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php if(isset($_SESSION['check']) == 'log'): ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">Jeu</a>
                </li>
            <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="wiki">Wiki</a>
                </li>
            <?php if(isset($_SESSION['check']) == 'log'): ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">Forum</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
</html>