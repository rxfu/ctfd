<?php
/* Post Format - Video */

global $pls_disable_video;

$post_opts = get_post_meta( $post->ID, 'post_options', true);
$pf_video = ! empty( $post_opts['pf_video'] ) ? $post_opts['pf_video'] : '';

if ( is_single() || 'true' !== $pls_disable_video ) {
	if ( $pf_video ) { ?>
        <div class="embed-wrap">
            <?php global $wp_embed;
            $post_embed = $wp_embed->run_shortcode( '[embed]'.$pf_video.'[/embed]' );
            echo $post_embed; ?>
        </div><!-- .embed-wrap -->
	<?php }

	else {
		_e( '<span class="no-video">No video URL found.</span>', 'newsplus' );
	}
}

else {
	get_template_part( 'formats/format', 'format' );
}?>