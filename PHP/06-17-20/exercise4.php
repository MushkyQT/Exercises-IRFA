<?php
/*
4) Comment effectuer le passage par référence en PHP?
*/

$a = "mazel tov to the gang";
$b = &$a;

echo ("\$a = 'mazel tov to the gang';<br>\$b = &\$a;<br>");
echo ("Les deux variables \$a et \$b pointent vers la meme valeur. C'est faisable en definissant une variable avec '&' au debut.<br>");
echo ("(\$a, \$b) = 'mazel tov to the gang'");

?>