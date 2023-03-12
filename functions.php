<?php

function jk_files() {
    wp_enqueue_style('jk_main_styles', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'jk_files');