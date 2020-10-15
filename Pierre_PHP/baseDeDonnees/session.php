<?php

session_start();

//$_SESSION['couleur'] = 'bleu';
//$maCouleur = $_SESSION['couleur'];

if (isset($_POST['animal'])) {
    $maVariable = "<br><br>" . $_POST['animal'];

    $_SESSION['animalStocke'] = $maVariable;
}

$animalAAfficher = $_SESSION['animalStocke'];

echo "<br><br>" . $animalAAfficher;
//echo $maVariable;

?>

<form action="" method="post">
    <input type="submit" name="animal" value="ecureuil">
</form>