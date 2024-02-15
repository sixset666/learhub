<?php
session_start();

// Подключение к базе данных
include('../includes/config.php');

// Проверка, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    // Если нет, перенаправляем на страницу входа
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST['course_id'];
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("SELECT * FROM enrollments WHERE user_id = ? AND course_id = ?");
    $stmt->execute([$user_id, $course_id]);
    $enrollment = $stmt->fetch();

    if ($enrollment) {
        $error_message = "Вы уже купили этот курс";
    } else {
        $stmt = $pdo->prepare("INSERT INTO enrollments (user_id, course_id) VALUES (?, ?)");
        $stmt->execute([$user_id, $course_id]);

        header("Location: user/profile.php");
        exit;
    }
}

// Запрос на получение списка доступных курсов
$stmt = $pdo->query("SELECT * FROM courses WHERE status = 'active'");
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список курсов</title>
    <!-- Подключение стилей Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        /* Дополнительные пользовательские стили */
        .course-container {
            margin-top: 50px;
        }
        .course-container li {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <div class="container">
    <h1 class="mt-5">Список доступных курсов</h1>
    <?php if (!empty($error_message)) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error_message; ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <?php foreach ($courses as $course) : ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo $course['photo']; ?>" class="card-img-top" alt="<?php echo $course['title']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $course['title']; ?></h5>
                        <p class="card-text"><?php echo $course['description']; ?></p>
                        <p class="card-text"><small class="text-muted">Преподаватель: <?php echo $course['instructor']; ?></small></p>
                        <p class="card-text"><small class="text-muted">Цена: <?php echo $course['price']; ?> руб.</small></p>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <input type="hidden" name="course_id" value="<?php echo $course['id']; ?>">
                            <button type="submit" class="btn btn-primary btn-block">Купить курс</button>
                        </form>
                    </div>
               
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


</body>
</html>
