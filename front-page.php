<?php
/*
front page
*/
?>
<?php get_header() ?>
<div class="frontBox">

	<div class="half left">


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

		$queryContacts = new WP_Query($args);

		?>
		<?php if ($queryContacts->have_posts()) : while ($queryContacts->have_posts()) : $queryContacts->the_post(); ?>
				<h1><?php the_title(); ?></h1>

				<div class="separator"></div>



			<?php endwhile; ?>


		<?php endif; ?>

		<?php wp_reset_postdata() ?>

	</div>

	<div class="half right">


		<?php
		$args2 = array(
			'post_type' => 'post',
			'category_name' => 'categoria-test',
			'posts_per_page' => 3,
			// 'paged' => $parametri,
			// 'order' => 'ASC',
			// 'orderby' => 'title',

			// 'author' => 1
		);

		$queryPosts = new WP_Query($args2);

		?>
		<?php if ($queryPosts->have_posts()) : while ($queryPosts->have_posts()) : $queryPosts->the_post(); ?>
				<h1><?php the_title(); ?></h1>

				<div class="separator"></div>



			<?php endwhile; ?>


		<?php endif; ?>

		<?php wp_reset_postdata() ?>

	</div>


</div>



<?php get_footer() ?>