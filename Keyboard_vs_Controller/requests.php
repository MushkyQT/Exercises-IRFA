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
        if ($row['password'] == (md5($cleanPassword) . md5("kbvm_salt"))) {
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

function signMeUp($username, $password, $passwordConfirm, $email)
{
    global $connection;
    $cleanUsername = mysqli_real_escape_string($connection, $username);
    $cleanPassword = mysqli_real_escape_string($connection, $password);
    $cleanPasswordConfirm = mysqli_real_escape_string($connection, $passwordConfirm);
    $cleanEmail = mysqli_real_escape_string($connection, $email);

    $request = "SELECT `username`, `email` FROM `users` WHERE `username` = '" . $cleanUsername . "' OR `email` = '" . $cleanEmail . "'";
    $result = mysqli_query($connection, $request);
    if (mysqli_num_rows($result)) {
        // User or email already exists
        $row = mysqli_fetch_array($result);
        if ($row['username'] == $cleanUsername) {
            return "Username '" . $cleanUsername . "' already registered, please try something else.";
        } elseif ($row['email'] == $cleanEmail) {
            return "E-mail address " . $cleanEmail . " already registered, please try something else.";
        }
    } else {
        // Register account into DB
        $emailHash = md5(rand(0, 1000));
        $saltedPass = md5($cleanPassword) . md5("kbvm_salt");
        $request = "INSERT INTO `users` (`username`, `password`, `email`, `email_hash`) VALUES ('" . $cleanUsername . "', '" . $saltedPass . "', '" . $cleanEmail . "', '" . $emailHash . "')";
        if ($result = mysqli_query($connection, $request)) {
            unset($_POST['signUp']);
            return "Successfully signed up user " . $username . " with e-mail " . $email . "! You must verify your e-mail before signing in.";
        } else {
            return "Failed to create account, please try again.";
        }
    }
}
