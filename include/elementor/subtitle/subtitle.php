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
class FT_Subtitle extends Widget_Base
{

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
        return 'ft-subtitle';
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
        return __('FT Subtitle', 'rifa-core');
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


        //General Section
        $this->start_controls_section(
            'subtitle_one_section_genaral',
            [
                'label' => esc_html__('General', 'rifa-core')
            ]
        );

        $this->add_control(
            'style',
            [
                'label'   => esc_html__('Select Style', 'rifa-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'rifa-core'),
                    'style_two' => esc_html__('Style Two', 'rifa-core'),
                  
                ],
                'default' => 'style_one',
            ]
        );


        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default subtitle', 'rifa-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'rifa-core'),
                'label_block' => true,
            ]
        );


        $this->add_responsive_control(
            'subtitle_content_text_align',
            [
                'label'         => esc_html__('Text Align', 'rifa-core'),
                'type'             => \Elementor\Controls_Manager::CHOOSE,
                'options'         => [
                    'start'         => [
                        'title' => esc_html__('Left', 'rifa-core'),
                        'icon'     => 'eicon-text-align-left',
                    ],
                    'center'     => [
                        'title' => esc_html__('Center', 'rifa-core'),
                        'icon'     => 'eicon-text-align-center',
                    ],
                    'end'     => [
                        'title' => esc_html__('Right', 'rifa-core'),
                        'icon'     => 'eicon-text-align-right',
                    ],
                ],
                'default'         => 'left',
             
                'selectors'     => [
                    '{{WRAPPER}} .ft-subtitle' => 'text-align: {{VALUE}};',
                  
                ],
            ]
        );

        $this->end_controls_section();

        // =======================Style=================================//

        $this->start_controls_section(
             'subtitle_style',
             [
                'label' => esc_html__('Subtitle', 'rifa-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'subtitle_style_typ',
                'selector' => '{{WRAPPER}} .ft-subtitle',
        
            ]
        );
        
        $this->add_control(
            'subtitle_style_color',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'subtitle_style_color',
            [
                'label'     => esc_html__('HoverColor', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-subtitle:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'subtitle_style_margin',
            [
                'label' => esc_html__( 'Margin', 'rifa-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ft-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'subtitle_style_padding',
            [
                'label'      => __('Padding', 'rifa-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ft-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        
        
        
        $this->end_controls_section();


      
    }


    protected function style_tab_content(){




      
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

        ?>




        <?php if ($settings['style'] == 'style_one') : ?>
           
                <?php if (!empty($settings['subtitle'])) :   ?>
                    <h4 class="ft-subtitle "><?php echo wp_kses($settings['subtitle'], wp_kses_allowed_html('post'))  ?></h4>
                <?php endif ?>
           
        <?php endif ?>


        <?php if ($settings['style'] == 'style_two') : ?>
           
                <?php if (!empty($settings['subtitle'])) :   ?>
                    <h4 class="ft-subtitle "><?php echo wp_kses($settings['subtitle'], wp_kses_allowed_html('post'))  ?></h4>
                <?php endif ?>
           
        <?php endif ?>









<?php
    }
}

$widgets_manager->register(new FT_Subtitle());
