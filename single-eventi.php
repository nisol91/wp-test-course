<?php

/**
 * The template for displaying all single runner
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package tema_test_corso
 */

?>

<?php get_header(); ?>


<h1>sono single evento</h1>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<h6><?php echo get_field('data_evento'); ?></h6>
		<h6><?php the_content(); ?></h6>
		<h5>

			<?php echo get_the_term_list($post->ID, 'review') ?>
		</h5>

	<?php endwhile; ?>
<?php endif; ?>



<?php get_footer(); ?>