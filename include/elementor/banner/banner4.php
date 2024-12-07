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
class FT_Banner4 extends Widget_Base
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
        return 'ft-banner4';
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
        return __('FT Banner4', 'rifa-core');
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
                'label' => esc_html__('Subtitle', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Try Your Luck!',
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Win Your Dream Car',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'rifa-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("Don't miss your chance. Will you be our next lucky winner?", 'rifa-core'),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Participate Now',
            ]
        );

        $this->add_control(
            'button_url',
            [
                'label' => esc_html__('Button URL', 'rifa-core'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'rifa-core'),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'video_url',
            [
                'label' => esc_html__('Video URL', 'rifa-core'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://www.youtube.com/...', 'rifa-core'),
                'default' => [
                    'url' => 'https://www.youtube.com/embed/d6xn5uflUjg',
                ],
            ]
        );

        $this->end_controls_section();

        // Images Tab
        $this->start_controls_section(
            'section_images',
            [
                'label' => esc_html__('Images', 'rifa-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'circle_image',
            [
                'label' => esc_html__('Circle Image', 'rifa-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/elements/hero-4-circle.png',
                ],
            ]
        );

        $this->add_control(
            'obj_image',
            [
                'label' => esc_html__('Object Image', 'rifa-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/elements/hero-4-obj.png',
                ],
            ]
        );

        $this->add_control(
            'car_left_image',
            [
                'label' => esc_html__('Left Car Image', 'rifa-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/elements/hero-4-car-left.png',
                ],
            ]
        );

        $this->add_control(
            'bike_image',
            [
                'label' => esc_html__('Bike Image', 'rifa-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/elements/hero-4-bike.png',
                ],
            ]
        );

        $this->add_control(
            'car_right_image',
            [
                'label' => esc_html__('Right Car Image', 'rifa-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/elements/hero-4-car-right.png',
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
        <section class="hero style--three">
            <div class="hero__circle">
                <img src="<?php echo esc_url($settings['circle_image']['url']); ?>" alt="<?php echo esc_attr__('Circle Image', 'rifa-core'); ?>">
            </div>
            <div class="hero__obj">
                <img src="<?php echo esc_url($settings['obj_image']['url']); ?>" alt="<?php echo esc_attr__('Object Image', 'rifa-core'); ?>">
            </div>

            <div class="hero__car-left wow bounceIn" data-wow-duration="0.5s" data-wow-delay="0.9s">
                <img src="<?php echo esc_url($settings['car_left_image']['url']); ?>" alt="<?php echo esc_attr__('Left Car Image', 'rifa-core'); ?>">
            </div>
            <div class="hero__bike wow bounceIn" data-wow-duration="0.5s" data-wow-delay="1.3s">
                <img src="<?php echo esc_url($settings['bike_image']['url']); ?>" alt="<?php echo esc_attr__('Bike Image', 'rifa-core'); ?>">
            </div>
            <div class="hero__car-right wow bounceIn" data-wow-duration="0.5s" data-wow-delay="0.9s">
                <img src="<?php echo esc_url($settings['car_right_image']['url']); ?>" alt="<?php echo esc_attr__('Right Car Image', 'rifa-core'); ?>">
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="hero__content text-center">
                            <?php if($settings['subtitle']) : ?>
                                <div class="hero__subtitle wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.9s"><?php echo esc_html($settings['subtitle']); ?></div>
                            <?php endif; ?>
                            
                            <?php if($settings['title']) : ?>
                                <h2 class="hero__title wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.7s"><?php echo esc_html($settings['title']); ?></h2>
                            <?php endif; ?>
                            
                            <?php if($settings['description']) : ?>
                                <p class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s"><?php echo esc_html($settings['description']); ?></p>
                            <?php endif; ?>
                            
                            <div class="hero__btn wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                                <?php if($settings['button_text']) : ?>
                                    <a href="<?php echo esc_url($settings['button_url']['url']); ?>" class="cmn-btn"><?php echo esc_html($settings['button_text']); ?></a>
                                <?php endif; ?>
                                
                                <?php if($settings['video_url']['url']) : ?>
                                    <a class="video-btn" href="<?php echo esc_url($settings['video_url']['url']); ?>" data-rel="lightcase:myCollection"><i class="fas fa-play"></i></a>
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

$widgets_manager->register(new FT_Banner4());
