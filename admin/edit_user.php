<?php
session_start();

// Проверка, авторизован ли пользователь как администратор
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Если нет, перенаправляем на страницу входа
    header("Location: ../login.php");
    exit;
}

// Подключение к базе данных
include('../includes/config.php');

// Получение ID пользователя из запроса
$user_id = isset($_GET['id']) ? $_GET['id'] : null;

// Проверка, был ли передан ID пользователя
if (!$user_id) {
    // Если нет, перенаправляем на страницу с пользователями
    header("Location: users.php");
    exit;
}

// Получение данных о пользователе из базы данных
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

// Проверка, был ли найден пользователь
if (!$user) {
    // Если нет, перенаправляем на страницу с пользователями
    header("Location: users.php");
    exit;
}

// Обработка отправки формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Подготовленный запрос для обновления данных о пользователе
    $stmt = $pdo->prepare("UPDATE users SET username = ?, email = ?, role = ? WHERE id = ?");
    $stmt->execute([$username, $email, $role, $user_id]);

    // Редирект на страницу с пользователями
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование пользователя</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Редактирование пользователя</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $user_id; ?>" method="post">
            <div class="form-group">
                <label for="username">Имя пользователя:</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Почта:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="role">Роль:</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="admin" <?php if($user['role'] === 'admin') echo 'selected'; ?>>Администратор</option>
                    <option value="user" <?php if($user['role'] === 'user') echo 'selected'; ?>>Пользователь</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </form>
    </div>
</body>
</html>
