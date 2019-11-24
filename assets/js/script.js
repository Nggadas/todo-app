$(document).ready(function () {
    upcoming();

    $('#login').submit(function (event) {
        event.preventDefault();
        const url = document.location.origin + "/includes/signin.php";
        const form_data = $('#login').serialize();
        const request = $.ajax({
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
        const request = $.ajax({
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

    $('#task').submit(function (event) {
        event.preventDefault();
        const url = document.location.origin + "/includes/task.php";
        const form_data = $('#task').serialize();
        const request = $.ajax({
            url: url,
            method: "POST",
            data: form_data,
            beforeSend: btnLoading("#submit-task"),
            success: function (data) {
                try {
                    if (JSON.parse(data)) {
                        $('#task').trigger("reset");
                        populateData(data);
                    }
                } catch (e) {
                    $('.task.error').addClass('show').html(data);
                    btnRest("#submit-task", "");
                }
            }
        });
    });

    function upcoming() {
        const url = document.location.origin + "/includes/upcoming.php";
        const request = $.ajax({
            url: url,
            method: "GET",
            data: [],
            beforeSend: btnLoading("#submit-task"),
            success: function (data) {
                try {
                    if (JSON.parse(data)) {
                        $('#task').trigger("reset");
                        populateData(data);
                    }
                } catch (e) {
                    $('.tasks').html('No data to display.');
                }
            }
        });
    }

    function populateData(data) {
        const tasks = JSON.parse(data);
        let html = '';

        $.each(tasks, function (index, task) {
            html += '<div class="task">';
            html += '<div class="details">';
            html += '<div class="name">' + task['name'];
            html += '<span class="eta">(' + task['due_date'] + ')</span>';
            html += '</div>';
            html += '<div class="actions">';
            html += '<span class="done">' +
                '<i class="fa fa-check-square"></i>' +
                '</span>';
            html += '<span class="add">' +
                '<i class="fa fa-plus-square"></i>' +
                '</span>';
            html += '<span class="delete">' +
                '<i class="fa fa-trash-alt"></i>' +
                '</span>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
        });
        $('.tasks').html(html);
    }
    
    function btnLoading(id) {
        if (id === "#login-btn") {
            $(id).attr("disabled", true).val("Logging in...");
        } else if (id === "#register-btn") {
            $(id).attr("disabled", true).val("Registering...");
        } else if (id === "#submit-task") {
            $(id).attr("disabled", true);
        }
    }

    function btnRest(id, text) {
        if (text === "") {
            $(id).attr("disabled", false);
        } else {
            $(id).attr("disabled", false).val(text);
        }
    }
});
