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
            
            <div class="standardise">
                <h2><?php the_title(); ?></h2>
                <?php if(get_the_content()) : ?>
                    <?php the_content(); ?>
                <?php else : ?>
                    <p class="message info">There is no content for this page yet.</p>
                <?php endif; ?> 
            </div>
        </article>

    </div>

</div>

<?php get_footer(); ?>
