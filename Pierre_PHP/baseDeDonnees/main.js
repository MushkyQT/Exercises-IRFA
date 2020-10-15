$(".boutonModifier").click(function () {
    var idAModifier = $(this).next().children().first().val();
    var prenomAModifier = $(this).parent().parent().children().first().html();
    var animalAModifier = $(this).parent().parent().children().first().next().html();
    var formSupprimerARecuperer = $(this).next().html();

    var aMettreDansMaDiv =
        "<form id='form" +
        idAModifier +
        "' name='id' value='" +
        idAModifier +
        "' method='post'></form><td><input value='" +
        prenomAModifier +
        "' type='text' name='prenomAModifier' form='form" +
        idAModifier +
        "'></td><td><input value='" +
        animalAModifier +
        "' type='text' name='animalAModifier' form='form" +
        idAModifier +
        "'><button type='submit' value='" +
        idAModifier +
        "' form='form" +
        idAModifier +
        "' name='idAModifier' class='btn btn-success'>Confirmer</button></td><td><form action='' method='post'>" +
        formSupprimerARecuperer +
        "</form></td>";

    $(this).parent().parent().html(aMettreDansMaDiv);
});
