<?php

$monPass = "georgewbush";
$monSecret = '';

if ($_GET && $_GET['demande'] == "clic") {
    if ($_GET['secret'] == $monPass) {
        $monSecret = 'Bush did 2020';
    } else {
        $monSecret = "Mauvais mot de passe. Qui est tu?";
    }
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

    <form method="get" class="container border shadow d-flex flex-column justify-content-center align-items-center">
        <p>Clique sur secret si tu veut connaitre mon secret</p>
        <input type="text" placeholder="quelquechose" name="secret" class="col-8">
        <input type="submit" value="clic" name="demande" class="col-2 mt-3 btn btn-success">
        <div class="secret ">
            <p><?php echo $monSecret; ?></p>
        </div>
    </form>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>