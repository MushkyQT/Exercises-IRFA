<?php

// Display default navbar
print templateGen("templates/navBarTemplate.php", $navBarStatus);

// If sign up requested, display sign up page
if (isset($_POST['signUp'])) {
    print templateGen("templates/signUpTemplate.php", $signUpData);
}

// If cookies not consented to, display cookie consent div
if (!isset($_COOKIE['cookiesAccepted'])) {
    $cookieConsentData = array();
    print templateGen("templates/cookieConsentTemplate.php", $cookieConsentData);
}
