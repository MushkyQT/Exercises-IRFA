var maChaine = "Poulailler",
    monAutreChaine = "Kinesitherapeute",
    encoreUneAutreChaine = "une petite phrase avec des mots";

var maNouvelleChaine = monAutreChaine.split("sithe");
console.log(maNouvelleChaine.join(""));

// Math.random genere un nombre entre 0 et 1;

for (i = 0; i < 5; i++) {
    console.log(Math.random());
}

// Si je veut un chiffre compris entre 0 et 10,
// il me faut multiplier le resultat par 10.

for (i = 0; i < 5; i++) {
    console.log(Math.random() * 10);
}

// et pour arrondir

for (i = 0; i < 5; i++) {
    console.log(Math.floor(Math.random() * 10));
}

// Mon random color picker:
var possibleNumbers = "0123456789",
    possibleLetters = "ABCDEF";

function pickColor() {
    var color = "#";
    for (i = 0; i < 6; i++) {
        var random = Math.floor(Math.random() * 2);
        if (random == 0) {
            var temp = possibleNumbers.split("");
            color += temp[Math.floor(Math.random() * temp.length)];
        } else {
            var temp = possibleLetters.split("");
            color += temp[Math.floor(Math.random() * temp.length)];
        }
    }
    return color;
}

document.getElementById("btn").onclick = function () {
    var myColor = pickColor();
    document.getElementById("color").innerHTML = myColor;
    document.getElementById("color").style.backgroundColor = myColor;
};

// Random color picker de Pierre
function disUneCouleurAuHasard() {
    var caracteresHexa = "0123456789ABCDEF".split("");
    var couleurAuHasard = "#";
    for (var i = 0; i < 6; i++) {
        couleurAuHasard += caracteresHexa[Math.floor(Math.random() * 16)];
    }
    return couleurAuHasard;
}

document.getElementById("btn2").onclick = function () {
    var maNouvelleCouleur = disUneCouleurAuHasard();
    document.getElementById("color2").innerHTML = maNouvelleCouleur;
    document.getElementById("color2").style.backgroundColor = maNouvelleCouleur;
};
