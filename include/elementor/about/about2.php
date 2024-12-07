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
 * Elementor widget for about section.
 *
 * @since 1.0.0
 */
class FT_About_Two extends Widget_Base
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
        return 'ft-about-two';
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
        return __('FT About Two', 'rifa-core');
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
        // About Content Section
        $this->start_controls_section(
            'about_content_section',
            [
                'label' => esc_html__('About Content', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('A few words about us', 'rifa-core'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('We dream big so you can win big', 'rifa-core'),
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => esc_html__('Content', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => '<p>We\'re bold in our ambition: to be the world\'s biggest and best online lottery platform. We\'re for every player that\'s ever dreamed of hitting the jackpot, which is why we bring you the biggest prizes from around the world and offer you tons of ways to play. Our aim is to offer unprecedented variety as well as quality.</p>
                <p>Our team of creative programmers, marketing experts, and members of the global lottery community have worked together to build the ultimate lottery site, and every win and happy customer reminds us how lucky we are to be doing what we love.</p>',
            ]
        );

        $this->end_controls_section();

        // Subtitle Style
        $this->start_controls_section(
            'subtitle_style',
            [
                'label' => esc_html__('Subtitle Style', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .about-wrapper__title-top',
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__('Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-wrapper__title-top' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'subtitle_margin',
            [
                'label' => esc_html__('Margin', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .about-wrapper__title-top' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Title Style
        $this->start_controls_section(
            'title_style',
            [
                'label' => esc_html__('Title Style', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .about-wrapper__title',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-wrapper__title' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__('Margin', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .about-wrapper__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Content Style
        $this->start_controls_section(
            'content_style',
            [
                'label' => esc_html__('Content Style', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .about-wrapper__content p',
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => esc_html__('Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-wrapper__content p' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_margin',
            [
                'label' => esc_html__('Margin', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .about-wrapper__content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Counter Items Section
        $this->start_controls_section(
            'counter_section',
            [
                'label' => esc_html__('Counter Items', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'counter_number',
            [
                'label' => esc_html__('Number', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '23',
            ]
        );

        $repeater->add_control(
            'counter_title',
            [
                'label' => esc_html__('Title', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Winners For Last Month', 'rifa-core'),
            ]
        );

        $this->add_control(
            'counter_items',
            [
                'label' => esc_html__('Counter Items', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'counter_number' => '23',
                        'counter_title' => 'Winners For Last Month',
                    ],
                    [
                        'counter_number' => '2837K',
                        'counter_title' => 'Tickets Sold',
                    ],
                    [
                        'counter_number' => '28387K',
                        'counter_title' => 'Payouts to Winners',
                    ],
                ],
                'title_field' => '{{{ counter_title }}}',
            ]
        );

        $this->end_controls_section();

        // Counter Style
        $this->start_controls_section(
            'counter_style',
            [
                'label' => esc_html__('Counter Style', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'counter_number_typography',
                'label' => esc_html__('Number Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .counter-item__content span',
            ]
        );

        $this->add_control(
            'counter_number_color',
            [
                'label' => esc_html__('Number Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-item__content span' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'counter_title_typography',
                'label' => esc_html__('Title Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .counter-item__content p',
            ]
        );

        $this->add_control(
            'counter_title_color',
            [
                'label' => esc_html__('Title Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-item__content p' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'counter_padding',
            [
                'label' => esc_html__('Counter Item Padding', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .counter-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'counter_background',
                'label' => esc_html__('Background', 'rifa-core'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .counter-item',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'counter_border',
                'label' => esc_html__('Border', 'rifa-core'),
                'selector' => '{{WRAPPER}} .counter-item',
            ]
        );

        $this->add_control(
            'counter_border_radius',
            [
                'label' => esc_html__('Border Radius', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .counter-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'counter_box_shadow',
                'label' => esc_html__('Box Shadow', 'rifa-core'),
                'selector' => '{{WRAPPER}} .counter-item',
            ]
        );

        $this->end_controls_section();

        // Section Style
        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Section Style', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'section_padding',
            [
                'label' => esc_html__('Section Padding', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .mt-minus-150' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'section_margin',
            [
                'label' => esc_html__('Section Margin', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .mt-minus-150' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'section_background',
                'label' => esc_html__('Background', 'rifa-core'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .mt-minus-150',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'section_border',
                'label' => esc_html__('Border', 'rifa-core'),
                'selector' => '{{WRAPPER}} .mt-minus-150',
            ]
        );

        $this->add_control(
            'section_border_radius',
            [
                'label' => esc_html__('Border Radius', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .mt-minus-150' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'section_box_shadow',
                'label' => esc_html__('Box Shadow', 'rifa-core'),
                'selector' => '{{WRAPPER}} .mt-minus-150',
            ]
        );

        // Container Style
        $this->add_control(
            'container_heading',
            [
                'label' => esc_html__('Container Style', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'container_padding',
            [
                'label' => esc_html__('Container Padding', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .about-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'container_background',
                'label' => esc_html__('Container Background', 'rifa-core'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .about-wrapper',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'container_border',
                'label' => esc_html__('Container Border', 'rifa-core'),
                'selector' => '{{WRAPPER}} .about-wrapper',
            ]
        );

        $this->add_control(
            'container_border_radius',
            [
                'label' => esc_html__('Container Border Radius', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .about-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'container_box_shadow',
                'label' => esc_html__('Container Box Shadow', 'rifa-core'),
                'selector' => '{{WRAPPER}} .about-wrapper',
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
        ?>
        <section class="mt-minus-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="about-wrapper pt-120">
                            <div class="about-wrapper__header">
                                <?php if(!empty($settings['subtitle'])) : ?>
                                    <div class="about-wrapper__title-top"><?php echo esc_html($settings['subtitle']); ?></div>
                                <?php endif; ?>
                                <?php if(!empty($settings['title'])) : ?>
                                    <h2 class="about-wrapper__title"><?php echo esc_html($settings['title']); ?></h2>
                                <?php endif; ?>
                            </div>
                            <?php if(!empty($settings['content'])) : ?>
                                <div class="about-wrapper__content">
                                    <?php echo wp_kses_post($settings['content']); ?>
                                </div>
                            <?php endif; ?>
                        </div><!-- about-wrapper-->
                        
                        <?php if(!empty($settings['counter_items'])) : ?>
                            <div class="row counter-wrapper style--two justify-content-center">
                                <?php foreach($settings['counter_items'] as $item) : ?>
                                    <div class="col-lg-4 col-sm-6 text-center">
                                        <div class="counter-item style--two">
                                            <div class="counter-item__content">
                                                <span><?php echo esc_html($item['counter_number']); ?></span>
                                                <p><?php echo esc_html($item['counter_title']); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}

$widgets_manager->register(new FT_About_Two());
