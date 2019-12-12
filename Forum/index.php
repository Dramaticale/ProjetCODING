<?php
include('appelNoms.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Ressources/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Ressources/commun/style.css">
    <link rel="stylesheet" href="../Forum/css/styleForum.css">
    <title>Forum</title>
</head>
<body>
<?php
    include('../Ressources/Commun/banniere.html');
    include('../Ressources/Commun/navbar.php');
?>
    <main>

            <?php foreach ($nomsCategories as $nomCategories) { ?>

                <div class="container">

                    <div class="box-categorie"><?=$nomCategories?></div>

                    <?php foreach ($nomsSections[$nomCategories] as $nomSection) { ?>

                       <div class="box-section"><?=$nomSection?></div>

                    <?php } ?>

                </div>
                
            <?php } ?>

    </main>

<?php
    include('../Ressources/Commun/footer.html');
?>

</body>
</html>