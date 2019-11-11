<?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"; ?>

<div class="container">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/connect.php"; ?>
    <form id="register" action="log_in.php">
        <label for="reg-username">
            Username:
        </label>
        <input type="text" id="reg-username" name="username" placeholder="Enter username.." required>

        <label for="reg-password">
            Password:
        </label>
        <input type="password" id="reg-password" name="password" placeholder="Enter password.." required>

        <input type="submit" id="register-btn" name="submit" value="Register">
    </form>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>