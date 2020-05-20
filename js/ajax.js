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
		console.log("input vals-->");

		console.log(input_vals);




		$.ajax({
			type: "POST",
			url: my_ajax_object.ajax_url,
			data: {
				action: 'insert_data',
				input_vals: input_vals
			},
			success: function (response) {
				console.log(response);

			}
		});

	});

	deleteData();


	function deleteData() {
		$('#my_table').find('.delete_row').click(function (e) {
			e.preventDefault();
			console.log('cliccato');
			var id_row = $(this).attr('row-id');
			console.log(id_row);
			$.ajax({
				type: "POST",
				url: my_ajax_object.ajax_url,
				data: {
					action: 'delete_data',
					id_row: id_row
				},
				success: function (response) {
					console.log(response);

				}
			});

		});;
	}
});
