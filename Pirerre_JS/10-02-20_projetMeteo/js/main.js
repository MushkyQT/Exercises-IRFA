var apiKey = "b9474c57ce20e1720a6f00538e2f38b8";
var iconURL = "https://openweathermap.org/img/wn/";

$(".panneau").click(function () {
    var query = "https://api.openweathermap.org/data/2.5/weather?id=";
    var currentPanel = $(this);
    var currentBg = $(this).css("background-image");
    $(this).toggleClass("flexMe");
    $(this).siblings().removeClass("flexMe");
    if ($(this).hasClass("flexMe")) {
        var city = $(this).data("ville");
        query += city + "&appid=" + apiKey;
        $.ajax({
            url: query,
            type: "GET",
            success: function (results) {
                var icon = iconURL + results.weather[0].icon + "@2x.png";
                $(currentPanel)
                    .children(".cercle")
                    .css("background-image", "url(" + icon + ")");
                var content = "<p>Hello guys</p><br/><h2>This is a test</h2>";
                $(currentPanel).children(".content").html(content);
            },
            error: function () {
                alert("ajax fail");
            },
            complete: function () {
                console.log("how does this complete thing work?");
            },
        });
    } else {
        $(this).children(".cercle").css("background-image", currentBg);
    }
});
