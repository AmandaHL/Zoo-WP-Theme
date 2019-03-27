<?php
	
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
	'name' => esc_html__( 'Large Call-to-Action Text', 'cmb2' ),
	'desc' => esc_html__( 'Customize call to action (used on the Landing page and Archive templates).', 'cmb2' ),
	'id'   => $prefix . 'landing_title',
	'type' => 'textarea_small'
) );
$zf_banner_box->add_field( array(
	'name' => esc_html__( 'Banner Text', 'cmb2' ),
	'desc' => esc_html__( 'Add paragraph text (Industry Sub-Pages and Category Landing).', 'cmb2' ),
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
add_action( 'cmb2_admin_init', 'image_carousel_register_metabox' );
function image_carousel_register_metabox() {

$prefix = 'zf_';
	/**
	 * Repeatable Field Groups
	 */
	$zf_carousel_group = new_cmb2_box( array(
		'id'           => $prefix . 'image_carousel',
		'title'        => __( 'Image Carousel', 'cmb2' ),
		'object_types' => array( 'page'),
		'show_on'      => array( 'key' => 'page-template', 'value' => 'industry-sub.php' ),
		'closed'     => true, // true to keep the metabox closed by default
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $zf_carousel_group->add_field( array(
		'id'          => 'image_carousel',
		'type'        => 'group',
		'description' => __( 'Add installed fan image files as needed. They will display in the carousel.' ),
		'options'     => array(
			'group_title'   => __( 'Image {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => __( 'Add Image', 'cmb2' ),
			'remove_button' => __( 'Remove Image', 'cmb2' ),
			
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
	 
	$zf_carousel_group->add_group_field( $group_field_id, array(
		'name' => __( 'Image', 'cmb2' ),
		'description' => __( 'Upload Image', 'cmb2' ),
		'id'   => 'ind_image',
		'type' => 'file',
	) );
	$zf_carousel_group->add_group_field( $group_field_id, array(
		'name' => __( 'Image URL', 'cmb2' ),
		'description' => __( 'Link to the media file', 'cmb2' ),
		'id'   => 'ind_image_url',
		'type' => 'text',
	) );

}
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
		'closed'     => true, // true to keep the metabox closed by default
		
	) );

			// $group_field_id is the field id string, so in this case: $prefix . 'demo'
			$img_prod_group = $zf_prod_image_group->add_field( array(
				'id'          => 'prod_images',
				'type'        => 'group',
				'description' => __( 'Add product image files as needed.' ),
				'options'     => array(
					'group_title'   => __( 'Product Image {#}', 'cmb2' ), // {#} gets replaced by row number
					'add_button'    => __( 'Add Product Image', 'cmb2' ),
					'remove_button' => __( 'Remove Product Image', 'cmb2' ),
					'sortable'  => true, // beta,			
					'closed'     => true, // true to have the groups closed by default
				),
			) );
	 
			$zf_prod_image_group->add_group_field( $img_prod_group, array(
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
		'name' => esc_html__( 'ETL Logo', 'cmb2' ),
		'id'   => $prefix . 'prod_etl',
		'type'    => 'file',
		) );
		
		
		
	$zf_prod_downloads = new_cmb2_box( array(
	'id'    => $prefix . 'prod_download_links',
	'title'  => __( 'Download Links', 'cmb2' ),
	'object_types'  => array( 'product'), // Post type
	'closed'     => true, // true to keep the metabox closed by default
) );	
		$zf_prod_downloads->add_field( array(
		'name' => esc_html__( 'Submittal Link', 'cmb2' ),	
		'id'   => $prefix . 'prod_submittal',
		'type' => 'text_url',
		) );
		
		$zf_prod_downloads->add_field( array(
		'name' => esc_html__( 'Link to Specs PDF', 'cmb2' ),	
		'id'   => $prefix . 'prod_spec_link',
		'type' => 'text_url',
		) );
		
		$zf_prod_downloads->add_field( array(
		'name' => esc_html__( 'Installation Guide Link', 'cmb2' ),	
		'id'   => $prefix . 'prod_install_gd',
		'type' => 'text_url',
		) );
		
		$zf_prod_downloads->add_field( array(
		'name' => esc_html__( 'Installation Guide Link (Additional for Controllers)', 'cmb2' ),	
		'id'   => $prefix . 'prod_install_gd_two',
		'type' => 'text_url',
		) );
		
		$zf_prod_downloads->add_field( array(
		'name' => esc_html__( 'Performance Data Link', 'cmb2' ),	
		'id'   => $prefix . 'prod_perf_data',
		'type' => 'text_url',
		) );
		
		$zf_prod_downloads->add_field( array(
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
		'name' => esc_html__( 'Specifications', 'cmb2' ),	
		'id'   => $prefix . 'prod_specs',
		'type' => 'wysiwyg',
		) );	
		
		$zf_prod_details->add_field( array(
		'name' => esc_html__( 'Sound Level Calculations', 'cmb2' ),	
		'id'   => $prefix . 'prod_sound_level',
		'type' => 'wysiwyg',
		) );
		$zf_prod_details->add_field( array(
		'name' => esc_html__( 'Ducting', 'cmb2' ),	
		'id'   => $prefix . 'prod_ducting',
		'type' => 'wysiwyg',
		) );
		$zf_prod_details->add_field( array(
		'name' => esc_html__( 'Diffuser', 'cmb2' ),	
		'id'   => $prefix . 'prod_diffuser',
		'type' => 'wysiwyg',
		) );
		$zf_prod_details->add_field( array(
		'name' => esc_html__( 'Sound Characteristics', 'cmb2' ),	
		'id'   => $prefix . 'prod_sound_char',
		'type' => 'wysiwyg',
		) );
		
		$zf_prod_details->add_field( array(
		'name' => esc_html__( 'Certifications', 'cmb2' ),	
		'id'   => $prefix . 'prod_certs',
		'type' => 'wysiwyg',
		) );
		
		$zf_prod_details->add_field( array(
		'name' => esc_html__( 'Motor', 'cmb2' ),	
		'id'   => $prefix . 'prod_motor',
		'type' => 'wysiwyg',
		) );
		
		$zf_prod_details->add_field( array(
		'name' => esc_html__( 'Housing', 'cmb2' ),	
		'id'   => $prefix . 'prod_housing',
		'type' => 'wysiwyg',
		) );
		
		$zf_prod_details->add_field( array(
		'name' => esc_html__( 'Coverage', 'cmb2' ),	
		'id'   => $prefix . 'prod_coverage',
		'type' => 'wysiwyg',
		) );
		
		$zf_prod_details->add_field( array(
		'name' => esc_html__( 'Options', 'cmb2' ),	
		'id'   => $prefix . 'prod_options',
		'type' => 'wysiwyg',
		) );
		
		$zf_prod_details->add_field( array(
		'name' => esc_html__( 'Installation Hardware', 'cmb2' ),	
		'id'   => $prefix . 'prod_hardware',
		'type' => 'wysiwyg',
		) );
		
		$zf_prod_details->add_field( array(
		'name' => esc_html__( 'Dimensions', 'cmb2' ),	
		'id'   => $prefix . 'prod_dimensions',
		'type' => 'wysiwyg',
		) );
		
		$zf_prod_details->add_field( array(
		'name' => esc_html__( 'Fan Speed vs Usage', 'cmb2' ),	
		'id'   => $prefix . 'prod_speed_usage',
		'type' => 'wysiwyg',
		) );
		
		$zf_prod_details->add_field( array(
		'name' => esc_html__( 'Warranty', 'cmb2' ),	
		'id'   => $prefix . 'prod_warranty',
		'type' => 'wysiwyg',
		) );
		
		$zf_prod_details->add_field( array(
		'name' => esc_html__( 'Controller', 'cmb2' ),	
		'id'   => $prefix . 'prod_controller',
		'type' => 'wysiwyg',
		) );
		
		$zf_prod_details->add_field( array(
		'name' => esc_html__( 'Optional Manual Control', 'cmb2' ),	
		'id'   => $prefix . 'prod_manual_control',
		'type' => 'wysiwyg',
		) );
		$zf_prod_details->add_field( array(
		'name' => esc_html__( 'Electric Table', 'cmb2' ),	
		'id'   => $prefix . 'prod_elec_table',
		'type' => 'wysiwyg',
		) );
		
		$zf_prod_details->add_field( array(
		'name' => esc_html__( 'Multi-Zone Control Cabinet', 'cmb2' ),	
		'id'   => $prefix . 'prod_mz_cont_cabinet',
		'type' => 'wysiwyg',
		) );
		$zf_prod_details->add_field( array(
		'name' => esc_html__( 'User Interface', 'cmb2' ),	
		'id'   => $prefix . 'prod_user_interface',
		'type' => 'wysiwyg',
		) );
		$zf_prod_details->add_field( array(
		'name' => esc_html__( 'Autotransformer', 'cmb2' ),	
		'id'   => $prefix . 'prod_autotransformer',
		'type' => 'wysiwyg',
		) );
		$zf_prod_details->add_field( array(
		'name' => esc_html__( 'Automatic Mode', 'cmb2' ),	
		'id'   => $prefix . 'prod_auto_mode',
		'type' => 'wysiwyg',
		) );
		$zf_prod_details->add_field( array(
		'name' => esc_html__( 'Wiring Example', 'cmb2' ),	
		'id'   => $prefix . 'prod_wiring',
		'type' => 'wysiwyg',
		) );
}
//Similar Products on Product Single template
add_action( 'cmb2_init', 'sim_prod_register_metabox' );
function sim_prod_register_metabox() {
$prefix = 'zf_';

$cmb_sim_prod = new_cmb2_box( array(
	'id'           => $prefix . 'similar_products',
	'title'        => __( 'Similar Products' ),
	'object_types' => array( 'product', ), // Post type
) );

// Add new field
$cmb_sim_prod->add_field( array(
	'name'        => __( 'Products' ),
	'id'          => $prefix . 'sim_product',
	'type'        => 'post_search_text', // This field type
	'description' => __( 'Enter a comma-separated list of post IDs, or use the search icon to select posts.' ),
	// post type also as array
	'post_type'   => 'product',
	// Default is 'checkbox', used in the modal view to select the post type
	'select_type' => 'checkbox',
	
	
) );

}
?>
