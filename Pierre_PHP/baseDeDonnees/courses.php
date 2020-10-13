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

$myRequest = "SELECT * FROM `groceries` WHERE `purchased` = 0";
if ($myResult = mysqli_query($myConnection, $myRequest)) {
    createTable($myResult);
} else {
    echo "DB request failed.<br>";
}

$myRequest = "SELECT * FROM `groceries` WHERE `purchased` = 1 ORDER BY `product`";
if ($myResult = mysqli_query($myConnection, $myRequest)) {
    createTable($myResult);
} else {
    echo "DB request failed.<br>";
}

function createTable($myResult)
{
    global $tableContent;
    while ($currentResult = mysqli_fetch_array($myResult)) {
        $checked = "";
        $color = false;
        $colorClass = "";
        if ($currentResult['purchased'] == true) {
            $checked = " checked ";
            $color = true;
        }
        if ($color) {
            $colorClass = "class='myBg-success'";
        }
        $hiddenBox = "<input hidden type='checkbox' name='purchased' value='" . $currentResult['id'] . "' checked>";
        $tableContent .= "<tr " . $colorClass . ">";
        $tableContent .= "<td>" . $currentResult['product'] . "</td>";
        $tableContent .= "<td><form method='post'>" . $hiddenBox . "<input type='checkbox' onchange='submit()'" . $checked . "></form></td>";
        $tableContent .= "<td><form method='post'>
        <button type='submit' class='btn myBtn-danger' name='del' value='" . $currentResult['id'] . "'>DELETE</button>
    </form></td>";
        $tableContent .= "</tr>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Chilanka&family=Poppins:wght@300&family=Sansita+Swashed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Karot</title>
</head>

<body>

    <div class="container-md">
        <div class="tableSurround">
            <table class="myTable">
                <thead>
                    <tr class="w-100">
                        <th>Product</th>
                        <th>Already purchased</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $tableContent ?>
                </tbody>
            </table>
        </div>
        <div class="surround shadow">
            <form method="post" class="form-inline justify-content-center p-4">
                <div class="form-group">
                    <label for="addProduct" class="mx-2">Product</label>
                    <input type="text" name="addProduct" id="addProduct" class="form-control" autofocus>
                </div>
                <input type="submit" class="btn myBtn-primary ml-2" value="Add">
            </form>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>