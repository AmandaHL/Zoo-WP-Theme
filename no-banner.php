<?php 
/*
Template Name: No Banner
*/
get_header();?>
<?php
	echo '<div class="breadcrumb-wrap"><div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">';
    	if(function_exists('bcn_display'))   {
        bcn_display();
   	 }
	echo '</div></div>';
?>
<?php 
if (is_page('contact-us')) {?>

<section class="landing-title">
<?php
$post_id = get_the_ID();
$landing_title = get_post_meta($post_id, 'zf_landing_title', true);
echo '<h1>'. $landing_title 
.'</h1>';?>
</section>
<section>
<div>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; endif; ?>
<div class="sharing"><?php echo do_shortcode('[Sassy_Social_Share title="SHARE THIS PAGE"]'); ?></div><!--.sharing-->
<div class="back-to-top"><a href="#top-anchor">Back to Top</a></div>
</div><!--.page-content-->
</section>

<?php } else { ?>

<section>
<div class="has-sidebar">
<div class="page-content">
<h2><?php the_title();?></h2>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; endif; ?>
<div class="sharing"><?php echo do_shortcode('[Sassy_Social_Share title="SHARE THIS PAGE"]'); ?></div><!--.sharing-->
<div class="back-to-top"><a href="#top-anchor">Back to Top</a></div>
</div><!--.page-content-->
<?php get_sidebar();?>
</div><!--.has-sidebar-->
</section>

<?php }; ?>


<?php get_footer(); ?>