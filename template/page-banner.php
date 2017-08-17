<?php 
	echo '<div class="breadcrumb-wrap"><div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">';
    	if(function_exists('bcn_display'))   {
        bcn_display();
   	 }
	echo '</div></div>';


	// Retrieves the stored value from the database
    $bannerImage = get_post_meta(get_the_ID(), 'zf_banner_image', true);
	$lgBannerText = get_post_meta(get_the_ID(), 'zf_lg_banner_text', true);
	
	

//Get Industry subpage large banner
if (is_page_template('industry-sub.php')){
$parentTitle = get_the_title( $post->post_parent );
	echo '<div class="large-banner">'
	.'<div class="lg-banner-image"><img src="'
	.$bannerImage
	.'" alt="Banner Image"/></div><!--.banner-image-->
	<div class="lg-banner-text-wrap">
	<div class="lg-banner-header">' 
		. $parentTitle
    	.': '
	 	.	get_the_title()
	 .'</div>';
	if( !empty( $lgBannerText ) ) {   
	 echo '<div class="lg-banner-text">'
	 . wpautop($lgBannerText)
	 .'</div>';
	 }
	 echo '</div>
	 <!--.slide-text-wrap-->
	 </div><!--.large-banner-->';
} else if(is_archive()){
	if (has_term('open-ceiling','product-cats')){
	$productsId = 110; 
	} elseif (has_term('drop-ceiling','product-cats')){
	$productsId = 112;
	} elseif (has_term('spot-cooling','product-cats')){
	$productsId = 114;
	} elseif (has_term('controllers','product-cats')){
	$productsId = 116;
	}
//product categories use Products page banner $productsId = 8; 
$bannerImage = get_post_meta($productsId, 'zf_banner_image', true);
$catID = $wp_query->get_queried_object();
//Get the default banner
	echo '<div class="banner">';
    	// Checks and displays the retrieved value
       	 echo '<div class="banner-image"><img src="'.$bannerImage.'" alt="Banner Image"/></div><!--.banner-image-->';
       	echo '<div class="banner-text"><h5>'
       	.$catID->name
       	.'</h5>
       	</div><!--.banner-text-->
       	</div><!--.banner-->';	
} else {
//Get the default banner
echo '<div class="banner">';
    // Checks and displays the retrieved value
       	echo '<div class="banner-image"><img src="'.$bannerImage.'" alt="Banner Image"/></div><!--.banner-image-->';
       	echo '<div class="banner-text"><h5>'
       	.get_the_title() 
       	.'</h5>
       	</div><!--.banner-text-->
       	</div><!--.banner-->';
}
?>