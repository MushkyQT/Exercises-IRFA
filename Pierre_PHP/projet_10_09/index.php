<?php

require('scripts/members.php');

$upload = '';
$link = '';

$loginForm = '
<form class="form-inline">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Log In</button>
</form>
';

function loggedIn($user)
{
    return $loggedInForm = '<form class="form-inline">
    <h1>Currently logged in as ' . $user . '</h1>
    <button type="submit" class="btn btn-primary">Log Out</button>
</form>';
}

$navbar = $loginForm;

if ($_GET) {
    if ($_GET && $_GET['username'] && $_GET['password']) {
        $usr = $_GET['username'];
        $pass = $_GET['password'];
        if (array_key_exists($usr, $members) && $members[$usr] == $pass) {
            $navbar = loggedIn($usr);
            $upload = include('scripts/upload.php');
        } else {
            $link = "<p class='text-danger'>$usr not found or password incorrect.</p>";
        }
    } else {
        $link = "<p class='text-danger'>Please enter a username and a password.</p>";
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
    <link rel="stylesheet" href="css/style.css">
    <title>Title</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
        <?php echo $navbar ?>
    </nav>

    <div class="container">
        <?php echo $upload ?>
        <div class="text-center">
            <?php echo $link ?>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>