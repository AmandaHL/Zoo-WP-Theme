<?php 

$spec_sheet = get_post_meta($post_id, 'zf_prod_spec_link', true);
$submittal = get_post_meta($post_id, 'zf_prod_submittal', true);
$test_res = get_post_meta($post_id, 'zf_prod_test_results', true);
$install = get_post_meta($post_id, 'zf_prod_install_gd', true);
$op_manual = get_post_meta($post_id, 'zf_prod_op_manual', true);

//get products by category and display numerical order desc
$prod_terms = get_terms('product-cats');
$post_type = 'product';
foreach($prod_terms as $prod_term){
if ($prod_term->slug != 'controllers') {
//add for each loop for product
echo '<div class="spec-section">
<h2 class="spec-header">'
. $prod_term->name
.'</h2>
<div class="spec-grid">';
$args=array(
'post_type' => $post_type,
      'tax_query' => array(
      array(
      'taxonomy' => 'product-cats',
      'field' => 'slug',
      'terms' => $prod_term->slug,
      )
      )
    );
$products=new WP_Query($args);
if( $products->have_posts() ): while( $products->have_posts() ) : $products->the_post(); 
$post_id = get_the_ID();
echo '<div id="'
.$post_id
.'">
<h3 class="spec-subhead">'
. get_the_title()
.'</h3>
<ul class="product-links">';
if( !empty( $spec_sheet ) ) {   
echo '<li><a href="'
. $prod_submittal
.'">Submittal</a><span> | </span></li>';
}
if( !empty( $submittal ) ) {   
echo '<li><a href="'
. $prod_submittal
.'">Submittal</a><span> | </span></li>';
}
if( !empty( $test_res ) ) {   
echo '<li><a href="'
. $prod_test_results
.'">Test Results</a><span> | </span></li>';
}
if( !empty( $install ) ) {   
echo '<li><a href="'
. $prod_install_gd
.'">Installation Guide</a><span> | </span></li>';
}
if( !empty( $op_manual ) ) {  
echo '<li><a href="'
. $prod_op_manual
.'">Operating Manual</a><span> | </span></li>';
}
echo '<li><a href="/products/controllers">Controllers</a></li>';
echo '<li><a href="/engineers-architects/specifying-resources/">CAD & BIM</a></li>';
echo '</ul><!--.product-links-->
</div>';

endwhile; endif; 
wp_reset_query();
echo '</div><!--.spec-grid-->
</div><!--.spec-section-->';
}

}  //foreach $prod_terms

?>