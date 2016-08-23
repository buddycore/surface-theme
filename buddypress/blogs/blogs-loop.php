<?php do_action('bp_before_blogs_loop'); ?>

<?php if(bp_has_blogs(bp_ajax_querystring( 'blogs'))) : ?>

	<?php do_action('bp_before_directory_blogs_list'); ?>

	<ul id="blogs-list" class="item-list">

	<?php while(bp_blogs()) : bp_the_blog(); ?>

		<li <?php bp_blog_class() ?>>

			<div class="inner">
				<div class="table">
					<div class="table-cell avatar">
						<a href="<?php bp_blog_permalink(); ?>"><?php bp_blog_avatar('type=full&width=200'); ?></a>
					</div>
					<div class="table-cell detail">
						<h3><a href="<?php bp_blog_permalink(); ?>"><?php bp_blog_name(); ?></a></h3>
						<p><?php bp_blog_last_active(); ?></p>
					</div>
				</div>
				<div class="meta">
					<ul>
						<li class="members">Posts: xx</li>
						<li class="view"><a href="<?php bp_blog_permalink(); ?>">Visit Site</a></a></li>
					</ul>
				</div>
				<?php do_action('bp_directory_blogs_item'); ?>
			</div>
		</li>

	<?php endwhile; ?>

	</ul>

	<?php do_action('bp_after_directory_blogs_list'); ?>

	<?php bp_blog_hidden_fields(); ?>

	<div id="pag-bottom" class="bp-pagination">
		<div class="pag-count" id="blog-dir-count-bottom">
			<?php bp_blogs_pagination_count(); ?>
		</div>
		<div class="pag-links" id="blog-dir-pag-bottom">
			<?php bp_blogs_pagination_links(); ?>
		</div>
	</div>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e('Sorry, there were no sites found.', 'buddypress'); ?></p>
	</div>

<?php endif; ?>

<?php do_action('bp_after_blogs_loop'); ?>
