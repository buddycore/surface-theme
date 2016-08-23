<?php get_header(); the_post(); ?>

<?php get_sidebar(); ?>

<div class="main-col">

    <div class="post-single">

        <article>

            <?php if(has_post_thumbnail()) : ?>

                <figure>
                    <?php the_post_thumbnail('single'); ?>
                    <?php
                    $caption = get_post(get_post_thumbnail_id())->post_excerpt;
                    if(!empty($caption)) :
                    ?>
                    <figcaption>
                        <?php echo $caption; ?>
                    </figcaption>
                    <?php endif; ?>
                </figure>

            <?php endif; ?>

            <header>

                <div class="top">
                    <h2><?php the_title(); ?></h2>
                    <p class="authored"><?php the_time('jS \o\f F, Y'); ?> by <?php the_author_posts_link(); ?></p>
                </div>

                <ul class="details">    
                    <li><?php echo get_the_category_list(' / '); ?></li>
                </ul>
                
            </header>

            <div class="content standardise"><?php the_content(); ?></div>

            <?php if(get_the_tags()) : ?>
            <div class="tag-group">
                <h6 class="tagged-with">Post Tags:</h6>
                <?php the_tags('<p class="the-tags">', '', '</p>'); ?>
            </div>
            <?php endif; ?>

        </article>

    </div>

    <?php comments_template(); ?>

</div><!-- MAIN COL -->

<?php get_footer(); ?>