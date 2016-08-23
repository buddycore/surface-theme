<?php
// Theme support and WordPress enhancements
add_theme_support('post-thumbnails');
set_post_thumbnail_size(0, 9999);
add_image_size('single', 1000, 9999, array('center', 'center'));
add_image_size('news-item-single', 2000, 9999, array('center', 'center'));

# WordPress title tag
add_theme_support('title-tag');

# DISABLE REST API
// // Filters for WP-API version 1.x
// add_filter('json_enabled', '__return_false');
// add_filter('json_jsonp_enabled', '__return_false');

// // Filters for WP-API version 2.x
// add_filter('rest_enabled', '__return_false');
// add_filter('rest_jsonp_enabled', '__return_false');

// Theme support and WordPress enhancements
add_theme_support('title-tag');
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
add_theme_support('post-formats', array('audio', 'video'));