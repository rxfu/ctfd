<?php
/* Post Format - Standard */

global $list_big_width, $list_big_height, $list_big_crop;

$post_class = 'entry-list clear';
if ( ! has_post_thumbnail() ) {
	$post_class .= ' no-image';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>

	<?php if ( function_exists( 'aq_resize' ) ) {
		$img_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
		$img = $img_src[0];
		$alt_text = basename( get_attached_file( get_post_thumbnail_id( get_the_ID() ) ) );
		$crop = ! empty( $list_big_crop ) ? true : false;
		$thumbnail = aq_resize( $img, $list_big_width, $list_big_height, $crop, true, true );

		$thumbnail = ! empty( $thumbnail ) ? $thumbnail : $img;

	}
	else {
		$thumbnail = get_the_post_thumbnail( 'list_big_thumb' );
	}

	if ( $thumbnail ) {
		echo '<div class="entry-list-left">';
			echo '<div class="post-thumb"><a href="' . get_permalink() . '" title="' . get_the_title() . '"><img src="' . $thumbnail . '" class="attachment-post-thumbnail wp-post-image" alt="' . $alt_text . '"></a></div>';
		echo '</div>';
	}
	?>

<div class="entry-list-right">