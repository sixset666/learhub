<?php
session_start();

include('../includes/config.php');

// Проверка, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST['new_username'];
    $new_email = $_POST['new_email'];
    $new_password = $_POST['new_password'];

    $stmt = $pdo->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
    $stmt->execute([$new_username, $new_email, $user_id]);

    if (!empty($new_password)) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
        $stmt->execute([$hashed_password, $user_id]);
    }
    header("Location: ../user/profile.php");
}
$stmt = $pdo->prepare("SELECT courses.title FROM enrollments JOIN courses ON enrollments.course_id = courses.id WHERE enrollments.user_id = ?");
$stmt->execute([$user_id]);
$enrolled_courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- edit_user.php -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование профиля</title>
    <!-- Подключение стилей Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php include('../includes/header.php'); ?>
    <div class="container">
        <h1 class="mt-5">Редактирование профиля</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mt-3">
            <div class="form-group">
                <label for="new_username">Новое имя пользователя:</label>
                <input type="text" class="form-control" name="new_username" id="new_username" value="<?php echo $user['username']; ?>">
            </div>
            <div class="form-group">
                <label for="new_email">Новый адрес электронной почты:</label>
                <input type="email" class="form-control" name="new_email" id="new_email" value="<?php echo $user['email']; ?>">
            </div>
            <div class="form-group">
                <label for="new_password">Новый пароль:</label>
                <input type="password" class="form-control" name="new_password" id="new_password">
            </div>
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </form>
    </div>
</body>
</html>
