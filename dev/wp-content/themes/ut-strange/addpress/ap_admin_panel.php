<?php
/*
 * Template for 404 page not found
 *
 * @package WordPress
 * @subpackage ut-strange
 * @since Strange 1.0
 *
 *
 *
 */
/**********************************************************
****** UnitedThemes ADDPRESS
***********************************************************

Title	    :	ap_admin_panel.php
Version	    :	1.0
Author	    :	Alex Schornberg
URL	    :	http://www.unitedthemes.com

Description :	Framework to create a custom admin panel for UT themes

Theme	    :	strange

Created :	2011-05-12
Modified :

Advanced Skin Treatments
For All Skin Types

*/

add_action('admin_menu', 'ap_admin');
function ap_admin(){

    global $portfolio_images, $panel, $theme_path, $page;
    
    $plugin_page = add_menu_page(UT_THEME_NAME . ' Options', UT_THEME_NAME . ' Options', 'edit_themes', basename(__FILE__), 'ap_panel', $theme_path.'/addpress/images/darkicons/optionpanel.png', 61);
    add_action( 'admin_head-'. $plugin_page, 'ap_header' );

    if( $_GET['page']=='ap_admin_panel.php' ){

	require('includes/apPanel.php');
	require('includes/ap_text.php');

	/* save theme options */
	if( $_POST['action'] == 'save' ){
	    foreach( $_POST['data'] as $optname => $value ){
		// TODO: addslashes bei ent_quotes??
		if( is_array($value) ){
		    $keys=array();
		    for($i=1; $i<=count($value); $i++){ $keys[$i]=$i; }
		    $value = array_combine( $keys, $value );
		    update_option(UT_THEME_INITIAL.$optname, ((json_encode($value))));
		}else{
		    update_option(UT_THEME_INITIAL.$optname, (($value)));
	}   }	}

	wp_register_style( 'ccolorpicker', $theme_path.'/addpress/css/colorpicker.css');
	wp_enqueue_style( 'ccolorpicker' );
	wp_register_style( 'layout', $theme_path.'/addpress/css/style.css');
	wp_enqueue_style( 'layout' );
	wp_enqueue_script( 'jquery-ui-sortable' );
	wp_register_script( 'ccolorpicker', $theme_path.'/addpress/js/colorpicker.js');
	wp_enqueue_script( 'ccolorpicker' );
	wp_register_script( 'cookie', $theme_path.'/addpress/js/jquery.keks.js');
	wp_enqueue_script( 'cookie' );
	wp_register_script( 'fancyselect', $theme_path.'/addpress/js/ap.fancyselect.js');
	wp_enqueue_script( 'fancyselect' );
	wp_register_script( 'fileupload', $theme_path.'/addpress/js/ap.fileupload.js');
	wp_enqueue_script( 'fileupload' );
	wp_register_script( 'actions', $theme_path.'/addpress/js/ap.actions.js');
	wp_enqueue_script( 'actions' );
        
	$theme_fonts = ap_get_themefonts_array();
	$categories = ap_get_categories_array();
	$sidebars = ap_get_sidebars_array();
	$footer_layout = ap_get_footerlayout_array();

	$panel = new apPanel('ut-strange');

/* GENERAL */

    $panel->addTab( 'general' );
	$panel->addSection( 'header' );
	    $panel->addOption( 'logotype', array( 'type'=>'radio', 'defval'=>'img', 'selopt'=>array('img'=>'', 'txt'=>'') ) );
	    $panel->addOption( 'logoimg', array('type'=>'upload', 'upldir'=>'/img/logo', 'defval'=>$theme_path.'/img/logo/logo_dark.png' ) );
	    $panel->addOption( 'logotextsize', array( 'type'=>'text', 'defval'=>'30' ) );
	    $panel->addOption( 'favicon', array('type'=>'upload', 'upldir'=>'/img/logo', 'defval'=>$theme_path.'/img/logo/favicon.ico' ) );
	$panel->addSection( '404' );
	    $panel->addOption( 'title', array( 'type'=>'text', 'defval'=>'[themecolor]404[/themecolor]' ) );
	    $panel->addOption( 'teaser', array( 'type'=>'text', 'defval'=>'[themecolor]Sorry[/themecolor] is a four letter word' ) );
	    $panel->addOption( 'content', array( 'type'=>'textarea', 'defval'=>'[one_half] [h4]Nothing Found[/h4]Apologies, but no page was found. Perhaps searching will help find something related.[/one_half] [one_half_last] [searchform] [/one_half_last]' ) );
	    $panel->addOption( 'sidebar', array( 'type'=>'select', 'defval'=>'1', 'selopt'=>$sidebars ) );
	    $panel->addOption( 'sidebar_align', array( 'type'=>'radio', 'defval'=>'right', 'selopt'=>array('left'=>'','right'=>'') ) );
	$panel->addSection( 'nopost' );
	    $panel->addOption( 'title', array( 'type'=>'text', 'defval'=>'[themecolor]404[/themecolor]' ) );
	    $panel->addOption( 'teaser', array( 'type'=>'text', 'defval'=>'[themecolor]Sorry[/themecolor] is a four letter word' ) );
	    $panel->addOption( 'content', array( 'type'=>'textarea', 'defval'=>'[one_half] [h4]Nothing Found[/h4]Apologies, but no page was found. Perhaps searching will help find something related.[/one_half] [one_half_last] [searchform] [/one_half_last]' ) );
	$panel->addSection( 'footer' );
	    $panel->addOption( 'sidebar', array( 'type'=>'select', 'defval'=>'2', 'selopt'=>$sidebars ) );
	    $panel->addOption( 'layout', array( 'type'=>'select', 'defval'=>'4_2_2_2_2', 'selopt'=>$footer_layout ) );
	    $panel->addOption( 'copyright', array('type'=>'textarea', 'defval'=>'&copy; Copyright 2011 [url link="http://www.unitedthemes.com"]United Themes[/url]. All Rights Reserved.' ) );
	    $panel->addOption( 'googleanalytics', array('type'=>'textarea') );
	$panel->addSection( 'contactform' );
	    $panel->addOption( 'label_name', array( 'defval'=>'Name' ) );
	    $panel->addOption( 'label_mail', array( 'defval'=>'E-Mail' ) );
	    $panel->addOption( 'label_message', array( 'defval'=>'Message' ) );
	    $panel->addOption( 'label_submit', array( 'defval'=>'Submit' ) );
	    $panel->addOption( 'error_name', array( 'defval'=>'Please enter at least 3 characters.' ) );
	    $panel->addOption( 'error_mail', array( 'defval'=>'Please enter a valid e-mail address.' ) );
	    $panel->addOption( 'error_message', array( 'defval'=>'Please enter a message.' ) );
	    $panel->addOption( 'mail_to', array( 'defval'=> get_bloginfo('admin_email') ) );
	    $panel->addOption( 'mail_subject', array( 'defval'=>'Mail from '.get_bloginfo() ) );
	    $panel->addOption( 'mail_error', array( 'defval'=>'Sorry, an error occured. Please try again.' ) );
	    $panel->addOption( 'mail_success', array( 'defval'=>'Your message has been sent. Thank you!' ) );
	$panel->addSection( 'comments' );
	    $panel->addOption( 'txt_commentsreq', array( 'defval'=>'Required fields are marked [themecolor]*[/themecolor]' ) );//
	    $panel->addOption( 'txt_commentsmail', array( 'defval'=>'Your email address will not be published.' ) );//
	    $panel->addOption( 'txt_commentstags', array( 'defval'=>'You may use these HTML tags and attributes:' ) );//Text message for allowed HTML tags
	    $panel->addOption( 'txt_commentmod', array( 'defval'=>'Your comment is awaiting moderation.' ) );//Text message for comments, awaiting moderation.
	    $panel->addOption( 'error_name', array( 'defval'=>'Please enter at least 3 characters.' ) );
	    $panel->addOption( 'error_mail', array( 'defval'=>'Please enter a valid e-mail address.' ) );
	    $panel->addOption( 'error_message', array( 'defval'=>'Please enter a message.' ) );

    $panel->addTab( 'styling' );
	$panel->addSection( 'basic' );
	    $panel->addOption( 'theme_color', array( 'type'=>'color', 'defval'=>'#BD2323' ) );
	    $panel->addOption( 'theme_font', array( 'type'=>'select', 'defval'=>'1', 'selopt'=>$theme_fonts ) );
	$panel->addSection( 'topbar' );
	    $panel->addOption( 'bg_color', array( 'type'=>'color', 'defval'=>'none' ) );
	    $panel->addOption( 'bg_image', array('type'=>'upload', 'defval'=> $theme_path.'/img/backgrounds/top_bg.jpg', 'upldir'=>'/img/backgrounds', 'addnone' => 'No Background Image' ) );
	    $panel->addOption( 'bg_repeat', array('type'=>'radio', 'defval'=>'repeat', 'selopt'=>array('repeat'=>'', 'repeat-x'=>'', 'repeat-y'=>'', 'no-repeat'=>'' )) );
	    $panel->addOption( 'bg_position', array( 'defval'=>'left top' ) );
	    $panel->addOption( 'linkcolor', array( 'type'=>'color', 'defval'=>'#666666' ) );
	    $panel->addOption( 'linkcolor_h', array( 'type'=>'color', 'defval'=>'#CCCCCC' ) );
	$panel->addSection( 'header' );
	    $panel->addOption( 'bg_color', array( 'type'=>'color', 'defval'=>'#C9C9C9' ) );
	    $panel->addOption( 'bg_image', array('type'=>'upload', 'defval'=> $theme_path.'/img/backgrounds/header_bg.jpg', 'upldir'=>'/img/backgrounds', 'addnone' => 'No Background Image' ) );
	    $panel->addOption( 'bg_repeat', array('type'=>'radio', 'defval'=>'repeat-x', 'selopt'=>array('repeat'=>'', 'repeat-x'=>'', 'repeat-y'=>'', 'no-repeat'=>'' )) );
	    $panel->addOption( 'bg_position', array( 'defval'=>'left top' ) );
	    $panel->addOption( 'menucolor', array( 'type'=>'color', 'defval'=>'#000000' ) );
	    $panel->addOption( 'submenucolor', array( 'type'=>'color', 'defval'=>'#F5F5F5' ) );
	    $panel->addOption( 'menucolor_h', array( 'type'=>'color', 'defval'=>'#BD2323' ) );
	    $panel->addOption( 'submenucolor_h', array( 'type'=>'color', 'defval'=>'#F5F5F5' ) );
	 $panel->addSection( 'teaser' );
	    $panel->addOption( 'bg_color', array( 'type'=>'color', 'defval'=>'none' ) );
	    $panel->addOption( 'bg_image', array('type'=>'upload', 'defval'=> $theme_path.'/img/backgrounds/teaser_bg.jpg', 'upldir'=>'/img/backgrounds', 'addnone' => 'No Background Image' ) );
	    $panel->addOption( 'bg_repeat', array('type'=>'radio', 'defval'=>'no-repeat', 'selopt'=>array('repeat'=>'', 'repeat-x'=>'', 'repeat-y'=>'', 'no-repeat'=>'' )) );
	    $panel->addOption( 'bg_position', array( 'defval'=>'left top' ) );
	    $panel->addOption( 'textcolor_title', array( 'type'=>'color', 'defval'=>'#F5F5F5' ) );
	    $panel->addOption( 'textcolor_teaser', array( 'type'=>'color', 'defval'=>'#CCCCCC' ) );
	    $panel->addOption( 'linkcolor', array( 'type'=>'color', 'defval'=>'#CCCCCC' ) );
	    $panel->addOption( 'linkcolor_h', array( 'type'=>'color', 'defval'=>'#F5F5F5' ) );
	$panel->addSection( 'slider' );
	    $panel->addOption( 'caption_text', array( 'type'=>'color', 'defval'=>'#F5F5F5' ) );
	    $panel->addOption( 'caption_shadow', array( 'type'=>'color', 'defval'=>'#000000' ) );
	    $panel->addOption( 'subcaption_text', array( 'type'=>'color', 'defval'=>'#F5F5F5' ) );
	    $panel->addOption( 'subcaption_shadow', array( 'type'=>'color', 'defval'=>'#000000' ) );
	    $panel->addOption( 'subcaption_background', array( 'type'=>'color', 'defval'=>'#BD2323' ) );
	$panel->addSection( 'content' );
	    $panel->addOption( 'bg_color', array( 'type'=>'color', 'defval'=>'none' ) );
	    $panel->addOption( 'bg_image', array('type'=>'upload', 'defval'=> $theme_path.'/img/backgrounds/content_bg.jpg', 'upldir'=>'/img/backgrounds', 'addnone' => 'No Background Image' ) );
	    $panel->addOption( 'bg_repeat', array('type'=>'radio', 'defval'=>'repeat-x', 'selopt'=>array('repeat'=>'', 'repeat-x'=>'', 'repeat-y'=>'', 'no-repeat'=>'' )) );
	    $panel->addOption( 'bg_position', array( 'defval'=>'left top' ) );
	    $panel->addOption( 'textcolor', array( 'type'=>'color', 'defval'=>'#000000' ) );
	    $panel->addOption( 'linkcolor', array( 'type'=>'color', 'defval'=>'#666666' ) );
	    $panel->addOption( 'linkcolor_h', array( 'type'=>'color', 'defval'=>'#BD2323' ) );
	    $panel->addOption( 'plinkcolor', array( 'type'=>'color', 'defval'=>'#000000' ) );
	    $panel->addOption( 'plinkcolor_h', array( 'type'=>'color', 'defval'=>'#BD2323' ) );
	    $panel->addOption( 'flinkcolor', array( 'type'=>'color', 'defval'=>'#666666' ) );
	    $panel->addOption( 'flinkcolor_h', array( 'type'=>'color', 'defval'=>'#000000' ) );
	    $panel->addOption( 'field_bg', array( 'type'=>'color', 'defval'=>'#000000' ) );
	    $panel->addOption( 'field_txt', array( 'type'=>'color', 'defval'=>'#FFFFFF' ) );
	    $panel->addOption( 'field_bg_f', array( 'type'=>'color', 'defval'=>'#FFFFFF' ) );
	    $panel->addOption( 'field_txt_f', array( 'type'=>'color', 'defval'=>'#000000' ) );
	    $panel->addOption( 'button_bg', array( 'type'=>'color', 'defval'=>'#000000' ) );
	    $panel->addOption( 'button_txt', array( 'type'=>'color', 'defval'=>'#FFFFFF' ) );
	    $panel->addOption( 'button_bg_h', array( 'type'=>'color', 'defval'=>'#000000' ) );
	    $panel->addOption( 'button_txt_h', array( 'type'=>'color', 'defval'=>'#BD2323' ) );
	    $panel->addOption( 'line_color_t', array( 'type'=>'color', 'defval'=>'#DEDEDE' ) );
	    $panel->addOption( 'line_color_b', array( 'type'=>'color', 'defval'=>'#FFFFFF' ) );
	$panel->addSection( 'footer' );
	    $panel->addOption( 'bg_color', array( 'type'=>'color', 'defval'=>'none' ) );
	    $panel->addOption( 'bg_image', array('type'=>'upload', 'defval'=> $theme_path.'/img/backgrounds/footer_bg.jpg', 'upldir'=>'/img/backgrounds', 'addnone' => 'No Background Image' ) );
	    $panel->addOption( 'bg_repeat', array('type'=>'radio', 'defval'=>'no-repeat', 'selopt'=>array('repeat'=>'', 'repeat-x'=>'', 'repeat-y'=>'', 'no-repeat'=>'' )) );
	    $panel->addOption( 'bg_position', array( 'defval'=>'left top' ) );
	    $panel->addOption( 'textcolor', array( 'type'=>'color', 'defval'=>'#CCCCCC' ) );
	    $panel->addOption( 'linkcolor', array( 'type'=>'color', 'defval'=>'#999999' ) );
	    $panel->addOption( 'linkcolor_h', array( 'type'=>'color', 'defval'=>'#CCCCCC' ) );
	    $panel->addOption( 'field_bg', array( 'type'=>'color', 'defval'=>'#FFFFFF' ) );
	    $panel->addOption( 'field_txt', array( 'type'=>'color', 'defval'=>'#000000' ) );
	    $panel->addOption( 'field_bg_f', array( 'type'=>'color', 'defval'=>'#FFFFFF' ) );
	    $panel->addOption( 'field_txt_f', array( 'type'=>'color', 'defval'=>'#000000' ) );
	    $panel->addOption( 'button_bg', array( 'type'=>'color', 'defval'=>'#FFFFFF' ) );
	    $panel->addOption( 'button_txt', array( 'type'=>'color', 'defval'=>'#000000' ) );
	    $panel->addOption( 'button_bg_h', array( 'type'=>'color', 'defval'=>'#FFFFFF' ) );
	    $panel->addOption( 'button_txt_h', array( 'type'=>'color', 'defval'=>'#000000' ) );
	$panel->addSection( 'subfooter' );
	    $panel->addOption( 'bg_color', array( 'type'=>'color', 'defval'=>'none' ) );
	    $panel->addOption( 'bg_image', array('type'=>'upload', 'defval'=> $theme_path.'/img/backgrounds/sub_footer_bg.jpg', 'upldir'=>'/img/backgrounds', 'addnone' => 'No Background Image' ) );
	    $panel->addOption( 'bg_repeat', array('type'=>'radio', 'defval'=>'no-repeat', 'selopt'=>array('repeat'=>'', 'repeat-x'=>'', 'repeat-y'=>'', 'no-repeat'=>'' )) );
	    $panel->addOption( 'bg_position', array( 'defval'=>'left top' ) );
	    $panel->addOption( 'textcolor', array( 'type'=>'color', 'defval'=>'#CCCCCC' ) );
	    $panel->addOption( 'linkcolor', array( 'type'=>'color', 'defval'=>'#666666' ) );
	    $panel->addOption( 'linkcolor_h', array( 'type'=>'color', 'defval'=>'#CCCCCC' ) );

/* HOME */
    $panel->addTab( 'home' );
	$panel->addSection( 'welcome' );
	    $panel->addOption( 'text', array( 'type'=>'text', 'defval'=>'We`re a digital creative agency, helping brands make new [themecolor]fans[/themecolor].' ) );
	$panel->addSection( 'featured1' );
	    $panel->addOption( 'item',  array( 'type'=>'multi', 'multihead'=>'head', 'defval'=>'{"1":{"head":"Our Service","link":"","text":"Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci.","icon":"'.$theme_path.'/img/icons/service/why_icon.png","over":"learn more"},"2":{"head":"Our Work","link":"","text":"Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci.","icon":"'.$theme_path.'/img/icons/service/work_icon.png","over":"take a look"},"3":{"head":"Our Blog","link":"","text":"Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci.","icon":"'.$theme_path.'/img/icons/service/blog_icon.png","over":"view entries"}}', 'static'=>true ) );
		$panel->addMultiOption( 'head' );
		$panel->addMultiOption( 'link' );
		$panel->addMultiOption( 'text', array( 'type'=>'textarea' ) );
		$panel->addMultiOption( 'icon', array('type'=>'upload', 'upldir'=>'/img/icons/service') );
		$panel->addMultiOption( 'over' );
	$panel->addSection( 'featured2' );
	    $panel->addOption( 'category', array( 'type'=>'checkbox', 'defval'=>'', 'selopt'=>$categories ) );
	$panel->addSection( 'twitter' );
	    $panel->addOption( 'user', array( 'type'=>'text', 'defval'=>'unitedthemes' ) );
	    $panel->addOption( 'count', array( 'type'=>'text', 'defval'=> '1' ) );
	    $panel->addOption( 'text_default', array( 'defval'=>'we said,' ) );
	    $panel->addOption( 'text_ed', array( 'defval'=>'we' ) );
	    $panel->addOption( 'text_ing', array( 'defval'=>'we were' ) );
	    $panel->addOption( 'text_reply', array( 'defval'=>'we replied to' ) );
	    $panel->addOption( 'text_url', array( 'defval'=> 'we were looking at' ) );
	    $panel->addOption( 'text_loading', array( 'defval'=>'loading tweets&#x85;' ) );
	    $panel->addOption( 'refresh' );

/* SLIDER*/
    $panel->addTab( 'slider' );
	$panel->addSection( 'options' );
	    $panel->addOption( 'height', array( 'defval'=>'415' ) );
	    $panel->addOption( 'effect', array( 'type'=>'radio', 'defval'=>'slide', 'selopt'=>array('slide'=>'','fade'=>'') ) );
	    $panel->addOption( 'autoplay', array( 'type'=>'radio', 'defval'=>'y', 'selopt'=>array('y'=>'', 'n'=>'') ) );
	    $panel->addOption( 'delay', array( 'defval'=>'3000' ) );
	    $panel->addOption( 'resumedelay', array( 'defval'=>'15000' ) );
	    $panel->addOption( 'animationtime', array( 'defval'=>'600' ) );
	    $panel->addOption( 'delaybeforeanimate', array( 'defval'=>'0' ) );
	    $panel->addOption( 'hoverpause', array( 'type'=>'radio', 'defval'=>'y', 'selopt'=>array('y'=>'', 'n'=>'') ) );
	    $panel->addOption( 'stopend', array( 'type'=>'radio', 'defval'=>'n', 'selopt'=>array('y'=>'', 'n'=>'') ) );
	    $panel->addOption( 'navi', array( 'type'=>'radio', 'defval'=>'thumbs', 'selopt'=>array('none'=>'','navi'=>'','thumbs'=>'') ) );
	$panel->addSection( 'items' );
	    $panel->addOption( 'item', array( 'type'=>'multi', 'defval'=>'{
		"1":{"image":"'.$theme_path.'/img/slider/slider-item-1.jpg", "thumb":"'.$theme_path.'/img/slider/slider-item-1-thumb.jpg", "caption_title":"Strange Template", "caption_subtitle":"a Creatively Stunning Design", "caption_pos":"Top", "caption_dis":"300", "caption_dur":"400", "caption_easing":"swing"},
		"2":{"image":"'.$theme_path.'/img/slider/slider-item-2.jpg", "thumb":"'.$theme_path.'/img/slider/slider-item-2-thumb.jpg", "caption_title":"the perfect", "caption_subtitle":"photography slider", "caption_pos":"Top", "caption_dis":"300", "caption_dur":"400", "caption_easing":"swing"},
		"3":{"image":"'.$theme_path.'/img/slider/slider-item-3.jpg", "thumb":"'.$theme_path.'/img/slider/slider-item-3-thumb.jpg", "caption_title":"Boost Your Creativity", "caption_subtitle":"We blow your Mind", "caption_pos":"Top", "caption_dis":"300", "caption_dur":"400", "caption_easing":"swing"},
		"4":{"image":"'.$theme_path.'/img/slider/slider-item-4.jpg", "thumb":"'.$theme_path.'/img/slider/slider-item-4-thumb.jpg", "caption_title":"Colors of Life", "caption_subtitle":"", "caption_pos":"Top", "caption_dis":"300", "caption_dur":"400", "caption_easing":"swing"} }' ) );
		$panel->addMultiOption( 'custom', array('type'=>'textarea' ) );
		$panel->addMultiOption( 'image', array('type'=>'upload', 'upldir'=>'/img/slider') );
		$panel->addMultiOption( 'thumb', array('type'=>'upload', 'upldir'=>'/img/slider') );
		$panel->addMultiOption( 'linkurl', array( 'type'=>'text' ) );
		$panel->addMultiOption( 'caption_title', array( 'type'=>'text' ) );
		$panel->addMultiOption( 'caption_subtitle', array( 'type'=>'text' ) );
		$panel->addMultiOption( 'caption_pos', array( 'type'=>'radio', 'defval'=>'Top', 'selopt'=>array('Top'=>'', 'Right'=>'', 'Bottom'=>'', 'Left'=>'') ) );
		$panel->addMultiOption( 'caption_dis', array( 'defval'=>'300' ) );
		$panel->addMultiOption( 'caption_dur', array( 'defval'=>'400' ));
		$panel->addMultiOption( 'caption_easing', array( 'type'=>'select', 'defval'=>'swing', 'selopt'=>array("linear"=>"linear", "swing"=>"swing", "easeInQuad"=>"easeInQuad", "easeOutQuad"=>"easeOutQuad", "easeInOutQuad"=>"easeInOutQuad", "easeInCubic"=>"easeInCubic", "easeOutCubic"=>"easeOutCubic", "easeInOutCubic"=>"easeInOutCubic", "easeInQuart"=>"easeInQuart", "easeOutQuart"=>"easeOutQuart", "easeInOutQuart"=>"easeInOutQuart", "easeInSine"=>"easeInSine", "easeOutSine"=>"easeOutSine", "easeInOutSine"=>"easeInOutSine", "easeInExpo"=>"easeInExpo", "easeOutExpo"=>"easeOutExpo", "easeInOutExpo"=>"easeInOutExpo", "easeInQuint"=>"easeInQuint", "easeOutQuint"=>"easeOutQuint", "easeInOutQuint"=>"easeInOutQuint", "easeInCirc"=>"easeInCirc", "easeOutCirc"=>"easeOutCirc", "easeInOutCirc"=>"easeInOutCirc", "easeInElastic"=>"easeInElastic", "easeOutElastic"=>"easeOutElastic", "easeInOutElastic"=>"easeInOutElastic", "easeInBack"=>"easeInBack", "easeOutBack"=>"easeOutBack", "easeInOutBack"=>"easeInOutBack", "easeInBounce"=>"easeInBounce", "easeOutBounce"=>"easeOutBounce", "easeInOutBounce"=>"easeInOutBounce") ) );

/* BLOG */
    $panel->addTab( 'blog' );
	$panel->addSection( 'titleteaser' );
	    $panel->addOption( 'post_title', array( 'defval'=>'Single Post' ) );
	    $panel->addOption( 'post_teaser', array( 'defval'=>'otsu@tp2p' ) );
	    $panel->addOption( 'category_title', array( 'defval'=>'Category[themecolor] [category] [/themecolor]' ) );
	    $panel->addOption( 'category_teaser', array( 'defval'=>'Enter optional description here' ) );
	    $panel->addOption( 'archive_title', array( 'defval'=>'Archive for[themecolor] [archiveterm] [/themecolor]' ) );
	    $panel->addOption( 'archive_teaser', array( 'defval'=>'Enter optional description here' ) );
	    $panel->addOption( 'search_title', array( 'defval'=>'Search Results for[themecolor] [searchterm] [/themecolor]' ) );
	    $panel->addOption( 'search_teaser', array( 'defval'=>'Enter optional description here' ) );
	$panel->addSection( 'sidebar' );
	    $panel->addOption( 'post', array( 'type'=>'select', 'defval'=>'1', 'selopt'=>$sidebars ) );
	    $panel->addOption( 'post_align', array( 'type'=>'radio', 'defval'=>'right', 'selopt'=>array('left'=>'','right'=>'') ) );
	    $panel->addOption( 'category', array( 'type'=>'select', 'defval'=>'1', 'selopt'=>$sidebars ) );
	    $panel->addOption( 'category_align', array( 'type'=>'radio', 'defval'=>'right', 'selopt'=>array('left'=>'','right'=>'') ) );
	    $panel->addOption( 'archive', array( 'type'=>'select', 'defval'=>'1', 'selopt'=>$sidebars ) );
	    $panel->addOption( 'archive_align', array( 'type'=>'radio', 'defval'=>'right', 'selopt'=>array('left'=>'','right'=>'') ) );
	    $panel->addOption( 'search', array( 'type'=>'select', 'defval'=>'1', 'selopt'=>$sidebars ) );
	    $panel->addOption( 'search_align', array( 'type'=>'radio', 'defval'=>'right', 'selopt'=>array('left'=>'','right'=>'') ) );
	$panel->addSection( 'listing' );
	    $panel->addOption( 'length', array( 'defval'=>'60' ) );
	    $panel->addOption( 'readmore', array( 'defval'=>'read more' ) );
	    $panel->addOption( 'nextlink', array( 'defval'=>'next posts' ) );
	    $panel->addOption( 'prevlink', array( 'defval'=>'previous posts' ) );
	$panel->addSection( 'thumb' );
	    $panel->addOption( 'height_wsb', array( 'defval'=>'250' ) );
	    $panel->addOption( 'height_nsb', array( 'defval'=>'375' ) );
	    $panel->addOption( 'crop', array( 'type'=>'radio', 'defval'=>'y', 'selopt'=>array('y'=>'', 'n'=>'') ) );
	$panel->addSection( 'reading' );
	    $panel->addOption( 'disable_autop', array( 'type'=>'radio', 'defval'=>'n', 'selopt'=>array('y'=>'','no'=>'') ) );
	    $panel->addOption( 'txt_passpost', array( 'defval'=>'This post is password protected. To view it please enter the password below:' ) );
	    $panel->addOption( 'txt_commentshide', array( 'type'=>'radio', 'defval'=>'n', 'selopt'=>array('y'=>'','n'=>'') ) );
	    $panel->addOption( 'txt_commentsclosed', array( 'defval'=>'Comments in this post are closed.' ) );
	    $panel->addOption( 'txt_passcomm', array( 'defval'=>'This post is password protected. Enter the password above to view any comments.' ) );


/* PAGES */
    $panel->addTab( 'pages' );
	$panel->addSection( 'titleteaser' );
	    $panel->addOption( 'teaser', array( 'defval'=>'otsu@tp2p' ) );
	$panel->addSection( 'sidebar' );
	    $panel->addOption( 'sidebar', array( 'type'=>'select', 'defval'=>'1', 'selopt'=>$sidebars ) );
	    $panel->addOption( 'align', array( 'type'=>'radio', 'defval'=>'right', 'selopt'=>array('left'=>'','right'=>'') ) );
	$panel->addSection( 'reading' );
	    $panel->addOption( 'disable_autop', array( 'type'=>'radio', 'defval'=>'n', 'selopt'=>array('y'=>'','n'=>'') ) );
	    $panel->addOption( 'txt_commentshide', array( 'type'=>'radio', 'defval'=>'n', 'selopt'=>array('y'=>'','n'=>'') ) );
	    $panel->addOption( 'txt_commentsclosed', array( 'defval'=>'Comments in this page are closed.' ) );
	    $panel->addOption( 'txt_passpost', array( 'defval'=>'This page is password protected. To view it please enter the password below:' ) );
	    $panel->addOption( 'txt_passcomm', array( 'defval'=>'This page is password protected. Enter the password above to view any comments.' ) );

/* PORTFOLIO */
    $panel->addTab( 'portfolio' );
	$panel->addSection( 'general' );
	    $panel->addOption( 'layout', array( 'type'=>'select', 'defval'=>'filt', 'selopt'=>array('filt'=>'', '1col'=>'', '2col'=>'', '3col'=>'', '4col'=>'') ) );
	    $panel->addOption( 'readmore', array( 'defval'=>'take a look' ) );
	    $panel->addOption( 'linktext', array( 'defval'=>'view project' ) );
	$panel->addSection( 'titleteaser' );
	    $panel->addOption( 'work_title', array( 'defval'=>'Default Portfolio Work Title' ) );
	    $panel->addOption( 'work_teaser', array( 'defval'=>'Default Portfolio Category Teaser' ) );
	    $panel->addOption( 'category_title', array( 'defval'=>'Default Portfolio Category Title' ) );
	    $panel->addOption( 'category_teaser', array( 'defval'=>'Default Portfolio Category Teaser' ) );
	$panel->addSection( 'thumb' );
	    foreach( $portfolio_images as $name => $size ){
		$panel->addOption( 'height_'.$name, array( 'defval'=>$size['height'] ) );
		$panel->addOption( 'crop_'.$name, array( 'type'=>'radio', 'defval'=>'y', 'selopt'=>array('y'=>'', 'n'=>'') ) );
	    }
	$panel->addSection( 'listing' );
	    foreach( $portfolio_images as $name => $size ){
		$panel->addOption( 'count_'.$name, array( 'defval'=>$size['posts_per_page'] ) );
		if( $name != 'filt' )
		$panel->addOption( 'length_'.$name, array( 'defval'=>$size['excerpt'] ) );
	    }
	    $panel->addOption( 'nexttext', array( 'defval'=>'Next Works' ) );
	    $panel->addOption( 'prevtext', array( 'defval'=>'Previous Works' ) );
	$panel->addSection( 'reading' );
	    $panel->addOption( 'disable_autop', array( 'type'=>'radio', 'defval'=>'n', 'selopt'=>array('y'=>'','no'=>'') ) );
	    $panel->addOption( 'txt_passpost', array( 'defval'=>'This work is password protected. To view it please enter the password below:' ) );

/* SOCIAL */
    $panel->addTab( 'social' );
	$panel->addSection( 'options' );
	    $panel->addOption( 'header', array( 'type'=>'radio', 'defval'=>'y', 'selopt'=>array('y'=>'', 'n'=>'') ) );
	    $panel->addOption( 'footer',  array( 'type'=>'radio', 'defval'=>'y', 'selopt'=>array('y'=>'', 'n'=>'') ) );
	    $panel->addOption( 'open', array( 'type'=>'radio', 'defval'=>'same', 'selopt'=>array('same'=>'', 'new'=>'') ) );
	$panel->addSection( 'links' );
	    $panel->addOption( 'link', array( 'type'=>'multi', 'multihead'=>'name', 'defval'=>'{"1":{"name":"Google+","link":"http://plus.google.com/yourname"},"2":{"name":"Facebook","link":"http://facebook.com/yourname"},"3":{"name":"Twitter","link":"http://twitter.com/yourname"},"4":{"name":"RSS","link":"'.get_bloginfo('rss2_url').'"}}' ) );
		$panel->addMultiOption( 'name' );
		$panel->addMultiOption( 'link' );

/* FONTS */
    $panel->addTab( 'fonts' );
	$panel->addSection( 'manage' );
	    $panel->addOption( 'font', array( 'type'=>'multi', 'defval'=>'{"1":{"name":"PTSansBold","url":"'.$theme_path.'/css/fonts/PTSans/stylesheet.css","alt":"sans-serif"},"2":{"name":"News Cycle","url":"http://fonts.googleapis.com/css?family=News+Cycle","alt":"sans-serif"},"3":{"name":"Rationale","url":"http://fonts.googleapis.com/css?family=Rationale","alt":"sans-serif"},"4":{"name":"Yanone Kaffeesatz","url":"http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:200,400","alt":"sans-serif"},"5":{"name":"Voltaire","url":"http://fonts.googleapis.com/css?family=Voltaire","alt":"sans-serif"},"6":{"name":"Federo","url":"http://fonts.googleapis.com/css?family=Federo","alt":"sans-serif"},"7":{"name":"Open Sans","url":"http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300","alt":"sans-serif"}}', 'multihead'=>'name' ) );
		$panel->addMultiOption( 'name' );
		$panel->addMultiOption( 'url' );
		$panel->addMultiOption( 'alt' );

/* SIDEBARS */
    $panel->addTab( 'sidebars' );
	$panel->addSection( 'manage' );
	    $panel->addOption( 'sidebar', array( 'type'=>'multi', 'multihead'=>'name', 'defval'=>'{"1":{"name":"Main Sidebar","description":"this is the default sidebar"},"2":{"name":"Footer Sidebar","description":"this is the footer sidebar"}}' ) );
		$panel->addMultiOption( 'name' );
		$panel->addMultiOption( 'description', array( 'type'=>'textarea' ) );

/* NOTIFICATION BOXES */
    $panel->addTab( 'boxes' );
	$panel->addSection( 'items' );
	    $panel->addOption( 'item', array( 'type'=>'multi', 'multihead'=>'name' ) );
		$panel->addMultiOption( 'name' );
		$panel->addMultiOption( 'icon', array('type'=>'upload', 'upldir'=>'/img/icons/boxes') );
		$panel->addMultiOption( 'col-bg', array('type'=>'color', 'defval'=>'#ffffff') );
		$panel->addMultiOption( 'col-bd', array('type'=>'color', 'defval'=>'#dddddd') );
		$panel->addMultiOption( 'col-tx', array('type'=>'color', 'defval'=>'#666666') );

	if( !get_option( UT_THEME_INITIAL.'installed' ) ){
	    add_option( UT_THEME_INITIAL.'installed', '1' );
	    header('Location: '.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
	}
    }
}

// admin panel header
function ap_header(){
    
    global $theme_path;

    ?><script type="text/javascript">
	var  theme_path = '<?php echo $theme_path; ?>',
	     template = '<?php echo get_template(); ?>',
	     home_url = '<?php echo home_url(); ?>';
    </script><?php

}

// create panel
function ap_panel(){

    global $panel;
    $panel->createPanel();
    
}
?>