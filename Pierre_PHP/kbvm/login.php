<?php
if (isset($_POST['signOut'])) {
    session_unset();
}

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    $_POST['username'] = $_SESSION['username'];
    $_POST['password'] = $_SESSION['password'];
}

if (isset($_POST['signIn']) && isset($_POST['username']) && $_POST['username'] != "" && isset($_POST['password']) && $_POST['password'] != "") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $request = "SELECT * FROM `users` WHERE `username` = '" . $username . "'";
    if ($response = mysqli_fetch_array(mysqli_query($connection, $request))) {
        if ($response['password'] == $password) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
        }
    }
}
