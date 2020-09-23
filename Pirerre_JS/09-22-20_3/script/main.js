$(document).ready(function () {
    $(".panneau").hover(function () {
        $(this).toggleClass("open");
        $(this).children("h1").toggleClass("hide");
    });
});
