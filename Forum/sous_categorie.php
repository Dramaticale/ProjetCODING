<?php
    include('appelSous_categorie.php');

    $_SESSION['sous_categorieID'] = $_GET['id'];
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
    <title><?=$donneesSous_categorie[0]['nom']?></title>
</head>
<body>
<?php
    include('../Ressources/Commun/banniere.html');
    include('../Ressources/Commun/navbar.php');
?>

<main>

    <div class="container">

        <?php if (!empty($donneesSujets)) {?>

            <div class="box-title-section">Sujets de : <?=strtolower($donneesSous_categorie[0]['nom'])?></div>

        <?php } else { ?>

            <div class="no-topic">Il n'y a actuellement aucun sujet dans la sous-catégorie <strong><?=strtolower($donneesSous_categorie[0]['nom'])?></strong>, pourquoi ne pas être le premier à en créer un ?</div>

        <?php } ?>

        <div>
            <?php foreach ($donneesSujets as $donneeSujets) {

                $resultat_dateheure = explode(' ', $donneeSujets['date_creation']);
                $resultat_date = explode('-', $resultat_dateheure[0]);
                $resultat_heure = explode(':', $resultat_dateheure[1]); ?>


                <div class="box-link">

                    <a href="./sujet.php?id=<?=$donneeSujets['id']?>">

                        <div class="box-link-text">

                            <div class="text-title-topic"><?=$donneeSujets['titre']?></div>
                            <div>Créé le <?=$resultat_date[2]?>/<?=$resultat_date[1]?>/<?=$resultat_date[0]?> à <?=$resultat_heure[0]?>:<?=$resultat_heure[1]?></div>

                        </div>

                    </a>

                </div>

            <?php } ?>
        </div>
        
        <div class="zone-topic-creation">

            <form action="postSous_categorie.php" method="POST">

                <label for="topic-title" class="label-creation-topic">Titre</label>
                <input type="text" name='topic-title' class="creation-title-topic" maxlength="128" required>

                <label for="creation-answer" class="label-creation-topic">Message</label>
                <textarea name="creation-answer" class="creation-answer-topic" required></textarea>

                <input type="submit" id="submit-creation-topic" value="Créer un nouveau sujet">

            </form>

            <div class="zone-error-section"><?=$_SESSION['error-creation-topic']?></div>

        </div>

    </div>

</main>

<?php
    include('../Ressources/Commun/footer.html');
    $_SESSION['error-creation-topic'] = '';
?>
</body>
</html>