// le bouton 1 change le texte du premier paragraphe

document.getElementById("bouton1").onclick = function () {
    document.getElementById("salut").innerHTML =
        "Au-revoir a paul et laura uniquement";
};

// le bouton 2 il prend le prenom et il cree la phrase "Salut je m'appelle PRENOM et je n'aime pas mon prenom"

document.getElementById("bouton2").onclick = function () {
    // document
    //     .getElementById("prenom")
    //     .prepend("Salut je m'appelle ");
    // document
    //     .getElementById("prenom")
    //     .append(" et je n'aime pas mon prenom");
    document.getElementById("prenom").innerHTML =
        "Salut je m'appelle " +
        document.getElementById("prenom").innerHTML +
        " et je n'aime pas mon prenom";
};

// le bouton 3 fasse apparaitre le titre "Magie ! Voila du texte en plus"

document.getElementById("bouton3").onclick = function () {
    document.getElementById("paragrapheVide").innerHTML =
        "<h1 class='rouge'>Magie ! Voila du texte en plus</h1>";
};

// 4

document.getElementById("bouton4").onclick = function () {
    document.getElementById("pleinDeTexte").style.display = "none";
};
