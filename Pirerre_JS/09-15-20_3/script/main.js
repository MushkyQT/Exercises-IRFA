document.getElementById("monBouton").onclick = function () {
    var maSauce = document.getElementById("champ").value;
    faireDesPates(maSauce);
};

document.getElementById("btn1").onclick = function () {
    faireDesPates("carbonara");
};
document.getElementById("btn2").onclick = function () {
    faireDesPates("bolognaise");
};
document.getElementById("btn3").onclick = function () {
    faireDesPates("arabiatta");
};

function faireDesPates(sauce) {
    var recette = "l'eau et les pates + un pot de sauce " + sauce + " auchan.";

    document.getElementById("leTexte").innerHTML = recette;
}

function faisDuRiz() {
    var recette = "met du riz dans l'autocuiseur et tais-toi";
    document.getElementById("leTexte").innerHTML = recette;
}
