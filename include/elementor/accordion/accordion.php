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


class FT_Accordion extends Widget_Base
{


    public function get_name()
    {
        return 'ft-accordion';
    }


    public function get_title()
    {
        return __('FT Accordion ', 'rifa-core');
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
            'ft_accordion_content_title',
            [
                'label' => esc_html__('Accordion', 'rifa-core')
            ]
        );




        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_title',
            [
                'label' => esc_html__('Accordion Title', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'rifa-core'),
                'placeholder' => esc_html__('Type your title here', 'rifa-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_content',
            [
                'label' => esc_html__('Accordion Description', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Default description', 'rifa-core'),
                'placeholder' => esc_html__('Type your description here', 'rifa-core'),
            ]
        );

        $this->add_control(
            'list_repeater',
            [
                'label' => esc_html__('Accordion List', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__('01. In et finibus lectus. Donec scelerisque tortor?', 'rifa-core'),
                        'list_content' => esc_html__('Donec bibendum enim ut elit porta ullamcorper. Vestibulum Nai quam nulla, venenatis eget dapibus ac, catali aman topuny wekemdini iaculis vitae nulla. Morbi mattis nec mi ac mollis. ', 'rifa-core'),
                    ],
                    [
                        'list_title' => esc_html__('02. rhoncus turpis porta non Curabitur interdum?', 'rifa-core'),
                        'list_content' => esc_html__('Donec bibendum enim ut elit porta ullamcorper. Vestibulum Nai quam nulla, venenatis eget dapibus ac, catali aman topuny wekemdini iaculis vitae nulla. Morbi mattis nec mi ac mollis. ', 'rifa-core'),
                    ],
                    [
                        'list_title' => esc_html__('03. Donec ac enim vitae ligula ultrices accum?', 'rifa-core'),
                        'list_content' => esc_html__('Donec bibendum enim ut elit porta ullamcorper. Vestibulum Nai quam nulla, venenatis eget dapibus ac, catali aman topuny wekemdini iaculis vitae nulla. Morbi mattis nec mi ac mollis. ', 'rifa-core'),
                    ],
                    [
                        'list_title' => esc_html__('04. I have a press/media enquiry – who should I contact can help?', 'rifa-core'),
                        'list_content' => esc_html__('Donec bibendum enim ut elit porta ullamcorper. Vestibulum Nai quam nulla, venenatis eget dapibus ac, catali aman topuny wekemdini iaculis vitae nulla. Morbi mattis nec mi ac mollis. ', 'rifa-core'),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );



        $this->end_controls_section();

        // ==============================Style===================================//




        $this->start_controls_section(
            'ft_accordiobn_stydle_acc_title',
            [
                'label' => esc_html__('Accordion Title', 'rifa-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'ft_acdscordion_style_acc_title_typ',
                'selector' => '{{WRAPPER}} .genarel-qustions-area .accordion .accordion-item .accordion-header .accordion-button',

            ]
        );

        $this->add_control(
            'ft_accordion_stylsde_acc_title_color',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .genarel-qustions-area .accordion .accordion-item .accordion-header .accordion-button' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'ft_accordion_styfsle_adcc_title_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .genarel-qustions-area .accordion .accordion-item .accordion-header .accordion-button::after' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ft_accordion_style_adcc_tistle_margin',
            [
                'label' => esc_html__('Margin', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .genarel-qustions-area .accordion .accordion-item .accordion-header .accordion-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'ft_accordion_style_acc_tiddtle_padding',
            [
                'label'      => __('Padding', 'rifa-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .genarel-qustions-area .accordion .accordion-item .accordion-header .accordion-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );



        $this->end_controls_section();


        $this->start_controls_section(
            'ft_accordion_style_acsdc_descdd',
            [
                'label' => esc_html__('Accordion Descripton', 'rifa-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'ft_accordsdion_style_acc_desc_typ',
                'selector' => '{{WRAPPER}} .accordion-body',

            ]
        );

        $this->add_control(
            'ft_accordion_stfyled_acc_desc_color',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-body' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ft_accordion_stdysle_acc_desc_margin',
            [
                'label' => esc_html__('Margin', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .accordion-body' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'ft_accordion_stylefd_acc_desc_padding',
            [
                'label'      => __('Padding', 'rifa-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .accordion-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();

        ?>




<div class="faq-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="genarel-qustions-area">
                    <div class="accordion" id="accordionExample">
                        <?php foreach ($settings['list_repeater'] as $key => $item) : ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading<?php echo esc_html($key) ?>">
                                    <button class="accordion-button <?php echo ($key == 0) ? '' : 'collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_html($key) ?>" aria-expanded="true" aria-controls="collapse<?php echo esc_html($key) ?>">
                                        <?php if (!empty($item['list_title'])) : ?>
                                            <?php echo esc_html($item['list_title']) ?>
                                        <?php endif ?>
                                        <i class="fas <?php echo ($key == 0) ? 'fa-minus' : 'fa-plus'; ?> icon"></i> <!-- Add the icon here -->
                                    </button>
                                </h2>
                                <div id="collapse<?php echo esc_html($key) ?>" class="accordion-collapse collapse <?php echo ($key == 0) ? 'show' : '' ?>" aria-labelledby="heading<?php echo esc_html($key) ?>" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <?php if (!empty($item['list_content'])) : ?>
                                            <?php echo esc_html($item['list_content']) ?>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.querySelectorAll('.accordion-button').forEach(button => {
        button.addEventListener('click', function () {
            let icon = this.querySelector('.icon');
            if (this.classList.contains('collapsed')) {
                icon.classList.remove('fa-minus');
                icon.classList.add('fa-plus');
            } else {
                icon.classList.remove('fa-plus');
                icon.classList.add('fa-minus');
            }
        });
    });
</script>








<?php
    }
}

$widgets_manager->register(new FT_Accordion());
