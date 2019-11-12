$(document).ready(function () {
    $('#login').submit(function (event) {
        event.preventDefault();
        const url = document.location.origin + "/includes/signin.php";
        const form_data = $('#login').serialize();
        const register = $.ajax({
            url: url,
            method: "POST",
            data: form_data,
            beforeSend: btnLoading("#login-btn"),
            success: function (data) {
                if (data === "success") {
                    window.location.href = "/";
                } else {
                    $('#login > .error').html(data);
                    btnRest("#login-btn", "Login");
                }
            }
        });
    });

    $('#register').submit(function (event) {
        event.preventDefault();
        const url = document.location.origin + "/includes/register.php";
        const form_data = $('#register').serialize();
        const register = $.ajax({
            url: url,
            method: "POST",
            data: form_data,
            beforeSend: btnLoading("#register-btn"),
            success: function (data) {
                if (data === "success") {
                    window.location.href = "/";
                } else {
                    $('#register > .error').html(data);
                    btnRest("#register-btn", "Register");
                }
            }
        });
    });
    
    function btnLoading(id) {
        $(id).attr("disabled", true).val("Working...");
    }

    function btnRest(id, text) {
        $(id).attr("disabled", false).val(text);
    }
});
