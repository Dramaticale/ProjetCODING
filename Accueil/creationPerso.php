<?php 
session_start();
if(!isset($_SESSION['userID'])){
    header('Location:index.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Veuillez créer votre personnage (maximum 15pts de caractéristiques au total)
    <form method="POST" action="postCreationPerso.php">
    <?php if(isset($_SESSION['erreurPerso'])): ?>
        <?=$_SESSION['erreurPerso']?>
    <?php endif; ?>
    <br>
        <input name="nom" value="nom">
        <input name="vie" value="vie">
        <input name="atq" value="atq">
        <button type="submit">Jouer</button>
    </form>
</body>
</html>
<?php $_SESSION['erreurPerso'] ='' ?>