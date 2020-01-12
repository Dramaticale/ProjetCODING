<?php
    include('appelIndex.php')
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
    <title>Forum</title>
</head>
<body>
<?php
    include('../Ressources/Commun/banniere.html');
    include('../Ressources/Commun/navbar.php');
?>
    <main>

            <?php foreach ($donneesCategorie as $donneeCategorie) { ?>

                <div class="container">

                    <div class="box-categorie"><?=$donneeCategorie['nom']?></div>

                    <div>    

                        <?php foreach ($donneesSous_categorie as $donneeSous_categorie) { ?>

                            <?php if ($donneeSous_categorie['categorie_id'] === $donneeCategorie['id']) { ?>

                                <div class="box-link"><a href="./sous_categorie.php?id=<?=$donneeSous_categorie['id']?>"><div class="link"><?=$donneeSous_categorie['nom']?></div></a></div>

                            <?php } ?>

                        <?php } ?>

                    </div>

                </div>
                
            <?php } ?>

    </main>


<?php
    include('../Ressources/Commun/footer.html');
?>
</body>
</html>