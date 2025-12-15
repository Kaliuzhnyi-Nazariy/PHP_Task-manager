<?php

session_start();

if (isset($_SESSION['id'])) {
    header('Location: tasks.php');
    exit();
}

$error = $_SESSION['log_error'] ?? '';

session_unset();

function showErrorMessage($message)
{
    return !empty($message) ? "<p class='error'>$message</p>
" : '';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="auth.scss">
</head>

<body>

    <form action="service/auth.php" method="post">
        <h2 class="title">Login</h2>
        <?= showErrorMessage($error) ?>
        <label>
            Email:
            <input type="email" name="email">
        </label>
        <label>
            Password:
            <input type="password" name="password">
        </label>

        <button type="submit" name='login_submit' class="form-button">Login</button>
        <a href="/registerPage.php">You don't have account?</a>
    </form>
</body>

</html>