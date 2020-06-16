<!DOCTYPE html>
<html>

<?php
  $x = null;
?>

<head>
  <?php
  echo ("<h1>Titre principal</h1>");
  echo ("La valeur de \$x globale est: " . $x . "</br>");
  ?>
</head>

<body>
  <?php
  $x = 5;
  $y = 1;
  $z = "<p> Un paragraphe </p>";
  echo ("La valeur de \$x locale est: " . $x . "</br>");
  echo ("\$y contient la valeur: " . $y . "</br>");
  echo ("\$y contient la valeur: " . $y . "</br>");
  echo ("La variable locale \$z contient:" . $z);
  ?>
</body>

</html>