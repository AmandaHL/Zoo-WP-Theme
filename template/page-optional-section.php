<?php
/*
Display the Optional Metabox on the Pages
*/
$optional_box_title = get_post_meta(get_the_ID(), 'zf_optional_box_title', true);
$optional_box_text = get_post_meta(get_the_ID(), 'zf_optional_box_content', true);
if( !empty( $optional_box_text ) ) {   
	echo '<section class="page-optional"><div>';
	if( !empty( $optional_box_title ) ) {   
	 	echo '<h2>'. $optional_box_title .'</h2>';
	}
 	echo '<div class="page-optional-content">'.wpautop($optional_box_text).'</div><!--.page-optional-content--></div></section><!--.page-optional-->';
}
?>