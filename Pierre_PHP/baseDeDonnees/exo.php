<?php

$host = 'localhost';
$db = 'mabase';
$user = 'bibi';
$pass = 'coucou';

$myConnection = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_error()) {
    die("Connection to database failed.<br>");
}

$animals = "";
$colors = "";
$meals = "";
$thead2 = "";
$tbody2 = "";
$fatal = "";
$fatal2 = "";

function createTable($myResult)
{
    global $thead2, $tbody2, $fatal2;
    if (mysqli_num_rows($myResult) == 0) {
        $fatal2 = "No results for your query.";
    } else {
        for ($i = 1; $i < 6; $i++) {
            $finfo = mysqli_fetch_field_direct($myResult, $i);
            $thead2 .= "<th>" . $finfo->name . "</th>";
        }
        while ($currentResult = mysqli_fetch_array($myResult)) {
            $tbody2 .= "<tr>";
            $tbody2 .= "<td>" . $currentResult['prenom'] . "</td>";
            $tbody2 .= "<td>" . $currentResult['nom'] . "</td>";
            $tbody2 .= "<td>" . $currentResult['animal'] . "</td>";
            $tbody2 .= "<td>" . $currentResult['couleur'] . "</td>";
            $tbody2 .= "<td>" . $currentResult['plat'] . "</td>";
            $tbody2 .= "</tr>";
        }
    }
}

if ($_POST) {
    if (isset($_POST['ajouter'])) {
        $myRequestGhislain = "INSERT INTO `matable` (`nom`, `animal`) VALUES ('ghislain', 'poulpe')";
        if ($myResult = mysqli_query($myConnection, $myRequestGhislain)) {
            $fatal = "Added Ghislain to the first table.";
        } else {
            echo "fail";
        }
    } elseif (isset($_POST['animals']) && isset($_POST['colors'])) {
        $myRequest = "SELECT * FROM `newtable` WHERE `animal` = '" . $_POST['animals'] . "' AND `couleur` = '" . $_POST['colors'] . "'";
        if ($myResult = mysqli_query($myConnection, $myRequest)) {
            createTable($myResult);
        } else {
            echo "DB request failed.<br>";
        }
    } elseif (isset($_POST['animals'])) {
        $myRequest = "SELECT * FROM `newtable` WHERE `animal` = '" . $_POST['animals'] . "'";
        if ($myResult = mysqli_query($myConnection, $myRequest)) {
            createTable($myResult);
        } else {
            echo "DB request failed.<br>";
        }
    } elseif (isset($_POST['colors'])) {
        $myRequest = "SELECT * FROM `newtable` WHERE `couleur` = '" . $_POST['colors'] . "'";
        if ($myResult = mysqli_query($myConnection, $myRequest)) {
            createTable($myResult);
        } else {
            echo "DB request failed.<br>";
        }
    } elseif (isset($_POST['meals'])) {
        $myRequest = "SELECT * FROM `newtable` WHERE `plat` = '" . $_POST['meals'] . "'";
        if ($myResult = mysqli_query($myConnection, $myRequest)) {
            createTable($myResult);
        } else {
            echo "DB request failed.<br>";
        }
    } else {
        $fatal2 = "You submitted a non-existant form value.";
    }
} else {
    $myRequest = "SELECT * FROM newTable";
    if ($myResult = mysqli_query($myConnection, $myRequest)) {
        createTable($myResult);
    } else {
        echo "DB request failed.<br>";
    }
}

$myRequest = "SELECT * FROM maTable";
if ($myResult = mysqli_query($myConnection, $myRequest)) {
    $thead = "";
    $tbody = "";
    for ($i = 1; $i < 3; $i++) {
        $finfo = mysqli_fetch_field_direct($myResult, $i);
        $thead .= "<th>" . $finfo->name . "</th>";
    }
    while ($currentResult = mysqli_fetch_array($myResult)) {
        $tbody .= "<tr>";
        $tbody .= "<td>" . $currentResult['nom'] . "</td>";
        $tbody .= "<td>" . $currentResult['animal'] . "</td>";
        $tbody .= "</tr>";
    }
} else {
    echo "DB request failed.<br>";
}

$myRequest = "SELECT DISTINCT animal FROM `newtable`";
if ($myResult = mysqli_query($myConnection, $myRequest)) {
    while ($currentResult = mysqli_fetch_array($myResult)) {
        $animals .= "<option value='" . $currentResult['animal'] . "'>";
        $animals .= $currentResult['animal'];
        $animals .= "</option>";
    }
} else {
    echo "DB request failed.<br>";
}

$myRequest = "SELECT DISTINCT couleur FROM `newtable`";
if ($myResult = mysqli_query($myConnection, $myRequest)) {
    while ($currentResult = mysqli_fetch_array($myResult)) {
        $colors .= "<option value='" . $currentResult['couleur'] . "'>";
        $colors .= $currentResult['couleur'];
        $colors .= "</option>";
    }
} else {
    echo "DB request failed.<br>";
}

$myRequest = "SELECT DISTINCT plat FROM `newtable`";
if ($myResult = mysqli_query($myConnection, $myRequest)) {
    while ($currentResult = mysqli_fetch_array($myResult)) {
        $meals .= "<option value='" . $currentResult['plat'] . "'>";
        $meals .= $currentResult['plat'];
        $meals .= "</option>";
    }
} else {
    echo "DB request failed.<br>";
}


// 1. Faire un vrai formulaire de creation de personne + animal pref

// 2. Faire un second formulaire de creation de personne + animal pref mais cette
// fois pour lequel on choisit parmi les animaux deja existants uniquement par le
// biais d'un select (ou radio, etc.)

// 3. On ajoute une troisieme colonne au tableau BOOTSTRAP - Du cote HTML pas SQL
// Cette colonne contient un bouton supprimer -> supprime l'entree en question du tableau
// pour cela l'information unique a chaque btn supprimer soit basee l'ID de la personne
// en question

// ^^ L'exo se trouve dans exo2.php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Title</title>
</head>

<body>

    <div class="container">
        <table class='table table-striped shadow'>
            <thead class='thead-dark'>
                <tr>
                    <?php echo $thead ?>
                </tr>
            </thead>
            <tbody>
                <?php echo $tbody ?>
            </tbody>
        </table>
        <?php echo $fatal ?>
        <form method="post">
            <input type="submit" class="btn btn-primary" value="Ajouter Ghislain au tableau" name="ajouter">
        </form>
    </div>

    <hr>

    <div class="container">
        <?php echo $fatal2 ?>
        <table class="table table-striped shadow">
            <thead>
                <tr>
                    <?php echo $thead2 ?>
                </tr>
            </thead>
            <tbody>
                <?php echo $tbody2 ?>
            </tbody>
        </table>
        <form method="post" class="form-inline mb-2">
            <select name="animals" class="form-control mr-2">
                <?php echo $animals ?>
            </select>
            <input type="submit" value="Animals" class="btn btn-primary">
        </form>
        <form method="post" class="form-inline mb-2">
            <select name="meals" class="form-control mr-2">
                <?php echo $meals ?>
            </select>
            <input type="submit" value="Meals" class="btn btn-primary">
        </form>
        <form method="post" class="form-inline mb-2">
            <select name="colors" class="form-control mr-2">
                <?php echo $colors ?>
            </select>
            <h5 class="mr-2">&</h5>
            <select name="animals" class="form-control mr-2">
                <?php echo $animals ?>
            </select>
            <input type="submit" value="Color & Animal" class="btn btn-primary">
        </form>
        <form method="post" class="form-inline mb-2">
            <input type="submit" value="Reset" class="btn btn-primary">
        </form>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>