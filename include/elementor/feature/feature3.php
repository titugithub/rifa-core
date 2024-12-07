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
class FT_Feature3 extends Widget_Base
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
        return 'ft-feature3';
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
        return __('FT Feature 3', 'rifa-core');
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
            'section_content',
            [
                'label' => __('Content', 'rifa-core'),
            ]
        );

        $this->add_control(
            'subtitle',
            array(
                'label' => esc_html__('Sub Title', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Getting started? It\'s simple', 'rifa-core'),
            )
        );

        $this->add_control(
            'title',
            array(
                'label' => esc_html__('Title', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('How it works', 'rifa-core'),
            )
        );

        $this->add_control(
            'description',
            array(
                'label' => esc_html__('Description', 'rifa-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('The affiliate program is our special feature for Customers. Invite users and earn 40% commission', 'rifa-core'),
            )
        );

        // Repeater for work cards
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'card_icon',
            array(
                'label' => esc_html__('Icon Image', 'rifa-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
            )
        );

        $repeater->add_control(
            'card_title',
            array(
                'label' => esc_html__('Card Title', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Sign up', 'rifa-core'),
            )
        );

        $repeater->add_control(
            'card_description',
            array(
                'label' => esc_html__('Card Description', 'rifa-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Register with us as an affiliate in just a few easy steps', 'rifa-core'),
            )
        );

        $this->add_control(
            'work_cards',
            array(
                'label' => esc_html__('Work Cards', 'rifa-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => array(
                    array(
                        'card_title' => esc_html__('Sign up', 'rifa-core'),
                        'card_description' => esc_html__('Register with us as an affiliate in just a few easy steps', 'rifa-core'),
                    ),
                    array(
                        'card_title' => esc_html__('Promote', 'rifa-core'),
                        'card_description' => esc_html__('Get links or custom affiliate links we provide', 'rifa-core'),
                    ),
                    array(
                        'card_title' => esc_html__('earn', 'rifa-core'),
                        'card_description' => esc_html__('You receive commission on every referral', 'rifa-core'),
                    ),
                ),
                'title_field' => '{{{ card_title }}}',
            )
        );

        $this->end_controls_section();

        // Style Section for Header
        $this->start_controls_section(
            'header_style_section',
            [
                'label' => esc_html__('Header Style', 'rifa-core'),
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
                'label' => esc_html__('Subtitle Typography', 'rifa-core'),
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
                'label' => esc_html__('Title Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .section-title',
            ]
        );

        // Description Style
        $this->add_control(
            'desc_color',
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
                'name' => 'desc_typography',
                'label' => esc_html__('Description Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .section-header p',
            ]
        );

        $this->end_controls_section();

        // Style Section for Cards
        $this->start_controls_section(
            'cards_style_section',
            [
                'label' => esc_html__('Cards Style', 'rifa-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Card Box Style
        $this->add_control(
            'card_background',
            [
                'label' => esc_html__('Card Background', 'rifa-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .work-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'card_box_shadow',
                'label' => esc_html__('Box Shadow', 'rifa-core'),
                'selector' => '{{WRAPPER}} .work-card',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'card_border',
                'label' => esc_html__('Border', 'rifa-core'),
                'selector' => '{{WRAPPER}} .work-card',
            ]
        );

        $this->add_control(
            'card_border_radius',
            [
                'label' => esc_html__('Border Radius', 'rifa-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .work-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_padding',
            [
                'label' => esc_html__('Padding', 'rifa-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .work-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Card Icon Style
        $this->add_control(
            'icon_heading',
            [
                'label' => esc_html__('Icon Style', 'rifa-core'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__('Icon Size', 'rifa-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .work-card__icon img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Card Title Style
        $this->add_control(
            'card_title_color',
            [
                'label' => esc_html__('Card Title Color', 'rifa-core'),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .work-card__title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'card_title_typography',
                'label' => esc_html__('Card Title Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .work-card__title',
            ]
        );

        // Card Description Style
        $this->add_control(
            'card_desc_color',
            [
                'label' => esc_html__('Card Description Color', 'rifa-core'),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .work-card__content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'card_desc_typography',
                'label' => esc_html__('Card Description Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .work-card__content p',
            ]
        );

        // Section Spacing
        $this->add_control(
            'spacing_heading',
            [
                'label' => esc_html__('Spacing', 'rifa-core'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'section_padding',
            [
                'label' => esc_html__('Section Padding', 'rifa-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .pt-120.pb-120' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        <section class="pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-header text-center">
                            <?php if (!empty($settings['subtitle'])) : ?>
                                <span class="section-sub-title"><?php echo wp_kses($settings['subtitle'], array()); ?></span>
                            <?php endif; ?>
                            
                            <?php if (!empty($settings['title'])) : ?>
                                <h2 class="section-title style--two"><?php echo wp_kses($settings['title'], array()); ?></h2>
                            <?php endif; ?>
                            
                            <?php if (!empty($settings['description'])) : ?>
                                <p><?php echo wp_kses($settings['description'], array()); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-none-30 justify-content-center">
                    <?php 
                    if (!empty($settings['work_cards']) && is_array($settings['work_cards'])) :
                        foreach ($settings['work_cards'] as $card) : 
                    ?>
                        <div class="col-lg-4 col-sm-6 mb-30">
                            <div class="work-card text-center">
                                <div class="work-card__icon">
                                    <div class="inner">
                                        <?php if (!empty($card['card_icon']['url'])) : ?>
                                            <img src="<?php echo esc_url($card['card_icon']['url']); ?>" alt="<?php echo esc_attr($card['card_title']); ?>">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="work-card__content">
                                    <?php if (!empty($card['card_title'])) : ?>
                                        <h3 class="work-card__title"><?php echo wp_kses($card['card_title'], array()); ?></h3>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($card['card_description'])) : ?>
                                        <p><?php echo wp_kses($card['card_description'], array()); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php 
                        endforeach; 
                    endif;
                    ?>
                </div>
            </div>
        </section>
        <?php
    }
}

$widgets_manager->register(new FT_Feature3());
