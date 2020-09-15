// var maChaine = "un peu de texte";

// var monNombre = 345;
// var monAutreNombre = 5;

// var resultat1 = "";
// var resultat2 = "";

// resultat1 = monNombre + monAutreNombre;
// resultat2 = "" + monNombre + monAutreNombre;

var number = 0;

document.getElementsByTagName("button")[0].onclick = function () {
    number += 1;
    document.getElementById("total").innerHTML = number;
};

document.getElementsByTagName("button")[1].onclick = function () {
    number += 2;
    document.getElementById("total").innerHTML = number;
};

var monNombre = 2 + 1;

var maChaine = "10 + 15";

console.log(eval(maChaine));
