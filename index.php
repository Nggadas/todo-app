<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';

    if (!isset($_SESSION['loggedin']) && !$_SESSION['loggedin'] == true) {
        header("Location: /signin.php");
        die();
    }
?>
<div class="create">
    <div class="container">
        <form id="task" action="index.php">
            <label for="task-name">
                <input type="text" id="task-name" name="task_name" placeholder="Add new task" autocomplete="off">
            </label>
            <div class="other">
                <label for="due-date">
                    <input type="date" id="due-date" name="due_date" title="Due date" autocomplete="off">
                </label>
                <button id="submit-task">
                    Add
                    <i class="fa fa-plus-circle"></i>
                </button>
            </div>
        </form>
        <span class="task error" style="margin-top: 1rem"></span>
    </div>
</div>
<div class="container">
    <div class="left-column">
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/left_column.php'?>
    </div>
    <div class="main-content">
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/content.php' ?>
    </div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php' ?>
