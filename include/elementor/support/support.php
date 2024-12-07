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
class FT_Support extends Widget_Base
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
        return 'ft-support';
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
        return __('FT Support', 'rifa-core');
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

        $this->add_control(
            'section_subtitle',
            [
                'label' => esc_html__('Section Subtitle', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Get in touch with our friendly support',
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label' => esc_html__('Section Title', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Customer Support',
            ]
        );

        $this->add_control(
            'section_description',
            [
                'label' => esc_html__('Section Description', 'rifa-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Have a question or need help? Contact our friendly support team.',
            ]
        );

        // Support Cards Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'card_image',
            [
                'label' => esc_html__('Card Image', 'rifa-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'card_title',
            [
                'label' => esc_html__('Card Title', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Talk to our support team',
            ]
        );

        $repeater->add_control(
            'card_description',
            [
                'label' => esc_html__('Card Description', 'rifa-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Got a question about Lotteries? Get in touch with our friendly staff.',
            ]
        );

        $repeater->add_control(
            'show_contact_buttons',
            [
                'label' => esc_html__('Show Contact Buttons', 'rifa-core'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $repeater->add_control(
            'phone_number',
            [
                'label' => esc_html__('Phone Number', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'show_contact_buttons' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'email',
            [
                'label' => esc_html__('Email Address', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'show_contact_buttons' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'faq_button_text',
            [
                'label' => esc_html__('FAQ Button Text', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'show_contact_buttons' => '',
                ],
            ]
        );

        $repeater->add_control(
            'faq_button_url',
            [
                'label' => esc_html__('FAQ Button URL', 'rifa-core'),
                'type' => Controls_Manager::URL,
                'condition' => [
                    'show_contact_buttons' => '',
                ],
            ]
        );

        $this->add_control(
            'support_cards',
            [
                'label' => esc_html__('Support Cards', 'rifa-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'card_title' => 'Talk to our support team',
                        'card_description' => 'Got a question about Lotteries? Get in touch with our friendly staff.',
                        'show_contact_buttons' => 'yes',
                    ],
                    [
                        'card_title' => 'Our Guide to Rifa',
                        'card_description' => 'Check out our FAQs to see if we can help you out.',
                        'show_contact_buttons' => '',
                    ],
                ],
                'title_field' => '{{{ card_title }}}',
            ]
        );

        $this->end_controls_section();

        // Style Controls
        $this->start_controls_section(
            'section_style_header',
            [
                'label' => esc_html__('Section Header', 'rifa-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

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
                'label' => esc_html__('Subtitle Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .section-sub-title',
            ]
        );

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
                'label' => esc_html__('Title Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .section-title',
            ]
        );

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
                'label' => esc_html__('Description Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .section-header p',
            ]
        );

        $this->end_controls_section();

        // Card Style Section
        $this->start_controls_section(
            'section_style_card',
            [
                'label' => esc_html__('Support Card', 'rifa-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'card_background',
                'label' => esc_html__('Card Background', 'rifa-core'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .support-card',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'card_border',
                'label' => esc_html__('Card Border', 'rifa-core'),
                'selector' => '{{WRAPPER}} .support-card',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'card_box_shadow',
                'label' => esc_html__('Card Box Shadow', 'rifa-core'),
                'selector' => '{{WRAPPER}} .support-card',
            ]
        );

        $this->add_responsive_control(
            'card_padding',
            [
                'label' => esc_html__('Card Padding', 'rifa-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .support-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_border_radius',
            [
                'label' => esc_html__('Border Radius', 'rifa-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .support-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'card_title_color',
            [
                'label' => esc_html__('Card Title Color', 'rifa-core'),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .support-card__title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'card_title_typography',
                'label' => esc_html__('Card Title Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .support-card__title',
            ]
        );

        $this->add_control(
            'card_description_color',
            [
                'label' => esc_html__('Card Description Color', 'rifa-core'),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .support-card__content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'card_description_typography',
                'label' => esc_html__('Card Description Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .support-card__content p',
            ]
        );

        $this->end_controls_section();

        // Button Style Section
        $this->start_controls_section(
            'section_style_buttons',
            [
                'label' => esc_html__('Buttons', 'rifa-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Normal Button Style
        $this->add_control(
            'button_normal_heading',
            [
                'label' => esc_html__('Normal Button', 'rifa-core'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Text Color', 'rifa-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-border' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_background_color',
            [
                'label' => esc_html__('Background Color', 'rifa-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-border' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Primary Button Style
        $this->add_control(
            'button_primary_heading',
            [
                'label' => esc_html__('Primary Button', 'rifa-core'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'primary_button_text_color',
            [
                'label' => esc_html__('Text Color', 'rifa-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'primary_button_background_color',
            [
                'label' => esc_html__('Background Color', 'rifa-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => esc_html__('Button Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .btn-border, {{WRAPPER}} .cmn-btn',
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__('Button Padding', 'rifa-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .btn-border, {{WRAPPER}} .cmn-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'label' => esc_html__('Button Border', 'rifa-core'),
                'selector' => '{{WRAPPER}} .btn-border, {{WRAPPER}} .cmn-btn',
            ]
        );

        $this->add_responsive_control(
            'button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'rifa-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .btn-border, {{WRAPPER}} .cmn-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        <?php if(!empty($settings)) : ?>
        <section class="pb-120">
            <div class="container">
                <?php if(!empty($settings['section_subtitle']) || !empty($settings['section_title']) || !empty($settings['section_description'])) : ?>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-header text-center">
                            <?php if(!empty($settings['section_subtitle'])) : ?>
                                <span class="section-sub-title"><?php echo esc_html($settings['section_subtitle']); ?></span>
                            <?php endif; ?>
                            <?php if(!empty($settings['section_title'])) : ?>
                                <h2 class="section-title"><?php echo esc_html($settings['section_title']); ?></h2>
                            <?php endif; ?>
                            <?php if(!empty($settings['section_description'])) : ?>
                                <p><?php echo esc_html($settings['section_description']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if(!empty($settings['support_cards'])) : ?>
                <div class="row mb-none-30">
                    <?php foreach($settings['support_cards'] as $index => $card) : ?>
                        <?php if(!empty($card)) : ?>
                        <div class="col-lg-6 mb-30 wow zoomIn" data-wow-duration="0.5s" data-wow-delay="0.<?php echo $index + 3; ?>s">
                            <div class="support-card">
                                <?php if(!empty($card['card_image']) && !empty($card['card_image']['url'])) : ?>
                                <div class="support-card__thumb">
                                    <img src="<?php echo esc_url($card['card_image']['url']); ?>" 
                                         alt="<?php echo !empty($card['card_title']) ? esc_attr($card['card_title']) : ''; ?>">
                                </div>
                                <?php endif; ?>

                                <?php if(!empty($card['card_title']) || !empty($card['card_description'])) : ?>
                                <div class="support-card__content">
                                    <?php if(!empty($card['card_title'])) : ?>
                                        <h3 class="support-card__title"><?php echo esc_html($card['card_title']); ?></h3>
                                    <?php endif; ?>
                                    
                                    <?php if(!empty($card['card_description'])) : ?>
                                        <p><?php echo esc_html($card['card_description']); ?></p>
                                    <?php endif; ?>

                                    <?php if(!empty($card['show_contact_buttons']) || !empty($card['faq_button_text'])) : ?>
                                    <div class="btn-grp justify-content-xl-start mt-3">
                                        <?php if($card['show_contact_buttons'] === 'yes') : ?>
                                            <?php if(!empty($card['phone_number'])) : ?>
                                                <a href="tel:<?php echo esc_attr($card['phone_number']); ?>" class="btn-border btn-sm text-capitalize">
                                                    <?php esc_html_e('Call us', 'rifa-core'); ?> 
                                                    <i class="fas fa-phone-alt"></i>
                                                </a>
                                            <?php endif; ?>
                                            
                                            <?php if(!empty($card['email'])) : ?>
                                                <a href="mailto:<?php echo esc_attr($card['email']); ?>" class="cmn-btn btn-sm text-capitalize">
                                                    <?php esc_html_e('Email us', 'rifa-core'); ?> 
                                                    <i class="far fa-envelope"></i>
                                                </a>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <?php if(!empty($card['faq_button_text']) && !empty($card['faq_button_url']) && !empty($card['faq_button_url']['url'])) : ?>
                                                <a href="<?php echo esc_url($card['faq_button_url']['url']); ?>" 
                                                   class="btn-border btn-sm text-capitalize"
                                                   <?php echo !empty($card['faq_button_url']['is_external']) ? 'target="_blank"' : ''; ?>
                                                   <?php echo !empty($card['faq_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                                    <?php echo esc_html($card['faq_button_text']); ?>
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </section>
        <?php endif; ?>
        <?php
    }
}

$widgets_manager->register(new FT_Support());
