<?php
/* 
Product Downloads
*/
echo '<div class="product-info" id="product-downloads">
		<div>
			<h4 class="product-subhead green-sub">Downloads</h4>
			<ul class="product-download-links">';
			$post_id = get_the_ID();
			$prod_spec_link = get_post_meta($post_id, 'zf_prod_spec_link', true);
$prod_submittal = get_post_meta($post_id, 'zf_prod_submittal', true);
$prod_perf_data = get_post_meta($post_id, 'zf_perf_data', true);
$prod_install_gd = get_post_meta($post_id, 'zf_prod_install_gd', true);
$prod_install_gd_two = get_post_meta($post_id, 'zf_prod_install_gd_two', true);
$prod_op_manual = get_post_meta($post_id, 'zf_prod_op_manual', true);
			$icon = get_bloginfo('template_url');
			if( !empty( $prod_submittal ) ) {   
				echo '<li><img src="'. $icon .'/images/icon-download-green.svg" alt="Download Fan Resource"  /><a href="'
				. $prod_submittal
				.'" target="_blank">Submittal</a></li>';
				}
			if( !empty( $prod_spec_link ) ) {   
				echo '<li><img src="'. $icon .'/images/icon-download-green.svg" alt="Download Fan Resource" /><a href="'
				. $prod_spec_link
				.'" target="_blank">Specification Sheet</a></li>';
				}
			if( !empty( $prod_install_gd ) ) {   
				echo '<li><img src="'. $icon .'/images/icon-download-green.svg" alt="Download Fan Resource" /><a href="'
				. $prod_install_gd
				.'" target="_blank">Installation Guide ';
				if(is_single('1410')){
				echo '&#40; AVS-7.5A &#41;';
				}
				echo '</a></li>';
				}
			if( !empty( $prod_install_gd_two ) ) {   
				echo '<li><img src="'. $icon .'/images/icon-download-green.svg" alt="Download Fan Resource" /><a href="'
				. $prod_install_gd
				.'" target="_blank">Installation Guide ';
				if(is_single('1410')){
				echo '&#40; VSPOT-10K &#41;';
				}
				echo '</a></li>';
				}
			if( !empty( $prod_perf_data ) ) {   
				echo '<li><img src="'. $icon .'/images/icon-download-green.svg" alt="Download Fan Resource" /><a href="'
				. $prod_perf_data
				.'" target="_blank">Performance Data</a></li>';
				}
			if( !empty( $prod_op_manual ) ) {  
				echo '<li><img src="'. $icon .'/images/icon-download-green.svg" alt="Download Fan Resource" /><a href="'
				. $prod_op_manual
				.'" target="_blank">Operating Manual</a></li>';
				}
			if( !has_term('controllers','product-cats')){
			echo '<li><img src="'. $icon .'/images/icon-download-green.svg" alt="Download Fan Resource" /><a href="'
			. get_site_url() 
			.'/engineers-architects/specifying-resources/">CAD & BIM</a></li>';
			echo '<li><img src="'. $icon .'/images/icon-download-green.svg" alt="Download Fan Resource" /><a href="'
			. get_site_url() 
			.'/content/uploads/2017/12/ZOO-Fans-e-brochure-2017.pdf" target="_blank">Brochure</a></li>';
			}
				
echo '</ul><!--.product-download-links-->
	</div>
	</div><!--.product-info-->';
?>