<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';

    if (!isset($_SESSION['loggedin']) && !$_SESSION['loggedin'] == true) {
        header("Location: /signin.php");
        die();
    }
?>
<div class="create">
    <div class="container">
        <form action="">
            <label for="create-task">
                <input id="create-task" type="text" placeholder="Add new task" autocomplete="off">
            </label>
            <div class="other">
                <label for="due-date">
                    <input id="due-date" type="date" title="Due date" autocomplete="off">
                </label>
                <button id="submit-task">
                    Add
                    <i class="fa fa-plus-circle"></i>
                </button>
            </div>
        </form>
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
