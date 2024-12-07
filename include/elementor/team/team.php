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
class FT_Team extends Widget_Base
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
        return 'ft-team';
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
        return __('FT Team', 'rifa-core');
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
            'subtitle',
            [
                'label' => esc_html__('Sub Title', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Meet Our most Valued',
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Expert Team Members',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'rifa-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'These are the key drivers that make us different: Safe, Social, Reliable and Fun. Rifa Lotto is dedicated to trust and safety.',
            ]
        );

        // Team Members Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'member_image',
            [
                'label' => esc_html__('Member Image', 'rifa-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'member_name',
            [
                'label' => esc_html__('Name', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Nicolas Hopkins',
            ]
        );

        $repeater->add_control(
            'member_designation',
            [
                'label' => esc_html__('Designation', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'default' => 'CEO',
            ]
        );

        $this->add_control(
            'team_members',
            [
                'label' => esc_html__('Team Members', 'rifa-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'member_name' => 'Nicolas Hopkins',
                        'member_designation' => 'CEO',
                    ],
                    [
                        'member_name' => 'Orlando Mills',
                        'member_designation' => 'CTO',
                    ],
                    [
                        'member_name' => 'Israel Boone',
                        'member_designation' => 'VP, Lottery Operations',
                    ],
                ],
                'title_field' => '{{{ member_name }}}',
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'section_style_header',
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

        // Team Member Card Style
        $this->start_controls_section(
            'section_style_team_card',
            [
                'label' => esc_html__('Team Card Style', 'rifa-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_background',
            [
                'label' => esc_html__('Card Background', 'rifa-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'card_box_shadow',
                'label' => esc_html__('Card Box Shadow', 'rifa-core'),
                'selector' => '{{WRAPPER}} .team-card',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'card_border',
                'label' => esc_html__('Card Border', 'rifa-core'),
                'selector' => '{{WRAPPER}} .team-card',
            ]
        );

        $this->add_control(
            'card_border_radius',
            [
                'label' => esc_html__('Border Radius', 'rifa-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .team-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Member Name Style
        $this->add_control(
            'heading_name_style',
            [
                'label' => esc_html__('Member Name', 'rifa-core'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label' => esc_html__('Name Color', 'rifa-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card__content .name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'label' => esc_html__('Name Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .team-card__content .name',
            ]
        );

        // Member Designation Style
        $this->add_control(
            'heading_designation_style',
            [
                'label' => esc_html__('Designation', 'rifa-core'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'designation_color',
            [
                'label' => esc_html__('Designation Color', 'rifa-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card__content .designation' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'designation_typography',
                'label' => esc_html__('Designation Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .team-card__content .designation',
            ]
        );

        // Image Style
        $this->add_control(
            'heading_image_style',
            [
                'label' => esc_html__('Member Image', 'rifa-core'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'label' => esc_html__('Image Border', 'rifa-core'),
                'selector' => '{{WRAPPER}} .team-card__thumb img',
            ]
        );

        $this->add_control(
            'image_border_radius',
            [
                'label' => esc_html__('Image Border Radius', 'rifa-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .team-card__thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        <section class="pb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="section-header text-center">
                            <?php if(!empty($settings['subtitle'])) : ?>
                                <span class="section-sub-title"><?php echo esc_html($settings['subtitle']); ?></span>
                            <?php endif; ?>
                            
                            <?php if(!empty($settings['title'])) : ?>
                                <h2 class="section-title style--two"><?php echo esc_html($settings['title']); ?></h2>
                            <?php endif; ?>
                            
                            <?php if(!empty($settings['description'])) : ?>
                                <p><?php echo esc_html($settings['description']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-none-30 justify-content-center">
                    <?php foreach($settings['team_members'] as $member) : ?>
                        <div class="col-lg-4 col-sm-6 mb-30">
                            <div class="team-card">
                                <div class="team-card__thumb">
                                    <?php if(!empty($member['member_image']['url'])) : ?>
                                        <img src="<?php echo esc_url($member['member_image']['url']); ?>" alt="<?php echo esc_attr($member['member_name']); ?>">
                                    <?php endif; ?>
                                    <div class="obj">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/elements/team-obj.png" alt="image">
                                    </div>
                                </div>
                                <div class="team-card__content">
                                    <h3 class="name"><?php echo esc_html($member['member_name']); ?></h3>
                                    <span class="designation"><?php echo esc_html($member['member_designation']); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}

$widgets_manager->register(new FT_Team());
