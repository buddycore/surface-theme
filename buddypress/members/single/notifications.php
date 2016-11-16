<div class="navigation-tabs">
	<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
		<ul>
			<?php bp_get_options_nav(); ?>
		</ul>
	</div>
	<div class="item-list-tabs filter">
		<ul>
			<li id="members-order-select" class="last filter"><?php bp_notifications_sort_order_form(); ?></li>
		</ul>
	</div>
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

	<div class="item-list-tabs filter" id="subnav" role="navigation">
		<ul>
			<li id="members-order-select" class="last filter"><?php bp_notifications_sort_order_form(); ?></li>
		</ul>
	</div><!-- ITEM LIST TABS -->	
</div><!-- RESPoNSIVE NAV -->
<?php
switch(bp_current_action()) :

	case 'unread' :
		
		bp_get_template_part('members/single/notifications/unread');
	
	break;

	case 'read' :
		
		bp_get_template_part('members/single/notifications/read');
	
	break;

	// Any other actions.
	default :
		
		bp_get_template_part('members/single/plugins');

	break;
endswitch;
