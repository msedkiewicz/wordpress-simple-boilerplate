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
}
add_action('after_setup_theme', 'jk_features');

/* Reusable function for page banner */
function pageBanner($args = NULL) {
    if (!isset($args['title'])) {
        $args['title'] = get_the_title();
    }
    ?>
    <div class="">
        <div class="">
            <h1 class=""><?php echo $args['title'] ?></h1>
        </div>
    </div>
<?php
}