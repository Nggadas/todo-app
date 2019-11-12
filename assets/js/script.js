$(document).ready(function () {
    $('#login').submit(function (event) {
        event.preventDefault();
        console.log("Login!!!!!!");
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
                $('#register > .error').html(data);
                btnRest("#register-btn", "Register");
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
