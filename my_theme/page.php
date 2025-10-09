<?php get_header();?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>КиноАрхив</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <nav>
            <ul>
                <li><a href="/">Главная</a></li>
                <li><a href="/film/">Фильмы</a></li>
                <li><a href="/actor/">Актёры</a></li>
                <li><a href="/blog/">Блог</a></li>
                <li><a href="/about/">О сайте</a></li>
                <li><a href="/contact/">Контакты</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Добро пожаловать в КиноАрхив</h1>
        <p>Здесь вы найдете фильмы, актёров и статьи о кино.</p>

        <?php
        $films = get_posts([
        'post_type' => 'film',
        'numberposts' => -1, // все посты
        'orderby' => 'title',
        'order' => 'ASC'
        ]);

        if ($films):
        ?>

        <ul>
            <ul>
                <?php foreach ($films as $post):?>
                <?php setup_postdata($post)?>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title();?>
                    </a>
                <?php endforeach?>
                <?php wp_reset_postdata()?>
        <?php else:?>
            <p>Фильмов нет</p>
        <?php endif;?>
        



        <section>
            <h2>Последние статьи</h2>
            <article class="post-card">
                <h3><a href="/blog/top-10-films/">Топ-10 фильмов 90-х</a></h3>
                <p>Описание статьи...</p>
            </article>
            <article class="post-card">
                <h3><a href="/blog/history-of-cinema/">История кинематографа</a></h3>
                <p>Описание статьи...</p>
            </article>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 КиноАрхив. Все права защищены.</p>
    </footer>

</body>
</html>

<?php get_footer();?>