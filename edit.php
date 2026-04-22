<?php
session_start();
require "db.php";

if ($_SESSION['role'] != 'admin') {
    die("Нет доступа");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)($_POST['id'] ?? 0);
    $name = $_POST['name_tour'] ?? '';
    $cost = $_POST['cost'] ?? '';
    $desc = $_POST['description'] ?? '';

    if ($id > 0) {
        $stmt = mysqli_prepare($conn, "UPDATE tour SET name_tour=?, cost=?, description=? WHERE id=?");
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sisi", $name, $cost, $desc, $id);
            mysqli_stmt_execute($stmt);
        }
    }

    header("Location: dashboard.php");
    exit();
}

$id = (int)($_GET['id'] ?? 0);
$tour = null;
if ($id > 0) {
    $stmt = mysqli_prepare($conn, "SELECT id, name_tour, cost, description FROM tour WHERE id=? LIMIT 1");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $tour = mysqli_fetch_assoc($res);
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Редактирование тура</title>
    <style>
        .wrap { padding: 40px 60px; }
        .card { background:#fff; border:1px solid #e5e7eb; border-radius:12px; padding:18px; box-shadow:0 6px 18px rgba(0,0,0,0.06); max-width: 820px; }
        .row { display:flex; gap:12px; flex-wrap:wrap; margin-top:12px; }
        .input { padding:10px 12px; border:1px solid #dadce0; border-radius:10px; min-width: 240px; }
        .input-wide { min-width: 360px; flex:1; }
        .btn { padding:8px 12px; border-radius:10px; border:1px solid #dadce0; background:#fff; cursor:pointer; }
        .btn-primary { background:#1a73e8; border-color:#1a73e8; color:#fff; }
        .actions { display:flex; gap:8px; flex-wrap:wrap; margin-top: 14px; }
        .muted { color:#6b7280; }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="card">
            <h2 style="margin:0;">Редактирование: tour</h2>
            <?php if (!$tour): ?>
                <p class="muted">Запись не найдена.</p>
                <div class="actions">
                    <a class="btn" href="dashboard.php">Назад</a>
                </div>
            <?php else: ?>
                <form action="edit.php" method="post">
                    <input type="hidden" name="id" value="<?= (int)$tour['id'] ?>">
                    <div class="row">
                        <input class="input" name="name_tour" value="<?= htmlspecialchars($tour['name_tour']) ?>" required>
                        <input class="input" name="cost" type="number" min="0" step="1" value="<?= htmlspecialchars($tour['cost']) ?>" required>
                    </div>
                    <div class="row">
                        <input class="input input-wide" name="description" value="<?= htmlspecialchars($tour['description']) ?>" required>
                    </div>
                    <div class="actions">
                        <button class="btn btn-primary" type="submit">Сохранить</button>
                        <a class="btn" href="dashboard.php">Отмена</a>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
?>