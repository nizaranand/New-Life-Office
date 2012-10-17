<?php
/**
 * This file contains all the shortcodes and TinyMCE formatting buttons functionality.
 *
 * @author Pexeto
 */



/* ------------------------------------------------------------------------*
 * TABS
 * ------------------------------------------------------------------------*/

function show_tabs($atts, $content = null) {
	extract(shortcode_atts(array(
		"titles" => '',
		"width" => 'medium'
	), $atts));
	$titlearr=explode(',',$titles);
	$html='<div class="tabs-container"><ul class="tabs ">';
	if($width=='small'){
		$wclass='w1';
	}elseif($width=='big'){
		$wclass='w3';
	}else{
		$wclass='w2';
	}
	foreach($titlearr as $title){
		$html.='<li class="'.$wclass.'"><a href="#">'.$title.'</a></li>';
	}
	$html.='</ul><div class="panes">'.do_shortcode($content).'</div></div>';
	return $html;
}
add_shortcode('tabs', 'show_tabs');


function show_pane($atts, $content = null) {
	return '<div>'.do_shortcode($content).'</div>';
}
add_shortcode('pane', 'show_pane');


function show_accordion($atts, $content = null) {
	return '<div class="accordion-container"><div id="accordion">'.do_shortcode($content).'</div></div>';
}
add_shortcode('accordion', 'show_accordion');


function show_apane($atts, $content = null) {
	extract(shortcode_atts(array(
		"title" => ''
		), $atts));
		return '<h2>'.$title.'</h2><div class="pane">'.do_shortcode($content).'</div>';
}
add_shortcode('apane', 'show_apane');


function show_testimonials($atts, $content = null) {
	return '<div class="testimonial-container"><div id="testimonials">'.do_shortcode($content).'</div></div>';
}
add_shortcode('testimonials', 'show_testimonials');


function show_testim($atts, $content = null) {
	extract(shortcode_atts(array(
		"author" => '',
		"img" =>''
		), $atts));
		return '<img src="'.$img.'" alt="" class="img-frame" /><div class="testim-pane"><h3>'.$author.'</h3><p>'.do_shortcode($content).'</p></div>';
}
add_shortcode('testim', 'show_testim');

/* ------------------------------------------------------------------------*
 * SERVICES BOXES
 * ------------------------------------------------------------------------*/

function pexeto_services_boxes(){
	$html='<div class="columns-wrapper nomargin">';
	for($i=1; $i<=3; $i++){
		$lastClass=$i==3?'nomargin':'';
		$html.='<div class="services-box three-columns '.$lastClass.'">';
		$html.='<h2>'.get_opt('_home_box_title'.$i).'</h2> <div class="double-line"></div>';
		if(get_opt('_home_box_icon'.$i)!=''){
			$html.='<img src="'.get_opt('_home_box_icon'.$i).'" />';
		}
		$html.='<p>'.get_opt('_home_box_desc'.$i).'</p>';
		if(trim(get_opt('_home_box_btn_link'.$i))){
			$html.='<a href="'.get_opt('_home_box_btn_link'.$i).'" >'.get_opt('_home_box_btn_text'.$i).'<span class="more-arrow">&raquo;</span></a>';
		}
		$html.='</div>';
	}

	$html.='</div>';
	return $html;
}


add_shortcode('servicesboxes', 'pexeto_services_boxes');

/* ------------------------------------------------------------------------*
 * CONTACT FORM
 * ------------------------------------------------------------------------*/

function pexeto_contact_form(){
	$html='<div class="widget-contact-form">
<form action="'.get_template_directory_uri().'/includes/send-email.php" method="post" id="submit-form" class="pexeto-contact-form">
  <input type="text" name="name" class="required clear-on-click" id="name_text_box" value="'.pex_text('_name_text').'" />
  <input type="text" name="email" class="required clear-on-click email" id="email_text_box" value="'.pex_text('_your_email_text').'" />
  <textarea name="question" rows="" cols="" class="required"
    id="question_text_area"></textarea>
  
  <a class="button send-button"><span>'.pex_text('_send_text').'</span></a>
  <div class="contact-loader"></div><div class="check"></div>
   
</form><div class="clear"></div></div>';
	return $html;
}


add_shortcode('contactform', 'pexeto_contact_form');

/* ------------------------------------------------------------------------*
 * PORTFOLIO CAROUSEL
 * ------------------------------------------------------------------------*/

/**
 * Builds the code for the portfolio carousel widget
 * @param $cat_id the ID of the category whose items will be displayed
 * @param $columns the number of images per page/slide
 */
function pexeto_portfolio_carousel($cat_id, $columns, $title){
	//set the query_posts args
	$args= array(
	    'posts_per_page' =>get_opt('_carousel_max_items'), 
		'post_type' => PEXETO_PORTFOLIO_POST_TYPE
	);

	if($cat_id!='-1'){
		$slug=pexeto_get_taxonomy_slug($cat_id);
		$args['portfolio_category']=$slug;
	}
	$posts=get_posts($args);
	$i=0;
	$html= '<div class="latest-projects-container"><div class="latest-projects"><h6 class="small-title">'.$title.'</h6><hr /><div class="latest-projects-holder">';
	foreach($posts as $post){
		//open a page wrapper div on each first image of the page/slide
		if($i%$columns==0){
			$html.='<div class="latest-page-wrapper">';
		}
		//pexeto_build_portfolio_image_html() is located in lib/functions/portfolio.php
		$html.='<div class="latest-project">'.pexeto_build_portfolio_image_html($post->ID, 159, 119).'</div>';
		if(($i+1)%$columns==0 || $i+1==sizeof($posts)){
			//close the page wrapper div on the last image
			$html.='</div>';
		}

		$i++;
	}
	$html.='</div></div><div class="clear"></div></div>';
	return $html;
}


function show_portfolio_carousel($atts, $content = null) {
	extract(shortcode_atts(array(
		"cat" => '',
	    "title" => ''
		), $atts));
	$cat_id=$cat?get_term_by('name', $cat, 'portfolio_category')->term_id:'-1';
	
	return pexeto_portfolio_carousel($cat_id,5,$title);
}
add_shortcode('carousel', 'show_portfolio_carousel');


/* ------------------------------------------------------------------------*
 * ADD CUSTOM FORMATTING BUTTONS
 * ------------------------------------------------------------------------*/

global $pexeto_buttons;
$pexeto_styling_buttons=array("pexetotitle", "pexetotitlesmall", "pexetohighlight1", "pexetohighlight2", "pexetodropcaps", "|", "pexetolistcheck", "pexetoliststar",
"pexetolistarrow", "pexetolistarrow2", "pexetolistarrow4", "pexetolistplus", "|", "pexetolinebreak", 
"pexetoframe", "pexetolightbox", "|", "pexetobutton", "pexetoinfoboxes", "|", "pexetotwocolumns", "pexetothreecolumns", "pexetofourcolumns", "|", "pexetopricingtable");
$pexeto_content_buttons=array("pexetoyoutube", "pexetovimeo", "pexetoflash");

function add_pexeto_buttons() {
	if ( get_user_option('rich_editing') == 'true') {
		add_filter('mce_external_plugins', 'pexeto_add_btn_tinymce_plugin');
		add_filter('mce_buttons_3', 'pexeto_register_styling_buttons');
		add_filter('mce_buttons_4', 'pexeto_register_content_buttons');
	}
}

add_action('init', 'add_pexeto_buttons');


/**
 * Register the buttons
 * @param $buttons
 */
function pexeto_register_styling_buttons($buttons) {
	global $pexeto_styling_buttons;

	array_push($buttons, implode(',',$pexeto_styling_buttons));
	return $buttons;
}

/**
 * Add the buttons
 * @param $plugin_array
 */
function pexeto_add_btn_tinymce_plugin($plugin_array) {
	global $pexeto_styling_buttons, $pexeto_content_buttons;
	$merged_buttons=array_merge($pexeto_styling_buttons, $pexeto_content_buttons);
	foreach($merged_buttons as $btn){
		$plugin_array[$btn] = PEXETO_LIB_URL.'formatting-buttons/editor-plugin.js';
	}
	return $plugin_array;
}

/**
 * Register the buttons
 * @param $buttons
 */
function pexeto_register_content_buttons($buttons) {
	global $pexeto_content_buttons;

	array_push($buttons, implode(',',$pexeto_content_buttons));
	return $buttons;
}


