<?php

function getDetails ($username, $password, $connect) {
    $query = "SELECT * FROM db_todoapp.users WHERE username = '" . $username . "'";
    $result = mysqli_query($connect, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $hash = $row['password'];
        if (password_verify($password, $hash)) {
            return $row;
        } else {
            echo 'Something went wrong with password, try again.';
        }
    }
}