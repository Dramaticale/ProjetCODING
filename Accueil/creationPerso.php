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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .form-stat {
            display: flex;
            margin: 15px 0;
        }

        .form-stat > .stat-value {
            margin: 0 15px;
        }

        .form-stat > .btn-container {
            margin-left: auto;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
            Veuillez créer votre personnage (maximum 15pts de caractéristiques au total)
            <form method="POST" action="postCreationPerso.php">
                <div class="form-group">
                    <label for="nom"></label>
                    <input type="text" name="name" id="nom" class="form-control">
                </div>
                <div class="stats-remaining"><span id="stats">15</span> points restants</div>
                <div class="form-stat">
                    <div class="stat-name">Attaque : </div>
                    <div class="stat-value" id="atq">0</div>
                    <input type="hidden" name="atq" value="0">
                    <div class="btn-container">
                        <button id="atqPlus" class="btn btn-primary">+</button>
                        <button id="atqMoins" class="btn btn-primary">-</button>
                    </div>
                </div>
                <div class="form-stat">
                    <div class="stat-name">Vie : </div>
                    <div class="stat-value" id="vie">0</div>
                    <input type="hidden" name="vie" value="0">
                    <div class="btn-container">
                        <button id="viePlus" class="btn btn-primary">+</button>
                        <button id="vieMoins" class="btn btn-primary">-</button>
                    </div>
                </div>
                <button type="submit">Jouer</button>
            </form>
        </div>
    </div>
</div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    const atqPlus = document.getElementById('atqPlus')
    const atqMoins = document.getElementById('atqMoins')
    const viePlus = document.getElementById('viePlus')
    const vieMoins = document.getElementById('vieMoins')

    const statsCtrn = document.getElementById('stats')
    const vieCtrn = document.getElementById('vie')
    const atqCtrn = document.getElementById('atq')

    const inputAtq = document.querySelector('input[name="atq"]')
    const inputVie = document.querySelector('input[name="vie"]')
    
    atqPlus.addEventListener('click', (e) => {
        e.preventDefault()
        if(statsCtrn.innerHTML > 0){
            inputAtq.value++
            statsCtrn.innerHTML--
            atqCtrn.innerHTML++
        }
    })

    atqMoins.addEventListener('click', (e) => {
        e.preventDefault()
        
        if(atqCtrn.innerHTML > 0){
            inputAtq.value--
            atqCtrn.innerHTML--
            statsCtrn.innerHTML++
        }
    })

    viePlus.addEventListener('click', (e) => {
        e.preventDefault()
        if(statsCtrn.innerHTML > 0){
            inputVie.value++
            vieCtrn.innerHTML++
            statsCtrn.innerHTML--
        }
    })

    vieMoins.addEventListener('click', (e) => {
        e.preventDefault()        
        if(vieCtrn.innerHTML > 0){
            inputVie.value--
            vieCtrn.innerHTML--
            statsCtrn.innerHTML++
        }
    })

</script>
</body>
</html>