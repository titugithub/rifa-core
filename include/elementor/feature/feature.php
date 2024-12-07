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
class FT_Feature extends Widget_Base
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
        return 'ft-feature';
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
        return __('FT Feature', 'rifa-core');
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
        // Content Tab
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Content', 'rifa-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Subtitle
        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'default' => 'An Exhaustive list of',
            ]
        );

        // Title
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Our features.',
            ]
        );

        // Description
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'rifa-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In pretium, elit quis vehicula interdum, sem metus iaculis sapien, sed bibendum lectus augue eu metus.',
            ]
        );

        // Button Text
        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Show all features',
            ]
        );

        // Button URL
        $this->add_control(
            'button_url',
            [
                'label' => esc_html__('Button URL', 'rifa-core'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'https://your-link.com',
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        // Feature Cards Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'feature_icon',
            [
                'label' => esc_html__('Feature Icon', 'rifa-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'feature_title',
            [
                'label' => esc_html__('Feature Title', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Feature Title',
            ]
        );

        $repeater->add_control(
            'feature_description',
            [
                'label' => esc_html__('Feature Description', 'rifa-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Nulla ultricies in nulla ac efficitur. In vel neque arcu. Donec quis',
            ]
        );

        $this->add_control(
            'feature_items',
            [
                'label' => esc_html__('Feature Items', 'rifa-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'feature_title' => 'Safe Service',
                        'feature_description' => 'Nulla ultricies in nulla ac efficitur. In vel neque arcu. Donec quis',
                    ],
                    [
                        'feature_title' => 'Network',
                        'feature_description' => 'Nulla ultricies in nulla ac efficitur. In vel neque arcu. Donec quis',
                    ],
                    [
                        'feature_title' => 'Security',
                        'feature_description' => 'Nulla ultricies in nulla ac efficitur. In vel neque arcu. Donec quis',
                    ],
                    [
                        'feature_title' => 'Support',
                        'feature_description' => 'Nulla ultricies in nulla ac efficitur. In vel neque arcu. Donec quis',
                    ],
                ],
                'title_field' => '{{{ feature_title }}}',
            ]
        );

        $this->end_controls_section();

        // Style Tab - Section Header
        $this->start_controls_section(
            'section_header_style',
            [
                'label' => esc_html__('Section Header', 'rifa-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Subtitle Style
        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'rifa-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-sub-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .section-sub-title',
            ]
        );

        // Title Style
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'rifa-core'),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .section-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .section-title',
            ]
        );

        // Description Style
        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'rifa-core'),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .section-header p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .section-header p',
            ]
        );

        $this->end_controls_section();

        // Style Tab - Feature Cards
        $this->start_controls_section(
            'section_cards_style',
            [
                'label' => esc_html__('Feature Cards', 'rifa-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Card Background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'card_background',
                'label' => esc_html__('Card Background', 'rifa-core'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .feature-card',
            ]
        );

        // Card Padding
        $this->add_responsive_control(
            'card_padding',
            [
                'label' => esc_html__('Padding', 'rifa-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .feature-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Card Border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'card_border',
                'label' => esc_html__('Border', 'rifa-core'),
                'selector' => '{{WRAPPER}} .feature-card',
            ]
        );

        // Card Border Radius
        $this->add_responsive_control(
            'card_border_radius',
            [
                'label' => esc_html__('Border Radius', 'rifa-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .feature-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Card Box Shadow
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'card_box_shadow',
                'selector' => '{{WRAPPER}} .feature-card',
            ]
        );

        // Feature Title Style
        $this->add_control(
            'feature_title_color',
            [
                'label' => esc_html__('Feature Title Color', 'rifa-core'),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .feature-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'feature_title_typography',
                'selector' => '{{WRAPPER}} .feature-title',
            ]
        );

        // Feature Description Style
        $this->add_control(
            'feature_description_color',
            [
                'label' => esc_html__('Feature Description Color', 'rifa-core'),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .feature-card__content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'feature_description_typography',
                'selector' => '{{WRAPPER}} .feature-card__content p',
            ]
        );

        $this->end_controls_section();

        // Style Tab - Button
        $this->start_controls_section(
            'section_button_style',
            [
                'label' => esc_html__('Button', 'rifa-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Button Colors
        $this->start_controls_tabs('button_colors');

        // Normal State
        $this->start_controls_tab(
            'button_normal',
            [
                'label' => esc_html__('Normal', 'rifa-core'),
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Text Color', 'rifa-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-header a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover State
        $this->start_controls_tab(
            'button_hover',
            [
                'label' => esc_html__('Hover', 'rifa-core'),
            ]
        );

        $this->add_control(
            'button_text_hover_color',
            [
                'label' => esc_html__('Text Color', 'rifa-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-header a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        // Button Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .section-header a',
                'separator' => 'before',
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
        <section class="pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-lg-1 order-2">
                        <div class="row mb-none-30">
                            <div class="col-lg-6 mb-30">
                                <div class="row mb-none-30">
                                    <?php 
                                    if (!empty($settings['feature_items'])) :
                                        $delay = 0.3;
                                        $count = 0;
                                        foreach ($settings['feature_items'] as $index => $item) :
                                            if ($count < 2) :
                                    ?>
                                            <div class="col-lg-12 col-md-6 mb-30 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="<?php echo esc_attr($delay); ?>s">
                                                <div class="feature-card hover--effect-1">
                                                    <div class="feature-card__icon">
                                                        <?php if (!empty($item['feature_icon']['url'])) : ?>
                                                            <img src="<?php echo esc_url($item['feature_icon']['url']); ?>" alt="<?php echo !empty($item['feature_title']) ? esc_attr($item['feature_title']) : ''; ?>">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="feature-card__content">
                                                        <?php if (!empty($item['feature_title'])) : ?>
                                                            <h3 class="feature-title"><?php echo esc_html($item['feature_title']); ?></h3>
                                                        <?php endif; ?>
                                                        <?php if (!empty($item['feature_description'])) : ?>
                                                            <p><?php echo esc_html($item['feature_description']); ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php 
                                            $delay += 0.2;
                                            endif;
                                            $count++;
                                        endforeach;
                                    endif; 
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-30 mt-lg-5">
                                <div class="row mb-none-30">
                                    <?php 
                                    if (!empty($settings['feature_items'])) :
                                        $delay = 0.3;
                                        $count = 0;
                                        foreach ($settings['feature_items'] as $index => $item) :
                                            if ($count >= 2) :
                                    ?>
                                            <div class="col-lg-12 col-md-6 mb-30 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="<?php echo esc_attr($delay); ?>s">
                                                <div class="feature-card hover--effect-1">
                                                    <div class="feature-card__icon">
                                                        <?php if (!empty($item['feature_icon']['url'])) : ?>
                                                            <img src="<?php echo esc_url($item['feature_icon']['url']); ?>" alt="<?php echo !empty($item['feature_title']) ? esc_attr($item['feature_title']) : ''; ?>">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="feature-card__content">
                                                        <?php if (!empty($item['feature_title'])) : ?>
                                                            <h3 class="feature-title"><?php echo esc_html($item['feature_title']); ?></h3>
                                                        <?php endif; ?>
                                                        <?php if (!empty($item['feature_description'])) : ?>
                                                            <p><?php echo esc_html($item['feature_description']); ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php 
                                            $delay += 0.2;
                                            endif;
                                            $count++;
                                        endforeach;
                                    endif; 
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-2 order-1 text-lg-start text-center wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <div class="section-header">
                            <?php if (!empty($settings['subtitle'])) : ?>
                                <span class="section-sub-title"><?php echo esc_html($settings['subtitle']); ?></span>
                            <?php endif; ?>
                            
                            <?php if (!empty($settings['title'])) : ?>
                                <h2 class="section-title"><?php echo esc_html($settings['title']); ?></h2>
                            <?php endif; ?>
                            
                            <?php if (!empty($settings['description'])) : ?>
                                <p><?php echo esc_html($settings['description']); ?></p>
                            <?php endif; ?>
                            
                            <?php if (!empty($settings['button_text'])) : ?>
                                <a href="<?php echo !empty($settings['button_url']['url']) ? esc_url($settings['button_url']['url']) : '#'; ?>" 
                                   class="d-flex align-items-center mt-3 justify-content-lg-start justify-content-center"
                                   <?php if (!empty($settings['button_url']['is_external'])) : ?>target="_blank"<?php endif; ?>
                                   <?php if (!empty($settings['button_url']['nofollow'])) : ?>rel="nofollow"<?php endif; ?>>
                                    <?php echo esc_html($settings['button_text']); ?>
                                    <i class="las la-angle-double-right text-danger"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}

$widgets_manager->register(new FT_Feature());
