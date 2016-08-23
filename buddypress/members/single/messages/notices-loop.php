<?php do_action('bp_before_notices_loop'); ?>

<?php if(bp_has_message_threads()) : ?>

	<?php do_action('bp_after_notices_pagination'); ?>
	<?php do_action('bp_before_notices'); ?>

	<div class="messages">
		<?php while(bp_message_threads()) : bp_message_thread(); ?>
			<article class="message <?php bp_message_css_class(); ?>">
				<h2><?php bp_message_notice_subject(); ?></h2>
				<p class="from-to"><?php _e('Sent:', 'buddypress'); ?> <?php bp_message_notice_post_date(); ?></p>

				<div class="thread-excerpt standardise"><?php bp_message_notice_text(); ?></div>
				
				<?php do_action('bp_notices_list_item'); ?>

				<ul class="options">
					<li><a class="button" href="<?php bp_message_activate_deactivate_link(); ?>" class="confirm"><?php bp_message_activate_deactivate_text(); ?></a></li>
					<li class="delete"><a class="button" href="<?php bp_message_notice_delete_link(); ?>" class="confirm">Delete</a></li>
				</ul>
			</article>
		<?php endwhile; ?>
	</div><!-- #message-threads -->

	<?php do_action('bp_after_notices'); ?>

	<div class="pagination no-ajax" id="user-pag">
		<div class="pag-count" id="messages-dir-count"><?php bp_messages_pagination_count(); ?></div>
		<div class="pag-links" id="messages-dir-pag"><?php bp_messages_pagination(); ?></div>
	</div><!-- .pagination -->

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e('Sorry, no notices were found.', 'buddypress'); ?></p>
	</div>

<?php endif;?>

<?php do_action('bp_after_notices_loop'); ?>
