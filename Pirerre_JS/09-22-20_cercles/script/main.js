// Sur un clic sur le cercle
//on agrandisse le cercle jusqu'a 400px par 400px
//que l'animation dure 2 secondes
// en utilisant animate()

$(".cercle").click(function () {
    $(this).animate(
        {
            width: "400px",
            height: "400px",
        },
        2000,
        function () {
            $(this).css("background-color", "red");
        }
    );
});

$(".cercle2").click(function () {
    $(this).toggleClass("modif");
});
