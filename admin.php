<?php
session_start();
require "db.php";

if ($_SESSION['role'] != 'admin') {
    die("Нет доступа");
}
?>

<?php
header("Location: dashboard.php");
exit();
?>