        </div>
    </main>
    <footer class="global">
        <nav>
            <?php 
            if(has_nav_menu('sf-footer')) : 
                $defaults = array(
                    'theme_location'    => 'sf-footer',
                    'container'         => false,
                    'items_wrap'        => '<ul class="sf-footer">%3$s</ul>'
                );
                wp_nav_menu($defaults);
            endif;
            ?>
            <p>Powered by WordPress &amp; BuddyPress</p>
        </nav>
    </footer>    
</div><!-- CANVAS -->
<?php wp_footer(); ?>

<script>
<?php if(get_theme_mod('sf_sticky_header')) : ?>

    $('aside.global').theiaStickySidebar({ additionalMarginTop: 90 });

<?php else : ?>

    $('aside.global').theiaStickySidebar({ additionalMarginTop: 20 });

<?php endif; ?>
</script>
<div class="min-requirements">
    <div class="table">
        <div class="table-cell">
            <p>Your device does not meet the minimum requirements to view this site.</p>
        </div>
    </div>
</div>

</body>
</html>