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

var urls = [
    "https://media.newyorker.com/photos/5f3ed8c0165d4d7af1f9bbb2/2:1/w_2559,h_1279,c_limit/200831_r36929.jpg",
    "https://c402277.ssl.cf1.rackcdn.com/photos/18635/images/magazine_hero/Medium_WW226338.jpg?1581012924",
    "https://www.awf.org/sites/default/files/Website_SpeciesPage_Pangolin01_Hero.jpg",
    "https://static.nationalgeographic.co.uk/files/styles/image_3200/public/01-pangolin-leather-nationalgeographic_2725168.jpg?w=1600&h=900",
];

var j = 0;
setInterval(function () {
    j++;
    if (j >= urls.length) {
        j = 0;
    }
    $("#mainDiv").css("background-image", "url(" + urls[j] + ")");
}, 2000);
