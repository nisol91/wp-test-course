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