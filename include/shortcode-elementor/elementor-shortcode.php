<?php
define( 'FTElements__FILE__', __FILE__ );
define( 'FTElements_PLUGIN_BASE', plugin_basename( FTElements__FILE__ ) );
define( 'FTElements_URL', plugins_url( '/', FTElements__FILE__ ) );
define( 'FTElements_PATH', plugin_dir_path( FTElements__FILE__ ) );
define( 'FTElements_ASSETS_URL', FTElements_URL . 'includes/assets/' );

require_once( FTElements_PATH . 'includes/post-type.php' );
require_once( FTElements_PATH . 'includes/settings.php' );


class ftelements_pro_Elementor_Shortcode{

	function __construct(){
		add_action( 'manage_ftelements_pro_posts_custom_column' , array( $this, 'ftelements_pro_ft_global_templates_columns' ), 10, 2);
		add_filter( 'manage_ftelements_pro_posts_columns', array($this,'ftelements_pro_custom_edit_global_templates_posts_columns' ));		
	}

	function ftelements_pro_custom_edit_global_templates_posts_columns($columns) {		
		$columns['ftpro_shortcode_column'] = esc_html__( 'Shortcode', 'rsaddon' );
		return $columns;
	}


	function ftelements_pro_ft_global_templates_columns( $column, $post_id ) {

		switch ( $column ) {

			case 'rspro_shortcode_column' :
				echo '<input type=\'text\' class=\'widefat\' value=\'[SHORTCODE_ELEMENTOR id="'.$post_id.'"]\' readonly="">';
				break;
		}
	}
	
}
new ftelements_pro_Elementor_Shortcode();