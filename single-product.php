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
$prod_etl = get_post_meta($post_id, 'zf_prod_etl', true);
?>
<section>

	
<div class="product" id="prod-<?php echo the_ID();?>">
	<div class="prod-img-box">
		<?php 
		get_template_part('template/prod-images');
		?>	
	</div><!--.prod-img-box-->
	<div class="prod-sidebar">
		<h2 class="prod-title blue"><?php the_title();?></h2>
		<h4 class="prod-subtitle"><?php echo $prod_sub ;?></h4>
		
		<div class="prod-features">
			<?php echo wpautop($prod_feat) ;?>
		</div>
	
		
	
	</div><!--.prod-sidebar-->
	<div class="three-col">
	<div class="prod-left">&nbsp;</div>
	<div class="prod-mid">
		<a class="btn post-green-btn" href="#product-downloads"><img src="<?php echo get_template_directory_uri();?>/images/icon-download.svg" alt="Scroll to Product Downloads"/><span>Product Downloads</span></a>
		<a class="btn post-green-btn" href="<?php echo bloginfo(wpurl);?>/contact-us/request-a-quote/"><img src="<?php echo get_template_directory_uri();?>/images/icon-checkmark.svg" alt="Scroll to Product Downloads"/><span>Request a Quote</span></a>
	</div>
	<div class="prod-right">
	<div>
	<?php if( !empty( $prod_etl ) ) {   
	echo '<img src="'. $prod_etl .'" alt="ETL Certified" />'; }?>
	<img src="<?php echo get_template_directory_uri();?>/images/GBCert.svg" alt="US Green Building Certified">
	</div>
	
	</div>
	
	</div><!--three-col-->
</div><!--.product-->
</section>

<section class="prod-details">

	<div><h4 class="prod-subtitle">Specifications</h4></div>
	<div class="product-info first-info">
		<h4 class="product-subhead">Product Overview</h4>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; endif; wp_reset_postdata(); ?>
		
	</div><!--.product-info-->
	
<?php if(has_term('drop-ceiling','product-cats')){	

	get_template_part('template/prod-drop-ceiling');
	
 } elseif(has_term('open-ceiling','product-cats')){	

	get_template_part('template/prod-open-ceiling');
	
  } elseif(has_term('spot-cooling','product-cats')){	

	get_template_part('template/prod-open-ceiling');
	
 } elseif(has_term('controllers','product-cats')){
  
 	get_template_part('template/prod-controllers');
 }
 if( !has_term('controllers','product-cats')){
	echo '<div class="con-btn"><a class="btn post-green-btn" href="'
	. get_site_url() .'/products/controllers"><img src="'
	. get_template_directory_uri() .'/images/icon-controllers.svg" alt="Scroll to Product Downloads"/><span>Controllers</span></a>
	</div>';
} ?>
</section>
<?php //get the call-to-action
get_template_part('template/call');
?>

<section class="container">
<div class="sharing"><?php echo do_shortcode('[Sassy_Social_Share title="SHARE THIS PAGE"]'); ?></div><!--.sharing-->
<div class="back-to-top contained"><a href="#top-anchor">Back to Top</a></div>
</section>



<?php get_footer(); ?>