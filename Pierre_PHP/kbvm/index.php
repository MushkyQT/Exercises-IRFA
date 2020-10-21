<?php

session_start();

// Connect to DB
require_once "auth.php";
require_once "login.php";

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    $loggedIn = true;
} else {
    $loggedIn = false;
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Keyboard or Controller - </title>
</head>

<body>

    <?php
    require_once "templateController.php";

    //=====START NAV=====
    $navTemplate = "navTemplate.php";
    $navData = array(
        'loggedIn' => $loggedIn,
    );
    echo templateGen($navTemplate, $navData);
    //=====END NAV=====

    if (isset($_SESSION['signUpMode']) && $_SESSION['signUpMode'] == true) {
        require_once "signUpPage.php";
    }

    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>