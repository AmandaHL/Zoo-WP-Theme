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
       	data-cycle-slides="img"
       	data-cycle-timeout="0"
        data-cycle-prev=".scroll-prev"
        data-cycle-next=".scroll-next"
        data-cycle-fx="tileBind"      
        >';
    // Checks and displays the retrieved values
    foreach($pages as $page) {

//Show the Gallery Images
   echo get_the_post_thumbnail( $page->ID, 'post-thumbnail' );
}   
echo '</div><!--.cycle-slideshow-->
<div class="scroll-next"><span class="control">&gt;</span></div>
</div><!--gallery-wrap--></div><!--.gallery-->';

echo '<div id="slideshow2" class="gallery-pager">
<div id="cycle-4" class="cycle-slideshow"
       	data-cycle-slides="img"
       	data-cycle-timeout="0"
        data-cycle-prev=".scroll-prev"
        data-cycle-next=".scroll-next"
        data-cycle-fx="carousel"
        data-cycle-carousel-visible="3"
        data-cycle-carousel-fluid="true"
        data-allow-wrap="false" 
         data-cycle-fx="tileBind"           
        >';
    // Checks and displays the retrieved values
    foreach($pages as $page) {

//Output the Thumbs
   echo get_the_post_thumbnail( $page->ID, 'post-thumbnail' );
}   
echo '</div><!--.cycle-slideshow-->
</div><!--.gallery-pager-->';
}
?>