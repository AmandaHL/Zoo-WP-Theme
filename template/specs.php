<?php 

//get products by category and display numerical order desc
$prod_terms = get_terms('product-cats');
$post_type = 'product';
foreach($prod_terms as $prod_term){
if ($prod_term->slug != 'spot-cooling') {
//add for each loop for product
echo '<div class="spec-section">
<h2 class="spec-header">'
. $prod_term->name
.'</h2>
<div class="spec-grid">';
$args=array(
'post_type' => $post_type,
      'tax_query' => array(
      array(
      'taxonomy' => 'product-cats',
      'field' => 'slug',
      'terms' => $prod_term->slug,
      )
      )
    );
$products=new WP_Query($args);
if( $products->have_posts() ): while( $products->have_posts() ) : $products->the_post(); 
$post_id = get_the_ID();
$prod_spec_link = get_post_meta($post_id, 'zf_prod_spec_link', true);
$prod_submittal = get_post_meta($post_id, 'zf_prod_submittal', true);
$prod_perf_data = get_post_meta($post_id, 'zf_perf_data', true);
$prod_install_gd = get_post_meta($post_id, 'zf_prod_install_gd', true);
$prod_op_manual = get_post_meta($post_id, 'zf_prod_op_manual', true);
echo '<div id="'
.$post_id
.'">
<h3 class="spec-subhead">'
. get_the_title()
.'</h3>
<ul class="product-links">';
$icon = get_bloginfo('template_url');
			if( !empty( $prod_submittal ) ) {   
				echo '<li><a class="btn post-green-btn" href="'
				. $prod_submittal
				.'" target="_blank"><img src="'. $icon .'/images/icon-download.svg" alt="Download Fan Resource"  /><span>Submittal</span></a></li>';
				}
			if( !empty( $prod_spec_link ) ) {   
				echo '<li><a class="btn post-green-btn" href="'
				. $prod_spec_link
				.'" target="_blank"><img src="'. $icon .'/images/icon-download.svg" alt="Download Fan Resource" /><span>Specification Sheet</span></a></li>';
				}
			if( !empty( $prod_install_gd ) ) {   
				echo '<li><a class="btn post-green-btn" href="'
				. $prod_install_gd
				.'" target="_blank"><img src="'. $icon .'/images/icon-download.svg" alt="Download Fan Resource" /><span>Installation Guide</span></a></li>';
				}
			if( !empty( $prod_perf_data ) ) {   
				echo '<li><a class="btn post-green-btn" href="'
				. $prod_perf_data
				.'" target="_blank"><img src="'. $icon .'/images/icon-download.svgg" alt="Download Fan Resource" /><span>Performance Data</span></a></li>';
				}
			if( !empty( $prod_op_manual ) ) {  
				echo '<li><a class="btn post-green-btn" href="'
				. $prod_op_manual
				.'" target="_blank"><img src="'. $icon .'/images/icon-download.svg" alt="Download Fan Resource" /><span>Operating Manual</span></a></li>';
				}
			if(in_category(array('open-ceiling','drop-ceiling'))){
			echo '<li><a class="btn post-green-btn" href="'
			. get_site_url() 
			.'/engineers-architects/specifying-resources/"><img src="'. $icon .'/images/icon-download.svg" alt="Download Fan Resource" /><span>CAD & BIM</span></a></li>';
			echo '<li><a class="btn post-green-btn" href="'
			. get_site_url() 
			.'/content/uploads/2017/12/ZOO-Fans-e-brochure-2017.pdf" target="_blank"><img src="'. $icon .'/images/icon-download.svg" alt="Download Fan Resource" /><span>Brochure</span></a></li>';
			}
echo '</ul><!--.product-links-->
</div>';

endwhile; endif; 
wp_reset_query();
echo '</div><!--.spec-grid-->
</div><!--.spec-section-->';
}

}  //foreach $prod_terms

?>