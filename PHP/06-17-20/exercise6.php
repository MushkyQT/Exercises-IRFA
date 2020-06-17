<?php
/*
6) Ci-dessous le résultat d’affichage d’un script php, donnez le script correspondant:
Lu Lundi 
Ma Mardi 
Me Mercredi 
Je Jeudi 
Ve Vendredi 
Sa Samedi 
Di Dimanche 
*/

$dates = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");

foreach ($dates as &$val) {
  echo (substr($val, 0, 2) . " " . $val . "<br>");
}

?>