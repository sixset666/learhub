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
}
$stmt = $pdo->prepare("SELECT courses.title, courses.photo FROM enrollments JOIN courses ON enrollments.course_id = courses.id WHERE enrollments.user_id = ?");
$stmt->execute([$user_id]);
$enrolled_courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль пользователя</title>
    <!-- Подключение стилей Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include('../includes/header.php'); ?>
    <div class="container">
        <h1>Профиль пользователя</h1>
        <p>Имя пользователя: <?= $user['username'] ?></p>
        <p>Электронная почта: <?= $user['email'] ?></p>

        <a href="edit_user.php" class="btn btn-primary">Редактировать профиль</a>
        <div class="container">
            <h2>Список купленных курсов</h2>
            <div class="row">
                <?php foreach ($enrolled_courses as $course): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?php echo $course['photo']; ?>" class="card-img-top" alt="<?php echo $course['title']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $course['title']; ?></h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>
