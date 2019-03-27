<?php /*
Template Name: Product Section
*/ 
get_header();?>
<?php //get the default banner
get_template_part('template/page-banner');
?>
<section>
<div class="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; endif; ?>
</div><!--.content-->
<section>
<div class="grid">
<?php //get the product posts
if(is_page('open-ceiling')){
	$args = array('post_type' => 'product','category__in' => 5, 'order' => 'ASC' );
} elseif (is_page('drop-ceiling')){
	$args = array('post_type' => 'product','category__in' => 6, 'order' => 'ASC' );
} elseif (is_page('spot-cooling')){
	$args = array('post_type' => 'product','category__in' => 2, 'order' => 'ASC' );
} elseif (is_page('controllers')) {
	$args = array('post_type' => 'product','category__in' => 10, 'order' => 'ASC' );
}

$products = new WP_Query( $args );
if ( $products->have_posts() ) : ?>

    <?php while ( $products->have_posts() ) : $products->the_post(); ?>

        <div id="<?php the_ID(); ?>" class="grid-box">
		<div class="grid-img">
			<?php if ( has_post_thumbnail() ) : ?>
        			<?php the_post_thumbnail('grid-thumb'); ?>
			<?php endif; ?>
		</div>
		<div class="grid-text">
           		<h5 class="grid-title"><?php the_title(); ?></h5>
			<?php the_excerpt();?>
			<a href="<?php the_permalink();?>">Learn More</a>
		</div>
        </div><!--.grid-box-->

    <?php endwhile; ?>

<?php endif; wp_reset_query();
?>
</div><!--.grid-->
</section>
<section class="call">
<?php //get the standard Call to Action
get_template_part('template/call');
?>
</section>
<section>
<div class="sharing"><?php echo do_shortcode('[Sassy_Social_Share title="SHARE THIS PAGE"]'); ?></div><!--.sharing-->
</section>
<?php get_footer(); ?>