jQuery(document).ready(function($) {
	

	jQuery('#book_search').on('click', function(e) {

		e.preventDefault();
		var book_name = jQuery("#book_name").val();
		var book_author = jQuery("#book_author").val();
		var book_publisher = jQuery("#book_publisher").val();
		var book_ratings = jQuery("#book_ratings").val();
		var min_amount = jQuery("#min_amount").val();
		var max_amount = jQuery("#max_amount").val();

		var data = {
			'action': 'my_action',
			'book_name': book_name,
			'book_author': book_author,
			'book_publisher': book_publisher,
			'book_ratings': book_ratings,
			'min_amount': min_amount,
			'max_amount': max_amount, 
		};
		
		// We can also pass the url value separately from ajaxurl for front end AJAX implementations
		jQuery.post(ajax_object.ajax_url, data, function(response) {
		//	alert('Got this from the server: ' + response);
		
		jQuery("#search_results").replaceWith(response);
			//alert('ccc');

		});

		// return false;

	});


	$( "#slider-range" ).change(function() {
 	//alert('sds');
	});

	jQuery( function() {
		jQuery( "#slider-range" ).slider({
			range: true,
			min: 0,
			max: 500,
			values: [ 0, 500 ],
			slide: function( event, ui ) {
				jQuery( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			//	alert( ui.values[ 0 ]);
		}
	});

		var min = jQuery( "#slider-range" ).slider( "values", 0 );
		var max = jQuery( "#slider-range" ).slider( "values", 1 );

		jQuery( "#min_amount" ).val( jQuery( "#slider-range" ).slider( "values", 0 ));
		jQuery( "#max_amount" ).val(jQuery( "#slider-range" ).slider( "values", 1 ));

		jQuery( "#amount" ).val( "Min" + jQuery( "#slider-range" ).slider( "values", 0 ) +
			" - Max" + jQuery( "#slider-range" ).slider( "values", 1 ) );
	} );

});