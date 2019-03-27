<?php 
function wyrx_enqueue_styles() {

    if( is_front_page() )
    {
        wp_enqueue_style( 'slideStyles', get_template_directory_uri(). '/css/slider.css');
    }
   if ( is_page_template( array('industry.php','industry-sub.php') )) 
   { 
	wp_enqueue_style( 'logoStyles', get_template_directory_uri(). '/css/ind_carousels.css');
	wp_enqueue_style( 'lgBannerStyles', get_template_directory_uri(). '/css/lg_banner.css');
	}
	if ( is_page_template( array('media.php') )) 
   { 
	wp_enqueue_style( 'mediaStyles', get_template_directory_uri(). '/css/media.css');
	}
	if ( is_page_template( array('reps.php') )) 
   { 
	wp_enqueue_style( 'repStyles', get_template_directory_uri(). '/css/reps.css');
	}
	if (is_single() && get_post_type()==( 'product'))
   { 
	wp_enqueue_style( 'productStyles', get_template_directory_uri(). '/css/product.css');
	}
	if ( is_tax('product-cats') )
   { 
	wp_enqueue_style( 'productCatStyles', get_template_directory_uri(). '/css/product.css');
	}
	if ( is_page_template('spec-sheets.php') )
   { 
	wp_enqueue_style( 'specStyles', get_template_directory_uri(). '/css/specs.css');
	}
}
add_action('wp_enqueue_scripts', 'wyrx_enqueue_styles');
//enqueue scripts	
function wyrx_scripts_method() { 
	wp_register_script( 'cycle2js', get_template_directory_uri() . '/js/cycle2.js' , array ( 'jquery'), '1.0', true);
	wp_enqueue_script( 'cycle2js' );
	wp_register_script( 'carouseljs', get_template_directory_uri() . '/js/carousel.js' , array ( 'jquery'), '1.0', true);
	wp_enqueue_script( 'carouseljs' );
	wp_register_script( 'iframeResizer', get_template_directory_uri() . '/js/iframeResizer.min.js' , array ( 'jquery'), '1.0', true);
	wp_enqueue_script( 'iframeResizer' );
	wp_register_script( 'iframeContResizer', get_template_directory_uri() . '/js/iframeResizer.contentWindow.min.js' , array ( 'jquery'), '1.0', true);
	wp_enqueue_script( 'iframeContResizer' );
	wp_register_script( 'zoojs', get_template_directory_uri() . '/js/zooScripts.js' , array ( 'jquery'), '1.0', true);
	wp_enqueue_script( 'zoojs' );
	} 
add_action('wp_enqueue_scripts', 'wyrx_scripts_method');

//add thumbnail support
if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails'); 
  set_post_thumbnail_size( 600, 383, true );//nav menu image
add_image_size( 'grid-thumb', 360, 230, true );//grid box images
add_image_size( 'product-thumb', 360, 360, true );//grid box images

}
//add svg upload capability
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
//add tag support for pages
function add_tag() {  
// Add tag metabox to page
register_taxonomy_for_object_type('post_tag', 'page'); 
}
add_action( 'init', 'add_tag' );

//add excerpt to pages
function add_excerpt() {
    add_post_type_support( 'page', 'excerpt' );
}
add_action( 'after_setup_theme', 'add_excerpt', 11 );

//widgetize the theme
add_action( 'widgets_init', 'zoofans_widgets_init' );
function zoofans_widgets_init() {
    register_sidebar(array(
        'name' => "Contact Info Box",
        'id' => 'widget-1',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div><!--.widget-->',
        'before_title' => '<div class="widgettitle">',
        'after_title' => '</div>',
    ));
    register_sidebar(array(
        'name' => "Which Fan Box",
        'id' => 'widget-2',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div><!--.widget-->',
        'before_title' => '<div class="widgettitle">',
        'after_title' => '</div>',
    ));
    register_sidebar(array(
        'name' => "Guarantee Box",
        'id' => 'widget-3',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div><!--.widget-->',
    ));
    
}   
//add menu support
function register_menus() {
  register_nav_menus(
    array(
'main-menu' => __('Main Navigation'),
'secondary-menu' => __('Secondary Navigation'),
'top-footer-menu' => __('Top-Footer Links'),
'footer-menu' => __('Footer Links')
)
);

add_action( 'init', 'register_menus' );
}
//remove 'Protected:' from rep page title
function the_title_trim($title) {

	$title = attribute_escape($title);

	$findthese = array(
		'#Protected:#',
		'#Private:#'
	);

	$replacewith = array(
		'', // What to replace "Protected:" with
		'' // What to replace "Private:" with
	);

	$title = preg_replace($findthese, $replacewith, $title);
	return $title;
}
add_filter('the_title', 'the_title_trim');

// Make Archives.php Include Custom Post Types


function add_custom_types( $query ) {

if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {

$query->set( 'post_type',
array(

'post',
'product'

));
		

return $query;

}

}
add_filter( 'pre_get_posts', 'add_custom_types' );




//Walker to add Featured Images to Secondary Nav
/*
* Create HTML list of nav menu items.
* Replacement for the native Walker, using the description.
*
* @see    http://wordpress.stackexchange.com/q/14037/
* @author toscho, http://toscho.de
*/
class Thumbnail_Walker extends Walker_Nav_Menu
{
/**
* Start the element output.
* @param  string $output Passed by reference. Used to append additional content.
* @param  object $item   Menu item data object.
* @param  int $depth     Depth of menu item. May be used for padding.
* @param  array $args    Additional strings.
* @return void
*/
function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
$classes     = empty ( $item->classes ) ? array () : (array) $item->classes;

$class_names = join(
    ' ',   
    apply_filters(
        'nav_menu_css_class',   
        array_filter( $classes ), $item
    )
);

! empty ( $class_names )
    and $class_names = ' class="'. esc_attr( $class_names ) . '"';

$output .= "<li id='menu-item-$item->ID' $class_names>";

$attributes  = '';

! empty( $item->attr_title )
    and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
! empty( $item->target )
    and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
! empty( $item->xfn )
    and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
! empty( $item->url )
    and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';

// insert thumbnail
// you may change this
$thumbnail = '';
if( $id = has_post_thumbnail( $item->object_id ) ) {	
    $thumbnail = get_the_post_thumbnail( $item->object_id ); 
}
elseif ( $id = get_wp_term_image($item->object_id)) {
	$tax_image = get_wp_term_image($item->object_id);
	$thumbnail = '<img src="'
	.$tax_image 
	.'" class="tax-image">'; 
}
$title = apply_filters( 'the_title', $item->title, $item->ID );
if ( $item->object == 'product-cats') {  
$zfdesc = $item->title;
} else {
$zfdesc = get_post_meta( $item->object_id, 'zf_nav_desc', true );
}
$item_output = $args->before
    . '<a'. $attributes .'>'
    . $args->link_before
    . $title
    . '</a> '
    . $args->link_after
    . $args->after
	.'<div class="nav-image"><a '
	. $attributes
	.'><div class="image-box tax-image">'
   . $thumbnail
    . '</div></a><div class="nav-img-text"><p>'
	. esc_html( $zfdesc )
	.'</p><a class="nav-view-button"'
    . $attributes
    . '>Learn More</a></div>'
    . '</div>';


// Since $output is called by reference we don't need to return anything.
$output .= apply_filters(
    'walker_nav_menu_end_el'
,   $item_output
,   $item
,   $depth
,   $args
);

}
}

//Add custom post types
add_action('init', 'zfpt_products_register');
 function zfpt_products_register() {
 $labels = array(
		'name' => __('Products'),
		'singular_name' => __('Product'),
		'add_new' => __('Add New', 'Product'),
		'add_new_item' => __('Add New Product'),
		'edit_item' => __('Edit Product'),
		'new_item' => __('New Product'),
		'view_item' => __('View Product'),
		'search_items' => __('Search Products'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'taxonomies' => array('post_tag','category'),
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'has_archive' => true,	
		'supports' => array('title', 'editor' , 'comments', 'excerpt',  'revisions', 'author', 'page-attributes','thumbnail')
		 ); 
 register_post_type( 'product' , $args );
}
function product_taxonomy() {  
    register_taxonomy(  
        'product-cats',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'product',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Product Categories',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'products', // This controls the base slug that will display before each term
                'with_front' => true // Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'product_taxonomy');
add_action('init', 'zfpt_white_papers_register');
 function zfpt_white_papers_register() {
 $labels = array(
		'name' => __('White Papers'),
		'singular_name' => __('White Paper'),
		'add_new' => __('Add New', 'White Paper'),
		'add_new_item' => __('Add New White Paper'),
		'edit_item' => __('Edit White Paper'),
		'new_item' => __('New White Paper'),
		'view_item' => __('View White Paper'),
		'search_items' => __('Search White Paper'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'taxonomies' => array('post_tag','category'),
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_position' => null,
		'has_archive' => true,
		
		'supports' => array('title', 'editor' , 'comments', 'excerpt',  'revisions', 'author', 'post-formats','thumbnail')
		 ); 
 register_post_type( 'white-paper' , $args );
}
?>