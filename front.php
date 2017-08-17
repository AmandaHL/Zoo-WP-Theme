<?php /*
Template Name: Home
*/ 
get_header();?>
<div class="home-container">
<?php //get the Slides
get_template_part('template/home-slider');
?>

<?php //get the Featured metabox content
get_template_part('template/home-featured-section');
?>

</div><!--.home-container-->

<?php get_footer(); ?>