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
</body>
</html>