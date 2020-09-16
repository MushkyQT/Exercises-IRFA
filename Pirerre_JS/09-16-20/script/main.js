// Sur clic du bouton, la couleur passe du rouge au bleu
document.getElementById("monBouton").onclick = function () {
    document.getElementById("monCarre").style.backgroundColor = "blue";
};

// Deuxieme carre:
// sur un clic du second bouton
// le carre devient bleu si il est rouge
// mais si on re-clic qu'il deviennent rouge
var couleurDuCarre = "red";

document.getElementById("monBouton2").onclick = function () {
    if (couleurDuCarre == "red") {
        document.getElementById("monCarre2").style.backgroundColor = "blue";
        couleurDuCarre = "blue";
    } else {
        document.getElementById("monCarre2").style.backgroundColor = "red";
        couleurDuCarre = "red";
    }
};

// document.getElementById("monBouton2").onclick = function () {
//     if (document.getElementById("monCarre2").style.backgroundColor == "red") {
//         document.getElementById("monCarre2").style.backgroundColor = "blue";
//     } else {
//         document.getElementById("monCarre2").style.backgroundColor = "red";
//     }
// };
