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

// Далее можно добавить дополнительный PHP-код для работы с пользователями, курсами и т.д.
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет администратора</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include('../includes/header.php'); ?>
    <div class="container mt-5">
        <h2>Личный кабинет администратора</h2>
        <p>Добро пожаловать,
            <?php echo $_SESSION['username']; ?>!
        </p>
        <h3>Управление пользователями</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Имя пользователя</th>
                    <th>Email</th>
                    <th>Роль</th>
                    <th>Дата регистрации</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Запрос на получение списка пользователей из базы данных
                $stmt = $pdo->query("SELECT * FROM users");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$row['username']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['role']}</td>";
                    echo "<td>{$row['registration_date']}</td>";
                    echo "<td>";
                    echo "<a href='edit_user.php?id={$row['id']}' class='btn btn-primary'>Редактировать</a> ";
                        echo "<a href='block_user.php?id={$row['id']}' class='btn btn-warning'>Block</a> ";
                        echo "<a href='delete_user.php?id={$row['id']}' class='btn btn-danger'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <h3>Управление курсами</h3>
        <table class="table">
    <thead>
        <tr>
            <th>Название курса</th>
            <th>Описание</th>
            <th>Преподаватель</th>
            <th>Цена</th>
            <th>Статус</th>
            <th>Дата создания</th>
            <th>Изображение</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Запрос на получение списка курсов из базы данных
        $stmt = $pdo->query("SELECT * FROM courses");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['title']}</td>";
            echo "<td>{$row['description']}</td>";
            echo "<td>{$row['instructor']}</td>";
            echo "<td>{$row['price']}</td>";
            echo "<td>{$row['status']}</td>";
            echo "<td>{$row['creation_date']}</td>";
            echo "<td><img src='{$row['photo']}' alt='Course Image' style='max-width: 100px; max-height: 100px;'></td>";
            echo "<td>";
            echo "<a href='edit_course.php?id={$row['id']}' class='btn btn-primary'>Редактировать</a> ";
            echo "<a href='delete_course.php?id={$row['id']}' class='btn btn-danger'>Удалить</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

        <h3>Мониторинг прогресса пользователей</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Пользователь</th>
                    <th>Курс</th>
                    <th>Прогресс</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Запрос на получение списка прогресса пользователей из базы данных
                $stmt = $pdo->query("SELECT u.username, c.title, e.enrollment_date FROM enrollments e
                            JOIN users u ON e.user_id = u.id
                            JOIN courses c ON e.course_id = c.id");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$row['username']}</td>";
                    echo "<td>{$row['title']}</td>";
                    echo "<td>{$row['enrollment_date']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <h3>Статистика</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Дата</th>
                    <th>Количество посещений</th>
                    <th>Количество активных пользователей</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Пример данных для статистики (можно заменить на реальные данные)
                $statistics = array(
                    array("2023-01-01", 100, 50),
                    array("2023-01-02", 150, 60),
                    array("2023-01-03", 200, 70)
                );

                foreach ($statistics as $stat) {
                    echo "<tr>";
                    echo "<td>{$stat[0]}</td>";
                    echo "<td>{$stat[1]}</td>";
                    echo "<td>{$stat[2]}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <p><a href="../logout.php">Выйти</a> из аккаунта</p>
    </div>
</body>

</html>