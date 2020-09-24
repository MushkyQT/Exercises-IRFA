$(".panneau").click(function () {
    $(this).toggleClass("flexMe");
    $(this).siblings().removeClass("flexMe");
    $(this).children(".pannelInfo").toggleClass("active");
    $(this).siblings().children(".pannelInfo").removeClass("active");
});
