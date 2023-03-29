<?php

function jk_files() {
    wp_enqueue_script('jk-main-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css');
    wp_enqueue_style('jk_main_styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('jk_additional_styles', get_theme_file_uri('/build/index.css'));
}
add_action('wp_enqueue_scripts', 'jk_files');

/* add features */

function jk_features() {
    /*add support for menus */
    register_nav_menu('headerMenu', 'Header Menu');
    register_nav_menu('footerMenuOne', 'Footer Menu 1');
    register_nav_menu('footerMenuTwo', 'Footer Menu 2');
    /* add support for blog posts images */
    add_theme_support( 'post-thumbnails' );
    add_theme_support('title-tag'); // add description in browser tab
    add_image_size('authorLandscape', 400, 260, true);
    add_image_size('authorPortrait', 480, 650, true);
}
add_action('after_setup_theme', 'jk_features');

/* function for events ordering in archive */
function jk_adjust_queries($query) {

    /* function for events ordering in archive */
    if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
        $today = date('Ymd');
        $query->set('meta_key','event_date');
        $query->set('orderby','meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
            ))
        );
    }

    /* function for workshop ordering in archive */
    if (!is_admin() AND is_post_type_archive('workshop') AND $query->is_main_query()) {
        $query->set('orderby','title');
        $query->set('order', 'ASC');
        $query->set('posts_per_page', -1);
    }
};
add_action('pre_get_posts', 'jk_adjust_queries');