<?php
/*
Image Gallery - Media Page
*/

 global $post;
 $pages = get_pages( array(
                    'child_of' => 6, // Only pages that are children of the current page
                    'depth' => 2 ,   // Only show one level of hierarchy
                ));

if( !empty( $pages ) ) {   
echo '<div id="slideshow1" class="gallery">
<div class="gallery-wrap">
    <div class="scroll-prev"><span class="control">&lt;</span></div>
<div id="cycle-3" class="cycle-slideshow"
       	data-cycle-slides="> div"
       	data-cycle-timeout="0"
        data-cycle-prev=".scroll-prev"
        data-cycle-next=".scroll-next"
        data-cycle-fx="tileBlind"      
        >';
    // Checks and displays the retrieved values
    foreach($pages as $page) {
	$ind_images = get_post_meta($page->ID, 'image_carousel', true);
	if( !empty( $ind_images ) ) {  
		 foreach ( (array) $ind_images as $key => $ind_image ) {

   			 $image = $link = '';
			if ( isset( $ind_image ['ind_image_id'] ) ) {
     			$image = wp_get_attachment_image( $ind_image['ind_image_id'], 'share-pick', null );
    		}
    		if ( isset( $ind_image ['ind_image_url'] ) ) {
     			$link = esc_html( $ind_image['ind_image_url'] );
   			 }
   
		//Show the Gallery Images
		   echo '<div><a href="'. $link. '">' 
			 . $image
			 . '</a></div>';
			} 
		} 
	} 
echo '</div><!--.cycle-slideshow-->
<div class="scroll-next"><span class="control">&gt;</span></div>
</div><!--gallery-wrap--></div><!--.gallery-->';

echo '<div id="slideshow2" class="gallery-pager">
<div id="cycle-4" class="cycle-slideshow"
       	data-cycle-slides="> img"
       	data-cycle-timeout="0"
        data-cycle-prev=".scroll-prev"
        data-cycle-next=".scroll-next"
        data-cycle-fx="carousel"
        data-cycle-carousel-visible="3"
        data-cycle-carousel-fluid="true"
        data-allow-wrap="false"        
        >';
    // Checks and displays the retrieved values
    foreach($pages as $page) {
		$ind_images = get_post_meta($page->ID, 'image_carousel', true);
		if( !empty( $ind_images ) ) {  
		 	foreach ( (array) $ind_images as $key => $ind_image ) {

				 $image = $link = '';
				if ( isset( $ind_image ['ind_image_id'] ) ) {
					$image = wp_get_attachment_image( $ind_image['ind_image_id'], 'share-pick', null );
				}
				
   
		//Show the Gallery Images
		   echo $image;
			} 
		} 
}   
echo '</div><!--.cycle-slideshow-->
</div><!--.gallery-pager-->';
}
?>