import { disUneCouleurAuHasard } from "./colorGen.js";
function changeSesMesures(idDiv) {
    document.getElementById(idDiv).style.width = Math.random() * 450 + "px";
    document.getElementById(idDiv).style.height = Math.random() * 450 + "px";
    var random = Math.random();
    if (random > 0.5) {
        document.getElementById(idDiv).style.borderRadius = "50%";
    } else {
        document.getElementById(idDiv).style.borderRadius = "0%";
    }
    document.getElementById(idDiv).style.top = Math.random() * 100 + "%";
    document.getElementById(idDiv).style.left = Math.random() * 100 + "%";
    document.getElementById(idDiv).style.visibility = "visible";
}

function mesureEtCouleur(myDiv) {
    disUneCouleurAuHasard(myDiv);
    changeSesMesures(myDiv);
}

export function monAction(myDiv) {
    document.getElementById(myDiv).style.visibility = "hidden";
    var time = Math.random() * 5000;
    setTimeout(mesureEtCouleur, time, myDiv);
}
