<?php get_header(); ?>

<?php get_sidebar(); ?>

<div class="main-col">
    <?php if(have_posts() && get_search_query()) : ?>

        <?php if(get_search_query()) :?>

            <header class="title">

                <h3><?php echo $wp_query->found_posts ; ?> results for &quot;<?php echo get_search_query(); ?>&quot;</h3>
            
            </header>

        <?php endif; ?>
    
        <div class="array">

            <?php while(have_posts()) : the_post(); ?>
                
                <article class="result">
                    <div class="inner">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="excerpt"><?php the_excerpt(); ?></div>
                        <p class="view"><a href="<?php the_permalink(); ?>">View Result</a></p>
                    </div>
                </article>

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

        <p class="message info"><?php echo __('No search results found'); ?></p>

    <?php endif; ?>
</div>

<?php get_footer(); ?>