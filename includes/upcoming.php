<?php
include "connect.php";
include "functions.php";

echo json_encode(getTasks($connect));