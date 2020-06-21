<!DOCTYPE html>

<head>
    <title>Date and time validity checker</title>
</head>

<body>
    <p id="p"></p>
    <button type="button" id="delDate" onclick="eraseCookie('date')">Reset date!</button>
    <button type="button" id="delHour" onclick="eraseCookie('time')">Reset hour!</button>
</body>

<script type="text/javascript">
    function createCookie(name, value) {
        document.cookie = name + "=" + value;
        location.reload();
    }

    function checkDate(input, name) {
        let re = /^\d{1,2}\/\d{1,2}\/\d{4}$/;
        if (input != '' && !input.match(re)) {
            alert("Invalid date format: " + input);
            return false;
        } else {
            createCookie(name, input);
        }
    }

    function checkTime(input, name) {
        let re = /^([0-1]?[0-9]|2[0-3]):[0-5]|[0-9]$/;
        if (input != '' && !input.match(re)) {
            alert("Invalid time format: " + input);
            return false;
        } else {
            createCookie(name, input);
        }
    }

    function readCookie(name) {
        let key = name + "=";
        let splitCookie = document.cookie.split(';');
        for (let i = 0; i < splitCookie.length; i++) {
            let cookie = splitCookie[i];
            while (cookie.charAt(0) == " ") {
                cookie = cookie.substring(1);
            }
            if (cookie.indexOf(key) == 0) {
                return cookie.substring(key.length, cookie.length);
            }
        }
        return "";
    }

    function ifCookie(name) {
        let check = readCookie(name);
        if (check != "") {
            document.getElementById("p").innerHTML += " " + check;
        } else {
            check = prompt("Please enter a " + name + ": ");
            if (check != null && check != "") {
                if (name == 'date') {
                    checkDate(check, name);
                } else if (name == 'time') {
                    checkTime(check, name);
                }
            }
        }
    }

    function eraseCookie(name) {
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:01 GMT;";
        ifCookie(name);
    }

    window.onload = ifCookie("date");
    window.onload = ifCookie("time");
</script>

<?php
/*
1) Créer une fonction qui permet de:
– Vérifier la validité de la date et l’heure entré par lutilisateur.
– Puis transformer le format de la date entré en Year-Month-Day et le format de l’heure en Heures : Minute
*/
date_default_timezone_set('Europe/Paris');
echo "<br><p>";

if (isset($_COOKIE['date'])) {
    $date = $_COOKIE['date'];
    $dateObj = date_create($date);
    $dateSplit = explode('/', $date);
    $month = $dateSplit[0];
    $day = $dateSplit[1];
    $year = $dateSplit[2];
    $currentyear = date("Y");
    if (checkdate($month, $day, $year) && $year <= $currentyear) {
        echo date_format($dateObj, "Y/m/d") . " is valid ";
    } else {
        echo $date . " is invalid ";
    }
}

echo "<br>";

if (isset($_COOKIE['time'])) {
    $time = $_COOKIE['time'];
    $continue = false;
    if (strlen($time) < 2) {
        $time = 0 . $time;
    }
    if (strpos($time, ":") === false) {
        $time = $time . ":00";
    }
    if (strtotime($time) == true) {
        $timeFormat = strtotime($time);
        $continue = true;
    }
    if (preg_match("/^([0-1]?[0-9]|2[0-3]):[0-5]|[0-9]$/", $time) && $continue == true) {
        echo date("G:i", $timeFormat) . " is valid ";
    } else {
        echo $time . " is invalid ";
    }
}

echo "</p>";
?>