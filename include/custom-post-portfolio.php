<?php 
class FtProjectPost 
{
	function __construct() {
		add_action( 'init', array( $this, 'register_custom_post_type' ) );
		add_action( 'init', array( $this, 'create_cat' ) );
		add_filter( 'template_include', array( $this, 'portfolio_template_include' ) );
	}
	
	public function portfolio_template_include( $template ) {
		if ( is_singular( 'portfolio' ) ) {
			return $this->get_template( 'single-portfolio.php');
		}
		return $template;
	}
	
	public function get_template( $template ) {
		if ( $theme_file = locate_template( array( $template ) ) ) {
			$file = $theme_file;
		} 
		else {
			$file = FTCORE_ADDONS_DIR . '/include/template/'. $template;
		}
		return apply_filters( __FUNCTION__, $file, $template );
	}
	
	
	public function register_custom_post_type() {
		// $medidove_mem_slug = get_theme_mod('medidove_mem_slug','member'); 
		$labels = array(
			'name'                  => esc_html_x( 'Portfolios', 'Post Type General Name', 'rifa-core' ),
			'singular_name'         => esc_html_x( 'Portfolio', 'Post Type Singular Name', 'rifa-core' ),
			'menu_name'             => esc_html__( 'Portfolio', 'rifa-core' ),
			'name_admin_bar'        => esc_html__( 'Portfolio', 'rifa-core' ),
			'archives'              => esc_html__( 'Item Archives', 'rifa-core' ),
			'parent_item_colon'     => esc_html__( 'Parent Item:', 'rifa-core' ),
			'all_items'             => esc_html__( 'All Items', 'rifa-core' ),
			'add_new_item'          => esc_html__( 'Add New Portfolio', 'rifa-core' ),
			'add_new'               => esc_html__( 'Add New', 'rifa-core' ),
			'new_item'              => esc_html__( 'New Item', 'rifa-core' ),
			'edit_item'             => esc_html__( 'Edit Item', 'rifa-core' ),
			'update_item'           => esc_html__( 'Update Item', 'rifa-core' ),
			'view_item'             => esc_html__( 'View Item', 'rifa-core' ),
			'search_items'          => esc_html__( 'Search Item', 'rifa-core' ),
			'not_found'             => esc_html__( 'Not found', 'rifa-core' ),
			'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'rifa-core' ),
			'featured_image'        => esc_html__( 'Featured Image', 'rifa-core' ),
			'set_featured_image'    => esc_html__( 'Set featured image', 'rifa-core' ),
			'remove_featured_image' => esc_html__( 'Remove featured image', 'rifa-core' ),
			'use_featured_image'    => esc_html__( 'Use as featured image', 'rifa-core' ),
			'inserbt_into_item'     => esc_html__( 'Insert into item', 'rifa-core' ),
			'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'rifa-core' ),
			'items_list'            => esc_html__( 'Items list', 'rifa-core' ),
			'items_list_navigation' => esc_html__( 'Items list navigation', 'rifa-core' ),
			'filter_items_list'     => esc_html__( 'Filter items list', 'rifa-core' ),
		);

		$args   = array(
			'label'                 => esc_html__( 'Portfolio', 'rifa-core' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'   			=> 'dashicons-index-card',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);

		register_post_type( 'portfolios', $args );
	}
	
	public function create_cat() {
		$labels = array(
			'name'                       => esc_html_x( 'Portfolio Categories', 'Taxonomy General Name', 'rifa-core' ),
			'singular_name'              => esc_html_x( 'Portfolio Categories', 'Taxonomy Singular Name', 'rifa-core' ),
			'menu_name'                  => esc_html__( 'Portfolio Categories', 'rifa-core' ),
			'all_items'                  => esc_html__( 'All Portfolio Category', 'rifa-core' ),
			'parent_item'                => esc_html__( 'Parent Item', 'rifa-core' ),
			'parent_item_colon'          => esc_html__( 'Parent Item:', 'rifa-core' ),
			'new_item_name'              => esc_html__( 'New Portfolio Category Name', 'rifa-core' ),
			'add_new_item'               => esc_html__( 'Add New Portfolio Category', 'rifa-core' ),
			'edit_item'                  => esc_html__( 'Edit Portfolio Category', 'rifa-core' ),
			'update_item'                => esc_html__( 'Update Portfolio Category', 'rifa-core' ),
			'view_item'                  => esc_html__( 'View Portfolio Category', 'rifa-core' ),
			'separate_items_with_commas' => esc_html__( 'Separate items with commas', 'rifa-core' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove items', 'rifa-core' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'rifa-core' ),
			'popular_items'              => esc_html__( 'Popular Portfolio Category', 'rifa-core' ),
			'search_items'               => esc_html__( 'Search Portfolio Category', 'rifa-core' ),
			'not_found'                  => esc_html__( 'Not Found', 'rifa-core' ),
			'no_terms'                   => esc_html__( 'No Portfolio Category', 'rifa-core' ),
			'items_list'                 => esc_html__( 'Portfolio Category list', 'rifa-core' ),
			'items_list_navigation'      => esc_html__( 'Portfolio Category list navigation', 'rifa-core' ),
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

		register_taxonomy('portfolios-cat','portfolios', $args );
	}

}

new FtProjectPost();