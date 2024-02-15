<?php
session_start();

// Подключение к базе данных
include('includes/config.php');

// Проверка, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение данных из формы
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Подготовленный запрос для получения пользователя по логину
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Проверка пароля
    if ($user && password_verify($password, $user['password'])) {
        if ($user['role'] === 'blocked') {
            // Если статус пользователя 'blocked', выдаем сообщение об ошибке
            $error = "Ваш аккаунт заблокирован. Обратитесь к администратору для получения помощи.";
        } else {
            // Успешный вход - установка сессии
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Перенаправление на соответствующую страницу
            if ($_SESSION['role'] == 'admin') {
                header("Location: admin/index.php");
            } else {
                header("Location: user/profile.php");
            }
            exit;
        }
    } else {
        // Неправильные данные - вывод сообщения об ошибке
        $error = "Неверное имя пользователя или пароль";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Вход</h2>
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="username">Имя пользователя:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Пароль:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Войти</button>
                </form>
                <p class="mt-3">Еще не зарегистрированы? <a href="register.php">Зарегистрируйтесь здесь</a></p>
            </div>
        </div>
    </div>
</body>
</html>
