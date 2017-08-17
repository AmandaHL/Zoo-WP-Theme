<?php
/* 
Default Sidebar
*/
?>
<div class="sidebar">

<div class="widget-area-1">
	<?php 	
	if ( ! dynamic_sidebar('widget-1') ) { 
		dynamic_sidebar( 'widget-1' );
	} 
	?>
</div><!--.widget-area-1-->
<?php
if(is_page_template('industry-sub.php')){
	//Get the custom sidebar content
	$sidebar_one = get_post_meta(get_the_ID(), 'zf_ind_examples', true);	
	if( !empty( $sidebar_one ) ) {   
		echo '<div class="widget-area-custom-ind">
		<div class="widgettitle">Where to Put Zoo Fans</div>
		<div class="widget">'
		. wpautop($sidebar_one)
		.'</div><!--.widget-->
		</div><!--widget-area-custom-ind-->';
	}
}
?>
<div class="widget-area-2">
	<div class="widgettitle">Which Fan?<br>How Many?</div>
	<?php
	if ( ! dynamic_sidebar('widget-2') ) {
		dynamic_sidebar( 'widget-2' );
	} 
	?>
</div><!--.widget-area-2-->

<div class="widget-area-3">
		<div class="widgettitle">Our Performance<br><span class="blue">is Guaranteed</span></div>
	<?php if ( ! dynamic_sidebar('widget-3') ) {
		dynamic_sidebar( 'widget-3' );
	} 
	?>
</div><!--.widget-area-3-->
</div>