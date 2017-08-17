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
<?php //get the Optional metabox content
get_template_part('template/page-optional-section');
?>

<?php get_footer(); ?>