<?php
require_once 'connectDB.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task-manager</title>
    <link rel="stylesheet" href="index.scss">
    <link rel="stylesheet" href="greeting.scss">
</head>

<body>
    <div class="content">
        <h1>Welcome in <span class="name">task-manager</span>!</h1>

        <a href="/PHP_Task-manager/loginPage.php" class="button">let's start</a>
    </div>
</body>

</html>