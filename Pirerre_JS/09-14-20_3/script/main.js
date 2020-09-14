document.getElementById("monBouton").onclick = function () {
    var usrInput = document.getElementById("pogChamp").value;

    document.getElementById("monParagraphe").innerHTML = usrInput;
};

document.getElementById("monBouton2").onclick = function () {
    var age = document.getElementById("champAge").value;
    if (age >= 18) {
        document.getElementById("monParagraphe2").innerHTML =
            "Bonjour monsieur majeur";
    } else {
        document.getElementById("monParagraphe2").innerHTML = "Pars, mineur";
    }
};

let magicWord = "dauphin";

document.getElementById("monBouton3").onclick = function () {
    if (document.getElementById("champMagique").value == magicWord) {
        document.getElementById("monParagraphe3").innerHTML =
            "Bravo, vous avez trouve le mot magique. C'est tres bien. Partez maintenant.";
    } else {
        document.getElementById("monParagraphe3").innerHTML = "Nope";
    }
};
