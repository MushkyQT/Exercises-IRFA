<!DOCTYPE html>
<html>

<head>
    <?php
    $x = 10;
    echo ("<h1>Titre principal</h1>");
    ?>
</head>

<body>
    <?php
    echo ("La valeur de \$x globale est: " . $x . "</br>");
    $x = 15;
    echo ("\$x contient maintenant: " . $x);
    echo ("<p>Un paragraphe</P>");
    ?>
</body>

</html>