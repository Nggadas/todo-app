<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'?>
<div class="create">
    <div class="container">
        <form action="">
            <label for="create-task">
                <input id="create-task" type="text" placeholder="Add new task" autocomplete="off">
            </label>
            <button id="submit-task">
                Add
                <i class="fa fa-plus-circle"></i>
            </button>
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
