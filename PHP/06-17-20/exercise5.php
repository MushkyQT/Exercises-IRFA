<?php
/*
5) Ecrire un script php qui permet de déclarer une variiable et de vérifier son existence.
*/

$a = array(
  0 => "bar",
  1 => "foo",
  2 => "foobar",
);
$i = 3;

print_r ($a);

if (isset($a[$i])) {
  echo ("<br>The variable \$a[$i] exists.");
} else {
  echo ("<br>The variable \$a[$i] does not exist.");
}

?>