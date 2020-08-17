document.getElementById("rock").onclick = function () {
    fight("pierre");
};
document.getElementById("paper").onclick = function () {
    fight("feuille");
};
document.getElementById("scissors").onclick = function () {
    fight("ciseaux");
};
let win;
function fight(choice) {
    let computer = Math.floor(Math.random() * 3 + 1);
    switch (computer) {
        case 1:
            computer = "pierre";
            break;
        case 2:
            computer = "feuille";
            break;
        case 3:
            computer = "ciseaux";
            break;
    }
    if (choice == computer) {
        alert ("Tu a choisi " + choice + ". L'ordinateur a aussi choisi " + computer + ". Donc egalite!");
        return;
    }

    switch (choice) {
        case "pierre":
            if (computer == "feuille") {
                win = false;
            } else {
                win = true;
            }
            break;
        case "feuille":
            if (computer == "ciseaux") {
                win = false;
            } else {
                win = true;
            }
            break;
        case "ciseaux":
            if (computer == "pierre") {
                win = false;
            } else {
                win = true;
            }
            break;
    }

    if (win == false) {
        win = "perdu!";
    } else if (win == true) {
        win = "gagne!";
    }

    alert ("Tu a choisi " + choice + ". L'ordinateur a choisi " + computer + ". Donc c'est " + win);
}
