<?php
// Подключение к базе данных
include('../includes/config.php');

// Получение ID пользователя для блокировки из URL-параметра
$user_id = isset($_GET['id']) ? $_GET['id'] : null;

// Проверка, был ли передан ID пользователя
if ($user_id) {
    // Обновление роли пользователя на 'blocked'
    $stmt = $pdo->prepare("UPDATE users SET role = 'blocked' WHERE id = ?");
    $stmt->execute([$user_id]);

    // Редирект на страницу управления пользователями
    header("Location: index.php");
    exit;
} else {
    // Если ID пользователя не был передан, выдать ошибку
    echo "User ID is not provided.";
}
?>
