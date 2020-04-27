<?php
/*
page custom fields
*/
?>
<?php get_header() ?>

<h1>custom fields sample</h1>

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
		<?php $customField = get_post_meta(get_the_ID(), 'campo personalizzato', true); ?>

		<?php if (!empty($customField)) {
			the_title();
			echo $customField;
		} else {
			the_title();
		}
		?>
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