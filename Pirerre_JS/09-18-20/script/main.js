import { monAction } from "./sizeGen.js";

document.getElementById("heures").innerHTML = new Date().getHours() + "H";
document.getElementById("minutes").innerHTML = new Date().getMinutes() + "m";
document.getElementById("secondes").innerHTML = new Date().getSeconds() + "s";

document.getElementById("color").onclick = function () {
    monAction(this.id);
};

// Creer new <p>:
// Il vous a fallu "" de temps pour cliquer sur la forme"
// Mesurer temps qu'il a fallu a l'utilisateur pour cliquer sur la forme qui vient d'apparaitre
