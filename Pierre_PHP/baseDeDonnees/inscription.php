<?php

include_once('creds.php');
$myConnection = mysqli_connect($host, $user, $pass, $db);
if (mysqli_connect_error()) {
    die("Connection to database failed.<br>");
}

$siBienInscrit = false;

if ($_POST) {
    if (isset($_POST['newUser']) && isset($_POST['newPass']) && isset($_POST['newPassConfirm'])) {
        $newUser = $_POST['newUser'];
        $newPass = $_POST['newPass'];
        $newPassConfirm = $_POST['newPassConfirm'];

        // Verifier si les champs ne sont pas vide
        // Verifier si les conditions de creation de nom d'utilisateur et mdp sont remplies
        // I.E. pas de caracteres speciaux dans l'username (patri$$ck) et longueur min/max
        // I.E. mot de passe assez secure (au moins une maj, un caractere special, un chiffre, une longueur min/max)
        if ($newUser != "" && $newPass != "" && $newPassConfirm != "") {
            // Verifier si les deux mots de passe sont bien identiques
            if ($newPass == $newPassConfirm) {
                // Verifier si le nom d'utilisateur n'est pas deja pris
                $availabilityCheck = "SELECT * FROM `utilisateurs` WHERE `nom` = '" . $newUser . "'";
                $myResult = mysqli_query($myConnection, $availabilityCheck);
                if (mysqli_num_rows($myResult) != 0) {
                    echo "Your chosen username has already been taken. Please try something else.";
                } else {
                    // Add user to db
                    $addUserRequest = "INSERT INTO `utilisateurs` (`nom`, `motDePasse`) VALUES ('" . $newUser . "', '" . $newPass . "')";
                    if ($myResult = mysqli_query($myConnection, $addUserRequest)) {
                        echo "Created account for " . $newUser . ".";
                        $siBienInscrit = true;
                    } else {
                        echo "Account creation fail.";
                    }
                }
            } else {
                echo "Your passwords do not match, please try again carefully.";
            }
        } else {
            echo "Please submit a value for all three fields.";
        }
    } else {
        echo "Please submit a value for all three fields.";
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
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-4">
                <?php
                if ($siBienInscrit) {
                    echo "<h3>le contenu qu'on veut voire</h3>";
                    echo "<h2>Bravo, " . $newUser . ", tu t'es bien inscris.</h2>";
                } else {
                    echo '<form method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="newUser" placeholder="Enter username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="newPass" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="passwordConfirmation">Confirm password</label>
                        <input type="password" class="form-control" id="passwordConfirmation" name="newPassConfirm" placeholder="Re-type password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>';
                }
                ?>
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>