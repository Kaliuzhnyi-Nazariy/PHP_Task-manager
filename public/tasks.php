<?php

include 'service/task.php';

session_start();

if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task-manager</title>
    <link rel="stylesheet" href="index.scss">
    <link rel="stylesheet" href="tasks.scss">
</head>

<body>

    <?php include __DIR__ . '/header.php'; ?>

    <?php include __DIR__ . '/addForm.php'; ?>

    <?php include __DIR__ . '/todoList.php'; ?>


</body>

</html>