<?php
function sc_wp_login_script_style() {
    wp_enqueue_style('sc-app-style', get_bloginfo('template_directory').'/asset/css/app.min.css', array(), '0.0.1');
}
add_action('login_enqueue_scripts', 'sc_wp_login_script_style');

function sc_login_logo() { 
    if(get_theme_mod('sc_site_logo')) : ?>
    <style type="text/css">
        div#login h1 a {
            background-image: url(<?php echo get_theme_mod('sc_site_logo'); ?>);
        }
    </style>
    <?php endif;
}
add_action('login_enqueue_scripts', 'sc_login_logo');

function sc_wp_login_url() {
    return home_url('/');
}
add_filter('login_headerurl', 'sc_wp_login_url');

function sc_wp_login_url_title() {
    return get_bloginfo('name');
}
add_filter('login_headertitle', 'sc_wp_login_url_title');