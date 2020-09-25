var mainHeight = $("#header").height() + $("#navbar").height();
$(window).scroll(function () {
    if ($(window).scrollTop() > mainHeight / 10) {
        $("#body").addClass("bodySlid");
    }
    if ($(window).scrollTop() > mainHeight) {
        $("#body").css("background-attachment", "fixed");
        $("#body").css("background-position", "center");
    }
    for (var i = 0; i < $(".slider").length; i++) {
        if ($(window).scrollTop() > $(".slider:eq(" + i + ")").offset().top - $(window).height() / 1.5) {
            $(".slider:eq(" + i + ")").addClass("slid");
        }
    }
});

$(".panneau").click(function () {
    var mainDiv = $(this);
    var subDivs = $(this).children("span, p");
    var sideDivs = $(this).siblings();
    mainDiv.toggleClass("flexMe");
    subDivs.toggleClass("hideMe");
    sideDivs.children("span, p").addClass("hideMe");
    sideDivs.removeClass("flexMe");
});

$(".fa-arrow-left").click(function () {
    var current = $(this).siblings(".visible");
    var prev = current.prev("img");
    current.removeClass("visible");
    if (prev.length > 0) {
        prev.addClass("visible");
    } else {
        current.siblings("img").last().addClass("visible");
    }
});

$(".fa-arrow-right").click(function () {
    var current = $(this).siblings(".visible");
    var next = current.next("img");
    current.removeClass("visible");
    if (next.length > 0) {
        next.addClass("visible");
    } else {
        current.siblings("img").first().addClass("visible");
    }
});
