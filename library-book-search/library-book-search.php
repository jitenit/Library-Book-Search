<?php 

/*
 * Plugin Name: Library Book Search
 * Plugin URI: https://twitter.com/jitendra_popat
 * Description: Create your book list and book search in your wensite. active plugin.go to admin. add new nooks. and just simple paste this [showbooksearch] in your page or in post to show search.
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

//    wp_register_style('bootstrapmin', plugin_dir_url(__FILE__) . 'css/bootstrapmin.css');

//    wp_enqueue_style('bootstrapmin');

 //   wp_enqueue_script('myjs', plugins_url( 'js/bootstrap.min.js' , __FILE__), array( 'jquery' ) , true);
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
  Meta Box generator
  Custom field of price and star ratings

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

	include('faq.php');

	return "test";

}
add_shortcode( 'search_library_book', 'shortcode_for_library_plugin' );