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
$prod_elec_table = get_post_meta($post_id, 'zf_prod_elec_table', true);
$prod_mz_cabinet = get_post_meta($post_id, 'zf_prod_mz_cont_cabinet', true);
$prod_user_interface = get_post_meta($post_id, 'zf_prod_user_interface', true);
$prod_auto_trans = get_post_meta($post_id, 'zf_prod_autotransformer', true);
$prod_auto_mode = get_post_meta($post_id, 'zf_prod_auto_mode', true);
$prod_wiring = get_post_meta($post_id, 'zf_prod_wiring', true);
//controllers product details

	if( !empty( $prod_specs ) ) {   
		echo '<div class="product-info">
			<div>
				<h4 class="product-subhead">Specifications</h4>'
				. wpautop($prod_specs)
			.'</div>
		</div><!--.product-info-->';
	 } 
	 if( !empty( $prod_controller ) ) {   
	echo '<div class="product-info">
		<div>
			<h4 class="product-subhead">Controller</h4>'
			. wpautop($prod_controller)
		.'</div>
		</div><!--.product-info-->';
	}
	 if( !empty( $prod_man_cont ) ) {   
	echo '<div class="product-info">
		<div>
			<h4 class="product-subhead">Optional Manual Control</h4>'
			. wpautop($prod_man_cont)
		.'</div>
		</div><!--.product-info-->';
	}
	if( !empty( $prod_elec_table ) ) {   
		echo '<div class="product-info">
			<div>
				<h4 class="product-subhead">Electrical Table</h4>'
				. wpautop($prod_elec_table)
			.'</div>
		</div><!--.product-info-->';
	 } 
	 if( !empty( $prod_mz_cabinet ) ) {   
	echo '<div class="product-info">
		<div>
			<h4 class="product-subhead">Multi-Zone Control Cabinet</h4>'
			. wpautop($prod_mz_cabinet)
		.'</div>
		</div><!--.product-info-->';
	}
	 if( !empty( $prod_auto_trans ) ) {   
	echo '<div class="product-info">
		<div>
			<h4 class="product-subhead">Autotransformer</h4>'
			. wpautop($prod_auto_trans)
		.'</div>
		</div><!--.product-info-->';
	}
	if( !empty( $prod_user_interface ) ) {   
	echo '<div class="product-info">
		<div>
			<h4 class="product-subhead">User Interface</h4>'
			. wpautop($prod_user_interface)
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
	if( !empty( $prod_auto_mode ) ) { 
	echo '<div class="product-info">
		<div>
			<h4 class="product-subhead">Automatic Mode</h4>
			<div class="prod-info-image-box">'
			. wpautop($prod_auto_mode)
		.'</div>
		</div>
		</div><!--.product-info-->';
	}
	if( !empty( $prod_wiring ) ) { 
	echo '<div class="product-info">
		<div>
			<h4 class="product-subhead">Wiring Example</h4>
			<div class="prod-info-image-box">'
			. wpautop($prod_wiring)
		.'</div>
		</div>
		</div><!--.product-info-->';
	}
	?>