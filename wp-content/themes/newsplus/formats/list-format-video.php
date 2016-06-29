<?php
/* Post Format - Video */

global $pls_disable_video;

$post_opts = get_post_meta( $post->ID, 'post_options', true );
$pf_video = !empty( $post_opts['pf_video'] ) ? $post_opts['pf_video'] : false;

$post_class = 'entry-list clear';
if ( ! $pf_video ) {
	$post_class .= ' no-image';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>

<?php if ( 'true' !== $pls_disable_video ) {
	if ( $pf_video ) { ?>
		<div class="entry-list-left">
			<div class="embed-wrap">
				<?php global $wp_embed;
				$post_embed = $wp_embed->run_shortcode( '[embed]'.$pf_video.'[/embed]' );
				echo $post_embed; ?>
			</div><!-- .embed-wrap -->
		</div><!-- .entry-list-left -->
	<?php }
}
else { ?>
    <div class="entry-list-left">
		<?php get_template_part( 'formats/format', 'format' ); ?>
    </div><!-- .entry-list-left -->
<?php } ?>

<div class="entry-list-right">