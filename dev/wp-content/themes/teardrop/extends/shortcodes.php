<?php
function teardrop_formatter($content) {
	$new_content = '';
	$pattern_full = '{(\[rubi\].*?\[/rubi\])}is';
	$pattern_contents = '{\[rubi\](.*?)\[/rubi\]}is';
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	foreach ($pieces as $piece) {
		if (preg_match($pattern_contents, $piece, $matches)) {
			$new_content .= $matches[1];
		} else {
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}

remove_filter('the_content', 'wptexturize');
remove_filter('the_content', 'wpautop');
add_filter('the_content', 'teardrop_formatter', 99);

/* ----- BASIC ----- */
function teardrop_h1( $atts, $content = null ) {
   return '<h1>' . do_shortcode($content) . '</h1>';
} add_shortcode('h1', 'teardrop_h1');

function teardrop_h2( $atts, $content = null ) {
   return '<h2>' . do_shortcode($content) . '</h2>';
} add_shortcode('h2', 'teardrop_h2');

function teardrop_h3( $atts, $content = null ) {
   return '<h3>' . do_shortcode($content) . '</h3>';
} add_shortcode('h3', 'teardrop_h3');

function teardrop_h4( $atts, $content = null ) {
   return '<h4>' . do_shortcode($content) . '</h4>';
} add_shortcode('h4', 'teardrop_h4');

function teardrop_h5( $atts, $content = null ) {
   return '<h5>' . do_shortcode($content) . '</h5>';
} add_shortcode('h5', 'teardrop_h5');

function teardrop_h6( $atts, $content = null ) {
   return '<h6>' . do_shortcode($content) . '</h6>';
} add_shortcode('h6', 'teardrop_h6');

function teardrop_hr( $atts, $content = null ) {
   return '<hr />';
} add_shortcode('hr', 'teardrop_hr');

function teardrop_li( $atts, $content = null ) {
   return '<li>'. do_shortcode($content) .'</li>';
} add_shortcode('li', 'teardrop_li');





/* ----- ALERT BOXES ----- */

function teardrop_alert_info( $atts, $content = null ) {
   return '<div class="alertBox-info"><div style="margin-bottom: 0pt;">' . do_shortcode($content) . '</div></div>';
} add_shortcode('alert-info', 'teardrop_alert_info');

function teardrop_alert_success( $atts, $content = null ) {
   return '<div class="alertBox-success"><div style="margin-bottom: 0pt;">' . do_shortcode($content) . '</div></div>';
} add_shortcode('alert-success', 'teardrop_alert_success');

function teardrop_alert_alert( $atts, $content = null ) {
   return '<div class="alertBox-alert"><div style="margin-bottom: 0pt;">' . do_shortcode($content) . '</div></div>';
} add_shortcode('alert-alert', 'teardrop_alert_alert');

function teardrop_alert_error( $atts, $content = null ) {
   return '<div class="alertBox-error"><div style="margin-bottom: 0pt;">' . do_shortcode($content) . '</div></div>';
} add_shortcode('alert-error', 'teardrop_alert_error');

function teardrop_alert_download( $atts, $content = null ) {
   return '<div class="alertBox-download"><div style="margin-bottom: 0pt;">' . do_shortcode($content) . '</div></div>';
} add_shortcode('alert-download', 'teardrop_alert_download');





/* ----- ALERT BOXES ----- */
function teardrop_highlight_red( $atts, $content = null ) {
   return '<span class="highlight-red">' . do_shortcode($content) . '</span>';
} add_shortcode('hl-red', 'teardrop_highlight_red');

function teardrop_highlight_lightred( $atts, $content = null ) {
   return '<span class="highlight-lightred">' . do_shortcode($content) . '</span>';
} add_shortcode('hl-lightred', 'teardrop_highlight_lightred');

function teardrop_highlight_yellow( $atts, $content = null ) {
   return '<span class="highlight-yellow">' . do_shortcode($content) . '</span>';
} add_shortcode('hl-yellow', 'teardrop_highlight_yellow');

function teardrop_highlight_blue( $atts, $content = null ) {
   return '<span class="highlight-blue">' . do_shortcode($content) . '</span>';
} add_shortcode('hl-blue', 'teardrop_highlight_blue');

function teardrop_highlight_green( $atts, $content = null ) {
   return '<span class="highlight-green">' . do_shortcode($content) . '</span>';
} add_shortcode('hl-green', 'teardrop_highlight_green');

function teardrop_highlight_grey( $atts, $content = null ) {
   return '<span class="highlight-grey">' . do_shortcode($content) . '</span>';
} add_shortcode('hl-grey', 'teardrop_highlight_grey');

function teardrop_highlight_black( $atts, $content = null ) {
   return '<span class="highlight-black">' . do_shortcode($content) . '</span>';
} add_shortcode('hl-black', 'teardrop_highlight_black');

function teardrop_highlight_orange( $atts, $content = null ) {
   return '<span class="highlight-orange">' . do_shortcode($content) . '</span>';
} add_shortcode('hl-orange', 'teardrop_highlight_orange');

function teardrop_highlight_pink( $atts, $content = null ) {
   return '<span class="highlight-pink">' . do_shortcode($content) . '</span>';
} add_shortcode('hl-pink', 'teardrop_highlight_pink');




/* ----- LISTS ----- */
function teardrop_check_list ( $atts, $content = null ) {
   return '<ul class="check">' . do_shortcode($content) . '</ul>';
} add_shortcode('check-list', 'teardrop_check_list');

function teardrop_error_list ( $atts, $content = null ) {
   return '<ul class="error">' . do_shortcode($content) . '</ul>';
} add_shortcode('error-list', 'teardrop_error_list');

function teardrop_info_list ( $atts, $content = null ) {
   return '<ul class="inform">' . do_shortcode($content) . '</ul>';
} add_shortcode('info-list', 'teardrop_info_list');

function teardrop_alert_list ( $atts, $content = null ) {
   return '<ul class="alert">' . do_shortcode($content) . '</ul>';
} add_shortcode('alert-list', 'teardrop_alert_list');

function teardrop_download_list ( $atts, $content = null ) {
   return '<ul class="download">' . do_shortcode($content) . '</ul>';
} add_shortcode('download-list', 'teardrop_download_list');

function teardrop_arrow_list ( $atts, $content = null ) {
   return '<ul class="arrow">' . do_shortcode($content) . '</ul>';
} add_shortcode('arrow-list', 'teardrop_arrow_list');



/* ----- COLUMN LAYOUTS ----- */

/* 6 */
function teardrop_one_sixth( $atts, $content = null ) {
   return '[rubi]<div class="one_sixth">[/rubi]' . do_shortcode($content) . '[rubi]</div>[/rubi]';
}
add_shortcode('one_sixth', 'teardrop_one_sixth');


function teardrop_one_sixth_last( $atts, $content = null ) {
   return '[rubi]<div class="one_sixth_last">[/rubi]' . do_shortcode($content) . '[rubi]</div>[/rubi]';
}
add_shortcode('one_sixth_last', 'teardrop_one_sixth_last');





/* 5 */
function teardrop_one_fifth( $atts, $content = null ) {
   return '[rubi]<div class="one_fifth">[/rubi]' . do_shortcode($content) . '[rubi]</div>[/rubi]';
}
add_shortcode('one_fifth', 'teardrop_one_fifth');


function teardrop_one_fifth_last( $atts, $content = null ) {
   return '[rubi]<div class="one_fifth_last">[/rubi]' . do_shortcode($content) . '[rubi]</div>[/rubi]';
}
add_shortcode('one_fifth_last', 'teardrop_one_fifth_last');




/* 4 */
function teardrop_one_fourth( $atts, $content = null ) {
   return '[rubi]<div class="one_fourth">[/rubi]' . do_shortcode($content) . '[rubi]</div>[/rubi]';
}
add_shortcode('one_fourth', 'teardrop_one_fourth');


function teardrop_one_fourth_last( $atts, $content = null ) {
   return '[rubi]<div class="one_fourth_last">[/rubi]' . do_shortcode($content) . '[rubi]</div>[/rubi]';
}
add_shortcode('one_fourth_last', 'teardrop_one_fourth_last');




/* 3 */
function teardrop_one_third( $atts, $content = null ) {
   return '[rubi]<div class="one_third">[/rubi]' . do_shortcode($content) . '[rubi]</div>[/rubi]';
}
add_shortcode('one_third', 'teardrop_one_third');


function teardrop_one_third_last( $atts, $content = null ) {
   return '[rubi]<div class="one_third_last">[/rubi]' . do_shortcode($content) . '[rubi]</div>[/rubi]';
}
add_shortcode('one_third_last', 'teardrop_one_third_last');




/* 2 */
function teardrop_one_half( $atts, $content = null ) {
   return '[rubi]<div class="one_half">[/rubi]' . do_shortcode($content) . '[rubi]</div>[/rubi]';
}
add_shortcode('one_half', 'teardrop_one_half');


function teardrop_one_half_last( $atts, $content = null ) {
   return '[rubi]<div class="one_half_last">[/rubi]' . do_shortcode($content) . '[rubi]</div>[/rubi]';
}
add_shortcode('one_half_last', 'teardrop_one_half_last');




/* 2/3 */
function teardrop_two_thirds( $atts, $content = null ) {
   return '[rubi]<div class="two_thirds">[/rubi]' . do_shortcode($content) . '[rubi]</div>[/rubi]';
}
add_shortcode('two_thirds', 'teardrop_two_thirds');


function teardrop_two_thirds_last( $atts, $content = null ) {
   return '[rubi]<div class="two_thirds_last">[/rubi]' . do_shortcode($content) . '[rubi]</div>[/rubi]';
}
add_shortcode('two_thirds_last', 'teardrop_two_thirds_last');




/* 3/4 */
function teardrop_three_fourth( $atts, $content = null ) {
   return '[rubi]<div class="three_fourth">[/rubi]' . do_shortcode($content) . '[rubi]</div>[/rubi]';
}
add_shortcode('three_fourth', 'teardrop_three_fourth');


function teardrop_three_fourth_last( $atts, $content = null ) {
   return '[rubi]<div class="three_fourth_last">[/rubi]' . do_shortcode($content) . '[rubi]</div>[/rubi]';
}
add_shortcode('three_fourth_last', 'teardrop_three_fourth_last');




function teardrop_shortcode_readmore($atts=null, $content = null){
  $url=$atts['url'];
  if(empty($url)) $url = get_permalink();
  $type=get_option("teardrop_theme_readmore_type");
  switch($type){
    case "link":
      return '<a class="read-more-link" href="'.$url.'">'.get_option('teardrop_theme_readmore_text').'</a>';
    case "button":
    default:
      return '<p style="margin-top:15px;display:inline-block;"><a class="read-more-a" href="'.$url.'"><span class="read-more">'.get_option('teardrop_theme_readmore_text').'</span></a></p>';
  }
} add_shortcode('read-more', 'teardrop_shortcode_readmore');

function teardrop_shortcode_button($atts=null, $content = null){
  $url=$atts['url'];
  $color=$atts['color'];
  $text=$atts['text'];
  if(empty($url)) $url = get_permalink();
  return '[rubi]<a class="button_a" href="'.$url.'"><span class="button" style="background-color:'.$color.'">'.$text.'</span></a>[/rubi]';
  }
add_shortcode('button', 'teardrop_shortcode_button');


function teardrop_shortcode_feedback_form($atts=null, $content = null){
  $email=is_array($atts) ? $atts[0] : $atts;
  if(empty($email)) $email=get_option("teardrop_theme_feedback_email");
  $form='
	<div class="feedback"><form action="" method="post">
	  [rubi]<fieldset>
        <input class="to" type="hidden" value="'.$email.'" />
		<div class="inputname"><label for="name">First Name:</label>
		<span class="required">*</span>
		<br/>
        <input class="name" type="text" value="" title="" /></div>
		<div class="inputemail"><label for="email">Email:</label>
		<span class="required">*</span>
		<br/>
        <input class="email" type="text" value="" title="" /></div>
		<div class="inputmessage"><label for="message">Message:</label>
		<span class="required">*</span>
		<br/>
        <textarea class="message" title="" rows="10" cols="120"></textarea></div>
		<p class="required-text">* Required Fields</p>
        <div class="alert"></div>
        <p class="form-submit"><input class="submit" type="submit" value="Send" /></p>
      </fieldset>
    </form>[/rubi]
	</div>
  ';
  return $form;
} add_shortcode('feedback-form', 'teardrop_shortcode_feedback_form');


function teardrop_image($atts=null, $content = null){
  $type=$atts['type']; if(empty($type)) $type='full';
  $url=$atts['url'];
  $image=$atts['src'];
  $hover=$atts['hover'];
  $classes=$atts['class'];
  $title=$atts['title'];
  $rel=$atts['rel'];
  $alt=$atts['alt'];
  $w=$atts['width'];
  $h=$atts['height'];
  $full=wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
  $resize=teardrop_resize($w,$h, $full[0]);
  $shresize=teardrop_resize($w,$h, $image);
  if(empty($title)) $title= get_the_title();
  if(empty($alt)) $alt= $title;
  if(empty($image)) $image="<img title='$title' alt='$alt' class='post-image' src='$resize'>"; else $image="<img title='$title' alt='$alt' class='post-image' src='$shresize'>";
  if(empty($rel)) $rel="";
  if(empty($url)){
    switch($type){
      case "thumb":
        global $post; $url=get_permalink($post->ID);
        break;
      default:
        $arr = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); $url=$arr[0];
        $classes.='prettyPhoto';
        break;
    }
  }else{
    if(preg_match("/\.(jpg|jpeg|png|gif|bmp)/i", $url))
      $classes.='prettyPhoto';
	if(preg_match("/iframe=/i", $url))
      $classes.='prettyPhoto';  
    if(preg_match("/\.(avi|wmv|swf|mov)/i", $url)
      || preg_match("/youtube\.com/i", $url)
      || preg_match("/vimeo\.com/i", $url)
    )
      $classes.='prettyPhoto';
  }
  if($hover) $classes.=' hover';

  return "<div class='image-$type'><div class='preload'><a class='$classes' rel='$rel' title='' href='$url'>$image<span class='hover'></span><span class='zoom'></span></a></div></div>";
} add_shortcode('image', 'teardrop_image');

function teardrop_image_mans($atts=null, $content = null){
  $type=$atts['type']; if(empty($type)) $type='mans';
  $url=$atts['url'];
  $image=$atts['src'];
  $classes=$atts['class'];
  $title=$atts['title'];
  $alt=$atts['alt'];
  $w=$atts['width'];
  $h=$atts['height'];
  $full=wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
  $resize=teardrop_resize($w,$h, $full[0]);
  $shresize=teardrop_resize($w,$h, $image);
  if(empty($title)) $title= get_the_title();
  if(empty($alt)) $alt= $title;
  if(empty($image)) $image="<img title='$title' alt='$alt' class='mans-image' src='$resize'>"; else $image="<img title='$title' alt='$alt' class='mans-image' src='$shresize'>";
  if(empty($rel)) $rel="";
  if(empty($url)){
    switch($type){
      case "thumb":
        global $post; $url=get_permalink($post->ID);
        break;
      default:
        $arr = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); $url=$arr[0];
        $classes.='prettyPhoto';
        break;
    }
  }

  return "$image";
} add_shortcode('image', 'teardrop_image_mans');

function teardrop_img($atts=null, $content = null){
  $type=$atts['type']; if(empty($type)) $type='full';
  $url=$atts['url'];
  $image=$atts['src'];
  $hover=$atts['hover'];
  $title=$atts['title'];
  $alt=$atts['alt'];
  if(empty($image)) $image=get_the_post_thumbnail($post->ID,"teardrop-$type"); else $image="<img title='$title' alt='$alt' class='attachment-full wp-post-image' src='$image'>";

  if($hover) $classes.=' hover';

  return "<div class='image-$type'><div class='preload'>$image</div></div>";
} add_shortcode('img', 'teardrop_img');


/* ----- YOUTUBE VIDEO ----- */
function youtubeVideo($atts, $content = null) {
$url=$atts['url'];
  $id=$atts['id'];
  $height=$atts['height'];
  $width=$atts['width'];
return "<div class=\"youtube-short\"><object style=\"height:$height;width:$width;\">
<param name='movie' value='http://www.youtube.com/v/$id?version=3'><param name='allowFullScreen' value='true'>
<param name='allowScriptAccess' value='always'>
<param name='wmode' value='transparent'>
<embed height=$height width=$width src='http://www.youtube.com/v/$id?version=3' type='application/x-shockwave-flash' wmode='transparent' allowfullscreen='true' allowScriptAccess='always'></object></div>";
}
add_shortcode("youtube", "youtubeVideo");


/* ----- VIMEO VIDEO ----- */
function vimeoVideo($atts, $content = null) {
$url=$atts['url'];
  $id=$atts['id'];
  $height=$atts['height'];
  $width=$atts['width'];
  return 
"<div class=\"vimeo\"><object width=\"$width\" height=\"$height\" type=\"application/x-shockwave-flash\" data=\"http://vimeo.com/moogaloop.swf?clip_id=$id&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0\">
	<param name=\"allowfullscreen\" value=\"true\" />
	<param name=\"allowscriptaccess\" value=\"always\" />
	<param name=\"wmode\" value=\"transparent\" />
	<param name=\"movie\" value=\"http://vimeo.com/moogaloop.swf?clip_id=$id&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0\" />
</object></div>";
}
add_shortcode("vimeo", "vimeoVideo");








