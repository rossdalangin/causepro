<?php
/**
 * Custom Post Types for CausePro Theme
 *
 * @package CausePro
 */

/**
 * Register Custom Post Types and Taxonomies
 */
function causepro_register_content_types() {

	// Cause CPT
	$cause_labels = array(
		'name'                  => _x( 'Causes', 'Post Type General Name', 'causepro' ),
		'singular_name'         => _x( 'Cause', 'Post Type Singular Name', 'causepro' ),
		'menu_name'             => __( 'Causes', 'causepro' ),
		'name_admin_bar'        => __( 'Cause', 'causepro' ),
		'archives'              => __( 'Cause Archives', 'causepro' ),
		'attributes'            => __( 'Cause Attributes', 'causepro' ),
		'parent_item_colon'     => __( 'Parent Cause:', 'causepro' ),
		'all_items'             => __( 'All Causes', 'causepro' ),
		'add_new_item'          => __( 'Add New Cause', 'causepro' ),
		'add_new'               => __( 'Add New', 'causepro' ),
		'new_item'              => __( 'New Cause', 'causepro' ),
		'edit_item'             => __( 'Edit Cause', 'causepro' ),
		'update_item'           => __( 'Update Cause', 'causepro' ),
		'view_item'             => __( 'View Cause', 'causepro' ),
		'view_items'            => __( 'View Causes', 'causepro' ),
		'search_items'          => __( 'Search Cause', 'causepro' ),
		'not_found'             => __( 'Not found', 'causepro' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'causepro' ),
		'featured_image'        => __( 'Featured Image', 'causepro' ),
		'set_featured_image'    => __( 'Set featured image', 'causepro' ),
		'remove_featured_image' => __( 'Remove featured image', 'causepro' ),
		'use_featured_image'    => __( 'Use as featured image', 'causepro' ),
		'insert_into_item'      => __( 'Insert into cause', 'causepro' ),
		'uploaded_to_this_item' => __( 'Uploaded to this cause', 'causepro' ),
		'items_list'            => __( 'Causes list', 'causepro' ),
		'items_list_navigation' => __( 'Causes list navigation', 'causepro' ),
		'filter_items_list'     => __( 'Filter causes list', 'causepro' ),
	);
	$cause_args = array(
		'label'                 => __( 'Cause', 'causepro' ),
		'description'           => __( 'Post Type for specific causes or campaigns.', 'causepro' ),
		'labels'                => $cause_labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-heart',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'rewrite'               => array( 'slug' => 'causes' ),
	);
	register_post_type( 'cause', $cause_args );


	// Event CPT
	$event_labels = array(
		'name'                  => _x( 'Events', 'Post Type General Name', 'causepro' ),
		'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'causepro' ),
		'menu_name'             => __( 'Events', 'causepro' ),
		'name_admin_bar'        => __( 'Event', 'causepro' ),
		'archives'              => __( 'Event Archives', 'causepro' ),
		'attributes'            => __( 'Event Attributes', 'causepro' ),
		'parent_item_colon'     => __( 'Parent Event:', 'causepro' ),
		'all_items'             => __( 'All Events', 'causepro' ),
		'add_new_item'          => __( 'Add New Event', 'causepro' ),
		'add_new'               => __( 'Add New', 'causepro' ),
		'new_item'              => __( 'New Event', 'causepro' ),
		'edit_item'             => __( 'Edit Event', 'causepro' ),
		'update_item'           => __( 'Update Event', 'causepro' ),
		'view_item'             => __( 'View Event', 'causepro' ),
		'view_items'            => __( 'View Events', 'causepro' ),
		'search_items'          => __( 'Search Event', 'causepro' ),
		'not_found'             => __( 'Not found', 'causepro' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'causepro' ),
		'featured_image'        => __( 'Featured Image', 'causepro' ),
		'set_featured_image'    => __( 'Set featured image', 'causepro' ),
		'remove_featured_image' => __( 'Remove featured image', 'causepro' ),
		'use_featured_image'    => __( 'Use as featured image', 'causepro' ),
		'insert_into_item'      => __( 'Insert into event', 'causepro' ),
		'uploaded_to_this_item' => __( 'Uploaded to this event', 'causepro' ),
		'items_list'            => __( 'Events list', 'causepro' ),
		'items_list_navigation' => __( 'Events list navigation', 'causepro' ),
		'filter_items_list'     => __( 'Filter events list', 'causepro' ),
	);
	$event_args = array(
		'label'                 => __( 'Event', 'causepro' ),
		'description'           => __( 'Post Type for events.', 'causepro' ),
		'labels'                => $event_labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'event_type' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'menu_icon'             => 'dashicons-calendar-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'rewrite'               => array( 'slug' => 'events' ),
	);
	register_post_type( 'event', $event_args );


	// Event Type Taxonomy
	$taxonomy_labels = array(
		'name'              => _x( 'Event Types', 'taxonomy general name', 'causepro' ),
		'singular_name'     => _x( 'Event Type', 'taxonomy singular name', 'causepro' ),
		'search_items'      => __( 'Search Event Types', 'causepro' ),
		'all_items'         => __( 'All Event Types', 'causepro' ),
		'parent_item'       => __( 'Parent Event Type', 'causepro' ),
		'parent_item_colon' => __( 'Parent Event Type:', 'causepro' ),
		'edit_item'         => __( 'Edit Event Type', 'causepro' ),
		'update_item'       => __( 'Update Event Type', 'causepro' ),
		'add_new_item'      => __( 'Add New Event Type', 'causepro' ),
		'new_item_name'     => __( 'New Event Type Name', 'causepro' ),
		'menu_name'         => __( 'Event Type', 'causepro' ),
	);
	$taxonomy_args = array(
		'hierarchical'      => true,
		'labels'            => $taxonomy_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'event-type' ),
	);
	register_taxonomy( 'event_type', array( 'event' ), $taxonomy_args );

}
add_action( 'init', 'causepro_register_content_types', 0 );

/**
 * Adds a meta box for event details.
 */
function causepro_event_details_meta_box_setup() {
	add_meta_box(
		'causepro_event_details',      // Unique ID
		'Event Details',               // Box title
		'causepro_event_details_meta_box_html',  // Content callback, must be of type callable
		'event',                       // Post type
		'normal',                      // Context
		'high'                         // Priority
	);
}
add_action( 'add_meta_boxes', 'causepro_event_details_meta_box_setup' );

/**
 * Renders the HTML for the event details meta box.
 *
 * @param WP_Post $post The object for the current post/page.
 */
function causepro_event_details_meta_box_html( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'causepro_save_event_details', 'causepro_event_details_nonce' );

	// Get existing values.
	$event_datetime = get_post_meta( $post->ID, '_event_datetime', true );
	$event_location = get_post_meta( $post->ID, '_event_location', true );
	$event_link     = get_post_meta( $post->ID, '_event_link', true );
	?>
	<style>
		.causepro-meta-field { margin-bottom: 15px; }
		.causepro-meta-field label { display: block; font-weight: bold; margin-bottom: 5px; }
		.causepro-meta-field input { width: 100%; padding: 8px; }
	</style>
	<div class="causepro-meta-field">
		<label for="causepro_event_datetime_field"><?php esc_html_e( 'Event Date & Time', 'causepro' ); ?></label>
		<input type="datetime-local" id="causepro_event_datetime_field" name="causepro_event_datetime_field" value="<?php echo esc_attr( $event_datetime ); ?>">
	</div>
	<div class="causepro-meta-field">
		<label for="causepro_event_location_field"><?php esc_html_e( 'Location', 'causepro' ); ?></label>
		<input type="text" id="causepro_event_location_field" name="causepro_event_location_field" value="<?php echo esc_attr( $event_location ); ?>">
	</div>
	<div class="causepro-meta-field">
		<label for="causepro_event_link_field"><?php esc_html_e( 'Registration/Info Link', 'causepro' ); ?></label>
		<input type="url" id="causepro_event_link_field" name="causepro_event_link_field" value="<?php echo esc_attr( $event_link ); ?>">
	</div>
	<?php
}

/**
 * Saves the custom meta data when the post is saved.
 *
 * @param int $post_id The ID of the post being saved.
 */
function causepro_save_event_details_meta( $post_id ) {
	// Check if our nonce is set.
	if ( ! isset( $_POST['causepro_event_details_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['causepro_event_details_nonce'], 'causepro_save_event_details' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'event' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	// Sanitize user input and update the meta fields.
	if ( isset( $_POST['causepro_event_datetime_field'] ) ) {
		update_post_meta( $post_id, '_event_datetime', sanitize_text_field( $_POST['causepro_event_datetime_field'] ) );
	}

	if ( isset( $_POST['causepro_event_location_field'] ) ) {
		update_post_meta( $post_id, '_event_location', sanitize_text_field( $_POST['causepro_event_location_field'] ) );
	}

	if ( isset( $_POST['causepro_event_link_field'] ) ) {
		update_post_meta( $post_id, '_event_link', esc_url_raw( $_POST['causepro_event_link_field'] ) );
	}
}
add_action( 'save_post', 'causepro_save_event_details_meta' );
