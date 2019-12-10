<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../Ressources/bootstrap-4.3.1-dist/css/bootstrap.min.css">

    <title>Inscription JDR Coding</title>
</head>
<body>
<form method="POST" action="postInscription.php">
  <div class="containerInscription">
  <div class="cardInscription">
      <img src="MotifBanniere.png">
    <div class="card-body">
      <div class="champs">
          <label for="username"></label>
          <input id="username" name="username" type="text" placeholder="Username" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
          <label for="password"></label>
          <input id="password" name="password" type="password" placeholder="Password">
          <label for="confirm_password"></label>
          <input id="confirm_password" name="confirm_password" type="password" placeholder="Confirm password">
          <?php if(isset($_SESSION['inscriptionError'])):?>
          <div class="error"><?= $_SESSION['inscriptionError']?></div>
        <?php endif; ?>
      </div>
      <div class="group_bouton">
          <button id="ajout" type="submit" class="btn btn-outline-secondary">S'inscrire</button>
      </div>
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
</body>
</html>