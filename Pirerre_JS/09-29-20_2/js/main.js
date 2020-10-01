$(".plus").click(function () {
    var myVar = $(this).prev().val();
    myVar = eval(myVar + "+1");
    $(this).prev().val(myVar);
});

$(".moins").click(function () {
    var myVar = $(this).next().val();
    myVar = parseInt(myVar);
    if (myVar > 1) {
        myVar = myVar - 1;
    }
    $(this).next().val(myVar);
});

var produits = [
    ["zaba", 2345],
    ["dreamland", 800],
];

var panier = [];

$(".btn-success").click(function () {
    // Recuperer l'index de l'element dans la liste des
    // produits disponibles
    var idProduit = $(this).attr("id");
    console.log("ID du produit : " + idProduit);

    var produit = produits[idProduit];
    console.log("produit en question : " + produit + "e");

    var nom = produit[0];
    console.log("nom : " + nom);
    var prixUnitaire = produit[1];
    console.log("prix unitaire : " + prixUnitaire);
    var valeurDuChamp = $(this).prev().find(".champQuantite").val();
    // l'attribut 'value' d'un input est un string, on a besoin d'un integer
    var quantite = parseInt(valeurDuChamp);
    console.log("quantite : " + quantite);
    var sousTotal = prixUnitaire * quantite;
    console.log("sous-total : " + sousTotal);

    // Creer un element du panier au bon format
    var produitAAjouterAuPanier = [nom, prixUnitaire, quantite, sousTotal];
    console.log("produit a ajouter au panier : " + produitAAjouterAuPanier);

    var premierAchatDeCetArticle = true;

    for (i = 0; i < panier.length; i++) {
        var elementEnCours = panier[i];
        if (elementEnCours.includes(nom)) {
            premierAchatDeCetArticle = false;
            var ancienneQuantite = elementEnCours[2];
            var nouvelleQuantite = ancienneQuantite + quantite;
            var nouveauSousTotal = nouvelleQuantite * prixUnitaire;
            elementEnCours[2] = nouvelleQuantite;
            elementEnCours[3] = nouveauSousTotal;
            panier[i] = elementEnCours;
        }
    }

    // Dans le cas ou c'est la premiere fois qu'on achete cet article
    // l'ajouter au panier

    if (premierAchatDeCetArticle == true) {
        panier.push(produitAAjouterAuPanier);
    }
    console.log(panier);

    // afficherLePanierDansLeHTML();
});
