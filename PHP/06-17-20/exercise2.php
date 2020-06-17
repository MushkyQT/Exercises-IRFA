<?php
/*
2) Quelle est la différence entre $message et $$message?
*/

$message = ("entretemps");
$$message = ("j'ai pleurer");

echo ("La variable \$message contient: " . $message);
echo ("<br>La variable \$\$message contient la valeur: " . $$message);
echo ("<br>Et finalement, apres l'utilisation de \$\$message qui a comme valeur le string 'j'ai pleurer', la variable dynamiquement cree \$entretemps contient: " . $entretemps);

echo("<br>\$message contient une valeur definis, et puis \$\$message contient aussi une valeur mais qui s'associe a la valeur originale de \$message. C'est un alias pour la valeur de \$message.");

?>