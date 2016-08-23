<?php get_header(); ?>

<?php get_sidebar(); ?>

<div class="main-col">

<?php if(have_posts()) : $inner_count = 1; ?>
    
    <div class="array">

        <?php while(have_posts()) : the_post(); ?>

            <?php include(locate_template('content.php')); ?>
            <?php $inner_count++; ?>

        <?php endwhile; ?>

    </div>

    <?php if(paginate_links()) : ?>

        <?php
        $args = array(
            'prev_text' => false,
            'next_text' => false
        );
        ?>
        <div class="pagination"><div class="inner"><?php echo paginate_links($args); ?></div></div>

    <?php endif; ?>

<?php else : ?>

    <p class="message info"><?php echo __('No posts published.'); ?></p>

<?php endif; ?>

</div>

<?php get_footer(); ?>
