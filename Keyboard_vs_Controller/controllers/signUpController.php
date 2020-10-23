<?php
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
