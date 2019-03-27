<?php
/*
Build the Industry page image carousel.
*/

$ind_images = get_post_meta(get_the_ID(), 'image_carousel', true);
if( !empty( $ind_images ) ) {  

echo '<div class="ind-img-carousel">
<div class="carousel">
<div class="carousel-wrap">
    <div class="scroll-prev"><span class="control">&lt;</span></div>	
	<div id="cycle-3" class="cycle-slideshow"
        data-cycle-slides="> div"
        data-cycle-timeout="0"
        data-cycle-prev=".scroll-prev"
        data-cycle-next=".scroll-next"
        data-cycle-fx="carousel"
        data-cycle-carousel-visible="3"
        data-cycle-carousel-fluid="true"
        data-allow-wrap="true"
        >';
    // Checks and displays the retrieved values
    foreach ( (array) $ind_images as $key => $ind_image ) {

    $image = $link = '';
	if ( isset( $ind_image ['ind_image_id'] ) ) {
     	$image = wp_get_attachment_image( $ind_image['ind_image_id'], 'share-pick', null );
    }
    if ( isset( $ind_image ['ind_image_url'] ) ) {
     	$link = esc_html( $ind_image['ind_image_url'] );
    }
   

//Output the Images
   echo '<div class="ind-img"><a href="'. $link. '">' 
	 . $image
	 . '</a></div><!--.ind-img-->';
}   
echo '</div><!--.cycle-slideshow-->
<div class="scroll-next"><span class="control">&gt;</span></div>
</div><!--carousel-wrap-->
</div><!--.carousel-->';
echo '</div><!--.ind-img-carousel-->';

} 
?>