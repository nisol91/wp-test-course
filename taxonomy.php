<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tema_test_corso
 */

get_header();
?>
<h1>tassonomia generica</h1>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style lang="css">
	.checked {
		color: orange;
	}
</style>
<h1><?php the_archive_title() ?></h1>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="column">
			<div class="card">
				<?php the_post_thumbnail('blog-image-hard') ?>
				<div class="container">
					<h2><?php the_title(); ?>
					</h2>
					<h4>data</h4>
					<p class="title"><?php the_field('data_evento'); ?>
					</p>
					<h4>type</h4>
					<h5>

						<?php echo get_the_term_list($post->ID, 'type') ?>
					</h5>
					<h4>review</h4>
					<h5>

						<?php echo get_the_term_list($post->ID, 'review') ?>
					</h5>
					<a href="<?php the_permalink(); ?>
						">
						<p><button class="button"><?php the_content(); ?></button></p>
					</a>
					<div class="stelle">

						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>