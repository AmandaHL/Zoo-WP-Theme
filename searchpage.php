<?php 
/*
Template Name: Search
*/
get_header();
?>
<section>
<div class="content">
<h2>Search Our Website</h2>
<div class="searchpage">
<h3>Enter your search term(s) below:</h3>
<div class="searchform" ><?php get_search_form(); ?></div><!--end searchform-->
</div>
<div class="call">
<?php //get the standard Call to Action
get_template_part('template/call');
?>
</div><!--.call-->

<div class="sharing"><?php echo do_shortcode('[Sassy_Social_Share title="SHARE THIS PAGE"]'); ?></div><!--.sharing-->
<div class="back-to-top"><a href="#top-anchor">Back to Top</a></div>
</div><!--.content-->
</section>


<?php get_footer(); ?>