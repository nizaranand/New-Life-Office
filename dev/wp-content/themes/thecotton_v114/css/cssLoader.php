<?php header("Content-type: text/css; charset: UTF-8"); 

require_once( '../../../../wp-load.php' );

$pexeto_css = array(
'theme_skin'=>get_opt('_theme_skin'),
	'skin'=>get_opt('_skin'),
	'custom_color'=>get_opt('_custom_skin'),
	'pattern'=>get_opt('_pattern'),
	'custom_pattern'=>get_opt('_custom_pattern'),
	'body_color' => get_opt('_body_color'),
	'body_bg' => get_opt('_body_bg'),
	'body_text_size' => get_opt('_body_text_size'),
	'logo_image' => get_opt('_logo_image'),
	'logo_width' => get_opt('_logo_width'),
	'logo_height' => get_opt('_logo_height'),
	'link_color' => get_opt('_link_color'),
	'heading_color' => get_opt('_heading_color'),
	'menu_link_color' => get_opt('_menu_link_color'),
	'menu_link_hover' => get_opt('_menu_link_hover'),
	'menu_hover_bg' => get_opt('_menu_hover_bg'),
	'top_line_bg' => get_opt('_top_line_bg'),
	'boxes_color' => get_opt('_boxes_color'),
	'subtitle_color' => get_opt('_subtitle_color'),
	'comments_bg' => get_opt('_comments_bg'),
	'footer_bg' => get_opt('_footer_bg'),
	'footer_text_color' => get_opt('_footer_text_color'),
	'footer_lines_color' => get_opt('_footer_lines_color'),
	'subtitle_bg' => get_opt('_subtitle_bg'),
	'copyright_bg' => get_opt('_copyright_bg'),
	'copyright_text' => get_opt('_copyright_text_color'),
	'border_color' => get_opt('_border_color'),
	'heading_font_family'=>get_opt('_heading_font_family'),
	'body_font_family'=>get_opt('_body_font_family')
);

//if the dark style has been selected
if($pexeto_css['theme_skin']=='dark'){
	echo '/*--------- DARK STYLE ---------*/

body,#menu ul ul li a:hover{
background-color:#333333;
color:#979797;
}

#logo-container a{
background-image:url(../images/logo-dark.png);
}

hr, ul.blogroll li, .sidebar-box h4, .sidebar-box ul li, .post-info, img.img-frame, img.attachment-post_box_img, #portfolio-categories,.post, ul.commentlist li, .double-line, #intro, #page-title,#slider, #slider-navigation .items img, .latest-projects-holder .latest-project, .slider-frame, .sidebar-post-wrapper, #blog-latest .columns-wrapper, .latest-small, .showcase-item, .item-wrapper, .portfolio-item, .coment-box img, #content-container .gallery img,#footer ul li,.wp-caption  {
border-color:#474747;	
}


img.img-frame, img.attachment-post_box_img, .img-frame img, .img-wrapper, .blog-post-img img,
 #slider-navigation .items img, .slider-frame, #menu ul ul, .coment-box img, #content-container .gallery img{
	background-color:#3e3e3e;
	border-color:#555555;
}

#footer-container, #menu ul ul,#line-top{
background-color:#1f2122;	
}
.showcase-item:hover, .tabs a.current, .tabs a:hover, 
 .tabs a.current:hover, .tabs a:active, #accordion h2.current, table th , 
 table td:hover, .table-price td{
 background-color:#5a5a5a;
 }

#footer-container, input[type="text"], textarea, #content-container .wp-pagenavi a, #content-container .wp-pagenavi span.pages,
 #content-container .wp-pagenavi span.current, #content-container .wp-pagenavi span.extend, 
 .tabs,.panes, .tabs a, .tabs a.current,.tabs a:hover,.tabs a:active,.tabs li a.current:hover, 
 #accordion, #accordion .pane,#accordion h2,table td, table th, .table-title td, .pricing-table ul li{
	border-color:#161616;	
}	

input[type="text"], textarea{
background-color:#464646;

}


.double-line{
 border-bottom: 1px solid #646464;
}

#menu ul ul{
	border-left-color:#161616;
	border-right-color:#161616;
	border-bottom-color:#161616;
}

h1,h2,h3,h4,h5,h6,.sidebar-box h4,.services-box h2,.post h1, .post h1 a,
.portfolio-sidebar h4, #portfolio-categories ul li, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, 
.services-box h4, #intro h1, #page-title h1, .item-desc h4 a, .item-desc h4,
.sidebar-box ul li a,.post-date h4 ,.tabs a,.tabs .current, .tabs .current:hover, .tabs li.current a,
 .tabs a:hover, #accordion h2:hover, table th, .table-price td{
color:#d1d0d0;	
}

#accordion h2{
border-color:#464646;
}

#accordion .pane{
border-width:0px;	
}

#accordion h2.current{
	border-color:#2b2b2b;
	border-left-width:0px;
	border-right-width:0px;
}

#content-container ul.commentlist ul.children {
    background-image: url("../images/comment-bg-dark.png");
}
#slider-navigation .items img.active {
    background-color: transparent;
}

.panes,.tabs li, table, blockquote, #accordion, #accordion .pane {
background-color:#3e3e3e;
}

#left-arrow ,.latest-prev,.portfolio-prev,.nivo-prevNav{
    background: url("../images/arrows-dark.png") no-repeat scroll right top transparent;
  
}
#right-arrow,.latest-next,.portfolio-next,.nivo-nextNav {
    background: url("../images/arrows-dark.png") no-repeat scroll left top transparent;
  
}

#portfolio-big-pagination a#next-item {
    background: url("../images/single_arrows-dark.png") no-repeat scroll left top transparent;
}


#portfolio-big-pagination a#prev-item {
    background: url("../images/single_arrows-dark.png") no-repeat scroll right top transparent;
}

.img-loading,.portfolio-big-img,.portfolio-items img,.portfolio-item img,.loading-container,#sidebar #SGM,.contact-loader  {
	background-image: url(../images/ajax-loader-small-dark.gif);
}

#nivo-slider,.loading{
background-image: url(../images/ajax-loader-slider-dark.gif);
}


input.invalid[type="text"], textarea.invalid,.error-box {
    border-color:#ca1111;
}

.info-box {
	background-color:#5e91c6 ;
	border-color:#90b8e2;
	color: #ddf3fc;
}

.note-box {
	background-color: #e5d468;
	border-color: #faeea0;
	color: #fff;
}

.error-box {
	background-color: #cd3939;
	border-color: #e17f7f;
	color: #ffdede;
}

.tip-box {
	background-color: #9bb456;
	border-color: #c6e670;
	color: #ecffb9;
}';
}

//if the dark style has been selected
if($pexeto_css['theme_skin']=='grunge'){
	echo '	/*------- GRUNGE STYLE ---------*/

#logo-container a{
background-image:url(../images/logo-grunge.png);
}
#footer-container, #menu ul ul{
background-color:#f8f5f2;	
}
 #menu ul ul li a:hover,.showcase-item:hover, .tabs a.current, .tabs a:hover, .tabs a.current:hover, .tabs a:active, #accordion h2.current, table th, blockquote{
 background-color:#faf8f5;
 }

#footer-container, input[type="text"], textarea, #content-container .wp-pagenavi a, #content-container .wp-pagenavi span.pages, #content-container .wp-pagenavi span.current, #content-container .wp-pagenavi span.extend  {
	border-color:#d7cdc5;	
}	

.double-line{
border-width:0px;
background-image:url(../images/double_line_gr.png);
height:4px;
}

hr, ul.blogroll li, .sidebar-box h4, .sidebar-box ul li, .post-info, img.img-frame, img.attachment-post_box_img, #portfolio-categories,.post, ul.commentlist li, .double-line, #intro, #page-title,#slider, #slider-navigation .items img, .latest-projects-holder .latest-project, .slider-frame, .sidebar-post-wrapper, #blog-latest .columns-wrapper, .latest-small, .showcase-item, .item-wrapper, .portfolio-item, .coment-box img, #content-container .gallery img{
border-color:#D7CDC5;	
}

#intro, #page-title, ul.commentlist li{
border-top-width:0px;
background:url(../images/hr1.png) repeat-x;
}

hr, .latest-projects hr{
	background:url(../images/hr1.png) repeat-x;
	border-width:0px;
	height:1px;
}

.latest-projects-holder .latest-project,.latest-small,.portfolio-item{
	border-right-width:0px;
	background:url(../images/vr1.png) repeat-y right;
}

.latest-projects-holder .latest-project{
	border-right:1px solid transparent;
}

#blog-latest .columns-wrapper{
	border-width:0px;	
}

.post,.sidebar-post-wrapper,.sidebar-box ul li,.showcase-item,.item-wrapper,.last-item,#footer ul li,#blog-latest .columns-wrapper {
	border-bottom-width:0px;
background:url(../images/hr2.png) repeat-x bottom;
}


.latest-small-right,.last-wrapper,.sidebar-box ul ul li, ul.commentlist>li:first-child {
	background-image:none;	
}
#content-container ul.commentlist ul.children {
    background-image: url("../images/comment-bg-gr.png");
}

#menu ul ul{
	border-left-color:#D7CDC5;
	border-right-color:#D7CDC5;
	border-bottom-color:#D7CDC5;
}

body,h1,h2,h3,h4,h5,h6,.sidebar-box h4,.services-box h2,.post h1, .post h1 a,.portfolio-sidebar h4, #portfolio-categories ul li, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .services-box h4, #intro h1, #page-title h1, .item-desc h4 a, .item-desc h4,.sidebar-box ul li a,.post-date h4{
color:#6a645a;	
}

.post-info,.post-date span, #footer ul li a{
color:#847d70;	
}
.panes,.tabs li, table {
background-color:#FBFBFB;
}';
	
}


$pexeto_main_color=$pexeto_css['custom_color']==''?$pexeto_css['skin']:$pexeto_css['custom_color'];

/**--------------------------------------------------------------------*
 * SET THE BACKGROUND COLOR AND PATTERN
 *---------------------------------------------------------------------*/

if($pexeto_main_color!=''){
	$css= 'h1 a:hover,a,#footer ul li a:hover,#intro h1 a,#page-title h1 a,#portfolio-categories ul li.selected,.sidebar-box ul li a:hover,#sidebar .widget_nav_menu ul li.current-menu-item > a,#sidebar ul li.current-cat>a, #menu ul li a:hover,#menu ul li.current-menu-item>a, #menu ul li.current-menu-ancestor>a, .showcase-item span.post-info,ul.blogroll li a,#footer .widget_twitter ul li a,#footer ul.blogroll li a{color:#'.$pexeto_main_color.';}';
	$css.='.button {background-color:#'.$pexeto_main_color.';}';
	$css.='a {color:#'.$pexeto_main_color.';}';
	$css.='#menu ul ul{border-top-color:#'.$pexeto_main_color.';}';
	$css.='#slider-navigation .items img.active {border-color: #'.$pexeto_main_color.';}';
	$css.='::selection { background: #'.$pexeto_main_color.'; } ::-moz-selection { background: #'.$pexeto_main_color.'; }';
	echo $css;
}

if($pexeto_css['custom_pattern']!='' || ($pexeto_css['pattern']!='' && $pexeto_css['pattern']!='none')){
	if($pexeto_css['custom_pattern']!=''){
	$bg=$pexeto_css['custom_pattern'];
	}else{
	$bg=get_bloginfo('template_url').'/images/patterns/'.$pexeto_css['pattern'];
	}
	
	echo 'body{background-image:url('.$bg.');}';
	if($pexeto_css['theme_skin']=='grunge'){
		echo '#footer-container{background-image:url('.$bg.');}';
	}
}


if($pexeto_css['body_color']!=''){
	echo 'body, .sidebar-box ul li a,#portfolio-big-pagination a,.sidebar-box h4, #slider, .no-caps, .post-date h4, .post-date span {color:#'.$pexeto_css['body_color'].';}';
}

if($pexeto_css['body_bg']!=''){
	echo 'img.img-frame, img.attachment-post_box_img, .img-frame img, .img-wrapper, .blog-post-img img, body, #slider-navigation .items img, .slider-frame, #menu ul ul, .coment-box img {background-color:#'.$pexeto_css['body_bg'].';}';
}

if($pexeto_css['body_text_size']!=''){
	echo 'body, .sidebar,#footer ul li a,#footer{font-size:'.$pexeto_css['body_text_size'].'px;}';
}

/**--------------------------------------------------------------------*
 * SET THE LOGO
 *---------------------------------------------------------------------*/

if($pexeto_css['logo_image']!=''){
	echo "#logo-container a{background-image:url('".$pexeto_css['logo_image']."');}";
}

if($pexeto_css['logo_width']!=''){
	echo '#logo-container a{width:'.$pexeto_css['logo_width'].'px;}';
}

if($pexeto_css['logo_height']!=''){
	echo '#logo-container a, #logo-spacer{height:'.$pexeto_css['logo_height'].'px;}';
	echo '#logo-spacer{height:'.($pexeto_css['logo_height']+17).'px;}';
}

/**--------------------------------------------------------------------*
 * TEXT COLORS
 *---------------------------------------------------------------------*/

if($pexeto_css['link_color']!=''){
	echo 'a,.post-info, .post-info a{color:#'.$pexeto_css['link_color'].';}';
}

if($pexeto_css['heading_color']!=''){
	echo 'h1,h2,h3,h4,h5,h6,.sidebar-box h4,.services-box h2,.post h1, .blog-post h1 a,.portfolio-sidebar h4, #portfolio-categories ul li, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .services-box h4, #intro h1, #page-title h1, .item-desc h4 a, .item-desc h4{color:#'.$pexeto_css['heading_color'].';}';
}

if($pexeto_css['menu_link_color']!=''){
	echo '#menu ul li a{color:#'.$pexeto_css['menu_link_color'].';}';
}

if($pexeto_css['menu_link_hover']!=''){
	echo '#menu ul li a:hover{color:#'.$pexeto_css['menu_link_hover'].';}';
}

if($pexeto_css['subtitle_color']!=''){
	echo '#page-title, #content-slider, #content-slider h2{color:#'.$pexeto_css['subtitle_color'].';}';
}

if($pexeto_css['footer_text_color']!=''){
	echo '#footer,#footer ul li a,#footer ul li a:hover,#footer h4{color:#'.$pexeto_css['footer_text_color'].';}';
}

if($pexeto_css['copyright_text']!=''){
	echo '#copyrights h5, #copyrights h5 a {color:#'.$pexeto_css['copyright_text'].';}';
}

/**--------------------------------------------------------------------*
 * BACKGROUNDS
 *---------------------------------------------------------------------*/

if($pexeto_css['footer_bg']!=''){
	echo '#footer-container {background-color:#'.$pexeto_css['footer_bg'].';}';
}

if($pexeto_css['top_line_bg']!=''){
	echo '#line-top {background-color:#'.$pexeto_css['top_line_bg'].';}';
}


if($pexeto_css['menu_hover_bg']!=''){
	echo '#menu ul ul li a:hover {background-color:#'.$pexeto_css['menu_hover_bg'].';}';
}


if($pexeto_css['border_color']!=''){
	echo 'hr, ul.blogroll li, .sidebar-box h4, .sidebar-box ul li, .post-info, img.img-frame, img.attachment-post_box_img, #portfolio-categories,.post, ul.commentlist li, .double-line, #intro, #page-title,#slider, #slider-navigation .items img, .latest-projects-holder .latest-project, .slider-frame, .sidebar-post-wrapper, #blog-latest .columns-wrapper, .latest-small, .showcase-item, .item-wrapper, .portfolio-item, .coment-box img, #content-container .gallery img {border-color:#'.$pexeto_css['border_color'].';}';
}


if($pexeto_css['copyright_bg']!=''){
	echo '#copyrights {background-color:#'.$pexeto_css['copyright_bg'].';}';
}

if($pexeto_css['footer_lines_color']!=''){
	echo '#footer-line{background-color:#'.$pexeto_css['footer_lines_color'].';}';
	echo '#footer .double-line, #footer hr, #footer ul li a, #footer ul li,#footer-line, #footer-container{border-color:#'.$pexeto_css['footer_lines_color'].';}';
}

/**--------------------------------------------------------------------*
 * FONTS
 *---------------------------------------------------------------------*/

if($pexeto_css['heading_font_family']!=''){
	echo 'h1,h2,h3,h4,h5,h6,.accordion-description a,.no-caps,#content-container .wp-pagenavi,#portfolio-big-pagination,#portfolio-categories h6,#portfolio-categories ul li.selected,.table-title td,.table-price td,.table-description strong,blockquote,.info-box,.note-box,.tip-box,.error-box,tip-box,table th,.drop-caps,.tabs a,ul.blogroll li a{font-family:'.$pexeto_css['heading_font_family'].';}';
}

if($pexeto_css['body_font_family']!=''){
	echo 'body,.item-desc h4 a,.sidebar-box h4,.portfolio-sidebar h4,#footer h4,#footer h4 a{font-family:'.$pexeto_css['body_font_family'].';}';
}



/**--------------------------------------------------------------------*
 * ADDITIONAL STYLES
 *---------------------------------------------------------------------*/

if(get_opt('_additional_styles')!=''){
	echo(get_opt('_additional_styles'));
}
?>