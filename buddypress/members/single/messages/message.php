<div class="message-box <?php bp_the_thread_message_css_class(); ?>">

	<div class="message-metadata">

		<?php do_action('bp_before_message_meta'); ?>

		<div class="table">
			<div class="table-cell avatar">
				<a href="<?php bp_the_thread_message_sender_link(); ?>"><?php bp_the_thread_message_sender_avatar('type=thumb&width=40&height=40'); ?></a>
			</div>
			<div class="table-cell details">
				<?php if(bp_get_the_thread_message_sender_link()) : ?>

					<strong><a href="<?php bp_the_thread_message_sender_link(); ?>"><?php bp_the_thread_message_sender_name(); ?></a></strong>

				<?php else : ?>

					<strong><?php bp_the_thread_message_sender_name(); ?></strong>

				<?php endif; ?>

				<span class="activity"><?php bp_the_thread_message_time_since(); ?></span>
			</div>
		</div>

		<?php do_action('bp_after_message_meta'); ?>

	</div><!-- .message-metadata -->

	<?php do_action('bp_before_message_content'); ?>

	<div class="message-content standardise"><?php bp_the_thread_message_content(); ?></div>

	<?php sc_bp_message_status(bp_get_the_thread_message_id()); ?>

	

	<?php if(bp_is_active('messages', 'star')) : ?>
		<ul class="options">
			<li><?php bp_the_message_star_action_link(); ?></li>
		</ul>
	<?php endif; ?>

	<?php do_action('bp_after_message_content'); ?>

</div><!-- .message-box -->
