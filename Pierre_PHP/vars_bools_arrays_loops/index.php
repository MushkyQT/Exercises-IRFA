<?php

// Variables

$maVariable = "Robert";

$unBoutDePhrase = "je suis un bout de phrase";

$laSuite = "et moi je suis la suite de la phrase";

echo $unBoutDePhrase . $laSuite;

$monNombre = 34;

echo "Le resultat est " . ($monNombre = $monNombre * 45 / 6);

// Concatenation

echo "<p>coucou</p>";
echo "<p>" . $maVariable . "</p><br/><hr/>";
echo str_repeat($maVariable, 4);

for ($i = 0; $i < 4; $i++) {
    echo "<p>" . $maVariable . "</p>";
}

// Booleans

$myBoolean = false;
$myOtherBoolean = true;

if ($myBoolean) {
    echo "elle existe!";
} else {
    "elle existe pas!";
}

echo $myBoolean;
echo "<br/>";
echo $myOtherBoolean;
echo "<br/>";
echo var_dump($myBoolean);
echo "<br/>";
echo var_dump($myOtherBoolean);
echo "<br/>";
echo $myBoolean ? 'vrai' : 'faux' . "<br/>";

// Variable variables (dynamiques)

$prenom = "michel";
$unNomDeVariable = "prenom";
echo $$unNomDeVariable; // output: michel

// Tableaux
$monTableau = array("luc", "patricia", "pascal", "dauphin");
// echo "<br>Echo directe: <br>";
// echo $monTableau;
echo "<br>Print_r: <br>";
print_r($monTableau);
echo "<br>var_dump: <br>";
var_dump($monTableau);
echo "<br><br>";

$monTableau[2] = "pascalou";
echo "<br>";
print_r($monTableau);

// Ajouter un element "crevette" et "huitre" au tableau
echo "<br>";
$monTableau[] = "crevette";
print_r($monTableau);
echo "<br>";
array_push($monTableau, "huitre");
print_r($monTableau);

// Ajouter un element au tableau avec index personalisees
echo "<br>";
$monTableau["monFruitDeMerPrefere"] = "coquille saint-jacques";
print_r($monTableau);
echo "<br>";
echo ($monTableau["monFruitDeMerPrefere"]);
echo "<br>";

// Creer un tableau a indexes personalisees
$monAutreTableau = array(
    "unIndex" => "maChaine",
    "Zeeeede" => "un truc en Z",
    "monAutreIndex" => "uneAutreChaine",
    "monTroisiemeIndex" => "encore des autres trucs"
);

echo "<br><br>";
print_r($monAutreTableau);
echo "<br><br>";
echo var_dump($monAutreTableau);
echo "<br><br>";
echo "la longueur de monAutreTableau est de: " . sizeof($monAutreTableau);

// Loop a travers tableau a indexes personalisees

$mesTrucs = array(
    "outil" => "tournevis",
    "couvert" => "une fourchette",
    "bijou" => "un bracelet",
    "couvre-chef" => "un fedora noir mais avec des pois bleus et verts"
);

echo "<br>Le tableau mesTrucs:<br>";
$keys = array_keys($mesTrucs);
for ($i = 0; $i < sizeof($mesTrucs); $i++) {
    echo $mesTrucs[$keys[$i]] . "<br>";
}

echo "<br><br><br>";

foreach ($mesTrucs as $monElement) {
    echo $monElement . "<br>";
}

echo "<br><br><br>";

foreach ($mesTrucs as $key => $value) {
    echo "A l'index " . $key . " se trouve l'element: " . $value . "<br>";
}

$mesCards = "";

// Create cards:

foreach ($mesTrucs as $key => $value) {
    $mesCards .= '<div class="card"><div class="card-body"><h5 class="card-title">' . $key . '</h5><p class="card-text">' . $value . '</p></div></div>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="style.css">
    <title>Title</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <?php echo $mesCards ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>