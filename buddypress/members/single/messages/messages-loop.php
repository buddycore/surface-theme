<?php do_action('bp_before_member_messages_loop'); ?>

<?php if(bp_has_message_threads(bp_ajax_querystring('messages'))) : ?>

	<?php do_action('bp_after_member_messages_pagination'); ?>

	<?php do_action('bp_before_member_messages_threads'); ?>

	<form action="<?php echo bp_loggedin_user_domain() . bp_get_messages_slug() . '/' . bp_current_action() ?>/bulk-manage/" method="post" id="messages-bulk-management">

			<div class="messages">

				<?php while(bp_message_threads()) : bp_message_thread(); ?>

					<article class="message <?php bp_message_css_class(); ?><?php if(bp_message_thread_has_unread()) : ?> unread<?php else: ?> read<?php endif; ?>">
						
						<div class="table">
							<div class="table-cell avatar">
								<?php bp_message_thread_avatar(array('width' => 50, 'height' => 50)); ?>
							</div>
							<div class="table-cell detail">
								<h2><a href="<?php bp_message_thread_view_link(); ?>"><?php bp_message_thread_subject(); ?></a></h2>
								<p class="from-to">
								<?php if('sentbox' != bp_current_action()) : ?>
										<span class="from"><?php _e('From:', 'buddypress'); ?></span> <?php bp_message_thread_from(); ?>
										<?php bp_message_thread_total_and_unread_count(); ?>
										<span class="activity"><?php bp_message_thread_last_post_date(); ?></span>
								<?php else: ?>
										<span class="to"><?php _e('To:', 'buddypress'); ?></span> <?php bp_message_thread_to(); ?>
										<?php bp_message_thread_total_and_unread_count(); ?>
										<span class="activity"><?php bp_message_thread_last_post_date(); ?></span>
								<?php endif; ?>
								</p>	
							</div>
						</div>
										

						<div class="thread-excerpt standardise"><?php bp_message_thread_excerpt(); ?></div>

						<?php do_action('bp_messages_inbox_list_item'); ?>

						<ul class="options">
							<li class="select"><label for="bp-message-thread-<?php bp_message_thread_id(); ?>"><input type="checkbox" name="message_ids[]" id="bp-message-thread-<?php bp_message_thread_id(); ?>" class="message-check" value="<?php bp_message_thread_id(); ?>" /><span class="bp-screen-reader-text"><?php _e('Select', 'buddypress'); ?></span></label></li>
							<?php if(bp_is_active('messages', 'star')) : ?>
								<li class="star"><?php bp_the_message_star_action_link(array( 'thread_id' => bp_get_message_thread_id())); ?></li>
							<?php endif; ?>							
							<?php if(bp_message_thread_has_unread()) : ?>
								<li class="read"><a href="<?php bp_the_message_thread_mark_read_url();?>"><?php _e('Read', 'buddypress'); ?></a></li>
							<?php else : ?>
								<li class="unread"><a href="<?php bp_the_message_thread_mark_unread_url();?>"><?php _e('Unread', 'buddypress'); ?></a></li>
							<?php endif; ?>
							<li class="delete"><a href="<?php bp_message_thread_delete_link(); ?>"><?php _e('Delete', 'buddypress'); ?></a></li>
						</ul>
						
						<?php do_action('bp_messages_thread_options'); ?>
					</article>

				<?php endwhile; ?>

			</div><!-- MESSAGES -->

		<div class="messages-options-nav">
			<label for="select-all-messages" class="bulk-select"><input id="select-all-messages" type="checkbox"> Select All</label>
			<?php bp_messages_bulk_management_dropdown(); ?>
		</div><!-- .messages-options-nav -->

		<?php wp_nonce_field('messages_bulk_nonce', 'messages_bulk_nonce'); ?>
	</form>

	<div class="bp-pagination no-ajax" id="user-pag">
		<div class="pag-count" id="messages-dir-count"><?php bp_messages_pagination_count(); ?></div>
		<div class="pag-links" id="messages-dir-pag"><?php bp_messages_pagination(); ?></div>
	</div><!-- .pagination -->

	<?php do_action('bp_after_member_messages_threads'); ?>

	<?php do_action('bp_after_member_messages_options'); ?>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e('Sorry, no messages were found.', 'buddypress'); ?></p>
	</div>

<?php endif;?>

<?php do_action('bp_after_member_messages_loop'); ?>
