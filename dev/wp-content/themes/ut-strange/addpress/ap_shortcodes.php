<?php
/*
 * ************************************* *
 *         ADDPRESS SHORTCODES           *
 * ************************************* *
 *      written by Alex Schornberg       *
 *            www.herz-as.net            *
 *                 for                   *
 *             UnitedThemes              *
 *         www.unitedthemes.com          *
 *****************************************
 * WP Version: 3.2.1                     *
 * Date: 2011-05-29                      *
 *****************************************
 */
global $shortcode_tags, $allowed_tags, $_tags, $count_slider, $count_items, $ap_shortcodes;
$count_slider = 0;

if(function_exists('add_shortcode')){add_shortcode('title', 'ap_shortcode_title');}
$ap_shortcodes['title'] = array( 'type'=>'s', 'title'=>'Post/Page/Work Title' );
function ap_shortcode_title(){
    return get_the_title();
}
if(function_exists('add_shortcode')){add_shortcode('date', 'ap_shortcode_date');}
$ap_shortcodes['date'] = array( 'type'=>'s', 'title'=>'Post/Page/Work Date' );
function ap_shortcode_date(){
    return get_the_date();
}
if(function_exists('add_shortcode')){add_shortcode('author', 'ap_shortcode_author');}
$ap_shortcodes['author'] = array( 'type'=>'s', 'title'=>'Post/Page/Work Author' );
function ap_shortcode_author(){
    if( is_single() || is_page() ){
        global $post;
	return get_the_author_meta( 'display_name', $post->post_author );
    }
}
if(function_exists('add_shortcode')){add_shortcode('permalink', 'ap_shortcode_permalink');}
$ap_shortcodes['permalink'] = array( 'type'=>'e', 'title'=>'Post/Page/Work Link', 'clabel'=>'Linktext', 'attr'=>array(
    'fancylink'=>array('type'=>'radio', 'title'=>'Fancylink', 'opt'=>array('true'=>'Yes', 'false'=>'No'), 'def'=>'false', 'desc'=>'Show link in fancy style.')) );
function ap_shortcode_permalink( $atts, $content = null ) {
    global $post;
    extract(shortcode_atts(array('fancylink' => 'false'), $atts));
    $class = ( $fancylink=='true' ) ? ' class="fancy_link"' : '';
    return '<a href="'.get_permalink( $post->ID).'">'.do_shortcode($content).'</a>';
}
if(function_exists('add_shortcode')){add_shortcode('category', 'ap_shortcode_category');}
$ap_shortcodes['category'] = array( 'type'=>'s', 'title'=>'Category Name' );
function ap_shortcode_category( $atts, $content = null ){
    extract(shortcode_atts(array('post_id' => null), $atts));
    $max = -1000000;
    foreach( get_the_category($post_id) as $category ){
	$_p = get_option( UT_THEME_INITIAL.'category_priority_catid'.$category->term_id );
	if( empty($_p) ) $_p = -999999;
	if(  $_p > $max ){ $max=$_p; $cat_name = $category->cat_name; }
    }
    return $cat_name;
}

if(function_exists('add_shortcode')){add_shortcode('searchterm', 'ap_shortcode_searchterm');}
$ap_shortcodes['searchterm'] = array( 'type'=>'s', 'title'=>'Search term' );
function ap_shortcode_searchterm( $atts, $content = null ) {
    global $_GET;
    return $_GET['s'] ? $_GET['s'] : false; 
}
if(function_exists('add_shortcode')){add_shortcode('archiveterm', 'ap_shortcode_archiveterm');}
$ap_shortcodes['archiveterm'] = array( 'type'=>'s', 'title'=>'Archive term' );
function ap_shortcode_archiveterm( $atts, $content = null ) {
    if( is_archive() ){
	global $wp_query;
	extract(shortcode_atts(array('tagprefix'=>'','tagsuffix'=>'','dateprefix'=>'','datesuffix'=>'','authorprefix'=>'','authorsuffix'=>''), $atts));
	if( isset($wp_query->query['tag']) )
	    return __($tagprefix, UT_THEME_NAME).$wp_query->query['tag'].__($tagsuffix, UT_THEME_NAME);
	elseif( isset($wp_query->query['year']) )
	    return __($dateprefix, UT_THEME_NAME).get_the_date().__($datesuffix, UT_THEME_NAME);
	elseif( isset($wp_query->query['author_name']) )
	    return __($authorprefix, UT_THEME_NAME).get_the_author_meta( 'display_name', $wp_query->post->post_author ).__($authorsuffix, UT_THEME_NAME);
	else
	    return;
    }else{
	return;
    }
}

// theme color
if(function_exists('add_shortcode')){add_shortcode('themecolor', 'ap_shortcode_themecolor');}
$ap_shortcodes['themecolor'] = array( 'type'=>'e', 'title'=>'Theme text color' );
function ap_shortcode_themecolor($atts, $content = null) {
    return '<span class="theme_color">'.do_shortcode($content).'</span>';
}
// custom color
if(function_exists('add_shortcode')){add_shortcode('color', 'ap_shortcode_color');}
$ap_shortcodes['color'] = array( 'type'=>'e', 'title'=>'Custom text color', 'attr'=>array(
    'val'=>array('type'=>'color', 'def'=>'#000000', 'title'=>'Color' ) ) );
function ap_shortcode_color($atts, $content = null) {
    extract(shortcode_atts(array('val' => '#000000'), $atts));
    return '<span style="color:'.$val.'">'.do_shortcode($content).'</span>';
}

// bold
if(function_exists('add_shortcode')){add_shortcode('b', 'ap_shortcode_b');}
$ap_shortcodes['b'] = array( 'type'=>'e', 'title'=>'Bold' );
function ap_shortcode_b( $atts, $content = null ) {
    return '<strong>'.do_shortcode($content).'</strong>';
}
// italic
if(function_exists('add_shortcode')){add_shortcode('i', 'ap_shortcode_i');}
$ap_shortcodes['i'] = array( 'type'=>'e', 'title'=>'Italic' );
function ap_shortcode_i( $atts, $content = null ) {
    return '<em>'.do_shortcode($content).'</em>';
}
// undeline
if(function_exists('add_shortcode')){add_shortcode('u', 'ap_shortcode_u');}
$ap_shortcodes['u'] = array( 'type'=>'e', 'title'=>'Underline' );
function ap_shortcode_u( $atts, $content = null ) {
    return '<u>'.do_shortcode($content).'</u>';
}
// linethrough
if(function_exists('add_shortcode')){add_shortcode('lt', 'ap_shortcode_lt');}
$ap_shortcodes['lt'] = array( 'type'=>'e', 'title'=>'Line trough' );
function ap_shortcode_lt( $atts, $content = null ) {
    return '<lt>'.do_shortcode($content).'</lt>';
}
// line
if(function_exists('add_shortcode')){add_shortcode('line', 'ap_shortcode_line');}
$ap_shortcodes['line'] = array( 'type'=>'s', 'title'=>'Horizontal line' );
function ap_shortcode_line() {
    return '<hr />';
}
// linebreak
if(function_exists('add_shortcode')){add_shortcode('br', 'ap_shortcode_br');}
$ap_shortcodes['br'] = array( 'type'=>'s', 'title'=>'Linebreak' );
function ap_shortcode_br() {
    return '<br />';
}
// paragraph
if(function_exists('add_shortcode')){add_shortcode('p', 'ap_shortcode_p');}
$ap_shortcodes['p'] = array( 'type'=>'e', 'title'=>'Paragraph' );
function ap_shortcode_p( $atts, $content = null ) {
    return '<p>'.do_shortcode($content).'</p>';
}
// link
if(function_exists('add_shortcode')){add_shortcode('url', 'ap_shortcode_url');}
$ap_shortcodes['url'] = array( 'type'=>'e', 'title'=>'Link', 'clabel'=>'Linktext', 'attr'=>array(
    'link'=>array('type'=>'text', 'title'=>'Link URL'),
    'fancylink'=>array('type'=>'radio', 'title'=>'Fancy Link', 'opt'=>array('true'=>'Yes', 'false'=>'No'), 'def'=>'false', 'desc'=>'Show link in fancy or regular style.' ),
    'target'=>array('type'=>'radio', 'title'=>'Open Link In', 'opt'=>array('self'=>'Self Window','new'=>'New Window'), 'def'=>'self', 'desc'=>'Open link in new or same window.' )) );
function ap_shortcode_url( $atts, $content = null ) {
    extract(shortcode_atts(array('link' => '', 'fancylink'=>'false', 'target'=>''), $atts));
    $pretty = '';
    $class = ( $fancylink=='true' ) ? 'fancy_link' : '';
    if( $target=='prettybox' ){
	$pretty = ' data-rel="prettyPhoto"';
	$class .= ' zoom';
    }
    $target = ($target=='new') ? ' target="_blank"' : '';
    return '<a href="'.$link.'" class="'.$class.'"'.$pretty.$target.'>'.do_shortcode($content).'</a>';
}

/*
 * HEADINGS
 */
if(function_exists('add_shortcode')){add_shortcode('h1', 'ap_shortcode_h1');}
$ap_shortcodes['h'] = array( 'type'=>'h', 'title'=>'Headings', 'attr'=>array( 'heading'=>array('type'=>'custom')) );
function ap_shortcode_h1( $atts, $content = null ) {
    extract(shortcode_atts(array('attr' => ''), $atts));
    return '<h1>'.do_shortcode($content).'</h1>';
}
if(function_exists('add_shortcode')){add_shortcode('h2', 'ap_shortcode_h2');}
function ap_shortcode_h2( $atts, $content = null ) {
    extract(shortcode_atts(array('attr' => ''), $atts));
    return '<h2>'.do_shortcode($content).'</h2>';
}
if(function_exists('add_shortcode')){add_shortcode('h3', 'ap_shortcode_h3');}
function ap_shortcode_h3( $atts, $content = null ) {
    extract(shortcode_atts(array('attr' => ''), $atts));
    return '<h3>'.do_shortcode($content).'</h3>';
}
if(function_exists('add_shortcode')){add_shortcode('h4', 'ap_shortcode_h4');}
function ap_shortcode_h4( $atts, $content = null ) {
    extract(shortcode_atts(array('attr' => ''), $atts));
    return '<h4>'.do_shortcode($content).'</h4>';
}
if(function_exists('add_shortcode')){add_shortcode('h5', 'ap_shortcode_h5');}
function ap_shortcode_h5( $atts, $content = null ) {
    extract(shortcode_atts(array('attr' => ''), $atts));
    return '<h5>'.do_shortcode($content).'</h5>';
}
if(function_exists('add_shortcode')){add_shortcode('h6', 'ap_shortcode_h6');}
function ap_shortcode_h6( $atts, $content = null ) {
    extract(shortcode_atts(array('attr' => ''), $atts));
    return '<h6>'.do_shortcode($content).'</h6>';
}

/*
 * HIGHLIGHT
 */
if(function_exists('add_shortcode')){add_shortcode('highlight', 'ap_shortcode_highlight');}
$ap_shortcodes['highlight'] = array( 'type'=>'e', 'title'=>'Highlight Text', 'attr'=>array( 
    'style'=>array('type'=>'radio', 'title'=>'Style', 'def'=>'1', 'opt'=>array('1'=>'1','2'=>'2','3'=>'3','4'=>'4')) ) );
function ap_shortcode_highlight( $atts, $content = null ) {
    extract(shortcode_atts(array('style' => '1'), $atts));
    $style = (!is_integer($style)&&$style<1&&$style>4)?1:$style;
    return '<span class="highlight'.$style.'">'.do_shortcode($content).'</span>';
}
/*
 * DROPCAPS
 */
if(function_exists('add_shortcode')){add_shortcode('dropcap', 'ap_shortcode_dropcap1');}
$ap_shortcodes['dropcap'] = array( 'type'=>'e', 'title'=>'Dropcaps', 'attr'=>array( 
    'style'=>array('type'=>'radio', 'title'=>'Style', 'def'=>'1', 'opt'=>array('1'=>'1','2'=>'2')) ) );
function ap_shortcode_dropcap1( $atts, $content = null ) {
    extract(shortcode_atts(array('style' => '1'), $atts));
    $style = (!is_integer($style)&&$style<1||$style>2)?1:$style;
    return '<span class="dropcap'.$style.'">'.$content.'</span>';
}
/*
 * BLOCKQUOTES
 */
if(function_exists('add_shortcode')){add_shortcode('blockquote', 'ap_shortcode_blockquote');}
$ap_shortcodes['blockquote'] = array( 'type'=>'e', 'title'=>'Blockquotes', 'attr'=>array( 
    'style'=>array('type'=>'radio', 'title'=>'Style', 'def'=>'1', 'opt'=>array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6')) ) );
function ap_shortcode_blockquote( $atts, $content = null ) {
    extract(shortcode_atts(array('style' => '1'), $atts));
    $style = (!is_integer($style)&&$style<1&&$style>6)?1:$style;
    return '<blockquote class="style'.$style.'"><span>'.do_shortcode($content).'</span></blockquote>';
}
/*
 * CODE
 */
if(function_exists('add_shortcode')){add_shortcode('code', 'ap_shortcode_code');}
$ap_shortcodes['code'] = array( 'type'=>'e', 'title'=>'Code', 'attr'=>array( 
    'type'=>array('type'=>'radio', 'title'=>'Type', 'def'=>'pre', 'opt'=>array('pre'=>'pre','code'=>'code')),
    'encode'=>array('type'=>'radio', 'title'=>'Encoding', 'def'=>'false', 'opt'=>array('false'=>'None','htmlspecialchars'=>'htmlspecialchars','htmlentities'=>'htmlentities')) ) );
function ap_shortcode_code( $atts, $content = null ) {
    extract(shortcode_atts(array('encode' => 'false', 'type'=>'pre'), $atts));
    if( $encode == 'htmlspecialchars' )
	$content = htmlspecialchars($content);
    elseif( $encode == 'htmlentities' )
	$content = htmlentities($content);
    return '<'.($type!='code'?'pre':'code').'>'.($content).'</'.($type!='code'?'pre':'code').'>';
}

/*
 * NUMBER ICONS
 */
$ap_shortcodes['num'] = array( 'type'=>'s', 'title'=>'Number Icon', 'attr'=>array('number'=>array('type'=>'custom', 'title'=>'Number') ) );
if(function_exists('add_shortcode')){add_shortcode('num1', 'ap_shortcode_num1');}
function ap_shortcode_num1() {
    global $theme_path;
    return '<img src="'.$theme_path.'/img/icons/service1.png" width="134" height="134" alt="1" class="alignleft">';
}
if(function_exists('add_shortcode')){add_shortcode('num2', 'ap_shortcode_num2');}
function ap_shortcode_num2() {
    global $theme_path;
    return '<img src="'.$theme_path.'/img/icons/service2.png" width="134" height="134" alt="1" class="alignleft">';
}
if(function_exists('add_shortcode')){add_shortcode('num3', 'ap_shortcode_num3');}
function ap_shortcode_num3() {
    global $theme_path;
    return '<img src="'.$theme_path.'/img/icons/service3.png" width="134" height="134" alt="1" class="alignleft">';
}
if(function_exists('add_shortcode')){add_shortcode('num4', 'ap_shortcode_num4');}
function ap_shortcode_num4() {
    global $theme_path;
    return '<img src="'.$theme_path.'/img/icons/service4.png" width="134" height="134" alt="1" class="alignleft">';
}
if(function_exists('add_shortcode')){add_shortcode('num5', 'ap_shortcode_num5');}
function ap_shortcode_num5() {
    global $theme_path;
    return '<img src="'.$theme_path.'/img/icons/service5.png" width="134" height="134" alt="1" class="alignleft">';
}
if(function_exists('add_shortcode')){add_shortcode('num6', 'ap_shortcode_num6');}
function ap_shortcode_num6() {
    global $theme_path;
    return '<img src="'.$theme_path.'/img/icons/service6.png" width="134" height="134" alt="1" class="alignleft">';
}
if(function_exists('add_shortcode')){add_shortcode('num7', 'ap_shortcode_num7');}
function ap_shortcode_num7() {
    global $theme_path;
    return '<img src="'.$theme_path.'/img/icons/service7.png" width="134" height="134" alt="1" class="alignleft">';
}
if(function_exists('add_shortcode')){add_shortcode('num8', 'ap_shortcode_num8');}
function ap_shortcode_num8() {
    global $theme_path;
    return '<img src="'.$theme_path.'/img/icons/service8.png" width="134" height="134" alt="1" class="alignleft">';
}
if(function_exists('add_shortcode')){add_shortcode('num9', 'ap_shortcode_num9');}
function ap_shortcode_num9() {
    global $theme_path;
    return '<img src="'.$theme_path.'/img/icons/service9.png" width="134" height="134" alt="1" class="alignleft">';
}

/*
 * BUTTONS
 */
if(function_exists('add_shortcode')){add_shortcode('button', 'ap_shortcode_button');}
$ap_shortcodes['button'] = array( 'type'=>'e', 'title'=>'Button', 'clabel'=>'Buttontext', 'attr'=>array(
    'background'=>array('title'=>'Background Color', 'type'=>'color', 'def'=>'#000000'),
    'background_h'=>array('title'=>'Background Color Hover', 'type'=>'color', 'def'=>'#000000'),
    'text'=>array('title'=>'Text Color', 'type'=>'color', 'def'=>'#FFFFFF'),
    'text_h'=>array('title'=>'Text Color Hover', 'type'=>'color', 'def'=>get_option( UT_THEME_INITIAL.'styling_basic_theme_color' )),
    'border'=>array('title'=>'Border Color', 'type'=>'color', 'def'=>get_option( UT_THEME_INITIAL.'styling_basic_theme_color' )),
    'border_h'=>array('title'=>'Border Color Hover', 'type'=>'color', 'def'=>'#000000'),
    'css'=>array('title'=>'CSS', 'type'=>'textarea', 'def'=>'', 'desc'=>'Add some additional CSS, e.g. height:50px; width:150px;')
    ) );
$sc_contact_count = 0;
$buttoncount=0;//
function ap_shortcode_button( $atts, $content = null ) {
    global $buttoncount;
    $buttoncount++;
    extract(shortcode_atts(array(
	'css'=>'',
	'background' => '#000000',
	'background_h' => '#000000',
	'text' => '#FFFFFF',
	'text_h' => get_option( UT_THEME_INITIAL.'styling_basic_theme_color' ),
	'border' => get_option( UT_THEME_INITIAL.'styling_basic_theme_color' ),
	'border_h' => '#000000' ), $atts));
    return '
	<style type="text/css">
	    #custombutton-'.$buttoncount.' { color: '.$text.' !important; background-color: '.$background.' !important; border:0; border-right:2px solid '.$border.' !important; }
	    #custombutton-'.$buttoncount.':hover { color: '.$text_h.' !important; background-color: '.$background_h.' !important; border-color: '.$border_h.' !important; }
	</style>
	<input id="custombutton-'.$buttoncount.'" type="submit" class="button" value="'.esc_attr($content).'" style="'.$css.'" />';
}

/*
 * NOTIFICATION BOXES
 */
if(function_exists('add_shortcode')){add_shortcode('box', 'ap_shortcode_box');}
$ap_shortcodes['box'] = array( 'type'=>'s', 'title'=>'Notification Box', 'attr'=>array( 
    'style'=>array('type'=>'radio', 'title'=>'Style', 'def'=>'info', 'opt'=>array('info'=>'Info','success'=>'success','warning'=>'warning','error'=>'error','custom'=>'custom')), 
    'customname'=>array('type'=>'custom') ) );
function ap_shortcode_box( $atts, $content = null ) {
    extract(shortcode_atts(array('style' => 'info'), $atts));
    $return='';
    if($style!='info'&&$style!='success'&&$style!='warning'&&$style!='error'){
	$custom_boxes = get_option( UT_THEME_INITIAL.'boxes_items_item' );
	if( is_array($custom_boxes) && !empty($custom_boxes) ){
	foreach( $custom_boxes as $custom_box ){
	    if( $style == $custom_box['name'] ){
		$return = '<div class="boxes" style="color:'.$custom_box['col-tx'].'; border: 1px solid '.$custom_box['col-bd'].'; background:'.$custom_box['col-bg'].' url('.$custom_box['icon'].') no-repeat 15px center">'.do_shortcode($content).'</div>';
		break;
	    }
	} }
	if( empty($return) )
	    $return = '<div class="boxes info_box">'.do_shortcode($content).'</div>';
    }else{
	$return = '<div class="boxes '.$style.'_box">'.do_shortcode($content).'</div>';
    }
    return $return;
}

/*
 * SEARCHFORM
 */
if(function_exists('add_shortcode')){add_shortcode('searchform', 'ap_shortcode_searchform');}
$ap_shortcodes['searchform'] = array( 'type'=>'s', 'title'=>'Searchform', 'attr'=>array( 
    'label'=>array('type'=>'text', 'title'=>'Label Text', 'def'=>'Search for:'),
    'submit'=>array('type'=>'text', 'title'=>'Submit Button Text', 'def'=>'Search') ) );
$sc_search_count = 0;
function ap_shortcode_searchform( $atts, $content = null ) {
    global $sc_search_count;
    $sc_search_count++;
    extract(shortcode_atts(array('label' => 'Search for:', 'submit' => 'Search' ), $atts));
    return '
<form role="search" method="get" class="searchform" action="' . home_url( '/' ) . '" >
    <ul class="cform">
	'.($label!='false'?'<li><label for="searchterm'.$sc_search_count.'">' . __($label, UT_THEME_NAME) . '</label>':'<li>').'
	<input type="text" value="' . get_search_query() . '" class="fancyinput" name="s" id="searchterm'.$sc_search_count.'" /></li>
	'.($submit!='false'?'<li><input class="button" type="submit" value="'. esc_attr__($submit, UT_THEME_NAME) .'" /></li>':'').'
    </ul>
</form>';
}

/*
 * CONTACTFORM
 */
if(function_exists('add_shortcode')){add_shortcode('contactform', 'ap_shortcode_contactform');}
$ap_shortcodes['contactform'] = array( 'type'=>'s', 'title'=>'Contactform', 'attr'=>array( 
    'mailto'=>array('type'=>'text', 'title'=>'Recipient E-Mail Address', 'def'=>get_option( UT_THEME_INITIAL.'general_contactform_mail_to' )),
    'subject'=>array('type'=>'text', 'title'=>'E-Mail Subject Text','def'=>get_option( UT_THEME_INITIAL.'general_contactform_mail_subject' )),
    'submit'=>array('type'=>'text', 'title'=>'Submit Button Text', 'def'=>'Search') ) );
$sc_contact_count = 0;
function ap_shortcode_contactform( $atts, $content = null ) {
    global $sc_contact_count;
    extract(shortcode_atts(array(
	'mailto' => get_option( UT_THEME_INITIAL.'general_contactform_mail_to' ),
	'subject' => get_option( UT_THEME_INITIAL.'general_contactform_mail_subject' ),
	'submit' => get_option( UT_THEME_INITIAL.'general_contactform_label_submit' ) ), $atts));
    return ap_contact_form( $mailto, $subject, $submit );
}

/*
 * GOOGLE MAP
 */
if(function_exists('add_shortcode')){add_shortcode('googlemap', 'ap_shortcode_googlemap');}
$ap_shortcodes['googlemap'] = array( 'type'=>'s', 'title'=>'Interactive Googlemap', 'attr'=>array( 
    'width'=>array('type'=>'text', 'title'=>'Width', 'def'=>'626'),
    'height'=>array('type'=>'text', 'title'=>'Height', 'def'=>'250'),
    'address'=>array('type'=>'text', 'title'=>'Address', 'def'=>'times square new york'), 
    'zoom'=>array('type'=>'text', 'title'=>'Zoom Factor', 'def'=>'14') ) );
function ap_shortcode_googlemap( $atts, $content = null ){
    extract(shortcode_atts(array(
	'width' => '626',
	'height' => '250',
	'address' => 'times square new york',
	'zoom' => '14'
    ), $atts));
    $return = '';
    $return .= '
	<div class="googlemap" style="width:'.$width.'px; height:'.$height.'px" data-zoom="'.$zoom.'" data-maptype="ROADMAP" data-address="'.urlencode($address).'"></div>';
    return $return;
}
if(function_exists('add_shortcode')){add_shortcode('googlemap_static', 'ap_shortcode_googlemap_static');}
$ap_shortcodes['googlemap_static'] = array( 'type'=>'s', 'title'=>'Static Googlemap', 'attr'=>array( 
    'width'=>array('type'=>'text', 'title'=>'Width', 'def'=>'626'),
    'height'=>array('type'=>'text', 'title'=>'Height', 'def'=>'250'),
    'address'=>array('type'=>'text', 'title'=>'Address', 'def'=>'times square new york'),
    'zoom'=>array('type'=>'text', 'title'=>'Zoom Factor', 'def'=>'14') ) );
function ap_shortcode_googlemap_static( $atts, $content = null ) {
    extract(shortcode_atts(array(
	'width' => '626',
	'height' => '250',
	'address' => 'times square new york',
	'zoom' => '14'
    ), $atts));
    $timestamp = time();
    $return = '';
    $return .= str_replace('&', '&amp;', '
	<img src="http://maps.google.com/maps/api/staticmap?center='.urlencode($address).'&zoom='.$zoom.'&markers='.urlencode($address).'&size='.$width.'x'.$height.'&sensor=false" />');
    return $return;
}

/*
 * TESTIMONIAL
 */
if(function_exists('add_shortcode')){add_shortcode('testimonial', 'ap_shortcode_testimonial');}
$ap_shortcodes['testimonial'] = array( 'type'=>'e', 'title'=>'Testimonial', 'attr'=>array( 
    'style'=>array('type'=>'radio', 'title'=>'Style', 'def'=>'', 'opt'=>array(''=>'None','shadow'=>'Shadow','frame'=>'Frame')),
    'img'=>array('type'=>'text', 'title'=>'Image Url', 'def'=>''),
    'name'=>array('type'=>'text', 'title'=>'Name'),
    'namelink'=>array('type'=>'text', 'title'=>'Name Link Url'),
    'company'=>array('type'=>'text', 'title'=>'Company'),
    'companylink'=>array('type'=>'text', 'title'=>'Company Link Url') ) );
function ap_shortcode_testimonial( $atts, $content = null ) {
    extract(shortcode_atts(array(
	'style' => '',
	'img' => '',
	'name' => '',
	'namelink' => '',
	'company' => '',
	'companylink' => ''
    ), $atts));
    $_imgstyle = ($style=='shadow'?' shadow':($style=='frame'?' frame':''));
    $return = '';
    $return .= '<div class="testim">';
    $return .= (!empty($img))?'<img src="'.$img.'" class="testim_thumb'.$_imgstyle.'" alt="avatar" height="80" width="80" />':'';
    $return .= '<div class="testim_description"><p>'.do_shortcode($content).'</p>';
    $return .= (!empty($name)||!empty($company))? (!empty($name)?'<p class="testim-author">'.(!empty($namelink)?'<a class="fancy_link" href="'.$namelink.'">':'').$name.(!empty($namelink)?'</a>':'').(!empty($company)?', ':''):'').(!empty($companylink)?'<a href="'.$companylink.'" class="fancy_link">':'').(!empty($company)?$company:'').(!empty($companylink)?'</a>':'').(!empty($name)?'</p>':'') :'';
    $return .= '</div></div>';
    return $return;
}

/*
 * CHECKLIST
 */
if(function_exists('add_shortcode')){add_shortcode('list', 'ap_shortcode_list');}
$ap_shortcodes['list'] = array( 'type'=>'m', 'title'=>'List', 'attr'=>array( 
    'style'=>array('type'=>'radio', 'title'=>'Style', 'def'=>'check', 'opt'=>array('check'=>'Check list','heart'=>'Heart list','favorite'=>'Favorite list','plus'=>'Plus list')),
    'item'=>array('type'=>'custom') ) );
function ap_shortcode_list( $atts, $content = null ) {
    extract(shortcode_atts(array('style' => 'check', 'class'=>''), $atts));
    global $list_item, $_tags, $shortcode_tags;
    $shortcode_tags = $_tags;
    $list_item=false;
    if( !empty($class) ){
	$style = $class;
    }else{
	$style = ($style!='check'&&$style!='heart'&&$style!='plus'&&$style!='favorite'&&$style!='clean')?'check':$style;
	if( $style == 'clean' )
	    $style = 'contact';
	else
	    $style = $style.'_list';
    }
    return '<ul class="'.$style.'">'.do_shortcode( $content ).'</li></ul>';
}
if(function_exists('add_shortcode')){add_shortcode('item', 'ap_shortcode_item');}
function ap_shortcode_item( $atts, $content = null ) {
    global $list_item, $_tags, $shortcode_tags;
    $shortcode_tags = $_tags;
    $return = (do_shortcode($list_item)?'</li>':'').'<li>';
    $list_item=true;
    return $return;
}

/*
 * TABLE
 */
if(function_exists('add_shortcode')){add_shortcode('table', 'ap_shortcode_table');}
function ap_shortcode_table( $atts, $content = null ) {
    global $_tags, $shortcode_tags;
    $shortcode_tags = $_tags;
    return '<table>'.do_shortcode_by_tags( $content, array('row') ).'</table>';
}
if(function_exists('add_shortcode')){add_shortcode('row', 'ap_shortcode_row');}
function ap_shortcode_row( $atts, $content = null ) {
    global $_tags, $shortcode_tags;
    $shortcode_tags = $_tags;
    if( is_array($attr) ){
    foreach( $attr as $k => $v ){
	$_attr .= ' '.$k.'="'.$v.'"';
    }}
    return '<tr'.$_attr.'>'.do_shortcode_by_tags( $content, array('head', 'cell') ).'</tr>';
}
if(function_exists('add_shortcode')){add_shortcode('head', 'ap_shortcode_head');}
function ap_shortcode_head( $atts, $content = null ) {
    global $_tags, $shortcode_tags;
    $shortcode_tags = $_tags;
    if( is_array($attr) ){
    foreach( $attr as $k => $v ){
	$_attr .= ' '.$k.'="'.$v.'"';
    }}
    return '<th'.$_attr.'>'.do_shortcode($content).'</th>';
}
if(function_exists('add_shortcode')){add_shortcode('cell', 'ap_shortcode_cell');}
function ap_shortcode_cell( $atts, $content = null ) {
    global $_tags, $shortcode_tags;
    $shortcode_tags = $_tags;
    if( is_array($attr) ){
    foreach( $attr as $k => $v ){
	$_attr .= ' '.$k.'="'.$v.'"';
    }}
    return '<td'.$_attr.'>'.do_shortcode($content).'</td>';
}

/*
 * TABS
 */
$_panes = array();
$_pane = 0;
if(function_exists('add_shortcode')){add_shortcode('tabs', 'ap_shortcode_tabs');}
function ap_shortcode_tabs( $atts, $content = null ) {
    global $_panes, $_pane;
    $_panes = array();
    $_pane = 0;
    $return = '';
    do_shortcode_by_tags($content, array('tabpane'));
    $return .= '<ul class="tabs">';
    foreach( $_panes as $num => $pane ){
	$return .= '<li><a href="">'.$pane['title'].'</a></li>';
    }
    $return .= '</ul><div class="panes">';
    foreach( $_panes as $num => $pane ){
	$return .= '<div>'.do_shortcode($pane['content']).'</div>';
    }
    $return .= '</div><div class="clear"></div>';
    return $return;
}
if(function_exists('add_shortcode')){add_shortcode('tabpane', 'ap_shortcode_tabpane');}
function ap_shortcode_tabpane( $atts, $content = null ) {
    global $_panes, $_pane, $_tags, $shortcode_tags;
    $shortcode_tags = $_tags;
    extract(shortcode_atts(array('title' => ''), $atts));
    $_panes[$_pane]['title']=$title;
    $_panes[$_pane]['content']=$content;
    $_pane++;
}

if(function_exists('add_shortcode')){add_shortcode('accordion', 'ap_shortcode_accordion');}
function ap_shortcode_accordion( $atts, $content = null ) {
    global $_pane;
    $_pane = 0;
    return '<div class="accordion">'.do_shortcode_by_tags($content, array('accpane')).'</div>';
}
if(function_exists('add_shortcode')){add_shortcode('accpane', 'ap_shortcode_accpane');}
function ap_shortcode_accpane( $atts, $content = null ){
    global $_pane, $_tags, $shortcode_tags;
    $shortcode_tags = $_tags;
    $_pane++;
    extract(shortcode_atts(array('title' => ''), $atts));
    return '<h3'.($_pane==1?' class="current"':'').'>'.$title.'</h3><div class="pane"'.($_pane==1?' style="display:block"':'').'>'.do_shortcode($content).'</div>';
}

/*
 * COLUMN LAYOUT
 */
// one half
if(function_exists('add_shortcode')){add_shortcode('one_half', 'ap_shortcode_one_half');}
$ap_shortcodes['one_half'] = array( 'type'=>'c', 'title'=>'One half column', 'attr'=>array( 
    'last'=>array('type'=>'custom', 'title'=>'Last Column'),
    'fancybox'=>array('type'=>'radio', 'title'=>'Fancybox Style', 'def'=>'false', 'opt'=>array('true'=>'Yes', 'false'=>'No')) ) );
function ap_shortcode_one_half( $atts, $content = null ) {
    global $sidebar_id;
    extract(shortcode_atts(array('fancybox' => 'false'), $atts));
    $fancybox_s = $fancybox=='true'?'<div class="clearfix team_box">':'';
    $fancybox_e = $fancybox=='true'?'</div>':'';
    $grid = !empty($sidebar_id) && $sidebar_id!= 'none' ? '1-2' : '6';
    return '<div class="grid_'.$grid.' column">'.$fancybox_s.do_shortcode($content).$fancybox_e.'</div>';
}
if(function_exists('add_shortcode')){add_shortcode('one_half_last', 'ap_shortcode_one_half_last');}
function ap_shortcode_one_half_last( $atts, $content = null ) {
    global $sidebar_id;
    extract(shortcode_atts(array('fancybox' => 'false'), $atts));
    $fancybox_s = $fancybox=='true'?'<div class="clearfix team_box">':'';
    $fancybox_e = $fancybox=='true'?'</div>':'';
    $grid = !empty($sidebar_id) && $sidebar_id!= 'none' ? '1-2' : '6';
    return '<div class="grid_'.$grid.' column-last">'.$fancybox_s.do_shortcode($content).$fancybox_e.'</div><div class="clear"></div>';
}
// one third
if(function_exists('add_shortcode')){add_shortcode('one_third', 'ap_shortcode_one_third');}
$ap_shortcodes['one_third'] = array( 'type'=>'c', 'title'=>'One third column', 'attr'=>array(
    'last'=>array('type'=>'custom', 'title'=>'Last Column'),
    'fancybox'=>array('type'=>'radio', 'title'=>'Fancybox Style', 'def'=>'false', 'opt'=>array('true'=>'Yes', 'false'=>'No')) ) );
function ap_shortcode_one_third( $atts, $content = null ) {
    global $sidebar_id;
    extract(shortcode_atts(array('fancybox' => 'false'), $atts));
    $fancybox_s = $fancybox=='true'?'<div class="clearfix team_box">':'';
    $fancybox_e = $fancybox=='true'?'</div>':'';
    $grid = !empty($sidebar_id) && $sidebar_id!= 'none' ? '1-3' : '4';
    return '<div class="grid_'.$grid.' column">'.$fancybox_s.do_shortcode($content).$fancybox_e.'</div>';
}
if(function_exists('add_shortcode')){add_shortcode('one_third_last', 'ap_shortcode_one_third_last');}
function ap_shortcode_one_third_last( $atts, $content = null ) {
    global $sidebar_id;
    extract(shortcode_atts(array('fancybox' => 'false'), $atts));
    $fancybox_s = $fancybox=='true'?'<div class="clearfix team_box">':'';
    $fancybox_e = $fancybox=='true'?'</div>':'';
    $grid = !empty($sidebar_id) && $sidebar_id!= 'none' ? '1-3' : '4';
    return '<div class="grid_'.$grid.' column-last">'.$fancybox_s.do_shortcode($content).$fancybox_e.'</div><div class="clear"></div>';
}
// two third
if(function_exists('add_shortcode')){add_shortcode('two_third', 'ap_shortcode_two_third');}
$ap_shortcodes['two_third'] = array( 'type'=>'c', 'title'=>'Two third column', 'attr'=>array(
    'last'=>array('type'=>'custom', 'title'=>'Last Column'),
    'fancybox'=>array('type'=>'radio', 'title'=>'Fancybox Style', 'def'=>'false', 'opt'=>array('true'=>'Yes', 'false'=>'No')) ) );
function ap_shortcode_two_third( $atts, $content = null ) {
    global $sidebar_id;
    extract(shortcode_atts(array('fancybox' => 'false'), $atts));
    $fancybox_s = $fancybox=='true'?'<div class="clearfix team_box">':'';
    $fancybox_e = $fancybox=='true'?'</div>':'';
    $grid = !empty($sidebar_id) && $sidebar_id!= 'none' ? '2-3' : '8';
    return '<div class="grid_'.$grid.' column">'.$fancybox_s.do_shortcode($content).$fancybox_e.'</div>';
}
if(function_exists('add_shortcode')){add_shortcode('two_third_last', 'ap_shortcode_two_third_last');}
function ap_shortcode_two_third_last( $atts, $content = null ) {
    global $sidebar_id;
    extract(shortcode_atts(array('fancybox' => 'false'), $atts));
    $fancybox_s = $fancybox=='true'?'<div class="clearfix team_box">':'';
    $fancybox_e = $fancybox=='true'?'</div>':'';
    $grid = !empty($sidebar_id) && $sidebar_id!= 'none' ? '2-3' : '8';
    return '<div class="grid_'.$grid.' column-last">'.$fancybox_s.do_shortcode($content).$fancybox_e.'</div><div class="clear"></div>';
}
// one fourth
if(function_exists('add_shortcode')){add_shortcode('one_fourth', 'ap_shortcode_one_fourth');}
$ap_shortcodes['one_fourth'] = array( 'type'=>'c', 'title'=>'One fourth column', 'attr'=>array(
    'last'=>array('type'=>'custom', 'title'=>'Last Column'),
    'fancybox'=>array('type'=>'radio', 'title'=>'Fancybox Style', 'def'=>'false', 'opt'=>array('true'=>'Yes', 'false'=>'No')) ) );
function ap_shortcode_one_fourth( $atts, $content = null ) {
    global $sidebar_id;
    extract(shortcode_atts(array('fancybox' => 'false'), $atts));
    $fancybox_s = $fancybox=='true'?'<div class="clearfix team_box">':'';
    $fancybox_e = $fancybox=='true'?'</div>':'';
    $grid = !empty($sidebar_id) && $sidebar_id!= 'none' ? '1-4' : '3';
    return '<div class="grid_'.$grid.' column">'.$fancybox_s.do_shortcode($content).$fancybox_e.'</div>';
}
if(function_exists('add_shortcode')){add_shortcode('one_fourth_last', 'ap_shortcode_one_fourth_last');}
function ap_shortcode_one_fourth_last( $atts, $content = null ) {
    global $sidebar_id;
    extract(shortcode_atts(array('fancybox' => 'false'), $atts));
    $fancybox_s = $fancybox=='true'?'<div class="clearfix team_box">':'';
    $fancybox_e = $fancybox=='true'?'</div>':'';
    $grid = !empty($sidebar_id) && $sidebar_id!= 'none' ? '1-4' : '3';
    return '<div class="grid_'.$grid.' column-last">'.$fancybox_s.do_shortcode($content).$fancybox_e.'</div><div class="clear"></div>';
}
// three fourth
if(function_exists('add_shortcode')){add_shortcode('three_fourth', 'ap_shortcode_three_fourth');}
$ap_shortcodes['three_fourth'] = array( 'type'=>'c', 'title'=>'Three fourth column', 'attr'=>array(
    'last'=>array('type'=>'custom', 'title'=>'Last Column'),
    'fancybox'=>array('type'=>'radio', 'title'=>'Fancybox Style', 'def'=>'false', 'opt'=>array('true'=>'Yes', 'false'=>'No')) ) );
function ap_shortcode_three_fourth( $atts, $content = null ) {
    global $sidebar_id;
    extract(shortcode_atts(array('fancybox' => 'false'), $atts));
    $fancybox_s = $fancybox=='true'?'<div class="clearfix team_box">':'';
    $fancybox_e = $fancybox=='true'?'</div>':'';
    $grid = !empty($sidebar_id) && $sidebar_id!= 'none' ? '3-4' : '9';
    return '<div class="grid_'.$grid.' column">'.$fancybox_s.do_shortcode($content).$fancybox_e.'</div>';
}
if(function_exists('add_shortcode')){add_shortcode('three_fourth_last', 'ap_shortcode_three_fourth_last');}
function ap_shortcode_three_fourth_last( $atts, $content = null ) {
    global $sidebar_id;
    extract(shortcode_atts(array('fancybox' => 'false'), $atts));
    $fancybox_s = $fancybox=='true'?'<div class="clearfix team_box">':'';
    $fancybox_e = $fancybox=='true'?'</div>':'';
    $grid = !empty($sidebar_id) && $sidebar_id!= 'none' ? '3-4' : '9';
    return '<div class="grid_'.$grid.' column-last">'.$fancybox_s.do_shortcode($content).$fancybox_e.'</div><div class="clear"></div>';
}
/*
 * FLOATING
 */
if(function_exists('add_shortcode')){add_shortcode('float_right', 'ap_shortcode_float_right');}
function ap_shortcode_float_right( $atts, $content = null ){
    extract(shortcode_atts(array('clear' => 'true'), $atts));
    return '<span class="right">'.do_shortcode($content).'</span>'.($clear=='true'?'<span class="clear"></span>':'');
}
if(function_exists('add_shortcode')){add_shortcode('float_left', 'ap_shortcode_float_left');}
function ap_shortcode_float_left( $atts, $content = null ){
    extract(shortcode_atts(array('clear' => 'true'), $atts));
    return '<span class="left">'.do_shortcode($content).'</span>'.($clear=='true'?'<span class="clear"></span>':'');
}
if(function_exists('add_shortcode')){add_shortcode('clear', 'ap_shortcode_clear');}
function ap_shortcode_clear(){
    return '<span class="clear"></span>';
}

/*
 * IMAGE
 */
if(function_exists('add_shortcode')){add_shortcode('img', 'ap_shortcode_img');}
$ap_shortcodes['img'] = array( 'type'=>'e', 'title'=>'Image', 'clabel'=>'Image Url', 'attr'=>array(
    'style'=>array('type'=>'radio', 'title'=>'Style', 'def'=>'normal', 'opt'=>array('normal'=>'Normal', 'frame'=>'Frame', 'shadow'=>'Shadow', 'fancybox'=>'Fancybox')),
    'caption'=>array('type'=>'textarea', 'title'=>'Caption', 'desc'=>'Some caption text shown below the image.'),
    'prettylink'=>array('type'=>'text', 'title'=>'Prettylink', 'desc'=>'Enter an image or video url, which will be opened in prettybox.'),
    'prettygallery'=>array('type'=>'text', 'title'=>'Galleryname', 'desc'=>'Enter a name to group several images in a gallery.'),
    'alt'=>array('type'=>'text', 'title'=>'Alt', 'desc'=>'Alternative text for the alt attribute of the image.'),
    'align'=>array('type'=>'radio', 'title'=>'Align', 'def'=>'middle', 'opt'=>array('left'=>'Left', 'middle'=>'Middle', 'right'=>'Right') )
    ) );
function ap_shortcode_img($atts, $content = null) {
    extract(shortcode_atts(array(
	'style' => 'normal',
	'caption' => '',
	'prettylink' => '',
	'prettygallery' => 'false',
	'alt' => '',
	'align' => 'middle',
    ), $atts));
    $class_i = $class_s = '';
    switch( $style ){
	CASE 'fancybox': $class_s.='wp-caption'; break;
	CASE 'frame': $class_i=' class="frame"'; break;
	CASE 'shadow': $class_i=' class="shadow"'; break;
    }
    switch( $align ){
	CASE 'left': $class_s.=' alignleft'; break;
	CASE 'right': $class_s.=' alignright'; break;
	CASE 'middle':
	DEFAULT: $class_s.=' aligncenter'; break;
    }
    $link_e = $link_s = '';
    if( !empty($prettylink) ){
	$link_s = '<a href="'.$prettylink.'" class="zoom" data-rel="prettyPhoto'.($prettygallery!='false'?'['.$prettygallery.']':'').'" title="'.$caption.'">';
	$link_e = '</a>';
    }
    if( !empty($caption) ){
	$caption = '<p><span class="wp-caption-text">'.$caption.'</span></p>';
    }
    $return = '
	<div class="'.$class_s.'">'.
	    $link_s.'
		<img src="'.$content.'" alt="'.$alt.'"'.$class_i.' />'.
	    $link_e.$caption.'
	</div>';
    return $return;
}
/*
 * VIMEO
 */
if(function_exists('add_shortcode')){add_shortcode('video_vimeo', 'ap_shortcode_video_vimeo');}
$ap_shortcodes['video_vimeo'] = array( 'type'=>'m', 'title'=>'Video Vimeo', 'attr'=>array(
    'videoid'=>array('type'=>'custom', 'desc'=>'Enter the video id.' ),
    'width'=>array('type'=>'text', 'title'=>'Width', 'def'=>'626', 'desc'=>'Enter width in px.' ),
    'height'=>array('type'=>'text', 'title'=>'Height', 'def'=>'386', 'desc'=>'Enter height in px.' ) ) );
function ap_shortcode_video_vimeo($atts, $content = null) {
    extract(shortcode_atts(array(
	'width' => '626',
	'height' => '386'
    ), $atts));
    $options='';
    if( !empty($atts) ){
	foreach( $atts as $att => $val ){
	    if( $att != 'width' && $att != 'height' )
		$options .= "$att=$val&";
    }	}
    return str_replace('&','&amp;','<iframe src="http://player.vimeo.com/video/'.$content.'?'.$options.'" width="'.$width.'" height="'.$height.'" style="border:none" frameborder="0"></iframe>');
}
/*
 * YOUTUBE
 */
if(function_exists('add_shortcode')){add_shortcode('video_youtube', 'ap_shortcode_video_youtube');}
$ap_shortcodes['video_youtube'] = array( 'type'=>'m', 'title'=>'Video Youtube', 'attr'=>array(
    'videoid'=>array('type'=>'custom', 'desc'=>'Enter the video id.' ),
    'width'=>array('type'=>'text', 'title'=>'Width', 'def'=>'626', 'desc'=>'Enter width in px.' ),
    'height'=>array('type'=>'text', 'title'=>'Height', 'def'=>'386', 'desc'=>'Enter height in px.' ) ) );
function ap_shortcode_video_youtube($atts, $content = null) {
    extract(shortcode_atts(array(
	'width' => '626',
	'height' => '386',
	'wmode' => 'Opaque'
    ), $atts));
    $options='';
    if( !empty($atts) ){
	foreach( $atts as $att => $val ){
	    if( $att != 'width' && $att != 'height' && $att != 'wmode' )
		$options .= "$att=$val&";
    }	}
    return str_replace('&','&amp;','<iframe style="width:'.$width.'px; height:'.$height.'px;" src="http://www.youtube.com/embed/'.$content.'?'.$options.'&wmode='.$wmode.'" style="border:none" frameborder="0"></iframe>');
}

/*
 * WP GALLERY
 */
if(function_exists('add_shortcode')){add_shortcode('gallery', 'ap_shortcode_gallery');}
function ap_shortcode_gallery($attr) {
	global $post, $wp_locale, $sidebar_id;

	static $instance = 0;
	$instance++;

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
	), $attr));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$include = preg_replace( '/[^0-9,]+/', '', $include );
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;

	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$gal_width = !empty($sidebar_id) && $sidebar_id!='none' ? 462 : 626;
	$gallery_style = $gallery_div = '';
	if ( apply_filters( 'use_default_gallery_style', true ) )
		$gallery_style = "
		<style type='text/css'>
		    #{$selector} {
		        margin: 0 auto;
		        width: {$gal_width}px;
		    }
		    #{$selector} .gallery-item {
		        float: {$float};
		        width: {$itemwidth}%;
		    }
		</style>
		<!-- see gallery_shortcode() in wp-includes/media.php -->";
	$size_class = sanitize_html_class( $size );
	$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {

		$link = ( ( isset($attr['link']) && 'file' == $attr['link'] ) ? ('<a href="'.wp_get_attachment_url($id).'" title="'. wptexturize(htmlspecialchars($attachment->post_excerpt)) .'" class="zoom" data-rel="prettyPhoto[gallery]">'.wp_get_attachment_image( $id, $size, false, false ).'</a>') : wp_get_attachment_link($id, $size, true, false) );

		$output .= "<{$itemtag} class='gallery-item'>";
		$output .= "
			<{$icontag} class='gallery-icon'>
				$link
			</{$icontag}>";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
				<{$captiontag} class='wp-caption-text gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
				</{$captiontag}>";
		}
		$output .= "</{$itemtag}>";
		if ( $columns > 0 && ++$i % $columns == 0 )
			$output .= '<br style="clear: both" />';
	}

	$output .= "
			<br style='clear: both;' />
		</div>\n";

	return $output;
}

/*
 * WP GALLERY
 */
if(function_exists('add_shortcode')){add_shortcode('wp_caption', 'ap_img_caption_shortcode');}
if(function_exists('add_shortcode')){add_shortcode('caption', 'ap_img_caption_shortcode');}
function ap_img_caption_shortcode($attr, $content = null) {
    global $sidebar_id;
	// Allow plugins/themes to override the default caption template.
	//$output = apply_filters('img_caption_shortcode', '', $attr, $content);
	if ( $output != '' )
		return $output;

	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> 'alignnone',
		'width'	=> '',
		'caption' => ''
	), $attr));

	$content = str_replace( '<a ', '<a class="zoom" data-rel="prettyPhoto" title="'.htmlspecialchars($caption).'" ', $content);
	
	if ( 1 > (int) $width || empty($caption) )
		return $content;

	if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
	//width: ' . (10 + (int) $width) . 'px
	return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width:'.$width.'px; max-width:'.(!empty($sidebar_id)&&$sidebar_id!='none'?'432':'596').'px;">'
	. do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}

/****************************************
 * shortcode function with limited tags *
 ****************************************/
global $shortcode_tags, $_tags;
$_tags = $shortcode_tags;
function do_shortcode_by_tags( $content, $tags = array() ){
    global $shortcode_tags, $allowed_tags, $_tags;
    $allowed_tags = $tags;
    foreach ($_tags as $tag => $callback) {
	if ( !in_array( $tag, $allowed_tags ) )
            unset( $shortcode_tags[$tag] );
    }
    $shortcoded = do_shortcode($content);
    $shortcode_tags = $_tags;
    return $shortcoded;
}
?>