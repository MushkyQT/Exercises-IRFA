<?php
// Create navbar login or logout form
$navBarStatus = array();
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] = true) {
    $navBarStatus["login"] = '<button type="submit" name="signOut" class="btn lightOrange signOutBtn mr-3">Sign Out</button>';
} else {
    $navBarStatus["login"] = '<div class="form-group"><input type="text" placeholder="Username" class="form-control" name="username"></div><div class="form-group"><input type="password" placeholder="Password" class="form-control mx-1" name="password"></div><button type="submit" class="btn lightOrange signInBtn mr-3" name="signIn">Sign In</button><button type="submit" class="btn lightOrange signUpBtn" name="signUp">Sign Up</button>';
}
