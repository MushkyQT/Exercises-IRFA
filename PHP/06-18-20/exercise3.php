<?php
// 3) Ecrivez le code PHP qui permet de transformer une chaine de caractère de plusieurs mots, en passant
// le 1er caractère en Majuscule et tout le reste en minuscules.

$string = "ShRiNkRaY dO bE dO";

echo strtoupper(substr($string, 0, 1)) . strtolower(substr($string, 1));

// OR

echo "<br>Autre maniere:<br>";
echo ucfirst(strtolower($string));
