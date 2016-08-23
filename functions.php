<?php
locate_template('/asset/php/customizer.php', true, true);
locate_template('/asset/php/wp/init.wordpress.php', true, true);
locate_template('/asset/php/wp/menus.php', true, true);
locate_template('/asset/php/wp/sidebars.php', true, true);
locate_template('/asset/php/wp/config.php', true, true);
locate_template('/asset/php/wp/walker.class.php', true, true);
locate_template('/asset/php/wp/login.custom.php', true, true);
locate_template('/asset/php/bp/init.buddypress.php', true, true);
locate_template('/asset/php/bp/fns.buddypress.php', true, true);

locate_template('/asset/php/bp/class.upload.php', true, true);
locate_template('/asset/php/bp/upload.attach.php', true, true);
// locate_template('/asset/php/wp/wp-login.php', true, true);

function asset_url($path) {
    return get_bloginfo('template_directory').'/asset/'.$path;
}
