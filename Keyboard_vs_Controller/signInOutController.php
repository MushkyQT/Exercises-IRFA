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
