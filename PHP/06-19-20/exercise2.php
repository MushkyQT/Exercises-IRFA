<?php
if (empty($_POST)) {
    echo '<!DOCTYPE html>
    <html>
    <head>
    <title>Exercise 2</title>
    </head>
    <body>
    <h2>Formulaire Exercise 2</h2>
    <form action="../06-19-20/exercise2.php" method="POST">
    <input type="text" id="fName" name="fName" placeholder="Your" /><br />
    <input type="text" id="lName" name="lName" placeholder="Name" /><br /><br />
    <input type="radio" id="male" name="gender" value="male" />Male<br />
    <input type="radio" id="female" name="gender" value="female" />Female<br /><br />
    <input type="checkbox" id="wine1" name="wine1" value="bordeaux">Bordeaux<br />
    <input type="checkbox" id="wine2" name="wine2" value="beaujolais">Beaujolais<br />
    <input type="checkbox" id="wine3" name="wine3" value="loire">Loire<br /><br />
    
    <input type="submit" value="Submit" />
    </form>
    </body>
    </html>';
} else {
    $gender = "";
    if (isset($_POST["gender"]) && $_POST["gender"] == "male") {
        $gender = "Monsieur";
    } else if (isset($_POST["gender"])) {
        $gender = "Madame";
    }

    $winesQuant = 3;
    $wines = [];
    for ($i = 1; $i <= $winesQuant; $i++) {
        if (isset($_POST["wine$i"])) {
            array_push($wines, ucfirst($_POST["wine$i"]));
        }
    }

    $winesStr = implode(", ", $wines);

    echo "<p>Bonjour " . $gender . " " . ucfirst($_POST["lName"]) . " " . ucfirst($_POST["fName"]) . ". Vous avez acheter les vins suivants: " . $winesStr;
}
