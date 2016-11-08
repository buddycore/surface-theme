<div id="message-thread">

	<?php do_action('bp_before_message_thread_content'); ?>
	
	
	<?php if(bp_thread_has_messages('order=DESC')) : ?>

		<div class="title">

		<h2><?php bp_the_thread_subject(); ?></h2>

		<p class="message-recipients">
			<span class="highlight">

				<?php if(bp_get_thread_recipients_count() <= 1) : ?>

					<?php _e('You are alone in this conversation.', 'buddypress'); ?>

				<?php elseif(bp_get_max_thread_recipients_to_list() <= bp_get_thread_recipients_count()) : ?>

					<?php printf(__('Conversation between %s recipients.', 'buddypress'), number_format_i18n(bp_get_thread_recipients_count())); ?>

				<?php else : ?>

					<?php printf(__('Conversation between %s and you.', 'buddypress'), bp_get_thread_recipients_list()); ?>

				<?php endif; ?>

			</span>

			<a class="button delete" href="<?php bp_the_thread_delete_link(); ?>"><?php _e('Delete', 'buddypress'); ?></a>

			<?php do_action('bp_after_message_thread_recipients'); ?>
		</p>

		</div><!-- TITLE -->

		<?php do_action('bp_before_message_thread_reply'); ?>

		<form id="send-reply" action="<?php bp_messages_form_action(); ?>" method="post" class="standard-form">
			<div class="padder">
				<div class="rows">
					<div class="row">
						<div class="column">
							<div class="editfield">
								<?php do_action('bp_before_message_reply_box'); ?>
								<label for="message_content" class="bp-screen-reader-text"><?php _e('Reply to Message', 'buddypress'); ?></label>
								<textarea name="content" id="message_content" rows="15" cols="40"></textarea>
								<?php do_action('bp_after_message_reply_box'); ?>
							</div>
						</div>
					</div>
				</div>

				<div class="submit">
					<input type="submit" name="send" value="<?php esc_attr_e('Send Reply', 'buddypress'); ?>" id="send_reply_button" class="submit" />
				</div>

				<input type="hidden" id="thread_id" name="thread_id" value="<?php bp_the_thread_id(); ?>" />
				<input type="hidden" id="messages_order" name="messages_order" value="<?php bp_thread_messages_order(); ?>" />
				<?php wp_nonce_field('messages_send_message', 'send_message_nonce'); ?>
			</div>
		</form><!-- #send-reply -->

		<?php do_action('bp_after_message_thread_reply'); ?>

		<?php do_action('bp_before_message_thread_list'); ?>

		<?php while(bp_thread_messages()) : bp_thread_the_message(); ?>
			<?php bp_get_template_part('members/single/messages/message'); ?>
		<?php endwhile; ?>

		<?php do_action('bp_after_message_thread_list'); ?>

	<?php endif; ?>

	<?php do_action('bp_after_message_thread_content'); ?>

</div>
