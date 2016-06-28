<?php
/* 	News Press's Right Sidebar Area
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since NewsPress 1.0
*/
?>
<div id="right-sidebar">
<?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>

				<aside id="archives" class="widget">
					<h3 class="widget-title"><?php _e('Archives','newspress-lite'); ?></h3>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h3 class="widget-title"><?php _e('Meta','newspress-lite'); ?></h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>

<?php endif; // end sidebar widget area ?>

</div>