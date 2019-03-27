<?php
$post_id = get_the_ID();
$prod_specs = get_post_meta($post_id, 'zf_prod_specs', true);
$prod_sound_level = get_post_meta($post_id, 'zf_prod_sound_level', true);
$prod_certs = get_post_meta($post_id, 'zf_prod_certs', true);
$prod_motor = get_post_meta($post_id, 'zf_prod_motor', true);
$prod_housing = get_post_meta($post_id, 'zf_prod_housing', true);
$prod_coverage = get_post_meta($post_id, 'zf_prod_coverage', true);
$prod_options = get_post_meta($post_id, 'zf_prod_options', true);
$prod_hardware = get_post_meta($post_id, 'zf_prod_hardware', true);
$prod_dimensions = get_post_meta($post_id, 'zf_prod_dimensions', true);
$prod_speed_usage = get_post_meta($post_id, 'zf_prod_speed_usage', true);
$prod_warranty = get_post_meta($post_id, 'zf_prod_warranty', true);
$prod_similar = get_post_meta($post_id, 'zf_sim_product', true);
$prod_ducting = get_post_meta($post_id, 'zf_prod_ducting', true);
$prod_diffuser = get_post_meta($post_id, 'zf_prod_diffuser', true);
$prod_sound_char = get_post_meta($post_id, 'zf_prod_sound_char', true);
$prod_controller = get_post_meta($post_id, 'zf_prod_controller', true);
$prod_man_cont = get_post_meta($post_id, 'zf_prod_manual_control', true);
//open ceiling product details

	if( !empty( $prod_specs ) ) {   
		echo '<div class="product-info">
			<div>
				<h4 class="product-subhead">Specifications</h4>'
				. wpautop($prod_specs)
			.'</div>
		</div><!--.product-info-->';
	 } 
	 if( !empty( $prod_sound_level ) ) {   
	echo '<div class="product-info">
		<div>
			<h4 class="product-subhead">Sound Level Calculations</h4>'
			. wpautop($prod_sound_level)
		.'</div>
		</div><!--.product-info-->';
	}
	 if( !empty( $prod_certs ) ) {   
	echo '<div class="product-info">
		<div>
			<h4 class="product-subhead">Certifications</h4>'
			. wpautop($prod_certs)
		.'</div>
		</div><!--.product-info-->';
	}
	if( !empty( $prod_motor ) ) {   
		echo '<div class="product-info">
			<div>
				<h4 class="product-subhead">Motor</h4>'
				. wpautop($prod_motor)
			.'</div>
		</div><!--.product-info-->';
	} 
	if( !empty( $prod_housing ) ) {  
		echo '<div class="product-info">
			<div>
				<h4 class="product-subhead">Housing</h4>'
				. wpautop($prod_housing)
			.'</div>
		</div><!--.product-info-->';
	}
	 if( !empty( $prod_coverage ) ) {   
	echo '<div class="product-info">
		<div>
			<h4 class="product-subhead">Coverage</h4>'
			. wpautop($prod_coverage)
		.'</div>
		</div><!--.product-info-->';
	}
	if( !empty( $prod_options ) ) {   
		echo '<div class="product-info">
			<div>
				<h4 class="product-subhead">Options</h4>'
				. wpautop($prod_options)
			.'</div>
		</div><!--.product-info-->';
	}
	 
	get_template_part('template/prod-downloads'); 
			
	if( !empty( $prod_hardware ) ) {  
	echo '<div class="product-info">
		<div>
			<h4 class="product-subhead">Installation Hardware Included</h4>'
			. wpautop($prod_hardware)
		.'</div>
		</div><!--.product-info-->';
	} 
	if( !empty( $prod_dimensions ) ) { 
	echo '<div class="product-info">
		<div>
			<h4 class="product-subhead">Dimensions</h4>
			<div class="prod-info-image-box">'
			. wpautop($prod_dimensions)
		.'</div>
		</div>
		</div><!--.product-info-->';
	}
	if( !empty( $prod_speed_usage ) ) {  
	echo '<div class="product-info">
		<div>
			<h4 class="product-subhead">Fan Speed vs CFM and Power Usage</h4>
			<div class="prod-info-image-box-2">'
			. wpautop($prod_speed_usage)
			.'</div>
		</div>
		</div><!--.product-info-->';
	} 
	if( !empty( $prod_warranty ) ) {  
	echo '<div class="product-info">
		<div>
			<h4 class="product-subhead">Warranty</h4>'
			. wpautop($prod_warranty)
		.'</div>
		</div><!--.product-info-->';
	} 
	?>