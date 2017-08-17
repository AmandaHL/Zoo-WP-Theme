<?php
/*
Build the slideshow using the Home Slider metabox content.
*/
$slides = get_post_meta(get_the_ID(), 'home_slider_box', true);
 if( !empty( $slides ) ) {   
echo '<div id="hero" class="cycle-slideshow"
	data-cycle-slides="> div"
    	data-cycle-fx="fade"
    	data-cycle-speed="900"
	data-cycle-pager=".cycle-pager"
	data-cycle-pager-event="mouseover"
	data-cycle-prev=".prev"
        data-cycle-next=".next"
	data-cycle-loader=true
    	data-cycle-progressive="#images"
    >';
	
    // Checks and displays the retrieved values
    foreach ( (array) $slides as $key => $slide ) {

    $img = $header = $text = $link = '';

	if ( isset( $slide ['slide_image_id'] ) ) {
        $img = wp_get_attachment_image( $slide['slide_image_id'], 'share-pick', null );
    }

    if ( isset( $slide ['slide_header'] ) ) {
        $header = esc_html( $slide['slide_header'] );
    }

    if ( isset( $slide ['slide_text'] ) ) {
        $text = wpautop( $slide['slide_text'] );
    }
	if ( isset( $slide ['learn_more'] ) ) {
        $link = esc_html( $slide['learn_more'] );
    }
   

    //Output the Slides
   echo '<div class="home-slide">
   	<div class="prev"><span class="control">&lt;</span></div>
    <div class="next"><span class="control">&gt;</span></div>
    <div class="slide-image">'
	 . $img 
	 .'	 </div><div class="slide-text-wrap">
	 <div class="slide-header">' 
	 . $header
	 .'</div><div class="slide-text">'
	 . $text
	 .'</div><div class="slide-btn"><a href="'
	 . $link 
	 .'">Learn More</a></div></div><!--.slide-text-wrap--><div class="cycle-pager"></div></div><!--home-slide-->';
}
echo '</div><!--.cycle-slideshow-->';

}
?>