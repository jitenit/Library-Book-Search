<?php 

/*
 * Plugin Name: Library Book Search
 * Plugin URI: https://twitter.com/jitendra_popat
 * Description: Create your book list and book search in your wensite. active plugin.go to admin. add new nooks. and just simple paste this [search_library_book] in your page or in post to show search.
 * Version: 0.1
 * Author: Jiten IT - Jitendra Popat
 * Author URI: https://twitter.com/jitendra_popat
  * License: GPL2
 */


// Register Custom Post Type
function library_book_search_post_type() {

	$labels = array(
		'name'                  => _x( 'Library Book Searchs', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Library Book Search', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Library Book Search', 'text_domain' ),
		'name_admin_bar'        => __( 'Library Book Search', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Library Book Search', 'text_domain' ),
		'description'           => __( 'Library Book Search information page.', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'page-attributes' ),
		'taxonomies'            => array( 'author', 'publisher' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-book-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'library_book_search', $args );

}
add_action( 'init', 'library_book_search_post_type', 0 );

// Add css or js 

function library_book_search_scripts() {

	wp_enqueue_style('book-style', plugin_dir_url(__FILE__) . 'css/jquery-ui.css');
	wp_enqueue_style('jquery-ui', plugin_dir_url(__FILE__) . 'css/library_book.css');
	wp_enqueue_script( 'ajax-script', plugins_url( '/js/book_search.js', __FILE__ ), array('jquery') );
// in JavaScript, object properties are accessed as ajax_object.ajax_url, ajax_object.form_type
	wp_localize_script( 'ajax-script', 'ajax_object',
		array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'form_type' => 'lib_book_search' ) );

	wp_enqueue_script( 'jquerymain-script', plugins_url( '/js/jquery-1.12.4.js', __FILE__ ), array('jquery') );
	wp_enqueue_script( 'jui-script', plugins_url( '/js/jquery-ui.js', __FILE__ ), array('jquery') );
}

add_action('wp_enqueue_scripts', 'library_book_search_scripts');


// Register Custom Taxonomy
function book_publisher_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Publishers', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Publisher', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Publisher', 'text_domain' ),
		'all_items'                  => __( 'All Publishers', 'text_domain' ),
		'parent_item'                => __( 'Parent Publisher', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Publisher:', 'text_domain' ),
		'new_item_name'              => __( 'New Publisher Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Publisher', 'text_domain' ),
		'edit_item'                  => __( 'Edit Publisher', 'text_domain' ),
		'update_item'                => __( 'Update Publisher', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate publishers with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove publishers', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used publishers', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Publishers', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'publisher', array( 'library_book_search' ), $args );

}
add_action( 'init', 'book_publisher_taxonomy', 0 );

// Register Custom Taxonomy
function book_author() {

	$labels = array(
		'name'                       => _x( 'Book Authors', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Book Author', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Book Author', 'text_domain' ),
		'all_items'                  => __( 'All Book Author', 'text_domain' ),
		'parent_item'                => __( 'Parent Book Author', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Book Author:', 'text_domain' ),
		'new_item_name'              => __( 'New Book Author Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Book Author', 'text_domain' ),
		'edit_item'                  => __( 'Edit Book Author', 'text_domain' ),
		'update_item'                => __( 'Update Book Author', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Book Author with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Book Author', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used Book Author', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Book Authors', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'book_author', array( 'library_book_search' ), $args );

}
add_action( 'init', 'book_author', 0 );

/*
  Meta Box of Custom field of price and star ratings

 */

  function book_fields_get_meta( $value ) {
  	global $post;

  	$field = get_post_meta( $post->ID, $value, true );
  	if ( ! empty( $field ) ) {
  		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
  	} else {
  		return false;
  	}
  }

  function book_fields_add_meta_box() {
  	add_meta_box(
  		'book_fields-book-fields',
  		__( 'Book Fields', 'book_fields' ),
  		'book_fields_html',
  		'library_book_search',
  		'normal',
  		'default'
  	);
  }
  add_action( 'add_meta_boxes', 'book_fields_add_meta_box' );

  function book_fields_html( $post) {
  	wp_nonce_field( '_book_fields_nonce', 'book_fields_nonce' ); ?>

  	<p>Price and Start ratings of books</p>

  	<p>
  		<label for="book_fields_price"><?php _e( 'Price', 'book_fields' ); ?></label><br>
  		<input type="text" name="book_fields_price" id="book_fields_price" value="<?php echo book_fields_get_meta( 'book_fields_price' ); ?>">
  	</p>	<p>
  		<label for="book_fields_star"><?php _e( 'Star', 'book_fields' ); ?></label><br>
  		<select name="book_fields_star" id="book_fields_star">
  			<option <?php echo (book_fields_get_meta( 'book_fields_star' ) === '1' ) ? 'selected' : '' ?>>1</option>
  			<option <?php echo (book_fields_get_meta( 'book_fields_star' ) === '2' ) ? 'selected' : '' ?>>2</option>
  			<option <?php echo (book_fields_get_meta( 'book_fields_star' ) === '3' ) ? 'selected' : '' ?>>3</option>
  			<option <?php echo (book_fields_get_meta( 'book_fields_star' ) === '4' ) ? 'selected' : '' ?>>4</option>
  			<option <?php echo (book_fields_get_meta( 'book_fields_star' ) === '5' ) ? 'selected' : '' ?>>5</option>
  		</select>
  		</p><?php
  	}

  	function book_fields_save( $post_id ) {
  		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
  		if ( ! isset( $_POST['book_fields_nonce'] ) || ! wp_verify_nonce( $_POST['book_fields_nonce'], '_book_fields_nonce' ) ) return;
  		if ( ! current_user_can( 'edit_post', $post_id ) ) return;

  		if ( isset( $_POST['book_fields_price'] ) )
  			update_post_meta( $post_id, 'book_fields_price', esc_attr( $_POST['book_fields_price'] ) );
  		if ( isset( $_POST['book_fields_star'] ) )
  			update_post_meta( $post_id, 'book_fields_star', esc_attr( $_POST['book_fields_star'] ) );
  	}
  	add_action( 'save_post', 'book_fields_save' );

/*
	Usage: book_fields_get_meta( 'book_fields_price' )
	Usage: book_fields_get_meta( 'book_fields_star' )
*/


// For search page using shortcode

	function  shortcode_for_library_plugin( $atts ) {

		include('book-search.php');

	//return "test";

	}
	add_shortcode( 'search_library_book', 'shortcode_for_library_plugin' );


// search ajax method 

	add_action( 'wp_ajax_my_action', 'my_action' );
	add_action( 'wp_ajax_nopriv_my_action', 'my_action' );

	function my_action() {
		global $wpdb;

		$book_name = $_POST['book_name'];
		$book_ratings = $_POST['book_ratings'];

		if( !empty( $_POST['book_publisher'] ) ) {
			$book_publisher = $_POST['book_publisher'];
		}

		if( !empty( $_POST['book_author'] ) ) {
			$book_author = $_POST['book_author'];
		}

		$args = array(
			'post_type'  => 'library_book_search',
			's'  => $book_name,
    		'relation' => 'OR',
			'meta_query' => array(
				'relation' => 'AND',
				array(
					'key' => 'book_fields_star',
					'value' => $book_ratings,
					'compare' => 'LIKE'
				),
				array(
					'key' => 'book_fields_price',
					'value' => array( 1, 500 ),
					'type' => 'numeric',
					'compare' => 'between'
				)
			),	

    );
		$taxquery = array( 'relation' => 'OR' );

		// if author name search old by J
	/*	if(!empty($book_author) || isset($book_author)  ){
			$taxquery[] = array(
				'taxonomy' => 'book_author',
				'field' => 'name',
				'terms' => $book_author,
				'compare' => 'LIKE'
			);
		}*/

		if(!empty($book_author) || isset($book_author)  ){
			$taxquery[] = array(
				'taxonomy' => 'book_author',
				'field' => 'term_id',
				'terms' => $book_author,
			);
		}


		if(!empty($book_publisher) || isset($book_publisher)  ){
			$taxquery[] = array(
				'taxonomy' => 'publisher',
				'field' => 'term_id',
				'terms' => $book_publisher,
			);
		}
		

		if(!empty($taxquery)){
			$args['tax_query'] = $taxquery;
		}

		// echo '<pre>' ; print_r($args);

		$query = new WP_Query( $args );

	//	 print_r($wpdb->last_query);

		if ( $query->have_posts() ) : $i=1; ?>

		<!-- pagination here -->

		<div class="search_results" id="search_results" style="">
			<table class="booktable">
				<tr>
					<th>No</th>
					<th>Book Name</th>
					<th>Price</th>
					<th>Author</th>
					<th>Publisher</th>
					<th>Ratings</th>
				</tr>

				<!-- the loop -->
				<?php while ( $query->have_posts() ) : $query->the_post(); 

				//$book_author = wp_get_post_terms( get_the_ID(), 'book_author',array("fields" => "names"));
				//$book_publisher = get_the_terms( get_the_ID(), 'publisher');

				foreach (get_the_terms(get_the_ID(), 'book_author') as $cat) {
					$author_name = $cat->name;
				}

				foreach (get_the_terms(get_the_ID(), 'publisher') as $cat) {
					$publisher_name = $cat->name;
				}

				//print($book_author);

				?>

				<tr>
					<td><?php echo $i;?></td>
					<td><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></td>
					<td><?php echo get_post_meta( get_the_ID(), 'book_fields_price', true ); ?></td>
					<td><?php echo $author_name;  ?></td>
					<td><?php echo $publisher_name; ?></td>
					<td><?php echo get_post_meta( get_the_ID(), 'book_fields_star', true ); ?></td>
				</tr>
				<?php $i++; endwhile; ?>
				<!-- end of the loop -->

				<!-- pagination here -->

				<?php wp_reset_postdata(); ?>

			</table>
		</div>

	<?php else : ?>
		<div class="search_results" id="search_results" style="">
			<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
		</div>	
	<?php endif;

	wp_die();
}


add_action( 'admin_menu', 'books_register_ref_page' );
//add_action( 'admin_init', 'books_ref_page_callback' );

/**
 * Adds a submenu page under a custom post type parent.
 */
function books_register_ref_page() {
    add_submenu_page(
        'edit.php?post_type=library_book_search',
        __( 'Lirbary Books Shortcode', 'textdomain' ),
        __( 'Shortcode Reference', 'textdomain' ),
        'manage_options',
        'books-shortcode-ref',
        'books_ref_page_callback'
    );
}

/**
 * Display callback for the submenu page.
 */
function books_ref_page_callback() { 
    ?>
    <div class="wrap">
        <h1><?php _e( 'Libray Book Search Shortcode', 'textdomain' ); ?></h1>
        <p><?php _e( 'use this in your page or post to display search form - [search_library_book] ', 'textdomain' ); ?></p>
    </div>
    <?php
}