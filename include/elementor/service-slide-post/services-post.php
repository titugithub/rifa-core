<?php

namespace FTCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Control_Media;

use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;
use Essential_Addons_Elementor\Pro\Skins\Skin_Four;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class FT_Service_Slide extends Widget_Base
{


    public function get_name()
    {
        return 'ft-service-slide';
    }


    public function get_title()
    {
        return __('FT Service Slide', 'rifa-core');
    }


    public function get_icon()
    {
        return 'ft-icon';
    }


    public function get_categories()
    {
        return ['rifa-core'];
    }


    public function get_script_depends()
    {
        return ['rifa-core'];
    }
    
    function get_post_list_by_post_type($post_type)
    {
        $return_val = [];
        $args       = array(
            'post_type'      => $post_type,
            'posts_per_page' => -1,
            'post_status'      => 'publish',
        );
        $all_post   = new \WP_Query($args);

        while ($all_post->have_posts()) {
            $all_post->the_post();
            $return_val[get_the_ID()] = get_the_title();
        }
        wp_reset_query();
        return $return_val;
    }

    function get_all_post_key($post_type)
    {
        $return_val = [];
      
    }




    protected function register_controls()
    {

         // ======================Content================================//

        //General Section
        $this->start_controls_section(
            'blog_section_genaral',
            [
                'label' => esc_html__('General', 'rifa-core')
            ]
        );


        $this->add_control(
            'blog_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'rifa-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 2,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'post_select',
            [
                'label' => __('Select Posts', 'turio-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options' => $this->get_post_list_by_post_type('post'),
                'default'     => [],
            ]
        );



        $this->add_control(
            'post_offset',
            [
                'label' => esc_html__('Offset', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'blog_title_show',
            [
                'label' => esc_html__('Show Title Limit', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('20', 'rifa-core'),
                'separator' => 'before',

            ]
        );

        $this->add_control(
            'blog_word_show',
            [
                'label' => esc_html__('Show Content Limit', 'rifa-core'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('20', 'rifa-core'),
                'separator' => 'before',

            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ],
                'separator' => 'before',
            ]
        );




        $this->add_control(
            'blog_template_orderby',
            [
                'label'   => esc_html__('Order By', 'rifa-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ID',
                'options' => [
                    'ID'         => esc_html__('Post Id', 'rifa-core'),
                    'author'     => esc_html__('Post Author', 'rifa-core'),
                    'title'      => esc_html__('Title', 'rifa-core'),
                    'post_date'  => esc_html__('Date', 'rifa-core'),
                    'rand'       => esc_html__('Random', 'rifa-core'),
                    'menu_order' => esc_html__('Menu Order', 'rifa-core'),
                ],
            ]
        );
        $this->add_control(
            'blog_template_order',
            [
                'label'   => esc_html__('Order', 'rifa-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'asc'  => esc_html__('Ascending', 'rifa-core'),
                    'desc' => esc_html__('Descending', 'rifa-core')
                ],
                'default' => 'desc',
            ]
        );


        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'rifa-core'),

            ]
        );




        $this->end_controls_section();



        $this->start_controls_section(
            'options_content',
            [
                'label' => esc_html__('Options', 'rifa-core')
            ]
        );

        $this->add_control(
            'cat_show',
            [
                'label' => esc_html__('Show Category', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'rifa-core'),
                'label_off' => esc_html__('Hide', 'rifa-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );



        $this->add_control(
            'date_show',
            [
                'label' => esc_html__('Show Date', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'rifa-core'),
                'label_off' => esc_html__('Hide', 'rifa-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'author_show',
            [
                'label' => esc_html__('Show Author', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'rifa-core'),
                'label_off' => esc_html__('Hide', 'rifa-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'description_show',
            [
                'label' => esc_html__('Show Description', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'rifa-core'),
                'label_off' => esc_html__('Hide', 'rifa-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'button_show',
            [
                'label' => esc_html__('Show Button', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'rifa-core'),
                'label_off' => esc_html__('Hide', 'rifa-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );




        $this->end_controls_section();


        $this->start_controls_section(
            'slider_setting',
            [
                'label' => esc_html__('Slider Setting', 'rifa-core')
            ]
        );


        // Add control for enabling/disabling loop
        $this->add_control(
            'swiper_loop',
            [
                'label' => esc_html__('Enable Loop', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'rifa-core'),
                'label_off' => esc_html__('No', 'rifa-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        // Add control for enabling/disabling autoplay
        $this->add_control(
            'swiper_autoplay',
            [
                'label' => esc_html__('Enable Autoplay', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'rifa-core'),
                'label_off' => esc_html__('No', 'rifa-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        // Add control for enabling/disabling dot pagination
        $this->add_control(
            'swiper_pagination',
            [
                'label' => esc_html__('Enable Pagination', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'rifa-core'),
                'label_off' => esc_html__('No', 'rifa-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );



        // Add control for space between slides
        $this->add_control(
            'space_between_slides',
            [
                'label' => esc_html__('Space Between Slides (px)', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 40,
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ]
        );


        // Control for slides per view on desktop
        $this->add_control(
            'slides_per_view_desktop',
            [
                'label' => esc_html__('Slides per View (Desktop)', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3, // Set default value
            ]
        );

        // Control for slides per view on tablet
        $this->add_control(
            'slides_per_view_tablet',
            [
                'label' => esc_html__('Slides per View (Tablet)', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 2, // Set default value
            ]
        );

        // Control for slides per view on mobile
        $this->add_control(
            'slides_per_view_mobile',
            [
                'label' => esc_html__('Slides per View (Mobile)', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 1, // Set default value
            ]
        );

        // Control for space between slides
        $this->add_control(
            'space_between_slides',
            [
                'label' => esc_html__('Space Between Slides (px)', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 40,
            ]
        );


        $this->end_controls_section();

        // ====================Style========================//

        $this->start_controls_section(
            'image_style',
            [
                'label' => esc_html__('Image', 'rifa-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_responsive_control(
            'imagestyle_height',
            [
                'label'       => esc_html__('Height', 'rifa-core'),
                'type'        => Controls_Manager::SLIDER,
                'size_units'  => ['px', '%'],  // Allow px and percentage units
                'description' => esc_html__('Choose height in px or %', 'rifa-core'),
                'selectors'   => [
                    '{{WRAPPER}} .ft-image' => 'height: {{SIZE}}{{UNIT}};', // Dynamic unit
                ],
                'default'     => [
                    'unit'  => 'px',  // Default unit is px

                ],
            ]
        );

        $this->add_responsive_control(
            'imagestyle_width',
            [
                'label'       => esc_html__('Width', 'rifa-core'),
                'type'        => Controls_Manager::SLIDER,
                'size_units'  => ['px', '%'],  // Allow px and percentage units
                'description' => esc_html__('Choose width in px or %', 'rifa-core'),
                'selectors'   => [
                    '{{WRAPPER}} .ft-image' => 'width: {{SIZE}}{{UNIT}};', // Dynamic unit
                ],
                'default'     => [
                    'unit'  => 'px',  // Default unit is px

                ],
            ]
        );

        $this->add_responsive_control(
            'imagestyle_border_radius',
            [
                'label'      => __('Border Radius', 'rifa-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ft-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'des_style',
            [
                'label' => esc_html__('Description', 'rifa-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'description_typ',
                'selector' => '{{WRAPPER}} .ft-description',

            ]
        );

        $this->add_control(
            'description_color',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-description' => 'color: {{VALUE}} !important;',
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
                    '{{WRAPPER}} .ft-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'description_padding',
            [
                'label'      => __('Padding', 'rifa-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ft-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'name_style',
            [
                'label' => esc_html__('Name', 'rifa-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'name_typ',
                'selector' => '{{WRAPPER}} .ft-name',

            ]
        );

        $this->add_control(
            'name_color',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-name' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'name_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-name:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'name_margin',
            [
                'label' => esc_html__('Margin', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .ft-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'name_padding',
            [
                'label'      => __('Padding', 'rifa-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ft-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'meta_style',
            [
                'label' => esc_html__('Meta', 'rifa-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'rifa-core'),
                'name'     => 'ft-_typ',
                'selector' => '{{WRAPPER}} .ft-meta',

            ]
        );

        $this->add_control(
            'ft-_color',
            [
                'label'     => esc_html__('Color', 'rifa-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-meta' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'ft-_margin',
            [
                'label' => esc_html__('Margin', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .ft-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'ft-_padding',
            [
                'label'      => __('Padding', 'rifa-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ft-meta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'rating_style',
            [
                'label' => esc_html__('Rating', 'rifa-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'active_color',
            [
                'label' => esc_html__('Active Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .star-rate' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_control(
            'noactive_color',
            [
                'label' => esc_html__('Non Active Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .no-rate' => 'color: {{VALUE}} !important',
                ],
            ]
        );


        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $query = new \WP_Query(
            array(
                'post_type'      => 'services',
                'posts_per_page' => $settings['blog_posts_per_page'],
                'orderby'        => $settings['blog_template_orderby'],
                'order'          => $settings['blog_template_order'],
                'offset'         => $settings['post_offset'],
                'post_status'    => 'publish',
                'post__in'       => $settings['post_select'],
            )
        );


        ?>

        <script>
            jQuery(document).ready(function($) {
                var swiper = new Swiper(".service_swiper", {
                    loop: <?php echo $settings['swiper_loop'] === 'yes' ? 'true' : 'false'; ?>,
                    speed: 2000,
                    autoplay: <?php echo $settings['swiper_autoplay'] === 'yes' ? '{ delay: 3000, disableOnInteraction: false }' : 'false'; ?>,
                    pagination: <?php echo $settings['swiper_pagination'] === 'yes' ? '{ el: ".swiper-pagination", clickable: true }' : 'false'; ?>,
                    spaceBetween: <?php echo esc_js($settings['space_between_slides']); ?>, // Space between slides

                    // Breakpoints for responsive slides per view
                    breakpoints: {
                        // when window width is >= 320px
                        320: {
                            slidesPerView: <?php echo esc_js($settings['slides_per_view_mobile']); ?>, // Mobile
                        },
                        // when window width is >= 768px
                        768: {
                            slidesPerView: <?php echo esc_js($settings['slides_per_view_tablet']); ?>, // Tablet
                        },
                        // when window width is >= 1024px
                        1024: {
                            slidesPerView: <?php echo esc_js($settings['slides_per_view_desktop']); ?>, // Desktop
                        }
                    }
                });
            });
        </script>





        <section class="latest-articles service-slide">
            <div class="overlay">
                <div class="container wow fadeInUp">
                    <div class="row cus-mar">
                        <div class="col-12">
                            <div class="swiper service_swiper">
                                <div class="swiper-wrapper">
                                    <?php
                                            if ($query->have_posts()) {
                                                while ($query->have_posts()) {
                                                    $query->the_post();

                                                    ?>
                                          
                                                <div class="swiper-slide ft-blogone">
                                                    <div class="blog_news__card nb3-bg cus-rounded-1 overflow-hidden">
                                                        <?php if (has_post_thumbnail()) : ?>
                                                            <div class="blog_news__thumbs position-relative">
                                                                <?php
                                                                                    the_post_thumbnail(
                                                                                        $settings['thumbnail_size'], // Image size dynamically from Elementor settings
                                                                                        [
                                                                                            'class' => 'ft-image', // Add custom class
                                                                                            'alt'   => esc_attr('image') // Add alt text
                                                                                        ]
                                                                                    );
                                                                                    ?>

                                                                <?php
                                                                                    $categories = get_the_category();

                                                                                    // Check if the post has categories
                                                                                    if (!empty($categories)) {
                                                                                        // Get the first category
                                                                                        $first_category = $categories[0];

                                                                                        // Generate the category link and name
                                                                                        $category_link = get_category_link($first_category->term_id);
                                                                                        $category_name = $first_category->name;
                                                                                        ?>

                                                                    <?php if (!empty($settings['cat_show'] == 'yes')) :   ?>
                                                                        <a href="<?php echo esc_url($category_link); ?>" class="ft-category border border-color second nw1-color fs-seven rounded-3 position-absolute top-0 end-0 py-1 px-3 mt-5 me-5">
                                                                            <?php echo esc_html($category_name); ?>
                                                                        </a>
                                                                    <?php endif ?>

                                                                <?php } ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <div class="ft-card blog_news__content py-6 py-lg-7 py-xxl-8 px-4 px-lg-5 px-xxl-6">
                                                            <a href="<?php the_permalink(); ?>">
                                                                <h5 class="ft-title mb-4 mb-lg-5">
                                                                    <?php
                                                                                    // Get the value of the custom control 'blog_title_show'
                                                                                    $title_word_limit = !empty($settings['blog_title_show']) ? intval($settings['blog_title_show']) : 20; // Default to 20 if not set

                                                                                    // Get the post title and limit the words
                                                                                    $title = wp_trim_words(get_the_title(), $title_word_limit);

                                                                                    // Output the trimmed title
                                                                                    echo esc_html($title);
                                                                                    ?>
                                                                </h5>
                                                            </a>

                                                            <div class="ft-date fs-seven fw_500 d-flex row-gap-0 flex-wrap gap-3 mb-4 mb-lg-5">

                                                                <?php if (!empty($settings['date_show'] == 'yes')) :   ?>
                                                                    <?php echo get_the_date(); ?>
                                                                <?php endif ?>

                                                                <span>|</span> Written by

                                                                <?php if (!empty($settings['author_show'] == 'yes')) :   ?>
                                                                    <?php the_author(); ?>
                                                                <?php endif ?>
                                                            </div>

                                                            <?php if (!empty($settings['description_show'] == 'yes')) :   ?>
                                                                <p class="ft-description">
                                                                    <?php
                                                                                        $word_limit = !empty($settings['blog_word_show']) ? intval($settings['blog_word_show']) : 20; // Default to 20 if not set
                                                                                        $excerpt = wp_trim_words(get_the_excerpt(), $word_limit);
                                                                                        echo esc_html($excerpt);
                                                                                        ?>
                                                                </p>
                                                            <?php endif ?>

                                                            <?php if (!empty($settings['button_show'] == 'yes')) :   ?>
                                                                <?php if (!empty($settings['button_text'])) :   ?>
                                                                    <a href="<?php the_permalink(); ?>" class="ft-button link fs-five fw-semibold d-flex gap-2 gap-lg-3 align-items-center mt-6 mt-lg-8">
                                                                        <?php echo wp_kses($settings['button_text'], wp_kses_allowed_html('post'))  ?>
                                                                        <i class="ft-button-icon fas fa-arrow-right mt-1 "></i>
                                                                    </a>
                                                                <?php endif ?>
                                                            <?php endif ?>

                                                        </div>
                                                    </div>
                                                </div>
                                         
                                    <?php
                                                }
                                            }
                                            wp_reset_postdata();
                                            ?>
                                </div>
                                <div class="swiper-pagination mt-8 mt-md-10 mt-lg-15"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
















<?php
    }
}

$widgets_manager->register(new FT_Service_Slide());
