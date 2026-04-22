<?php
require_once __DIR__ . "/../src/auth.php";
require_login();
require_once __DIR__ . "/../src/db.php";

$role = $_SESSION['role'] ?? 'user';

$tours = [];
$res = mysqli_query($conn, "SELECT id, name_tour, cost, description FROM tour ORDER BY id DESC");
if ($res) {
    while ($row = mysqli_fetch_assoc($res)) {
        $tours[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Таблицы</title>
    <style>
        .wrap { padding: 40px 60px; }
        .topbar { display:flex; gap:16px; align-items:center; justify-content:space-between; flex-wrap:wrap; }
        .topbar a { color:#1a73e8; }
        .card { background:#fff; border:1px solid #e5e7eb; border-radius:12px; padding:18px; box-shadow:0 6px 18px rgba(0,0,0,0.06); }
        table { width:100%; border-collapse: collapse; margin-top: 12px; }
        th, td { border-bottom: 1px solid #e5e7eb; padding: 10px 8px; text-align:left; vertical-align: top; }
        th { background: #f8fafc; font-weight: 600; }
        .actions { display:flex; gap:8px; flex-wrap:wrap; }
        .btn { padding:8px 12px; border-radius:10px; border:1px solid #dadce0; background:#fff; cursor:pointer; }
        .btn-primary { background:#1a73e8; border-color:#1a73e8; color:#fff; }
        .btn-danger { background:#fee2e2; border-color:#fecaca; }
        .muted { color:#6b7280; }
        .form-row { display:flex; gap:12px; flex-wrap:wrap; margin-top: 12px; }
        .input { padding:10px 12px; border:1px solid #dadce0; border-radius:10px; min-width: 220px; }
        .input-wide { min-width: 360px; flex:1; }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="topbar">
            <div>
                <div><strong>Вы вошли как:</strong> <?= htmlspecialchars($role) ?></div>
                <div class="muted">Пользователь: #<?= (int)($_SESSION['user_id'] ?? 0) ?></div>
            </div>
            <div class="actions">
                <a class="btn" href="index.php">Главная</a>
                <a class="btn" href="logout.php">Выйти</a>
            </div>
        </div>

        <div class="card" style="margin-top:18px;">
            <h2 style="margin:0 0 8px 0;">Таблица: tour</h2>
            <div class="muted">Пользователь видит только таблицу. Админ видит добавление/редактирование/удаление.</div>

            <?php if (is_admin()): ?>
                <form class="form-row" action="add.php" method="post">
                    <input class="input" name="name_tour" placeholder="Название тура" required>
                    <input class="input" name="cost" type="number" min="0" step="1" placeholder="Стоимость" required>
                    <input class="input input-wide" name="description" placeholder="Описание" required>
                    <button class="btn btn-primary" type="submit">Добавить</button>
                </form>
            <?php endif; ?>

            <table>
                <thead>
                    <tr>
                        <th style="width:70px;">id</th>
                        <th>name_tour</th>
                        <th style="width:120px;">cost</th>
                        <th>description</th>
                        <?php if (is_admin()): ?>
                            <th style="width:220px;">действия</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tours as $t): ?>
                        <tr>
                            <td><?= (int)$t['id'] ?></td>
                            <td><?= htmlspecialchars($t['name_tour']) ?></td>
                            <td><?= htmlspecialchars($t['cost']) ?></td>
                            <td><?= htmlspecialchars($t['description']) ?></td>
                            <?php if (is_admin()): ?>
                                <td>
                                    <div class="actions">
                                        <a class="btn" href="edit.php?id=<?= (int)$t['id'] ?>">Редактировать</a>
                                        <form action="delete.php" method="post" onsubmit="return confirm('Удалить запись id=<?= (int)$t['id'] ?>?');">
                                            <input type="hidden" name="id" value="<?= (int)$t['id'] ?>">
                                            <button class="btn btn-danger" type="submit">Удалить</button>
                                        </form>
                                    </div>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (count($tours) === 0): ?>
                        <tr>
                            <td colspan="<?= is_admin() ? 5 : 4 ?>" class="muted">Нет данных или не удалось прочитать таблицу.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

