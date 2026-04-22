<?php
session_start();
require "db.php";

if ($_SESSION['role'] != 'admin') {
    die("Нет доступа");
}

$name = $_POST['name_tour'] ?? '';
$cost = $_POST['cost'] ?? '';
$desc = $_POST['description'] ?? '';

$stmt = mysqli_prepare($conn, "INSERT INTO tour (name_tour, cost, description) VALUES (?, ?, ?)");
if (!$stmt) {
    http_response_code(500);
    die("Ошибка сервера");
}
mysqli_stmt_bind_param($stmt, "sis", $name, $cost, $desc);
mysqli_stmt_execute($stmt);

header("Location: dashboard.php");
exit();
?>