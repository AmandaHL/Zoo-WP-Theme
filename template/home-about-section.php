<?php
/*
Display the About Metabox content on the Home Page
*/
$about_title = get_post_meta(get_the_ID(), 'zf_about_box_title', true);
$about_text = get_post_meta(get_the_ID(), 'zf_about_box_content', true);
if( !empty( $about_title ) ) {   
	 echo '<h1>'. $about_title .'</h1>';
	}
if( !empty( $about_text ) ) {   
	 echo '<div class="home-about-content">'.wpautop($about_text).'</div><!--.home-about-content-->';
	}
?>