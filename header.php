<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="msapplication-tap-highlight" content="no">
<?php wp_head(); ?>
<?php if(get_theme_mod('sc_analytics')) : ?>
    <?php echo get_theme_mod('sc_analytics'); ?>
<?php endif; ?>
<style>
    header.global, header.global nav ul.sf-header li ul, footer.global, div.global-notice, article.sticky div.inner:before,
    div.navigation-tabs div.item-list-tabs ul li a span, div.loader, input#send, input#profile-group-edit-submit, input#signup_submit, 
    form.standard-form input.submit, input.submit, form.standard-form div#previous-next input#group-creation-create, form.standard-form div#previous-next input#group-creation-next, 
    form.standard-form div#previous-next input#group-creation-finish, a.avatar-crop-submit, form.standard-form div.prev-next input#group-creation-finish, form.standard-form input#save, form.standard-form input#delete-group-button {
        background: <?php echo get_theme_mod('sf_primary_colour'); ?>
    }
    input:focus, select:focus, textarea:focus {
        border: 1px solid <?php echo get_theme_mod('sf_primary_colour'); ?> !important;
    }
    a, li.title {
        color: <?php echo get_theme_mod('sf_primary_colour'); ?>;
    }
    main button, p.form-submit input {
        background: <?php echo get_theme_mod('sf_primary_colour'); ?>;
        border: none !important;
    }
    div.responsive-container, div.search-container {
        background: <?php echo get_theme_mod('sf_primary_colour'); ?>;
    }
    ::-webkit-selection {
        background: <?php echo get_theme_mod('sf_primary_colour'); ?>;
        color: #FFF;
    }
    ::-moz-selection {
        background: <?php echo get_theme_mod('sf_primary_colour'); ?>;
        color: #FFF;
    }
    ::selection {
        background: <?php echo get_theme_mod('sf_primary_colour'); ?>;
        color: #FFF;
    }
    form.activity-post-form div.bpfb_actions_container div.bpfb_action_container input#bpfb_submit, 
    form.activity-post-form div.bpfb_actions_container div.bpfb_controls_container input#bpfb_remote_image_preview, 
    form.activity-post-form div.bpfb_actions_container div.bpfb_controls_container input#bpfb_video_url_preview,
    form.activity-post-form div.bpfb_actions_container div.bpfb_controls_container input#bpfb_link_url_preview {
        background: <?php echo get_theme_mod('sf_primary_colour'); ?>;
    }

    
    <?php if(get_theme_mod('sf_sticky_header')) : ?>
        html body {
            padding-top: 90px;
        }
        header.global {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 10;
        }
        @media screen and (max-width: 900px) {
            html body {
                padding-top: 0;
            }
            header.global {
                position: relative;
                top: auto;
                left: auto;
                right: auto;
            }
        }
    <?php endif; ?>
</style>
</head>
<body <?php body_class(); ?>>
<div class="canvas">
    <header class="global">
        <nav>
            <h1><a href="<?php echo home_url('/'); ?>"><img src="<?php echo get_theme_mod('sf_logo'); ?>" alt="<?php echo get_bloginfo('name'); ?>"></a></h1>
            
            <ul class="sf-header">
                <?php 
                if(has_nav_menu('sf-header')) : 
                    $defaults = array(
                        'theme_location'    => 'sf-header',
                        'container'         => false,
                        'items_wrap'        => '%3$s',
                        'walker' => new Nfr_Menu_Walker()
                    );
                    wp_nav_menu($defaults);
                endif;
                ?>
                <li class="search">
                    <button class="toggle"><span></span></button>
                    <?php get_search_form(); ?>
                </li>
                <?php if(is_user_logged_in()) : ?>
                <li class="nv-account">
                    <?php if(bp_is_active('notifications') && bp_notifications_get_unread_notification_count(bp_loggedin_user_id())) : ?>
                        <a class="notifications" href="<?php echo bp_loggedin_user_domain(); ?>notifications" title="Unread Notifications"><?php echo bp_notifications_get_unread_notification_count(bp_loggedin_user_id()); ?></a>
                    <?php endif; ?>
                    <a href="<?php echo bp_loggedin_user_domain(); ?>">
                        <?php bp_loggedin_user_avatar('width=60&height=60'); ?>
                        <span class="tx"><?php echo bp_core_get_user_displayname(bp_loggedin_user_id()); ?></span>
                        <span class="toggle"></span>
                    </a>                    
                    <?php get_sidebar('account-dropdown'); ?>                    
                </li>
                <?php else : ?>
                <li class="nv-register"><a href="<?php echo home_url('/register'); ?>">Register</a></li>
                <li class="nv-login"><a href="<?php echo wp_login_url('/'); ?>">Login</a></li>
                <?php endif; ?>
                <li class="nv-pages">
                    <button><span>Toggle Pages Menu</span></button>
                </li>
            </ul>
            <?php get_sidebar('pages'); ?>
            <?php if(is_user_logged_in()) : ?>
                <?php get_sidebar('account'); ?>
            <?php endif; ?>
        </nav>
    </header>
    <main>
        <?php if(get_theme_mod('sf_notice')) : ?>
        <div class="global-notice">
            <p><?php echo get_theme_mod('sf_notice'); ?></p>
        </div>
        <?php endif; ?>
        <div class="content">