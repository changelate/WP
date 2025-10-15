<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package my_theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?the_title('<h1 class="entry-title">', '</h1>');?>

	<?php if (has_post_thumbnail()): ?>
		<div class="film-thumbnail">
			<?php the_post_thumbnail('medium'); ?>
		</div>
	<?php endif; ?>
	
	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'my_theme'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'my_theme'),
				'after' => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->


	<footer class="entry-footer">
		<?php my_theme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->