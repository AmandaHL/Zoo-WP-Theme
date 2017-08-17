<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
get_header(); ?>

	<?php 
	echo '<div class="breadcrumb-wrap"><div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">';
    	if(function_exists('bcn_display'))   {
        bcn_display();
   	 }
	echo '</div></div>';
?>
<section>
<div class="content-404">
				<h2><?php _e( 'Not Found', 'zoofans' ); ?></h2>

			
				<div>
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'zoofans' ); ?></p>

				<div id="searchpage">
<h3>Enter your search term(s) below:</h3>
<div class="searchform" ><?php get_search_form(); ?></div><!--end searchform-->
</div>


				</div>

</div><!--.content-->

<?php get_footer(); ?>
