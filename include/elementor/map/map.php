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
class FT_Map extends Widget_Base
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
        return 'ft-map';
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
        return __('FT Map', 'rifa-core');
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
        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Sub Title', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Our Users Around the World', 'rifa-core'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Let the number speak for us', 'rifa-core'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Over the years we have provided millions of players with tickets to lotteries across the globe and enjoyed having more than one million winners', 'rifa-core'),
            ]
        );

        // Stats Cards Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'card_icon',
            [
                'label' => esc_html__('Card Icon', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $repeater->add_control(
            'card_number',
            [
                'label' => esc_html__('Number', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '12000+',
            ]
        );

        $repeater->add_control(
            'card_text',
            [
                'label' => esc_html__('Text', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Verified Users',
            ]
        );

        $this->add_control(
            'stats_cards',
            [
                'label' => esc_html__('Statistics Cards', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'card_number' => '12000+',
                        'card_text' => 'Verified Users'
                    ],
                    [
                        'card_number' => '13',
                        'card_text' => 'Years on the market'
                    ],
                    [
                        'card_number' => '98%',
                        'card_text' => 'Customer Satisfaction'
                    ],
                ],
                'title_field' => '{{{ card_text }}}',
            ]
        );

        $this->end_controls_section();

        // Style Section - General
        $this->start_controls_section(
            'style_general_section',
            [
                'label' => esc_html__('General Style', 'rifa-core'),
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
                    '{{WRAPPER}} .overview-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Title & Subtitle
        $this->start_controls_section(
            'style_header_section',
            [
                'label' => esc_html__('Header Style', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-sub-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'label' => esc_html__('Subtitle Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .section-sub-title',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .section-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .section-title',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .section-header p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => esc_html__('Description Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .section-header p',
            ]
        );

        $this->end_controls_section();

        // Style Section - Stats Cards
        $this->start_controls_section(
            'style_cards_section',
            [
                'label' => esc_html__('Stats Cards Style', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_bg_color',
            [
                'label' => esc_html__('Card Background', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .overview-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'card_box_shadow',
                'label' => esc_html__('Card Box Shadow', 'rifa-core'),
                'selector' => '{{WRAPPER}} .overview-card',
            ]
        );

        $this->add_responsive_control(
            'card_padding',
            [
                'label' => esc_html__('Card Padding', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .overview-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'card_number_color',
            [
                'label' => esc_html__('Number Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .overview-card__content .number' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'number_typography',
                'label' => esc_html__('Number Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .overview-card__content .number',
            ]
        );

        $this->add_control(
            'card_text_color',
            [
                'label' => esc_html__('Text Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .overview-card__content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'label' => esc_html__('Text Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .overview-card__content p',
            ]
        );

        $this->end_controls_section();

        // Style Section - Map Pointers
        $this->start_controls_section(
            'style_pointers_section',
            [
                'label' => esc_html__('Map Pointers Style', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'pointer_color',
            [
                'label' => esc_html__('Pointer Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .map-pointer .pointer' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'pointer_size',
            [
                'label' => esc_html__('Pointer Size', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .map-pointer .pointer' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
        <section class="overview-section pt-120">
            <div class="map-el"><img src="<?php echo get_template_directory_uri()?>/assets/images/elements/map.png" alt="image"></div>
            <div class="obj-1"><img src="<?php echo get_template_directory_uri()?>/assets/images/elements/overview-obj-1.png" alt="image"></div>
            <div class="obj-2"><img src="<?php echo get_template_directory_uri()?>/assets/images/elements/overview-obj-2.png" alt="image"></div>
            <div class="obj-3"><img src="<?php echo get_template_directory_uri()?>/assets/images/elements/overview-obj-3.png" alt="image"></div>
            <div class="obj-4"><img src="<?php echo get_template_directory_uri()?>/assets/images/elements/overview-obj-4.png" alt="image"></div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-10 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                        <div class="section-header text-center">
                            <span class="section-sub-title"><?php echo esc_html($settings['subtitle']); ?></span>
                            <h2 class="section-title"><?php echo esc_html($settings['title']); ?></h2>
                            <p><?php echo esc_html($settings['description']); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="map-pointer">
                <div class="pointer num-1"></div>
                <div class="pointer num-2"></div>
                <div class="pointer num-3"></div>
                <div class="pointer num-4"></div>
                <div class="pointer num-5"></div>
                <div class="pointer num-6"></div>
                <div class="pointer num-7"></div>
                <div class="pointer num-8"></div>
                <div class="pointer num-9"></div>
            </div>

            <div class="container">
                <div class="row justify-content-center mb-none-30">
                    <?php 
                    $delay = 0.3;
                    foreach ($settings['stats_cards'] as $index => $card) : 
                    ?>
                        <div class="col-lg-4 col-sm-6 mb-30 wow bounceIn" data-wow-duration="0.5s" data-wow-delay="<?php echo esc_attr($delay); ?>s">
                            <div class="overview-card hover--effect-1">
                                <div class="overview-card__icon">
                                    <?php if (!empty($card['card_icon']['url'])) : ?>
                                        <img src="<?php echo esc_url($card['card_icon']['url']); ?>" alt="">
                                    <?php endif; ?>
                                </div>
                                <div class="overview-card__content">
                                    <span class="number"><?php echo esc_html($card['card_number']); ?></span>
                                    <p><?php echo esc_html($card['card_text']); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php 
                    $delay += 0.2;
                    endforeach; 
                    ?>
                </div>
            </div>
        </section>
        <?php
    }
}

$widgets_manager->register(new FT_Map());
