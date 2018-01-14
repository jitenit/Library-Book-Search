jQuery(document).ready(function($) {
	

 	jQuery('#book_search').on('click', function(e) {

       e.preventDefault();
        var book_name = jQuery("#book_name").val();
        var book_author = jQuery("#book_author").val();
        var book_publisher = jQuery("#book_publisher").val();
        var book_ratings = jQuery("#book_ratings").val();

        var data = {
		'action': 'my_action',
		'book_name': book_name,
		'book_author': book_author,
		'book_publisher': book_publisher,
		'book_ratings': book_ratings, 
		};
		
		// We can also pass the url value separately from ajaxurl for front end AJAX implementations
		jQuery.post(ajax_object.ajax_url, data, function(response) {
		//	alert('Got this from the server: ' + response);
		
			jQuery("#search_results").replaceWith(response);
			//alert('ccc');

		});

		// return false;

    });

});