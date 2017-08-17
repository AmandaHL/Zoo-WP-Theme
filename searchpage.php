<?php 
/*
Template Name: Search
*/
get_header();
?>
<?php //get the default banner
get_template_part('template/page-banner');
?>

<section>
<div class="content">
<h2>Search Our Website</h2>
<div class="searchpage">
<h3>Enter your search term(s) below:</h3>
<div class="searchform" ><?php get_search_form(); ?></div><!--end searchform-->
</div>

</div><!--.content-->
</section>

<section>
<div class="sharing"><?php echo do_shortcode('[Sassy_Social_Share title="SHARE THIS PAGE"]'); ?></div><!--.sharing-->
</section>

<?php //get the Optional metabox content
get_template_part('template/page-optional-section');
?>

<?php get_footer(); ?>