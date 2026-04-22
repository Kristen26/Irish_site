<?php
session_start();
require __DIR__ . "/../src/db.php";

if ($_SESSION['role'] != 'admin') {
    die("Нет доступа");
}
?>

<?php
header("Location: dashboard.php");
exit();
?>