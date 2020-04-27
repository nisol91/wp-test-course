<?php
/*
Template Name: Template di Prova
*/
?>
<h1>template di prova</h1>
<?php get_header() ?>

<?php
$args = array(
	'post_type' => 'page',
	'page_id' => 14,
	// 'posts_per_page' => 1,
	// 'paged' => $parametri,
	// 'order' => 'ASC',
	// 'orderby' => 'title',

	// 'author' => 1
);

$queryProva = new WP_Query($args);

?>
<?php if ($queryProva->have_posts()) : while ($queryProva->have_posts()) : $queryProva->the_post(); ?>
		<h1><?php the_title(); ?></h1>

		<div class="separator"></div>



	<?php endwhile; ?>


<?php endif; ?>

<?php get_footer(); ?>