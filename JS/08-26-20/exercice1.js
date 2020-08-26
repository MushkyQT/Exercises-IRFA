let vBudget = 20;
let vRepas = 0;

document.getElementById("hBudget").innerHTML = vBudget;
document.getElementById("btnCommander").addEventListener("click", acheterSW);

function acheterSW() {
    let sndwchs = document.getElementById("hNSandwiches").value;
    let day = 0;
    reinitFormu();
    while (vBudget > 0) {
        if (sndwchs < 1) {
            alert("Tu peut pas manger moins d'un sandwich par jour... pense a ta sante!");
            reinitFormu();
            return;
        }
        let price = calculerPrixDuJour();
        let cost = price * sndwchs;
        day++;
        if (cost <= vBudget) {
            vBudget -= cost;
            vRepas++;
            document.getElementById("hTicket").innerHTML += "Apres jour " + day + " , il te reste " + Math.round(10*vBudget)/10 + " euros. Les sandwiches t'ont pris " + Math.round(10*cost)/10 + " euros.<br />";
            if (day == 5) {
                document.getElementById("hTicket").innerHTML += "Tu a tenu cinque jours. Bravo! <br />";
            }
        } else {
            document.getElementById("hTicket").innerHTML += "Plus de sous, picsou! <br />";
            vBudget = 0;
        }
    }
    document.getElementById("hTicket").innerHTML += "Tu a reussi a te faire " + vRepas + " repas en " + day + " jours! <br />";
}

function calculerPrixDuJour() {
    var prixSW = (Math.random() * (5 - 1) + 1).toFixed(2);
    return prixSW;
}

function reinitFormu() {
    vBudget = 20;
    vRepas = 0;
    document.getElementById("hTicket").innerHTML = "";
    document.getElementById("hNSandwiches").value = "";
}
