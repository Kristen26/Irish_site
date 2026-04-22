<?php
session_start();
require __DIR__ . "/../src/db.php";

$login = trim($_POST['login'] ?? '');
$pass = trim($_POST['pasv'] ?? '');

if ($login === '' || $pass === '') {
    header("Location: index.php");
    exit();
}

// проверяем, что логин не занят
$stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE login=? LIMIT 1");
if (!$stmt) {
    header("Location: index.php?error=server");
    exit();
}
mysqli_stmt_bind_param($stmt, "s", $login);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$existing = mysqli_fetch_assoc($res);

if ($existing) {
    header("Location: index.php?error=exists");
    exit();
}

// создаём обычного пользователя
$stmt2 = mysqli_prepare($conn, "INSERT INTO users (login, pasv, role) VALUES (?, ?, 'user')");
if (!$stmt2) {
    header("Location: index.php?error=server");
    exit();
}
mysqli_stmt_bind_param($stmt2, "ss", $login, $pass);
mysqli_stmt_execute($stmt2);

// сразу логиним и переносим в таблицы
$_SESSION['user_id'] = mysqli_insert_id($conn);
$_SESSION['role'] = 'user';

header("Location: dashboard.php");
exit();

