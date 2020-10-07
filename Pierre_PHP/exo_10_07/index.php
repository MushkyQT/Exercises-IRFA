<?php

require 'members.php';

$unSecret = '
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">J\'ai manger le dernier Avatar</h5>
        <p class="card-text"></p>
    </div>
</div>
';
$revelation = "";
$loggedIn = false;

if ($_GET && $_GET['utilisateur'] && $_GET['motDePasse']) {
    $user = $_GET['utilisateur'];
    $pass = $_GET['motDePasse'];
    if (array_key_exists($user, $membres) && $membres[$user] == $pass) {
        $revelation = "Successfully logged in as $user. HAVE A SECRET!";
        $loggedIn = true;
    } else {
        $revelation = "$user not found or password incorrect.";
    }
} else {
    $revelation = "Please enter a username AND a password.";
}

if ($loggedIn) {
    include 'secret.php';
} else {
    $mainArea = '
    <div class="secret shadow">
        <p>Logue-toi pour qu\'on te revele l\'ultime secret... si tu l\'ose</p>
        <div class="revelation">' . $revelation . '</div>
    </div>
    ';
}

// 1. Si un utilisateur faisant parti du tableau tante de se connecter et a entre le bon mot de passe, alors on
// peut reveler $unSecret dans la div revelation.

// 2. Remplacer le contenu de $unSecret par un module de cette page web beaucoup
// plus developpe, plusieurs fois la meme card avec le meme contenu (dauphin)

// 3. Le contenu de ce qui apparait si l'on est connecte n'est plus stocke dans
// index.php, mais sur un autre feuille php qui sera donc un template par exemple templateDeCardDauphin.php
// il faudra trouver un moyen de recuperer ce contenu depuis index.php pour l'ajouter a cette derniere
// ** se renseigner sur les methodes alternatives qui font a peu pres la meme chose

// 4. Reprendre ce template et de n'y mettre qu'une card dauphin "type"
// et automatiser la generation de 6 cards identiques plutot qu'une seule
// sur la page index.php



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Title</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light ciaNav">
        <a class="navbar-brand" href=".">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/25/Seal_of_the_Central_Intelligence_Agency.svg/600px-Seal_of_the_Central_Intelligence_Agency.svg.png" width="60" height="60">
            Black Site Login
        </a>
        <form class="nav w-100 justify-content-end">
            <input type="text" name="utilisateur" placeholder="Nom d'utilisateur" class="form-control form-control-edits">
            <input type="password" name="motDePasse" placeholder="Mot de passe" class="form-control form-control-edits">
            <input type="submit" name="envoyer" class="form-control form-control-edits sendIt">
        </form>
    </nav>

    <div class="container mainArea">
        <?php echo $mainArea ?>

    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>