<?php //products page grid
?>
</section>
<section>
<?php $products = get_page_children( $page_id, $pages );?>

<?php get_template_part('template/grid');?>



</section>



<?php // set up the product grids
$prod = array(
	
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $post->ID,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
 );

$open_prod = array(  'post__in'=>	array(110) );
$drop_prod = array(  'post__in'=>	array(112) );
$spot_prod = array( 'post__in'=>	array(114) ); 
$cont_prod = array( 'post__in'=>	array(116) );

$prod_query = new WP_Query( $prod );
$open_prod_query = array_merge( $prod, $open_prod );
$drop_prod_query = array_merge( $prod, $drop_prod );
$spot_prod_query = array_merge( $prod, $spot_prod );
$cont_prod_query = array_merge( $prod, $cont_prod );

$merged_query1 = new WP_Query($des_prod_query);
$merged_query2 = new WP_Query($spot_prod_query);
$merged_query3 = new WP_Query($cont_prod_query);  
?>

<section class="product-type">
<?php $destrat = get_post_meta(get_the_ID(), 'zf_destrat_description', true);?>
<div class="content">
<h2>Destratification Fans</h2>
<?php echo '<p>'. $destrat .'</p>'; ?>

<div class="grid">
<?php //get the destratification pages
$merged_query1->post_count = count( $merged_query1->posts );
if ( $merged_query1->have_posts() ) : while ( $merged_query1->have_posts() ) : $merged_query1->the_post(); ?>

<?php get_template_part('template/grid');?>

<?php endwhile; endif; 
wp_reset_query();
?>
</div><!--.grid-->
</div><!--.content-->
</section>

<section class="product-type">
<?php $spot = get_post_meta(get_the_ID(), 'zf_spot_description', true);?>
<div class="content">
<h2>Spot Cooling</h2>
<?php echo '<p>'. $spot .'</p>';?>

<div class="grid">
<?php //get the pages
$merged_query2->post_count = count( $merged_query2->posts );
if ( $merged_query2->have_posts() ) : while ( $merged_query2->have_posts() ) : $merged_query2->the_post(); ?>

<?php get_template_part('template/grid');?>

<?php endwhile; endif; 
wp_reset_query();
?>
</div><!--.grid-->
</div><!--.content-->
</section>

<section class="product-type">
<?php $cont = get_post_meta(get_the_ID(), 'zf_cont_description', true);?>
<div class="content">
<h2>Controllers</h2>
<?php echo '<p>'. $cont .'</p>';?>

<div class="grid">
<?php //get the pages
$merged_query3->post_count = count( $merged_query3->posts );
if ( $merged_query3->have_posts() ) : while ( $merged_query3->have_posts() ) : $merged_query3->the_post(); ?>

<?php get_template_part('template/grid');?>

<?php endwhile; endif; 
wp_reset_query();
?>
</div><!--.grid-->

</div><!--.content-->
</section>
