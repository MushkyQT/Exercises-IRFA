<?php

$host = 'localhost';
$db = 'lescartes';
$user = 'moi';
$pass = 'monmotdepasse';
$myConnection = mysqli_connect($host, $user, $pass, $db);
if (mysqli_connect_error()) {
    die("Connection to database failed.<br>");
}
