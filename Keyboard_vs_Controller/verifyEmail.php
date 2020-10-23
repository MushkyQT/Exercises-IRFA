<?php

if (isset($_GET['email']) && $_GET['email'] != "" && isset($_GET['hash']) && $_GET['hash'] != "") {
    $verifyEmail = $_GET['email'];
    $verifyHash = $_GET['hash'];
    print verifyEmail($verifyEmail, $verifyHash);
} else {
    return "Invalid verification link, please try again.";
}
