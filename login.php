<?php
session_start();
require "db.php";

$login = $_POST['login'] ?? '';
$pass = $_POST['pasv'] ?? '';

$stmt = mysqli_prepare($conn, "SELECT id, role FROM users WHERE login=? AND pasv=? LIMIT 1");
if (!$stmt) {
    header("Location: index.php?error=server");
    exit();
}
mysqli_stmt_bind_param($stmt, "ss", $login, $pass);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$user = mysqli_fetch_assoc($result);

if ($user) {

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role']; // admin / user

    header("Location: dashboard.php");
    exit();

} else {
    header("Location: index.php?error=auth");
    exit();
}
?>