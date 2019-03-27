<?php /*
Template Name: Landing
*/ 
get_header();?>
<?php
	echo '<div class="breadcrumb-wrap"><div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">';
    	if(function_exists('bcn_display'))   {
        bcn_display();
   	 }
	echo '</div></div>';
?>
<section class="landing-title">
<?php
$post_id = get_the_ID();
$landing_title = get_post_meta($post_id, 'zf_landing_title', true);
if( !empty( $landing_title) ) {   
echo '<h1>'
. $landing_title 
.'</h1>';
} else { 
echo '<h1>'
. get_the_title() 
.'</h1>';
}
?>
</section>

<?php
if (is_page('products')){ ?>
<section class="prod-page-grid">
<?php get_template_part('template/grid');?>
</section><!--.prod-page-grid-->

<?php } else {?>
<section>
<?php get_template_part('template/grid');?>
</section>
<?php } ?>

<section class="container">
<div class="sharing"><?php echo do_shortcode('[Sassy_Social_Share title="SHARE THIS PAGE"]'); ?></div><!--.sharing-->
<div class="back-to-top contained"><a href="#top-anchor">Back to Top</a></div>
</section>
<?php get_footer(); ?>