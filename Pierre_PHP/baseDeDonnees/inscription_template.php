<?php

if (isset($_SESSION['siBienInscrit'])) {
    $siBienInscrit = true;
} else {
    $siBienInscrit = false;
}

$_SESSION['modeInscription'] = true;

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
                        $_SESSION['siBienInscrit'] = true;
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
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-4">
            <?php
            if ($siBienInscrit == true) {
                echo "<h3>le contenu qu'on veut voire</h3>";
                echo "<h2>Bravo, " . $newUser . ", tu t'es bien inscris.</h2>";
                echo "<a href='utilisateurs.php'>Revenir a l'acceuil</a>";
                session_unset();
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