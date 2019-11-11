<?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"; ?>

<div class="container">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/connect.php"; ?>
    <form id="login" action="log_in.php">
        <h4>Login</h4>
        <label for="username">
            Username:
        </label>
        <input type="text" id="username" name="username" placeholder="Enter username.." required>

        <label for="password">
            Password:
        </label>
        <input type="password" id="password" name="password" placeholder="Enter password.." required>

        <input type="submit" id="login-btn" name="submit" value="Login">
        <span>Not registered? register <a href="register.php">here</a></span>
    </form>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>
