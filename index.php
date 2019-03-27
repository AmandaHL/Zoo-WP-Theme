<?php get_header();?>
<?php //get the default banner
get_template_part('template/page-banner');
?>
<section>
<div class="has-sidebar">
<div class="page-content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; endif; ?>
		
<div class="call">
<?php //get the standard Call to Action
get_template_part('template/call');
?>
</div><!--.call-->

<div class="sharing"><?php echo do_shortcode('[Sassy_Social_Share title="SHARE THIS PAGE"]'); ?></div><!--.sharing-->
<div class="back-to-top"><a href="#top-anchor">Back to Top</a></div>
</div><!--.page-content-->
<?php get_sidebar();?>
</div><!--.has-sidebar-->
</section>

<?php get_footer(); ?>