<?php

namespace FTCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Control_Media;

use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;
use Essential_Addons_Elementor\Pro\Skins\Skin_Four;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class FT_imageanimate extends Widget_Base
{


    public function get_name()
    {
        return 'ft-imageanimate';
    }


    public function get_title()
    {
        return __('FT Animate Image', 'rifa-core');
    }


    public function get_icon()
    {
        return 'ft-icon';
    }


    public function get_categories()
    {
        return ['rifa-core'];
    }


    public function get_script_depends()
    {
        return ['rifa-core'];
    }




    protected function register_controls()
    {


        $this->start_controls_section(
            'content',
            [
                'label' => esc_html__('Content', 'rifa-core')
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // Select Option
        $this->add_control(
            'select_animate',
            [
                'label'     => esc_html__( 'Select Animate', 'rifa-core' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'push_animat',
                'options'   => [
                    'push_animat'      => esc_html__( 'push_animat', 'rifa-core' ),
                    'rotate'      => esc_html__( 'rotate', 'rifa-core' ),
                    'previewSkew'      => esc_html__( 'previewSkew', 'rifa-core' ),
                    'previewShapeRevX'      => esc_html__( 'previewShapeRevX', 'rifa-core' ),
                    'jello'      => esc_html__( 'jello', 'rifa-core' ),
                    'fadeInTopLeft'      => esc_html__( 'fadeInTopLeft', 'rifa-core' ),
                    'fadeInTopRight'      => esc_html__( 'fadeInTopRight', 'rifa-core' ),
                    'pulse'      => esc_html__( 'pulse', 'rifa-core' ),
                ],
            ]
        );


        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();

        ?>

        <?php if (!empty($settings['image']['url'])) :   ?>



            <div class="animate-image">
                <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr__('image', 'rifa-core'); ?>" 
                class=" <?php echo esc_attr($settings['select_animate']); ?>">
            </div>




        <?php endif ?>








<?php
    }
}

$widgets_manager->register(new FT_imageanimate());
