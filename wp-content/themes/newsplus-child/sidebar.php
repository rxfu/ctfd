<?php
/**
 * The sidebar containing the main widget area.
 */

global $post;
// Check if an exclusive widget area is registered from page or post options
if (is_page()):
	$page_opts = get_post_meta($posts[0]->ID, 'page_options', true);
	$sb_usage  = (isset($page_opts['sb_usage'])) ? $page_opts['sb_usage'] : 'default-sidebar';
elseif (is_single()):
	$post_opts = get_post_meta($posts[0]->ID, 'post_options', true);
	$sb_usage  = (isset($post_opts['sb_usage'])) ? $post_opts['sb_usage'] : 'default-sidebar';
endif;?>
<div id="sidebar" class="widget-area" role="complementary">
<?php $categories = get_the_category();
$parent           = $categories[0]->category_parent;
$parent_name      = get_cat_name($parent);
?>
<aside class="widget widget_sub_categories">
<h3 class="sb-title"><?php echo $parent_name ?></h3>
<ul>
<?php
$args          = array('child_of' => $parent);
$subcategories = get_categories($args);
foreach ($subcategories as $subcategory):
?>
<li class="cat-item cat-item-<?php echo $subcategory->term_id ?>">
	<a href="<?php echo get_category_link($subcategory->term_id) ?>"><?php echo $subcategory->name ?></a>
</li>
<?php endforeach;?>
</ul>
</aside>
<?php if (is_page() || is_single()) {
	if (is_active_sidebar($sb_usage)) {
		dynamic_sidebar($sb_usage);
	} else
	if (is_active_sidebar('default-sidebar')) {
		dynamic_sidebar('default-sidebar');
	}
}

?>
</div><!-- #sidebar -->