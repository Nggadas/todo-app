<?php
include "connect.php";
include "functions.php";

$tasks = getCompletedTasks($connect);

if ($tasks == null) {
    echo "empty";
} else {
    echo json_encode($tasks);
}
