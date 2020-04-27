<?php
/*
page custom blog
*/
?>
<?php get_header() ?>

<?php $parametri = get_query_var('paged'); ?>

<?php
$args = array(
	'post_type' => 'post',
	// 'posts_per_page' => 1,
	// 'paged' => $parametri,
	'order' => 'ASC',
	'orderby' => 'title',

	// 'author' => 1
);

$query = new WP_Query($args);

?>
<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<h1><?php the_category(' '); ?></h1>

		<?php the_post_thumbnail(
			'blog-image',
			['class' => 'circle']
		); ?>
		<?php the_author() ?>
		<?php the_ID() ?>
		<hr>
		<?php the_meta() ?>



		<div class="separator"></div>



	<?php endwhile; ?>
	<?php //next_posts_link('next page' . get_query_var('paged'), $query->max_num_pages); 
	?>
	<?php echo paginate_links(
		array(
			'total' => $query->max_num_pages,
		)
	); ?>

<?php endif; ?>





<?php get_footer() ?>