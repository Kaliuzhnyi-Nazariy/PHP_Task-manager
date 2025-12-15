<?php
session_start();
require_once '../connectDB.php';

if (isset($_POST['reg_submit'])) {

    $name = htmlspecialchars($_POST['name']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $checkIsUser = $conn->query("SELECT * FROM user WHERE email = '$email'");

    if ($checkIsUser->num_rows > 0) {
        $_SESSION['reg_error'] = 'Email is already taken!';
        header('Location: ../registerPage.php');
        exit();
    }

    if ($password !== $confirmPassword) {
        $_SESSION['reg_error'] = 'Passwords not matches!';
        header('Location: ../registerPage.php');
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $conn->query("INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$hashedPassword')");

    header("Location: ../loginPage.php");
    exit();
}

if (isset($_POST['login_submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $checkIsUser = $conn->query("SELECT * FROM user WHERE email = '$email'");

    if ($checkIsUser->num_rows > 0) {
        $user = $checkIsUser->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];

            header("Location: ../tasks.php");
            exit();
        }
    }

    $_SESSION['log_error'] = 'Wrong credentials!';
    header("Location: ../loginPage.php");
    exit();
}
