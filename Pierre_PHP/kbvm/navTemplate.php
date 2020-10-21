<?php

if ($loggedIn == true) {
    $logInOrOut = '<button type="submit" class="btn btn-danger" name="signOut">Sign Out</button>';
} else {
    $logInOrOut = '<div class="form-group my-0 mr-2">
    <input type="text" name="username" id="username" placeholder="Username" class="form-control">
</div>
<div class="form-group my-0 mr-2">
    <input type="password" name="password" id="password" placeholder="Password" class="form-control">
</div>
<div class="btn-group signUpDropdownContainer">
    <button type="submit" class="btn btn-primary" name="signIn" id="signInBtn">Sign In</button>
    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"></button>
    <div class="dropdown-menu dropdown-menu-right px-4 py-3 signUpDropdown">
    <div class="form-group">
        <label for="signUpUsername">Username</label>
        <input type="text" class="form-control" name="signUpUsername" id="signUpUsername" placeholder="Username">
        </div>
        <div class="form-group">
        <label for="signUpEmail">Email address</label>
        <input type="text" class="form-control" name="signUpEmail" id="signUpEmail" placeholder="email@example.com">
        </div>
        <div class="form-group">
        <label for="signUpPassword">Password</label>
        <input type="password" class="form-control" id="signUpPassword" name="signUpPassword" placeholder="Password">
        </div>
        <div class="form-group">
        <label for="signUpPasswordConfirm">Confirm Password</label>
        <input type="password" class="form-control" id="signUpPasswordConfirm" name="signUpPasswordConfirm" placeholder="Type password again">
        </div>
        <button type="button" class="btn btn-primary mt-2" name="signUp" id="signUpBtn">Sign Up</button>
        <div class="signUpErrors"></div>
    </div>
</div>';
}

echo '<nav class="navbar navbar-expand-lg navbar-light bg-light mainNav">
<a class="navbar-brand flex-grow-1" href=".">KBvM</a>
<div class="flex-grow-1 d-flex">
    <form method="post" class="form-inline flex-nowrap mx-0 mx-lg-auto justify-content-center">
        <div class="form-group m-0">
            <input type="text" name="search" id="search" class="form-control" placeholder="Search for a game">
        </div>
    </form>
</div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#logInOrOut">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="logInOrOut">
        <form method="post" class="form-inline justify-content-center my-2 my-lg-0 logInOrOut">
        ' . $logInOrOut . '
        </form>
    </div>
</nav>
';
