<?php if(bp_is_my_profile()) : ?>
<div class="navigation-tabs">

	<div class="item-list-tabs" id="subnav" role="navigation">
		<ul>
			<?php bp_get_options_nav(); ?>
		</ul>
	</div><!-- .item-list-tabs -->
	<div class="item-list-tabs filter">
		<ul>
			<li id="blogs-order-select" class="last filter">

				<label for="blogs-order-by"><?php _e( 'Order By:', 'buddypress' ); ?></label>
				<select id="blogs-order-by">
					<option value="active"><?php _e( 'Last Active', 'buddypress' ); ?></option>
					<option value="newest"><?php _e( 'Newest', 'buddypress' ); ?></option>
					<option value="alphabetical"><?php _e( 'Alphabetical', 'buddypress' ); ?></option>

					<?php

					/**
					 * Fires inside the members blogs order options select input.
					 *
					 * @since 1.2.0
					 */
					do_action( 'bp_member_blog_order_options' ); ?>

				</select>
			</li>
		</ul>
	</div>
</div>

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

	<div class="item-list-tabs no-ajax filter" id="subnav" role="navigation">
		<ul>
			<li id="activity-filter-select" class="last">
				<select id="blogs-order-by">
					<option value="active"><?php _e( 'Last Active', 'buddypress' ); ?></option>
					<option value="newest"><?php _e( 'Newest', 'buddypress' ); ?></option>
					<option value="alphabetical"><?php _e( 'Alphabetical', 'buddypress' ); ?></option>

					<?php

					/**
					 * Fires inside the members blogs order options select input.
					 *
					 * @since 1.2.0
					 */
					do_action( 'bp_member_blog_order_options' ); ?>

				</select>
			</li>
		</ul>
	</div><!-- ITEM LIST TABS -->	
</div><!-- RESPoNSIVE NAV -->

<?php endif; ?>
<?php
switch ( bp_current_action() ) :

	// Home/My Blogs
	case 'my-sites' :

		/**
		 * Fires before the display of member blogs content.
		 *
		 * @since 1.2.0
		 */
		do_action( 'bp_before_member_blogs_content' ); ?>

		<div class="blogs myblogs">

			<?php bp_get_template_part( 'blogs/blogs-loop' ) ?>

		</div><!-- .blogs.myblogs -->

		<?php

		/**
		 * Fires after the display of member blogs content.
		 *
		 * @since 1.2.0
		 */
		do_action( 'bp_after_member_blogs_content' );
		break;

	// Any other
	default :
		bp_get_template_part( 'members/single/plugins' );
		break;
endswitch;
