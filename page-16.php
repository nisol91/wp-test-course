<?php get_header(); ?>

<?php
get_header();
if (have_posts()) :
	while (have_posts()) : the_post();
		// Display post content
		the_title('<h1>', '</h1>');
		the_content();
	endwhile;
endif;
?>

<div class="ultimi-articoli">
	<?php
	// esempio di custom loop.
	// mi permette di visualizzare, in questo caso solo i post di una determinata categoria.

	$args = array(
		'cat' => 2,
		'posts_per_page' => 3
	);

	$query = new WP_Query($args);

	?>

	<?php

	// The Loop
	if ($query->have_posts()) {
		echo '<ul>';
		while ($query->have_posts()) {
			$query->the_post();
			get_template_part('template-parts/content', 'team');
		}
		echo '</ul>';
	} else {
		// no posts found
	}

	?>


</div>
<?php get_footer(); ?>