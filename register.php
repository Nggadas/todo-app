<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php";

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        header("Location: /index.php");
        die();
    }
?>

<div class="container">
    <form id="register" action="signin.php">
        <h4>Register</h4>
        <span class="error"></span>
        <label for="reg-username">
            Username:
        </label>
        <input type="text" id="reg-username" name="username" placeholder="Enter username..">

        <label for="reg-password">
            Password:
        </label>
        <input type="password" id="reg-password" name="password" placeholder="Enter password..">

        <input type="submit" id="register-btn" name="register" value="Register">
        <span>Already registered? login <a href="signin.php">here</a></span>
    </form>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>
