<?php
/*
page eventi
*/
?>
<?php get_header() ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style lang="css">
	.checked {
		color: orange;
	}
</style>
<h1>template trail eventi</h1>
<?php
$parametri = get_query_var('paged');
$todayDate = date('Ymd');
?>
<?php
$args = array(
	'post_type' => 'eventi',
	'posts_per_page' => -1,
	'paged' => $parametri,
	'order' => 'ASC',
	'orderby' => 'title',
	// 'meta_key' => 'data_evento',
	// 'meta_compare' => '<=',
	// 'meta_value' => $todayDate,
	// 'tax_query' => array(
	// 	'relation' => 'OR',
	// 	array(
	// 		'taxonomy' => 'review',
	// 		'field' => 'id',
	// 		'terms' => array(9),
	// 		// 'operator' => 'NOT_IN'
	// 	),
	// 	array(
	// 		'taxonomy' => 'type',
	// 		'field' => 'id',
	// 		'terms' => array(11)
	// 	)
	// )
);


$eventi = new WP_Query($args);


?>
<?php if ($eventi->have_posts()) : while ($eventi->have_posts()) : $eventi->the_post(); ?>
		<?php
		$terms = get_the_terms($post->ID, 'review');
		// var_dump($terms);
		foreach ($terms as $term) {
			// var_dump('id->' . $term->term_id);
		}
		?>

		<div class="column">
			<div class="card">
				<?php the_post_thumbnail('blog-image-hard') ?>
				<div class="container">
					<h2><?php the_title(); ?>
					</h2>
					<h4>data</h4>
					<p class="title">
						<?php
						$dataRaw = get_field('data_evento', false, false);
						$newDate = new DateTime($dataRaw);
						echo $newDate->format('j M Y');
						?>
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
					<?php
					$reviewStarLink = get_the_term_list($post->ID, 'review');
					$reviewStar = substr($reviewStarLink, -12);
					$star = substr($reviewStar, 0, 1);

					echo $star;

					?>
					<?php if ($terms != false) { ?>
						<div class="stelle">
							<a href="<?php echo get_term_link($term); ?>">
								<span class="fa fa-star <?php echo ($star >= 1) ? 'checked' : '' ?> "></span>

								<span class="fa fa-star <?php echo ($star >= 2) ? 'checked' : '' ?> "></span>
								<span class="fa fa-star <?php echo ($star >= 3) ? 'checked' : '' ?> "></span>
								<span class="fa fa-star <?php echo ($star >= 4) ? 'checked' : '' ?> "></span>
							</a>
						</div>
					<?php }; ?>
				</div>
			</div>
		</div>
		<?php echo paginate_links(
			array(
				'total' => $eventi->max_num_pages,
			)
		); ?>


	<?php endwhile; ?>


<?php endif; ?>

<?php get_footer(); ?>