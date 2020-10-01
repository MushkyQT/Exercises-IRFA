// changement automatique du bg du header
var imagesBackground = ["img/background1.jpg", "img/background2.jpg", "img/background3.jpg"];

var quelIndex = 0;

function changerLeBackground() {
    quelIndex++;
    if (quelIndex == imagesBackground.length) {
        quelIndex = 0;
    }
    var monNouveauBackground = imagesBackground[quelIndex];
    $(".header").css({
        "background-image": "url(" + monNouveauBackground + ")",
    });
}

setInterval(changerLeBackground, 2000);

// les sliders
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

// sur un scroll, je veux faire apparaitre la prochaine div troisArticles
$(document).scroll(function () {
    if ($(window).scrollTop() + $(window).height() == $(document).height()) {
        $(".articles").children(".articleCache").first().fadeIn("slow");
        $(".articles").children(".articleCache").first().removeClass("articleCache");
    }
});
