$(".plus").click(function () {
    var myVar = $(this).prev().val();
    myVar = eval(myVar + "+1");
    $(this).prev().val(myVar);
});

$(".moins").click(function () {
    var myVar = $(this).next().val();
    myVar = parseInt(myVar);
    if (myVar > 1) {
        myVar = myVar - 1;
    }
    $(this).next().val(myVar);
});

var produits = [
    ["zaba", 2345],
    ["dreamland", 800],
];

var panier = [["canard", 2, 5, 10]];
