var $ = jQuery.noConflict();


$(document).ready(function () {
	console.log('weeee');
	$('button#invia_dati').click(function (e) {
		e.preventDefault();
		console.log('hai cliccato');
		var inputs = $(this).closest('form').find('input');
		console.log(inputs);

		var input_vals = {};
		$.each(inputs, function (key, value) {
			console.log(key);
			console.log(value);
			console.log($(value).val());
			input_vals[$(value).attr('name')] = $(value).val();
		});
		// var name = $('input#name').val();
		// var lastname = $('input#lastname').val();
		// var email = $('input#email').val();
		console.log(input_vals);




		$.ajax({
			type: "POST",
			url: my_ajax_object.ajax_url,
			data: {
				action: 'insert_data',
				input_vals: input_vals
			},
			success: function (response) {

			}
		});

	});
});
