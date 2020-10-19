<?php

// mes donnees de test recuperees depuis la BDD
include('authentification/dbConnect.php');

function recupereToutesLesCartes()
{
    global $myConnection;
    $myRequest = "SELECT `titre` AS `titreCard`, `contenu` AS `texteCard` FROM `cartes`";
    if ($myResult = mysqli_query($myConnection, $myRequest)) {
        $mesDonnees = array();
        while ($myRow = mysqli_fetch_array($myResult)) {
            $mesDonnees[] = $myRow;
        }
        return $mesDonnees;
    } else {
        return "DB request failed.<br>";
    }
}
