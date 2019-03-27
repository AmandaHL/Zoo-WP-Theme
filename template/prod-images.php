<?php
//Product Images

$prod_images = get_post_meta(get_the_ID(), 'prod_images', true);
?>

<div id="prod-1" class="cycle-slideshow"
        data-cycle-slides="> div"
       	data-cycle-timeout=0
        data-cycle-fx=tileBind
        >
		 <?php // Checks and displays the retrieved values
    foreach ( (array) $prod_images as $key => $prod_image ) {

   			$img = '';

			if ( isset( $prod_image ['prod_image_id'] ) ) {
       		$img = wp_get_attachment_image( $prod_image['prod_image_id'], 'share-pick', null );
    		}

		//Output the Large Images
  		echo '<div class="prod-img">' 
	 	. $img 
	 	. '</div><!--.prod-img-->';
	}  
	?>
	
</div><!--#prod-1-->

<div id="prod-2" class="cycle-slideshow"
        data-cycle-slides="> div"
        data-cycle-timeout=0
        data-cycle-fx=carousel
        data-cycle-carousel-visible=5
       	data-cycle-carousel-fluid=false
        data-cycle-carousel-vertical=true
        data-allow-wrap=false   
        >
       
	<?php // Checks and displays the retrieved values
    foreach ( (array) $prod_images as $key => $thumb ) {

   			$prod_thb = '';

			if ( isset( $thumb ['prod_image_id'] ) ) {
       		$prod_thb = wp_get_attachment_image( $thumb['prod_image_id'], 'product-thumb', null );
    		}

		//Output the Carousel
  		echo '<div class="prod-thumb">' 
	 	. $prod_thb 
	 	. '</div><!--.prod-thumb-->';
	}  
	?>
</div><!--#prod-2-->
