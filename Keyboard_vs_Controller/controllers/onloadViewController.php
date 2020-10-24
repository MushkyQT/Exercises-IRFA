<?php

// Display navbar
$navBarStatus = array();
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] = true) {
    $navBarStatus["login"] = '<span class="pr-3 text-white">' . $_SESSION['username'] . '</span><button type="submit" name="signOut" class="btn lightOrange signOutBtn mr-3">Sign Out</button>';
} else {
    $navBarStatus["login"] = '<div class="form-group"><input type="text" placeholder="Username" class="form-control" name="username"></div><div class="form-group"><input type="password" placeholder="Password" class="form-control mx-1" name="password"></div><button type="submit" class="btn lightOrange signInBtn mr-3" name="signIn">Sign In</button><button type="submit" class="btn lightOrange signUpBtn" name="signUp">Sign Up</button>';
}
print templateGen("templates/navBarTemplate.php", $navBarStatus);

// If sign up requested, display sign up page
if (isset($_POST['signUp'])) {
    print templateGen("templates/signUpTemplate.php", $signUpData);
} elseif (isset($_POST['gameRequested']) || isset($_GET['gameRequested'])) {
    // If a game was clicked on, display game's page
    if (isset($_POST['gameRequested'])) {
        $gameRequested = $_POST['gameRequested'];
    } elseif (isset($_GET['gameRequested'])) {
        $gameRequested = $_GET['gameRequested'];
    }
    if ($gameRequestedData = getSpecificGameInfo($gameRequested)) {
        print templateGen("templates/specificGamePageTemplate.php", $gameRequestedData);
    } else {
        print "The requested game was not found.";
    }
} else {
    // Otherwise, display popular games home page
    print templateGen("templates/popularGamesTemplate.php", getNinePopularGamesForHomePage());
}

// If cookies not consented to, display cookie consent div
if (!isset($_COOKIE['cookiesAccepted'])) {
    $cookieConsentData = array();
    print templateGen("templates/cookieConsentTemplate.php", $cookieConsentData);
}
