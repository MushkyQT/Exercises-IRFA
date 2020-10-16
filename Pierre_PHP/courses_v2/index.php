<?php

require_once('php/creds.php');

$loggedIn = false;

// SignOut post check and username/password login check
if (isset($_POST['signOut'])) {
    $loggedIn = false;
} elseif (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username != "" && $password != "") {
        $myRequest = "SELECT `users`.`username`, `users`.`password` FROM `users` WHERE `username` = '" . $username . "'";
        $myResult = mysqli_query($myConnection, $myRequest);
        if (mysqli_num_rows($myResult) > 0) {
            $currentResult = mysqli_fetch_array($myResult);
            if ($currentResult['password'] == $password) {
                $loggedIn = true;
            } else {
                echo "Incorrect password for " . $username;
            }
        } else {
            echo "Username " . $username . " not found.";
        }
    } else {
        echo "One or both fields were empty, please try again.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Karot V2</title>
</head>

<body>
    <?php

    if ($loggedIn == true) {
        include('php/loggedIn.php');
    } elseif ($_POST && isset($_POST['signUp'])) {
        include('php/signUp.php');
    } else {
        include('php/logIn.php');
    }


    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>