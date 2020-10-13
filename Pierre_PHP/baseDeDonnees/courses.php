<?php

$host = 'localhost';
$db = 'mabase';
$user = 'bibi';
$pass = 'coucou';

$myConnection = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_error()) {
    die("Connection to database failed.<br>");
}

$tableContent = "";
$fatal = "";

if ($_POST && isset($_POST['purchased'])) {
    $myRequest = "UPDATE `groceries` SET `purchased` = !`purchased` WHERE `id` = " . $_POST['purchased'];
    if ($myResult = mysqli_query($myConnection, $myRequest)) {
        $fatal = "Purchased update successful.";
    } else {
        $fatal = "Purchased update fail.";
    }
} elseif ($_POST && isset($_POST['del'])) {
    $myRequest = "DELETE FROM `groceries` WHERE `id` = " . $_POST['del'];
    if ($myResult = mysqli_query($myConnection, $myRequest)) {
        $fatal = "Deletion successful.";
    } else {
        $fatal = "Deletion fail.";
    }
} elseif ($_POST && isset($_POST['addProduct'])) {
    $myRequest = "INSERT INTO `groceries` (`product`, `purchased`) VALUES ('" . $_POST['addProduct'] . "', 0)";
    if ($myResult = mysqli_query($myConnection, $myRequest)) {
        $fatal = "Added " . $_POST['addProduct'] . " to the grocery list.";
    } else {
        $fatal = "Addition fail.";
    }
}

$myRequest = "SELECT * FROM groceries";
if ($myResult = mysqli_query($myConnection, $myRequest)) {
    while ($currentResult = mysqli_fetch_array($myResult)) {
        $checked = "";
        $color = false;
        $colorClass = "";
        if ($currentResult['purchased'] == true) {
            $checked = " checked ";
            $color = true;
        }
        if ($color) {
            $colorClass = "class='bg-success'";
        }
        $hiddenBox = "<input hidden type='checkbox' name='purchased' value='" . $currentResult['id'] . "' checked>";
        $tableContent .= "<tr " . $colorClass . ">";
        $tableContent .= "<td>" . $currentResult['product'] . "</td>";
        $tableContent .= "<td><form method='post'>" . $hiddenBox . "<input type='checkbox' onchange='submit()'" . $checked . "></form></td>";
        $tableContent .= "<td><form method='post'>
        <button type='submit' class='btn btn-danger' name='del' value='" . $currentResult['id'] . "'>DELETE</button>
    </form></td>";
        $tableContent .= "</tr>";
    }
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
    <link rel="stylesheet" href="css/style.css">
    <title>Karot</title>
</head>

<body>

    <div class="container">
        <table class='table shadow'>
            <thead class='thead-dark'>
                <tr>
                    <th>Product</th>
                    <th>Already purchased</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $tableContent ?>
            </tbody>
        </table>
        <?php echo $fatal ?>
        <form method="post" class="form-inline">
            <div class="form-group">
                <label for="addProduct" class="mx-2">Product</label>
                <input type="text" name="addProduct" id="addProduct" class="form-control">
            </div>
            <input type="submit" class="btn btn-primary ml-2" value="Add">
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>