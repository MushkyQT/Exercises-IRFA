$(".left").click(function () {
    var current = $(this).closest("div").find(".visible");
    var prev = current.prev();
    current.removeClass("visible");
    if (prev.length > 0) {
        prev.addClass("visible");
    } else {
        current.parent().children().last().addClass("visible");
    }
});

$(".right").click(function () {
    var current = $(this).closest("div").find(".visible");
    var next = current.next();
    current.removeClass("visible");
    if (next.length > 0) {
        next.addClass("visible");
    } else {
        current.parent().children().first().addClass("visible");
    }
});

$(window).scroll(function () {
    if ($(window).scrollTop() + $(window).height() == $(document).height()) {
        $(".bodyContent").find(".hidden").first().removeClass("hidden");
    }
});

var urls = ["./img/background.jpg", "./img/background2.jpg", "./img/background3.jpg", "./img/background4.jpg"];

var j = 0;
setInterval(function () {
    j++;
    if (j >= urls.length) {
        j = 0;
    }
    $(".header").css("background-image", "url(" + urls[j] + ")");
}, 6000);
