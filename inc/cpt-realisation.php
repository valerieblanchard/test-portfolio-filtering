<?php
/**
 * Register Taxonomy Type
 *
 * Taxonomy Key: type
 * For url rewriting taxonomy must be registered before CPT
 */
function create_type_tax() {

	$labels = array(
		'name'                       => _x( 'Types', 'Taxonomy General Name', 'twenty-thirteen-child' ),
		'singular_name'              => _x( 'Type', 'Taxonomy Singular Name', 'twenty-thirteen-child' ),
		'menu_name'                  => __( 'Type', 'twenty-thirteen-child' ),
		'all_items'                  => __( 'All Items', 'twenty-thirteen-child' ),
		'parent_item'                => __( 'Parent Item', 'twenty-thirteen-child' ),
		'parent_item_colon'          => __( 'Parent Item:', 'twenty-thirteen-child' ),
		'new_item_name'              => __( 'New Type Name', 'twenty-thirteen-child' ),
		'add_new_item'               => __( 'Add New Type', 'twenty-thirteen-child' ),
		'edit_item'                  => __( 'Edit Type', 'twenty-thirteen-child' ),
		'update_item'                => __( 'Update Type', 'twenty-thirteen-child' ),
		'view_item'                  => __( 'View Type', 'twenty-thirteen-child' ),
		'separate_items_with_commas' => __( 'Separate types with commas', 'twenty-thirteen-child' ),
		'add_or_remove_items'        => __( 'Add or remove types', 'twenty-thirteen-child' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'twenty-thirteen-child' ),
		'popular_items'              => __( 'Popular Types', 'twenty-thirteen-child' ),
		'search_items'               => __( 'Search Types', 'twenty-thirteen-child' ),
		'not_found'                  => __( 'Not Found', 'twenty-thirteen-child' ),
		'no_terms'                   => __( 'No types', 'twenty-thirteen-child' ),
		'items_list'                 => __( 'types list', 'twenty-thirteen-child' ),
		'items_list_navigation'      => __( 'types list navigation', 'twenty-thirteen-child' ),
	);

	$args = array(
		'labels'                => $labels,
		'hierarchical'          => true,
		'public'                => false, // disable archive access.
		'rewrite'               => array( 'slug' => 'type' ),
		'show_in_rest'          => true, // Important ! pour avoir ajouter la taxonomie dans le nouvel éditeur.
		'rest_base'             => 'category', // Pourquoi pas Type ??? mettre'type' ne fonctionne pas ...
		'rest_controller_class' => 'WP_REST_Terms_Controller',
		'show_ui'               => true,
		'show_admin_column'     => true,
		'show_in_nav_menus'     => true,
		'show_tagcloud'         => false,
	);
	register_taxonomy( 'type', array( 'realisation' ), $args );

}
add_action( 'init', 'create_type_tax', 0 );

/**
 * Register Custom Post Type realisation
 * Post Type Key: realisation.
 */
function create_realisation_cpt() {
	$labels = array(
		'name'               => _x( 'Realisations', 'Post Type General Name', 'twenty-thirteen-child' ),
		'singular_name'      => _x( 'Realisation', 'Post Type Singular Name', 'twenty-thirteen-child' ),
		'menu_name'          => __( 'Realisations', 'twenty-thirteen-child' ),
		'name_admin_bar'     => __( 'Realisation', 'twenty-thirteen-child' ),
		'all_items'          => __( 'All Realisations', 'twenty-thirteen-child' ),
		'add_new_item'       => __( 'Add New Realisation', 'twenty-thirteen-child' ),
		'new_item'           => __( 'New Realisation', 'twenty-thirteen-child' ),
		'view_item'          => __( 'View Realisation', 'twenty-thirteen-child' ),
		'search_items'       => __( 'Search Realisation', 'twenty-thirteen-child' ),
		'not_found'          => __( 'Not found', 'twenty-thirteen-child' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'twenty-thirteen-child' ),
	);

	$args = array(
		'label'                 => __( 'Realisation', 'twenty-thirteen-child' ),
		'description'           => __( 'Differents projets ', 'twenty-thirteen-child' ),
		'labels'                => $labels,
		'taxonomies'            => array( 'type' ),
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_icon'             => 'dashicons-nametag',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'rewrite'               => array( 'slug' => 'realisations' ),
		'capability_type'       => 'post',
		'has_archive'           => true,
		'hierarchical'          => false, // Like Posts.
		'show_in_rest'          => true, // Important ! pour avoir avoir le nouvel éditeur.
		'rest_base'             => 'realisations',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes' ),
	);
	register_post_type( 'realisation', $args );
}
add_action( 'init', 'create_realisation_cpt', 0 );
