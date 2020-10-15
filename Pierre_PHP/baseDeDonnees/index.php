<?php

// PDO vs mysqli() (anciennement mysql())


// Etape 1: Se connecter

$hote = 'localhost';
$base = 'mabase';
$utilisateur = 'bibi';
$pass = 'coucou';

$maConnection = mysqli_connect($hote, $utilisateur, $pass, $base);

if (mysqli_connect_error()) {
    die("erreur connection<br>");
} else {
    echo "bien connecte<br>";
}

// Etape 2: Envoyer la requette SQL

//$maRequete = "SELECT * FROM maTable WHERE nom = 'patricia'";
//$maRequete = "SELECT * FROM maTable WHERE animal = 'zebre'";
$maRequete = "SELECT nom FROM maTable WHERE animal = 'zebre'";

if ($monResultat = mysqli_query($maConnection, $maRequete)) {
    echo "la requete est bien passee<br>";
    while ($laPremiereLigneQuiLuiTombeSousLeNez = mysqli_fetch_array($monResultat)) {
        embellisMaRequete($laPremiereLigneQuiLuiTombeSousLeNez);
    }
} else {
    echo "la requete a fail<br>";
}

function embellisMaRequete($uneLigneQuOnLuiPasse)
{
    global $mesDivs;
    $avant = "son prenom c'est ";
    $apres = " et voila<br><hr>";

    $prenom = $uneLigneQuOnLuiPasse['nom'];

    $maPhrase = $avant . $prenom . $apres;

    //$GLOBALS['mesDivs'] .= $maPhrase;
    $mesDivs .= $maPhrase;
}


// 1. Resoudre par recherche ici, ce probleme de scope
// Donc ou bien declarer la variable en tant que var global dans la fonction, ou bien l'appeler via l'array $GLOBALS[]

// 2. qu'on me range tous ces resultats dans un beau tableau bootstrap

// 3. Creer une nouvelle table avec plus de gens et plus de donnees
// prenom, nom, animal prefere, couleur prefere, plat prefere
// ajouter a la table suffisament de donnees pour pouvoir y faire les recherches suivantes:

// 4. Afficher toutes ces donnees dans un tableau bootstrap et creer les boutons suivants:
// - Afficher les gens dont l'animal preferer est le <select>
// - Afficher les gens dont le plat preferer est <select>
// - Afficher les gens dont la couleur preferee est <select> ET l'animal prefere est <select>

// ^^ L'exo se trouve dans exo.php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <title>Title</title>
</head>

<body>

    <h2>coucou</h2>

    <?php echo $mesDivs ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>