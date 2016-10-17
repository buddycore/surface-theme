<div class="widget-tabs">
    <ul class="widget-tabs-nav">
        <li><a href="#w1">Newest</a></li>
        <?php if(bp_has_members('type=online&per_page=16')) : ?>
        <li><a href="#w2">Online</a></li>
        <?php endif; ?>
        <li><a href="#w3">Popular</a></li>
        <li><a href="#w4">Last Active</a></li>
    </ul>
    <div id="w1" class="tabs-panel">
        <ul class="avatars">
        <?php if(bp_has_members('type=newest&per_page=16')) : while(bp_members()) : bp_the_member(); ?>
            <li><a href="<?php bp_member_permalink(); ?>"><?php bp_member_avatar('type=full&width=250'); ?></a></li>
        <?php endwhile; endif; ?>
        </ul>
    </div>
    <?php if(bp_has_members('type=online&per_page=16')) : ?>
    <div id="w2" class="tabs-panel">
        <ul class="avatars">
            <?php if(bp_has_members('type=online&per_page=16')) : while(bp_members()) : bp_the_member(); ?>
            <li class="online"><a href="<?php bp_member_permalink(); ?>"><?php bp_member_avatar('type=full&width=250'); ?></a></li>
        <?php endwhile; endif; ?>
        </ul>
    </div>
    <?php endif; ?>
    <div id="w3" class="tabs-panel">
        <ul class="avatars">
            <?php if(bp_has_members('type=popular&per_page=16')) : while(bp_members()) : bp_the_member(); ?>
            <li><a href="<?php bp_member_permalink(); ?>"><?php bp_member_avatar('type=full&width=250'); ?></a></li>
        <?php endwhile; endif; ?>
        </ul>
    </div><!-- PANEL -->
    <div id="w4" class="tabs-panel">
        <ul class="avatars">
            <?php if(bp_has_members('type=active&per_page=16')) : while(bp_members()) : bp_the_member(); ?>
            <li><a href="<?php bp_member_permalink(); ?>"><?php bp_member_avatar('type=full&width=250'); ?></a></li>
        <?php endwhile; endif; ?>
        </ul>
    </div><!-- PANEL -->
</div><!-- TABS -->