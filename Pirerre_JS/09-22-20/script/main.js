// $("#pascal").click(function () {
//     var maBoite = $("#pascal").parent().attr("class");
//     $("#resultat").html("Je suis contenu dans " + maBoite);
// });

// $("#luc").click(function () {
//     var monVoisin = $(this).next().attr("id");
//     $("#resultat").html("Mon voisin de droite s'appelle " + monVoisin);
// });

// Claude est le cousin de Gael
// Sur un clique sur Gael:
// Obtenir phrase: "Je m'appelle Gael, j'habite dans bordure jaune carre-flex. Mon cousin Claude habite dans bordure rose carre-flex."

// $("#gael").click(function () {
//     var monPrenom = $("#gael").html();
//     var monParent = $("#gael").parent().attr("class");
//     var monCousin = $("#gael").parent().next().children().next();
//     var lePrenomDeMonCousin = monCousin.html();
//     var leParentDeMonCousin = $("#gael").parent().next().attr("class");
//     $("#resultat").text(
//         "Je m'appelle " +
//             monPrenom +
//             ", j'habite dans " +
//             monParent +
//             ". Mon cousin " +
//             lePrenomDeMonCousin +
//             " habite dans " +
//             leParentDeMonCousin +
//             "."
//     );
// });

// Sur un clic sur Noemie
// grise Claude
$("#noemie").click(function () {
    $(this).next().css("background-color", "gray");
});

// Grise son voisin quel que soit l'element selectionne avec jQuery
$(".cercle").click(function () {
    $(this).next().css("background-color", "gray");
});

// Ajouter un cas de figure (une condition) dans lequel
// s'il n'y a pas d'element suivant
// alors on grise l'element precedent

$(".cercle").click(function () {
    if ($(this).next().length) {
        $(this).next().css("background-color", "gray");
    } else {
        $(this).prev().css("background-color", "gray");
    }
});
