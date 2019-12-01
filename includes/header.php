<!doctype html>
<?php include "connect.php"?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/assets/images/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Kalam|Lobster|Mansalva&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/fontawesome/all.min.css">
    <script src="/assets/js/fontawesome/all.min.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="/assets/js/script.js"></script>
    <title>TODO App</title>
</head>
<body>
<header>
    <nav class="navbar">
        <div class="container header">
            <a href="/" class="logo">
                <i class="fa fa-tasks"></i>
            </a>
            <div class="account">
                <?php
                    if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                        echo "<a href='logout.php' class='link'>Hello " . $_SESSION['username'] . ", logout</a>";
                    } else {
                        echo "<a href=\"signin.php\" class=\"link\">Login or register</a>";
                    }
                ?>
            </div>
        </div>
    </nav>
</header>