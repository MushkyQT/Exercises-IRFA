/* TODO Créer 3 variables 
nonTraction valant au depart 200
position train valant au depart 0
animation sans valeur initial
*/

let nonTraction = 60, // Valeur propose de 200 trop lente
    positionTrain = 0,
    animation;

/* TODO Ajouter auditeur de clic sur le train qui appelle la fonction accelerer() */
document.getElementById("train").addEventListener("click", accelerer);

/* TODO Ajouter auditeur de clic sur le bouton stop qui appelle la fonction stopperTrain() */
document.getElementById("btnStopper").addEventListener("click", stopperTrain);

function accelerer() {
/* TODO Tester si le train est deja en vitesse max sinon accelerer */
    if (nonTraction > 10) { // Sauf si la valeur de nonTraction est deja au minimum de <= 10,
        nonTraction -= 10; // on fait qu'a chauqe clique, on baisse nonTraction (et donc l'interval de notre animation)
    }

/* TODO Si le train avance le bloquer et redémarrer avec la nouvelle vitesse(moins d'avance en roue libre) */
    clearInterval(animation); // On arrete l'animation en cours pour ensuite la re-definir avec la nouvelle valeur d'interval
    animation = setInterval(frame, nonTraction);

/* TODO Replacer le train et appeller la fonction pour tester s'il est arriver au bout */
    function frame() {
        positionTrain += 2; // Changement de 2px par frame
        document.getElementById("train").style.left = positionTrain + "px"; // Pousse le train de 2px (positionTrain) vers la droite a chaque frame
        testerPosition(positionTrain); // Tester la position du train a chaque frame
    }
}

/* TODO Tester la position. Si elle correspond au bord droit declancher l'accident */
function testerPosition(posActuelle) {
    if (posActuelle == 260) { // Si la position du train est egale a la largeur du carre vert moins la largeur de l'img train, on a perdu (les bords se sont toucher)
        clearInterval(animation); // Stop l'animation en cours
        alert("La c'est mort..."); // Fini...
    }
}

/* TODO Tester si le train a deja percuter le bord si ce n'est pas encore le cas, le stopper */
function stopperTrain() {
    if (positionTrain < 260) { // Si la position du train est inferieur a la largeur du carre vert moins la largeur de l'img train, on s'arrete en vie
        clearInterval(animation); // Stop l'animation en cours
        alert("Tu a reussi! Tu t'est arreter a " + (260 - positionTrain) + " pixels du bord. Promotion a venir?"); // C'est gagne! Largeur du carre vert moins position du train = distance du bord
    }
}
