<?php /*
Template Name: Media
*/ 
get_header();?>
<?php //get the default banner
get_template_part('template/page-banner');
?>
<section>
<?php get_template_part('template/videos');?>
</section>

<section class="image-gallery">
<?php get_template_part('template/gallery');?>
</section>

<section class="container">
<div class="sharing"><?php echo do_shortcode('[Sassy_Social_Share title="SHARE THIS PAGE"]'); ?></div><!--.sharing-->
<div class="back-to-top contained"><a href="#top-anchor">Back to Top</a></div>
</section>

<?php get_footer(); ?>