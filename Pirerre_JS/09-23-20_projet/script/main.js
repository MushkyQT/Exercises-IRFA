$(window).scroll(function () {
    if ($(window).scrollTop() > ($("#header").height() + $("#navbar").height()) / 2) {
        $(".slider").addClass("slid");
        $("#body").addClass("bodySlid");
    }
});

$(".panneau").click(function () {
    $(this).toggleClass("flexMe");
    $(this).children("span").toggleClass("hideMe");
    $(this).children("p").toggleClass("hideMe");
    $(this).siblings().children("span").addClass("hideMe");
    $(this).siblings().children("p").addClass("hideMe");
    $(this).siblings().removeClass("flexMe");
});
