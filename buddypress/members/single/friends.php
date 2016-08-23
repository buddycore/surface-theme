<?php if(bp_is_my_profile()) : ?>
<div class="navigation-tabs">
	<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
		<ul>			
			<?php bp_get_options_nav(); ?>				
		</ul>
	</div>
</div><!-- NAVIGATIoN TABS -->
<?php endif; ?>		

<?php 
switch(bp_current_action()) :

	// Home/My Friends
	case 'my-friends' :

		do_action('bp_before_member_friends_content'); ?>

		<div class="members friends"><?php bp_get_template_part('members/friends-loop') ?></div><!-- .members.friends -->

		<?php do_action('bp_after_member_friends_content');

	break;

	case 'requests' :

		bp_get_template_part('members/single/friends/requests');

	break;

	// Any other
	default :

		bp_get_template_part('members/single/plugins');

	break;

endswitch;
