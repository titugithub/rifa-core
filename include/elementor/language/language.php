<?php

namespace FTCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Control_Media;

use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class FT_Language extends Widget_Base
{
    use \FTCore\Widgets\FTCoreElementFunctions;

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'ft-language';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('FT Language', 'rifa-core');
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'ft-icon';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['rifa-core'];
    }

    /**
     * Retrieve the list of scripts the widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget scripts dependencies.
     */
    public function get_script_depends()
    {
        return ['rifa-core'];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {


        //==============================General Section==============================//







        // ===============================Style Section================================//

    }









    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        
        // Get current language
        $current_lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';
        
        // Define languages with translations
        $languages = [
            'en' => [
                'name' => 'English',
                'native' => esc_html__('English', 'rifa-core')
            ],
            'ar' => [
                'name' => 'Arabic',
                'native' => esc_html__('العربية', 'rifa-core')
            ]
        ];

        // Debug output
        if(current_user_can('administrator')) {
            echo '<!-- Debug: Current text domain translations -->';
            echo '<!-- ' . print_r($GLOBALS['l10n']['rifa-core'], true) . ' -->';
        }
        ?>
        <div class="language">
            <i class="las la-globe-europe"></i>
            <select class="language-select" style="display: none;">
                <?php foreach($languages as $code => $lang) : ?>
                    <option value="<?php echo esc_attr($code); ?>" 
                            <?php selected($current_lang, $code); ?>>
                        <?php echo esc_html($lang['native']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <div class="nice-select" tabindex="0">
                <span class="current">
                    <?php 
                    $current_text = isset($languages[$current_lang]) ? $languages[$current_lang]['native'] : $languages['en']['native'];
                    echo esc_html($current_text);
                    ?>
                </span>
                <ul class="list">
                    <?php foreach($languages as $code => $lang) : 
                        $is_current = ($current_lang === $code);
                        ?>
                        <li data-value="<?php echo esc_attr($code); ?>" 
                            class="option <?php echo $is_current ? 'selected focus' : ''; ?>">
                            <?php echo esc_html($lang['native']); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php
    }
}

$widgets_manager->register(new FT_Language());
