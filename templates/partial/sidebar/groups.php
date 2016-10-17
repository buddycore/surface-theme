<div class="widget-tabs">
    <ul class="widget-tabs-nav">
        <li><a href="#w1">New</a></li>
        <li><a href="#w2">Popular</a></li>
        <li><a href="#w3">Active</a></li>
    </ul>
    <div id="w1" class="tabs-panel">
        <ul class="avatars">
        <?php if(bp_has_groups('type=newest&per_page=16')) : while(bp_groups()) : bp_the_group(); ?>
            <li><a href="<?php bp_group_permalink(); ?>"><?php bp_group_avatar('type=full&width=250'); ?></a></li>
        <?php endwhile; endif; ?>
        </ul>
    </div>
    <div id="w2" class="tabs-panel">
        <ul class="avatars">
        <?php if(bp_has_groups('type=newest&per_page=16')) : while(bp_groups()) : bp_the_group(); ?>
            <li><a href="<?php bp_group_permalink(); ?>"><?php bp_group_avatar('type=full&width=250'); ?></a></li>
        <?php endwhile; endif; ?>
        </ul>
    </div><!-- PANEL -->
    <div id="w3" class="tabs-panel">
        <ul class="avatars">
        <?php if(bp_has_groups('type=newest&per_page=16')) : while(bp_groups()) : bp_the_group(); ?>
            <li><a href="<?php bp_group_permalink(); ?>"><?php bp_group_avatar('type=full&width=250'); ?></a></li>
        <?php endwhile; endif; ?>
        </ul>
    </div><!-- PANEL -->
</div><!-- TABS -->