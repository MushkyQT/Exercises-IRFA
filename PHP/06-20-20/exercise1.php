<!DOCTYPE html>
<html>

<head>
    <title>Exercise 1 06-20-20</title>
    <h2>Exercise 1 06-20-20</h2>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<?php

function makeErr($name)
{
    switch ($name) {
        case "gender":
            global $gender;
            $gender = "<div class='error'>Please select a gender.</div>";
            break;
        case "lName":
            global $lName;
            $lName = "<div class='error'>Please enter a last name.</div>";
            break;
        case "fName":
            global $fName;
            $fName = "<div class='error'>Please enter a first name.</div>";
            break;
        case "email":
            global $email;
            $email = "<div class='error'>Please enter an email.</div>";
            break;
        case "password1":
            global $password1;
            $password1 = "<div class='error'>Please enter a password.</div>";
            break;
        case "password2":
            global $password2;
            $password2 = "<div class='error'>Please enter an identical password in field 2.</div>";
            break;
        case "noMatch":
            global $noMatch;
            $noMatch = "<div class='error'>Please enter matching passwords.</div>";
            break;
    }
}


foreach ($_POST as $key => $val) {
    if (!isset($val) || $val == "false" || strlen($val) == 0) {
        makeErr($key);
    }
    if ($key == "password1") {
        $pass = $val;
    }
    if ($key == "password2") {
        if ($val != $pass) {
            makeErr("noMatch");
        }
    }
}

?>

<body>
    <form action="../06-20-20/exercise1.php" method="POST">

        <?= @$gender ?>
        <input type="hidden" name="gender" value="false" />
        <input type="radio" name="gender" value="male" />Male<br />
        <input type="radio" name="gender" value="female" />Female<br /><br />

        <?= @$lName ?>
        <input type="text" name="lName" placeholder="Last Name" value="<?= isset($_POST['lName']) ? $_POST['lName'] : '' ?>" /><br />

        <?= @$fName ?>
        <input type="text" name="fName" placeholder="First Name" value="<?= isset($_POST['fName']) ? $_POST['fName'] : '' ?>" /><br />

        <?= @$email ?>
        <input type="email" name="email" placeholder="email@host.com" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" /><br /><br />

        <?= @$password1 ?>
        <input type="password" name="password1" placeholder="Password" value="<?= isset($_POST['password1']) ? $_POST['password1'] : '' ?>" /><br />

        <?= @$password2 ?>
        <?= @$noMatch ?>
        <input type="password" name="password2" placeholder="Confirm password" value="<?= isset($_POST['password2']) ? $_POST['password2'] : '' ?>" /><br /><br />

        <input type="submit" value="Submit" />
    </form>
</body>

</html>