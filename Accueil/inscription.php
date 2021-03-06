<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Ressources/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styleInscription.css">

    <title>Inscription JDR Coding</title>
</head>
<body>
<form method="POST" action="postInscription.php">
  <div class="container">
    <div class="card">
        <img src="../Ressources/Commun/MotifBanniere.png">
      <div class="card-body">
            <label for="username"></label>
            <input id="username" name="username" type="text" placeholder="Nom d'utilisateur" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
            <label for="password"></label>
            <input id="password" name="password" type="password" placeholder="Mot de passe">
            <label for="confirm_password"></label>
            <input id="confirm_password" name="confirm_password" type="password" placeholder="Confirmer mot de passe">
            <?php if(isset($_SESSION['inscriptionError'])):?>
              <div class="error"><?= $_SESSION['inscriptionError']?></div>
            <?php endif; ?>
        </div>
        <div class="group_bouton">
            <button id="ajout" type="submit" class="btn btn-outline-secondary">S'inscrire</button>
            <button type="button" class="btn btn-dark"><a href="index.php">Accueil</a></button>
        </div>
      </div>
    </div>
</form>
<?php $_SESSION['inscriptionError'] = "" ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>