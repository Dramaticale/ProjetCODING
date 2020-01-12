<?php
    session_start();

    if ($_SESSION['userRole'] !== "admin") {
        if ($_SESSION['userRole'] !== "modo" || $_SESSION['userStatut'] === "banni") {
            header("Location: ../Forum/index.php");
            exit;
        }
    }
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
    <title>Statuts</title>
</head>
<body>
<?php
    include('../Ressources/Commun/banniere.html');
    include('../Ressources/Commun/navbar.php');
?>

<main>

    <div class="container" style="margin-top: 2em; margin-bottom: 2em">

        <form action="postStatusSearch.php" method="post">

            <label for="userSearch">Nom de l'utilisateur :</label>
            <input type="text" name="userSearch" required>
            <input type='submit' value="Chercher">

        </form><br>

        <?php if (isset($_SESSION['donneesUser'])) {
                if (empty($_SESSION['donneesUser'])) { ?>
                Aucun utilisateur ne correspond à ce nom.
        <?php } else { ?>

                <form action="postStatutChange.php" method="post">

                    <label for="statut"><?= $_SESSION['donneesUser'][0]['username'] ?></label>

                    <?php if ($_SESSION['donneesUser'][0]['statut'] === "libre") { ?>

                        <select name="statut">
                            <option value="libre" selected>libre</option>
                            <option value="banni">banni</option>
                        </select>

                    <?php } elseif ($_SESSION['donneesUser'][0]['statut'] === "banni") { ?>

                        <select name="statut">
                            <option value="libre">libre</option>
                            <option value="banni" selected>banni</option>
                        </select>

                    <?php } ?>

                    <?php if ($_SESSION['userRole'] === "admin") { ?>

                        <?php if ($_SESSION['donneesUser'][0]['role'] === "membre") { ?>

                            <select name="role">
                                <option value="membre" selected>membre</option>
                                <option value="modo">modo</option>
                                <option value="admin">admin</option>
                            </select>

                        <?php } elseif ($_SESSION['donneesUser'][0]['role'] === "modo") { ?>
                            
                            <select name="role">
                                <option value="membre">membre</option>
                                <option value="modo" selected>modo</option>
                                <option value="admin">admin</option>
                            </select>

                        <?php } elseif ($_SESSION['donneesUser'][0]['role'] === "admin") { ?>
                            
                            <select name="role">
                                <option value="membre" >membre</option>
                                <option value="modo">modo</option>
                                <option value="admin" selected>admin</option>
                            </select>

                        <?php } ?>

                    <?php } ?>

                <input type="submit" value="Changer">
                
                </form>

                <?php $_SESSION['donneesUserKeep'] = $_SESSION['donneesUser']; ?>

            <?php } ?>

        <?php } ?>

    </div>

</main>

<?php
    include('../Ressources/Commun/footer.html');

    if (isset($_SESSION['donneesUser'])) {
        unset($_SESSION['donneesUser']);
    }
?>
</body>
</html>