<?php get_header(); ?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>КиноАрхив</title>
</head>

<body>

    <!-- Главный баннер -->
    <section class="hero">
        <div class="hero-content">
            <h1>Погрузитесь в мир кино</h1>
            <p>Откройте для себя классику и новинки, узнайте больше об актерах и режиссерах, читайте экспертные обзоры и
                аналитику</p>
            <a href="films.html" class="btn">Исследовать фильмы</a>
        </div>
    </section>

    <?php
    $films = get_posts(
        [
            'post_type' => 'film',
            'numberposts' => -1,
            'orderby' => 'title',
            'order' => 'ASC'
        ]
        );
    if($films):    
        ?>

    <!-- Секция фильмов -->
    <section class="movies-section">
        <div class="container">
            <h2 class="section-title">Популярные фильмы</h2>
            <div class="movies-grid">
                    <?php foreach ($films as $post):
                    setup_postdata($post); ?>
                    <div class="movie-card">
                        <a href="<?php the_permalink(); ?>" class="film-link"></a>
                        <div class="movie-poster">
                                <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="movie-info">
                                <h3 class="movie-title"><?php the_title(); ?></h3>
                                <div class="movie-description"><?php the_content();?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>



                <div class="movie-card">
                    <div class="movie-poster"
                        style="background-image: url('https://placehold.co/300x450/222222/FFFFFF?text=Фильм+1')"></div>
                    <div class="movie-info">
                        <h3 class="movie-title">Властелин колец: Братство Кольца</h3>
                        <div class="movie-meta">
                            <span>2001</span>
                            <span class="movie-rating"><i class="fas fa-star"></i> 8.8</span>
                        </div>
                        <p>Эпическая фэнтези-сага о путешествии хоббита Фродо Бэггинса, которому предстоит уничтожить
                            Кольцо Всевластья.</p>
                    </div>
                </div>

                <!-- Фильм 2 -->
                <div class="movie-card">
                    <div class="movie-poster"
                        style="background-image: url('https://placehold.co/300x450/333333/FFFFFF?text=Фильм+2')"></div>
                    <div class="movie-info">
                        <h3 class="movie-title">Начало</h3>
                        <div class="movie-meta">
                            <span>2010</span>
                            <span class="movie-rating"><i class="fas fa-star"></i> 8.8</span>
                        </div>
                        <p>Профессиональные воры, похищающие секреты из подсознания, получают задание, которое может
                            изменить их жизнь.</p>
                    </div>
                </div>

                <!-- Фильм 3 -->
                <div class="movie-card">
                    <div class="movie-poster"
                        style="background-image: url('https://placehold.co/300x450/444444/FFFFFF?text=Фильм+3')"></div>
                    <div class="movie-info">
                        <h3 class="movie-title">Побег из Шоушенка</h3>
                        <div class="movie-meta">
                            <span>1994</span>
                            <span class="movie-rating"><i class="fas fa-star"></i> 9.3</span>
                        </div>
                        <p>История о дружбе двух заключенных и их стремлении к свободе в тюрьме Шоушенк.</p>
                    </div>
                </div>

                <!-- Фильм 4 -->
                <div class="movie-card">
                    <div class="movie-poster"
                        style="background-image: url('https://placehold.co/300x450/555555/FFFFFF?text=Фильм+4')"></div>
                    <div class="movie-info">
                        <h3 class="movie-title">Темный рыцарь</h3>
                        <div class="movie-meta">
                            <span>2008</span>
                            <span class="movie-rating"><i class="fas fa-star"></i> 9.0</span>
                        </div>
                        <p>Бэтмен противостоит хаосу, который сеет Джокер в Готэме, ставя под угрозу всё, во что верит
                            Темный рыцарь.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Секция актеров -->
    <section class="actors-section">
        <div class="container">
            <h2 class="section-title">Звезды кино</h2>
            <div class="actors-grid">
                <!-- Актер 1 -->
                <div class="actor-card">
                    <div class="actor-image"
                        style="background-image: url('https://placehold.co/200x200/666666/FFFFFF?text=Актер+1')"></div>
                    <h3 class="actor-name">Леонардо ДиКаприо</h3>
                    <p class="actor-role">Актер, продюсер</p>
                </div>

                <!-- Актер 2 -->
                <div class="actor-card">
                    <div class="actor-image"
                        style="background-image: url('https://placehold.co/200x200/777777/FFFFFF?text=Актер+2')"></div>
                    <h3 class="actor-name">Марго Робби</h3>
                    <p class="actor-role">Актриса, продюсер</p>
                </div>

                <!-- Актер 3 -->
                <div class="actor-card">
                    <div class="actor-image"
                        style="background-image: url('https://placehold.co/200x200/888888/FFFFFF?text=Актер+3')"></div>
                    <h3 class="actor-name">Том Харди</h3>
                    <p class="actor-role">Актер, продюсер</p>
                </div>

                <!-- Актер 4 -->
                <div class="actor-card">
                    <div class="actor-image"
                        style="background-image: url('https://placehold.co/200x200/999999/FFFFFF?text=Актер+4')"></div>
                    <h3 class="actor-name">Скарлетт Йоханссон</h3>
                    <p class="actor-role">Актриса, певица</p>
                </div>

                <!-- Актер 5 -->
                <div class="actor-card">
                    <div class="actor-image"
                        style="background-image: url('https://placehold.co/200x200/AAAAAA/FFFFFF?text=Актер+5')"></div>
                    <h3 class="actor-name">Кристиан Бейл</h3>
                    <p class="actor-role">Актер</p>
                </div>

                <!-- Актер 6 -->
                <div class="actor-card">
                    <div class="actor-image"
                        style="background-image: url('https://placehold.co/200x200/BBBBBB/FFFFFF?text=Актер+6')"></div>
                    <h3 class="actor-name">Галь Гадот</h3>
                    <p class="actor-role">Актриса, модель</p>
                </div>
            </div>
        </div>
    </section>
    <?php endif?>
    <?php get_footer(); ?>