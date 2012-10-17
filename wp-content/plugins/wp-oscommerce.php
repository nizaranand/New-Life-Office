<?php
/*
Plugin Name: WP-osCommerce
Plugin URI: http://www.wposc.com/
Description:  WP-osCommerce : WP.osC Plugin for Wordpress.
Author: Roya Khosravi
Version: 1.2
Author URI: http://www.wposc.com/

Updates:
-none

To-Doo: 
-none
*/

$wposc_localversion="1.2";
$wp_wposc_plugin_url = trailingslashit( get_bloginfo('wpurl') ).PLUGINDIR.'/'. dirname( plugin_basename(__FILE__) );
 // Admin Panel   

class wposcwidget_new {
function init() {
	if ( !function_exists('register_sidebar_widget') ) return;
	$widget = new wposcwidget_new();
	register_sidebar_widget('New Products', array($widget,'display'));
	register_widget_control('New Products', array($widget,'control'));
}
function display($args) {
	extract($args);
	$options = get_option('wposwidget_new');
	$wposc_title = $options['wposc_title'];
	$wposc_params = "new_w";
	$wposcdir = get_option('wposcdir');
	$image_height = get_option('wposcimh_w');
	$image_width = get_option('wposcimw_w');
	$limit_new_w = get_option('limit_new_w');

	echo $before_widget;
	echo $before_title . $wposc_title . $after_title;
	$pluginlink = get_wposc_plugin_link($wposcdir);
        if (is_file($pluginlink)) require($pluginlink);
	echo $after_widget;
}

function control() {
	$options = get_option('wposwidget_new');
	if ( !is_array($options) )
	$options = array('wposc_title'=>'Our New Products');
	if ( $_POST['wposcsubmit'] ) {
	$options['wposc_title'] = $_POST['wposc_title'];
	update_option('wposwidget_new', $options);
	}
	$wposc_title = htmlspecialchars($options['wposc_title'], ENT_QUOTES);
	echo '<p style="text-align:right"><label for="wposc_title">' . __('Widget Title:') . ' <input style="width: 200px" id="wposc_title" name="wposc_title" type="text" value="'.$wposc_title.'" /></label></p>';
	echo '<input type="hidden" id="wposcsubmit" name="wposcsubmit" value="1" />';
  }
}


class wposcwidget_rand {
function init() {
	if ( !function_exists('register_sidebar_widget') ) return;
	$rand_widget = new wposcwidget_rand();
	register_sidebar_widget('Random Products', array($rand_widget,'display'));
	register_widget_control('Random Products', array($rand_widget,'control'));
}
function display($args) {
	extract($args);
	$rand_options = get_option('wposwidget_rand');
	$wposc_rand_title = $rand_options['wposc_rand_title'];
	$wposc_params = "rand_w";
	$wposcdir = get_option('wposcdir');
	$image_height = get_option('wposcimh_w');
	$image_width = get_option('wposcimw_w');
	$limit_rand_w = get_option('limit_rand_w');

	echo $before_widget;
	echo $before_title . $wposc_rand_title . $after_title;
	$pluginlink = get_wposc_plugin_link($wposcdir);
        if (is_file($pluginlink)) require($pluginlink);
	echo $after_widget;
}

function control() {
	$rand_options = get_option('wposwidget_rand');
	if ( !is_array($rand_options) )
	$rand_options = array('wposc_rand_title'=>'Random Product Selection');
	if ( $_POST['wposcsubmit_rand'] ) {
	$rand_options['wposc_rand_title'] = $_POST['wposc_rand_title'];
	update_option('wposwidget_rand', $rand_options);
	}
	$wposc_rand_title = htmlspecialchars($rand_options['wposc_rand_title'], ENT_QUOTES);
	echo '<p style="text-align:right"><label for="wposc_rand_title">' . __('Widget Title:') . ' <input style="width: 200px" id="wposc_rand_title" name="wposc_rand_title" type="text" value="'.$wposc_rand_title.'" /></label></p>';
	echo '<input type="hidden" id="wposcsubmit_rand" name="wposcsubmit_rand" value="1" />';
  }
}

function display_random_products() {
	$wposc_params = "rand_w";
	$wposcdir = get_option('wposcdir');
	$image_height = get_option('wposcimh_w');
	$image_width = get_option('wposcimw_w');
	$limit_rand_w = get_option('limit_rand_w');
	$pluginlink = get_wposc_plugin_link($wposcdir);
        if (is_file($pluginlink)) require($pluginlink);
}
function displayrandomproducts() {
return display_random_products();
}
function display_new_products() {
	$wposc_params = "new_w";
	$wposcdir = get_option('wposcdir');
	$image_height = get_option('wposcimh_w');
	$image_width = get_option('wposcimw_w');
	$limit_new_w = get_option('limit_new_w');
	$pluginlink = get_wposc_plugin_link($wposcdir);
        if (is_file($pluginlink)) require($pluginlink);
}
function displaynewproducts() {
return display_new_products();
}
function wposc_add_pages()
{
	add_options_page('WP-osCommerce options', 'WP-osCommerce', 8, __FILE__, 'wposc_options_page');            
}
// Options Page
function wposc_options_page()
{ 
	global $wposc_localversion;
	$status = wposc_getinfo();	
	$theVersion = $status[1];
	$theMessage = $status[3];	
	
			if( (version_compare(strval($theVersion), strval($wposc_localversion), '>') == 1) )
			{
				$msg = 'Latest version available '.' <strong>'.$theVersion.'</strong><br />'.$theMessage;	
				  _e('<div id="message" class="updated fade"><p>' . $msg . '</p></div>');			
			
			}
			
			

			if (isset($_POST['submitted'])) 
	{	


			$wposcdir = trim($_POST['wposcdir']);
			update_option('wposcdir', $wposcdir);		
			
			$wposcimh = trim($_POST['wposcimh']);
			update_option('wposcimh', $wposcimh);

			$wposcimw = trim($_POST['wposcimw']);
			update_option('wposcimw', $wposcimw);

			$wposcimh_w = trim($_POST['wposcimh_w']);
			update_option('wposcimh_w', $wposcimh_w);

			$wposcimw_w = trim($_POST['wposcimw_w']);
			update_option('wposcimw_w', $wposcimw_w);

			$limit_new = trim($_POST['limit_new']);
			update_option('limit_new', $limit_new);

			$limit_new_w = trim($_POST['limit_new_w']);
			update_option('limit_new_w', $limit_new_w);

			$limit_rand = trim($_POST['limit_rand']);
			update_option('limit_rand', $limit_rand);

			$limit_rand_w = trim($_POST['limit_rand_w']);
			update_option('limit_rand_w', $limit_rand_w);

			$limit_best = trim($_POST['limit_best']);
			update_option('limit_best', $limit_best);



			$msg_status = 'wposc options saved.';
							
		   _e('<div id="message" class="updated fade"><p>' . $msg_status . '</p></div>');
		
	} 
	
	$wposcdir = get_option('wposcdir');
	$wposcimh = get_option('wposcimh');
	$wposcimw = get_option('wposcimw');
	$wposcimh_w = get_option('wposcimh_w');
	$wposcimw_w = get_option('wposcimw_w');

	$limit_new = get_option('limit_new');
	$limit_new_w = get_option('limit_new_w');
	$limit_rand = get_option('limit_rand');
	$limit_rand_w = get_option('limit_rand_w');
	$limit_best = get_option('limit_best');

	global $wp_version;	
	global $wp_wposc_plugin_url;
	$actionurl=$_SERVER['REQUEST_URI'];
    // Configuration Page
    echo <<<END
<div class="wrap" style="max-width:950px !important;">
	<h2>WP-osCommerce $wposc_localversion</h2>
				
	<div id="poststuff" style="margin-top:10px;">
	
	<div id="sideblock" style="float:right;width:220px;margin-left:10px;"> 
		 <h3>Related</h3>

<div id="dbx-content" style="text-decoration:none;">
<ul>
<li><a style="text-decoration:none;" href="http://www.wposc.com/">WP.osC - osCommerce for WordPress</a></li>
</ul><br />
</div>
 	</div>
	
	 <div id="mainblock" style="width:710px">
	 
		<div class="dbx-content">
		 	<form name="rkform" action="$action_url" method="post">
					<input type="hidden" name="submitted" value="1" /> 
						<h3>Usage</h3>                         
<p>WP-osCommerce : WP.osC Plugin for WordPress. 
<p>Usage: You have three options<br><br>
1. Create a page or post and enter one of the following tags anywhere in the content.<br>
<strong>[wposc:new]</strong> Displays new products.<br>
<strong>[wposc:best]</strong> Displays top 10 best sellers.<br>
<strong>[wposc:rand]</strong> Displays random products.<br>
<br>
2.The plugin adds two widgets to display new products and random products, so you can place these widgets on your sidebar through Design=>Widgets.<br />
3. If your theme doesn’t use widgets, you can use one of the following functions in your sidebar:<br />
display_new_products(); and display_random_products(); 
</p>
<h3>Plugin Options</h3>
<div><input id="wposcdir" name="wposcdir" value="$wposcdir" size="10"/><label for="wposcdir"> The name of the subdirectory you have installed your WP.osC Store</label></div>

<div><input id="wposcimh" name="wposcimh" value="$wposcimh" size="10"/><label for="wposcimh"> Image height</label></div>

<div><input id="wposcimw" name="wposcimw" value="$wposcimw" size="10"/><label for="wposcimw"> Image width</label></div>

<div><input id="limit_new" name="limit_new" value="$limit_new" size="10"/><label for="limit_new"> Number of Displayed New Products</label></div>

<div><input id="limit_rand" name="limit_rand" value="$limit_rand" size="10"/><label for="limit_rand"> Number of Displayed Random Products</label></div>

<div><input id="limit_best" name="limit_best" value="$limit_best" size="10"/><label for="limit_best"> Number of Displayed BestSellers</label></div>

<h3>Widget Options</h3>
<div><input id="wposcimh_w" name="wposcimh_w" value="$wposcimh_w" size="10"/><label for="wposcimh_w"> Image height in Sidebar</label></div>

<div><input id="wposcimw_w" name="wposcimw_w" value="$wposcimw_w" size="10"/><label for="wposcimw_w"> Image width in Sidebar</label></div>

<div><input id="limit_new_w" name="limit_new_w" value="$limit_new_w" size="10"/><label for="limit_new_w"> Number of Displayed New Products in sidebar</label></div>

<div><input id="limit_rand_w" name="limit_rand_w" value="$limit_rand_w" size="10"/><label for="limit_rand_w"> Number of Displayed Random Products in sidebar</label></div>
<br>
<br>
<div class="submit"><input type="submit" name="Submit" value="Update options" /></div>
			</form>
		</div>
					
		<br/><br/><h3>&nbsp;</h3>	
	 </div>

	</div>
<h5>WP-osCommerce plugin by <a href="http://www.wposc.com/">Roya Khosravi</a></h5>
</div>
END;
}
// Add Options Page
add_action('admin_menu', 'wposc_add_pages');

function get_wposc_plugin_link($wposcdir='') {
	if (is_file($wposcdir.'/plugin.php')) {
		$pluginlink = $wposcdir.'/plugin.php';
	} else if (is_file($wposcdir.'plugin.php')) {
		$pluginlink = $wposcdir.'plugin.php';
	} else if (is_file('/'.$wposcdir.'plugin.php')) {
		$pluginlink = '/'.$wposcdir.'plugin.php';
	} else if (is_file('/'.$wposcdir.'/plugin.php')) {
		$pluginlink = '/'.$wposcdir.'/plugin.php';
	}
return $pluginlink;
}

function wposc_tag($mode) {
	$wposcdir = get_option('wposcdir');
	$image_height = get_option('wposcimh');
	$image_width = get_option('wposcimw');
	$limit_new = get_option('limit_new');
	$limit_rand = get_option('limit_rand');
	$limit_best = get_option('limit_best');
	$pluginlink = get_wposc_plugin_link($wposcdir);
	$contents ='';

	if ( get_the_author_login()=='admin' ) {
	switch ($mode) {
	case "new":
		$wposc_params = "new";
        	if (is_file($pluginlink)) {
			ob_start();
			include $pluginlink;
			$contents = ob_get_contents();
			ob_end_clean();
			return $contents;
		}
    		break;
	case "rand":
		$wposc_params = "rand";
        	if (is_file($pluginlink)) {
			ob_start();
			include $pluginlink;
			$contents = ob_get_contents();
			ob_end_clean();
			return $contents;
		}
    		break;
	case "best":
		$wposc_params = "best";
        	if (is_file($pluginlink)) {
			ob_start();
			include $pluginlink;
			$contents = ob_get_contents();
			ob_end_clean();
			return $contents;
		}
    		break;
	default:
	}
	}
return true;
}
function wposc_check($the_content) {
////[wposc:new][wposc:best][wposc:rand]

	if (strpos($the_content, "[wposc:new]")!==FALSE){ 
		preg_match_all('/\[wposc:new\]/', $the_content, $matches, PREG_SET_ORDER); 
		foreach($matches as $match) { 
			$the_content = preg_replace("/\[wposc:new\]/", wposc_tag('new'),$the_content,1);

		}		
	}

	if (strpos($the_content, "[wposc:rand]")!==FALSE){ 
		preg_match_all('/\[wposc:rand\]/', $the_content, $matches, PREG_SET_ORDER); 
		foreach($matches as $match) { 
			$the_content = preg_replace("/\[wposc:rand\]/", wposc_tag('rand'),$the_content,1);

		}		
	}

	if (strpos($the_content, "[wposc:best]")!==FALSE){ 
		preg_match_all('/\[wposc:best\]/', $the_content, $matches, PREG_SET_ORDER); 
		foreach($matches as $match) { 
			$the_content = preg_replace("/\[wposc:best\]/", wposc_tag('best'),$the_content,1);

		}		
	}

    return $the_content;
}

function wposc_install(){

  if(get_option('wposcdir' == '') || !get_option('wposcdir')){
    add_option('wposcdir', 'shop');
}

  if(get_option('wposcimh' == '') || !get_option('wposcimh')){
    add_option('wposcimh', '80');
}
  if(get_option('wposcimw' == '') || !get_option('wposcimw')){
    add_option('wposcimw', '100');
}
  if(get_option('wposcimw_w' == '') || !get_option('wposcimw_w')){
    add_option('wposcimw_w', '100');
}
  if(get_option('wposcimh_w' == '') || !get_option('wposcimh_w')){
    add_option('wposcimh_w', '80');
}

  if(get_option('limit_new' == '') || !get_option('limit_new')){
	add_option('limit_new', '9');
}

  if(get_option('limit_new_w' == '') || !get_option('limit_new_w')){
	add_option('limit_new_w', '1');
}

  if(get_option('limit_rand' == '') || !get_option('limit_rand')){
	add_option('limit_rand', '9');
}

  if(get_option('limit_rand_w' == '') || !get_option('limit_rand_w')){
	add_option('limit_rand_w', '1');
}

  if(get_option('limit_best' == '') || !get_option('limit_best')){
	add_option('limit_best', '10');
}

}

if (isset($_GET['activate']) && $_GET['activate'] == 'true') {
    wposc_install();
}


add_action( 'plugins_loaded', 'wposc_install' );
add_action( 'after_plugin_row', 'wposc_check_plugin_version' );
add_action('widgets_init', array('wposcwidget_new','init'));
add_action('widgets_init', array('wposcwidget_rand','init'));
add_filter('the_content', 'wposc_check', 10);
add_filter('the_excerpt','wposc_check', 10);

function wposc_getinfo()
{
		$checkfile = "http://www.wposc.com/pub/wposc_wordpress_plugin_version.txt";
		
		$status=array();
		return $status;
		$vcheck = wp_remote_fopen($checkfile);
				
		if($vcheck)
		{
			$version = $wposc_localversion;
									
			$status = explode('@', $vcheck);
			return $status;				
		}					
}

function wposc_check_plugin_version($plugin)
{
	global $plugindir,$wposc_localversion;
	
 	if( strpos($plugin,'WP-oscommerce.php')!==false )
 	{
			

			$status=wposc_getinfo();
			
			$theVersion = $status[1];
			$theMessage = $status[3];	
	
			if( (version_compare(strval($theVersion), strval($wposc_localversion), '>') == 1) )
			{
				$msg = 'Latest version available '.' <strong>'.$theVersion.'</strong><br />'.$theMessage;				
				echo '<td colspan="5" class="plugin-update" style="line-height:1.2em;">'.$msg.'</td>';
			} else {
				return;
			}
		
	}
}
?>