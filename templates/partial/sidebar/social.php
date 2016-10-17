<div class="inner-tabs">

    <ul class="inner-tabs-nav">
        <li class="nv-members"><a href="#i1" title="Members"><span>Members</span></a></li>
        <li class="nv-groups"><a href="#i2" title="Groups"><span>Groups</span></a></li>
        <li class="nv-links"><a href="#i3" title="Links"><span>Links</span></a></li>
        <?php if(get_theme_mod('sf_rss_1') || get_theme_mod('sf_rss_2') || get_theme_mod('sf_rss_3') || get_theme_mod('sf_rss_4')) : ?>
        <li class="nv-rss"><a href="#i4" title="News Feed"><span>News</span></a></li>
        <?php endif; ?>
    </ul>
    
    <div id="i1" class="tabs-panel">
            
        <?php locate_template('templates/partial/sidebar/members.php', true, true); ?>

    </div><!-- PANEL -->
    <div id="i2" class="tabs-panel">
        
        <?php locate_template('templates/partial/sidebar/groups.php', true, true); ?>

    </div><!-- PANEL -->
    <div id="i3" class="tabs-panel">

        <?php locate_template('templates/partial/sidebar/links.php', true, true); ?>
        
    </div><!-- PANEL -->

    <?php if(get_theme_mod('sf_rss_1') || get_theme_mod('sf_rss_2') || get_theme_mod('sf_rss_3') || get_theme_mod('sf_rss_4')) : ?>

    <div id="i4" class="tabs-panel">

        <?php locate_template('templates/partial/sidebar/feeds.php', true, true); ?>
        
    </div><!-- PANEL -->

    <?php endif; ?>
</div>