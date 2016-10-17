<?php require_once('asset/php/simplepie/autoloader.php'); ?>



<aside class="global">

    <div class="widgets">
        <div class="widget tabs quarters">
            <ul class="tabs-nav">
                <li class="nv-social"><a href="#t0"><span>Social</span></a></li>

                <?php if(!is_user_logged_in()) : ?>

                    <li class="login"><a href="#t1"><span>Login</span></a></li>

                <?php else : ?>

                    <li class="actions"><a href="#t1"><span>Actions</span></a></li>

                <?php endif; ?>

                <li class="categories"><a href="#t2"><span>Categories</span></a></li>
                <li class="tags"><a href="#t3"><span>Tag Cloud</span></a></li>
            </ul>
            <div class="tabs-panel tab-social" id="t0">
                
                <?php locate_template('templates/partial/sidebar/social.php', true, true); ?>

            </div><!-- PANEL -->
            <div class="tabs-panel login" id="t1">

                <?php locate_template('templates/partial/sidebar/login.php', true, true); ?>
                
            </div><!-- PANEL -->
            <div class="tabs-panel categories" id="t2">
                
                <?php locate_template('templates/partial/categories/social.php', true, true); ?>

            </div><!-- PANEL -->
            <div class="tabs-panel tags" id="t3">
                
                <?php locate_template('templates/partial/sidebar/tags.php', true, true); ?>

            </div><!-- PANEL -->
        </div>
    </div><!-- WIDGETS -->
</aside>