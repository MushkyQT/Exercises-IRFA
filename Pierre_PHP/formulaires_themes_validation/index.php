<?php
$nom = "robert";
$onSeConnait = true;
if (($nom == "bob" || $nom == "robert") && $onSeConnait) {
    $message = "coucou " . $nom;
} else {
    $message = "je ne te connais pas";
}

$siOui = "<p>tiens, voila du fromage</p><img src='./img/fromage.jpg'>";
$siNon = "<p>OK, tant pis, t'aura pas de fromage</p>";
$resultatFromage = "le resultat apparaitera ici";
if (isset($_GET['ouiOuNon'])) {
    if ($_GET['ouiOuNon'] == "oui") {
        $resultatFromage = $siOui;
    } elseif ($_GET['ouiOuNon'] == "non") {
        $resultatFromage = $siNon;
    }
}

$siDauph = "<p>tiens, voila un vrai* dauphin</p><img src='./img/dauphin.jpg'>";
$siLicorne = "<p>tiens, une licorne magique!</p><img src='./img/licorne.png'>";
$resultatAnimal = "le resultat apparaitera ici";
if (isset($_GET['dauphinOuLicorne'])) {
    if ($_GET['dauphinOuLicorne'] == "dauphin") {
        $resultatAnimal = $siDauph;
    } elseif ($_GET['dauphinOuLicorne'] == "licorne") {
        $resultatAnimal = $siLicorne;
    }
}

$styleLight = "css/style.css";
$styleBleu = "css/styleBleu.css";
$styleFinal = $styleBleu;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="<?php echo $styleFinal; ?>">
    <title>Title</title>
</head>

<body>

    <p>Un peu de text</p>
    <p><?php echo $message; ?></p>

    <br />

    <div class="container-fluid">
        <div class="row d-flex flex-column">
            <p>Tu veux voir du fromage?</p>
            <form method="GET">
                <label for="ouiOuNon">Oui</label>
                <input type="radio" name="ouiOuNon" value="oui" checked>
                <label for="ouiOuNon">Non</label>
                <input type="radio" name="ouiOuNon" value="non">
                <input type="submit" value="Lancer">
            </form>
            <div><?php echo $resultatFromage; ?></div>

            <p>Tu veux voir un dauphin? Une licorne?</p>
            <form method="GET">
                <label for="dauphinOuLicorne">Dauphin</label>
                <input type="radio" name="dauphinOuLicorne" value="dauphin" checked>
                <label for="dauphinOuLicorne">Licorne</label>
                <input type="radio" name="dauphinOuLicorne" value="licorne">
                <input type="submit" value="Lancer">
            </form>
            <div><?php echo $resultatAnimal; ?></div>
        </div>

        <div class="carre"></div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>