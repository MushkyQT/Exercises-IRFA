<?php

session_start();

include_once('creds.php');
$myConnection = mysqli_connect($host, $user, $pass, $db);
if (mysqli_connect_error()) {
    die("Connection to database failed.<br>");
}

$utilisateurConnecte = false;

if (isset($_SESSION['modeInscription']) || isset($_POST['modeInscription'])) {
    $modeInscription = true;
} else {
    $modeInscription = false;
}

if (isset($_POST['deconnexion'])) {
    session_unset();
}

if (isset($_SESSION['nomUtilisateur']) && isset($_SESSION['motDePasse'])) {
    $_POST['nomUtilisateur'] = $_SESSION['nomUtilisateur'];
    $_POST['motDePasse'] = $_SESSION['motDePasse'];
}

if (isset($_POST['nomUtilisateur']) && isset($_POST['motDePasse'])) {
    // un utilisateur a envoye des infos en cliquant sur submit
    // on veut verifier si les deux champs ont ete remplis
    // on recupere le nom et mot de passe dans nos propres variables
    $nomUtilisateurEntre = $_POST['nomUtilisateur'];
    $motDePasseEntre = $_POST['motDePasse'];

    // on peut verifier si leur longueur > 0
    // on peut verifier s'ils sont different de ""
    if ($nomUtilisateurEntre != "" && $motDePasseEntre != "") {
        $myRequest = "SELECT * FROM `utilisateurs` WHERE `utilisateurs`.`nom` = '" . $nomUtilisateurEntre . "'";
        if ($currentResult = mysqli_query($myConnection, $myRequest)) {
            echo "Request done.<br>";
            $myResult = mysqli_fetch_array($currentResult);
            if ($myResult) {
                echo "Utilisateur existe.<br>";
                $leBonMotDePasse = $myResult['motDePasse'];
                if ($motDePasseEntre == $leBonMotDePasse) {
                    echo "Bon mot de passe.<br>";
                    $utilisateurConnecte = true;
                    $_SESSION['nomUtilisateur'] = $nomUtilisateurEntre;
                    $_SESSION['motDePasse'] = $motDePasseEntre;
                } else {
                    echo "Mauvais mot de passe pour " . $nomUtilisateurEntre . ".<br>";
                }
            } else {
                echo "Utilisateur n'existe pas.<br>";
            }
        } else {
            echo "Request failed.<br>";
        }
    } else {
        echo "Les deux champs sont requis pour se connecter. Veule.<br>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="style.css">
    <title>Title</title>
</head>

<body>

    <?php
    if ($utilisateurConnecte == true) {
        echo "<h2>Bonjour, " . $nomUtilisateurEntre . "!";
        echo '<form method="post">
        <button type="submit" class="btn btn-secondary" name="deconnexion">Se Deconnecter</button>
    </form><br><br><br>';
        include('exo2_pierre_modif_utilisateurs.php');
    } elseif ($modeInscription == true) {
        include('inscription_template.php');
    } else {
        echo '<div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-3">
                <form method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="nomUtilisateur" class="form-control" id="exampleInputEmail1" placeholder="Enter username" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="motDePasse" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <form method="post">
                    <button type="submit" class="btn btn-success" name="modeInscription">S\'inscrire</button>
                </form>
            </div>
        </div>
    </div>';
    }
    ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- Script pour le template -->
    <script src="main.js" type="text/javascript"></script>
</body>

</html>