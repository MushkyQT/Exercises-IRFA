<?php

// Execute sign out
if (isset($_POST['signOut'])) {
    session_unset();
}

// Execute sign in
if (isset($_POST['signIn'])) {
    if (isset($_POST['username']) && $_POST['username'] != "" && isset($_POST['password']) && $_POST['password'] != "") {
        print logMeIn($_POST['username'], $_POST['password']);
    } else {
        print "One or more fields missing from login, please try again.";
    }
}

// Execute sign up
$signUpData = array();
if (isset($_POST['signMeUp'])) {
    $_POST['signUp'] = "";

    if (isset($_POST['signUpUsername']) && $_POST['signUpUsername'] != "" && isset($_POST['signUpEmail']) && $_POST['signUpEmail'] != "" && isset($_POST['signUpPassword']) && $_POST['signUpPassword'] != "" && isset($_POST['signUpPasswordConfirm']) && $_POST['signUpPasswordConfirm'] != "") {
        if ($_POST['signUpPassword'] == $_POST['signUpPasswordConfirm']) {
            print signMeUp($_POST['signUpUsername'], $_POST['signUpPassword'], $_POST['signUpPasswordConfirm'], $_POST['signUpEmail']);
        } else {
            print "Passwords do not match, please try again carefully.";
        }
    } else {
        print "One or more fields missing, please try again.";
    }
}

// Verify email
if (isset($_GET['email'])) {
    if ($_GET['email'] != "" && isset($_GET['hash']) && $_GET['hash'] != "") {
        $verifyEmail = $_GET['email'];
        $verifyHash = $_GET['hash'];
        print verifyEmail($verifyEmail, $verifyHash);
    } else {
        return "Invalid verification link, please try again.";
    }
}

// Create navbar login or logout form
$navBarStatus = array();
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] = true) {
    $navBarStatus["login"] = '<span class="pr-3 text-white">' . $_SESSION['username'] . '</span><button type="submit" name="signOut" class="btn lightOrange signOutBtn mr-3">Sign Out</button>';
} else {
    $navBarStatus["login"] = '<div class="form-group"><input type="text" placeholder="Username" class="form-control" name="username"></div><div class="form-group"><input type="password" placeholder="Password" class="form-control mx-1" name="password"></div><button type="submit" class="btn lightOrange signInBtn mr-3" name="signIn">Sign In</button><button type="submit" class="btn lightOrange signUpBtn" name="signUp">Sign Up</button>';
}
