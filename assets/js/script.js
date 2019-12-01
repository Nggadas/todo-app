$(document).ready(function () {
    $('#login').submit(function (event) {
        event.preventDefault();
        const url = document.location.origin + "/includes/signin.php";
        const form_data = $('#login').serialize();
        $.ajax({
            url: url,
            method: "POST",
            data: form_data,
            beforeSend: btnLoading("#login-btn"),
            success: function (data) {
                if (data === "success") {
                    window.location.href = "/";
                } else {
                    console.log(data);
                    $('#login > .error').addClass('show').html(data);
                    btnRest("#login-btn", "Login");
                }
            }
        });
    });

    $('#register').submit(function (event) {
        event.preventDefault();
        const url = document.location.origin + "/includes/register.php";
        const form_data = $('#register').serialize();
        $.ajax({
            url: url,
            method: "POST",
            data: form_data,
            beforeSend: btnLoading("#register-btn"),
            success: function (data) {
                if (data === "success") {
                    window.location.href = "/";
                } else {
                    $('#register > .error').addClass('show').html(data);
                    btnRest("#register-btn", "Register");
                }
            }
        });
    });

    $('#task').submit(function (event) {
        event.preventDefault();
        const url = document.location.origin + "/includes/task.php";
        const form_data = $('#task').serialize();
        $.ajax({
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
    
    $('#upcoming').click(function () {
        upcoming();
    });

    $('#completed').click(function () {
        completed();
    });

    $('.tasks').on('click', '.complete', function (e) {
        if (confirm('Complete task?')) {
            const target = e.target;
            const url = document.location.origin + "/includes/update_tasks.php";
            $.ajax({
                data: {id: target.id},
                url: url,
                method: 'POST',
                success: function (data) {
                    if (data === 'success') {
                        upcoming();
                    }
                }
            });
        }
    });

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
            html += '<span id=' + task['id'] + ' class="complete">' +
                '<i class="fa fa-check-square"></i>' +
                '</span>';
            // html += '<span class="add">' +
            //     '<i class="fa fa-plus-square"></i>' +
            //     '</span>';
            // html += '<span class="delete">' +
            //     '<i class="fa fa-trash-alt"></i>' +
            //     '</span>';
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

    function ajaxTasks(url) {
        return $.ajax({
            url: url,
            method: "GET",
            success: function (data) {
                if (data === "empty") {
                    $('.tasks').html('<p style="font-size: .8rem; padding-left: 1rem">No tasks to display.</p>');
                } else {
                    try {
                        if (JSON.parse(data)) {
                            $('#task').trigger("reset");
                            populateData(data);
                        }
                    } catch (e) {
                        $('.tasks').html('<p style="font-size: .8rem; padding-left: 1rem">No tasks to display.</p>');
                    }
                }
            }
        });
    }

    function upcoming() {
        const url = document.location.origin + "/includes/upcoming.php";
        ajaxTasks(url);
    }

    function completed() {
        const url = document.location.origin + "/includes/completed.php";
        ajaxTasks(url);
    }

    upcoming();
});
