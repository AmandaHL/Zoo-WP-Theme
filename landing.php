<?php /*
Template Name: Landing
*/ 
get_header();?>
<?php //get the default banner
get_template_part('template/page-banner');
?>
<section>
<div class="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; endif; ?>
</div><!--.content-->

</section> 

<section>
<?php get_template_part('template/grid');?>
</section>


<section class="container">
<div class="sharing"><?php echo do_shortcode('[Sassy_Social_Share title="SHARE THIS PAGE"]'); ?></div><!--.sharing-->
<div class="back-to-top contained"><a href="#top-anchor">Back to Top</a></div>
</section>
<?php get_footer(); ?>