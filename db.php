<?php
// Настройки берём из переменных окружения (удобно для Render).
// Для локального XAMPP есть дефолты.
$dbHost = getenv('DB_HOST') ?: '127.0.0.1';
$dbUser = getenv('DB_USER') ?: 'root';
$dbPass = getenv('DB_PASS') ?: '';
$dbName = getenv('DB_NAME') ?: 'irish';
$dbPort = (int)(getenv('DB_PORT') ?: 3306);

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName, $dbPort);

if (!$conn) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");
?>