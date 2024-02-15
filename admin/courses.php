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

// Обработка отправки формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $instructor = $_POST['instructor'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    // Проверяем, был ли загружен файл изображения
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        // Указываем путь для сохранения изображения
        $uploadDirectory = '../images/';
        $fileName = $_FILES['photo']['name'];
        $targetFile = $uploadDirectory . $fileName;

        // Перемещаем файл изображения из временной директории в указанную
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
            // Файл успешно загружен, сохраняем данные в базе данных
            $stmt = $pdo->prepare("INSERT INTO courses (title, description, instructor, price, status, photo) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$title, $description, $instructor, $price, $status, $targetFile]);

            // Редирект на страницу с курсами
            header("Location: index.php");
            exit;
        } else {
            // Ошибка при перемещении файла изображения
            echo "Ошибка при загрузке изображения.";
        }
    } else {
        // Файл изображения не был загружен или произошла ошибка
        echo "Ошибка: файл изображения не был загружен или произошла ошибка.";
    }
}
?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить курс</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include('../includes/header.php'); ?>
    <div class="container mt-5">
        <h2>Добавить курс</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Название курса:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Описание:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="instructor">Преподаватель:</label>
                <input type="text" class="form-control" id="instructor" name="instructor" required>
            </div>
            <div class="form-group">
                <label for="price">Цена:</label>
                <input type="number" class="form-control" id="price" name="price" min="0" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="photo">Фото курса:</label>
                <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="status">Статус:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="active">Активный</option>
                    <option value="inactive">Неактивный</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
</body>

</html>