<?php 
update_option( 'siteurl', 'http://104.244.124.27/~zoofan5' );
update_option( 'home', 'http://104.244.124.27/~zoofan5' );

//enqueue page styles
function wyrx_enqueue_styles() {
    if ( is_page_template( array('media.php') )) 
   { 
wp_enqueue_style( 'mediaStyles', get_template_directory_uri(). '/css/media.css');
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

	
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'bg_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 object $cmb CMB2 object
 *
 * @return bool             True if metabox should show
 */
function bg_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template
	if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
		return false;
	}
	return true;
}
//Secondary Nav Image Text
add_action( 'cmb2_init', 'nav_text_register_metabox' );
function nav_text_register_metabox() {
$prefix = 'zf_';

$zf_nav_text = new_cmb2_box( array(
	'id'            => $prefix . 'nav_text',
	'title'         => __( 'Secondary Nav Image Description', 'cmb2' ),
	'object_types'  => array( 'page','product' ), // Post type
	'closed'     => true, // true to keep the metabox closed by default
) );

$zf_nav_text->add_field( array(
	'name' => esc_html__( 'Add Description', 'cmb2' ),
	'desc' => esc_html__( 'Only used on Product Posts and Industry Subpages.', 'cmb2' ),
	'id'   => $prefix . 'nav_desc',
	'type' => 'text'
) );
}
//Default Page Banner
add_action( 'cmb2_init', 'page_banner_register_metabox' );
function page_banner_register_metabox() {
$prefix = 'zf_';

$zf_banner_box = new_cmb2_box( array(
	'id'            => $prefix . 'banner_box',
	'title'         => __( 'Page Banner', 'cmb2' ),
	'object_types'  => array( 'page', ), // Post type
	'closed'     => true, // true to keep the metabox closed by default
) );
$zf_banner_box->add_field( array(
	'name' => esc_html__( 'Banner Image', 'cmb2' ),
	'desc' => esc_html__( 'Upload the banner image.', 'cmb2' ),
	'id'   => $prefix . 'banner_image',
	'type' => 'file'
) );
$zf_banner_box->add_field( array(
	'name' => esc_html__( 'Banner Text', 'cmb2' ),
	'desc' => esc_html__( 'Add paragraph text (Industry Sub-Pages Only).', 'cmb2' ),
	'id'   => $prefix . 'lg_banner_text',
	'type' => 'textarea_small'
) );
}
//Home Page About Section
add_action( 'cmb2_init', 'home_about_register_metabox' );
function home_about_register_metabox() {
$prefix = 'zf_';

$zf_aboutbox = new_cmb2_box( array(
	'id'            => $prefix . 'about_box',
	'title'         => __( 'About Section', 'cmb2' ),
	'object_types'  => array( 'page', ), // Post type,
	'show_on_cb' => 'bg_show_if_front_page',
	'closed'     => true, // true to keep the metabox closed by default
) );
$zf_aboutbox->add_field( array(
	'name' => esc_html__( 'Section Title', 'cmb2' ),
	'desc' => esc_html__( 'Enter the section title (optional).', 'cmb2' ),
	'id'   => $prefix . 'about_box_title',
	'type' => 'text'
) );
$zf_aboutbox->add_field( array(
	'name' => esc_html__( 'Section Content', 'cmb2' ),
	'desc' => esc_html__( 'Add content using the editor below.', 'cmb2' ),
	'id'   => $prefix . 'about_box_content',
	'type' => 'wysiwyg'
) );
}
//Page Optional Section
add_action( 'cmb2_init', 'page_optional_register_metabox' );
function page_optional_register_metabox() {
$prefix = 'zf_';

$zf_optional_box = new_cmb2_box( array(
	'id'            => $prefix . 'optional_box',
	'title'         => __( 'Optional Section', 'cmb2' ),
	'object_types'  => array( 'page', ), // Post type
	'closed'     => true, // true to keep the metabox closed by default
) );
$zf_optional_box->add_field( array(
	'name' => esc_html__( 'Section Title', 'cmb2' ),
	'desc' => esc_html__( 'Enter the section title (optional).', 'cmb2' ),
	'id'   => $prefix . 'optional_box_title',
	'type' => 'text'
) );
$zf_optional_box->add_field( array(
	'name' => esc_html__( 'Section Content', 'cmb2' ),
	'desc' => esc_html__( 'Add content using the editor below.', 'cmb2' ),
	'id'   => $prefix . 'optional_box_content',
	'type' => 'wysiwyg'
) );
}
//Products Destratification
add_action( 'cmb2_init', 'destrat_register_metabox' );
function destrat_register_metabox() {
$prefix = 'zf_';

$zf_destrat_box = new_cmb2_box( array(
	'id'            => $prefix . 'prod_dest',
	'title'         => __( 'Destratification Fans', 'cmb2' ),
	'object_types'  => array( 'page', ), // Post type
	'show_on'      => array( 'key' => 'page-template', 'value' => 'products.php' ),
	'closed'     => true, // true to keep the metabox closed by default
) );
$zf_destrat_box->add_field( array(
	'name' => esc_html__( 'Section Content', 'cmb2' ),
	'desc' => esc_html__( 'Add content using the editor below.', 'cmb2' ),
	'id'   => $prefix . 'destrat_description',
	'type' => 'wysiwyg'
) );
}
//Products Spot Cooling
add_action( 'cmb2_init', 'spot_register_metabox' );
function spot_register_metabox() {
$prefix = 'zf_';

$zf_spot_box = new_cmb2_box( array(
	'id'            => $prefix . 'prod_spot',
	'title'         => __( 'Spot Cooling', 'cmb2' ),
	'object_types'  => array( 'page', ), // Post type
	'show_on'      => array( 'key' => 'page-template', 'value' => 'products.php' ),
	'closed'     => true, // true to keep the metabox closed by default
) );

$zf_spot_box->add_field( array(
	'name' => esc_html__( 'Section Content', 'cmb2' ),
	'desc' => esc_html__( 'Add content using the editor below.', 'cmb2' ),
	'id'   => $prefix . 'spot_description',
	'type' => 'wysiwyg'
) );
}
//Products Controllers
add_action( 'cmb2_init', 'cont_register_metabox' );
function cont_register_metabox() {
$prefix = 'zf_';

$zf_cont_box = new_cmb2_box( array(
	'id'            => $prefix . 'prod_controller',
	'title'         => __( 'Controllers', 'cmb2' ),
	'object_types'  => array( 'page', ), // Post type
	'show_on'      => array( 'key' => 'page-template', 'value' => 'products.php' ),
	'closed'     => true, // true to keep the metabox closed by default
) );

$zf_cont_box->add_field( array(
	'name' => esc_html__( 'Section Content', 'cmb2' ),
	'desc' => esc_html__( 'Add content using the editor below.', 'cmb2' ),
	'id'   => $prefix . 'cont_description',
	'type' => 'wysiwyg'
) );
}
//Home Page Slider
add_action( 'cmb2_admin_init', 'home_slider_register_metabox' );
function home_slider_register_metabox() {
$prefix = 'zf_';
	/**
	 * Repeatable Field Groups
	 */
	$cmb_slide_group = new_cmb2_box( array(
		'id'           => $prefix . 'home_slides',
		'title'        => __( 'Home Page Slider', 'cmb2' ),
		'object_types' => array( 'page', ),
		'show_on_cb' => 'bg_show_if_front_page',
		'closed'     => true, // true to keep the metabox closed by default
		
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_slide_group->add_field( array(
		'id'          => 'home_slider_box',
		'type'        => 'group',
		'description' => __( 'Use the fields below to populate the slider. Add additional slides as needed.' ),
		'options'     => array(
			'group_title'   => __( 'Slide {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => __( 'Add Slide', 'cmb2' ),
			'remove_button' => __( 'Remove Slide', 'cmb2' ),
			'sortable'      => true, 
			'closed'     => true, // true to have the groups closed by default
		),
	) );
	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	 
	$cmb_slide_group->add_group_field( $group_field_id, array(
		'name' => __( 'Slide Image', 'cmb2' ),
		'description' => __( 'Upload Slide Image', 'cmb2' ),
		'id'   => 'slide_image',
		'type' => 'file',
	) );
	$cmb_slide_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Slide Header', 'cmb2' ),
		'description' => __( 'Add Header Text.', 'cmb2' ),
		'id'          => 'slide_header',
		'type'        => 'textarea_small',
	) );
	$cmb_slide_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Slide Text', 'cmb2' ),
		'description' => __( 'Add Paragraph Text.', 'cmb2' ),
		'id'          => 'slide_text',
		'type'        => 'textarea_small',
	) );
	

	$cmb_slide_group->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Link to Page', 'cmb2' ),
		'desc' => esc_html__( 'Input the url for the Learn More destination page.', 'cmb2' ),
		'id'   => 'learn_more',
		'type' => 'text_url',
	) );

}
add_action( 'cmb2_admin_init', 'zf_register_repeatable_group_field_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function zf_register_repeatable_group_field_metabox() {
$prefix = 'zf_group_';
	
/**
	 * Repeatable Field Groups
	 */
	$cmb_featured_group = new_cmb2_box( array(
		'id'           => $prefix . 'featured',
		'title'        => __( 'Featured Content', 'cmb2' ),
		'object_types' => array( 'page'),
		'show_on_cb' => 'bg_show_if_front_page',
		'closed'     => true, // true to keep the metabox closed by default
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_featured_group->add_field( array(
		'id'          => 'featured_box',
		'type'        => 'group',
		'description' => __( 'Use the 3 boxes below to add Featured Content. If this section has content, it will appear below the slider on the Home page. Note: The layout is designed for 3 boxes of content. Using less than 3 is not advised. ' ),
		'options'     => array(
			'group_title'   => __( 'Featured Box {#}', 'cmb2' ), // {#} gets replaced by row number
			/*'add_button'    => __( 'Add Another Box', 'cmb2' ),
			'remove_button' => __( 'Remove Box', 'cmb2' ),*/
			'add_button'    => false,
			'remove_button' => false,
			'sortable'      => true, // beta
			'closed'     => true, // true to have the groups closed by default
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	$cmb_featured_group->add_group_field( $group_field_id, array(
		'name'       => __( 'Feature Title', 'cmb2' ),
		'id'         => 'title',
		'type'       => 'text',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$cmb_featured_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Feature Text', 'cmb2' ),
		'description' => __( 'Small Image Text', 'cmb2' ),
		'id'          => 'featured-text',
		'type'        => 'textarea_small',
	) );

	$cmb_featured_group->add_group_field( $group_field_id, array(
		'name' => __( 'Feature Image', 'cmb2' ),
		'id'   => 'image',
		'type' => 'file',
	) );

	$cmb_featured_group->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Link to Page', 'cmb2' ),
		'desc' => esc_html__( 'Input the url for the featured content.', 'cmb2' ),
		'id'   => 'link_box',
		'type' => 'text_url',
	) );

}
//Industry Child Page Metaboxes

add_action( 'cmb2_admin_init', 'logo_carousel_register_metabox' );
function logo_carousel_register_metabox() {

$prefix = 'zf_';
	/**
	 * Repeatable Field Groups
	 */
	$zf_logo_group = new_cmb2_box( array(
		'id'           => $prefix . 'logo_carousel',
		'title'        => __( 'Logo Carousel', 'cmb2' ),
		'object_types' => array( 'page'),
		'show_on'      => array( 'key' => 'page-template', 'value' => 'industry.php' ),
		'closed'     => true, // true to keep the metabox closed by default
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $zf_logo_group->add_field( array(
		'id'          => 'logo_carousel',
		'type'        => 'group',
		'description' => __( 'Add industry-specific logo image files as needed. These are specific to all of the pages under this category.' ),
		'options'     => array(
			'group_title'   => __( 'Logo {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => __( 'Add Logo', 'cmb2' ),
			'remove_button' => __( 'Remove Logo', 'cmb2' ),
			
			'sortable'      => true, // beta
			'closed'     => true, // true to have the groups closed by default
		),
	) );
	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	 
	$zf_logo_group->add_group_field( $group_field_id, array(
		'name' => __( 'Logo Image', 'cmb2' ),
		'description' => __( 'Upload Logo Image', 'cmb2' ),
		'id'   => 'logo_image',
		'type' => 'file',
	) );

}
//Industry Page Custom Content
add_action( 'cmb2_init', 'ind_subpage_register_metabox' );
function ind_subpage_register_metabox() {
	$prefix = 'zf_';

$zf_ind_boxes = new_cmb2_box( array(
	'id'            => $prefix . 'ind_sb',
	'title'         => __( 'Custom Industry Content', 'cmb2' ),
	'object_types'  => array( 'page'), // Post type
	'show_on'      => array( 'key' => 'page-template', 'value' => 'industry-sub.php' ),
	'closed'     => true, // true to keep the metabox closed by default
) );
$zf_ind_boxes->add_field( array(
	'name' => esc_html__( 'Custom Sidebar for Industry Subpages', 'cmb2' ),
	'desc' => esc_html__( 'Add custom content above.', 'cmb2' ),
	'id'   => $prefix . 'ind_examples',
	'type' => 'wysiwyg',
) );

$zf_ind_boxes->add_field( array(
	'name' => esc_html__( 'Industry Plural', 'cmb2' ),
	'desc' => esc_html__( 'For related content. Ex: Grocery Stores', 'cmb2' ),
	'id'   => $prefix . 'ind_plural',
	'type' => 'text',
) );

$zf_rel_prod_check = new_cmb2_box( array(
	'id'    => $prefix . 'ind_sb_related_check',
	'title'  => __( 'Related Products (Select all that apply).', 'cmb2' ),
	'object_types'  => array( 'page'), // Post type
	'show_on'      => array( 'key' => 'page-template', 'value' => 'industry-sub.php' ),
	'closed'     => true, // true to keep the metabox closed by default
) );

$zf_rel_prod_check->add_field( array(
'name' => esc_html__( 'Open Ceiling', 'cmb2' ),
'id'   => $prefix . 'ind_fan_open_check',
'type'    => 'checkbox',
) );
$zf_rel_prod_check->add_field( array(
'name' => esc_html__( 'Drop Ceiling', 'cmb2' ),
'id'   => $prefix . 'ind_fan_drop_check',
'type'    => 'checkbox',
) );
$zf_rel_prod_check->add_field( array(
'name' => esc_html__( 'Spot Cooling', 'cmb2' ),
'id'   => $prefix . 'ind_fan_spot_check',
'type'    => 'checkbox',
) );
}

//Media Page Metaboxes
add_action( 'cmb2_admin_init', 'videos_register_metabox' );
function videos_register_metabox() {

$prefix = 'zf_';
	/**
	 * Repeatable Field Groups
	 */
	$zf_video_group = new_cmb2_box( array(
		'id'           => $prefix . 'videos',
		'title'        => __( 'Videos', 'cmb2' ),
		'object_types' => array( 'page'),
		'show_on'      => array( 'key' => 'page-template', 'value' => 'media.php' ),
		'closed'     => true, // true to keep the metabox closed by default
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $zf_video_group->add_field( array(
		'id'          => 'video_metabox',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'Video {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => __( 'Add Video', 'cmb2' ),
			'remove_button' => __( 'Remove Video', 'cmb2' ),
			
			'sortable'      => true, // beta
			'closed'     => true, // true to have the groups closed by default
		),
	) );
	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	 $zf_video_group->add_group_field( $group_field_id, array(
		'name' => __( 'Video Title', 'cmb2' ),
		'description' => __( 'Enter the title of the video.', 'cmb2' ),
		'id'   => 'video_title',
		'type' => 'text_url',
	) );
	$zf_video_group->add_group_field( $group_field_id, array(
		'name' => __( 'Video', 'cmb2' ),
		'description' => __( 'Embed Video.', 'cmb2' ),
		'id'   => 'video_embed',
		'type' => 'oembed',
	) );

}
//Rep Page
add_action( 'cmb2_admin_init', 'rep_register_metabox' );
function rep_register_metabox() {

$prefix = 'zf_';
$zf_rep_downloads = new_cmb2_box( array(
	'id'    => $prefix . 'rep-downloads',
	'title'  => __( 'General Downloads', 'cmb2' ),
	'object_types'  => array( 'page'), // Post type
	'show_on'      => array( 'key' => 'page-template', 'value' => 'reps.php' ),
	'closed'     => true, // true to keep the metabox closed by default
) );

		$zf_rep_downloads->add_field( array(
		'name' => esc_html__( 'Sales Materials', 'cmb2' ),
		'id'   => $prefix . 'ind_rep_sales',
		'type'    => 'wysiwyg',
		) );
		$zf_rep_downloads->add_field( array(
		'name' => esc_html__( 'Engineering Information', 'cmb2' ),
		'id'   => $prefix . 'ind_rep_engineer',
		'type'    => 'wysiwyg',
		) );
		$zf_rep_downloads->add_field( array(
		'name' => esc_html__( 'Ordering', 'cmb2' ),
		'id'   => $prefix . 'ind_rep_order',
		'type'    => 'wysiwyg',
		) );
	
$zf_rep_open_ceil = new_cmb2_box( array(
	'id'    => $prefix . 'rep-oc',
	'title'  => __( 'Open Ceiling Downloads', 'cmb2' ),
	'object_types'  => array( 'page'), // Post type
	'show_on'      => array( 'key' => 'page-template', 'value' => 'reps.php' ),
	'closed'     => true, // true to keep the metabox closed by default
) );

		$zf_rep_open_ceil->add_field( array(
		'name' => esc_html__( 'Technical Information', 'cmb2' ),
		'id'   => $prefix . 'ind_rep_oc_tech',
		'type'    => 'wysiwyg',
		) );
		$zf_rep_open_ceil->add_field( array(
		'name' => esc_html__( 'Installation', 'cmb2' ),
		'id'   => $prefix . 'ind_rep_oc_install',
		'type'    => 'wysiwyg',
		) );


$zf_rep_drop_ceil = new_cmb2_box( array(
	'id'    => $prefix . 'rep-dc',
	'title'  => __( 'Drop Ceiling Downloads', 'cmb2' ),
	'object_types'  => array( 'page'), // Post type
	'show_on'      => array( 'key' => 'page-template', 'value' => 'reps.php' ),
	'closed'     => true, // true to keep the metabox closed by default
) );

		$zf_rep_drop_ceil->add_field( array(
		'name' => esc_html__( 'Technical Information', 'cmb2' ),
		'id'   => $prefix . 'ind_rep_dc_tech',
		'type'    => 'wysiwyg',
		) );
		$zf_rep_drop_ceil->add_field( array(
		'name' => esc_html__( 'Installation', 'cmb2' ),
		'id'   => $prefix . 'ind_rep_dc_install',
		'type'    => 'wysiwyg',
		) );
}
//FAQs
add_action( 'cmb2_admin_init', 'faq_register_metabox' );
function faq_register_metabox() {
$prefix = 'zf_';
/**
	 * Repeatable Field Groups
	 */
	$zf_faq_group = new_cmb2_box( array(
		'id'           => $prefix . 'faq_box',
		'title'        => __( 'FAQs', 'cmb2' ),
		'object_types'  => array('page'),
		'show_on'      => array( 'key' => 'page-template', 'value' => 'faq.php' ),
		'sortable' 	=> true,
		'closed'     => false, // true to keep the metabox closed by default
	) );

			// $group_field_id is the field id string, so in this case: $prefix . 'demo'
			$group_field_id = $zf_faq_group->add_field( array(
				'id'          => 'faq',
				'type'        => 'group',
				'description' => __( 'Enter your FAQs below.' ),
				'options'     => array(
					'group_title'   => __( 'FAQ {#}', 'cmb2' ), // {#} gets replaced by row number
					'add_button'    => __( 'Add FAQ', 'cmb2' ),
					'remove_button' => __( 'Remove FAQ', 'cmb2' ),
			
					'sortable'      => true, // beta
					'closed'     => true, // true to have the groups closed by default
				),
			) );
	 
			$zf_faq_group->add_group_field( $group_field_id, array(
				'name' => __( 'Question', 'cmb2' ),
				'description' => __( 'Enter the question.', 'cmb2' ),
				'id'   => 'faq_ques',
				'type' => 'text',
			) );
			$zf_faq_group->add_group_field( $group_field_id, array(
				'name' => __( 'Answer', 'cmb2' ),
				'description' => __( 'Enter the Answer.', 'cmb2' ),
				'id'   => 'faq_ans',
				'type' => 'wysiwyg',
			) );			
}

//Product Listings
add_action( 'cmb2_admin_init', 'product_register_metabox' );
function product_register_metabox() {
$prefix = 'zf_';
/**
	 * Repeatable Field Groups
	 */
	$zf_prod_image_group = new_cmb2_box( array(
		'id'           => $prefix . 'product_images',
		'title'        => __( 'Product Images', 'cmb2' ),
		'object_types'  => array('product'),
		'sortable' 	=> true,
		'closed'     => true, // true to keep the metabox closed by default
	) );

			// $group_field_id is the field id string, so in this case: $prefix . 'demo'
			$group_field_id = $zf_prod_image_group->add_field( array(
				'id'          => 'prod_images',
				'type'        => 'group',
				'description' => __( 'Add product image files as needed.' ),
				'options'     => array(
					'group_title'   => __( 'Product Image {#}', 'cmb2' ), // {#} gets replaced by row number
					'add_button'    => __( 'Add Product Image', 'cmb2' ),
					'remove_button' => __( 'Remove Product Image', 'cmb2' ),
			
					'sortable'      => true, // beta
					'closed'     => true, // true to have the groups closed by default
				),
			) );
	 
			$zf_prod_image_group->add_group_field( $group_field_id, array(
				'name' => __( 'Product Image', 'cmb2' ),
				'description' => __( 'Add Product Image', 'cmb2' ),
				'id'   => 'prod_image',
				'type' => 'file',
			) );
	$zf_prod_subtitle = new_cmb2_box( array(
	'id'    => $prefix . 'prod_subtitle',
	'title'  => __( 'Product Subtitle', 'cmb2' ),
	'object_types'  => array( 'product'), // Post type
	'closed'     => true, // true to keep the metabox closed by default
) );

		$zf_prod_subtitle->add_field( array(
		'name' => esc_html__( 'Product Subtitle', 'cmb2' ),
		'id'   => $prefix . 'prod_sub',
		'type'    => 'text',
		) );
	
	$zf_prod_features = new_cmb2_box( array(
	'id'    => $prefix . 'prod_features',
	'title'  => __( 'Product Features', 'cmb2' ),
	'object_types'  => array( 'product'), // Post type
	'closed'     => true, // true to keep the metabox closed by default
) );

		$zf_prod_features->add_field( array(	
		'id'   => $prefix . 'prod_feat',
		'type'    => 'wysiwyg',
		) );
		
		$zf_prod_features->add_field( array(
		'name' => esc_html__( 'Link to Specs PDF', 'cmb2' ),	
		'id'   => $prefix . 'prod_spec_link',
		'type' => 'text_url',
		) );
		
		
	$zf_prod_inline_links = new_cmb2_box( array(
	'id'    => $prefix . 'prod_inline_links',
	'title'  => __( 'Inline Links', 'cmb2' ),
	'object_types'  => array( 'product'), // Post type
	'closed'     => true, // true to keep the metabox closed by default
) );	
		$zf_prod_inline_links->add_field( array(
		'name' => esc_html__( 'Submittal Link', 'cmb2' ),	
		'id'   => $prefix . 'prod_submittal',
		'type' => 'text_url',
		) );
		
		$zf_prod_inline_links->add_field( array(
		'name' => esc_html__( 'Test Results Link', 'cmb2' ),	
		'id'   => $prefix . 'prod_test_results',
		'type' => 'text_url',
		) );
		
		$zf_prod_inline_links->add_field( array(
		'name' => esc_html__( 'Installation Guide Link', 'cmb2' ),	
		'id'   => $prefix . 'prod_install_gd',
		'type' => 'text_url',
		) );
		
		$zf_prod_inline_links->add_field( array(
		'name' => esc_html__( 'Operating Manual Link', 'cmb2' ),	
		'id'   => $prefix . 'prod_op_manual',
		'type' => 'text_url',
		) );
	
		
		
	$zf_prod_details = new_cmb2_box( array(
	'id'    => $prefix . 'prod_details',
	'title'  => __( 'Additional Details', 'cmb2' ),
	'object_types'  => array( 'product'), // Post type
	'closed'     => true, // true to keep the metabox closed by default
) );	
		$zf_prod_details->add_field( array(
		'name' => esc_html__( 'Uses', 'cmb2' ),	
		'id'   => $prefix . 'prod_uses',
		'type' => 'wysiwyg',
		) );	
		
		$zf_prod_details->add_field( array(
		'name' => esc_html__( 'Efficiency & Performance', 'cmb2' ),	
		'id'   => $prefix . 'prod_eff_perf',
		'type' => 'wysiwyg',
		) );
		
		$zf_prod_details->add_field( array(
		'name' => esc_html__( 'Coverage', 'cmb2' ),	
		'id'   => $prefix . 'prod_coverage',
		'type' => 'wysiwyg',
		) );
}


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
function start_el(&$output, $item, $depth=0, $args)
{
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
    $thumbnail = get_the_post_thumbnail( $item->object_id,'post-thumbnails' ); 
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
	.'><div class="image-box">'
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
?>