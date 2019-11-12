<?php
include "connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Capture data from form
    $username = mysqli_real_escape_string($connect, $_POST["username"]);
    $password = mysqli_real_escape_string($connect, $_POST["password"]);

    if (!empty($username) && !empty($password)) {

        // Check that username is unique
        $query = "SELECT * FROM db_todoapp.users WHERE username = '" . $username . "'";
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $hash = $row['password'];
                if (password_verify($password, $hash)) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $username;
                    echo "success";
                } else {
                    echo 'Incorrect password, try again.';
                }
            }
        } else {
            echo "Incorrect username, try again.";
//            echo "Error: " . $query . "<br>" . mysqli_error($connect);
        }
    } else {
        echo "All fields are required.";
    }
}