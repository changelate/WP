<?php get_header(); ?>

<h1>Фильмы</h1>

<?php if (have_posts()): ?>
    <ul class="film-grid">
        <?php while (have_posts()): the_post(); ?>
            <li class="film-item">
                <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail('medium'); ?>
                    <?php endif; ?>
                    <h3 class="film-title"><?php the_title(); ?></h3>
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
    <?php the_posts_pagination(); ?>
<?php else: ?>
    <p>Нет фильмов.</p>
<?php endif; ?>

<?php get_footer(); ?>