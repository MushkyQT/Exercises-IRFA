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
                $_SESSION['username'] = $username;
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
            // Send verification email
            $emailMetaData = array(
                "subject" => "Keyboard vs. Controller Verification Link",
                "message" => "Thank you for signing up to Keyboard vs. Controller. Your account must be verified before you can log-in. To do so, simply click on the following link: https://www.cmelki.cf/kbvm/?verify=&email=" . $email . "&hash=" . $emailHash,
                "fromName" => "KBvM",
                "error" => "<br>Uh oh, verification email failed to send. Please create a new account or contact us.",
                "success" => "<br>Verification link sent to " . $email,
            );
            print sendMail($email, $emailMetaData);
            return "Successfully signed up user " . $username . " with e-mail " . $email . "! You must verify your e-mail before signing in.";
        } else {
            return "Failed to create account, please try again.";
        }
    }
}

function verifyEmail($email, $hash)
{
    global $connection;
    $cleanEmail = mysqli_real_escape_string($connection, $email);
    $request = "SELECT `verified`, `email_hash`, `username` FROM `users` WHERE `email` = '" . $cleanEmail . "'";
    $result = mysqli_query($connection, $request);
    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_array($result);
        if ($hash == $row['email_hash'] && $row['verified'] == false) {
            $verifiedUser = $row['username'];
            $request = "UPDATE `users` SET `verified` = '1' WHERE `users`.`email` = '" . $cleanEmail . "'";
            if ($result = mysqli_query($connection, $request)) {
                // Send email to notify validation
                $emailMetaData = array(
                    "subject" => "Keyboard vs. Controller Account Verified!",
                    "message" => "Hey " . $verifiedUser . ", your Karot account is now verified! You can log in at https://www.cmelki.cf/kbvm/",
                    "fromName" => "KBvM",
                    "error" => "<br>Uh oh, failed to send confirmation email. Your account should still be verified.",
                    "success" => "<br>Verified! Confirmation sent to " . $email,
                );
                print sendMail($email, $emailMetaData);
                return $verifiedUser . ", your email is now verified! Please log-in.";
            } else {
                return "Verification failed. Please try again.";
            }
        } else {
            return "Invalid hash or account already verified. Try again or log-in.";
        }
    } else {
        return "No account found for this email address. Please try again.";
    }
}
