<?php
$css_helper = 'standard';

if(is_sticky()) : 

    $css_helper .= ' sticky'; 

endif; 

if($wp_query->post_count % 2 !== 0 && $inner_count === $wp_query->post_count) : 

    $css_helper .= ' odd-last-item'; 

endif; 
?>

<article role="article" class="article one-half <?php echo $css_helper; ?>">

    <div class="inner">

        <?php if(has_post_thumbnail()) : ?>

            <div class="post-thumbnail">

                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>

            </div><!-- FEATURED -->

        <?php endif; ?>

        <div class="detail">

            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

            <p class="authored"><?php the_time('jS \o\f F, Y'); ?> by <?php the_author_posts_link(); ?></p>

            <div class="excerpt">

                <?php if(get_the_excerpt()) : ?>

                    <?php the_excerpt(); ?>

                <?php else : ?>

                    <p><?php echo __('There is no excerpt available for this post.'); ?></p>

                <?php endif; ?>

            </div>          

        </div><!-- DETAIL -->

        <div class="meta">
            <ul>
                <li class="comments"><a href="<?php the_permalink(); ?>#comments"><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></a></li>
                <li class="permalink"><a href="<?php the_permalink(); ?>">Continue Reading</a></li>
            </ul>
        </div>
        
    </div><!-- INNER -->

</article>