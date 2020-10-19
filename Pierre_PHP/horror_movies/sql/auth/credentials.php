<?php

$host = 'localhost';
$db = 'filmsite';
$user = 'bibi';
$pass = 'coucou';
$myConnection = mysqli_connect($host, $user, $pass, $db);
if (mysqli_connect_error()) {
    die("Connection to database failed.<br>");
}
mysqli_set_charset($myConnection, "UTF8");
