<?php if(bp_is_my_profile()) : ?>
<div class="navigation-tabs">
	<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
		<ul>
			<?php bp_get_options_nav(); ?>
		</ul>
	</div><!-- .item-list-tabs -->
</div><!-- NAVIGATIoN TABS -->

<div class="navigation-tabs-responsive">
	<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
		<ul>
			<li><button class="filter-toggle"><span>Toggle Menu</span></button>
				<ul class="filternav">
					<?php bp_get_options_nav(); ?>
				</ul>
			</li>
		</ul>
	</div><!-- ITEM LIST TABS -->
</div><!-- RESPoNSIVE NAV -->
<?php endif; ?>
<?php do_action('bp_before_profile_content'); ?>

<div class="profile">

<?php switch(bp_current_action()) :

	// Edit
	case 'edit'   :
		
		bp_get_template_part('members/single/profile/edit');
	
	break;

	// Change Avatar
	case 'change-avatar' :
		
		bp_get_template_part('members/single/profile/change-avatar');
	
	break;

	// Change Cover Image
	case 'change-cover-image' :
		
		bp_get_template_part('members/single/profile/change-cover-image');
	
	break;

	// Compose
	case 'public' :

		// Display XProfile
		if (bp_is_active('xprofile')) :

			bp_get_template_part('members/single/profile/profile-loop');

		// Display WordPress profile (fallback)
		else :

			bp_get_template_part('members/single/profile/profile-wp');

		endif;

	break;

	// Any other
	default :
		
		bp_get_template_part('members/single/plugins');
	
	break;
	
endswitch; ?>
</div><!-- .profile -->

<?php do_action('bp_after_profile_content'); ?>
