<?php //grid styles
?>
<!--Default Grid-->
<div class="grid">
<?php //get the child pages
$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $post->ID,
   'order'          => 'ASC',
    'order_by'        => 'menu_order'
 );


$parent = new WP_Query( $args );

if ( $parent->have_posts() ) : ?>

    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

        <a href="<?php the_permalink();?>"><div id="<?php the_ID(); ?>" class="grid-box">
		<div class="grid-img">
			<?php if ( has_post_thumbnail() ) : ?>
        			<?php the_post_thumbnail('grid-thumb'); ?>
			<?php endif; ?>
		</div>
		<div class="grid-text" onclick="void(0)">
           		<h5 class="grid-title"><?php the_title(); ?></h5>
		</div>
        </div><!--.grid-box--></a>

    <?php endwhile; ?>

<?php endif; wp_reset_query();
?>
</div><!--.grid-->