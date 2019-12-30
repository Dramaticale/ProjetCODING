<html>
<head>
    <link rel="stylesheet" href="../Ressources/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Ressources/Commun/styleCommun.css">
</head>
<nav class="navbar navbar-expand-lg">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../Accueil/index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Accueil/wiki.php">Wiki</a>
                </li>
            <?php if(isset($_SESSION['check']) == 'log'): ?>
                <li class="nav-item">
                    <a class="nav-link" href="../Accueil/jeu.php">Jeu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Accueil/journal.php">Journal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Forum/index.php">Forum</a>
                </li>
                <li class="nav-item deconnexion">
                    Bonjour <?= $_SESSION['username'] ?> ! <a href="logout.php">Se déconnecter</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
</html>