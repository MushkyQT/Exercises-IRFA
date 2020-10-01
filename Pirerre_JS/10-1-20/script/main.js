// var pasBon = new Array("courgette", "brocoli", "travers de porc");
// var miamSucre = ["peche", "banana-split", "tiramisu"];

// pasBon.push("cotelette d'agneau");
// console.log(pasBon[3]);

// pasBon.splice(1, 1);
// console.log(pasBon);

// var menu3 = [
//     ["Pizza", "4 fromages", "reine", "chevre"],
//     ["Pates", "bolognaise", "carbonara", "pesto"],
//     ["Tarte", "pommes", "peches", "fromage"],
// ];

// for (var i = 0; i < miamSucre.length; i++) {
//     console.log(miamSucre[i]);
// }

// Creer une methode remplirLeTableau
// cette methode utilise n'importe-quel tableau
// avec n'importe quel tableau du meme format qu'on lui passe

function remplirLeTableau(tab) {
    document.getElementById("monBody").innerHTML = "";
    for (var i = 0; i < tab.length; i++) {
        document.getElementById("monBody").innerHTML += "<tr><td>" + tab[i][0] + "</td><td>" + tab[i][1] + "</td><td>" + tab[i][2] + "</td></tr>";
    }
}

var lesGens = [
    ["Luc", "34 ans", "comptable"],
    ["Marla", "28 ans", "Professeure"],
    ["Marc", "52 ans", "Chirurgien obstétriste du bulbe rachidien"],
    ["Marcouille", "55 ans", "Bulbe rachidien"],
    ["Marcette", "544 ans", "Chirurgien du bulbe rachidien"],
    ["Marco", "39 ans", "Obstétriste du bulbe rachidien"],
];

var lesAutresGens = [
    ["Cedric", "34 ans", "comptable"],
    ["Paul", "28 ans", "Professeure"],
    ["Jacques", "52 ans", "Chirurgien obstétriste du bulbe rachidien"],
    ["Marina", "12 ans", "Capitaine du Titanic"],
    ["Pascaline", "52 ans", "Chirurgien obstétriste du bulbe rachidien"],
    ["Maxime", "52 ans", "Dentiste"],
    ["Lucienne", "52 ans", "Plasticienne"],
    ["Claudio", "52 ans", "Acteur"],
];

var encoreDesAutresGens = [
    ["Sonia", "34 ans", "comptable"],
    ["Michel", "28 ans", "Professeure"],
    ["Gaetan", "18 ans", "Pilote"],
    ["Pascal", "12 ans", "Capitaine du Titanic"],
    ["Sophie", "67 ans", "Chirurgien obstétriste du bulbe rachidien"],
    ["Patricia", "22 ans", "Couturiere"],
    ["Mael", "35 ans", "Dirige une secte"],
    ["Bastien", "52 ans", "Plombier"],
];

var lesGensAjoutable = [
    ["Francois", "14 ans", "Ministre de l'interieur"],
    ["Jean-Pasteque", "270 ans", "Ministre de la jeunesse et des sports"],
];

document.getElementById("lesGens").onclick = function () {
    remplirLeTableau(lesGens);
};
document.getElementById("lesAutresGens").onclick = function () {
    remplirLeTableau(lesAutresGens);
};
document.getElementById("encoreDesAutresGens").onclick = function () {
    remplirLeTableau(encoreDesAutresGens);
};

function rempliLeTroisiemeTableau(tabAuBonFormat) {
    document.getElementById("monBody2").innerHTML = "";
    for (var i = 0; i < tabAuBonFormat.length; i++) {
        document.getElementById("monBody2").innerHTML +=
            "<tr><td>" +
            tabAuBonFormat[i][0] +
            "</td><td>" +
            tabAuBonFormat[i][1] +
            "</td><td>" +
            tabAuBonFormat[i][2] +
            "</td><td><button id='" +
            i +
            "' class='btn btn-danger'>Supprimer</button><button class='btn btn-warning modifier' data-modif='" +
            i +
            "'>Modifier</button></td></tr>";
    }
    $(".ajouterDesGens").click(function () {
        var indexDeLaPersonne = $(this).attr("sonIndex");
        var personneAAjouter = lesGensAjoutable[indexDeLaPersonne];
        tabAuBonFormat.push(personneAAjouter);
        rempliLeTroisiemeTableau(tabAuBonFormat);
    });
    $(".btn-danger").click(function () {
        var pos = $(this).attr("id");
        tabAuBonFormat.splice(pos, 1);
        rempliLeTroisiemeTableau(tabAuBonFormat);
    });

    $(".modifier").click(function () {
        var indexDeLElementAModifier = $(this).data("modif");
        var celluleNom = $(this).parent().parent().children().first();
        var celluleAge = celluleNom.next();
        var celluleProfession = celluleAge.next();

        // Il faudra penser a fermer le formulaire a la fin </form>
        var nouvelleCelluleNom = "<input type='text' value='" + tabAuBonFormat[indexDeLElementAModifier][0] + "'>";
        var nouvelleCelluleAge = "<input type='text' value='" + tabAuBonFormat[indexDeLElementAModifier][1] + "'>";
        var nouvelleCelluleProfession = "<input type='text' value='" + tabAuBonFormat[indexDeLElementAModifier][2] + "'>";

        celluleNom.html(nouvelleCelluleNom);
        celluleAge.html(nouvelleCelluleAge);
        celluleProfession.html(nouvelleCelluleProfession);

        var nouveauBoutonSauvegarder =
            "<input type='submit' value='Sauvegarder' class='btn btn-success sauvegarder' data-sauvegarde='" + indexDeLElementAModifier + "'>";

        $(this).replaceWith(nouveauBoutonSauvegarder);

        $(".sauvegarder").click(function () {
            var indexDeLElementPourSauvegarde = $(this).data("sauvegarde");
            var nouveauNom = $(this).parent().parent().children().first().children().first().val();
            var nouvelAge = $(this).parent().parent().children().first().next().children().first().val();
            var nouvelleProfession = $(this).parent().parent().children().first().next().next().children().first().val();
            tabAuBonFormat[indexDeLElementPourSauvegarde] = [nouveauNom, nouvelAge, nouvelleProfession];
            rempliLeTroisiemeTableau(tabAuBonFormat);
        });
    });
}

rempliLeTroisiemeTableau(lesGens);

$(".boutonEnregistrer").click(function (evenement) {
    // mon bouton est une balise input
    // je desactive son comportement par defaut
    // donc il ne se comportera pas comme un lien
    evenement.preventDefault();

    // je recupere les valeurs entrees dans les 3 inputs
    // en y accedant de maniere RELATIVE au bouton
    // sur lequel on a clique (THIS)
    var nom = $(this).siblings(".inputNom").val();
    var age = $(this).siblings(".inputAge").val();
    var profession = $(this).siblings(".inputProfession").val();

    // avec ces 3 valeurs, je construis ma nouvellePersonneAuTableau
    var nouvellePersonneAuTableau = [nom, age, profession];

    // une fois ma nouvellePersonneAuTableau formatee correctement
    // et donc prete a integrer lesGens
    // je l'ajoute a ce dernier
    lesGens.push(nouvellePersonneAuTableau);

    // enfin, une fois lesGens mis a jour
    // je peut regenerer ma table HTML
    // avec les nouvelles donnees contenues dans lesGens
    rempliLeTroisiemeTableau(lesGens);
});

// $(".btn-danger").click(function () {
//     var pos = $(this).parent().parent().prevAll().length;
//     lesGens.splice(pos, 1);
//     rempliLeTroisiemeTableau(lesGens);
// });

// for (var i = 0; i < lesGens.length; i++) {
//     document.getElementById("monBody").innerHTML += "<tr><td>" + lesGens[i][0] + "</td><td>" + lesGens[i][1] + "</td><td>" + lesGens[i][2] + "</td></tr>"
// }
