<?php
namespace FTCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class FT_Language_Switcher extends Widget_Base {

    public function get_name() {
        return 'ft-language-switcher';
    }

    public function get_title() {
        return esc_html__('FT Language Switcher', 'rifa-core');
    }

    public function get_icon() {
        return 'eicon-global';
    }

    public function get_categories() {
        return ['rifa-core'];
    }

    protected function register_controls() {
        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'rifa-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'language_code',
            [
                'label' => esc_html__('Language Code', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'en',
            ]
        );

        $repeater->add_control(
            'language_name',
            [
                'label' => esc_html__('Language Name', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'English',
            ]
        );

        $this->add_control(
            'languages',
            [
                'label' => esc_html__('Languages', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'language_code' => 'en',
                        'language_name' => 'English',
                    ],
                    [
                        'language_code' => 'ar',
                        'language_name' => 'العربية',
                    ],
                ],
                'title_field' => '{{{ language_name }}}',
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

        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Text Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .language-select' => 'color: {{VALUE}};',
                ],
                'default' => '#ffffff',
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => esc_html__('Background Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .language-select' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'typography',
                'selector' => '{{WRAPPER}} .language-select',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'selector' => '{{WRAPPER}} .language-select',
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => esc_html__('Border Radius', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .language-select' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'padding',
            [
                'label' => esc_html__('Padding', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .language-select' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $current_lang = isset($_COOKIE['selected_language']) ? $_COOKIE['selected_language'] : 'en';
        ?>
        <div class="language-switcher">
            <select class="language-select" onchange="changeLanguage(this.value)">
                <?php 
                if(!empty($settings['languages'])) {
                    foreach($settings['languages'] as $lang) {
                        if(!empty($lang['language_code']) && !empty($lang['language_name'])) {
                            $selected = ($lang['language_code'] === $current_lang) ? 'selected' : '';
                            printf(
                                '<option value="%s" %s>%s</option>',
                                esc_attr($lang['language_code']),
                                esc_attr($selected),
                                esc_html($lang['language_name'])
                            );
                        }
                    }
                }
                ?>
            </select>
        </div>
        <?php
    }
}

$widgets_manager->register(new FT_Language_Switcher()); 