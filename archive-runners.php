<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bnbWebSite
 */

get_header();
?>
<h1>archivio runners</h1>
<h1><?php the_archive_title() ?></h1>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="column">
			<div class="card">
				<img src="<?php the_post_thumbnail_url(); ?>" alt="John" style="width:100%">
				<div class="container">
					<h2><?php the_title(); ?>
					</h2>
					<h4>eta</h4>
					<p class="title"><?php the_field('eta'); ?>
					</p>
					<h4>naz</h4>
					<p class="title"><?php the_field('nazionalita'); ?>
					</p>
					<a href="<?php the_permalink(); ?>
						">
						<p><button class="button">Contact</button></p>
					</a>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>