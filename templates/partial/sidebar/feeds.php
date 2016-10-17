<?php
$feeds = array(get_theme_mod('sf_rss_1'), get_theme_mod('sf_rss_2'), get_theme_mod('sf_rss_3'), get_theme_mod('sf_rss_4'));
$i = 1;
?>
<div class="widget-tabs">
    <ul class="widget-tabs-nav">
        <?php foreach($feeds as $rss) : ?>

            <?php if($rss) : ?>

            <li><a href="#rss<?php echo $i; ?>">Feed <?php echo $i; ?></a></li>

            <?php endif; ?>
        
        <?php $i++; ?>
        <?php endforeach; ?>
    </ul>

    <?php $i = 1; ?>

    <?php foreach($feeds as $rss) : ?>

        <?php if($rss) : ?>

        <?php
        $feed = new SimplePie();
        $feed->set_feed_url($rss);
        $feed->init();
        $feed->handle_content_type();
        ?>

        <div id="rss<?php echo $i; ?>" class="tabs-panel">

            <h6>RSS Feed <?php echo $i; ?> <span><a href="<?php echo str_replace('.rss', '', $rss); ?>" target="_blank"><?php echo str_replace('.rss', '', $rss); ?></a></span></h6>

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

        <?php $i++; ?>

        <?php endif; ?>
        
    <?php endforeach; ?>
    
</div>

<?php
/*
<div class="widget-tabs">

    <?php 
    
    ?>

    <ul class="widget-tabs-nav">
    <?php foreach($feeds as $rss) : ?>
        
        <?php if($rss) : ?>
            <li><a href="#rss1" id="rss<?php echo $i; ?>">Feed <?php echo $i; ?></a></li>
        <?php endif; ?>
    
    <?php $i++; ?>
    <?php endforeach; ?>
    </ul>

    <?php $i = 1; ?>

    <?php foreach($feeds as $rss) : ?>
        
        <?php if($rss) : ?>

            <?php
            $feed = new SimplePie();
            $feed->set_feed_url($rss);
            $feed->init();
            $feed->handle_content_type();
            ?>
            
            <div id="rss<?php echo $i; ?>" class="tabs-panel">
            
                <h6>RSS Feed <?php echo $i; ?> <span><a href="<?php echo str_replace('.rss', '', $rss); ?>" target="_blank"><?php echo str_replace('.rss', '', $rss); ?></a></span></h6>
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
            </div>

        <?php endif; ?>
    
    <?php $i++; ?>
    <?php endforeach; ?>


</div><!-- WIDGET -->
*/
?>