<?php 
/* 
Template Name: Search Page
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
            <div class="content">
	<div class="searchpage">
    <h2><?php _e( 'You searched for: ', 'zoofans' ); ?><span><?php the_search_query(); ?></span></h2>
<?php if ( have_posts() ) : ?>
 
<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
                <div id="nav-above" class="navigation">
                    <div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'zoofans' )) ?></div>
                    <div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'zoofans' )) ?></div>
                </div><!-- #nav-above -->
<?php } ?>                            
 
<?php while ( have_posts() ) : the_post() ?>
 
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="found-item">                  
	
 
<h4 class="entry-title"><a href="<?php the_permalink(); ?>" title="" rel="bookmark">
					
					<?php the_title(); ?></a></h4>
 
<?php if ( $post->post_type == 'post' ) { ?>
		
                    <div class="entry-meta">
                        <span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'zoofans'); ?></span>
                        <span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
                        <?php edit_post_link( __( 'Edit', 'zoofans' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
                    </div><!-- .entry-meta -->
<?php } ?>
 
                    <div class="entry-summary">
<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'zoofans' )  ); ?>
<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'zoofans' ) . '&after=</div>') ?>
                    </div><!-- .entry-summary -->
 
<?php if ( $post->post_type == 'post' ) { ?>
                    <div class="entry-utility">
                        <?php the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'zoofans' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\">|</span>\n" ) ?>
                        <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'zoofans' ), __( '1 Comment', 'zoofans' ), __( '% Comments', 'zoofans' ) ) ?></span>
                        <?php edit_post_link( __( 'Edit', 'zoofans' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?>
                    </div><!-- #entry-utility -->
<?php } ?>
                </div><!-- #post-<?php the_ID(); ?> -->
 </div><!--end .found-item-->
<?php endwhile; ?>
 
<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
                <div id="nav-below" class="navigation">
                    <div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'zoofans' )) ?></div>
                    <div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'zoofans' )) ?></div>
                </div><!-- #nav-below -->
<?php } ?> 

<section>           
 
<div class="searchform" >
<h3>Not what you are looking for? Enter your new search term(s) below:</h3>
<?php get_search_form(); ?></div><!--end searchform-->
</section>

<?php else : ?>
 
                <div id="post-0" class="post no-results not-found">
                    <h3><?php _e( 'Nothing Found', 'zoofans' ) ?></h3>
                    <div class="search-blurb">
                       <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'zoofans' ); ?></p>
   
                    </div><!-- .search-blurb -->
                    <div class="searchform" ><?php get_search_form(); ?></div><!--end searchform-->
<div class="clear">&nbsp;</div>
                </div>
 
<?php endif; ?>
</div><!-- .searchpage -->
<div class="call">
<?php //get the standard Call to Action
get_template_part('template/call');
?>
</div><!--.call-->

<div class="sharing"><?php echo do_shortcode('[Sassy_Social_Share title="SHARE THIS PAGE"]'); ?></div><!--.sharing-->
<div class="back-to-top"><a href="#top-anchor">Back to Top</a></div>
</div><!--.content-->
</section>
<?php get_footer();?>