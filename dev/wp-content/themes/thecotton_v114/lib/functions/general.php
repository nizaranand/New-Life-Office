<?php
/**
 * This file contain some general functions:
 * -enqueuing CSS and JS files
 * -inserting the JavaScript init code into the head
 * -set the default thumbnail size
 * -print pagination function
 * -register navigation menus function
 *
 * @author Pexeto
 */


/**
 * ADD THE ACTIONS
 */
add_action('admin_enqueue_scripts', 'pexeto_admin_init');
add_action('admin_head', 'pexeto_admin_head_add');
add_action('init', 'register_pexeto_menus' );
add_action('admin_menu', 'pexeto_add_theme_menu');

add_theme_support('menus');
add_theme_support('automatic-feed-links');


/**
 * Enqueues the JavaScript files needed depending on the current section.
 */
function pexeto_admin_init(){
	global $current_screen, $pexeto_data;

	if($current_screen->base=='post'){
		//enqueue the script and CSS files for the TinyMCE editor formatting buttons
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-dialog');
		wp_enqueue_script('pexeto-page-options',PEXETO_SCRIPT_URL.'page-options.js');
		wp_enqueue_script('pexeto-colorpicker',PEXETO_SCRIPT_URL.'colorpicker.js');

		//set the style files
		add_editor_style('lib/formatting-buttons/custom-editor-style.css');
		wp_enqueue_style('pexeto-page-style',PEXETO_CSS_URL.'page_style.css');
		wp_enqueue_style('pexeto-colorpicker-style',PEXETO_CSS_URL.'colorpicker.css');
	}

	if(isset($_GET['page']) && $_GET['page']==PEXETO_OPTIONS_PAGE){
		//enqueue the scripts for the Options page
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('jquery-ui-dialog');
		wp_enqueue_script('pexeto-jquery-co',PEXETO_SCRIPT_URL.'jquery-co.js');
		wp_enqueue_script('pexeto-ajaxupload',PEXETO_SCRIPT_URL.'ajaxupload.js');
		wp_enqueue_script('pexeto-colorpicker',PEXETO_SCRIPT_URL.'colorpicker.js');
		wp_enqueue_script('pexeto-options',PEXETO_SCRIPT_URL.'options.js');

		//enqueue the styles for the Options page
		wp_enqueue_style('pexeto-admin-style',PEXETO_CSS_URL.'admin_style.css');
		wp_enqueue_style('pexeto-colorpicker-style',PEXETO_CSS_URL.'colorpicker.css');
	}

	if($current_screen->id==PEXETO_PORTFOLIO_POST_TYPE){
		//enqueue the scripts needed for the add/edit portfolio post
		wp_enqueue_script('pexeto-ajaxupload',PEXETO_SCRIPT_URL.'ajaxupload.js');
		wp_enqueue_script('pexeto-options',PEXETO_SCRIPT_URL.'options.js');
	}

	if($current_screen->id=='page'){
		//enqueue the scripts needed for the add/edit page page
		wp_enqueue_script('pexeto-options',PEXETO_SCRIPT_URL.'page-options.js');
	}

	if(isset($_GET['page']) && (in_array($_GET['page'], $pexeto_data->custom_posttypes) || $_GET['page']==PEXETO_PORTFOLIO_POST_TYPE)){
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-widget');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('jquery-ui-dialog');
		wp_enqueue_script('pexeto-ajaxupload',PEXETO_SCRIPT_URL.'ajaxupload.js');
		wp_enqueue_script('pexeto-options',PEXETO_SCRIPT_URL.'options.js');
		wp_enqueue_script('pexeto-custom-page',PEXETO_SCRIPT_URL.'custom-page.js');
		//enqueue the styles for the Options page
		wp_enqueue_style('pexeto-admin-style',PEXETO_CSS_URL.'custom_page.css');
		wp_enqueue_style('jquery-ui-dialog');
	}

}


if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
    //Do redirect
    header( 'Location: '.admin_url().'admin.php?page='.PEXETO_OPTIONS_PAGE.'&activated=true' ) ;
}


/**
 * Inserts scripts for initializing the JavaScript functionality for the relevant section.
 */
function pexeto_admin_head_add(){

	if(isset($_GET['page']) && $_GET['page']==PEXETO_OPTIONS_PAGE){
		//init the options js functionality
		echo '<script>jQuery(document).ready(function($) {
				pexetoOptions.init({cookie:true});
		});</script>
		<!--[if IE 9]>
		<style type="text/css">
		.tab_navigation ul li.ui-tabs-selected a.tab span, .tab_navigation ul li.ui-tabs-selected a.tab span{
		top:-1px;
		position:relative;
		}
		
		.tab_navigation ul li.ui-tabs-selected a.tab{
		position:relative;
		top:1px;
		}
		</style>
		<![endif]-->
				
				';
	}
}

/**
 * Add the main setting menu for the theme.
 */
function pexeto_add_theme_menu(){
	add_menu_page( PEXETO_THEMENAME, PEXETO_THEMENAME, 'delete_pages', PEXETO_OPTIONS_PAGE, 'pexeto_theme_admin', PEXETO_LIB_URL.'/images/pex_icon.png');
	add_submenu_page(PEXETO_OPTIONS_PAGE, PEXETO_THEMENAME." Settings", "".PEXETO_THEMENAME." Options", 'delete_pages', PEXETO_OPTIONS_PAGE, 'pexeto_theme_admin');
}

/* ------------------------------------------------------------------------*
 * LOCALE AND TRANSLATION
 * ------------------------------------------------------------------------*/

load_theme_textdomain( 'pexeto', TEMPLATEPATH . '/lang' );

/**
 * Returns a text depending on the settings set. By default the theme gets uses
 * the texts set in the Translation section of the Options page. If multiple languages enabled,
 * the default language texts are used from the Translation section and the additional language
 * texts are used from the added .mo files within the lang folder.
 * @param $textid the ID of the text
 */
function pex_text($textid){

	$locale=get_locale();
	$int_enabled=get_option(PEXETO_SHORTNAME.'_enable_translation')=='on'?true:false;
	$default_locale=get_option(PEXETO_SHORTNAME.'_def_locale');

	if($int_enabled && $locale!=$default_locale){
		//use translation - extract the text from a defined .mo file
		return __($textid, 'pexeto');
	}else{
		//use the default text settings
		return stripslashes(get_option(PEXETO_SHORTNAME.$textid));
	}
}


/* ------------------------------------------------------------------------*
 * SET THE THUMBNAILS
 * ------------------------------------------------------------------------*/


if (function_exists('add_theme_support')) {
	add_theme_support( 'post-thumbnails' );
	add_image_size('post_box_img', 550, 250, true);
	add_image_size('static-header-img', 950, 350, true);
}


function pexeto_get_resized_image($imgurl, $width, $height){
	if(function_exists('get_blogaddress_by_id')){
		//this is a WordPress Network (multi) site
		$imgurl=get_blogaddress_by_id(1).str_replace(get_blog_option($blog_id,'fileupload_url'),
		get_blog_option($blog_id,'upload_path'),
		$imgurl);
	}
	return get_template_directory_uri().'/lib/utils/timthumb.php?src='.$imgurl.'&h='.$height.'&w='.$width.'&zc=1&q=100';
}

/**
 * Prints the pagination. Checks whether the WP-Pagenavi plugin is installed and if so, calls
 * the function for pagination of this plugin. If not- shows prints the previous and next post links.
 */
function print_pagination(){
	if(function_exists('wp_pagenavi')){
	 wp_pagenavi();
	}else{?>
<div id="blog_nav_buttons" class="navigation">
<div class="alignleft"><?php previous_posts_link('<span>&laquo;</span> '.pex_text('_previous_text')) ?></div>
<div class="alignright"><?php next_posts_link(pex_text('_next_text').' <span>&raquo;</span>') ?></div>
</div>
	<?php
	}
}


/**
 * Register the main menu for the theme.
 */
function register_pexeto_menus() {
	register_nav_menus(
	array('pexeto_main_menu' => __( 'Main Menu' ))
	);
}


/**
 * Removes an item from an array by specifying its value
 * @param $array the array from witch to remove the item
 * @param $val the value to be removed
 * @return returns the initial array without the removed item
 */
function pexeto_remove_item_by_value($array, $val = '') {
	if (empty($array) || !is_array($array)) return false;
	if (!in_array($val, $array)) return $array;

	foreach($array as $key => $value) {
		if ($value == $val) unset($array[$key]);
	}

	return array_values($array);
}


