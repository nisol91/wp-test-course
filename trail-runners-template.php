<?php
/*
Template Name: Template pagina trail runner
*/
?>
<?php get_header() ?>
<h1>template trail runners</h1>
<?php $parametri = get_query_var('paged'); ?>
<?php
$args = array(
	'post_type' => 'runners',
	'posts_per_page' => 2,
	'paged' => $parametri,
	'order' => 'ASC',
	'orderby' => 'title',
);

$runners = new WP_Query($args);

?>
<?php if ($runners->have_posts()) : while ($runners->have_posts()) : $runners->the_post(); ?>
		<div class="column">
			<div class="card">
				<img src="img3.jpg" alt="John" style="width:100%">
				<div class="container">
					<h2><?php the_title(); ?>
					</h2>
					<h4>eta</h4>
					<p class="title"><?php the_field('eta'); ?>
					</p>
					<h4>naz</h4>
					<p class="title"><?php the_field('nazionalita'); ?>
					</p>
					<p>Some text that describes me lorem ipsum ipsum lorem.</p>
					<p>example@example.com</p>
					<a href="<?php the_permalink(); ?>
						">
						<p><button class="button">Contact</button></p>
					</a>
				</div>
			</div>
		</div>
		<?php echo paginate_links(
			array(
				'total' => $runners->max_num_pages,
			)
		); ?>


	<?php endwhile; ?>


<?php endif; ?>

<?php get_footer(); ?>