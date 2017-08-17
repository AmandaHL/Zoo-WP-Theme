<?php /*
Template Name: FAQ
*/ 
get_header();?>
<?php //get the default banner
get_template_part('template/page-banner');
?>
<section>
<div class="has-sidebar">
<div class="page-content">
<?php
$faqs = get_post_meta(get_the_ID(), 'faq', true);
 if( !empty( $faqs ) ) {   
    // Checks and displays the retrieved values
    foreach ( (array) $faqs as $key => $faq ) {

		$ques = $ans = '';

		if ( isset( $faq['faq_ques'] ) ) {
			$ques = esc_html( $faq['faq_ques'] );
		}

		if ( isset( $faq['faq_ans'] ) ) {
			$ans = wpautop( $faq['faq_ans'] );
		}

	
		//Output the FAQs
		echo '<div class="faq"><h4 class="toggle">'
		.$ques
		.'</h4><div class="collapsible">'
		. $ans 
		.'</div>
		</div><!--.faq-->';
	}
}
?>




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