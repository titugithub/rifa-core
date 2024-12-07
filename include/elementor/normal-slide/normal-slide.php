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


class FT_Slide_Normal extends Widget_Base
{


    public function get_name()
    {
        return 'ft-slide-normal';
    }


    public function get_title()
    {
        return __('FT Slide Normal', 'rifa-core');
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


        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Default description', 'rifa-core'),
            ]
        );

        $repeater->add_control(
            'name',
            [
                'label' => esc_html__('Name', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Masud Rana', 'rifa-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'meta',
            [
                'label' => esc_html__('Meta', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Meta Data', 'rifa-core'),
                'label_block' => true,
            ]
        );




   
        $repeater->add_control(
            'rating',
            [
                'label' => esc_html__('Rating', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 5,
                'step' => 1,
                'default' => 5,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );



        $this->add_control(
            'list_repeater',
            [
                'label' => esc_html__('Testimonial List', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'name' => esc_html__('Masud Rana', 'rifa-core'),
                        'description' => esc_html__('Item content. Click the edit button to change this text.', 'rifa-core'),
                    ],

                ],
                'title_field' => '{{{ name }}}',
            ]
        );



        $this->end_controls_section();


        $this->start_controls_section(
            'slider_setting',
            [
                'label' => esc_html__('Slider Setting', 'rifa-core')
            ]
        );


        // Add control for enabling/disabling loop
        $this->add_control(
            'swiper_loop',
            [
                'label' => esc_html__('Enable Loop', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'rifa-core'),
                'label_off' => esc_html__('No', 'rifa-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        // Add control for enabling/disabling autoplay
        $this->add_control(
            'swiper_autoplay',
            [
                'label' => esc_html__('Enable Autoplay', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'rifa-core'),
                'label_off' => esc_html__('No', 'rifa-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        // Add control for enabling/disabling dot pagination
        $this->add_control(
            'swiper_pagination',
            [
                'label' => esc_html__('Enable Pagination', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'rifa-core'),
                'label_off' => esc_html__('No', 'rifa-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );



        // Add control for space between slides
        $this->add_control(
            'space_between_slides',
            [
                'label' => esc_html__('Space Between Slides (px)', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 40,
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ]
        );


        // Control for slides per view on desktop
        $this->add_control(
            'slides_per_view_desktop',
            [
                'label' => esc_html__('Slides per View (Desktop)', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3, // Set default value
            ]
        );

        // Control for slides per view on tablet
        $this->add_control(
            'slides_per_view_tablet',
            [
                'label' => esc_html__('Slides per View (Tablet)', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 2, // Set default value
            ]
        );

        // Control for slides per view on mobile
        $this->add_control(
            'slides_per_view_mobile',
            [
                'label' => esc_html__('Slides per View (Mobile)', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 1, // Set default value
            ]
        );

        // Control for space between slides
        $this->add_control(
            'space_between_slides',
            [
                'label' => esc_html__('Space Between Slides (px)', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 40,
            ]
        );


        $this->end_controls_section();

        // ====================Style========================//

        $this->start_controls_section(
             'image_style',
             [
                'label' => esc_html__('Image', 'rifa-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_responsive_control(
            'imagestyle_height',
            [
                'label'       => esc_html__('Height', 'rifa-core'),
                'type'        => Controls_Manager::SLIDER,
                'size_units'  => ['px', '%'],  // Allow px and percentage units
                'description' => esc_html__('Choose height in px or %', 'rifa-core'),
                'selectors'   => [
                    '{{WRAPPER}} .ft-image' => 'height: {{SIZE}}{{UNIT}};', // Dynamic unit
                ],
                'default'     => [
                    'unit'  => 'px',  // Default unit is px
                  
                ],
            ]
        );
        
        $this->add_responsive_control(
            'imagestyle_width',
            [
                'label'       => esc_html__('Width', 'rifa-core'),
                'type'        => Controls_Manager::SLIDER,
                'size_units'  => ['px', '%'],  // Allow px and percentage units
                'description' => esc_html__('Choose width in px or %', 'rifa-core'),
                'selectors'   => [
                    '{{WRAPPER}} .ft-image' => 'width: {{SIZE}}{{UNIT}};', // Dynamic unit
                ],
                'default'     => [
                    'unit'  => 'px',  // Default unit is px
                   
                ],
            ]
        );
        
        $this->add_responsive_control(
            'imagestyle_border_radius',
            [
                'label'      => __('Border Radius', 'rifa-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ft-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'des_style',
             [
                'label' => esc_html__('Description', 'rifa-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'description_typ',
                'selector' => '{{WRAPPER}} .ft-description',
        
            ]
        );
        
        $this->add_control(
            'description_color',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-description' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'description_margin',
            [
                'label' => esc_html__( 'Margin', 'rifa-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ft-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'description_padding',
            [
                'label'      => __('Padding', 'rifa-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ft-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );
        
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'name_style',
             [
                'label' => esc_html__('Name', 'rifa-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'name_typ',
                'selector' => '{{WRAPPER}} .ft-name',
        
            ]
        );
        
        $this->add_control(
            'name_color',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-name' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'name_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-name:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'name_margin',
            [
                'label' => esc_html__( 'Margin', 'rifa-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ft-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'name_padding',
            [
                'label'      => __('Padding', 'rifa-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ft-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'meta_style',
             [
                'label' => esc_html__('Meta', 'rifa-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'ft-_typ',
                'selector' => '{{WRAPPER}} .ft-meta',
        
            ]
        );
        
        $this->add_control(
            'ft-_color',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-meta' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'ft-_margin',
            [
                'label' => esc_html__( 'Margin', 'rifa-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ft-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'ft-_padding',
            [
                'label'      => __('Padding', 'rifa-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ft-meta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'rating_style',
             [
                'label' => esc_html__('Rating', 'rifa-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_control(
            'active_color',
            [
                'label' => esc_html__( 'Active Color', 'rifa-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-rate' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        
        $this->add_control(
            'noactive_color',
            [
                'label' => esc_html__( 'Non Active Color', 'rifa-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .no-rate' => 'color: {{VALUE}} !important',
                ],
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
                var swiper = new Swiper(".testimonial_swiper", {
                    loop: <?php echo $settings['swiper_loop'] === 'yes' ? 'true' : 'false'; ?>,
                    speed: 2000,
                    autoplay: <?php echo $settings['swiper_autoplay'] === 'yes' ? '{ delay: 3000, disableOnInteraction: false }' : 'false'; ?>,
                    pagination: <?php echo $settings['swiper_pagination'] === 'yes' ? '{ el: ".swiper-pagination", clickable: true }' : 'false'; ?>,
                    spaceBetween: <?php echo esc_js($settings['space_between_slides']); ?>, // Space between slides

                    // Breakpoints for responsive slides per view
                    breakpoints: {
                        // when window width is >= 320px
                        320: {
                            slidesPerView: <?php echo esc_js($settings['slides_per_view_mobile']); ?>, // Mobile
                        },
                        // when window width is >= 768px
                        768: {
                            slidesPerView: <?php echo esc_js($settings['slides_per_view_tablet']); ?>, // Tablet
                        },
                        // when window width is >= 1024px
                        1024: {
                            slidesPerView: <?php echo esc_js($settings['slides_per_view_desktop']); ?>, // Desktop
                        }
                    }
                });
            });
        </script>







        <section class="ft-testimonial-one te  position-relative z-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="swiper testimonial_swiper">
                            <div class="swiper-wrapper">

                                <?php foreach ($settings['list_repeater'] as $item) : ?>
                                    <div class="swiper-slide d-flex justify-content-center">
                                        <div class="col-lg-10 col-xl-8 col-xxl-6">
                                            <div class="testimonial__par text-center">

                                                <div class="author_thumbs">
                                                    <?php if (!empty($item['image']['url'])) :   ?>
                                                        <img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr('image') ?>" class="ft-image rounded-circle ">
                                                    <?php endif ?>
                                                </div>
                                                <div class="author_content">
                                                    <p class="ft-description fs-six-up mt-5 mt-xxl-6">
                                                        <?php if (!empty($item['description'])) :   ?>
                                                            <?php echo wp_kses($item['description'], wp_kses_allowed_html('post'))  ?>
                                                        <?php endif ?>
                                                    </p>
                                                    <?php if (!empty($item['name'])) :   ?>
                                                        <h5 class="ft-name heading p1-color mt-5"><?php echo esc_html($item['name']) ?></h5>
                                                    <?php endif ?>
                                                    <span class="ft-meta fs-eight fw_500 mt-2">
                                                        <?php if (!empty($item['meta'])) :   ?>
                                                            <?php echo esc_html($item['meta']) ?>
                                                        <?php endif ?>
                                                    </span>
                                                    <ul class="rating d-flex justify-content-center">
                                                        <?php
                                                                    // Get the rating from the repeater
                                                                    $rating_value = !empty($item['rating']) ? intval($item['rating']) : 0;

                                                                    // Loop for full stars
                                                                    for ($i = 1; $i <= 5; $i++) {
                                                                        if ($i <= $rating_value) {
                                                                            echo '<li class="star-rate"><i class="fa fa-star" aria-hidden="true"></i></li>';
                                                                        } else {
                                                                            echo '<li class="no-rate"><i class="fa fa-star" aria-hidden="true"></i></li>';
                                                                        }
                                                                    }
                                                                    ?>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>


                            </div>
                            <div class="swiper-pagination mt-8 mt-md-10 mt-lg-15"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>










<?php
    }
}

$widgets_manager->register(new FT_Slide_Normal());
