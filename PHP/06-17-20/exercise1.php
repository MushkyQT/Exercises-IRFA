<?php
/*
1) Comment on peut savoir le nombre de jours entre deux dates données en utilisant PHP?
*/

$date1 = date_create('2019-08-21');
$date2 = date_create('2020-06-17');
$diff = date_diff($date1, $date2);

echo date_format($date1,"Y/m/d") . ("<br>");
echo date_format($date2,"Y/m/d") . ("<br>");
echo $diff->format('La difference entre les deux dates est de %a jours');
?>