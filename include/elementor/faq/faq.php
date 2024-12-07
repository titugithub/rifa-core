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
class FT_FAQ extends Widget_Base
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
        return 'ft-faq';
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
        return __('FT FAQ', 'rifa-core');
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
    protected function register_controls() {
        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('FAQ Content', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Header Content
        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'You Have Questions',
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'WE HAVE ANSWERS',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "Do not hesitate to send us an email if you can't find what you're looking for.",
            ]
        );

        // Tab Buttons Repeater
        $repeater_tabs = new \Elementor\Repeater();

        $repeater_tabs->add_control(
            'tab_title',
            [
                'label' => esc_html__('Tab Title', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Tab Title',
            ]
        );

        // FAQ Items Repeater (nested inside tab repeater)
        $repeater_faqs = new \Elementor\Repeater();

        $repeater_faqs->add_control(
            'faq_title',
            [
                'label' => esc_html__('Question', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'How do I deposit funds into my Rifa Lottos account?',
            ]
        );

        $repeater_faqs->add_control(
            'faq_content',
            [
                'label' => esc_html__('Answer', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis',
            ]
        );

        $repeater_tabs->add_control(
            'faq_items',
            [
                'label' => esc_html__('FAQ Items', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater_faqs->get_controls(),
                'default' => [
                    [
                        'faq_title' => 'How do I deposit funds into my Rifa Lottos account?',
                        'faq_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis',
                    ],
                    [
                        'faq_title' => 'What will the payment reflect as on my credit card statement?',
                        'faq_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis',
                    ],
                    [
                        'faq_title' => 'How long does it take for funds to reflect in my account?',
                        'faq_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis',
                    ],
                    [
                        'faq_title' => 'What payment methods are available?',
                        'faq_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis',
                    ],
                    [
                        'faq_title' => 'Is there a minimum deposit amount?',
                        'faq_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis',
                    ],
                ],
                'title_field' => '{{{ faq_title }}}',
            ]
        );

        $this->add_control(
            'tabs',
            [
                'label' => esc_html__('FAQ Tabs', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater_tabs->get_controls(),
                'default' => [
                    [
                        'tab_title' => 'rifa tickets',
                    ],
                    [
                        'tab_title' => 'banking',
                    ],
                    [
                        'tab_title' => 'winning',
                    ],
                    [
                        'tab_title' => 'results & alerts',
                    ],
                    [
                        'tab_title' => 'about rifa',
                    ],
                ],
                'title_field' => '{{{ tab_title }}}',
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
            'header_style_heading',
            [
                'label' => esc_html__('Header Style', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-sub-title' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-header p' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        // Tab Button Style
        $this->add_control(
            'tab_style_heading',
            [
                'label' => esc_html__('Tab Button Style', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->start_controls_tabs('tab_button_style');

        // Normal State
        $this->start_controls_tab(
            'tab_button_normal',
            [
                'label' => esc_html__('Normal', 'rifa-core'),
            ]
        );

        $this->add_control(
            'tab_button_color',
            [
                'label' => esc_html__('Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nav-link' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'tab_button_bg',
            [
                'label' => esc_html__('Background', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nav-link' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_tab();

        // Active State
        $this->start_controls_tab(
            'tab_button_active',
            [
                'label' => esc_html__('Active', 'rifa-core'),
            ]
        );

        $this->add_control(
            'tab_button_active_color',
            [
                'label' => esc_html__('Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nav-link.active' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'tab_button_active_bg',
            [
                'label' => esc_html__('Background', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nav-link.active' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        // Accordion Style
        $this->add_control(
            'accordion_style_heading',
            [
                'label' => esc_html__('Accordion Style', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->start_controls_tabs('accordion_style');

        // Normal State
        $this->start_controls_tab(
            'accordion_normal',
            [
                'label' => esc_html__('Normal', 'rifa-core'),
            ]
        );

        $this->add_control(
            'accordion_title_color',
            [
                'label' => esc_html__('Title Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card-header button' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'accordion_bg',
            [
                'label' => esc_html__('Background', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_tab();

        // Active State
        $this->start_controls_tab(
            'accordion_active',
            [
                'label' => esc_html__('Active', 'rifa-core'),
            ]
        );

        $this->add_control(
            'accordion_active_title_color',
            [
                'label' => esc_html__('Title Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card-header button:not(.collapsed)' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'accordion_active_bg',
            [
                'label' => esc_html__('Background', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card-header button:not(.collapsed)' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        // Content Style
        $this->add_control(
            'content_style_heading',
            [
                'label' => esc_html__('Content Style', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => esc_html__('Text Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card-body p' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'content_bg',
            [
                'label' => esc_html__('Background', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card-body' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        // Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .section-title',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tab_typography',
                'label' => esc_html__('Tab Button Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .nav-link',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'accordion_typography',
                'label' => esc_html__('Accordion Title Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .card-header button',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => esc_html__('Content Typography', 'rifa-core'),
                'selector' => '{{WRAPPER}} .card-body',
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
    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>

        <section class="pb-120 mt-minus-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="faq-top-wrapper pt-120">
                            <div class="section-header text-center">
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

                            <?php if(!empty($settings['tabs'])): ?>
                                <ul class="nav nav-tabs cmn-tabs justify-content-center" id="myTab" role="tablist">
                                    <?php foreach($settings['tabs'] as $index => $tab): 
                                        $isActive = $index === 1 ? 'active' : '';
                                        $isSelected = $index === 1 ? 'true' : 'false';
                                        $tabId = 'tab-' . $index;
                                    ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link <?php echo esc_attr($isActive); ?>" 
                                                    id="<?php echo esc_attr($tabId); ?>-tab" 
                                                    data-bs-toggle="tab" 
                                                    data-bs-target="#<?php echo esc_attr($tabId); ?>" 
                                                    role="tab" 
                                                    aria-controls="<?php echo esc_attr($tabId); ?>" 
                                                    aria-selected="<?php echo esc_attr($isSelected); ?>">
                                                <?php echo esc_html($tab['tab_title']); ?>
                                            </button>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="faq-body-wrapper">
                            <div class="tab-content" id="myTabContent">
                                <?php foreach($settings['tabs'] as $index => $tab): 
                                    $isActive = $index === 1 ? 'show active' : '';
                                    $tabId = 'tab-' . $index;
                                ?>
                                    <div class="tab-pane fade <?php echo esc_attr($isActive); ?>" 
                                         id="<?php echo esc_attr($tabId); ?>" 
                                         role="tabpanel" 
                                         aria-labelledby="<?php echo esc_attr($tabId); ?>-tab">
                                        
                                        <div class="accordion cmn-accordion" id="faqAcc-<?php echo esc_attr($index); ?>">
                                            <?php 
                                            if(!empty($tab['faq_items'])):
                                                foreach($tab['faq_items'] as $faq_index => $faq): 
                                                    $isFirst = $faq_index === 0 ? 'show' : '';
                                                    $faqId = 'faq-' . $index . '-' . $faq_index;
                                            ?>
                                                <div class="card">
                                                    <div class="card-header" id="heading-<?php echo esc_attr($faqId); ?>">
                                                        <button class="btn btn-link btn-block text-left <?php echo $faq_index === 0 ? '' : 'collapsed'; ?>" 
                                                                type="button" 
                                                                data-bs-toggle="collapse" 
                                                                data-bs-target="#collapse-<?php echo esc_attr($faqId); ?>" 
                                                                aria-expanded="<?php echo $faq_index === 0 ? 'true' : 'false'; ?>" 
                                                                aria-controls="collapse-<?php echo esc_attr($faqId); ?>">
                                                            <?php echo esc_html($faq['faq_title']); ?>
                                                        </button>
                                                    </div>
                                                    <div id="collapse-<?php echo esc_attr($faqId); ?>" 
                                                         class="collapse <?php echo esc_attr($isFirst); ?>" 
                                                         aria-labelledby="heading-<?php echo esc_attr($faqId); ?>" 
                                                         data-bs-parent="#faqAcc-<?php echo esc_attr($index); ?>">
                                                            <div class="card-body">
                                                                <?php echo wp_kses_post($faq['faq_content']); ?>
                                                            </div>
                                                        </div>
                                                </div>
                                            <?php 
                                                endforeach;
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
    }
}

$widgets_manager->register(new FT_FAQ());
