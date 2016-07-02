<?php
/**
 * The main template file.
 */

global $pls_archive_template;
get_header();?>
<?php if (is_home()): ?>
<div id="primary" class="site-content" style="width:100%">
<?php else: ?>
<div id="primary" class="site-content">
<?php endif;?>
    <div id="content" role="main">
		<?php show_breadcrumbs();
if ('list-style' == $pls_archive_template) {
	get_template_part('content-list');
} elseif ('grid-style' == $pls_archive_template) {
	get_template_part('content-grid');
} elseif ('full-style' == $pls_archive_template) {
	get_template_part('content-full');
} else {
	get_template_part('content-classic');
}
?>
    </div><!-- #content -->
</div><!-- #primary -->
<?php
if (!is_home()) {
	get_sidebar();
}
?>
<?php get_footer();?>