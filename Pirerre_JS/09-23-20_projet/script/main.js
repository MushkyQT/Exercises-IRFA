$(".panneau").click(function () {
    $(this).toggleClass("flexMe");
    $(this).siblings().removeClass("flexMe");
});
