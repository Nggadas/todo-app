$(document).ready(function () {
    $('#login').submit(function (event) {
        event.preventDefault();
        console.log("Login!!!!!!");
    });

    $('#register').submit(function (event) {
        event.preventDefault();
        console.log("Register!!!!!!");
    });
});
