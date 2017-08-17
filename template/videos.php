<?php
/*
Videos
*/
?>
<div class="grid">
<?php
if(is_page('reps')){
$my_id = 14;
$video_groups = get_post_meta($my_id, 'video_metabox', true);
} else {
$video_groups = get_post_meta(get_the_ID(), 'video_metabox', true);
}

 if( !empty( $video_groups ) ) {   

 foreach ( (array) $video_groups as $key => $video_group) {

    $video = $vid_title = '';

	if ( isset( $video_group ['video_embed'] ) ) {
        $video = wp_oembed_get($video_group['video_embed']);
    }
	if ( isset( $video_group ['video_title'] ) ) {
		 $vid_title = esc_html( $video_group['video_title'] );
    }

      echo '<div class="grid-box video">
		<div class="grid-video">'
		.$video
		.'</div>
		</div><!--.grid-box-->';
	}
} 
?>
</div><!--.grid-->

