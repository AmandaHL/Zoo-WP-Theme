<?php
/*
Display the Featured Content boxes on the Home Page
*/
 $boxes = get_post_meta(get_the_ID(), 'featured_box', true);
 if( !empty( $boxes ) ) {   
	echo '<section class="featured"><div class="f-box-wrapper">';
    // Checks and displays the retrieved values
    foreach ( (array) $boxes as $key => $box ) {

    $img = $title = $text = $link = '';

    if ( isset( $box ['title'] ) ) {
        $title = esc_html( $box['title'] );
    }

    if ( isset( $box ['featured-text'] ) ) {
        $text = wpautop( $box['featured-text'] );
    }

    if ( isset( $box ['image_id'] ) ) {
        $img = wp_get_attachment_image( $box['image_id'], 'share-pick', null);
    }
 	if ( isset( $box ['link_box'] ) ) {
    $link = esc_html(  $box['link_box'] );
    }
    //Output the Boxes
    echo '<div class="f-box"><div class="f-box-image">'. $img .'</div><div class="f-box-title">'.$title.'</div><div class="f-box-text">'. $text .'</div><div class="button"><a href="'. $link .'">Read More</a></div></div><!--.f-box-->';
}
echo '</div><!--.f-box-wrapper--></section>';
}
?>