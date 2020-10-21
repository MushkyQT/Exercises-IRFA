$(document).ready(function () {
    $("#signUpBtn").click(function (e) {
        e.preventDefault();
        e.stopPropagation();

        $.ajax({
            url: "signUp.php",
            type: "post",
            data: {
                username: $("#signUpUsername").val(),
                email: $("#signUpEmail").val(),
                password: $("#signUpPassword").val(),
                passwordConfirm: $("#signUpPasswordConfirm").val(),
            },
            success: function (response) {
                if (response == "signUpOk") {
                    $(".signUpErrors").html("<p class='text-success'>Successfully signed up, please proceed to log in.</p>");
                } else {
                    $(".signUpErrors").html(response);
                }
            },
        });
    });
});
