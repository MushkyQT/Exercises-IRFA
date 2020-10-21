<?php

require_once "auth.php";

if (isset($_POST['username']) && $_POST['username'] != "" && isset($_POST['email']) && $_POST['email'] != "" && isset($_POST['password']) && $_POST['password'] != "" && isset($_POST['passwordConfirm']) && $_POST['passwordConfirm'] != "") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];

    if ($password == $passwordConfirm) {
        $request = "SELECT `username`, `email` FROM `users` WHERE `email` = '" . $email . "' OR `username` = '" . $username . "'";
        if ($response = mysqli_query($connection, $request)) {
            if (!mysqli_num_rows($response)) {
                $emailHash = md5(rand(0, 1000));
                $request = "INSERT INTO `users` (`username`, `password`, `email`, `email_hash`) VALUES ('" . $username . "', '" . $password . "', '" . $email . "', '" . $emailHash . "') ";
                if ($response = mysqli_query($connection, $request)) {
                    echo "signUpOk";
                } else {
                    echo "<p class='text-danger'>Sign up failed.</p>";
                }
            } else {
                $response = mysqli_fetch_array($response);
                if (in_array($username, $response)) {
                    echo "<p class='text-danger'>Username already taken, please try again.</p>";
                } elseif (in_array($email, $response)) {
                    echo "<p class='text-danger'>Email address already in use, please try again.</p>";
                }
            }
        }
    } else {
        echo "<p class='text-danger'>Passwords do not match, please try again.</p>";
    }
} else {
    echo "<p class='text-danger'>Missing one or more fields. Please fill out all fields and try again.</p>";
}
