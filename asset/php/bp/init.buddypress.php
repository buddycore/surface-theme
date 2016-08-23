<?php


# AVATAR SIZES
define ( 'BP_AVATAR_THUMB_WIDTH', 150);
define ( 'BP_AVATAR_THUMB_HEIGHT', 150 );
define ( 'BP_AVATAR_FULL_WIDTH', 250);
define ( 'BP_AVATAR_FULL_HEIGHT', 250 );

# Disable profile linking
function px_bp_remove_xprofile_links() {
    remove_filter('bp_get_the_profile_field_value', 'xprofile_filter_link_profile_data', 9, 2);
}
add_action('bp_init', 'px_bp_remove_xprofile_links');

# Remove junk
function px_bp_remove_head_styles(){
    wp_dequeue_style('bp-legacy-css');
    wp_dequeue_style('bp-mentions-css');
}
add_action('wp_print_styles', 'px_bp_remove_head_styles');

# Disable TINYMCE on XPROFILE
function antipole_remove_rich_text() {    
    return false;
}
add_filter('bp_xprofile_is_richtext_enabled_for_field', 'antipole_remove_rich_text');

// Register the Cover Image feature for Users profiles
function bp_default_register_feature() {
    /**
     * You can choose to register it for Members and / or Groups by including (or not) 
     * the corresponding components in your feature's settings. In this example, we
     * chose to register it for both components.
     */
    $components = array( 'groups', 'xprofile');
 
    // Define the feature's settings
    $cover_image_settings = array(
        'name'     => 'cover_image', // feature name
        'settings' => array(
            'components'   => $components,
            'width'        => 960,
            'height'       => 240,
            'callback'     => 'bp_default_cover_image',
            'theme_handle' => 'bp-default-main',
        ),
    );
 
 
    // Register the feature for your theme according to the defined settings.
    bp_set_theme_compat_feature( bp_get_theme_compat_id(), $cover_image_settings );
}
add_action( 'bp_after_setup_theme', 'bp_default_register_feature' );

// Example of function to customize the display of the cover image
function bp_default_cover_image( $params = array() ) {
    if ( empty( $params ) ) {
        return;
    }
 
    // The complete css rules are available here: https://gist.github.com/imath/7e936507857db56fa8da#file-bp-default-patch-L34
    return '
        /* Cover image */
        #header-cover-image {
            display: block;
            height: ' . $params["height"] . 'px;
            background-image: url(' . $params['cover_image'] . ');
        }
    ';
}


function sc_bp_default_group_avatar($avatar) {

    global $bp, $groups_template;

    if(strpos($avatar,'group-avatars')) :

        return $avatar;

    else :

        $default = get_bloginfo('template_directory') .'/asset/img/default/group.png';

        if($bp->current_action == "") :

            return '<img class="avatar" alt="'. $groups_template->group->name.'" src="'.$default.'">';

        else :

            return '<img class="avatar" alt="'. $groups_template->group->name.'" src="'.$default.'">';

        endif;

    endif;

}

add_filter('bp_get_group_avatar', 'sc_bp_default_group_avatar');

// function sc_bp_default_user_avatar($image) {

//    $default = get_bloginfo('template_directory') .'/asset/img/default/member.png';

//     if($image && strpos($image, "gravatar.com")) :

//         return '<img class="avatar" src="' . $default . '" alt="avatar">';

//     else :

//         return $image;

//     endif;

// }
// add_filter('bp_core_fetch_avatar', 'sc_bp_default_user_avatar');