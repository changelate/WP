<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package my_theme
 */

?>
<!doctype html>

<header>
	<div class="container">
		<nav class="navbar">
			<a href="index.html" class="logo">КИНО<span>АРХИВ</span></a>
			<ul class="nav-links">
				<li><a href="films.html">Фильмы</a></li>
				<li><a href="actors.html">Актеры</a></li>
				<li><a href="blog.html">Блог</a></li>
				<li><a href="contacts.html">Контакты</a></li>
			</ul>
			<button class="mobile-menu-btn">
				<i class="fas fa-bars"></i>
			</button>
		</nav>
	</div>
</header>
<?php wp_head(); ?>