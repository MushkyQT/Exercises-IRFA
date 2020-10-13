<?php

$host = 'localhost';
$db = 'mabase';
$user = 'bibi';
$pass = 'coucou';

$myConnection = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_error()) {
    die("Connection to database failed.<br>");
}

$thead = "";
$tbody = "";
$fatal = "";
$animals = "";


if (isset($_POST['addName']) && isset($_POST['addAnimal'])) {
    $myRequest = "INSERT INTO `matable` (`nom`, `animal`) VALUES ('" . $_POST['addName'] . "', '" . $_POST['addAnimal'] . "')";
    if ($myResult = mysqli_query($myConnection, $myRequest)) {
        $fatal = "Added " . $_POST['addName'] . " to the first table.";
    } else {
        echo "fail";
    }
} elseif (isset($_POST['del'])) {
    $myRequest = "DELETE FROM `matable` WHERE `id` = " . $_POST['del'];
    if ($myResult = mysqli_query($myConnection, $myRequest)) {
        $fatal = "Deletion successful.";
    } else {
        echo "fail";
    }
} elseif ($_POST) {
    $fatal = "Form submitted incorrectly, try again.";
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
        $tbody .= "<td><form method='post'>
        <button type='submit' class='btn btn-danger' name='del' value='" . $currentResult['id'] . "'>DELETE</button>
    </form></td>";
        $tbody .= "</tr>";
    }
} else {
    echo "DB request failed.<br>";
}

$myRequest = "SELECT DISTINCT animal FROM `maTable`";
if ($myResult = mysqli_query($myConnection, $myRequest)) {
    while ($currentResult = mysqli_fetch_array($myResult)) {
        $animals .= "<option value='" . $currentResult['animal'] . "'>";
        $animals .= $currentResult['animal'];
        $animals .= "</option>";
    }
} else {
    echo "DB request failed.<br>";
}

// 1. Creer systeme de gestion de courses a partir de la maquette du 10/13. 

// ^ L'exo se trouve dans courses.php

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

    <div class="container">
        <table class='table table-striped shadow'>
            <thead class='thead-dark'>
                <tr>
                    <?php echo $thead ?>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $tbody ?>
            </tbody>
        </table>
        <?php echo $fatal ?>
        <form method="post" class="form-inline justify-content-center">
            <div class="form-group">
                <label for="addName" class="mx-2">Nom</label>
                <input type="text" name="addName" id="addName" class="form-control">
            </div>
            <div class="form-group">
                <label for="addAnimal" class="mx-2">Animal Pref</label>
                <input type="text" name="addAnimal" id="addAnimal" class="form-control">
            </div>
            <input type="submit" class="btn btn-primary ml-2" value="Ajouter au tableau">
        </form>
        <br>
        <hr>
        <br>
        <form method="post" class="form-inline justify-content-center">
            <div class="form-group">
                <label for="addName" class="mx-2">Nom</label>
                <input type="text" name="addName" id="addName" class="form-control">
            </div>
            <div class="form-group">
                <label for="addAnimal" class="mx-2">Animal Pref</label>
                <select name="addAnimal" id="addAnimal" class="custom-select">
                    <?php echo $animals ?>
                </select>
            </div>
            <input type="submit" class="btn btn-primary ml-2" value="Ajouter au tableau">
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>