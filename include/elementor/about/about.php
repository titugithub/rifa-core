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
class FT_About extends Widget_Base
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
        return 'ft-about';
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
        return __('FT About', 'rifa-core');
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
            'content_section',
            [
                'label' => esc_html__('Content', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Section Header Controls
        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Section Subtitle', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Need to know about',
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Section Title', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'How To Play',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Section Description', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Follow these 3 easy steps!',
            ]
        );

        // Add this control inside the content_section in register_controls()
        $this->add_control(
            'play_element_image',
            [
                'label' => esc_html__('Play Element Image', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                'separator' => 'before',
            ]
        );

        



        // Steps Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'step_number',
            [
                'label' => esc_html__('Step Number', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '01',
            ]
        );

        $repeater->add_control(
            'step_icon',
            [
                'label' => esc_html__('Step Icon', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $repeater->add_control(
            'step_bg',
            [
                'label' => esc_html__('Card Background', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $repeater->add_control(
            'step_title',
            [
                'label' => esc_html__('Step Title', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Choose',
            ]
        );

        $repeater->add_control(
            'step_description',
            [
                'label' => esc_html__('Step Description', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Register to RIFA & Choose your contest',
            ]
        );

        $this->add_control(
            'steps',
            [
                'label' => esc_html__('Steps', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'step_number' => '01',
                        'step_title' => 'Choose',
                        'step_description' => 'Register to RIFA & Choose your contest',
                    ],
                    [
                        'step_number' => '02', 
                        'step_title' => 'Buy',
                        'step_description' => 'Pick Your Numbers & Complete your Purchase',
                    ],
                    [
                        'step_number' => '03',
                        'step_title' => 'Win',
                        'step_description' => 'Start Dreaming, you\'re almost there',
                    ],
                ],
                'title_field' => '{{{ step_title }}}',
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Header Style
        $this->add_control(
            'header_style',
            [
                'label' => esc_html__('Header Style', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Subtitle Style
        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
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
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
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
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-header p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .section-header p',
            ]
        );

        // Card Style
        $this->add_control(
            'card_style',
            [
                'label' => esc_html__('Card Style', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Card Background
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'card_background',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .play-card',
            ]
        );

        // Card Padding
        $this->add_responsive_control(
            'card_padding',
            [
                'label' => esc_html__('Card Padding', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .play-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Card Border
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'card_border',
                'selector' => '{{WRAPPER}} .play-card',
            ]
        );

        // Card Border Radius
        $this->add_control(
            'card_border_radius',
            [
                'label' => esc_html__('Border Radius', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .play-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Card Title Style
        $this->add_control(
            'card_title_color',
            [
                'label' => esc_html__('Card Title Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .play-card__title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'card_title_typography',
                'selector' => '{{WRAPPER}} .play-card__title',
            ]
        );

        // Card Description Style
        $this->add_control(
            'card_description_color',
            [
                'label' => esc_html__('Card Description Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .play-card__content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'card_description_typography',
                'selector' => '{{WRAPPER}} .play-card__content p',
            ]
        );

        // Number Style
        $this->add_control(
            'number_color',
            [
                'label' => esc_html__('Number Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .play-card__number' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'number_typography',
                'selector' => '{{WRAPPER}} .play-card__number',
            ]
        );

        // Icon Style
        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__('Icon Size', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .play-card__icon img' => 'width: {{SIZE}}{{UNIT}};',
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
        <section class="position-relative z-index-two pt-120 pb-120 overflow-hidden">
            <?php if(!empty($settings['play_element_image']['url'])): ?>
            <div class="play-elements wow bounceIn" data-wow-duration="0.5s" data-wow-delay="0.7s">
                <img src="<?php echo esc_url($settings['play_element_image']['url']); ?>" alt="<?php echo esc_attr(get_post_meta($settings['play_element_image']['id'], '_wp_attachment_image_alt', true)); ?>">
            </div>
            <?php endif; ?>
            <div class="container">
                <?php if(!empty($settings['subtitle']) || !empty($settings['title']) || !empty($settings['description'])): ?>
                <div class="row">
                    <div class="col-lg-6 text-sm-start text-center wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                        <div class="section-header">
                            <?php if(!empty($settings['subtitle'])): ?>
                                <span class="section-sub-title"><?php echo esc_html($settings['subtitle']); ?></span>
                            <?php endif; ?>
                            
                            <?php if(!empty($settings['title'])): ?>
                                <h2 class="section-title"><?php echo esc_html($settings['title']); ?></h2>
                            <?php endif; ?>
                            
                            <?php if(!empty($settings['description'])): ?>
                                <p><?php echo esc_html($settings['description']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if(!empty($settings['steps'])): ?>
                <div class="row mb-none-30 justify-content-xl-start justify-content-center">
                    <?php foreach ($settings['steps'] as $step) : ?>
                        <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
                            <div class="play-card" <?php if(!empty($step['step_bg']['url'])): ?>style="background-image: url('<?php echo esc_url($step['step_bg']['url']); ?>');"<?php endif; ?>>
                                <div class="play-card__icon">
                                    <?php if(!empty($step['step_icon']['url'])): ?>
                                        <img src="<?php echo esc_url($step['step_icon']['url']); ?>" alt="image-icon">
                                    <?php endif; ?>
                                    
                                    <?php if(!empty($step['step_number'])): ?>
                                        <span class="play-card__number"><?php echo esc_html($step['step_number']); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="play-card__content">
                                    <?php if(!empty($step['step_title'])): ?>
                                        <h3 class="play-card__title"><?php echo esc_html($step['step_title']); ?></h3>
                                    <?php endif; ?>
                                    
                                    <?php if(!empty($step['step_description'])): ?>
                                        <p><?php echo esc_html($step['step_description']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </section>
        <?php
    }
}

$widgets_manager->register(new FT_About());
