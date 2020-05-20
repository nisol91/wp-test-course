<?php

function getDataFromDb($id_value = null)
{
	global $wpdb;
	$table = $wpdb->prefix . 'form_data';


	if ($id_value) {
		$result = $wpdb->get_results("SELECT * FROM $table WHERE id = $id_value");
	} else {
		$result = $wpdb->get_results("SELECT * FROM $table");
	}

	// echo '<pre>';
	// var_dump($result);
	// echo '</pre>';

	return $result;
}
