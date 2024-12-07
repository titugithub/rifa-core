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


class FT_Image_Paralax extends Widget_Base
{


    public function get_name()
    {
        return 'ft-image-paralax';
    }


    public function get_title()
    {
        return __('FT Image Paralax', 'rifa-core');
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
            '_section_logo',
            [
                'label' => esc_html__('Image Settings', 'rtelements'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'images_translate',
            [
                'label'   => esc_html__('Translate Position', 'rtelements'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'horizontal',
                'options' => [

                    'horizontal' => esc_html__('Horizontal', 'rtelements'),
                    'veritcal' => esc_html__('Veritcal', 'rtelements'),
                  
                ],

            ]
        );

        $this->add_control(
            'first_image',
            [
                'label' => esc_html__('Choose Image', 'rtelements'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'separator' => 'before',
            ]
        );



        $this->add_control(
            'stitle',
            [
                'label' => esc_html__('Title', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('80+', 'rifa-core'),
                'placeholder' => esc_html__('Type your title here', 'rifa-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'ssubtitle',
            [
                'label' => esc_html__('Sub Title', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Years Experience', 'rifa-core'),
                'placeholder' => esc_html__('Type your sub title here', 'rifa-core'),
                'label_block' => true,
            ]
        );


     
        $this->add_responsive_control(
            'content_left',
            [
                'label' => esc_html__('Content Left Position', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .experiencea-area' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
     


     

        $this->add_responsive_control(
            'content_bottom',
            [
                'label' => esc_html__('Content Bottom Position', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .experiencea-area' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );



        $this->end_controls_section();


        // ======================Style=========================//

        $this->start_controls_section(
             'image_style',
             [
                'label' => esc_html__('Image', 'rifa-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_responsive_control(
            'image_style_height',
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
            'image_style_width',
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
            'image_style_border_radius',
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
             'Subtitle_style',
             [
                'label' => esc_html__('Subtitle', 'rifa-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'subtitle_typ',
                'selector' => '{{WRAPPER}} .ft-subtitle',
        
            ]
        );
        
        $this->add_control(
            'subtitle_color',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-subtitle' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'subtitle_margin',
            [
                'label' => esc_html__( 'Margin', 'rifa-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ft-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'subtitle_padding',
            [
                'label'      => __('Padding', 'rifa-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ft-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );
        
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'title_style',
             [
                'label' => esc_html__('Title', 'rifa-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'title_typ',
                'selector' => '{{WRAPPER}} .ft-title',
        
            ]
        );
        
        $this->add_control(
            'title_color',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-title' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__( 'Margin', 'rifa-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ft-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'title_padding',
            [
                'label'      => __('Padding', 'rifa-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ft-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );
        
        
        
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'card_style',
             [
                'label' => esc_html__('Card', 'rifa-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_control(
            'card_color',
            [
                'label' => esc_html__( 'Color', 'rifa-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-card' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'card_color_border',
            [
                'label' => esc_html__( 'Border Color', 'rifa-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-card' => 'border:1px solid {{VALUE}} !important',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_padding',
            [
                'label'      => __('Padding', 'rifa-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ft-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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

                // Register ScrollTrigger plugin with GSAP
                gsap.registerPlugin(ScrollTrigger);

                if ($('.react-parallax-image').length) {
                    gsap.to(".react-parallax-image", {
                        scrollTrigger: {
                            start: "top bottom",
                            end: "bottom top",
                            scrub: 1,
                            markers: true // Add markers to debug the start and end points
                        },
                        x: -250,
                    });
                }

                if ($('.react-parallax-image2').length) {

                    gsap.to(".react-parallax-image2", {
                        scrollTrigger: {
                            // trigger: ".images",
                            start: "top bottom",
                            end: "bottom top",
                            scrub: 1,
                            // markers: true
                        },
                        y: -250,
                    });
                }

            });
        </script>





        <?php if ($settings['images_translate'] == 'horizontal') : ?>

            <div class="rt-image">
                <?php if (!empty($settings['first_image']['url'])) : ?>
                    <img class="ft-image react-parallax-image" src="<?php echo esc_url($settings['first_image']['url']); ?>" alt="image" />
                <?php endif; ?>
                <?php if (!empty($settings['stitle']) || !empty($settings['ssubtitle'])) : ?>
                    <div class="ft-card experiencea-area images react-parallax-image">
                        <?php if (!empty($settings['stitle'])) :   ?>
                            <h3 class="ft-subtitle title"><?php echo esc_html($settings['stitle']) ?></h3>
                        <?php endif ?>
                        <?php if (!empty($settings['ssubtitle'])) :   ?>
                            <p class="ft-title"><?php echo esc_html($settings['ssubtitle']) ?></p>
                        <?php endif ?>
                    </div>
                <?php endif ?>
            </div>

        <?php endif; ?>




        <?php if ($settings['images_translate'] == 'veritcal') : ?>
            <div class="rt-image">
                <?php if (!empty($settings['first_image']['url'])) : ?>
                    <img class="ft-imagereact-parallax-image2" src="<?php echo esc_url($settings['first_image']['url']); ?>" alt="image" />
                <?php endif; ?>
                <?php if (!empty($settings['stitle']) || !empty($settings['ssubtitle'])) : ?>
                    <div class="ft-card experiencea-area images react-parallax-image2 ">
                        <?php if (!empty($settings['stitle'])) :   ?>
                            <h3 class="ft-subtitle title"><?php echo esc_html($settings['stitle']) ?></h3>
                        <?php endif ?>
                        <?php if (!empty($settings['ssubtitle'])) :   ?>
                            <p class="ft-title"><?php echo esc_html($settings['ssubtitle']) ?></p>
                        <?php endif ?>
                    </div>
                <?php endif ?>
            </div>
        <?php endif; ?>








<?php
    }
}

$widgets_manager->register(new FT_Image_Paralax());
