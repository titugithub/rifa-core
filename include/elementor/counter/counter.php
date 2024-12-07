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
class FT_Counter extends Widget_Base
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
        return 'ft-counter';
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
        return __('FT Counter', 'rifa-core');
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
            'counter_icon',
            [
                'label' => esc_html__('Counter Icon', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $repeater->add_control(
            'counter_number',
            [
                'label' => esc_html__('Counter Number', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '23',
            ]
        );

        $repeater->add_control(
            'counter_title',
            [
                'label' => esc_html__('Counter Title', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Last Month Winners',
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
                        'counter_title' => 'Last Month Winners',
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

        // Style Section
        $this->start_controls_section(
            'counter_style_section',
            [
                'label' => esc_html__('Counter Style', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Counter Item Style
        $this->add_control(
            'counter_item_heading',
            [
                'label' => esc_html__('Counter Item', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'counter_item_background',
                'label' => esc_html__('Background', 'rifa-core'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .counter-item',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'counter_item_border',
                'label' => esc_html__('Border', 'rifa-core'),
                'selector' => '{{WRAPPER}} .counter-item',
            ]
        );

        $this->add_responsive_control(
            'counter_item_padding',
            [
                'label' => esc_html__('Padding', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .counter-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'counter_item_shadow',
                'label' => esc_html__('Box Shadow', 'rifa-core'),
                'selector' => '{{WRAPPER}} .counter-item',
            ]
        );

        // Icon Style
        $this->add_control(
            'counter_icon_heading',
            [
                'label' => esc_html__('Icon', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'icon_size',
            [
                'label' => esc_html__('Icon Size', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .counter-item__icon img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_spacing',
            [
                'label' => esc_html__('Icon Bottom Spacing', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .counter-item__icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Number Style
        $this->add_control(
            'counter_number_heading',
            [
                'label' => esc_html__('Number', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'number_typography',
                'label' => esc_html__('Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .counter-item__content span',
            ]
        );

        $this->add_control(
            'number_color',
            [
                'label' => esc_html__('Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-item__content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Title Style
        $this->add_control(
            'counter_title_heading',
            [
                'label' => esc_html__('Title', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .counter-item__content p',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-item__content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => esc_html__('Top Spacing', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .counter-item__content p' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
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
        <div class="counter-section">
            <div class="container">
                <div class="row counter-wrapper mx-0 justify-content-center">
                    <?php foreach ($settings['counter_items'] as $index => $item) : 
                        $last_item_class = ($index === count($settings['counter_items']) - 1) ? '' : 'mb-30';
                    ?>
                        <div class="col-lg-4 col-sm-6 <?php echo esc_attr($last_item_class); ?>">
                            <div class="counter-item">
                                <div class="counter-item__icon">
                                    <?php if (!empty($item['counter_icon']['url'])) : ?>
                                        <img src="<?php echo esc_url($item['counter_icon']['url']); ?>" alt="<?php echo esc_attr($item['counter_title']); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="counter-item__content">
                                    <span><?php echo esc_html($item['counter_number']); ?></span>
                                    <p><?php echo esc_html($item['counter_title']); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
    }
}

$widgets_manager->register(new FT_Counter());
