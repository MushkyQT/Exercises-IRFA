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
    document.getElementById("monBody").innerHTML = ""
    for (var i = 0; i < tab.length; i++) {
        document.getElementById("monBody").innerHTML += "<tr><td>" + tab[i][0] + "</td><td>" + tab[i][1] + "</td><td>" + tab[i][2] + "</td></tr>"
    }
}

var lesGens = [
    ["Luc", "34 ans", "comptable"],
    ["Marla", "28 ans", "Professeure"],
    ["Marc", "52 ans", "Chirurgien obstétriste du bulbe rachidien"],
    ["Marcouille", "55 ans", "Bulbe rachidien"],
    ["Marcette", "544 ans", "Chirurgien du bulbe rachidien"],
    ["Marco", "39 ans", "Obstétriste du bulbe rachidien"]

];

var lesAutresGens = [
    ["Cedric", "34 ans", "comptable"],
    ["Paul", "28 ans", "Professeure"],
    ["Jacques", "52 ans", "Chirurgien obstétriste du bulbe rachidien"],
    ["Marina", "12 ans", "Capitaine du Titanic"],
    ["Pascaline", "52 ans", "Chirurgien obstétriste du bulbe rachidien"],
    ["Maxime", "52 ans", "Dentiste"],
    ["Lucienne", "52 ans", "Plasticienne"],
    ["Claudio", "52 ans", "Acteur"]

];

var encoreDesAutresGens = [
    ["Sonia", "34 ans", "comptable"],
    ["Michel", "28 ans", "Professeure"],
    ["Gaetan", "18 ans", "Pilote"],
    ["Pascal", "12 ans", "Capitaine du Titanic"],
    ["Sophie", "67 ans", "Chirurgien obstétriste du bulbe rachidien"],
    ["Patricia", "22 ans", "Couturiere"],
    ["Mael", "35 ans", "Dirige une secte"],
    ["Bastien", "52 ans", "Plombier"]

];

document.getElementById("lesGens").onclick = function() {
    remplirLeTableau(lesGens);
}
document.getElementById("lesAutresGens").onclick = function() {
    remplirLeTableau(lesAutresGens);
}
document.getElementById("encoreDesAutresGens").onclick = function() {
    remplirLeTableau(encoreDesAutresGens);
}

// for (var i = 0; i < lesGens.length; i++) {
//     document.getElementById("monBody").innerHTML += "<tr><td>" + lesGens[i][0] + "</td><td>" + lesGens[i][1] + "</td><td>" + lesGens[i][2] + "</td></tr>"
// }