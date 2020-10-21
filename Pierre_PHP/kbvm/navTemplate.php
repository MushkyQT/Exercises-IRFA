<?php

if ($loggedIn == true) {
    $logInOrOut = '<button type="submit" class="btn btn-danger">Sign Out</button>';
} else {
    $logInOrOut = '<div class="form-group my-0 mr-2">
    <input type="text" name="username" id="username" placeholder="Username" class="form-control">
</div>
<div class="form-group my-0 mr-2">
    <input type="password" name="password" id="password" placeholder="Password" class="form-control">
</div>
<button type="submit" class="btn btn-primary">Sign In</button>';
}

echo '<nav class="navbar navbar-expand-lg navbar-light bg-light mainNav">
<a class="navbar-brand flex-grow-1" href=".">KBvM</a>
<div class="flex-grow-1 d-flex">
    <form class="form-inline flex-nowrap mx-0 mx-lg-auto justify-content-center searchForm">
        <div class="form-group m-0">
            <input type="text" name="search" id="search" class="form-control" placeholder="Search for a game">
        </div>
    </form>
</div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#logInOrOut">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="logInOrOut">
        <form class="form-inline justify-content-center my-2 my-lg-0 logInOrOut">
        ' . $logInOrOut . '
        </form>
    </div>
</nav>
';
