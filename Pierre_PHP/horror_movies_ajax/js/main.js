$(".ajaxBtn").click(function (e) {
    e.preventDefault();

    $.ajax({
        url: "script/process.php",
        type: "post",
        data: {
            show: $(this).val(),
        },
        beforeSend: function () {
            let loadingDiv = "<img src='img/ajax-loader.gif'></img>";
            $(".ajaxRow").html(loadingDiv);
        },
        success: function (response) {
            $(".ajaxRow").html(response);
        },
    });
});
