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
        .content:hover {
            box-shadow: 0 0 20px 10px #29a6bc4f;
            transform: scale(1.005);
        }

        .show {
            transform: translateX(-200px);
        }
    </style>
</head>

<body>
    <?php include('includes/header.php'); ?>
    <main class="main">
        <section class="slider">
            <div class="container">
                <div id="carouselExampleCaptions" class="carousel slide h-80">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/slide1.jpg" class="d-block w-100 h-80" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Учитесь с нами оффлайн</h5>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/slide2.jpg" class="d-block w-100 h-80" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Учитесь с нами онлайн</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/slide3.jpg" class="d-block w-100 h-80" alt="...">
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

        // Функция, которая проверяет, достиг ли пользователь места появления карточек и активирует анимацию
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
                    delay += 100; // Задержка перед появлением следующей карточки
                }
            });
        }

        // Слушатель события прокрутки страницы
        window.addEventListener('scroll', checkCards1);


    </script>
</body>

</html>