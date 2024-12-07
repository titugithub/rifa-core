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

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class FT_Services extends Widget_Base
{


    public function get_name()
    {
        return 'ft-services-post';
    }


    public function get_title()
    {
        return __('FT Services Post', 'rifa-core');
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

    function get_post_list_by_post_type($post_type)
    {
        $return_val = [];
        $args       = array(
            'post_type'      => $post_type,
            'posts_per_page' => -1,
            'post_status'      => 'publish',
        );
        $all_post   = new \WP_Query($args);

        while ($all_post->have_posts()) {
            $all_post->the_post();
            $return_val[get_the_ID()] = get_the_title();
        }
        wp_reset_query();
        return $return_val;
    }

    function get_all_post_key($post_type)
    {
        $return_val = [];
      
    }


    protected function register_controls()
    {

        // ======================Content================================//

        //General Section
        $this->start_controls_section(
            'blog_section_genaral',
            [
                'label' => esc_html__('General', 'rifa-core')
            ]
        );


        $this->add_control(
            'blog_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'rifa-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 2,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'post_select',
            [
                'label' => __('Select Posts', 'turio-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options' => $this->get_post_list_by_post_type('post'),
                'default'     => [],
            ]
        );



        $this->add_control(
            'post_offset',
            [
                'label' => esc_html__('Offset', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'blog_title_show',
            [
                'label' => esc_html__('Show Title Limit', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('20', 'rifa-core'),
                'separator' => 'before',

            ]
        );

        $this->add_control(
            'blog_word_show',
            [
                'label' => esc_html__('Show Content Limit', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('20', 'rifa-core'),
                'separator' => 'before',

            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ],
                'separator' => 'before',
            ]
        );




        $this->add_control(
            'blog_template_orderby',
            [
                'label'   => esc_html__('Order By', 'rifa-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ID',
                'options' => [
                    'ID'         => esc_html__('Post Id', 'rifa-core'),
                    'author'     => esc_html__('Post Author', 'rifa-core'),
                    'title'      => esc_html__('Title', 'rifa-core'),
                    'post_date'  => esc_html__('Date', 'rifa-core'),
                    'rand'       => esc_html__('Random', 'rifa-core'),
                    'menu_order' => esc_html__('Menu Order', 'rifa-core'),
                ],
            ]
        );
        $this->add_control(
            'blog_template_order',
            [
                'label'   => esc_html__('Order', 'rifa-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'asc'  => esc_html__('Ascending', 'rifa-core'),
                    'desc' => esc_html__('Descending', 'rifa-core')
                ],
                'default' => 'desc',
            ]
        );


        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'rifa-core'),

            ]
        );




        $this->end_controls_section();



        $this->start_controls_section(
            'options_content',
            [
                'label' => esc_html__('Options', 'rifa-core')
            ]
        );

        $this->add_control(
            'cat_show',
            [
                'label' => esc_html__('Show Category', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'rifa-core'),
                'label_off' => esc_html__('Hide', 'rifa-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );



        $this->add_control(
            'date_show',
            [
                'label' => esc_html__('Show Date', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'rifa-core'),
                'label_off' => esc_html__('Hide', 'rifa-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'author_show',
            [
                'label' => esc_html__('Show Author', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'rifa-core'),
                'label_off' => esc_html__('Hide', 'rifa-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'description_show',
            [
                'label' => esc_html__('Show Description', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'rifa-core'),
                'label_off' => esc_html__('Hide', 'rifa-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'button_show',
            [
                'label' => esc_html__('Show Button', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'rifa-core'),
                'label_off' => esc_html__('Hide', 'rifa-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );




        $this->end_controls_section();





        $this->start_controls_section(
            'columns',
            [
                'label' => esc_html__('Number of Responsive Columns', 'rifa-core')
            ]
        );

        $this->add_control(
            'col_lg',
            [
                'label'   => esc_html__('Desktops: > 1199px', 'rifa-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    '6'  => esc_html__('2 Columns', 'rifa-core'),
                    '4'  => esc_html__('3 Columns', 'rifa-core'),
                    '3'  => esc_html__('4 Columns', 'rifa-core'),
                    '12' => esc_html__('1 Column', 'rifa-core'),
                ],
                'default' => '4', // Default to 3 Columns for large desktops
            ]
        );

        $this->add_control(
            'col_md',
            [
                'label'   => esc_html__('Desktops: > 991px', 'rifa-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    '6'  => esc_html__('2 Columns', 'rifa-core'),
                    '4'  => esc_html__('3 Columns', 'rifa-core'),
                    '3'  => esc_html__('4 Columns', 'rifa-core'),
                    '12' => esc_html__('1 Column', 'rifa-core'),
                ],
                'default' => '4', // Default to 3 Columns for desktops
            ]
        );

        $this->add_control(
            'col_sm',
            [
                'label'   => esc_html__('Tablets: > 767px', 'rifa-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    '6'  => esc_html__('2 Columns', 'rifa-core'),
                    '4'  => esc_html__('3 Columns', 'rifa-core'),
                    '3'  => esc_html__('4 Columns', 'rifa-core'),
                    '12' => esc_html__('1 Column', 'rifa-core'),
                ],
                'default' => '6', // Default to 2 Columns for tablets
            ]
        );

        $this->add_control(
            'col_xs',
            [
                'label'   => esc_html__('Phones: < 768px', 'rifa-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    '6'  => esc_html__('2 Columns', 'rifa-core'),
                    '12' => esc_html__('1 Column', 'rifa-core'),
                ],
                'default' => '12', // Default to 1 Column for phones
            ]
        );

        $this->add_control(
            'col_mobile',
            [
                'label'   => esc_html__('Small Phones: < 480px', 'rifa-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    '6'  => esc_html__('2 Columns', 'rifa-core'),
                    '12' => esc_html__('1 Column', 'rifa-core'),
                ],
                'default' => '12', // Default to 1 Column for small phones
            ]
        );



        $this->end_controls_section();




        // =======================Style=================================//


        $this->start_controls_section(
             'imagestyle',
             [
                'label' => esc_html__('image', 'rifa-core'),
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
             'cat_style',
             [
                'label' => esc_html__('Category', 'rifa-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'cat_styler_typ',
                'selector' => '{{WRAPPER}} .ft-category',
        
            ]
        );
        
        $this->add_control(
            'cat_styler_color',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-category' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'cat_styler_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-category:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'cat_styler_color_background',
            [
                'label'     => esc_html__('Background Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-category' => 'background: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'cat_styler_color_border',
            [
                'label'     => esc_html__('Border Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-category' => 'border-color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'cat_styler_margin',
            [
                'label' => esc_html__( 'Margin', 'rifa-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ft-category' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'cat_styler_padding',
            [
                'label'      => __('Padding', 'rifa-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ft-category' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
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
        $this->add_control(
            'title_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-title:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'title_color_hover_background',
            [
                'label'     => esc_html__('Background Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-card:hover .ft-title' => 'color: {{VALUE}} !important;',
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
             'date-style',
             [
                'label' => esc_html__('Date', 'rifa-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'date-style_typ',
                'selector' => '{{WRAPPER}} .ft-date',
        
            ]
        );
        
        $this->add_control(
            'date-style_color',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-date' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'date-style_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-date:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'date-style_color_hover_background',
            [
                'label'     => esc_html__('Background Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-card:hover .ft-date' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'date-style_margin',
            [
                'label' => esc_html__( 'Margin', 'rifa-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ft-date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'date-style_padding',
            [
                'label'      => __('Padding', 'rifa-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ft-date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'author_style',
             [
                'label' => esc_html__('Author', 'rifa-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'author_style_typ',
                'selector' => '{{WRAPPER}} .ft-author',
        
            ]
        );
        
        $this->add_control(
            'author_style_color',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-author' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        
        $this->add_control(
            'author_style_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-author:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        
        $this->add_control(
            'author_style_color_hover_background',
            [
                'label'     => esc_html__('Background Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-card:hover .ft-author' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'author_style_margin',
            [
                'label' => esc_html__( 'Margin', 'rifa-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ft-author' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'author_style_padding',
            [
                'label'      => __('Padding', 'rifa-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ft-author' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );
        
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'desc_style',
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
        
        $this->add_control(
            'description_color_hover_background',
            [
                'label'     => esc_html__('Hover Background Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-card:hover .ft-description' => 'color: {{VALUE}} !important;',
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
             'button_style',
             [
                'label' => esc_html__('Button', 'rifa-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'button_style_typ',
                'selector' => '{{WRAPPER}} .ft-button',
        
            ]
        );
        
        $this->add_control(
            'button_style_color',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-button' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        
        $this->add_control(
            'button_style_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-button:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        
        $this->add_control(
            'button_style_color_hover_background',
            [
                'label'     => esc_html__('Background Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-card:hover .ft-button' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_style_margin',
            [
                'label' => esc_html__( 'Margin', 'rifa-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ft-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'button_style_padding',
            [
                'label'      => __('Padding', 'rifa-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ft-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );
        
        
        $this->end_controls_section();

        $this->start_controls_section(
             'card_style',
             [
                'label' => esc_html__('Content Card', 'rifa-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
             ]
        );
        
        
        $this->add_control(
            'card_style_color',
            [
                'label' => esc_html__( 'Background', 'rifa-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-card' => 'background: {{VALUE}} !important',
                ],
            ]
        );
        
        $this->add_control(
            'card_style_color_hover',
            [
                'label' => esc_html__( 'Hover Background', 'rifa-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-card:hover' => 'background: {{VALUE}} !important',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'card_style_padding',
            [
                'label'      => __('Padding', 'rifa-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ft-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );
        
        
        $this->end_controls_section();


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
        $query = new \WP_Query(
            array(
                'post_type'      => 'services',
                'posts_per_page' => $settings['blog_posts_per_page'],
                'orderby'        => $settings['blog_template_orderby'],
                'order'          => $settings['blog_template_order'],
                'offset'         => $settings['post_offset'],
                'post_status'    => 'publish',
                'post__in'       => $settings['post_select'],
            )
        );

        ?>



        <section class="latest-articles">
            <div class="overlay">
                <div class="container wow fadeInUp">
                    <div class="row cus-mar">
                        <?php
                                if ($query->have_posts()) {
                                    while ($query->have_posts()) {
                                        $query->the_post();
                                        $col_class = "col-lg-{$settings['col_lg']} col-md-{$settings['col_md']} col-sm-{$settings['col_sm']} col-xs-{$settings['col_xs']}";
                                        ?>
                                <div class="<?php echo esc_attr($col_class); ?>">
                                    <div class="ft-blogone">
                                        <div class="blog_news__card nb3-bg cus-rounded-1 overflow-hidden">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <div class="blog_news__thumbs position-relative">
                                                    <?php
                                                                        the_post_thumbnail(
                                                                            $settings['thumbnail_size'], // Image size dynamically from Elementor settings
                                                                            [
                                                                                'class' => 'ft-image', // Add custom class
                                                                                'alt'   => esc_attr('image') // Add alt text
                                                                            ]
                                                                        );
                                                                        ?>

                                                    <?php
                                                                        $categories = get_the_category();

                                                                        // Check if the post has categories
                                                                        if (!empty($categories)) {
                                                                            // Get the first category
                                                                            $first_category = $categories[0];

                                                                            // Generate the category link and name
                                                                            $category_link = get_category_link($first_category->term_id);
                                                                            $category_name = $first_category->name;
                                                                            ?>

                                                        <?php if (!empty($settings['cat_show'] == 'yes')) :   ?>
                                                            <a href="<?php echo esc_url($category_link); ?>" class="ft-category border border-color second nw1-color fs-seven rounded-3 position-absolute top-0 end-0 py-1 px-3 mt-5 me-5">
                                                                <?php echo esc_html($category_name); ?>
                                                            </a>
                                                        <?php endif ?>

                                                    <?php } ?>
                                                </div>
                                            <?php endif; ?>

                                            <div class="ft-card blog_news__content py-6 py-lg-7 py-xxl-8 px-4 px-lg-5 px-xxl-6">
                                                <a href="<?php the_permalink(); ?>">
                                                    <h5 class="ft-title mb-4 mb-lg-5">
                                                        <?php
                                                                        // Get the value of the custom control 'blog_title_show'
                                                                        $title_word_limit = !empty($settings['blog_title_show']) ? intval($settings['blog_title_show']) : 20; // Default to 20 if not set

                                                                        // Get the post title and limit the words
                                                                        $title = wp_trim_words(get_the_title(), $title_word_limit);

                                                                        // Output the trimmed title
                                                                        echo esc_html($title);
                                                                        ?>
                                                    </h5>
                                                </a>

                                                <div class="ft-date fs-seven fw_500 d-flex row-gap-0 flex-wrap gap-3 mb-4 mb-lg-5">

                                                    <?php if (!empty($settings['date_show'] == 'yes')) :   ?>
                                                        <?php echo get_the_date(); ?>
                                                    <?php endif ?>

                                                    <span>|</span> Written by

                                                    <?php if (!empty($settings['author_show'] == 'yes')) :   ?>
                                                        <?php the_author(); ?>
                                                    <?php endif ?>
                                                </div>

                                                <?php if (!empty($settings['description_show'] == 'yes')) :   ?>
                                                    <p class="ft-description">
                                                        <?php
                                                                            $word_limit = !empty($settings['blog_word_show']) ? intval($settings['blog_word_show']) : 20; // Default to 20 if not set
                                                                            $excerpt = wp_trim_words(get_the_excerpt(), $word_limit);
                                                                            echo esc_html($excerpt);
                                                                            ?>
                                                    </p>
                                                <?php endif ?>

                                                <?php if (!empty($settings['button_show'] == 'yes')) :   ?>
                                                    <?php if (!empty($settings['button_text'])) :   ?>
                                                        <a href="<?php the_permalink(); ?>" class="ft-button link fs-five fw-semibold d-flex gap-2 gap-lg-3 align-items-center mt-6 mt-lg-8">
                                                            <?php echo wp_kses($settings['button_text'], wp_kses_allowed_html('post'))  ?>
                                                            <i class="ft-button-icon fas fa-arrow-right mt-1 "></i>
                                                        </a>
                                                    <?php endif ?>
                                                <?php endif ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                                    }
                                }
                                wp_reset_postdata();
                                ?>
                    </div>
                </div>
            </div>
        </section>







<?php
    }
}

$widgets_manager->register(new FT_Services());
