$(document).ready(function () {
    $(".panneau").click(function () {
        $(this).toggleClass("open");
        $(this).children("h1").toggleClass("hide");
    });
});
