<?php
include "connect.php";
include "functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Capture data from form
    $username = mysqli_real_escape_string($connect, $_POST["username"]);
    $password = mysqli_real_escape_string($connect, $_POST["password"]);

    if (!empty($username) && !empty($password)) {
        // Hash password using PASSWORD_BCRYPT
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Check that username is unique
        $query = "SELECT * FROM db_todoapp.users WHERE username = '". $username ."'";
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) > 0) {
            echo $username . " is taken, try something else.";
        } else {
            // Create insert query
            $query = "INSERT INTO db_todoapp.users(username, password) VALUES ('". $username ."', '". $hashed_password ."')";

            if (mysqli_query($connect, $query)) {
                $user = getDetails($username, $password,$connect);

                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                echo "success";
            } else {
                echo "Something went wrong, try again";
//                echo "Error: " . $query . "<br>" . mysqli_error($connect);
            }
            mysqli_close($connect);
        }
    } else {
        echo "All fields are required.";
    }
}