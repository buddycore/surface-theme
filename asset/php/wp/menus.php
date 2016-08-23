<?php
# Register menus
function sf_register_menus(){
    register_nav_menus(array(
        'sf-header'              => __('Header'),
        'sf-footer'              => __('Footer')
    ));
}
add_action('init', 'sf_register_menus');