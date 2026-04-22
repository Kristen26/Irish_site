<?php
session_start();
require __DIR__ . "/../src/db.php";
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="vievport" content="width=divice-width, inital-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <!-- Подключаем Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Подключаем Wow.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
</head>

<body>
    <header>
            <div class="hat">
                <nav class="hat-nav-item">
                    <a href="" class="hat-item wow animate__animated animate__fadeIn"
                        data-wow-duration="1s"
                        data-wow-delay="0.7s">
                        Все туры</a>
                    <a href="" class="hat-item wow animate__animated animate__slideInUp"
                        data-wow-duration="1s"
                        data-wow-delay="0.4s">
                        Контакты</a>
                    <a href="" class="hat-item wow animate__animated animate__fadeIn"
                        data-wow-duration="1s"
                        data-wow-delay="0.7s">Отзывы</a>
                    <?php if (!empty($_SESSION['user_id'])): ?>
                        <a href="dashboard.php" class="hat-item wow animate__animated animate__fadeIn"
                            data-wow-duration="1s"
                            data-wow-delay="0.7s">Таблицы</a>
                        <a href="logout.php" class="hat-item wow animate__animated animate__fadeIn"
                            data-wow-duration="1s"
                            data-wow-delay="0.7s">Выйти</a>
                    <?php endif; ?>
                </nav>

                <h1 class="hat-heading">Открой для себя новую <br> Ирландию</h1>
                <p class="hat-subtitle">Авторские туры по экзотическим уголкам от Ивана Иванова</p>

                <div class="hat-buttons">
                    <button class="hat-btn" onclick="openSidebar()">Оставить заявку</button>
                    <button class="hat-btn-play"><img src = "./image/play.svg"></img></button>
                    <span class="hat-btn-text">Посмотрите<br> видео-отчет<br> 2018-2019</span>
                </div>
                
                <div class="hat-footer">
                    <div class="hat-social">
                        <span class="hat-social-title">Подписывайтесь в соцсетях</span>
                        <a href="#" class="hat-social-link"><img src=./image/youtube.svg></img></a>
                        <a href="#" class="hat-social-link"><img src=./image/facebook.svg></img></a>
                        <a href="#" class="hat-social-link"><img src=./image/twitter.svg></img></a>
                        <a href="#" class="hat-social-link"><img src=./image/vk.svg></img></a>
                    </div>

                    <div class="hat-images">
                        <div class="hat-image wow animate__animated animate__fadeInLeft"
                        data-wow-duration="1s"
                        data-wow-delay="0.7s">
                            <div class="hat-image-block">
                                <h3 class="hat-number-image">02</h3>
                                <div class="hat-image-text">
                                    <p class="text">Водопады Ирландии</p>
                                    <img src="./image/arrow.svg" alt="image">
                                </div>
                            </div>
                        </div>
                        
                        <div class="hat-image wow animate__animated animate__fadeInUp"
                        data-wow-duration="1s"
                        data-wow-delay="0.7s">
                            <div class="hat-image-block">
                                <h3 class="hat-number-image">03</h3>
                                <div class="hat-image-text">
                                    <p class="text">Сказочные Доломиты</p>
                                    <img src="./image/arrow.svg" alt="image">
                                </div>
                            </div>
                        </div>

                        <div class="hat-image wow animate__animated animate__fadeInRight"
                        data-wow-duration="1s"
                        data-wow-delay="0.7s">
                            <div class="hat-image-block">
                                <h3 class="hat-number-image">04</h3>
                                <div class="hat-image-text">
                                    <p class="text">Неизведанная Норвегия</p>
                                    <img src="./image/arrow.svg" alt="image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </header>

    <div class="card-tours">
        <div class="card-date wow animate__animated animate__fadeInLeft"
                            data-wow-duration="0.8s"
                            data-wow-delay="0.2s">
            <p class="card-title">10-24</p>
            <span class="card-subtitle">апреля</span>
            <p class="card-in-text">Большое ущелье на осторовах Гавайи</p>
        </div>
        <div class="card-text">
            <div class="card-text-descr wow animate__animated animate__fadeInDown"
                            data-wow-duration="0.9s"
                            data-wow-delay="0.4s">
                <h2 class="tours">Посмотрите все направления туров</h2>
                <p class="discription">Берега океанов и дикие пляжи с редкими породами деревьев. 
                Местная архитектура и первозданный вид дикой природы</p>
            </div>
            <button class="button-watch wow animate__animated animate__bounceIn"
                            data-wow-duration="0.9s"
                            data-wow-delay="0.6s">Смотреть все</button>
        </div>
    </div>
    
    <div class="block-prime-register">
        <div class="block-reg wow animate__animated animate__zoomInLeft"
                data-wow-duration="0.8s"
                data-wow-delay="0.7s">
            <h2 class="block-register-title">Оставьте заявку <br> на бесплатную <br> консультацию</h2>
            <p class="block-register-subtitle">Мы перезвоним вам в <br> ближайшее время</p>
        </div>
        
        <div class="block-request wow animate__animated animate__zoomInRight"
                data-wow-duration="0.8s"
                data-wow-delay="0.9s">
            <div class="block-application"><h2>Оставить заявку можно здесь:</h2></div>
                <div class="block-all">
                    <div class="block-number"><p>+7 ( _ _ _ ) _ _ _ - _ _ - _ _</p></div>
                    <div class="block-name"><p>Ваше имя</p></div>
                </div>
                <button class="block-submit" type="submit">Отправить заявку</button>
                <p class="block-agreement">Нажимая кнопку, вы даете согласие на <br> обработку персональных данных</p>
        </div>
    </div>


    <div class="card-reviews">
        <div class="card-reviews-relax wow animate__animated animate__fadeInRight"
                data-wow-duration="0.8s"
                data-wow-delay="0.4s">
            <p class="card-reviews-title">Отзыв</p>
            <span class="card-reviews-subtitle">Елена Иванова</span>
            <p class="card-reviews-in-text">Пожалуй, это был самый лучший отпуск в моей жизни...</p>
        </div>
        <div class="card-reviews-text wow animate__animated animate__fadeInLeft"
                data-wow-duration="0.8s"
                data-wow-delay="0.4s">
            <h2 class="reviews-tours">Что пишут участники наших путешествий</h2>
            <p class="reviews-discription">87% участников приходят по личной рекомендации от друзей. 
                А каждый 4-ый путешествует с нами больше двух раз!</p>
            <button class="reviews-button-watch">Читать отзывы</button>
        </div>
    </div>

    <h1 class="gallery-text">Также фотографии с наших туров</h1>
        <div class="gallery-grid">
        <div class="gallery-item wow animate__animated animate__fadeInUp"
                data-wow-duration="0.8s"
                data-wow-delay="0s">
            <img src="./image/m1.jpg">
        </div>
        <div class="gallery-item wow animate__animated animate__fadeInUp"
                data-wow-duration="0.8s"
                data-wow-delay="0.2s">
            <img src="./image/m2.jpg">
        </div>
        <div class="gallery-item wow animate__animated animate__fadeInUp"
                data-wow-duration="0.8s"
                data-wow-delay="0.4s">
            <img src="./image/m3.jpg">
        </div>
        <div class="gallery-item wow animate__animated animate__fadeInUp"
                data-wow-duration="0.8s"
                data-wow-delay="0.6s">
            <img src="./image/m4.jpg">
        </div>
        <div class="gallery-item wow animate__animated animate__fadeInUp"
                data-wow-duration="0.8s"
                data-wow-delay="0.8s">
            <img src="./image/m5.jpg">
        </div>
        <div class="gallery-item wow animate__animated animate__fadeInUp"
                data-wow-duration="0.8s"
                data-wow-delay="1s">
            <img src="./image/m6.jpg">
        </div>
    </div>

    <footer>
        <div class="footer wow animate__animated animate__fadeInUp"
                            data-wow-duration="0.9s">
            <img class="logo wow animate__animated animate__bounceIn"
                            data-wow-duration="0.5s"
                            data-wow-iteration="infinite"
                            src="./image/blackLogo.svg" alt="logo">
            <div class="footer-links">Политика<br> конфиденциальности</div>
            <div class="footer-links">Соглашение на обработку <br> персональных данных</div>
            <div class="social">
            <div><a href="#" class="footer-links wow animate__animated animate__bounceInUp"
                            data-wow-duration="1s">
                            <img src=./image/youtube-footer.svg></img></a></div>
            <div><a href="#" class="footer-links wow animate__animated animate__bounceInUp"
                            data-wow-duration="2s">
                            <img src=./image/facebook-footer.svg></img></a></div>
            <div><a href="#" class="footer-links wow animate__animated animate__bounceInUp"
                            data-wow-duration="1.5s"
                            data-wow-delay="1s">
                            <img src=./image/twitter-footer.svg></img></a></div>
            <div><a href="#" class="footer-links wow animate__animated animate__bounceInUp"
                            data-wow-duration="3s"
                            data-wow-delay="1s">
                            <img src=./image/vk-footer.svg></img></a></div>
            </div>
        </div>
    </footer>

    <script>
        new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 0,
            mobile: true,
            live: true
        }).init();
    </script>

    <div id="sidebar" class="sidebar">
        <div class="sidebar-content">
            <span class="close-btn" onclick="closeSidebar()">&times;</span>
            
            <h2>Вход / Регистрация</h2>

            <?php if (($_GET['error'] ?? '') === 'auth'): ?>
                <div style="margin: 10px 0; padding: 10px 12px; border-radius: 10px; background:#fee2e2; border:1px solid #fecaca; color:#7f1d1d;">
                    Логин или пароль не совпадает
                </div>
            <?php elseif (($_GET['error'] ?? '') === 'server'): ?>
                <div style="margin: 10px 0; padding: 10px 12px; border-radius: 10px; background:#fff7ed; border:1px solid #fed7aa; color:#7c2d12;">
                    Ошибка сервера. Попробуйте позже
                </div>
            <?php elseif (($_GET['error'] ?? '') === 'exists'): ?>
                <div style="margin: 10px 0; padding: 10px 12px; border-radius: 10px; background:#fff7ed; border:1px solid #fed7aa; color:#7c2d12;">
                    Такой логин уже занят
                </div>
            <?php elseif (($_GET['ok'] ?? '') === 'reg'): ?>
                <div style="margin: 10px 0; padding: 10px 12px; border-radius: 10px; background:#dcfce7; border:1px solid #bbf7d0; color:#14532d;">
                    Регистрация успешна. Теперь можно войти
                </div>
            <?php endif; ?>
            
            <form action="login.php" method="POST">
                <input class="sidebar-input" type="text" name="login" placeholder="Логин" required>
                <input class="sidebar-input" type="password" name="pasv" placeholder="Пароль" required>
                <button class="sidebar-btn" type="submit">Войти</button>
                <button class="sidebar-btn" type="submit" formaction="register.php">Регистрация</button>
            </form>
        </div>
    </div>

    <script>
    function openSidebar() {
        document.getElementById("sidebar").classList.add("active");
    }

    function closeSidebar() {
        document.getElementById("sidebar").classList.remove("active");
    }

    document.addEventListener("DOMContentLoaded", function () {
        const params = new URLSearchParams(window.location.search);
        if (params.has("error") || params.has("ok")) {
            openSidebar();
        }
    });

    function goToNextPage() {
        window.location.href = "page2.html";
    }
</script>
</body>
</html>