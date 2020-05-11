<?php

// [test nome="nic" cognome="sazzetta"]
function test_shortcode($atts)
{
	$a = shortcode_atts(array(
		'nome' => '',
		'cognome' => '',
	), $atts);

	return "test-nome-cognome:" . $a['nome'] . $a['cognome'];
}
add_shortcode('test', 'test_shortcode');
