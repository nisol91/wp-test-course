<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tema_test_corso
 */

get_header();
?>
<h1>pagina inserimenti dati</h1>
<main id="primary" class="site-main">
	<form>
		<div class="form-group">
			<label for="exampleInputPassword1">Name</label>
			<input name="name" type="text" class="form-control" id="name" placeholder="name">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Lastname</label>
			<input name="lastname" type="text" class="form-control" id="lastname" placeholder="lastname">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Email address</label>
			<input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
		</div>


		<button type="submit" id="invia_dati" class="btn btn-primary">Submit</button>
	</form>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
