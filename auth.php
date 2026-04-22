<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

function require_login(): void {
    if (empty($_SESSION['user_id'])) {
        header("Location: index.php");
        exit();
    }
}

function is_admin(): bool {
    return ($_SESSION['role'] ?? null) === 'admin';
}

function require_admin(): void {
    require_login();
    if (!is_admin()) {
        http_response_code(403);
        die("Нет доступа");
    }
}

