var vDateJour = document.getElementById("divDateJour");

var vBtnQF = document
    .getElementById("btnQF")
    .addEventListener("click", afficherConseil);

//créer un objet date

var dDay = new Date();

afficheDate();

function afficheDate() {
    let option = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
    };
    vDateJour.innerHTML = dDay.toLocaleDateString("fr-FR", option);
}

function afficherConseil() {
    var numJourSem = dDay.getDay();

    var monConseil;

    switch (numJourSem) {
        case 0:
            monConseil = "Un peu de repos bien mérité.";
            break;
        case 1:
            monConseil = "Fais ce que tu as à faire, voyons.";
            break;
        case 2:
            monConseil = "Prends le temps de regarder la nature.";
            break;
        case 3:
            monConseil = "Un petit déjeuner copieux c'est mieux.";
            break;
        case 4:
            monConseil = "Apprends quelque chose de plus par jour.";
            break;
        case 5:
            monConseil = "Fais la liste des choses à faire.";
            break;
        case 6:
            monConseil = "Fais une des choses de ta liste.";
            break;
        default:
            monConseil = "Bizarre bizarre autant qu'étrange.";
            break;
    }
    if (dDay.getMonth() >= 5 && dDay.getMonth() <= 9) {
        monConseil += " En plus, il fait beau.<br />";
    }
    //afficher la valeur de monConseil dans divConseil
    document.getElementById("divConseil").innerHTML = monConseil;
}
