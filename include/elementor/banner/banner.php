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
class FT_Banner extends Widget_Base
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
        return 'ft-banner';
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
        return __('FT Banner', 'rifa-core');
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

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Contest FOR YOUR CHANCE to', 'rifa-core'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('big win', 'rifa-core'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Now\'s your chance to win a car! Check out the prestige cars you can win in our car prize draws. Will you be our next lucky winner?', 'rifa-core'),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Participate Now', 'rifa-core'),
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__('Button Link', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'rifa-core'),
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        $this->add_control(
            'video_link',
            [
                'label' => esc_html__('Video Link', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://www.youtube.com/...', 'rifa-core'),
                'default' => [
                    'url' => 'https://www.youtube.com/embed/d6xn5uflUjg',
                ],
            ]
        );

        // Images
        $this->add_control(
            'hero_shape',
            [
                'label' => esc_html__('Hero Shape', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'hero_building',
            [
                'label' => esc_html__('Hero Building', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'car_shadow',
            [
                'label' => esc_html__('Car Shadow', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'car_ray',
            [
                'label' => esc_html__('Car Ray', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'car_light',
            [
                'label' => esc_html__('Car Light', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'hero_car',
            [
                'label' => esc_html__('Hero Car', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'car_star',
            [
                'label' => esc_html__('Car Star', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'car_main',
            [
                'label' => esc_html__('Car Main', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        // ================================Style Tab===============================//

        // Subtitle styles
        $this->subtitle('subtitle', 'Subtitle', '.hero__subtitle');
        // Title styles
        $this->title('title', 'Title', '.hero__title');
        // Description styles
        $this->description('description', 'Description', '.hero__content p');
        // Button styles
        $this->button('button', 'Primary Button', '.cmn-btn');
        $this->button2('video_button', 'Video Button', '.video-btn');
        // Card styles
        $this->card('hero_card', 'Hero Card', '.hero__content');

     
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
        <section class="hero">
            <?php if(!empty($settings['hero_shape']['url'])): ?>
            <div class="hero__shape">
                <img src="<?php echo esc_url($settings['hero_shape']['url']); ?>" alt="image">
            </div>
            <?php endif; ?>

            <?php if(!empty($settings['hero_building']['url'])): ?>
            <div class="hero__element">
                <img src="<?php echo esc_url($settings['hero_building']['url']); ?>" alt="image">
            </div>
            <?php endif; ?>

            <div class="hero__car wow bounceIn" data-wow-duration="0.5s" data-wow-delay="1s">
                <?php if(!empty($settings['car_shadow']['url'])): ?>
                <img src="<?php echo esc_url($settings['car_shadow']['url']); ?>" alt="image" class="car-shadow">
                <?php endif; ?>

                <?php if(!empty($settings['car_ray']['url'])): ?>
                <img src="<?php echo esc_url($settings['car_ray']['url']); ?>" alt="image" class="car-ray">
                <?php endif; ?>

                <?php if(!empty($settings['car_light']['url'])): ?>
                <img src="<?php echo esc_url($settings['car_light']['url']); ?>" alt="image" class="car-light">
                <?php endif; ?>

                <?php if(!empty($settings['hero_car']['url'])): ?>
                <img src="<?php echo esc_url($settings['hero_car']['url']); ?>" alt="image" class="hero-car">
                <?php endif; ?>

                <?php if(!empty($settings['car_star']['url'])): ?>
                <img src="<?php echo esc_url($settings['car_star']['url']); ?>" alt="image" class="car-star">
                <?php endif; ?>
            </div>
            <div class="container">
                <div class="row justify-content-center justify-content-lg-start">
                    <div class="col-lg-6 col-md-8">
                        <div class="hero__content">
                            <?php if(!empty($settings['subtitle'])): ?>
                            <div class="hero__subtitle wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                                <?php echo esc_html($settings['subtitle']); ?>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($settings['title'])): ?>
                            <h2 class="hero__title wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                                <?php echo esc_html($settings['title']); ?>
                            </h2>
                            <?php endif; ?>

                            <?php if(!empty($settings['description'])): ?>
                            <p class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.7s">
                                <?php echo esc_html($settings['description']); ?>
                            </p>
                            <?php endif; ?>

                            <div class="hero__btn wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.9s">
                                <?php if(!empty($settings['button_link']['url']) && !empty($settings['button_text'])): ?>
                                <a href="<?php echo esc_url($settings['button_link']['url']); ?>" 
                                   class="cmn-btn"
                                   <?php echo !empty($settings['button_link']['is_external']) ? ' target="_blank"' : ''; ?>
                                   <?php echo !empty($settings['button_link']['nofollow']) ? ' rel="nofollow"' : ''; ?>>
                                    <?php echo esc_html($settings['button_text']); ?>
                                </a>
                                <?php endif; ?>

                                <?php if(!empty($settings['video_link']['url'])): ?>
                                <a class="video-btn" 
                                   href="<?php echo esc_url($settings['video_link']['url']); ?>" 
                                   data-rel="lightcase:myCollection">
                                    <i class="fas fa-play"></i>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <?php if(!empty($settings['car_main']['url'])): ?>
                        <div class="hero__thumb">
                            <img src="<?php echo esc_url($settings['car_main']['url']); ?>" alt="">
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }


}

$widgets_manager->register(new FT_Banner());
