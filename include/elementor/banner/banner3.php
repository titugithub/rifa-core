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
class FT_Banner3 extends Widget_Base
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
        return 'ft-banner3';
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
        return __('FT Banner3', 'rifa-core');
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
            'subtitle', [
                'label' => esc_html__('Subtitle', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('play anytime, any where', 'rifa-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'title', [
                'label' => esc_html__('Title', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Win Big With Rifa', 'rifa-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'description', [
                'label' => esc_html__('Description', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Don\'t miss your chance. Will you be our next lucky winner?', 'rifa-core'),
            ]
        );

        $this->add_control(
            'button_text', [
                'label' => esc_html__('Button Text', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Participate Now', 'rifa-core'),
            ]
        );

        $this->add_control(
            'button_url', [
                'label' => esc_html__('Button URL', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'rifa-core'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $this->add_control(
            'video_url', [
                'label' => esc_html__('Video URL', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://www.youtube.com/...', 'rifa-core'),
                'default' => [
                    'url' => 'https://www.youtube.com/embed/d6xn5uflUjg',
                ],
            ]
        );

        // Image Controls
        $this->add_control(
            'background_image',
            [
                'label' => esc_html__('Background Image', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'main_image',
            [
                'label' => esc_html__('Main Image', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section for Title
        $this->start_controls_section(
            'title_style_section',
            [
                'label' => esc_html__('Title', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .hero__title',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero__title' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .hero__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section for Subtitle
        $this->start_controls_section(
            'subtitle_style_section',
            [
                'label' => esc_html__('Subtitle', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .hero__subtitle',
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__('Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero__subtitle' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .hero__subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section for Description
        $this->start_controls_section(
            'description_style_section',
            [
                'label' => esc_html__('Description', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .hero__content p',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero__content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'description_margin',
            [
                'label' => esc_html__('Margin', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .hero__content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section for Button
        $this->start_controls_section(
            'button_style_section',
            [
                'label' => esc_html__('Button', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('button_tabs');

        // Normal Tab
        $this->start_controls_tab(
            'button_normal_tab',
            [
                'label' => esc_html__('Normal', 'rifa-core'),
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => esc_html__('Text Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_background',
            [
                'label' => esc_html__('Background Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-btn' => 'background: {{VALUE}} !important',
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover Tab
        $this->start_controls_tab(
            'button_hover_tab',
            [
                'label' => esc_html__('Hover', 'rifa-core'),
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => esc_html__('Text Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_hover_background',
            [
                'label' => esc_html__('Background Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-btn:hover' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .cmn-btn',
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .cmn-btn',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cmn-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__('Padding', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cmn-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section for Video Button
        $this->start_controls_section(
            'video_button_style_section',
            [
                'label' => esc_html__('Video Button', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('video_button_tabs');

        // Normal Tab
        $this->start_controls_tab(
            'video_button_normal_tab',
            [
                'label' => esc_html__('Normal', 'rifa-core'),
            ]
        );

        $this->add_control(
            'video_button_color',
            [
                'label' => esc_html__('Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'video_button_background',
            [
                'label' => esc_html__('Background Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video-btn' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover Tab
        $this->start_controls_tab(
            'video_button_hover_tab',
            [
                'label' => esc_html__('Hover', 'rifa-core'),
            ]
        );

        $this->add_control(
            'video_button_hover_color',
            [
                'label' => esc_html__('Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'video_button_hover_background',
            [
                'label' => esc_html__('Background Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video-btn:hover' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'video_button_width',
            [
                'label' => esc_html__('Width', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .video-btn' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'video_button_height',
            [
                'label' => esc_html__('Height', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .video-btn' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'video_button_border',
                'selector' => '{{WRAPPER}} .video-btn',
            ]
        );

        $this->add_control(
            'video_button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .video-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'video_button_margin',
            [
                'label' => esc_html__('Margin', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .video-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'video_button_box_shadow',
                'selector' => '{{WRAPPER}} .video-btn',
            ]
        );

        // Play Icon Style
        $this->add_control(
            'play_icon_heading',
            [
                'label' => esc_html__('Play Icon', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'play_icon_size',
            [
                'label' => esc_html__('Size', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .video-btn i' => 'font-size: {{SIZE}}{{UNIT}};',
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
        <section class="hero style--two bg_img" <?php echo !empty($settings['background_image']['url']) ? 'data-background="' . esc_url($settings['background_image']['url']) . '"' : ''; ?>>
            <div class="hero__shape-left"><img src="<?php echo get_template_directory_uri()?>/assets/images/elements/hero-3-shape.png" alt="<?php echo esc_attr__('Hero Shape Left', 'rifa-core'); ?>"></div>
            <div class="hero__shape"><img src="<?php echo get_template_directory_uri()?>/assets/images/elements/round-shape-3.png" alt="<?php echo esc_attr__('Round Shape', 'rifa-core'); ?>"></div>
            <div class="hero-e1"><img src="<?php echo get_template_directory_uri()?>/assets/images/elements/hero-2-e1.png" alt="<?php echo esc_attr__('Hero Element 1', 'rifa-core'); ?>"></div>
            <div class="hero-e2"><img src="<?php echo get_template_directory_uri()?>/assets/images/elements/hero-2-e2.png" alt="<?php echo esc_attr__('Hero Element 2', 'rifa-core'); ?>"></div>
            <div class="hero-e3"><img src="<?php echo get_template_directory_uri()?>/assets/images/elements/hero-2-e3.png" alt="<?php echo esc_attr__('Hero Element 3', 'rifa-core'); ?>"></div>
            <div class="hero-e4"><img src="<?php echo get_template_directory_uri()?>/assets/images/elements/hero-2-e4.png" alt="<?php echo esc_attr__('Hero Element 4', 'rifa-core'); ?>"></div>
            <div class="hero-e5"><img src="<?php echo get_template_directory_uri()?>/assets/images/elements/hero-2-e5.png" alt="<?php echo esc_attr__('Hero Element 5', 'rifa-core'); ?>"></div>
            
            <?php if (!empty($settings['main_image']['url'])) : ?>
            <div class="hero-car-main wow bounceIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                <img src="<?php echo esc_url($settings['main_image']['url']); ?>" alt="<?php echo esc_attr($settings['title']); ?>">
            </div>
            <?php endif; ?>

            <div class="container">
                <div class="row justify-content-center justify-content-lg-start">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="hero__content">
                            <?php if (!empty($settings['subtitle'])) : ?>
                            <div class="hero__subtitle wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.9s">
                                <?php echo esc_html($settings['subtitle']); ?>
                            </div>
                            <?php endif; ?>

                            <?php if (!empty($settings['title'])) : ?>
                            <h2 class="hero__title wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.7s">
                                <?php echo esc_html($settings['title']); ?>
                            </h2>
                            <?php endif; ?>

                            <?php if (!empty($settings['description'])) : ?>
                            <p class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                                <?php echo esc_html($settings['description']); ?>
                            </p>
                            <?php endif; ?>

                            <div class="hero__btn wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                                <?php if (!empty($settings['button_url']['url']) && !empty($settings['button_text'])) : ?>
                                <a href="<?php echo esc_url($settings['button_url']['url']); ?>" class="cmn-btn"
                                   <?php echo !empty($settings['button_url']['is_external']) ? 'target="_blank"' : ''; ?>
                                   <?php echo !empty($settings['button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                    <?php echo esc_html($settings['button_text']); ?>
                                </a>
                                <?php endif; ?>

                                <?php if (!empty($settings['video_url']['url'])) : ?>
                                <a class="video-btn" href="<?php echo esc_url($settings['video_url']['url']); ?>" data-rel="lightcase:myCollection">
                                    <i class="fas fa-play"></i>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}

$widgets_manager->register(new FT_Banner3());
