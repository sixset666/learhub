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

// Получение ID курса из запроса
$course_id = isset($_GET['id']) ? $_GET['id'] : null;

// Проверка, был ли передан ID курса
if (!$course_id) {
    // Если нет, перенаправляем на страницу с курсами
    header("Location: index.php");
    exit;
}

// Получение данных о курсе из базы данных
$stmt = $pdo->prepare("SELECT * FROM courses WHERE id = ?");
$stmt->execute([$course_id]);
$course = $stmt->fetch();

// Проверка, был ли найден курс
if (!$course) {
    // Если нет, перенаправляем на страницу с курсами
    header("Location: courses.php");
    exit;
}

// Обработка отправки формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $instructor = $_POST['instructor'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    // Подготовленный запрос для обновления данных о курсе
    $stmt = $pdo->prepare("UPDATE courses SET title = ?, description = ?, instructor = ?, price = ?, status = ? WHERE id = ?");
    $stmt->execute([$title, $description, $instructor, $price, $status, $course_id]);

    // Редирект на страницу с курсами
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php include('../includes/header.php'); ?>
    <div class="container mt-5">
        <h2>Edit Course</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $course_id; ?>" method="post">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $course['title']; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $course['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="instructor">Instructor:</label>
                <input type="text" class="form-control" id="instructor" name="instructor" value="<?php echo $course['instructor']; ?>" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" min="0" step="0.01" value="<?php echo $course['price']; ?>" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="active" <?php if($course['status'] === 'active') echo 'selected'; ?>>Active</option>
                    <option value="inactive" <?php if($course['status'] === 'inactive') echo 'selected'; ?>>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</body>
</html>
