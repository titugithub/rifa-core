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


class FT_Accordion_Tab extends Widget_Base
{


    public function get_name()
    {
        return 'ft-accordion-tab';
    }


    public function get_title()
    {
        return __('FT Accordion Tab', 'rifa-core');
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




    protected function register_controls()
    {


        $this->start_controls_section(
            'buttoncontent',
            [
                'label' => esc_html__('Button', 'rifa-core')
            ]
        );


        $this->add_control(
            'button1',
            [
                'label' => esc_html__('Button One', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Ticket Purchasing', 'rifa-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button2',
            [
                'label' => esc_html__('Button Two', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Draw and Winners', 'rifa-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button3',
            [
                'label' => esc_html__('Button Three', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Car Prizes', 'rifa-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button4',
            [
                'label' => esc_html__('Button Four', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Technical Support', 'rifa-core'),
                'label_block' => true,
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'contentone',
            [
                'label' => esc_html__('Content One', 'rifa-core')
            ]
        );


        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title1',
            [
                'label' => esc_html__('Title', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'rifa-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'description1',
            [
                'label' => esc_html__('Description', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Default description', 'rifa-core'),
            ]
        );

        $this->add_control(
            'list_repeater1',
            [
                'label' => esc_html__('Content List', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title1 }}}',
            ]
        );




        $this->end_controls_section();

        $this->start_controls_section(
            'contenttwo',
            [
                'label' => esc_html__('Content Two', 'rifa-core')
            ]
        );


        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title2',
            [
                'label' => esc_html__('Title', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'rifa-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'description2',
            [
                'label' => esc_html__('Description', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Default description', 'rifa-core'),
            ]
        );

        $this->add_control(
            'list_repeater2',
            [
                'label' => esc_html__('Content List', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title2 }}}',
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'contentthree',
            [
                'label' => esc_html__('Content Three', 'rifa-core')
            ]
        );


        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title3',
            [
                'label' => esc_html__('Title', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'rifa-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'description3',
            [
                'label' => esc_html__('Description', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Default description', 'rifa-core'),
            ]
        );

        $this->add_control(
            'list_repeater3',
            [
                'label' => esc_html__('Content List', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title3 }}}',
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'contentfour',
            [
                'label' => esc_html__('Content Four', 'rifa-core')
            ]
        );


        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title4',
            [
                'label' => esc_html__('Title', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'rifa-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'description4',
            [
                'label' => esc_html__('Description', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Default description', 'rifa-core'),
            ]
        );

        $this->add_control(
            'list_repeater4',
            [
                'label' => esc_html__('Content List', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title4 }}}',
            ]
        );



        $this->end_controls_section();


        $this->start_controls_section(
            'Showhide',
            [
                'label' => esc_html__('Show or Hide', 'rifa-core')
            ]
        );

        $this->add_control(
            'content1_show',
            [
                'label' => esc_html__('Show?', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'rifa-core'),
                'label_off' => esc_html__('Hide', 'rifa-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'content2_show',
            [
                'label' => esc_html__('Show?', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'rifa-core'),
                'label_off' => esc_html__('Hide', 'rifa-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'content3_show',
            [
                'label' => esc_html__('Show?', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'rifa-core'),
                'label_off' => esc_html__('Hide', 'rifa-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'content4_show',
            [
                'label' => esc_html__('Show?', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'rifa-core'),
                'label_off' => esc_html__('Hide', 'rifa-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $this->end_controls_section();

        // ========================Style===========================//

        $this->start_controls_section(
            'buttonstyle',
            [
                'label' => esc_html__('Button', 'rifa-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'spifdfnner_color',
            [
                'label' => esc_html__(' Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .question-tab .tablinks .nav-links .tablink' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_control(
            'spiffddnnfer_color',
            [
                'label' => esc_html__(' Background', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .question-tab .tablinks .nav-links .tablink' => 'background: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_control(
            'spifdnner_color',
            [
                'label' => esc_html__('Active Color', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .question-tab .tablinks .nav-links.active .tablink' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_control(
            'spiffddnner_color',
            [
                'label' => esc_html__('Active Background', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .question-tab .tablinks .nav-links.active .tablink' => 'background: {{VALUE}} !important',
                ],
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'contentstyle',
            [
                'label' => esc_html__('Content', 'rifa-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'spinfdner_color',
            [
                'label' => esc_html__('Background', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-single .header-area .accordion-btn' => 'background: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_control(
            'spinfdnfer_color',
            [
                'label' => esc_html__('Active Background', 'rifa-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-single.active' => 'background: {{VALUE}} !important',
                    '{{WRAPPER}} .accordion-single.active button' => 'background: {{VALUE}} !important',
                ],
            ]
        );



        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();

        ?>
        <script>
            // Custom Tabs //
            jQuery(document).ready(function($) {
                $(".tablinks .nav-links").each(function() {
                    var targetTab = $(this).closest(".singletab");
                    targetTab.find(".tablinks .nav-links").each(function() {
                        var navBtn = targetTab.find(".tablinks .nav-links");
                        navBtn.click(function() {
                            navBtn.removeClass("active");
                            $(this).addClass("active");
                            var indexNum = $(this).closest("li").index();
                            var tabcontent = targetTab.find(".tabcontents .tabitem");
                            $(tabcontent).removeClass("active");
                            $(tabcontent).eq(indexNum).addClass("active");
                        });
                    });
                });
                // Custom Tabs //

                // tabLinks add active  //
                $(".tabLinks .nav-links").on("mouseenter", function() {
                    $(this).addClass("active");
                    $(".tabLinks .nav-links").not(this).removeClass("active");
                });
                // tabLinks add active  //

                // custom Accordion //
                $(".accordion-single .header-area").on("click", function() {
                    if ($(this).closest(".accordion-single").hasClass("active")) {
                        $(this).closest(".accordion-single").removeClass("active");
                        $(this).next(".content-area").slideUp();
                    } else {
                        $(".accordion-single").removeClass("active");
                        $(this).closest(".accordion-single").addClass("active");
                        $(".content-area").not($(this).next(".content-area")).slideUp();
                        $(this).next(".content-area").slideToggle();
                    }
                });
            })
        </script>




        <section class="question-section ">
            <!--Question body-->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="question-wrapper1">
                            <div class="singletab">
                                <div class="question-tab mb-xxl-15 mb-xl-10 mb-lg-8 mb-7">
                                    <ul class="tablinks list-unstyled">
                                        <?php if ($settings['content1_show'] == 'yes') : ?>
                                            <li class="nav-links active">
                                                <button class="tablink">
                                                    <?php echo esc_html($settings['button1']) ?>
                                                </button>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ($settings['content2_show'] == 'yes') : ?>
                                            <li class="nav-links">
                                                <button class="tablink">
                                                    <?php echo esc_html($settings['button2']) ?>
                                                </button>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ($settings['content3_show'] == 'yes') : ?>
                                            <li class="nav-links">
                                                <button class="tablink">
                                                    <?php echo esc_html($settings['button3']) ?>
                                                </button>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ($settings['content4_show'] == 'yes') : ?>
                                            <li class="nav-links">
                                                <button class="tablink">
                                                    <?php echo esc_html($settings['button4']) ?>
                                                </button>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="tabcontents">

                                    <?php if ($settings['content1_show'] == 'yes') : ?>
                                        <div class="tabitem active">
                                            <div class="accordion-section">
                                                <?php foreach ($settings['list_repeater1'] as $item) : ?>
                                                    <div class="accordion-single">
                                                        <h5 class="header-area">
                                                            <?php if (!empty($item['title1'])) :   ?>
                                                                <button class="accordion-btn d-flex justify-content-between w-100" type="button">
                                                                    <span class="fs20 fw_700 n4-clr d-block">
                                                                        <?php echo esc_html($item['title1']) ?>
                                                                    </span>
                                                                    <span class="faq-icon">
                                                                       <i class="fas fa-chevron-down n4-clr"></i>

                                                                    </span>
                                                                </button>
                                                            <?php endif ?>
                                                        </h5>
                                                        <div class="content-area">
                                                            <?php if (!empty($item['description1'])) :   ?>
                                                                <div class="content-body ">
                                                                    <p>
                                                                        <?php echo esc_html($item['description1']) ?>
                                                                    </p>
                                                                </div>
                                                            <?php endif ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($settings['content2_show'] == 'yes') : ?>
                                        <div class="tabitem">
                                            <div class="accordion-section">
                                                <?php foreach ($settings['list_repeater2'] as $item) : ?>
                                                    <div class="accordion-single">
                                                        <?php if (!empty($item['title2'])) :   ?>
                                                            <h5 class="header-area">
                                                                <button class="accordion-btn d-flex justify-content-between w-100" type="button">
                                                                    <span class="fs20 fw_700 n4-clr d-block">
                                                                        <?php echo esc_html($item['title2']) ?>
                                                                    </span>
                                                                    <span class="faq-icon">
                                                                       <i class="fas fa-chevron-down n4-clr"></i>

                                                                    </span>
                                                                </button>
                                                            </h5>
                                                        <?php endif ?>
                                                        <?php if (!empty($item['description2'])) :   ?>
                                                            <div class="content-area">
                                                                <div class="content-body ">
                                                                    <p>
                                                                        <?php echo esc_html($item['description2']) ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        <?php endif ?>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($settings['content3_show'] == 'yes') : ?>
                                        <div class="tabitem">
                                            <div class="accordion-section">
                                                <?php foreach ($settings['list_repeater3'] as $item) : ?>
                                                    <div class="accordion-single">
                                                        <?php if (!empty($item['title3'])) :   ?>
                                                            <h5 class="header-area">
                                                                <button class="accordion-btn d-flex justify-content-between w-100" type="button">
                                                                    <span class="fs20 fw_700 n4-clr d-block">
                                                                        <?php echo esc_html($item['title3']) ?>
                                                                    </span>
                                                                    <span class="faq-icon">
                                                                       <i class="fas fa-chevron-down n4-clr"></i>

                                                                    </span>
                                                                </button>
                                                            </h5>
                                                        <?php endif ?>
                                                        <?php if (!empty($item['description3'])) :   ?>
                                                            <div class="content-area">
                                                                <div class="content-body ">
                                                                    <p>
                                                                        <?php echo esc_html($item['description3']) ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        <?php endif ?>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($settings['content4_show'] == 'yes') : ?>
                                        <div class="tabitem">
                                            <div class="accordion-section">
                                                <?php foreach ($settings['list_repeater4'] as $item) : ?>
                                                    <div class="accordion-single">
                                                        <?php if (!empty($item['title4'])) :   ?>
                                                            <h5 class="header-area">
                                                                <button class="accordion-btn d-flex justify-content-between w-100" type="button">
                                                                    <span class="fs20 fw_700 n4-clr d-block">
                                                                        <?php echo esc_html($item['title4']) ?>
                                                                    </span>
                                                                    <span class="faq-icon">
                                                                       <i class="fas fa-chevron-down n4-clr"></i>

                                                                    </span>
                                                                </button>
                                                            </h5>
                                                        <?php endif; ?>
                                                        <?php if (!empty($item['description4'])) :   ?>
                                                            <div class="content-area">
                                                                <div class="content-body ">
                                                                    <p>
                                                                        <?php echo esc_html($item['description4']) ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        <?php endif ?>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Question body-->
        </section>


<?php
    }
}

$widgets_manager->register(new FT_Accordion_Tab());
