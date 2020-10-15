<?php

$monTableauBootstrap = "";
$monSelectAnimaux = "";

$maRequetePourTout = "SELECT * FROM maTable";

function afficheTableau($unTableau)
{

    $prenom = $unTableau['nom'];
    $animal = $unTableau['animal'];
    $valueDuBoutonSupprimer = $unTableau['id'];
    $boutonsSupprimerEtModifier = "<td>
            <button class='btn btn-warning boutonModifier' >Modifier</button>
            <form action='' method='post'>
                <button type='submit'  value='" . $valueDuBoutonSupprimer . "' name='boutonSupprimer' class='btn btn-danger'>Supprimer</button>
            </form>
        </td>
        ";

    $RowBootstrap = "<tr><td>" . $prenom . "</td><td>" . $animal . "</td>" . $boutonsSupprimerEtModifier . "</tr>";

    global $monTableauBootstrap;

    $monTableauBootstrap .= $RowBootstrap;
}

function afficheLeSelectAnimal($unTableau)
{

    $animal = $unTableau['animal'];


    $optionPourLeSelect = "<option value='" . $animal . "'>" . $animal . "</option>";
    global $monSelectAnimaux;

    if (strpos($monSelectAnimaux, $optionPourLeSelect) === false) {

        $monSelectAnimaux .= $optionPourLeSelect;
    }
}

function creeMaRequeteAnimaux($animal)
{


    $maRequeteAnimalPrefere = "SELECT * FROM maTable WHERE animal = '" . $animal . "'";

    return $maRequeteAnimalPrefere;
}

if (isset($_POST['boutonSupprimer'])) {

    $idASupprimer = $_POST['boutonSupprimer'];

    $maRequeteDeSuppression = "DELETE FROM `maTable` WHERE `maTable`.`id` = " . $idASupprimer;
    //echo $maRequeteDeSuppression.'<br>';

    if ($reponseRequete =  mysqli_query($myConnection, $maRequeteDeSuppression)) {

        echo 'requete suppression OK';
    } else {

        echo 'Requete suppression foirée';
    }
}


if (isset($_POST['prenomAModifier']) && isset($_POST['animalAModifier']) && isset($_POST['idAModifier'])) {

    $prenomAModifier = $_POST['prenomAModifier'];
    $animalAModifier = $_POST['animalAModifier'];
    $idAModifier =  $_POST['idAModifier'];

    $maRequeteModificationDeDonnees = "UPDATE `maTable` SET `nom` = '" . $prenomAModifier . "', `animal` = '" . $animalAModifier . "' WHERE `maTable`.`id` =" . $idAModifier;

    if ($reponseRequete =  mysqli_query($myConnection, $maRequeteModificationDeDonnees)) {

        echo 'requete modif Entrée OK';
    } else {

        echo 'Requete modif Entrée foirée';
    }
}


if (isset($_POST['nouveauPrenom'])   &&   (isset($_POST['nouvelAnimal']) ||  isset($_POST['animal']))) {

    $nouveauPrenom = $_POST['nouveauPrenom'];

    if (isset($_POST['nouvelAnimal'])) {

        $nouvelAnimal = $_POST['nouvelAnimal'];
    } elseif (isset($_POST['animal']) && isset($_POST['ajouterAnimalExistant'])) {

        $nouvelAnimal = $_POST['animal'];
    }

    if ($nouveauPrenom != ""    &&  $nouvelAnimal != "") {


        $maRequeteAjoutDeDonnees = "INSERT INTO `maTable`(`nom`,`animal`) VALUES ('" . $nouveauPrenom . "','" . $nouvelAnimal . "')";

        if ($reponseRequete =  mysqli_query($myConnection, $maRequeteAjoutDeDonnees)) {

            echo 'requete Nouvelle Entrée OK';
        } else {

            echo 'Requete Nouvelle Entrée foirée';
        }
    } else {

        echo 'Déso, les deux champs sont obligatoires pour ajouter une entrée au tableau';
    }
}


if (isset($_POST['animal']) && isset($_POST['boutonAnimal'])) {
    $animalDemande = $_POST['animal'];
    //$monTableauBootstrap = "";

    $maRequeteAnimalPrefere = creeMaRequeteAnimaux($animalDemande);

    if ($reponseRequete =  mysqli_query($myConnection, $maRequeteAnimalPrefere)) {

        echo 'requete OK';

        while ($maRow = mysqli_fetch_array($reponseRequete)) {

            // afficheTableau($maRow);


            afficheTableau($maRow);
        }
    } else {

        echo 'Requete foirée';
    }
} else {

    if ($reponseRequete =  mysqli_query($myConnection, $maRequetePourTout)) {

        echo 'requete OK';

        while ($maRow = mysqli_fetch_array($reponseRequete)) {

            afficheTableau($maRow);
        }
    } else {

        echo 'Requete foirée';
    }
}

//requete qui affiche la liste des animaux dans le select


//$maRequetePourLesAnimaux = "SELECT DISTINCT animal FROM maTable";
$maRequetePourLesAnimaux = "SELECT animal FROM maTable";

if ($reponseRequete =  mysqli_query($myConnection, $maRequetePourLesAnimaux)) {

    echo 'requete OK';

    while ($maRow = mysqli_fetch_array($reponseRequete)) {

        // afficheTableau($maRow);
        afficheLeSelectAnimal($maRow);
    }
} else {

    echo 'Requete foirée';
}
?>

<h2>notre tableau de requetes SQL</h2>

<table class="table table-dark table-striped">
    <thead>
        <th>Prenom</th>
        <th>Animal Préféré</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php echo $monTableauBootstrap ?>
    </tbody>
</table>

<form action="" method="post">
    <label for="animal">Afficher au tableau les personnes dont l'animal préféré est :</label>
    <select name="animal" id="">
        <?php echo $monSelectAnimaux ?>
    </select>
    <input class="btn btn-primary" type="submit" name="boutonAnimal" value="Go !">
</form>

<form method="POST">
    <input class="btn btn-primary" type="submit" name="reinitialiser" value="Afficher TOUT !">
</form>

<form action="" method="post">
    <label for="nouveauPrenom">Prenom</label>
    <input type="text" name="nouveauPrenom" placeholder="Entrez un prenom" id="" required>
    <label for="nouvelAnimal">Animal</label>
    <input type="text" name="nouvelAnimal" placeholder="Votre animal préféré" id="" required>
    <input class="btn btn-primary" type="submit" name="ajouterGhislain" value="Ajouter une nouvelle entrée au tableau">
</form>

<form action="" method="post">
    <label for="nouveauPrenom">Prenom</label>
    <input type="text" name="nouveauPrenom" placeholder="Entrez un prenom" id="" required>
    <label for="nouvelAnimal">Animal</label>
    <select name="animal" id="">
        <?php echo $monSelectAnimaux ?>
    </select>
    <input class="btn btn-primary" type="submit" name="ajouterAnimalExistant" value="Ajouter une nouvelle entrée au tableau avec un animal existant">
</form>