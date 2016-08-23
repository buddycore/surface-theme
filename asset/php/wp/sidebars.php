<?php
$args = array(
    'name'          => __('Sidebar Post', 'sc'),
    'id'            => 'wp-sidebar-post',
    'description'   => 'Add widgets to the sites Sidebar, only visible on WordPress single posts.',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>'
);
register_sidebar($args);