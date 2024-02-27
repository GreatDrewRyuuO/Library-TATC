<!DOCTYPE html>
<html lang="en">
<?php
ob_start();
session_start();
include('./controllers/database.php');
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library </title>
    <link rel="stylesheet" href="./public/css/style.css">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php

    if (empty($_GET['page']) || !ctype_alnum(str_replace(['-', '_'], '', $_GET['page'])) || !file_exists("pages/{$_GET['page']}.php")) {
        die(header('Location: ?page=login'));
    }
    require_once "pages/{$_GET['page']}.php";
    ?>

    <script>
        function webload() {
            getLocation()
        }
    </script>
    <script src="./public/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <script src="./public/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
