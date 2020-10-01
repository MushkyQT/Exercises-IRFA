$(window).scroll(function () {
    if ($(document).scrollTop() > $("#header").height()) {
        $("#navbar").addClass("navFixed");
        $(".content h1").css("margin-top", "100px");
        $("#article").css("font-size", "1.2em");
        $(".content").css("width", "80vw");
    } else {
        $("#navbar").removeClass("navFixed");
        $(".content h1").css("margin-top", "0");
        $("#article").css("font-size", "1em");
        $(".content").css("width", "70vw");
    }
});
