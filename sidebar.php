<aside class="global">

    <div class="widgets">
        <div class="widget tabs quarters">
            <ul class="tabs-nav">
                <li class="download"><a href="#t0"><span>Download</span></a></li>
                <?php if(!is_user_logged_in()) : ?>
                    <li class="login"><a href="#t1"><span>Login</span></a></li>
                <?php else : ?>
                    <li class="actions"><a href="#t1"><span>Actions</span></a></li>
                <?php endif; ?>
                <li class="categories"><a href="#t2"><span>Categories</span></a></li>
                <li class="tags"><a href="#t3"><span>Tag Cloud</span></a></li>
            </ul>
            <div class="tabs-panel download" id="t0">
                <p><a href="">Download this theme on Github</a></p>
            </div>
            <div class="tabs-panel login" id="t1">
                <?php if(!is_user_logged_in()) : ?>
                <form action="#" method="post" id="login">
                    <fieldset>
                    <p class="status"></p>
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="Your Username">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Your Password">
                        <a href="<?php echo wp_lostpassword_url(); ?>">Forgot Password?</a>
                        <button type="submit" name="submit">Submit</button>
                        <?php wp_nonce_field('ajax-login-nonce', 'security'); ?>
                    </fieldset>
                </form>
                <?php else : ?>
                <div class="summary">
                    <?php // IF REMOVED YOU'll NEED TO MODIFY THE SIDEBAR STYLES in scss/templates/sidebar.scss ?>
                    <h3>Your Summary</h3>
                    <p>Welcome back <a href="<?php echo bp_loggedin_user_domain(); ?>"><?php echo bp_core_get_user_displayname(bp_loggedin_user_id()); ?></a>, you have posted <strong>xx status updates</strong> to your profile and <strong>xx group updates</strong>.</p>
                    <p>You have also created <strong>xx sites</strong> with a total of <strong>xx posts</strong> and you have created <strong>xx topics</strong> in the forums with <strong>xx replies</strong> in total.</p>
                    <p>Last but not least you have <strong>xx friends</strong> and your <strong>profile is xx% complete</strong>.</p>
                    <h3>Community Rating</h3>
                    <ul class="rating">
                        <li class="star one"><span>1 star</span></li>
                        <li class="star two"><span>2 star</span></li>
                        <li class="star three"><span>3 star</span></li>
                        <li class="star four"><span>4 star</span></li>
                        <li class="star five"><span>5 star</span></li>
                    </ul>
                </div>
                <?php endif; ?>
            </div><!-- PANEL -->
            <div class="tabs-panel categories" id="t2">
                <h3>Browse by Category</h3>
                <ul>
                <?php wp_list_categories('title_li='); ?>
                </ul>
            </div>
            <div class="tabs-panel tags" id="t3">
                <h3>Browse by Tag</h3>
                <div class="tag-cloud">
                <?php $args = array(
                    'smallest'                  => 10, 
                    'largest'                   => 22,
                    'unit'                      => 'pt', 
                    'number'                    => 20,  
                    'format'                    => 'flat',
                    'separator'                 => "\n",
                    'orderby'                   => 'name', 
                    'order'                     => 'ASC',
                    'exclude'                   => null, 
                    'include'                   => null, 
                    'topic_count_text_callback' => default_topic_count_text,
                    'link'                      => 'view', 
                    'taxonomy'                  => 'post_tag', 
                    'echo'                      => true,
                    'child_of'                  => null, // see Note!
                ); ?>
                <?php wp_tag_cloud($args); ?>
                </div>
            </div>
        </div>
    </div><!-- WIDGETS -->
</aside>