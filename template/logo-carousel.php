<?php
/*
Build the Industry page logo carousel.
*/
//If Tech Industry has logos, remove the conditional for the subpages
if(is_page_template('industry-sub.php') && !is_page(array(192, 194))){ 
global $post;
if($post->post_parent): 
$parent = get_page($post->post_parent);
$logos = get_post_meta($post->post_parent, 'logo_carousel', true);
endif;
} else {
$logos = get_post_meta(get_the_ID(), 'logo_carousel', true);
}

if( !empty( $logos ) ) {  
 echo '<div class="logo-carousel">
	<p class="logos-header">Join the Growing List of Sustainable Establishments<br>
	<span class="logos-small">Equipped with ZOO Fans</span></p>';
	 
echo '<div class="logos">
<div class="logo-wrap">
    <div class="scroll-prev"><span class="control">&lt;</span></div>	
	<div id="cycle-2" class="cycle-slideshow"
        data-cycle-slides="> div"
        data-cycle-timeout="1000"
        data-cycle-prev=".scroll-prev"
        data-cycle-next=".scroll-next"
        data-cycle-fx="carousel"
        data-cycle-carousel-visible="2"
        data-cycle-carousel-fluid="true"
        data-allow-wrap="true"
        >';
    // Checks and displays the retrieved values
    foreach ( (array) $logos as $key => $logo ) {

    $img = '';

	if ( isset( $logo ['logo_image_id'] ) ) {
        $img = wp_get_attachment_image( $logo['logo_image_id'], 'share-pick', null );
    }

//Output the Logos
   echo '<div class="ind-logo">' 
	 . $img 
	 . '</div><!--.ind-logo-->';
	}   
echo '</div><!--logo-wrap></div><!--.cycle-slideshow-->
<div class="scroll-next"><span class="control">&gt;</span></div>
</div><!--.logos-->';

echo '</div><!--.logo-carousel-->';
}
?>