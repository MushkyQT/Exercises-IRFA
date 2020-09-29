var mainHeight = $("#header").height() + $("#navbar").height();
$(window).scroll(function () {
    if ($(window).scrollTop() > mainHeight) {
        $("#body").css("background-position", "49% 20%");
        $(".openCart").addClass("openCartDeploy");
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

$(".cardBtn").hover(function () {
    $(this).parent().parent(".card").toggleClass("borderAnimate");
});

$(".minus").click(function () {
    var tmp = parseInt($(this).siblings(".quantInput").val());
    if (tmp > 1) {
        tmp -= 1;
    }
    $(this).next().val(tmp);
});

$(".plus").click(function () {
    var tmp = parseInt($(this).siblings(".quantInput").val());
    tmp += 1;
    $(this).prev().val(tmp);
});

var products = [
    ["dreamland", 10],
    ["zaba", 6],
    ["htbahb", 8],
    ["leaflings", 2],
    ["glass animals", 2],
    ["cocoa hooves", 2],
    ["tangerine tee", 24],
    ["dave casette", 11],
];

var myCart = [];

$(".addCart").each(function (i) {
    $(this).attr("id", i);
});

$(".addCart").click(function () {
    var productId = $(this).attr("id");
    var product = products[productId];
    var productName = product[0];
    var productPrice = product[1];
    var quantity = parseInt($(this).prev().prev().val());
    var subTotal = productPrice * quantity;
    var firstPurchase = true;

    var addProduct = [productName, productPrice, quantity, subTotal];

    for (i = 0; i < myCart.length; i++) {
        var current = myCart[i];
        if (current.includes(productName)) {
            firstPurchase = false;
            var oldQuant = current[2];
            var newQuant = oldQuant + quantity;
            var newSubTotal = newQuant * productPrice;
            current[2] = newQuant;
            current[3] = newSubTotal;
            myCart[i] = current;
        }
    }

    if (firstPurchase == true) {
        myCart.push(addProduct);
    }
});

$(".openCart").click(function () {
    var tmp;
    for (i = 0; i < myCart.length; i++) {
        tmp += "<tr><th>" + myCart[i][0] + "</th><th>" + myCart[i][1] + "</th><th>" + myCart[i][2] + "</th><th>" + myCart[i][3] + "</th></tr>";
    }
    $("#cartBody").html(tmp);
});
