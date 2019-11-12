<?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"; ?>

<div class="container">
    <form id="login" action="signin.php">
        <h4>Login</h4>
        <span class="error"></span>
        <label for="username">
            Username:
        </label>
        <input type="text" id="username" name="username" placeholder="Enter username..">

        <label for="password">
            Password:
        </label>
        <input type="password" id="password" name="password" placeholder="Enter password..">

        <input type="submit" id="login-btn" name="login" value="Login">
        <span>Not registered? register <a href="register.php">here</a></span>
    </form>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>
