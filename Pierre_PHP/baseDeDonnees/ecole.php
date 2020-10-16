<?php

$host = 'localhost';
$db = 'ecolePublique';
$user = 'directeur';
$pass = 'wahoo';

$myConnection = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_error()) {
    die("Connection to database failed.<br>");
}

$mesEleves = "";
$myRequestEleve = "SELECT * FROM `eleves`";
if ($myResult = mysqli_query($myConnection, $myRequestEleve)) {
    while ($currentResult = mysqli_fetch_array($myResult)) {
        $prenomEleve = $currentResult['prenom'];
        $ageEleve = $currentResult['age'];
        $couleurPrefEleve = $currentResult['couleurPref'];

        $monTRduTableauBootstrapEleve = "<tr><td>" . $prenomEleve . "</td><td>" . $ageEleve . "</td><td>" . $couleurPrefEleve . "</td></tr>";

        $mesEleves .= $monTRduTableauBootstrapEleve;
    }
} else {
    echo "DB request failed.<br>";
}

$mesParents = "";
$myRequestParent = "SELECT * FROM `parents`";
if ($myResult = mysqli_query($myConnection, $myRequestParent)) {
    while ($currentResult = mysqli_fetch_array($myResult)) {
        $prenomParent = $currentResult['prenom'];
        $ageParent = $currentResult['age'];

        $monTRduTableauBootstrapParent = "<tr><td>" . $prenomParent . "</td><td>" . $ageParent . "</td></tr>";

        $mesParents .= $monTRduTableauBootstrapParent;
    }
} else {
    echo "DB request failed.<br>";
}


// $testRequest = "SELECT * FROM `eleves` WHERE `prenom` = 'julie'";
// $testRequestMulti = "SELECT * FROM `parents`, `eleves` WHERE `parents`.`prenom` = 'michel' AND `eleves`.`prenom` = 'julie'";
$testRequestMultiJoin = "SELECT * FROM eleves INNER JOIN parents WHERE `parents`.`prenom` = 'michel' AND `eleves`.`prenom` = 'julie'";
if ($myResult = mysqli_query($myConnection, $testRequestMultiJoin)) {
    $currentResult = mysqli_fetch_array($myResult);
    $prenomEleve = $currentResult[1];
    $ageEleve = $currentResult[2];
    $couleurPrefEleve = $currentResult[3];
    $prenomParent = $currentResult[5];
    $monTREleveEtSonParent = "<tr><td>" . $prenomEleve . "</td><td>" . $ageEleve . "</td><td>" . $couleurPrefEleve . "</td><td>" . $prenomParent . "</td></tr>";
} else {
    echo "DB request failed.<br>";
}

$myRequestTest = array();
$myRequest =    "SELECT `eleves`.`prenom` AS 'prenomEleve', `eleves`.`age` AS 'ageEleve', `parents`.`prenom` AS 'prenomParent'
                FROM `eleves`
                INNER JOIN `parents` ON `eleves`.`parents_id` = `parents`.`id`
                WHERE `eleves`.`prenom` = 'julie'";

// ^^ En utilisant les alias MYSQL, on decide des noms d'index du tableau cree par mysqli_fetch_array
// et donc on s'y retrouve mieux en reassignant nos variables:
//$prenomEleve = $currentResult['prenomEleve'];
//$ageEleve = $currentResult['ageEleve'];
//$prenomParent = $currentResult['prenomParent'];
if ($myResult = mysqli_query($myConnection, $myRequest)) {
    $currentResult = mysqli_fetch_array($myResult);
    $myRequestTest = $currentResult;
} else {
    echo "DB request failed.<br>";
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
    <title>Ecole</title>
</head>

<body>

    <div class="container liste">
        <h2>Eleves</h2>
        <table class="table shadow table-dark table-striped mt-3">
            <thead>
                <th>prenom</th>
                <th>age</th>
                <th>couleur preferee</th>
            </thead>
            <tbody>
                <?php echo $mesEleves ?>
            </tbody>
        </table>

        <h2 class="mt-5">Parents</h2>

        <table class="table shadow table-dark table-striped mt-3">
            <thead>
                <th>prenom</th>
                <th>age</th>
            </thead>
            <tbody>
                <?php echo $mesParents ?>
            </tbody>
        </table>

        <h2 class="mt-5">Eleves et leur parent</h2>
        <table class="table shadow table-dark table-striped mt-3">
            <thead>
                <th>prenom</th>
                <th>age</th>
                <th>couleur pref</th>
                <th>parent</th>
            </thead>
            <tbody>
                <?php echo $monTREleveEtSonParent ?>
            </tbody>
        </table>
        <table class="table shadow table-dark table-striped mt-3">
            <thead>
                <th>prenom</th>
                <th>age</th>
                <th>couleur pref</th>
                <th>parent</th>
            </thead>
            <tbody>
                <?php print_r($myRequestTest) ?>
            </tbody>
        </table>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>