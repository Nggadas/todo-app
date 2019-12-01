<?php
include "connect.php";
include "functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = mysqli_real_escape_string($connect, $_POST['id']);
    if (updateTasks($id, $connect)) {
        echo "success";
    } else {
        echo "failure";
    }
}