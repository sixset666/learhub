<?php
session_start();

include('includes/config.php');

// Запрос на получение списка активных курсов
$stmt = $pdo->query("SELECT * FROM courses WHERE status = 'active'");
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <!-- Подключение стилей Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include('includes/header.php'); ?>
    <div class="container">
        <h1>Доступные курсы</h1>
        <div class="row">
            <?php foreach ($courses as $course) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?php echo $course['photo']; ?>" class="card-img-top" alt="<?php echo $course['title']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $course['title']; ?></h5>
                            <p class="card-text"><?php echo $course['description']; ?></p>
                            <p class="card-text">Преподаватель: <?php echo $course['instructor']; ?></p>
                            <p class="card-text">Цена: <?php echo $course['price']; ?> руб.</p>
                            <a href="user/courses.php" class="btn btn-primary">Узнать больше</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>
