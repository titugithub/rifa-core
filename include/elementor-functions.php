<?php

namespace FTCore\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Base;
use Elementor\REPEA;
use \Elementor\Utils;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use FTCore\Elementor\Controls\Group_Control_TPBGGradient;
use FTCore\Elementor\Controls\Group_Control_TPGradient;


/**
 * Element Common Functions
 */
trait FTCoreElementFunctions
{

    /**
     * @param null $control_id
     * @param string $control_name
     * @param string $selector
     */



    /*====================Subtitle==========================*/


    protected function subtitle($control_id = null, $control_name = null, $control_selector = null)
    {


        $this->start_controls_section(
            'ft_' . $control_id . '_subtitle',
            [
                'label' => esc_html($control_name), // Directly escape the dynamic control name
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [

                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'subtitle_' . $control_id . '_typ',
                'selector' => "{{WRAPPER}} .title{$control_id}", // Concatenate $control_id if needed for selector
            ]
        );


        $this->add_control(
            'subtitle' . $control_id . '_color',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'color: {{VALUE}} !important;',
                ],
            ]
        );


        $this->add_control(
            'subtitle' . $control_id . '_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector:hover" => 'color: {{VALUE}} !important;',
                ],
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_margin',
            [
                'label' => esc_html__('Margin', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_padding',
            [
                'label' => esc_html__('Padding', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );


        $this->end_controls_section();
    }



    
    /*====================Subtitle Two==========================*/


    protected function subtitle2($control_id = null, $control_name = null, $control_selector = null)
    {


        $this->start_controls_section(
            'ft_' . $control_id . '_subtitle2',
            [
                'label' => esc_html($control_name), // Directly escape the dynamic control name
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [

                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'subtitle2_' . $control_id . '_typ',
                'selector' => "{{WRAPPER}} .title{$control_id}", // Concatenate $control_id if needed for selector
            ]
        );


        $this->add_control(
            'subtitle2' . $control_id . '_color',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'color: {{VALUE}} !important;',
                ],
            ]
        );


        $this->add_control(
            'subtitle2' . $control_id . '_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector:hover" => 'color: {{VALUE}} !important;',
                ],
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_margin2',
            [
                'label' => esc_html__('Margin', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_padding2',
            [
                'label' => esc_html__('Padding', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );


        $this->end_controls_section();
    }


    
    /*====================Title==========================*/


    protected function title($control_id = null, $control_name = null, $control_selector = null)
    {


        $this->start_controls_section(
            'ft_' . $control_id . '_title',
            [
                'label' => esc_html($control_name), // Directly escape the dynamic control name
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [

                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'subtitle_' . $control_id . '_typ',
                'selector' => "{{WRAPPER}} .title{$control_id}", // Concatenate $control_id if needed for selector
            ]
        );


        $this->add_control(
            'subtitle' . $control_id . '_color',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'color: {{VALUE}} !important;',
                ],
            ]
        );


        $this->add_control(
            'subtitle' . $control_id . '_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector:hover" => 'color: {{VALUE}} !important;',
                ],
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_margin',
            [
                'label' => esc_html__('Margin', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_padding',
            [
                'label' => esc_html__('Padding', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );


        $this->end_controls_section();
    }

    
    /*====================Title Two==========================*/


    protected function title2($control_id = null, $control_name = null, $control_selector = null)
    {


        $this->start_controls_section(
            'ft_' . $control_id . '_title2',
            [
                'label' => esc_html($control_name), // Directly escape the dynamic control name
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [

                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'subtitle_' . $control_id . '_typ',
                'selector' => "{{WRAPPER}} .title{$control_id}", // Concatenate $control_id if needed for selector
            ]
        );


        $this->add_control(
            'subtitle' . $control_id . '_color',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'color: {{VALUE}} !important;',
                ],
            ]
        );


        $this->add_control(
            'subtitle' . $control_id . '_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector:hover" => 'color: {{VALUE}} !important;',
                ],
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_margin',
            [
                'label' => esc_html__('Margin', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_padding',
            [
                'label' => esc_html__('Padding', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );


        $this->end_controls_section();
    }

    
    /*====================Title Three==========================*/


    protected function title3($control_id = null, $control_name = null, $control_selector = null)
    {


        $this->start_controls_section(
            'ft_' . $control_id . '_title3',
            [
                'label' => esc_html($control_name), // Directly escape the dynamic control name
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [

                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'subtitle_' . $control_id . '_typ',
                'selector' => "{{WRAPPER}} .title{$control_id}", // Concatenate $control_id if needed for selector
            ]
        );


        $this->add_control(
            'subtitle' . $control_id . '_color',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'color: {{VALUE}} !important;',
                ],
            ]
        );


        $this->add_control(
            'subtitle' . $control_id . '_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector:hover" => 'color: {{VALUE}} !important;',
                ],
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_margin',
            [
                'label' => esc_html__('Margin', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_padding',
            [
                'label' => esc_html__('Padding', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );


        $this->end_controls_section();
    }

    
    /*====================Description==========================*/


    protected function description($control_id = null, $control_name = null, $control_selector = null)
    {


        $this->start_controls_section(
            'ft_' . $control_id . '_description',
            [
                'label' => esc_html($control_name), // Directly escape the dynamic control name
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [

                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'subtitle_' . $control_id . '_typ',
                'selector' => "{{WRAPPER}} .title{$control_id}", // Concatenate $control_id if needed for selector
            ]
        );


        $this->add_control(
            'subtitle' . $control_id . '_color',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'color: {{VALUE}} !important;',
                ],
            ]
        );


        $this->add_control(
            'subtitle' . $control_id . '_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector:hover" => 'color: {{VALUE}} !important;',
                ],
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_margin',
            [
                'label' => esc_html__('Margin', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_padding',
            [
                'label' => esc_html__('Padding', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );


        $this->end_controls_section();
    }

    
    /*====================Card==========================*/


    protected function card($control_id = null, $control_name = null, $control_selector = null)
    {


        $this->start_controls_section(
            'ft_' . $control_id . '_card',
            [
                'label' => esc_html($control_name), // Directly escape the dynamic control name
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );






        $this->add_control(
            'subtitle' . $control_id . '_color',
            [
                'label'     => esc_html__('Background', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'background: {{VALUE}} !important;',
                ],
            ]
        );


        $this->add_control(
            'subtitle' . $control_id . '_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector:hover" => 'background: {{VALUE}} !important;',
                ],
            ]
        );









        $this->add_responsive_control(
            'ft_' . $control_id . '_area_padding',
            [
                'label' => esc_html__('Padding', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );


        $this->end_controls_section();
    }















    
    /*====================Text One==========================*/


    protected function text1($control_id = null, $control_name = null, $control_selector = null)
    {


        $this->start_controls_section(
            'ft_' . $control_id . '_text1',
            [
                'label' => esc_html($control_name), // Directly escape the dynamic control name
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [

                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'subtitle_' . $control_id . '_typ',
                'selector' => "{{WRAPPER}} .title{$control_id}", // Concatenate $control_id if needed for selector
            ]
        );


        $this->add_control(
            'subtitle_' . $control_id . '_color_text1',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'color: {{VALUE}} !important;',
                ],
            ]
        );


        $this->add_control(
            'subtitle_' . $control_id . '_hover_color_text1',
            [
                'label'     => esc_html__('Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector:hover" => 'color: {{VALUE}} !important;',
                ],
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_margin',
            [
                'label' => esc_html__('Margin', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_padding',
            [
                'label' => esc_html__('Padding', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );


        $this->end_controls_section();
    }



    
    /*====================Text Two==========================*/


    protected function text2($control_id = null, $control_name = null, $control_selector = null)
    {


        $this->start_controls_section(
            'ft_' . $control_id . '_text2',
            [
                'label' => esc_html($control_name), // Directly escape the dynamic control name
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [

                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'subtitle_' . $control_id . '_typ',
                'selector' => "{{WRAPPER}} .title{$control_id}", // Concatenate $control_id if needed for selector
            ]
        );


        $this->add_control(
            'subtitle_' . $control_id . '_color_text2',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'color: {{VALUE}} !important;',
                ],
            ]
        );


        $this->add_control(
            'subtitle_' . $control_id . '_hover_color_text2',
            [
                'label'     => esc_html__('Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector:hover" => 'color: {{VALUE}} !important;',
                ],
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_margin',
            [
                'label' => esc_html__('Margin', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_padding',
            [
                'label' => esc_html__('Padding', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );


        $this->end_controls_section();
    }



    
    /*====================Text Three==========================*/


    protected function text3($control_id = null, $control_name = null, $control_selector = null)
    {


        $this->start_controls_section(
            'ft_' . $control_id . '_text3',
            [
                'label' => esc_html($control_name), // Directly escape the dynamic control name
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [

                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'subtitle_' . $control_id . '_typ',
                'selector' => "{{WRAPPER}} .title{$control_id}", // Concatenate $control_id if needed for selector
            ]
        );


        $this->add_control(
            'subtitle_' . $control_id . '_color_text3',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'color: {{VALUE}} !important;',
                ],
            ]
        );


        $this->add_control(
            'subtitle_' . $control_id . '_hover_color_text3',
            [
                'label'     => esc_html__('Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector:hover" => 'color: {{VALUE}} !important;',
                ],
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_margin',
            [
                'label' => esc_html__('Margin', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_padding',
            [
                'label' => esc_html__('Padding', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );


        $this->end_controls_section();
    }



    
    /*====================Text Four==========================*/


    protected function text4($control_id = null, $control_name = null, $control_selector = null)
    {


        $this->start_controls_section(
            'ft_' . $control_id . '_text4',
            [
                'label' => esc_html($control_name), // Directly escape the dynamic control name
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [

                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'subtitle_' . $control_id . '_typ',
                'selector' => "{{WRAPPER}} .title{$control_id}", // Concatenate $control_id if needed for selector
            ]
        );


        $this->add_control(
            'subtitle_' . $control_id . '_color_text4',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'color: {{VALUE}} !important;',
                ],
            ]
        );


        $this->add_control(
            'subtitle_' . $control_id . '_hover_color_text4',
            [
                'label'     => esc_html__('Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector:hover" => 'color: {{VALUE}} !important;',
                ],
            ]
        );


        


        $this->add_responsive_control(
            'ft_' . $control_id . '_area_margin',
            [
                'label' => esc_html__('Margin', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_padding',
            [
                'label' => esc_html__('Padding', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );


        $this->end_controls_section();
    }

    
    /*====================Text Five==========================*/


    protected function text5($control_id = null, $control_name = null, $control_selector = null)
    {


        $this->start_controls_section(
            'ft_' . $control_id . '_text5',
            [
                'label' => esc_html($control_name), // Directly escape the dynamic control name
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [

                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'subtitle_' . $control_id . '_typ',
                'selector' => "{{WRAPPER}} .title{$control_id}", // Concatenate $control_id if needed for selector
            ]
        );


        $this->add_control(
            'subtitle_' . $control_id . '_color_text5',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'color: {{VALUE}} !important;',
                ],
            ]
        );


        $this->add_control(
            'subtitle_' . $control_id . '_hover_color_text5',
            [
                'label'     => esc_html__('Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector:hover" => 'color: {{VALUE}} !important;',
                ],
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_margin',
            [
                'label' => esc_html__('Margin', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_padding',
            [
                'label' => esc_html__('Padding', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );


        $this->end_controls_section();
    }

    
    /*====================Text Six==========================*/


    protected function text6($control_id = null, $control_name = null, $control_selector = null)
    {


        $this->start_controls_section(
            'ft_' . $control_id . '_text6',
            [
                'label' => esc_html($control_name), // Directly escape the dynamic control name
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [

                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'subtitle_' . $control_id . '_typ',
                'selector' => "{{WRAPPER}} .title{$control_id}", // Concatenate $control_id if needed for selector
            ]
        );


        $this->add_control(
            'subtitle_' . $control_id . '_color_text6',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'color: {{VALUE}} !important;',
                ],
            ]
        );


        $this->add_control(
            'subtitle_' . $control_id . '_hover_color_text6',
            [
                'label'     => esc_html__('Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector:hover" => 'color: {{VALUE}} !important;',
                ],
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_margin',
            [
                'label' => esc_html__('Margin', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_padding',
            [
                'label' => esc_html__('Padding', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );


        $this->end_controls_section();
    }



    
    /*====================Text Seven==========================*/


    protected function text7($control_id = null, $control_name = null, $control_selector = null)
    {


        $this->start_controls_section(
            'ft_' . $control_id . '_text7',
            [
                'label' => esc_html($control_name), // Directly escape the dynamic control name
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [

                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'subtitle_' . $control_id . '_typ',
                'selector' => "{{WRAPPER}} .title{$control_id}", // Concatenate $control_id if needed for selector
            ]
        );


        $this->add_control(
            'subtitle_' . $control_id . '_color_text7',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'color: {{VALUE}} !important;',
                ],
            ]
        );


        $this->add_control(
            'subtitle_' . $control_id . '_hover_color_text7',
            [
                'label'     => esc_html__('Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector:hover" => 'color: {{VALUE}} !important;',
                ],
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_margin',
            [
                'label' => esc_html__('Margin', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_padding',
            [
                'label' => esc_html__('Padding', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );


        $this->end_controls_section();
    }



    
    /*====================Text Eight==========================*/


    protected function text8($control_id = null, $control_name = null, $control_selector = null)
    {


        $this->start_controls_section(
            'ft_' . $control_id . '_text8',
            [
                'label' => esc_html($control_name), // Directly escape the dynamic control name
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [

                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'subtitle_' . $control_id . '_typ',
                'selector' => "{{WRAPPER}} .title{$control_id}", // Concatenate $control_id if needed for selector
            ]
        );


        $this->add_control(
            'subtitle_' . $control_id . '_color_text8',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'color: {{VALUE}} !important;',
                ],
            ]
        );


        $this->add_control(
            'subtitle_' . $control_id . '_hover_color_text8',
            [
                'label'     => esc_html__('Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector:hover" => 'color: {{VALUE}} !important;',
                ],
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_margin',
            [
                'label' => esc_html__('Margin', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_padding',
            [
                'label' => esc_html__('Padding', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );


        $this->end_controls_section();
    }



    
    /*====================Text Nine==========================*/


    protected function text9($control_id = null, $control_name = null, $control_selector = null)
    {


        $this->start_controls_section(
            'ft_' . $control_id . '_text9',
            [
                'label' => esc_html($control_name), // Directly escape the dynamic control name
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [

                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'subtitle_' . $control_id . '_typ',
                'selector' => "{{WRAPPER}} .title{$control_id}", // Concatenate $control_id if needed for selector
            ]
        );


        $this->add_control(
            'subtitle_' . $control_id . '_color_text9',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'color: {{VALUE}} !important;',
                ],
            ]
        );


        $this->add_control(
            'subtitle_' . $control_id . '_hover_color_text9',
            [
                'label'     => esc_html__('Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector:hover" => 'color: {{VALUE}} !important;',
                ],
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_margin',
            [
                'label' => esc_html__('Margin', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_padding',
            [
                'label' => esc_html__('Padding', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );


        $this->end_controls_section();
    }



    
    /*====================Text Ten==========================*/


    protected function text10($control_id = null, $control_name = null, $control_selector = null)
    {


        $this->start_controls_section(
            'ft_' . $control_id . '_text10',
            [
                'label' => esc_html($control_name), // Directly escape the dynamic control name
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [

                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'subtitle_' . $control_id . '_typ',
                'selector' => "{{WRAPPER}} .title{$control_id}", // Concatenate $control_id if needed for selector
            ]
        );


        $this->add_control(
            'subtitle_' . $control_id . '_color_text10',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'color: {{VALUE}} !important;',
                ],
            ]
        );


        $this->add_control(
            'subtitle_' . $control_id . '_hover_color_text10',
            [
                'label'     => esc_html__('Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} $control_selector:hover" => 'color: {{VALUE}} !important;',
                ],
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_margin',
            [
                'label' => esc_html__('Margin', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );




        $this->add_responsive_control(
            'ft_' . $control_id . '_area_padding',
            [
                'label' => esc_html__('Padding', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    "{{WRAPPER}} $control_selector" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );


        $this->end_controls_section();
    }


    // ===========================Image One============================//


    protected function image1($control_id = null, $control_name = null, $control_selector = null)
    {



        $this->start_controls_section(
            'ft_' . $control_id . 'image1',
            [
                'label' => esc_html($control_name), // Directly escape the dynamic control name
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_responsive_control(
            'ft_' . $control_id . '_image_height',
            [
                'label'       => esc_html__('Height', 'rifa-core'),
                'type'        => Controls_Manager::SLIDER,
                'size_units'  => ['px', '%'],  // Allow px and percentage units
                'description' => esc_html__('Choose height in px or %', 'rifa-core'),
                'selectors'   => [
                    "{{WRAPPER}} {$control_selector}" => 'height: {{SIZE}}{{UNIT}} !important;', // Dynamic unit with control_id
                ],
                'default'     => [
                    'unit'  => 'px',  // Default unit is px
                ],
            ]
        );
        
        $this->add_responsive_control(
            'ft_' . $control_id . '_image_width',
            [
                'label'       => esc_html__('Width', 'rifa-core'),
                'type'        => Controls_Manager::SLIDER,
                'size_units'  => ['px', '%'],  // Allow px and percentage units
                'description' => esc_html__('Choose width in px or %', 'rifa-core'),
                'selectors'   => [
                    "{{WRAPPER}} {$control_selector}" => 'width: {{SIZE}}{{UNIT}} !important;', // Dynamic unit with control_id
                ],
                'default'     => [
                    'unit'  => 'px',  // Default unit is px
                ],
            ]
        );
        
        $this->add_responsive_control(
            'ft_' . $control_id . '_image_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'rifa-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    "{{WRAPPER}} {$control_selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        





        $this->end_controls_section();


    }


    // ===========================Image Two============================//


    protected function image2($control_id = null, $control_name = null, $control_selector = null)
    {



        $this->start_controls_section(
            'ft_' . $control_id . 'image2',
            [
                'label' => esc_html($control_name), // Directly escape the dynamic control name
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_responsive_control(
            'ft_' . $control_id . '_image_height',
            [
                'label'       => esc_html__('Height', 'rifa-core'),
                'type'        => Controls_Manager::SLIDER,
                'size_units'  => ['px', '%'],  // Allow px and percentage units
                'description' => esc_html__('Choose height in px or %', 'rifa-core'),
                'selectors'   => [
                    "{{WRAPPER}} {$control_id}" => 'height: {{SIZE}}{{UNIT}};', // Dynamic unit with control_id
                ],
                'default'     => [
                    'unit'  => 'px',  // Default unit is px
                ],
            ]
        );
        
        $this->add_responsive_control(
            'ft_' . $control_id . '_image_width',
            [
                'label'       => esc_html__('Width', 'rifa-core'),
                'type'        => Controls_Manager::SLIDER,
                'size_units'  => ['px', '%'],  // Allow px and percentage units
                'description' => esc_html__('Choose width in px or %', 'rifa-core'),
                'selectors'   => [
                    "{{WRAPPER}} {$control_id}" => 'width: {{SIZE}}{{UNIT}};', // Dynamic unit with control_id
                ],
                'default'     => [
                    'unit'  => 'px',  // Default unit is px
                ],
            ]
        );
        
        $this->add_responsive_control(
            'ft_' . $control_id . '_image_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'rifa-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    "{{WRAPPER}} {$control_id}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        





        $this->end_controls_section();


    }

    // ===========================Image Three============================//


    protected function image3($control_id = null, $control_name = null, $control_selector = null)
    {



        $this->start_controls_section(
            'ft_' . $control_id . 'image3',
            [
                'label' => esc_html($control_name), // Directly escape the dynamic control name
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_responsive_control(
            'ft_' . $control_id . '_image_height',
            [
                'label'       => esc_html__('Height', 'rifa-core'),
                'type'        => Controls_Manager::SLIDER,
                'size_units'  => ['px', '%'],  // Allow px and percentage units
                'description' => esc_html__('Choose height in px or %', 'rifa-core'),
                'selectors'   => [
                    "{{WRAPPER}} {$control_id}" => 'height: {{SIZE}}{{UNIT}};', // Dynamic unit with control_id
                ],
                'default'     => [
                    'unit'  => 'px',  // Default unit is px
                ],
            ]
        );
        
        $this->add_responsive_control(
            'ft_' . $control_id . '_image_width',
            [
                'label'       => esc_html__('Width', 'rifa-core'),
                'type'        => Controls_Manager::SLIDER,
                'size_units'  => ['px', '%'],  // Allow px and percentage units
                'description' => esc_html__('Choose width in px or %', 'rifa-core'),
                'selectors'   => [
                    "{{WRAPPER}} {$control_id}" => 'width: {{SIZE}}{{UNIT}};', // Dynamic unit with control_id
                ],
                'default'     => [
                    'unit'  => 'px',  // Default unit is px
                ],
            ]
        );
        
        $this->add_responsive_control(
            'ft_' . $control_id . '_image_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'rifa-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    "{{WRAPPER}} {$control_id}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        





        $this->end_controls_section();


    }



    // ===========================Image Four============================//


    protected function image4($control_id = null, $control_name = null, $control_selector = null)
    {



        $this->start_controls_section(
            'ft_' . $control_id . 'image4',
            [
                'label' => esc_html($control_name), // Directly escape the dynamic control name
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_responsive_control(
            'ft_' . $control_id . '_image_height',
            [
                'label'       => esc_html__('Height', 'rifa-core'),
                'type'        => Controls_Manager::SLIDER,
                'size_units'  => ['px', '%'],  // Allow px and percentage units
                'description' => esc_html__('Choose height in px or %', 'rifa-core'),
                'selectors'   => [
                    "{{WRAPPER}} {$control_id}" => 'height: {{SIZE}}{{UNIT}};', // Dynamic unit with control_id
                ],
                'default'     => [
                    'unit'  => 'px',  // Default unit is px
                ],
            ]
        );
        
        $this->add_responsive_control(
            'ft_' . $control_id . '_image_width',
            [
                'label'       => esc_html__('Width', 'rifa-core'),
                'type'        => Controls_Manager::SLIDER,
                'size_units'  => ['px', '%'],  // Allow px and percentage units
                'description' => esc_html__('Choose width in px or %', 'rifa-core'),
                'selectors'   => [
                    "{{WRAPPER}} {$control_id}" => 'width: {{SIZE}}{{UNIT}};', // Dynamic unit with control_id
                ],
                'default'     => [
                    'unit'  => 'px',  // Default unit is px
                ],
            ]
        );
        
        $this->add_responsive_control(
            'ft_' . $control_id . '_image_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'rifa-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    "{{WRAPPER}} {$control_id}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        





        $this->end_controls_section();


    }




    


    // ========================Button One =================================//

    protected function button($control_id = null, $control_name = null, $control_selector = null,)
    {
        /**
         * Button One
         */
        $this->start_controls_section(
            'ft_' . $control_id . '_button',
            [
                'label' => esc_html__($control_name, 'tp-core'),
                'tab' => Controls_Manager::TAB_STYLE,
              
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ft_' . $control_id . '_typography',
                'selector' => '{{WRAPPER}} ' . $control_selector . '',
            ]
        );


        $this->start_controls_tabs('ft_' . $control_id . '_button_tabs');

        // Normal State Tab
        $this->start_controls_tab('ft_' . $control_id . '_btn_normal', ['label' => esc_html__('Normal', 'tp-core')]);

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'ft_' . $control_id . '_normal_btn_bg',
                'types' => ['gradient'],
                'selector' => '{{WRAPPER}} ' . $control_selector,
            ]
        );

        $this->add_control(
            'ft_' . $control_id . '_btn_normal_text_color',
            [
                'label' => esc_html__('Text Color', 'tp-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ft_' . $control_id . '_btn_normal_bg_color',
            [
                'label' => esc_html__('Background Color', 'tp-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'ft_' . $control_id . '_btn_box_shadow',
                'label' => esc_html__('Box Shadow', 'tp-core'),
                'selector' => '{{WRAPPER}} ' . $control_selector . '',
            ]
        );

        $this->add_control(
            'ft_' . $control_id . '_btn_normal_border_style',
            [
                'label' => esc_html__('Border Style', 'tp-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__('Default', 'tp-core'),
                    'none' => esc_html__('None', 'tp-core'),
                    'solid' => esc_html__('Solid', 'tp-core'),
                    'double' => esc_html__('Double', 'tp-core'),
                    'dotted' => esc_html__('Dotted', 'tp-core'),
                    'dashed' => esc_html__('Dashed', 'tp-core'),
                    'groove' => esc_html__('Groove', 'tp-core'),
                ],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'border-style: {{VALUE}} !important;;',
                ],
            ]
        );

        $this->add_responsive_control(
            'ft_' . $control_id . '_btn_normal_border_width',
            [
                'label' => esc_html__('Border Width', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'ft_' . $control_id . '_btn_normal_border_color',
            [
                'label' => esc_html__('Border Color', 'tp-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'border-color: {{VALUE}} !important;;',
                ],
            ]

        );


        $this->add_control(
            'ft_' . $control_id . '_btn_border_radius',
            [
                'label' => esc_html__('Border Radius', 'tp-core'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'border-radius: {{SIZE}}px;',
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover State Tab
        $this->start_controls_tab('ft_' . $control_id . '_btn_hover', ['label' => esc_html__('Hover', 'tp-core')]);

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'ft_' . $control_id . '_hover_btn_bg',
                'types' => ['gradient'],
                'selector' => '{{WRAPPER}} ' . $control_selector . ':hover',
            ]
        );

        $this->add_control(
            'ft_' . $control_id . '_btn_hover_text_color',
            [
                'label' => esc_html__('Text Color', 'tp-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . ':hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'ft_' . $control_id . '_btn_hover_bg_color',
            [
                'label' => esc_html__('Background Color', 'tp-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . ':hover' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'ft_' . $control_id . '_btn_hover_box_shadow',
                'label' => esc_html__('Box Shadow', 'tp-core'),
                'selector' => '{{WRAPPER}} ' . $control_selector . ':hover',
            ]
        );

        $this->add_control(
            'ft_' . $control_id . '_btn_hover_border_style',
            [
                'label' => esc_html__('Border Style', 'tp-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__('Default', 'tp-core'),
                    'none' => esc_html__('None', 'tp-core'),
                    'solid' => esc_html__('Solid', 'tp-core'),
                    'double' => esc_html__('Double', 'tp-core'),
                    'dotted' => esc_html__('Dotted', 'tp-core'),
                    'dashed' => esc_html__('Dashed', 'tp-core'),
                    'groove' => esc_html__('Groove', 'tp-core'),
                ],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'border-style: {{VALUE}} !important;;',
                ],
            ]
        );

        $this->add_responsive_control(
            'ft_' . $control_id . '_btn_hover_border_width',
            [
                'label' => esc_html__('Border Width', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'ft_' . $control_id . '_btn_hover_border_color',
            [
                'label' => esc_html__('Border Color', 'tp-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . ':hover' => 'border-color: {{VALUE}} !important;',
                ],
            ]
        );




        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'ft_' . $control_id . '_padding',
            [
                'label' => esc_html__('Padding', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ft_' . $control_id . '_margin',
            [
                'label' => esc_html__('Margin', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    // ========================Button One =================================//

    protected function button2($control_id = null, $control_name = null, $control_selector = null,)
    {
        /**
         * Button One
         */
        $this->start_controls_section(
            'ft_' . $control_id . '_button2',
            [
                'label' => esc_html__($control_name, 'tp-core'),
                'tab' => Controls_Manager::TAB_STYLE,
              
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ft_' . $control_id . '_typography2',
                'selector' => '{{WRAPPER}} ' . $control_selector . '',
            ]
        );


        $this->start_controls_tabs('ft_' . $control_id . '_button_tabs');

        // Normal State Tab
        $this->start_controls_tab('ft_' . $control_id . '_btn_normal2', ['label' => esc_html__('Normal', 'tp-core')]);

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'ft_' . $control_id . '_normal_btn_bg2',
                'types' => ['gradient'],
                'selector' => '{{WRAPPER}} ' . $control_selector,
            ]
        );

        $this->add_control(
            'ft_' . $control_id . '_btn_normal_text_color2',
            [
                'label' => esc_html__('Text Color', 'tp-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ft_' . $control_id . '_btn_normal_bg_color2',
            [
                'label' => esc_html__('Background Color', 'tp-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'ft_' . $control_id . '_btn_box_shadow2',
                'label' => esc_html__('Box Shadow', 'tp-core'),
                'selector' => '{{WRAPPER}} ' . $control_selector . '',
            ]
        );

        $this->add_control(
            'ft_' . $control_id . '_btn_normal_border_style2',
            [
                'label' => esc_html__('Border Style', 'tp-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__('Default', 'tp-core'),
                    'none' => esc_html__('None', 'tp-core'),
                    'solid' => esc_html__('Solid', 'tp-core'),
                    'double' => esc_html__('Double', 'tp-core'),
                    'dotted' => esc_html__('Dotted', 'tp-core'),
                    'dashed' => esc_html__('Dashed', 'tp-core'),
                    'groove' => esc_html__('Groove', 'tp-core'),
                ],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'border-style: {{VALUE}} !important;;',
                ],
            ]
        );

        $this->add_responsive_control(
            'ft_' . $control_id . '_btn_normal_border_width2',
            [
                'label' => esc_html__('Border Width', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'ft_' . $control_id . '_btn_normal_border_color2',
            [
                'label' => esc_html__('Border Color', 'tp-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'border-color: {{VALUE}} !important;;',
                ],
            ]

        );


        $this->add_control(
            'ft_' . $control_id . '_btn_border_radius2',
            [
                'label' => esc_html__('Border Radius', 'tp-core'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'border-radius: {{SIZE}}px;',
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover State Tab
        $this->start_controls_tab('ft_' . $control_id . '_btn_hover2', ['label' => esc_html__('Hover', 'tp-core')]);

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'ft_' . $control_id . '_hover_btn_bg',
                'types' => ['gradient'],
                'selector' => '{{WRAPPER}} ' . $control_selector . ':hover',
            ]
        );

        $this->add_control(
            'ft_' . $control_id . '_btn_hover_text_color2',
            [
                'label' => esc_html__('Text Color', 'tp-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . ':hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'ft_' . $control_id . '_btn_hover_bg_color2',
            [
                'label' => esc_html__('Background Color', 'tp-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . ':hover' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'ft_' . $control_id . '_btn_hover_box_shadow22',
                'label' => esc_html__('Box Shadow', 'tp-core'),
                'selector' => '{{WRAPPER}} ' . $control_selector . ':hover',
            ]
        );

        $this->add_control(
            'ft_' . $control_id . '_btn_hover_border_style2',
            [
                'label' => esc_html__('Border Style', 'tp-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__('Default', 'tp-core'),
                    'none' => esc_html__('None', 'tp-core'),
                    'solid' => esc_html__('Solid', 'tp-core'),
                    'double' => esc_html__('Double', 'tp-core'),
                    'dotted' => esc_html__('Dotted', 'tp-core'),
                    'dashed' => esc_html__('Dashed', 'tp-core'),
                    'groove' => esc_html__('Groove', 'tp-core'),
                ],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'border-style: {{VALUE}} !important;;',
                ],
            ]
        );

        $this->add_responsive_control(
            'ft_' . $control_id . '_btn_hover_border_width2',
            [
                'label' => esc_html__('Border Width', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'ft_' . $control_id . '_btn_hover_border_color2',
            [
                'label' => esc_html__('Border Color', 'tp-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . ':hover' => 'border-color: {{VALUE}} !important;',
                ],
            ]
        );




        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'ft_' . $control_id . '_padding22',
            [
                'label' => esc_html__('Padding', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ft_' . $control_id . '_margin22',
            [
                'label' => esc_html__('Margin', 'tp-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }


}