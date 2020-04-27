<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bnbWebSite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
		<?php

		if (has_post_thumbnail()) {
			the_post_thumbnail(
				'blog-image',
				['class' => 'circle']
			);
		}
		?>

	</header><!-- .entry-header -->
	<?php the_content(); ?>
	<?php the_excerpt(); ?>
	<a href="<?php echo get_permalink(7) ?>
	">
		<?php
		$args = [
			'post' => 7
		];
		the_title_attribute($args);
		?>


	</a>
	<a href="<?php comments_link() ?>
	"><?php comments_number('nessun commento', 'un commento', '% commenti'); ?></a>




</article><!-- #post-<?php the_ID(); ?> -->