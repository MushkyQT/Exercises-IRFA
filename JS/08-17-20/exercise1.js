document.getElementById("pile").onclick = function () {
    alert("Tu a choisi pile...");
    flipCoin(1);
};
document.getElementById("face").onclick = function () {
    alert("Tu a choisi face...");
    flipCoin(2);
};

function flipCoin(usrBet) {
    let coinToss = Math.floor(Math.random() * 2 + 1);
    let result;

    if (coinToss == 1) {
        result = "pile";
    } else if (coinToss == 2) {
        result = "face";
    }

    if (usrBet == coinToss) {
        alert("Bravo! C'etais " + result + ".");
    } else {
        alert("Dommage. C'etais " + result + ".");
    }
}
