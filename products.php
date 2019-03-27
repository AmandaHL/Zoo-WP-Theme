<?php /*
Template Name: Products
*/ 
get_header();?>
<section class="landing-title">
<?php
$post_id = get_the_ID();
$landing_title = get_post_meta($post_id, 'zf_landing_title', true);
echo '<h1>'. $landing_title 
.'</h1>';?>
</section>
<section class="prod-grid">
<?php get_template_part('template/grid');?>
</section>
<section class="container">
<div class="sharing"><?php echo do_shortcode('[Sassy_Social_Share title="SHARE THIS PAGE"]'); ?></div><!--.sharing-->
<div class="back-to-top contained"><a href="#top-anchor">Back to Top</a></div>
</section>

<?php get_footer(); ?>