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


class FT_Video extends Widget_Base
{


    public function get_name()
    {
        return 'ft-video';
    }


    public function get_title()
    {
        return __('FT Video', 'rifa-core');
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

        // ======================Content================================//

        $this->start_controls_section(
            'content',
            [
                'label' => esc_html__('Content', 'rifa-core')
            ]
        );


        $this->add_control(
            'style_select',
            [
                'label'     => esc_html__('Style', 'rifa-core'),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'style_one',
                'options'   => [
                    'style_one'      => esc_html__('Style One', 'rifa-core'),
                    'style_two'      => esc_html__('Style Two', 'rifa-core'),
                ],
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Background Image', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'style_select' => 'style_one'
                ]
            ]
        );

        $this->add_control(
            'video_link',
            [
                'label' => esc_html__('VideoLink', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'rifa-core'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_responsive_control(
            'image_height',
            [
                'label'       => esc_html__('Height', 'rifa-core'),
                'type'        => Controls_Manager::SLIDER,
                'size_units'  => ['px', '%'],  // Allow px and percentage units
                'description' => esc_html__('Choose height in px or %', 'rifa-core'),
                'selectors'   => [
                    '{{WRAPPER}} .real-estate-video' => 'height: {{SIZE}}{{UNIT}};', // Dynamic unit
                ],
                'default'     => [
                    'unit'  => 'px',  // Default unit is px
                  
                ],
                'condition' => [
                    'style_select' => 'style_one'
                ]
            ]
        );
        



        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();

        ?>

        <script>
            jQuery(document).ready(function($) {

                jQuery('.popup-video').magnificPopup({
                    type: 'iframe'
                });

            });
        </script>


        <?php if ($settings['style_select'] == 'style_one') : ?>
            <div class="real-estate-video colthing-bg d-center position-relative overflow-hidden" style="background-image: url('<?php echo esc_url($settings['image']['url']); ?>');">
                <div class="real-vid position-relative">
                    <a href="<?php echo esc_url($settings['video_link']['url']); ?>" class="popup-video real-play d-center">
                        <i class="fa-solid fa-play n0-clr fs-three"></i>
                    </a>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/icon/rotarion-circle.png" alt="img" class="real-play-circle">
                </div>
            </div>
        <?php endif; ?>


        <?php if ($settings['style_select'] == 'style_two') : ?>
            <div class="vedio-icone">
                <a class="popup-video video-play-button play-video" href="<?php echo esc_url($settings['video_link']['url']); ?>">
                    <span></span>
                </a>
              
            </div>
        <?php endif; ?>





<?php
    }
}

$widgets_manager->register(new FT_Video());
