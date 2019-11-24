<?php

include "connect.php";
include "functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Capture data from form
    $task_name = mysqli_real_escape_string($connect, $_POST["task_name"]);
    $due_date = mysqli_real_escape_string($connect, $_POST["due_date"]);
    $status = "pending";

    if (!empty($task_name) && !empty($due_date)) {
            // Create insert query
            $query = "INSERT INTO db_todoapp.tasks(name, due_date, status) VALUES ('" . $task_name . "', '" . $due_date . "', '" . $status . "')";

            if (mysqli_query($connect, $query)) {
                echo json_encode(getTasks($connect));
            } else {
//                echo "Something went wrong, try again";
                echo "Error: " . $query . "<br>" . mysqli_error($connect);
            }
            mysqli_close($connect);
    } else {
        echo "All fields are required.";
    }
}