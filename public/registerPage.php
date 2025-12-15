<?php

session_start();

if (isset($_SESSION['id'])) {
    header('Location: tasks.php');
    exit();
}

$error = $_SESSION['reg_error'] ?? '';

session_unset();

function showErrorMessage($errMessage)
{
    return !empty($errMessage) ? "<p class='error'>$errMessage</p>" : '';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="auth.scss">
    <!-- <link rel="stylesheet" href="register.css"> -->
</head>

<body>
    <form action="service/auth.php" method="post">
        <h2 class='title'>Register</h2>
        <?= showErrorMessage($error) ?>
        <label>
            Email:
            <input type="email" name="email">
        </label>
        <label>
            Name:
            <input type="text" name="name">
        </label>
        <label>
            Password:
            <input type="password" name="password">
        </label>
        <label>
            Confirm password:
            <input type="password" name="confirmPassword">
        </label>
        <button type="submit" name='reg_submit' class='form-button'>Register</button>
        <a href="/loginPage.php">You already have account?</a>
    </form>

</body>

</html>