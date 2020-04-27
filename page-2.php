<?php get_header(); ?>

<?php
get_header();
if (have_posts()) :
	while (have_posts()) : the_post();
		// Display post content
		// the_title();
		the_content();
	endwhile;
endif;
?>


<?php get_footer(); ?>





