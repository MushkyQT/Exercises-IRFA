$(".monBouton").click(function (e) {
    e.preventDefault();

    $.ajax({
        url: "reponse.php",
        type: "post",
        dataType: "json",
        data: {
            clic: $(this).val(),
        },
        beforeSend: function () {
            $(".maDivDeLoading").css("visibility", "visible");
        },
        success: function (reponseDuPHP) {
            $(".maDivDeLoading").css("visibility", "hidden");
            $(".resultat").html(reponseDuPHP["machin"] + " et " + reponseDuPHP["truc"]);
        },
    });

    //.done(function (reponseDuPHP) {
    //    $(".resultat").html(reponseDuPHP["machin"] + " et " + reponseDuPHP["truc"]);
    //})
});
