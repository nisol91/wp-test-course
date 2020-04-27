<?php

use function PHPSTORM_META\map;

$templateDirectory = get_template_directory_uri(); ?>
<link rel="stylesheet" href="<?php echo $templateDirectory ?>/css/atleti.css">
<?php get_header(); ?>

<form action="" method="post">
	inserisci nome<input type="text" name="cerca" value=""><br>
	inserisci paese<input type="text" name="paese" value="">

	<input type="submit" value="cerca">

</form>

<?php
if (isset($_POST['cerca'])) {

	$key = $_POST['cerca'];
	$paese = $_POST['paese'];
}
?>




<?php $parametri = get_query_var('paged'); ?>

<?php
$args = array(
	'post_type' => 'post',
	'posts_per_page' => -1,
	'category_name' => 'atleti',
	// 'meta_key' => 'nazionalita',
	// 'meta_compare' => '=',
	// 'meta_value' => 'spa',
	'orderby' => 'meta_value',
	'order' => 'ASC',
	// 's' => $key,
	'meta_query' => array(
		'relation' => 'OR',
		array(
			'key' => 'nazionalita',
			'compare' => '=',
			'value' => 'spa'
		),
		array(
			'key' => 'eta',
			// 'type' => 'numeric',
			'compare' => 'BETWEEN',
			'value' => array(20, 50)
		)
	)

);

$query = new WP_Query($args);

?>
<div class="row">

	<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

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
		<?php endwhile; ?>
	<?php endif; ?>
</div>



<?php get_footer(); ?>