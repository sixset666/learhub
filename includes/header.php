<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/learnhub-favicon-color.png" type="image/png">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo-color.svg" width="160" height="120" alt="" class="header-logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Главная <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Контакты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="faq.php">Вопросы</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                        <!-- Если пользователь является администратором, отобразите ссылки для администратора -->
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/index.php">Административная панель</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">Выйти</a>
                        </li>
                    <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'user'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../user/profile.php">Мой профиль</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../user/courses.php">Курсы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">Logout</a>
                        </li>
                    <?php elseif (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true): ?>
                        <!-- Если пользователь авторизован, но не является администратором, отобразите ссылки для пользователя -->
                        <li class="nav-item">
                            <a class="nav-link" href="../user/profile.php">Profile</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">Logout</a>
                        </li>
                    <?php else: ?>
                        <!-- Если пользователь не авторизован, отобразите ссылки для входа и регистрации -->
                        <li class="nav-item">
                            <a class="nav-link" href="../login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../register.php">Register</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    



    