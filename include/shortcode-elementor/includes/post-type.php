<?php
function ftelements_pro_shortcode_register_post_type() {
    $labels = array(
        'name'               => esc_html__( 'FT Global Shortcodes', 'ftaddon'),
        'singular_name'      => esc_html__( 'Elementor Shortcodes', 'ftaddon'),
        'add_new'            => esc_html_x( 'Add New Shorcode', 'ftaddon'),
        'add_new_item'       => esc_html__( 'Add New Shorcode', 'ftaddon'),
        'edit_item'          => esc_html__( 'Edit Element', 'ftaddon'),
        'new_item'           => esc_html__( 'New Shortcode', 'ftaddon'),
        'all_items'          => esc_html__( 'All Shorcodes', 'ftaddon'),
        'view_item'          => esc_html__( 'View Elements', 'ftaddon'),    
        'not_found'          => esc_html__( 'No Elements found', 'ftaddon'),
        'not_found_in_trash' => esc_html__( 'No Elements found in Trash', 'ftaddon'),
        'parent_item_colon'  => esc_html__( 'Parent Team:', 'ftaddon'),
        'menu_name'          => esc_html__( 'FT Shorcode', 'ftaddon'),
    );  
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_in_menu'       => true,
        'show_in_admin_bar'  => true,
        'can_export'         => true,
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 20,     
        'menu_icon'          =>  plugins_url( 'img/icon.png', __FILE__ ),
        'supports'           => array( 'title', 'thumbnail', 'editor', 'page-attributes' )
    );
    register_post_type( 'ftelements_pro', $args );
}
add_action( 'init', 'ftelements_pro_shortcode_register_post_type' );



function ftelements_pro_add_meta_box(){
    add_meta_box('ft-shortcode-box','Elements Shortcode','ftelemetns_pro_shortcode_box','ftelements_pro','side','high');
}
add_action("add_meta_boxes", "ftelements_pro_add_meta_box");


function ftelemetns_pro_shortcode_box($post){
    ?>
    <h4><?php echo esc_html('Shortcode','ftelements');?></h4>
    <input type='text' class='widefat' value='[SHORTCODE_ELEMENTOR id="<?php echo esc_attr($post->ID); ?>"]' readonly="">

     <h4><?php echo esc_html('PHP Code','ftelements');?></h4>
    <input type='text' class='widefat' value="&lt;?php echo do_shortcode('[SHORTCODE_ELEMENTOR id=&quot;<?php echo esc_attr($post->ID); ?>&quot;]'); ?&gt;" readonly="">
    <?php
}