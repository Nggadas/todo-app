<?php
include "connect.php";
include "functions.php";

$tasks = getTasks($connect);

if ($tasks == null) {
    echo "empty";
} else {
    echo json_encode($tasks);
}
