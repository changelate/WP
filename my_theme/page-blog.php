<!DOCTYPE html>
<html lang="ru">
<?php get_header()?>

    <!-- Заголовок страницы -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">Киноблог</h1>
            <p class="page-subtitle">Экспертные статьи, обзоры и аналитика о мире кино</p>
        </div>
    </section>

    <!-- Категории блога -->
    <section class="categories-section">
        <div class="container">
            <div class="categories">
                <a href="#" class="category-btn active">Все статьи</a>
                <a href="#" class="category-btn">Обзоры</a>
                <a href="#" class="category-btn">Интервью</a>
                <a href="#" class="category-btn">История кино</a>
                <a href="#" class="category-btn">Новости</a>
                <a href="#" class="category-btn">Технологии</a>
            </div>
        </div>
    </section>

    <!-- Секция блога -->
    <section class="blog-section">
        <div class="container">
            <div class="blog-grid">
                <!-- Пост 1 -->
                

                <?php
                $blog_post = new WP_Query(
                    [
                        "post_type"=> "post",
                        "posts_per_page"=> -1,
                        "posts_status"=> "date",
                        "order"=> "DESC",
                    ]
                    );
                ?>

                <?php
                if ($blog_post-> have_posts()):
                    while ($blog_post->have_posts()): $blog_post->the_post();
                ?>
                
                <div class='blog-post'>
                    <div class='blog-image'><?php the_post_thumbnail_url('medium')?></div>
                    <div class='blog-content'>
                        <div class='blog-date'><?php echo get_the_date('j F Y'); ?></div>
                        <div class='blog-title'><?php the_title();?></div>
                    </div>
                </div>
                <?php endwhile?>
                <?php endif?>

                <div class="blog-post">
                    <div class="blog-image" style="background-image: url('https://placehold.co/400x250/CCCCCC/FFFFFF?text=Блог+1')"></div>
                    <div class="blog-content">
                        <div class="blog-date">15 мая 2024</div>
                        <h3 class="blog-title">Эволюция супергеройских фильмов за последние 20 лет</h3>
                        <p class="blog-excerpt">Как изменился жанр супергеройских фильмов с выхода "Людей Икс" до современных блокбастеров Marvel и DC. Анализ ключевых тенденций, технологических прорывов и культурного влияния.</p>
                        <div class="blog-meta">
                            <span><i class="fas fa-user"></i> Иван Петров</span>
                            <span><i class="fas fa-comment"></i> 24 комментария</span>
                        </div>
                        <a href="#" class="btn">Читать далее</a>
                    </div>
                </div>

                <!-- Пост 2 -->
                <div class="blog-post">
                    <div class="blog-image" style="background-image: url('https://placehold.co/400x250/DDDDDD/FFFFFF?text=Блог+2')"></div>
                    <div class="blog-content">
                        <div class="blog-date">10 мая 2024</div>
                        <h3 class="blog-title">10 фильмов, которые изменили историю кинематографа</h3>
                        <p class="blog-excerpt">От "Гражданина Кейна" до "Паразитов" — революционные работы, повлиявшие на развитие киноискусства. Подробный разбор инновационных техник и их влияния на современное кино.</p>
                        <div class="blog-meta">
                            <span><i class="fas fa-user"></i> Мария Сидорова</span>
                            <span><i class="fas fa-comment"></i> 31 комментарий</span>
                        </div>
                        <a href="#" class="btn">Читать далее</a>
                    </div>
                </div>

                <!-- Пост 3 -->
                <div class="blog-post">
                    <div class="blog-image" style="background-image: url('https://placehold.co/400x250/EEEEEE/FFFFFF?text=Блог+3')"></div>
                    <div class="blog-content">
                        <div class="blog-date">5 мая 2024</div>
                        <h3 class="blog-title">Интервью с режиссером: Секреты создания визуальных эффектов</h3>
                        <p class="blog-excerpt">Эксклюзивное интервью с ведущим специалистом по VFX о том, как создаются самые зрелищные сцены в кино. Технологии, бюджеты и творческий процесс за кулисами блокбастеров.</p>
                        <div class="blog-meta">
                            <span><i class="fas fa-user"></i> Алексей Козлов</span>
                            <span><i class="fas fa-comment"></i> 18 комментариев</span>
                        </div>
                        <a href="#" class="btn">Читать далее</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Пагинация -->
    <section class="pagination-section">
        <div class="container">
            <div class="pagination">
                <a href="#" class="pagination-btn active">1</a>
                <a href="#" class="pagination-btn">2</a>
                <a href="#" class="pagination-btn">3</a>
                <a href="#" class="pagination-btn">4</a>
                <a href="#" class="pagination-btn">5</a>
                <a href="#" class="pagination-btn"><i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </section>

    <!-- Футер -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>Киноархив</h3>
                    <p>Ваш надежный путеводитель по миру кино. Открывайте классику и новинки, узнавайте больше о любимых актерах и режиссерах.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Навигация</h3>
                    <ul class="footer-links">
                        <li><a href="films.html">Фильмы</a></li>
                        <li><a href="actors.html">Актеры</a></li>
                        <li><a href="blog.html">Блог</a></li>
                        <li><a href="contacts.html">Контакты</a></li>
                        <li><a href="#">Подборки</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Категории</h3>
                    <ul class="footer-links">
                        <li><a href="#">Боевики</a></li>
                        <li><a href="#">Драмы</a></li>
                        <li><a href="#">Комедии</a></li>
                        <li><a href="#">Фантастика</a></li>
                        <li><a href="#">Ужасы</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Контакты</h3>
                    <ul class="footer-links">
                        <li><i class="fas fa-envelope"></i> info@kinoarhiv.ru</li>
                        <li><i class="fas fa-phone"></i> +7 (495) 123-45-67</li>
                        <li><i class="fas fa-map-marker-alt"></i> Москва, Россия</li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2024 Киноархив. Все права защищены.</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>