<?php
    include('appelSujet.php');
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
    <title><?=$donneesSujets[0]['titre']?></title>
</head>
<body>
<?php
    include('../Ressources/Commun/banniere.html');
    include('../Ressources/Commun/navbar.php');
?>

<main>

    <div class="container">
    
        <div class="box-title-topic"><?=$donneesSujets[0]['titre']?></div>

        <div class="box-message">
        
        <div class="message-zone-infos" >
            <div class="message-auteur"><?=$nomAuteur[0]['username']?></div>
            <div class="message-date"><?=$resultat_heure[0]?>:<?=$resultat_date[1]?> <?=$resultat_date[2]?>/<?=$resultat_date[1]?>/<?=$resultat_date[0]?></div>
        </div>

        <div class="message-zone-texte"><?=$donneesSujets[0]['message']?></div>
    
        </div>

        <?php foreach ($donneesCommentaires as $donneeCommentaires) { 
            
        $auteur = $bdd->query("SELECT user.username FROM user WHERE user.id = {$donneeCommentaires['user_id']}");

        $nomAuteur = $auteur->fetchall(PDO::FETCH_ASSOC); 
        
        $resultat_dateheure = explode(' ', $donneeCommentaires['date']);
        $resultat_date = explode('-', $resultat_dateheure[0]);
        $resultat_heure = explode(':', $resultat_dateheure[1]); ?>

        <div class="box-message">
        
            <div class="message-zone-infos">
                <div class="message-auteur"><?=$nomAuteur[0]['username']?></div>
                <div class="message-date"><?=$resultat_heure[0]?>:<?=$resultat_date[1]?> <?=$resultat_date[2]?>/<?=$resultat_date[1]?>/<?=$resultat_date[0]?></div>
            </div>

            <div class="message-zone-texte"><?=$donneeCommentaires['texte']?></div>
        
        </div>

        <?php } ?>

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