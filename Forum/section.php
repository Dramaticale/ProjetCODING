<?php
    include('appelSection.php');

    $_SESSION['section'] = $_GET["section"]
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
    <title><?=$_GET['section']?></title>
</head>
<body>
<?php
    include('../Ressources/Commun/banniere.html');
    include('../Ressources/Commun/navbar.php');
?>

<main>

    <div class="container">
        <div class="box-title-section">Sujets de <?=$_GET['section']?></div>

        <div>
            <?php foreach ($nomsSujets as $nomSujets) {?>

                <div class="box-link">
                    <a href="./sujet.php?section=<?=$_GET['section']?>&sujet=<?=$nomSujets['slug']?>">
                        <div class="box-link-text">
                            <div class="text-title-topic"><?=$nomSujets['titre']?></div>
                            <div>Dernier message le <?=$date[$i]?></div>
                        </div>
                    </a>
                </div>

            <?php 
                $i++;
            } ?>
        </div>
        
        <div class="zone-topic-creation">

            <form action="postSection.php" method="POST">

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