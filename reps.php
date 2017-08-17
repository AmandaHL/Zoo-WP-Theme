<?php /*
Template Name: Reps
*/ 
get_header();?>
<?php //get the default banner
get_template_part('template/page-banner');
?>

<?php 
if ( post_password_required() ) {
              echo get_the_password_form();
       }
else if ( !post_password_required() ) { ?>


<?php 
get_template_part('template/rep-grid');
?>
<section class="container">
<div class="back-to-top contained"><a href="#top-anchor">Back to Top</a></div>
</section>
<?php //get the Optional metabox content
get_template_part('template/page-optional-section');
?>
<?php } ?>
<?php get_footer(); ?>