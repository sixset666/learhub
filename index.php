<?php
session_start();

include('includes/config.php');

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>

        body{
            background: linear-gradient(to right, #fff, #29a6bc4f);
        }

        .content:hover {
            box-shadow: 0 0 20px 10px #29a6bc4f;
            transform: scale(1.005);
        }

        .show {
            transform: translateX(-200px);
        }

        .clients-list {
            display: flex;
            list-style: none;
            padding: 0;
            width: 100%;
        }

        .clients__item{
            opacity: 0;
        }

        .clients__item {
            width: 600px;
            padding: 20px;
            box-shadow: 0 0 20px 4px #29a6bc4f;
            transition: all 0.6s ease-in-out;
            border-radius: 20px;
        }

        .clients__item:not(:last-child) {
            margin-right: 40px;
        }

        .clients-avatar img {
            object-fit: cover;
            max-width: 100px;
            border-radius: 30px;
            height: 100px;
        }

        .clients-avatar {
            margin-right: 30px;
        }

        .clients-text {
            display: flex;
            align-items: center;
        }

        .clients-descr {
            border-bottom: 1px solid #29a6bc4f;
            padding-bottom: 10px;
        }

        .footer-container{
            padding: 10px 40px;
            display: flex;

        }

        .footer-left,
        .footer-right,
        .footer-list,
        .footer-social{
            display: flex;
            align-items: center;
        }

      .footer-copy{
        font-size: 12px;
      }

      .footer-left{
        margin-right: auto;
      }

      .footer__item{
        margin-right: 20px;
      }

      .footer-link{
        text-decoration: none;
        font-size: 18px;
        color: #29a6bc;
      }

      .social-link svg{
        fill: #29a6bc;
      }

      .footer-nav{
        margin-right: 50px;
      }

      .social__item{
        margin-right: 25px;
      }

      .carousel-item img {
    width: 100%;
    height: auto;
}

    </style>
</head>

<body>
    <?php include('includes/header.php'); ?>
    <main class="main">
        <section class="slider">
            <div class="container">
                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1">
                        </button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2">
                        </button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3">
                        </button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/slide1.jpg" class="d-block w-100 " alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Учитесь с нами оффлайн</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/slide2.jpg" class="d-block w-100 " alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Учитесь с нами онлайн</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/slide3.jpg" class="d-block w-100 " alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Учитесь с нами вместе</h5>
                            </div>
                        </div>
                    </div>

                </div>
                
            </div>
            
        </section>
        <section class="courses">
            <div class="container">
                <h2 class="section-title">
                    Наши курсы
                </h2>
                <ul class="courses-list">
                    <li class="courses__item">
                        <div class="content">
                            <img src="images/slide1.jpg" alt="" class="courses-img">
                            <div class="item-text">
                                <h2 class="item-titlejpg">Python - для начинающих</h2>
                                <p class="item-descr">Погружение в мир программирования с курсом по Python! От
                                    начинающего до эксперта, этот курс предлагает вам всестороннее введение в язык
                                    программирования Python. Разработанный для всех уровней навыков, от новичков до
                                    опытных разработчиков, вы освоите основы синтаксиса Python, изучите мощные
                                    инструменты для создания приложений и веб-сайтов, а также углубитесь в продвинутые
                                    концепции, такие как многопоточность, работа с базами данных и создание графического
                                    интерфейса. </p>
                                <div class="price-wrapper">
                                    <span class="item-price">120.000</span>
                                    <a href="" class="btn btn-primary">Записаться</a>
                                </div>

                            </div>
                        </div>
                    </li>
                    <li class="courses__item">
                        <div class="content">
                            <img src="images/slide1.jpg" alt="" class="courses-img">
                            <div class="item-text">
                                <h2 class="item-title">Python - для начинающих</h2>
                                <p class="item-descr">Погружение в мир программирования с курсом по Python! От
                                    начинающего до эксперта, этот курс предлагает вам всестороннее введение в язык
                                    программирования Python. Разработанный для всех уровней навыков, от новичков до
                                    опытных разработчиков, вы освоите основы синтаксиса Python, изучите мощные
                                    инструменты для создания приложений и веб-сайтов, а также углубитесь в продвинутые
                                    концепции, такие как многопоточность, работа с базами данных и создание графического
                                    интерфейса.</p>
                                <div class="price-wrapper">
                                    <span class="item-price">120.000</span>
                                    <a href="" class="btn btn-primary">Записаться</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="courses__item">
                        <div class="content">
                            <img src="images/slide1.jpg" alt="" class="courses-img">
                            <div class="item-text">
                                <h2 class="item-title">Python - для начинающих</h2>
                                <p class="item-descr">Погружение в мир программирования с курсом по Python! От
                                    начинающего до эксперта, этот курс предлагает вам всестороннее введение в язык
                                    программирования Python. Разработанный для всех уровней навыков, от новичков до
                                    опытных разработчиков, вы освоите основы синтаксиса Python, изучите мощные
                                    инструменты для создания приложений и веб-сайтов, а также углубитесь в продвинутые
                                    концепции, такие как многопоточность, работа с базами данных и создание графического
                                    интерфейса.</p>
                                <div class="price-wrapper">
                                    <span class="item-price">120.000</span>
                                    <a href="" class="btn btn-primary">Записаться</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <section class="clients">
            <h2 class="section-title">
                Наши преподаватели
            </h2>
            <div class="container">
                <ul class="clients-list">
                    <li class="clients__item">
                        <p class="clients-descr">
                            Иван - опытный специалист с глубоким пониманием алгоритмов. Его методичные подходы и
                            терпение делают его прекрасным наставником.
                        </p>
                        <div class="clients-text">
                            <div class="clients-avatar">
                                <img src="images/client1.jpg" alt="">
                            </div>
                            <div class="clients-wrapper">
                                <h4 class="clients-name">
                                    Иван Петров
                                </h4>
                                <span class="clients-post">
                                    Ведущий инженер-программист
                                </span>
                            </div>
                        </div>
                    </li>
                    <li class="clients__item">
                        <p class="clients-descr">
                            Алексей - страстный учитель, вдохновляющий своих студентов своими идеями и энтузиазмом к
                            программированию.
                        </p>
                        <div class="clients-text">
                            <div class="clients-avatar">
                                <img src="images/client2.jpg" alt="">
                            </div>
                            <div class="clients-wrapper">
                                <h4 class="clients-name">
                                    Алексей Смирнов
                                </h4>
                                <span class="clients-post">
                                    Преподаватель по разработке ПО
                                </span>
                            </div>
                        </div>
                    </li>
                    <li class="clients__item">
                        <p class="clients-descr">
                            Дмитрий - академически настроенный преподаватель, объединяющий в себе глубокие знания и
                            вдохновение для исследований.
                        </p>
                        <div class="clients-text">
                            <div class="clients-avatar">
                                <img src="images/client3.jpg" alt="">
                            </div>
                            <div class="clients-wrapper">
                                <h4 class="clients-name">
                                    Дмитрий Иванов
                                </h4>
                                <span class="clients-post">
                                    Старший преподаватель по компьютерной науке
                                </span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <section class="services">
            <h2 class="section-title">
                Наши преимущества
            </h2>
            <div class="container-services">

                <ul class="services-list">
                    <li class="services__item ">
                        <h5 class="services-item-title services__item1">
                            Более 5 лет на рынке
                        </h5>
                    </li>
                    <li class="services__item ">
                        <h5 class="services-item-title services__item2">
                            Большое кол-во партнеров
                        </h5>
                    </li>
                    <li class="services__item ">
                        <h5 class="services-item-title services__item3">
                            50.000 учащихся
                        </h5>
                    </li>
                </ul>
                <ul class="services-list">
                    <li class="services__item ">
                        <h5 class="services-item-title services__item4">
                            Бесплатное пробное занятие
                        </h5>
                    </li>
                    <li class="services__item ">
                        <h5 class="services-item-title services__item5">
                            Новейшие технологии
                        </h5>
                    </li>
                    <li class="services__item ">
                        <h5 class="services-item-title services__item6">
                            Компитентные преподаватели
                        </h5>
                    </li>
                </ul>
            </div>
        </section>

        <section class="contacts">
            <h2 class="section-title">
                Наши контакты
            </h2>
            <div class="container-contacts">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2833.121107226925!2d39.86885047669624!3d44.75794478028261!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40f0c5ec1e3e4d51%3A0x1350489f18479545!2z0YPQuy4g0JPQvtCz0L7Qu9GPLCA1Mywg0JHQtdC70L7RgNC10YfQtdC90YHQuiwg0JrRgNCw0YHQvdC-0LTQsNGA0YHQutC40Lkg0LrRgNCw0LksIDM1MjYzMg!5e0!3m2!1sru!2sru!4v1708027201850!5m2!1sru!2sru"
                    width="900" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                <div class="contacts-text">
                    <ul class="contacts-list">
                        <li class="contacts__item">
                            <a href="tel:79898110728" class="contacts-link phone">
                                +7-(989)-811-07-28
                            </a>
                        </li>
                        <li class="contacts__item">
                            <a href="mailto:example@mail.ru" class="contacts-link mail">
                                example@mail.ru
                            </a>
                        </li>
                        <li class="contacts__item">
                            <a href="https://vk.com/6six6set6" class="contacts-link vk">
                                vk:6sixset6
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-left">
                <img src="images/LearnHub-logos_black.png" alt="" width="180" height="50" class="footer-logo">
                <span class="footer-copy">
                    © 2024 LearnHub: Открой для себя знания, <br>    вдохновение и возможности!
                </span>
            </div>

            <div class="footer-right">
                <nav class="footer-nav">
                    <ul class="footer-list">
                        <li class="footer__item">
                            <a href="" class="footer-link">
                                Главная
                            </a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer-link">
                                Курсы
                            </a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer-link">
                                О нас
                            </a>
                        </li>
                    </ul>
                </nav>
                <ul class="footer-social">
                    <li class="social__item">
                        <a href="" class="social-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                                class="bi bi-github" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8" />
                            </svg>
                        </a>
                    </li>
                    <li class="social__item">
                        <a href="" class="social-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                                class="bi bi-telegram" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.287 5.906q-1.168.486-4.666 2.01-.567.225-.595.442c-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294q.39.01.868-.32 3.269-2.206 3.374-2.23c.05-.012.12-.026.166.016s.042.12.037.141c-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8 8 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629q.14.092.27.187c.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.4 1.4 0 0 0-.013-.315.34.34 0 0 0-.114-.217.53.53 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09" />
                            </svg>
                        </a>
                    </li>
                    <li class="social__item">
                        <a href="" class="social-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                                class="bi bi-discord" viewBox="0 0 16 16">
                                <path
                                    d="M13.545 2.907a13.2 13.2 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.2 12.2 0 0 0-3.658 0 8 8 0 0 0-.412-.833.05.05 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.04.04 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032q.003.022.021.037a13.3 13.3 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019q.463-.63.818-1.329a.05.05 0 0 0-.01-.059l-.018-.011a9 9 0 0 1-1.248-.595.05.05 0 0 1-.02-.066l.015-.019q.127-.095.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.05.05 0 0 1 .053.007q.121.1.248.195a.05.05 0 0 1-.004.085 8 8 0 0 1-1.249.594.05.05 0 0 0-.03.03.05.05 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.2 13.2 0 0 0 4.001-2.02.05.05 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.03.03 0 0 0-.02-.019m-8.198 7.307c-.789 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612m5.316 0c-.788 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <script>
        function isElementInViewport(el) {
            var rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        function checkCards() {
            var cards = document.querySelectorAll('.courses__item');

            cards.forEach(function (card) {
                if (isElementInViewport(card)) {
                    card.classList.add('show');
                }
            });
        }

        window.addEventListener('scroll', checkCards);


        function checkCards1() {
            var cards1 = document.querySelectorAll('.services__item');
            var delay = 0;

            cards1.forEach(function (card, index) {
                if (isElementInViewport(card)) {
                    setTimeout(function () {
                        card.classList.add('show');
                    }, delay);
                    delay += 100; 
                }
            });
        }

        window.addEventListener('scroll', checkCards1);

        function checkCards2() {
            var cards2 = document.querySelectorAll('.clients__item');
            var delay = 0;

            cards2.forEach(function (card, index) {
                if (isElementInViewport(card)) {
                    setTimeout(function () {
                        card.classList.add('show');
                    }, delay);
                    delay += 100; 
                }
            });
        }

        window.addEventListener('scroll', checkCards2);

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>