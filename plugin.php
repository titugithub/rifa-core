<?php
namespace FTCore;

/*
Plugin Name: Rifa Core
Plugin URI: http://your-site.com
Description: Core plugin for Rifa theme
Version: 1.0.0
Author: Your Name
Author URI: http://your-site.com
Text Domain: rifa-core
Domain Path: /languages
*/

use FTCore\PageSettings\Page_Settings;
use Elementor\Controls_Manager;

// Move text domain loader after namespace but before class
function load_rifa_core_textdomain() {
    $languages_path = dirname(plugin_basename(__FILE__)) . '/languages/';
    load_plugin_textdomain('rifa-core', false, $languages_path);
}
add_action('init', __NAMESPACE__ . '\load_rifa_core_textdomain', 0);

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class FT_Core_Plugin {


	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Add Category
	 */

    public function ft_core_elementor_category($manager)
    {
        $manager->add_category(
            'rifa-core',
            array(
                'title' => esc_html__('FT Addons', 'rifa-core'),
                'icon' => 'eicon-banner',
            )
        );
    }

	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts() {
		wp_register_script( 'rifa-core', plugins_url( '/assets/js/hello-world.js', __FILE__ ), [ 'jquery' ], false, true );
	}

	/**
	 * Editor scripts
	 *
	 * Enqueue plugin javascripts integrations for Elementor editor.
	 *
	 * @since 1.2.1
	 * @access public
	 */
	public function editor_scripts() {
		add_filter( 'script_loader_tag', [ $this, 'editor_scripts_as_a_module' ], 10, 2 );

		wp_enqueue_script(
			'ftcore-editor',
			plugins_url( '/assets/js/editor/editor.js', __FILE__ ),
			[
				'elementor-editor',
			],
			'1.2.1',
			true
		);
	}



    function ft_enqueue_editor_scripts()
    {
        wp_enqueue_style('ft-element-addons-editor', FTCORE_ADDONS_URL . 'assets/css/editor.css', null, '1.0');
    }

    



	/**
	 * Force load editor script as a module
	 *
	 * @since 1.2.1
	 *
	 * @param string $tag
	 * @param string $handle
	 *
	 * @return string
	 */
	public function editor_scripts_as_a_module( $tag, $handle ) {
		if ( 'ftcore-editor' === $handle ) {
			$tag = str_replace( '<script', '<script type="module"', $tag );
		}

		return $tag;
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @param Widgets_Manager $widgets_manager Elementor widgets manager.
	 */
	public function register_widgets( $widgets_manager ) {
		// It is now safe to include Widgets files
		foreach ( $this->ftcore_widget_list() as $widget_info ) {
			$folder = $widget_info['folder'];
			$widget_file_name = $widget_info['file'];
	
			require_once( FTCORE_ELEMENTS_PATH . "/{$folder}/{$widget_file_name}.php" );
		}
	}
	
	public function ftcore_widget_list() {
		return [
			['folder' => 'btn', 'file' => 'btn'],
			['folder' => 'heading', 'file' => 'heading'],
			['folder' => 'blog', 'file' => 'blog'],
			['folder' => 'testimonial', 'file' => 'testimonial'],
			['folder' => 'video', 'file' => 'video'],
			['folder' => 'imageparalax', 'file' => 'imageparalax'],
			['folder' => 'accordion-tab', 'file' => 'accordion-tab'],
			['folder' => 'accordion', 'file' => 'accordion'],
			['folder' => 'imageanimate', 'file' => 'imageanimate'],
			['folder' => 'team', 'file' => 'team'],
			['folder' => 'price', 'file' => 'price'],
			['folder' => 'services-post', 'file' => 'services'],
			['folder' => 'portfolios-post', 'file' => 'portfolios'],
			['folder' => 'normal-slide', 'file' => 'normal-slide'],
			['folder' => 'service-slide-post', 'file' => 'services-post'],
			['folder' => 'portfolios-slide-post', 'file' => 'portfolios-post'],
			['folder' => 'subtitle', 'file' => 'subtitle'],
			['folder' => 'title', 'file' => 'title'],
			['folder' => 'description', 'file' => 'description'],
			['folder' => 'banner', 'file' => 'banner'],
			['folder' => 'about', 'file' => 'about'],
			['folder' => 'map', 'file' => 'map'],
			['folder' => 'feature', 'file' => 'feature'],
			['folder' => 'support', 'file' => 'support'],
			['folder' => 'banner', 'file' => 'banner2'],
			['folder' => 'banner', 'file' => 'banner3'],
			['folder' => 'counter', 'file' => 'counter'],
			['folder' => 'banner', 'file' => 'banner4'],
			['folder' => 'about', 'file' => 'about2'],
			['folder' => 'feature', 'file' => 'feature2'],
			['folder' => 'affiliate', 'file' => 'affiliate'],
			['folder' => 'feature', 'file' => 'feature3'],
			['folder' => 'brand', 'file' => 'brand'],
			['folder' => 'watch', 'file' => 'watch'],
			['folder' => 'faq', 'file' => 'faq'],
			['folder' => 'contact', 'file' => 'contact'],
			['folder' => 'language', 'file' => 'language'],

		];
	}

	public function custom_register_widget_styles() {		
		$dir = plugin_dir_url(__FILE__);        
		
			
		    wp_enqueue_style( 'button', $dir.'include/elementor/btn/btn.css' );	
		    wp_enqueue_style( 'heading', $dir.'include/elementor/heading/heading.css' );	
			wp_enqueue_style( 'blog', $dir.'include/elementor/blog/blog.css' );		
			wp_enqueue_style( 'testimonial', $dir.'include/elementor/testimonial/testimonial.css' );		
			wp_enqueue_style( 'video', $dir.'include/elementor/video/video.css' );		
			wp_enqueue_style( 'imageparalax', $dir.'include/elementor/imageparalax/imageparalax.css' );		
			wp_enqueue_style( 'accordion-tab', $dir.'include/elementor/accordion-tab/accordion-tab.css' );		
			wp_enqueue_style( 'accordion', $dir.'include/elementor/accordion/accordion.css' );		
			wp_enqueue_style( 'imageanimate', $dir.'include/elementor/imageanimate/imageanimate.css' );		
			wp_enqueue_style( 'team', $dir.'include/elementor/team/team.css' );		
			wp_enqueue_style( 'counter', $dir.'include/elementor/price/price.css' );		
			wp_enqueue_style( 'services-post', $dir.'include/elementor/services-post/services.css' );		
			wp_enqueue_style( 'normal-slide', $dir.'include/elementor/normal-slide/normal-slide.css' );		
			wp_enqueue_style( 'portfolios-slide-post', $dir.'include/elementor/portfolios-slide-post/portfolios-post.css' );		
			wp_enqueue_style( 'subtitle', $dir.'include/elementor/subtitle/subtitle.css' );		
			wp_enqueue_style( 'title', $dir.'include/elementor/title/title.css' );		
			wp_enqueue_style( 'description', $dir.'include/elementor/description/description.css' );		
			

	
	}
	



	/**
	 * Add page settings controls
	 *
	 * Register new settings for a document page settings.
	 *
	 * @since 1.2.1
	 * @access private
	 */
	private function add_page_settings_controls() {
		require_once( __DIR__ . '/page-settings/manager.php' );
		new Page_Settings();
	}


	/**
	 * Register controls
	 *
	 * @param Controls_Manager $controls_Manager
	 */

    public function register_controls(Controls_Manager $controls_Manager)
    {
        include_once(FTCORE_ADDONS_DIR . '/controls/gradient.php');
        $ftgradient = 'FTCore\Elementor\Controls\Group_Control_FTGradient';
        $controls_Manager->add_group_control($ftgradient::get_type(), new $ftgradient());

        include_once(FTCORE_ADDONS_DIR . '/controls/bggradient.php');
        $ftbggradient = 'FTCore\Elementor\Controls\Group_Control_FTBGGradient';
        $controls_Manager->add_group_control($ftbggradient::get_type(), new $ftbggradient());
    }


    

    public function ft_add_custom_icons_tab($tabs = array()){






        // Append new icons
        $feather_icons = array(
            'feather-activity',
            'feather-airplay',
            'feather-alert-circle',
            'feather-alert-octagon',
            'feather-alert-triangle',
            'feather-align-center',
            'feather-align-justify',
            'feather-align-left',
            'feather-align-right',
        );

        $tabs['ft-feather-icons'] = array(
            'name' => 'ft-feather-icons',
            'label' => esc_html__('FT - Feather Icons', 'rifa-core'),
            'labelIcon' => 'ft-icon',
            'prefix' => '',
            'displayPrefix' => 'ft',
            'url' => FTCORE_ADDONS_URL . 'assets/css/feather.css',
            'icons' => $feather_icons,
            'ver' => '1.0.0',
        ); 

        $feather_icons = array(
	        'angle-up',
	        'check',
	        'times',
	        'calendar',
	        'language',
	        'shopping-cart',
	        'bars',
	        'search',
	        'map-marker',
	        'arrow-right',
	        'arrow-left',
	        'arrow-up',
	        'arrow-down',
	        'angle-right',
	        'angle-left',
	        'angle-up',
	        'angle-down',
	        'phone',
	        'users',
	        'user',
	        'map-marked-alt',
	        'trophy-alt',
	        'envelope',
	        'marker',
	        'globe',
	        'broom',
	        'home',
	        'bed',
	        'chair',
	        'bath',
	        'tree',
	        'laptop-code',
	        'cube',
	        'cog',
	        'play',
	        'trophy-alt',
	        'heart',
	        'truck',
	        'user-circle',
	        'map-marker-alt',
	        'comments',
	         'award',
	        'bell',
	        'book-alt',
	        'book-open',
	        'book-reader',
	        'graduation-cap',
	        'laptop-code',
	        'music',
	        'ruler-triangle',
	        'user-graduate',
	        'microscope',
	        'glasses-alt',
	        'theater-masks',
	        'atom'
        );

        $tabs['ft-fontawesome-icons'] = array(
            'name' => 'ft-fontawesome-icons',
            'label' => esc_html__('FT - Fontawesome Pro Light', 'rifa-core'),
            'labelIcon' => 'ft-icon',
            'prefix' => 'fa-',
            'displayPrefix' => 'fal',
            'url' => FTCORE_ADDONS_URL . 'assets/css/fontawesome-all.min.css',
            'icons' => $feather_icons,
            'ver' => '1.0.0',
        );        

        return $tabs;
    }


	// campaign_template_fun
	public function campaign_template_fun( $campaign_template ) {

	    if ( ( get_post_type() == 'campaign' ) && is_single() ) {
	        $campaign_template_file_path = __DIR__ . '/include/template/single-campaign.php';
	        $campaign_template           = $campaign_template_file_path;
	    }
	    if ( ( get_post_type() == 'tribe_events' ) && is_single() ) {
	        $campaign_template_file_path = __DIR__ . '/include/template/single-event.php';
	        $campaign_template           = $campaign_template_file_path;
	    }

	    if ( ! $campaign_template ) {
	        return $campaign_template;
	    }
	    return $campaign_template;
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {

		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

		// Register widgets
		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );

		// Register editor scripts
		add_action( 'elementor/editor/after_enqueue_scripts', [ $this, 'editor_scripts' ] );

		add_action('elementor/elements/categories_registered', [$this, 'ft_core_elementor_category']);

		// Register custom controls
	    add_action('elementor/controls/controls_registered', [$this, 'register_controls']);

	    add_filter('elementor/icons_manager/additional_tabs', [$this, 'ft_add_custom_icons_tab']);

		//Register css

		add_action( 'wp_enqueue_scripts', [ $this, 'custom_register_widget_styles' ] );

	

	    add_action('elementor/editor/after_enqueue_scripts', [$this, 'ft_enqueue_editor_scripts'] );

	    add_filter( 'template_include', [ $this, 'campaign_template_fun' ], 99 );

		$this->add_page_settings_controls();

	}


}

// Instantiate Plugin Class
FT_Core_Plugin::instance();