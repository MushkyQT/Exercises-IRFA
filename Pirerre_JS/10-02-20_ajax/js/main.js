// au chargement de la page, remplacer le contenu du paragraphe par
// une blague au hasard sur Chuck Norris

var monURL = "https://api.chucknorris.io/jokes/random?category=";

$.ajax({
    url: "https://api.chucknorris.io/jokes/categories",
    type: "GET",
    success: function (apiData) {
        console.log("Successfully retrieved api data: " + apiData);
        for (i = 0; i < apiData.length; i++) {
            makeButton(apiData[i]);
        }
        $("button").click(function () {
            var monURLFull = monURL + $(this).attr("id");
            vaChercherUneBlague(monURLFull);
        });
    },
    error: function () {
        alert("error ajax");
    },
    complete: function () {},
});

function makeButton(category) {
    $(".buttons").append("<button class='btn btn-warning' id='" + category + "'>une blague sur " + category + "</button>");
}

function vaChercherUneBlague(urlApi) {
    $.ajax({
        url: urlApi,
        type: "GET",
        success: function (donnesVenantDeNotreAPI) {
            leTableauContenantMaBlagueAuHasard = donnesVenantDeNotreAPI;
            maBlagueAuHasard = leTableauContenantMaBlagueAuHasard.value;
            $(".monParagraphe").html(maBlagueAuHasard);
        },
        error: function () {
            alert("oh no no no... ajax failed");
        },
    });
}
