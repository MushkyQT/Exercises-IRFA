<?php 
$gender = "";
if (isset($_GET["gender"]) && $_GET["gender"] == "male") {
  $gender = "Monsieur";
} else if (isset($_GET["gender"])) {
  $gender = "Madame";
}

$winesQuant = 3;
$wines = [];
for ($i = 1; $i <= $winesQuant; $i++) {
  if (isset($_GET["wine$i"])) {
    array_push($wines, ucfirst($_GET["wine$i"]));
  }
}

$winesStr = implode(", ", $wines);

echo "<p>Bonjour " . $gender . " " . ucfirst($_GET["lName"]) . " " . ucfirst($_GET["fName"]) . ". Vous avez acheter les vins suivants: " . $winesStr;