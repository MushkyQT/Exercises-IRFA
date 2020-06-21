<?php
/*06-15-20 4) Créez un deuxième fichier permettant d’afficher à la suite de la date, le message "Bon matin" ou "Bonne après midi"
en fonction de l’heure sur le serveur.*/

$time = date("H");
$date = date("m/d/y");

if ($time < 12) {
    echo $date . " Bon matin";
} else {
    echo $date . " Bonne apres midi";
}
