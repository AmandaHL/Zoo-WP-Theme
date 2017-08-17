<?php 
/*
Template Name: Industry Subpage
*/
get_header();
?>
<?php //get the default banner
get_template_part('template/page-banner');
?>
<section>
<div class="has-sidebar">
<div class="page-content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; endif; ?>



<section class="ind-shared">

<div class="wassup">
<div class="call">
<?php //get the standard Call to Action
get_template_part('template/call');
?>
</div>
<?php 
$metafield_id = get_the_ID();
$ind_parent = $post->post_parent;
$ind_parent_title = get_the_title($ind_parent);
$ind_plural = get_post_meta($metafield_id, 'zf_ind_plural', true);
$ind_wassup = get_post_meta($metafield_id, 'zf_ind_wassup', true);
$open = get_post_meta($metafield_id, 'zf_ind_fan_open_check',  true);
$drop = get_post_meta($metafield_id, 'zf_ind_fan_drop_check',  true);
$spot = get_post_meta($metafield_id, 'zf_ind_fan_spot_check',  true);
?>

	<p>To see ZOO fans for <?php echo $ind_plural;?>, click on the ceiling type:</p>
	<ul class="related-products">
	<?php 

	if( !empty( $open ) ) {   
   
        echo '<li><a href="'
		. site_url()
		.'/products/open-ceiling/">Open Ceiling</a></li>';
        }
   if( !empty( $drop ) ) {   
  		echo '<li><a href="'
		. site_url()
		.'/products/drop-ceiling/">Drop Ceiling</a></li>';
        }
	if( !empty( $spot ) ) {   
  		echo '<li><a href="'
		. site_url()
		.'/products/spot-cooling/">Spot Cooling</a></li>';
        }
	?>
	</ul>
	
</div><!--.wassup-->
<?php get_template_part('template/logo-carousel');?>
</section><!--.ind-shared-->
<div class="sharing"><?php echo do_shortcode('[Sassy_Social_Share title="SHARE THIS PAGE"]'); ?></div><!--.sharing-->
<div class="back-to-top"><a href="#top-anchor">Back to Top</a></div>
</div><!--.page-content-->

<?php get_sidebar();?>

</div><!--.has-sidebar-->
</section>

<?php //get the Optional metabox content
get_template_part('template/page-optional-section');
?>

<?php get_footer(); ?>