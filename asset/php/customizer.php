<?php

function sc_customizer($wp_customize){

    // DEV NOTICE & SCRIPTS
    $wp_customize->add_panel('sf_panel_bp',
        array(
            'title'          => 'BuddyPress',
            'description'    => 'Customise aspects of BuddyPress with Surface',
            'capability'     => 'manage_options',
            'theme-supports' => '',
            'priority'       => '20'
        )
    );

    $wp_customize->add_section('sf_buddypress_section', array(
        'title'          => 'Header Options',
        'description'   => 'Change some options',
        'theme-supports'    => '',
        'priority'          => '10',
        'panel'             => 'sf_panel_bp'
    ));

    $wp_customize->add_setting('sf_msg_link', array(
        'default'   => null,
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control( 
        new WP_Customize_Control($wp_customize, 'sf_msg_link', 
            array(
                'label'      => __('Show link to user messages in header?', 'sf'),
                'section'    => 'sf_buddypress_section',
                'settings'   => 'sf_msg_link',
                'type'       => 'checkbox'
            )
        ) 
    );

   $wp_customize->add_panel('sf_panel_1',
        array(
            'title'          => 'Theme Decor',
            'description'    => 'Theme specific features.',
            'capability'     => 'manage_options',
            'theme-supports' => '',
            'priority'       => '10'
        )
    );
    // LOGO SECTION
    $wp_customize->add_section('sf_decor_section', array(
        'title'          => 'Logo and Colours',
        'description'   => 'Logo and Colours.',
        'theme-supports'    => '',
        'priority'          => '10',
        'panel'             => 'sf_panel_1'
    ));

    // LOGO
    $wp_customize->add_setting('sf_logo', array(
        'default'   => asset_url('img/default/logo.png'),
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'sf_logo', 
            array(
                'label'      => __('Site Logo', 'sc'),
                'section'    => 'sf_decor_section',
                'settings'   => 'sf_logo',
            )
        )
    );

    // COLOURS
    $wp_customize->add_setting('sf_primary_colour', array(
        'default'   => '#468966',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control( 
        new WP_Customize_Color_Control($wp_customize, 'sf_colours', 
            array(
                'label'      => __('Primary Color', 'sf'),
                'section'    => 'sf_decor_section',
                'settings'   => 'sf_primary_colour',
            )
        ) 
    );

    $wp_customize->add_section('sf_layout', array(
        'title'          => 'Layout',
        'description'   => 'Modify layout options.',
        'theme-supports'    => '',
        'priority'          => '10',
        'panel'             => 'sf_panel_1'
    ));

    // COLOURS
    $wp_customize->add_setting('sf_sticky_header', array(
        'default'   => null,
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control( 
        new WP_Customize_Control($wp_customize, 'sf_sticky_header', 
            array(
                'label'      => __('Sticky header?', 'sf'),
                'section'    => 'sf_layout',
                'settings'   => 'sf_sticky_header',
                'type'       => 'checkbox'
            )
        ) 
    );

    // DEV NOTICE & SCRIPTS
    $wp_customize->add_panel('sf_panel_2',
        array(
            'title'          => 'Text and Scripts',
            'description'    => 'Analytics and notices',
            'capability'     => 'manage_options',
            'theme-supports' => '',
            'priority'       => '20'
        )
    );

    $wp_customize->add_section('sf_analytics_section', array(
        'title'          => 'Google Analytics',
        'description'   => 'Grab the tracking embed code from your provider.',
        'theme-supports'    => '',
        'priority'          => '10',
        'panel'             => 'sf_panel_2'
    ));

    // EMBED
    $wp_customize->add_setting('sf_analytics', array(
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'sf_analytics', array(
        'label'      => __('Site Analytics', 'sc'),
        'section'    => 'sf_analytics_section',
        'settings'   => 'sf_analytics',
        'type'      => 'textarea'
    )));

    $wp_customize->add_section('sf_notice_section', array(
        'title'          => 'Global Notices',
        'description'   => 'Place a notice to be displayed on every page',
        'theme-supports'    => '',
        'priority'          => '10',
        'panel'             => 'sf_panel_2'
    ));

    // EMBED
    $wp_customize->add_setting('sf_notice', array(
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'sf_notice', array(
        'label'      => __('Global Notice', 'sc'),
        'section'    => 'sf_notice_section',
        'settings'   => 'sf_notice',
        'type'      => 'textarea'
    )));



    // DEV NOTICE & SCRIPTS
    $wp_customize->add_panel('sf_panel_3',
        array(
            'title'          => 'Sidebar',
            'description'    => 'RSS Feeds and Active Widgets',
            'capability'     => 'manage_options',
            'theme-supports' => '',
            'priority'       => '20'
        )
    );

    $wp_customize->add_section('sf_sidebar_section_rss', array(
        'title'          => 'RSS Feeds',
        'description'   => 'Supply some RSS Feeds for the Sidebar',
        'theme-supports'    => '',
        'priority'          => '10',
        'panel'             => 'sf_panel_3'
    ));

    // EMBED
    for($i = 1; $i < 5; $i++) :

        $wp_customize->add_setting('sf_rss_'.$i, array(
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'sf_rss_'.$i, array(
            'label'      => __('Feed '.$i, 'sc'),
            'section'    => 'sf_sidebar_section_rss',
            'settings'   => 'sf_rss_'.$i,
            'type'      => 'text'
        )));

    endfor;
    
}
add_action('customize_register', 'sc_customizer');

// Live mods in customizer via the following script
function sc_customizer_script() {
    wp_enqueue_script('sc-app-customizer', asset_url('js/jquery.customizer.js'), array('jquery'), '0.0.9', true);
}
add_action('customize_preview_init', 'sc_customizer_script');