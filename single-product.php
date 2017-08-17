<?php 
/*
Single Post Template: Product Post
*/
get_header();?>
<?php 
	echo '<div class="breadcrumb-wrap"><div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">';
    	if(function_exists('bcn_display'))   {
        bcn_display();
   	 }
	echo '</div></div>';
?>
<?php //load the variables
$post_id = get_the_ID();
$prod_sub = get_post_meta($post_id, 'zf_prod_sub', true);
$prod_feat = get_post_meta($post_id, 'zf_prod_feat', true);
$prod_spec_link = get_post_meta($post_id, 'zf_prod_spec_link', true);
$prod_submittal = get_post_meta($post_id, 'zf_prod_submittal', true);
$prod_test_results = get_post_meta($post_id, 'zf_prod_test_results', true);
$prod_install_gd = get_post_meta($post_id, 'zf_prod_install_gd', true);
$prod_op_manual = get_post_meta($post_id, 'zf_prod_op_manual', true);
$prod_uses = get_post_meta($post_id, 'zf_prod_uses', true);
$prod_eff_perf = get_post_meta($post_id, 'zf_prod_eff_perf', true);
$prod_coverage = get_post_meta($post_id, 'zf_prod_coverage', true);
?>
<section>
<h2 class="prod-title"><?php the_title();?></h2>
	<h4 class="prod-subtitle"><?php echo $prod_sub ;?></h4>
<div class="product">
	<div class="prod-img-box">
		<?php 
		get_template_part('template/prod-images');
		?>	
	</div><!--.prod-img-box-->
	<div class="prod-sidebar">
		
		<div class="prod-features">
			<?php echo wpautop($prod_feat) ;?>
		</div>
	
		<a class="prod-btn" href="<?php echo $prod_spec_link; ?>">Specifications</a>
	
	</div><!--.prod-sidebar-->
</div><!--.product-->
</section>


<section>
	<div class="product-info">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; endif; wp_reset_postdata(); ?>
		
	</div><!--.product-info-->
	<div>
		<ul class="product-links">
		<?php
		if( !empty( $prod_submittal ) ) {   
			echo '<li><a href="'
			. $prod_submittal
			.'">Submittal</a><span> | </span></li>';
			}
		if( !empty( $prod_test_results ) ) {   
			echo '<li><a href="'
			. $prod_test_results
			.'">Test Results</a><span> | </span></li>';
			}
		if( !empty( $prod_install_gd ) ) {   
			echo '<li><a href="'
			. $prod_install_gd
			.'">Installation Guide</a><span> | </span></li>';
			}
		if( !empty( $prod_op_manual ) ) {  
			echo '<li><a href="'
			. $prod_op_manual
			.'">Operating Manual</a><span> | </span></li>';
			}
		if (!has_term('controllers','product-cats')){
			echo '<li><a href="/products/controllers">Controllers</a><span> | </span></li>';
			echo '<li><a href="/engineers-architects/specifying-resources/">CAD & BIM</a></li>';
			}
			
			?>
		</ul><!--.product-links-->
	</div>
	<div class="product-info">
		<div>
			<h4 class="blue-header">Uses</h4>
			<?php echo wpautop($prod_uses);?>
		</div>
	</div>
	<div class="product-info">
		<div>
			<h4 class="blue-header">Efficiency & Performance</h4>
			<?php echo wpautop($prod_eff_perf);?>
		</div>
	</div><!--.product-info-->
	<div class="product-info">
		<div>
			<h4 class="blue-header">Coverage</h4>
			<?php echo wpautop($prod_coverage);?>
		</div>
	</div>
</section>


<section>
	<div class="product-info">
		<div class="related-prod">
			<h4 class="blue-header">Related Products</h4>
			<div class="rel-boxes">
			<?php
			// get the custom post type's taxonomy terms
          
        $custom_taxterms = wp_get_object_terms( $post->ID,
                    'product-cats', array('fields' => 'ids') );
        // arguments
        $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => 3, // you may edit this number
        'orderby' => 'rand',
        'tax_query' => array(
            array(
                'taxonomy' => 'product-cats',
                'field' => 'id',
                'terms' => $custom_taxterms
            )
        ),
        'post__not_in' => array ($post->ID),
        );
			$related = new WP_Query( $args );
			?>
			<?php if( $related->have_posts() ) : while( $related->have_posts() ) : $related->the_post(); 
			$new_id = get_the_ID();
		$feed_prod_sub = get_post_meta($new_id, 'zf_prod_sub', true);
			
			?>   
			
				<div class="related"> 
					<p class="rel-title"><?php the_title();?></p>
					<div class="rel-thb">
					<?php echo the_post_thumbnail('product-thumb'); ?>
					</div><!--.rel-thb-->
					<p class="rel-sub-title"><?php echo $feed_prod_sub; ?></p><!--.rel-sub-title-->
					<a class="rel-btn" href="<?php echo the_permalink();?>">VIEW PRODUCT</a>
				</div><!--.related-->

			<?php endwhile; endif; wp_reset_postdata(); ?>
			</div><!--.rel-boxes-->
		</div><!--.related-prod-->
	</div><!--.product-info-->
</section>

<section>
	<div class="product-info">
		<div class="prod-questions">
			<h4 class="blue-header">Questions?</h4>
			<div class="sup-img"><img src="<?php echo get_template_directory_uri();?>/images/support.svg" alt="Zoo Fans Customer Support"></div>
			<p>HAVE A QUESTION? <span class="blue">GIVE US A CALL</span></p>
			<div class="inline-nested">
				<div>
				<p><strong>855-ZOO-FANS</strong></p>
				</div>
				<div><p>855-966-3267</p>
				</div>
			</div>
			<a class="rel-btn" href="<?php echo the_permalink();?>">CONTACT US</a>
			
		</div>
	</div><!--.product-info-->
</section>

<section class="container">
<div class="sharing"><?php echo do_shortcode('[Sassy_Social_Share title="SHARE THIS PAGE"]'); ?></div><!--.sharing-->
<div class="back-to-top contained"><a href="#top-anchor">Back to Top</a></div>
</section>

<?php //get the Optional metabox content
get_template_part('template/page-optional-section');
?>

<?php get_footer(); ?>