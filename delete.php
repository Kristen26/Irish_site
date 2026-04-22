<?php
session_start();
require "db.php";

if ($_SESSION['role'] != 'admin') {
    die("Нет доступа");
}

$id = (int)($_POST['id'] ?? 0);
if ($id > 0) {
    $stmt = mysqli_prepare($conn, "DELETE FROM tour WHERE id=?");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
    }
}

header("Location: dashboard.php");
exit();
?>