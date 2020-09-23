$(".panneau").click(function () {
    var myElement = $(this).attr("id");
    flexIt(myElement);
});

function flexIt(selector) {
    $("#" + selector).toggleClass(selector);
    $("#" + selector).toggleClass("flexMe");
}
