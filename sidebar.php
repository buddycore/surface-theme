<?php 
require_once('asset/php/simplepie/autoloader.php');
$rssFeed = 'https://wordpress.org/news/feed/';
$feed = new SimplePie();
$feed->set_feed_url($rssFeed);
$feed->init();
$feed->handle_content_type();
?>



<aside class="global">

    <div class="widgets">
        <div class="widget tabs quarters">
            <ul class="tabs-nav">
                <li class="nv-social"><a href="#t0"><span>Download</span></a></li>
                <?php if(!is_user_logged_in()) : ?>
                    <li class="login"><a href="#t1"><span>Login</span></a></li>
                <?php else : ?>
                    <li class="actions"><a href="#t1"><span>Actions</span></a></li>
                <?php endif; ?>
                <li class="categories"><a href="#t2"><span>Categories</span></a></li>
                <li class="tags"><a href="#t3"><span>Tag Cloud</span></a></li>
            </ul>
            <div class="tabs-panel tab-social" id="t0">
                
                <div class="inner-tabs">
                    <ul class="inner-tabs-nav">
                        <li class="nv-members"><a href="#i1" title="Members"><span>Members</span></a></li>
                        <li class="nv-groups"><a href="#i2" title="Groups"><span>Groups</span></a></li>
                        <li class="nv-links"><a href="#i3" title="Links"><span>Links</span></a></li>
                        <li class="nv-rss"><a href="#i4" title="News Feed"><span>News</span></a></li>
                    </ul>
                    
                    <div id="i1" class="tabs-panel">
                        <div class="widget-tabs">
                            <ul class="widget-tabs-nav">
                                <li><a href="#w1">Newest</a></li>
                                <li><a href="#w2">Popular</a></li>
                                <li><a href="#w3">Last Active</a></li>
                            </ul>
                            <div id="w1" class="tabs-panel">
                                <ul class="avatars">
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                </ul>
                            </div>
                            <div id="w2" class="tabs-panel">
                                <ul class="avatars">
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                </ul>
                            </div>
                            <div id="w3" class="tabs-panel">
                                <ul class="avatars">
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/member.png'); ?>" alt=""></a></li>
                                </ul>
                            </div><!-- PANEL -->
                        </div><!-- TABS -->
                    </div><!-- TAB -->
                    <div id="i2" class="tabs-panel">
                        <div class="widget-tabs">
                            <ul class="widget-tabs-nav">
                                <li><a href="#g1">Newest</a></li>
                                <li><a href="#g2">Popular</a></li>
                                <li><a href="#g3">Last Active</a></li>
                            </ul>
                            <div id="g1" class="tabs-panel">
                                 <ul class="avatars">
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                </ul>
                            </div>
                            <div id="g2" class="tabs-panel">
                                <ul class="avatars">
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                </ul>
                            </div>
                            <div id="g3" class="tabs-panel">
                                <ul class="avatars">
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo asset_url('img/default/group.png'); ?>" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="i3" class="tabs-panel">
                        <ul class="link-list">
                            <li><a href="#">Download Surface Theme</a></li>
                            <li><a href="#">Change Profile Avatar</a></li>
                            <li><a href="#">Post a Status Update</a></li>
                        </ul>
                    </div>

                    <div id="i4" class="tabs-panel">

                        <div class="widget-tabs">
                            <ul class="widget-tabs-nav">
                                <li><a href="#rss1">Feed 1</a></li>
                                <li><a href="#rss2">Feed 2</a></li>
                                <li><a href="#rss3">Feed 3</a></li>
                            </ul>
                            <div id="rss1" class="tabs-panel">
                                <h6>RSS Feed 1 <span><a href="<?php echo str_replace('.rss', '', $rssFeed); ?>" target="_blank"><?php echo str_replace('.rss', '', $rssFeed); ?></a></span></h6>

                                <ul class="rss-list">
                                    <?php foreach($feed->get_items(0, 6) as $item) : ?>

                                    <li>
                                        <a href="<?php echo $item->get_permalink(); ?>" target="_blank">
                                            <span class="title"><?php echo substr($item->get_title(), 0, 75); ?><?php if(strlen($item->get_title()) > 75) : echo '...'; endif; ?></span>
                                            <span class="date"><?php echo $item->get_date('j F Y | g:i a'); ?></span>
                                        </a>
                                    </li>

                                    <?php endforeach; ?>
                                </ul>
                            </div><!-- PANEL -->
                            <div id="rss2" class="tabs-panel">
                                <h6>RSS Feed 2 <span><a href="<?php echo str_replace('.rss', '', $rssFeed); ?>" target="_blank"><?php echo str_replace('.rss', '', $rssFeed); ?></a></span></h6>

                                <ul class="rss-list">
                                    <?php foreach($feed->get_items(0, 6) as $item) : ?>

                                    <li>
                                        <a href="<?php echo $item->get_permalink(); ?>" target="_blank">
                                            <span class="title"><?php echo substr($item->get_title(), 0, 75); ?><?php if(strlen($item->get_title()) > 75) : echo '...'; endif; ?></span>
                                            <span class="date"><?php echo $item->get_date('j F Y | g:i a'); ?></span>
                                        </a>
                                    </li>

                                    <?php endforeach; ?>
                                </ul>
                            </div><!-- PANEL -->
                            <div id="rss3" class="tabs-panel">
                                <h6>RSS Feed 3 <span><a href="<?php echo str_replace('.rss', '', $rssFeed); ?>" target="_blank"><?php echo str_replace('.rss', '', $rssFeed); ?></a></span></h6>

                                <ul class="rss-list">
                                    <?php foreach($feed->get_items(0, 6) as $item) : ?>

                                    <li>
                                        <a href="<?php echo $item->get_permalink(); ?>" target="_blank">
                                            <span class="title"><?php echo substr($item->get_title(), 0, 75); ?><?php if(strlen($item->get_title()) > 75) : echo '...'; endif; ?></span>
                                            <span class="date"><?php echo $item->get_date('j F Y | g:i a'); ?></span>
                                        </a>
                                    </li>

                                    <?php endforeach; ?>
                                </ul>
                            </div><!-- PANEL -->
                        </div><!-- WIDGET -->
                    </div>
                </div>
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
                    sdsds
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