$(".plus").click(function () {
    var myVar = $(".champQuantite").val();
    myVar = eval(myVar + "+1");
    $(".champQuantite").val(myVar);
});

$(".moins").click(function () {
    var myVar = $(".champQuantite").val();
    myVar = parseInt(myVar);
    if (myVar > 1) {
        myVar = myVar - 1;
    }
    $(".champQuantite").val(myVar);
});
