<?php
    session_start();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Ressources/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styleAccueil.css">
    <title>Wiki</title>
</head>
<body>
    <header>
        <?php include('../Ressources/Commun/banniere.html')?>
    </header>
    <nav>
        <?php include('../Ressources/Commun/navbar.php')?>
    </nav>
    <div class="container">
        <div class="card">
            <div class="texte">
                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias amet asperiores blanditiis
                    doloremque error esse fuga ipsum laborum minus odio odit omnis porro quaerat quo quod rerum,
                    sunt suscipit vel!
                </div>
            </div>
        </div>
        <div class="card">
            <div class="texte">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A blanditiis consequatur, ipsum iure libero magnam minima neque odit officia officiis, omnis, placeat quas quibusdam quis sunt tempora vitae. Aut, soluta.
            </div>
        </div>
        <div class="card">
            <div class="texte">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid assumenda commodi ducimus, et impedit inventore ipsum laboriosam nihil, porro possimus quibusdam quo, rem repudiandae sint voluptates voluptatibus voluptatum. Laudantium, quidem?
            </div>
        </div>
    </div>
    <?php include('../Ressources/Commun/footer.html')?>
</body>
</html>