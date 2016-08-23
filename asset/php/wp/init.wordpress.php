<?php
# Disable admin bar
add_filter('show_admin_bar', '__return_false');

# Include our style and scripts
function sc_script_style(){
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_bloginfo('template_directory').'/asset/js/plugin/jquery.min.js', array(), '1.5', true);
    wp_enqueue_script('jquery');
    wp_register_script('jquery-ui', get_bloginfo('template_directory').'/asset/js/plugin/jquery.ui.min.js', array(), '1.5', true);
    wp_enqueue_script('jquery-ui');
    wp_register_script('jq-swipe', get_bloginfo('template_directory').'/asset/js/plugin/jquery.swipe.min.js', array(), '1.5', true);
    wp_enqueue_script('jq-swipe');
    wp_register_script('jq-stick', get_bloginfo('template_directory').'/asset/js/plugin/jquery.stick.js', array(), '1.5', true);
    wp_enqueue_script('jq-stick');
    wp_enqueue_style('sc-app-style', get_bloginfo('template_directory').'/asset/css/app.min.css', array(), '1.5');
    wp_enqueue_script('sc-app-script', get_bloginfo('template_directory').'/asset/js/jquery.app.js', array('jquery'), '1.5', true);
}
add_action('wp_enqueue_scripts', 'sc_script_style', 50);

# Remove junk
function sc_wp_remove_head() {
    remove_action('wp_head', 'feed_links');
    remove_action('wp_head', 'feed_links_extra');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
    remove_action('wp_head', 'locale_stylesheet');
    remove_action('wp_head', 'noindex');
    remove_action('wp_head', 'wp_print_styles');
    remove_action('wp_head', 'wp_print_head_scripts');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'rel_canonical');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'parent_post_rel_link');
    remove_action('wp_head', 'start_post_rel_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'rest_output_link_wp_head', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
}
add_action('init', 'sc_wp_remove_head');

function custom_excerpt_length($length) {
    return 40;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);