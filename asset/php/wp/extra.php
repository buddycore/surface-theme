<?php
function sc_extra(){
    wp_register_script('jq-k', get_bloginfo('template_directory').'/asset/js/plugin/jquery.k.js', array(), '1.5', true);
    wp_enqueue_script('jq-k');
    wp_enqueue_script('sc-app-extra', get_bloginfo('template_directory').'/asset/js/jquery.app.extra.js', array('jquery'), '1.7', true);
}
add_action('wp_enqueue_scripts', 'sc_extra', 50);