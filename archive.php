<?php /*
Template Name: Product Archive
*/ 
get_header();?>
<?php //get the default banner
get_template_part('template/page-banner');
?>

<section>
<div class="content">
<?php //get the romance copy
$args = array ( 'orderby' => 'ASC' );
$catID = $wp_query->get_queried_object()->$args;
if (has_term('open-ceiling','product-cats')){
$contentId = 110; 
} elseif (has_term('drop-ceiling','product-cats')){
$contentId = 112;
} elseif (has_term('spot-cooling','product-cats')){
$contentId = 114;
} elseif (has_term('controllers','product-cats')){
$contentId = 116;
}
$leadText = new WP_Query(array('page_id'=>$contentId));
if ($leadText->have_posts()) : while ($leadText->have_posts()): $leadText->the_post()?>
<?php the_content();
endwhile; endif; wp_reset_query();
?>
</div><!--content-->
</section>
<section class="product-grid">
<div class="related-prod">
<div class="rel-boxes">
<?php
if (have_posts()) : while (have_posts()): the_post() ?>
<?php  
 $prod_sub = get_post_meta(get_the_ID(), 'zf_prod_sub', true); 
?>
		 <div class="related"> 
					<p class="rel-title"><?php the_title();?></p>
					<div class="rel-thb">
					<?php echo the_post_thumbnail('product-thumb'); ?>
					</div><!--.rel-thb-->
					<p class="rel-sub-title"><?php echo $prod_sub; ?></p><!--.rel-sub-title-->
					<a class="rel-btn" href="<?php echo the_permalink();?>">VIEW PRODUCT</a>
				</div><!--.related-->
		
		<?php endwhile; endif; wp_reset_query();?>
		
</div><!-- .rel-boxes-->		
</div><!--.related-prod-->
</section>
<section class="call">
<div>
<?php //get the standard Call to Action
get_template_part('template/call');
?>
</div>
</section>

<section class="container">

<div class="sharing"><?php echo do_shortcode('[Sassy_Social_Share title="SHARE THIS PAGE"]'); ?></div><!--.sharing-->
<div class="back-to-top contained"><a href="#top-anchor">Back to Top</a></div>
</section>
<?php get_footer(); ?>