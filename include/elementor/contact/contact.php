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
class FT_Contact extends Widget_Base
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
        return 'ft-contact';
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
        return __('FT Contact', 'rifa-core');
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
            'title',
            [
                'label' => esc_html__('Title', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Contact', 'rifa-core'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__("We'd love to talk about how we can work together. Send us a message below and we'll respond as soon as possible.", 'rifa-core'),
            ]
        );

        $this->add_control(
            'form_title',
            [
                'label' => esc_html__('Form Title', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Drop us a message', 'rifa-core'),
            ]
        );

        $this->add_control(
            'form_shortcode',
            [
                'label' => esc_html__( 'Form Shortcode', 'rifa-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( '[contact-form-7 id="2063fc4" title="Contact Form for Contact Page"]', 'rifa-core' ),
            ]
        );

       
        // Contact Info
        $this->add_control(
            'phone',
            [
                'label' => esc_html__('Phone Number', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '+0123 456789',
            ]
        );

        $this->add_control(
            'email',
            [
                'label' => esc_html__('Email', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'info@rifa.com',
            ]
        );

        $this->add_control(
            'contact_image',
            [
                'label' => esc_html__('Contact Image', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/elements/contact.png',
                ],
            ]
        );

        // Social Stats Repeater
        $this->add_control(
            'show_social_stats',
            [
                'label' => esc_html__('Show Social Stats', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );

        $repeater->add_control(
            'count',
            [
                'label' => esc_html__('Count', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '130k',
            ]
        );

        $repeater->add_control(
            'label',
            [
                'label' => esc_html__('Label', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Followers',
            ]
        );

        $this->add_control(
            'social_stats',
            [
                'label' => esc_html__('Social Stats', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'icon' => [
                            'value' => 'fab fa-facebook-f',
                            'library' => 'fa-brands',
                        ],
                        'count' => '130k',
                        'label' => 'Followers',
                    ],
                    [
                        'icon' => [
                            'value' => 'fas fa-users',
                            'library' => 'fa-solid',
                        ],
                        'count' => '35k',
                        'label' => 'Members',
                    ],
                    [
                        'icon' => [
                            'value' => 'fab fa-twitter',
                            'library' => 'fa-brands',
                        ],
                        'count' => '47k',
                        'label' => 'Followers',
                    ],
                    [
                        'icon' => [
                            'value' => 'fas fa-envelope',
                            'library' => 'fa-solid',
                        ],
                        'count' => '29k',
                        'label' => 'Subscribers',
                    ],
                ],
                'condition' => [
                    'show_social_stats' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'phone_icon',
            [
                'label' => esc_html__('Phone Icon', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/icon/contact/1.png',
                ],
            ]
        );

        $this->add_control(
            'email_icon',
            [
                'label' => esc_html__('Email Icon', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/icon/contact/2.png',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section for Header
        $this->start_controls_section(
            'header_style_section',
            [
                'label' => esc_html__('Header Style', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
            'title_color',
            [
                'label' => esc_html__('Title Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title' => 'color: {{VALUE}};',
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

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-header p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section for Form
        $this->start_controls_section(
            'form_style_section',
            [
                'label' => esc_html__('Form Style', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'form_title_typography',
                'label' => esc_html__('Form Title Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .contact-form-wrapper .title',
            ]
        );

        $this->add_control(
            'form_title_color',
            [
                'label' => esc_html__('Form Title Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-form-wrapper .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'form_background',
                'label' => esc_html__('Form Background', 'rifa-core'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .contact-form-wrapper',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'form_border',
                'label' => esc_html__('Form Border', 'rifa-core'),
                'selector' => '{{WRAPPER}} .contact-form-wrapper',
            ]
        );

        $this->add_responsive_control(
            'form_padding',
            [
                'label' => esc_html__('Form Padding', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .contact-form-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section for Contact Info
        $this->start_controls_section(
            'contact_info_style_section',
            [
                'label' => esc_html__('Contact Info Style', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'info_label_typography',
                'label' => esc_html__('Label Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .contact-info__content p',
            ]
        );

        $this->add_control(
            'info_label_color',
            [
                'label' => esc_html__('Label Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-info__content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'info_value_typography',
                'label' => esc_html__('Value Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .contact-info__content span',
            ]
        );

        $this->add_control(
            'info_value_color',
            [
                'label' => esc_html__('Value Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-info__content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'contact_icon_heading',
            [
                'label' => esc_html__('Contact Icons', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'contact_icon_size',
            [
                'label' => esc_html__('Icon Size', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 20,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .contact-info__icon img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'contact_icon_background',
            [
                'label' => esc_html__('Icon Background', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-info__icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'contact_icon_padding',
            [
                'label' => esc_html__('Icon Padding', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .contact-info__icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section for Social Stats
        $this->start_controls_section(
            'social_stats_style_section',
            [
                'label' => esc_html__('Social Stats Style', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_social_stats' => 'yes'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'stats_number_typography',
                'label' => esc_html__('Number Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .social-card__content h3',
            ]
        );

        $this->add_control(
            'stats_number_color',
            [
                'label' => esc_html__('Number Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-card__content h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'stats_label_typography',
                'label' => esc_html__('Label Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .social-card__content span',
            ]
        );

        $this->add_control(
            'stats_label_color',
            [
                'label' => esc_html__('Label Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-card__content span' => 'color: {{VALUE}};',
                ],
            ]
        );



        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'social_card_background',
                'label' => esc_html__('Card Background', 'rifa-core'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .social-card',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'social_card_border',
                'label' => esc_html__('Card Border', 'rifa-core'),
                'selector' => '{{WRAPPER}} .social-card',
            ]
        );

        $this->add_responsive_control(
            'social_card_padding',
            [
                'label' => esc_html__('Card Padding', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .social-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'social_icon_size',
            [
                'label' => esc_html__('Icon Size', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
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
                    '{{WRAPPER}} .social-card__icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .social-card__icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'social_icon_background',
            [
                'label' => esc_html__('Icon Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-card__icon svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'social_icon_padding',
            [
                'label' => esc_html__('Icon Padding', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .social-card__icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'social_icon_border',
                'label' => esc_html__('Icon Border', 'rifa-core'),
                'selector' => '{{WRAPPER}} .social-card__icon',
            ]
        );

        $this->add_responsive_control(
            'social_icon_border_radius',
            [
                'label' => esc_html__('Border Radius', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .social-card__icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        <section class="mt-minus-270 pb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-header text-center">
                            <h2 class="section-title"><?php echo !empty($settings['title']) ? esc_html($settings['title']) : ''; ?></h2>
                            <p><?php echo !empty($settings['description']) ? esc_html($settings['description']) : ''; ?></p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="contact-wrapper">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="contact-form-wrapper">
                                        <h3 class="title"><?php echo !empty($settings['form_title']) ? esc_html($settings['form_title']) : ''; ?></h3>
                                        <?php echo !empty($settings['form_shortcode']) ? do_shortcode($settings['form_shortcode']) : ''; ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact-info-wrapper">
                                        <div class="d-flex flex-wrap justify-content-between w-100">
                                            <div class="contact-info">
                                                <div class="contact-info__icon">
                                                    <?php if(!empty($settings['phone_icon']['url'])) : ?>
                                                        <img src="<?php echo esc_url($settings['phone_icon']['url']); ?>" alt="<?php echo esc_attr__('Phone Icon', 'rifa-core'); ?>">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="contact-info__content">
                                                    <p><?php echo esc_html__('Phone Number', 'rifa-core'); ?></p>
                                                    <span><?php echo !empty($settings['phone']) ? esc_html($settings['phone']) : ''; ?></span>
                                                </div>
                                            </div><!-- contact-info end -->
                                            <div class="contact-info">
                                                <div class="contact-info__icon">
                                                    <?php if(!empty($settings['email_icon']['url'])) : ?>
                                                        <img src="<?php echo esc_url($settings['email_icon']['url']); ?>" alt="<?php echo esc_attr__('Email Icon', 'rifa-core'); ?>">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="contact-info__content">
                                                    <p><?php echo esc_html__('Email', 'rifa-core'); ?></p>
                                                    <span><?php echo !empty($settings['email']) ? esc_html($settings['email']) : ''; ?></span>
                                                </div>
                                            </div><!-- contact-info end -->
                                        </div>
                                        <div class="contact-thumb">
                                            <?php if(!empty($settings['contact_image']['url'])) : ?>
                                                <img src="<?php echo esc_url($settings['contact_image']['url']); ?>" alt="<?php echo esc_attr__('Contact Image', 'rifa-core'); ?>">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(!empty($settings['show_social_stats']) && 'yes' === $settings['show_social_stats']) : ?>
                <div class="row pt-120 mb-none-30">
                    <?php 
                    if(!empty($settings['social_stats'])) :
                        foreach($settings['social_stats'] as $stat) : 
                    ?>
                    <div class="col-lg-3 col-sm-6 mb-30">
                        <div class="social-card">
                            <div class="social-card__icon">
                                <?php 
                                if(!empty($stat['icon']['value'])) {
                                    \Elementor\Icons_Manager::render_icon($stat['icon'], ['aria-hidden' => 'true']); 
                                }
                                ?>
                            </div>
                            <div class="social-card__content">
                                <h3><?php echo !empty($stat['count']) ? esc_html($stat['count']) : ''; ?></h3>
                                <span><?php echo !empty($stat['label']) ? esc_html($stat['label']) : ''; ?></span>
                            </div>
                        </div>
                    </div>
                    <?php 
                        endforeach;
                    endif;
                    ?>
                </div>
                <?php endif; ?>
            </div>
        </section>
        <?php
    }
}

$widgets_manager->register(new FT_Contact());
