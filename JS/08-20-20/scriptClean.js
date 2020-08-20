let nonTraction = 60,
    positionTrain = 0,
    animation;

document.getElementById("train").addEventListener("click", accelerer);

document.getElementById("btnStopper").addEventListener("click", stopperTrain);

function accelerer() {
    if (nonTraction > 10) {
        nonTraction -= 10;
    }

    clearInterval(animation);
    animation = setInterval(frame, nonTraction);

    function frame() {
        positionTrain += 2;
        document.getElementById("train").style.left = positionTrain + "px";
        testerPosition(positionTrain);
    }
}

function testerPosition(posActuelle) {
    if (posActuelle == 260) {
        clearInterval(animation);
        alert("La c'est mort...");
    }
}

function stopperTrain() {
    if (positionTrain < 260) {
        clearInterval(animation);
        alert("Tu a reussi! Tu t'est arreter a " + (260 - positionTrain) + " pixels du bord. Promotion a venir?");
    }
}
