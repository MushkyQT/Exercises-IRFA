<?php
// 2) Ecrivez le code PHP permettant d’afficher, sous forme de liste non ordonnée, les carrés des nombres de 1 à 20 
$squares = [];

echo "<ul>";
for ($i = 1; $i <= 20; $i++) {
    $squares[$i] = $i * $i;
    echo "<li>$i<sup>2</sup> = $squares[$i]</li>";
}
echo "</ul>";
