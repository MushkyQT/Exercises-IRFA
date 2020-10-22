<?php

function logMeIn($username, $password)
{
    global $connection;
    $cleanUsername = mysqli_real_escape_string($connection, $username);
    $cleanPassword = mysqli_real_escape_string($connection, $password);

    $request = "SELECT `password`, `verified` FROM `users` WHERE `username` = '" . $cleanUsername . "'";
    $result = mysqli_query($connection, $request);
    if (!mysqli_num_rows($result)) {
        return "No account found for " . $cleanUsername . ". Try again.";
    } else {
        $row = mysqli_fetch_array($result);
        if ($row['password'] == md5($cleanPassword)) {
            if (!$row['verified']) {
                return "Your e-mail address still needs to be validated, please check your inbox and spam folder.";
            } else {
                $_SESSION['loggedIn'] = true;
            }
        } else {
            return "Incorrect password for " . $cleanUsername . ". Try again.";
        }
    }
}
