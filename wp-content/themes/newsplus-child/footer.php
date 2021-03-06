<?php
/**
 * The template for displaying footer.
 *
 * Contains secondary widget areas, footer content and the closing of the
 * #main and #page div elements.
 */

global $pls_hide_secondary, $pls_footer_left, $pls_footer_right, $post;?>
		</div><!-- .row -->
    </div><!-- #main .wrap -->
</div><!-- #main -->
<?php if (is_active_sidebar('widget-area-after-content')): ?>
	<div id="widget-area-after-content">
		<div class="wrap">
			<?php dynamic_sidebar('widget-area-after-content');?>
		</div><!--.wrap -->
	</div><!-- #widget-area-before-content -->
<?php endif;

/* Check if the secondary widget areas are active */
if (is_active_sidebar('secondary-column-1') || is_active_sidebar('secondary-column-2') || is_active_sidebar('secondary-column-3')):

	/* Check if the user has opted to hide widget area */
	if (is_page()) {
		$page_opts      = get_post_meta($posts[0]->ID, 'page_options', true);
		$hide_secondary = isset($page_opts['hide_secondary']) ? $page_opts['hide_secondary'] : '';
	} // is page
elseif (is_single()) {
	$post_opts = get_post_meta($posts[0]->ID, 'post_options', true);
	// $hide_secondary = isset($post_opts['hide_secondary']) ? $post_opts['hide_secondary'] : '';
	$hide_secondary = 'true';
} // is single
else {
		$hide_secondary = $pls_hide_secondary;
	}
	if ('true' != $hide_secondary): ?>
				        <div id="secondary" role="complementary">
				            <div class="wrap clear">
				                <div class="column one-third">
									<?php
	if (is_active_sidebar('secondary-column-1')) {
		dynamic_sidebar('secondary-column-1');
	}

	?>
				                </div><!-- .column one-third -->
				                <div class="column one-third">
									<?php
	if (is_active_sidebar('secondary-column-2')) {
		dynamic_sidebar('secondary-column-2');
	}

	?>
				                </div><!-- .column one-third -->
				                <div class="column one-third last">
									<?php
	if (is_active_sidebar('secondary-column-3')) {
		dynamic_sidebar('secondary-column-3');
	}

	?>
				                </div><!-- .column one-third .last -->
				            </div><!-- #secondary .wrap -->
				        </div><!-- #secondary -->
					<?php endif; // hide secondary
endif; // if widget areas are active ?>
<footer id="footer" role="contentinfo">
    <div class="wrap clear">
        <div class="notes-left"><?php echo stripslashes($pls_footer_left); ?></div><!-- .notes-left -->
        <div class="notes-right"><?php echo stripslashes($pls_footer_right); ?></div><!-- .notes-right -->
    </div><!-- #footer wrap -->
</footer><!-- #footer -->

<div class="fixed-widget-bar fixed-left">
	<?php
if (is_active_sidebar('fixed-widget-bar-left')) {
	dynamic_sidebar('fixed-widget-bar-left');
}
?>
</div>

<div class="fixed-widget-bar fixed-right">
	<?php
if (is_active_sidebar('fixed-widget-bar-right')) {
	dynamic_sidebar('fixed-widget-bar-right');
}
?>
</div>

</div> <!-- #page -->
<div class="scroll-to-top"><a href="#" title="<?php _e('Scroll to top', 'newsplus');?>"><span class="sr-only">Top</span></a></div><!-- .scroll-to-top -->
<?php wp_footer();?>
</body>
</html>