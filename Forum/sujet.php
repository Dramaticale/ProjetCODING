<?php
    include('appelSujet.php');

    $_SESSION['section'] = $_GET["section"];
    $_SESSION['slug'] = $_GET["sujet"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Ressources/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Ressources/commun/styleCommun.css">
    <link rel="stylesheet" href="../Forum/css/styleForum.css">
    <title><?=$sujet[0]['titre']?></title>
</head>
<body>
<?php
    include('../Ressources/Commun/banniere.html');
    include('../Ressources/Commun/navbar.php');
?>

<main>

    <div class="container">
    
        <div class="box-title-topic"><?=$sujet[0]['titre']?></div>

        <?php foreach ($tableauMessages as $tableauMessage) { ?>

        <div class="box-message">
        
            <div class="message-zone-infos">
                <div class="message-auteur"><?=$tableauMessage['auteur']?></div>
                <div class="message-date"><?=$date[$i]?></div>
            </div>

            <div class="message-zone-texte"><?=$tableauMessage['texte']?></div>
        
        </div>

        <?php 
            $i++;
        } ?>

        <form action="postSujet.php" method="POST">
            
            <div class="zone-answer">
                <div class="wrapper">
                    <textarea name="answer" class="answer-topic" required></textarea>
                    <input type="submit" id="submit-answer-topic" value="Répondre">
                </div>
                <div class="zone-error-sujet"><?=$_SESSION['errorAnswer']?></div>
            </div>

        </form>
    
    </div>

</main>

<?php
    include('../Ressources/Commun/footer.html');
    $_SESSION['errorAnswer'] = '';
?>
</body>
</html>