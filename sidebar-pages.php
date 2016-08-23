<ul class="menu-pages">
    <li class="title">Browse Content</li>
    <?php 
    if(has_nav_menu('sf-header')) : 
        $defaults = array(
            'theme_location'    => 'sf-header',
            'container'         => false,
            'items_wrap'        => '%3$s'
        );
        wp_nav_menu($defaults);
    endif;
    ?>
</ul>