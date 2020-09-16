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

var lesGens = [
    ["Luc", "34 ans", "comptable"],
    ["Marla", "28 ans", "Professeure"],
    ["Marc", "52 ans", "Chirurgien obstétriste du bulbe rachidien"],
];

for (var i = 0; i < lesGens.length; i++) {
    document.getElementById("monBody").innerHTML +=
        "<td>" +
        lesGens[i][0] +
        "</td><td>" +
        lesGens[i][1] +
        "</td><td>" +
        lesGens[i][2] +
        "</td>";
}
