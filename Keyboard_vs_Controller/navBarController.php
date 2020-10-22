<?php
$navBarStatus = array();
$loggedIn = true;

if ($loggedIn) {
    $navBarStatus["login"] = '<button class="btn lightOrange signOutBtn mr-3">Sign Out</button>';
} else {
    $navBarStatus["login"] = '<div class="form-group"><input type="text" placeholder="Username" class="form-control"></div><div class="form-group"><input type="text" placeholder="Password" class="form-control mx-1"></div><button class="btn lightOrange signInBtn mr-3">Sign In</button><button class="btn lightOrange signUpBtn">Sign Up</button>';
}
