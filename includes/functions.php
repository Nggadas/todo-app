<?php
// Retrieve and return user data
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
    return null;
}

// Retrieve and return pending todo tasks
function getTasks ($connect) {
    $query = "SELECT * FROM db_todoapp.tasks 
        WHERE user_id = '" . $_SESSION['id'] . "' 
        AND status = 'pending' ORDER BY due_date";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $data;
    } else {
        return null;
    }
}

// Retrieve and return pending todo tasks
function getCompletedTasks ($connect) {
    $query = "SELECT * FROM db_todoapp.tasks 
        WHERE user_id = '" . $_SESSION['id'] . "' 
        AND status = 'completed'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $data;
    } else {
        return null;
    }
}

// Update task status
function updateTasks($id, $connect){
    $query = "UPDATE db_todoapp.tasks SET status='completed' WHERE id='" .$id. "'";

    if (mysqli_query($connect, $query)) {
        return true;
    }
    return false;
}