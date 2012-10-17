<?php 
	function custom_slidessc($atts, $content = null) {
	if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod') || strstr($_SERVER['HTTP_USER_AGENT'],'Android')){ $mobile = true; }else{ $mobile = false; }
	if(strstr($_SERVER['HTTP_USER_AGENT'],'iPad')){ $ipad = true; }else{ $ipad = false; }
	// slide_noresize = vimeo/youtube noresize mode
	// video_poster = used for vimeo/youtube/video modes
		$class = shortcode_atts( array('text_color' => '#ffffff', 'image' => '', 'video_vimeo' => '', 'video_youtube' => '', 'video_mp4' => '', 'video_ogg' => '', 'video_webm' => '', 'video_poster' => '', 'slide_desc' => '', 'slide_horizontal' => '', 'slide_fitscreen' => '', 'slide_noresize' => ''), $atts );

		if($class['slide_desc'] != ''){ $slide_desc = $class['slide_desc']; /* $slide_desc = htmlspecialchars_decode(str_replace("*", '"', $slide_desc)); */ $slide_desc = "title=\"".$slide_desc."\""; }
		if($class['text_color'] == '#ffffff'){ $text_color = 'text_white'; }else{ $text_color = 'text_black'; }
		//if($class['slide_desc'] != ''){ $slide_desc = '<div style="opacity: 1; display: block;" id="content"><div class="container_12"><div class="grid_9"><h1 class="page-title" style="margin-bottom: 25px;">'.$class['slide_desc'].'</h1></div></div>'; }
		if($class['image'] != ''){
			$image = $class['image'];
			if($class['slide_horizontal'] == 'true'){ $horizontal = 'slide_horizontal '; }else{ $horizontal = ''; }
			if($class['slide_horizontal'] == 'true' || $class['slide_fitscreen'] == 'true'){ $slide_fitscreen = 'slide_fitscreen'; }else{ $slide_fitscreen = ''; }
			return '<img class="myimage '.$text_color.' '.$horizontal.$slide_fitscreen.'" src="'.$image.'" alt="" '.$slide_desc.' />';
		}elseif(($class['video_mp4'] != '' or $class['video_ogg'] != '' or $class['video_webm'] != '') AND !$mobile){
			$video_mp4 = $class['video_mp4'];
			$video_ogg = $class['video_ogg'];
			$video_webm = $class['video_webm'];
			if($class['video_poster'] != ''){ $video_poster = "poster=\"".$class['video_poster']."\""; }else{ $video_poster = ""; }
			return '<div class="myimage myvideo '.$text_color.'" '.$slide_desc.'>'.do_shortcode('[video mp4="'.$video_mp4.'" ogg="'.$video_ogg.'" webm="'.$video_webm.'" '.$video_poster.' preload="true"]').'</div>';
		}elseif($class['video_youtube'] != '' AND !$mobile){
			$video_youtube = $class['video_youtube'];
			if($class['slide_noresize'] = 'true'){ $video_noresize = 'height="360" width="640"'; }else{ $video_noresize = 'height="100%" width="100%"'; }
			$strText = preg_replace( '/(http|ftp)+(s)?:(\/\/)((\w|\.)+)(\/)?(\S+)?/i', 'link', $video_youtube );
			if($strText == 'link'){ $array_link_explode = explode('v=', $video_youtube); $array_link_explode = explode('&', $array_link_explode[1]); $video_youtube =$array_link_explode[0]; }
			$video_poster = $class['video_poster'];
			if($video_poster != ''){
				//return '<div class="myimage myvideo myvideo_yt '.$text_color.'"  '.$slide_desc.' style="height: 100%;"><div style="height: 100%; width: 640px; margin: 0 auto; position: relative;"><embed style="position:absolute;top:0;bottom:0;margin:auto;z-index: 777777;" '.$video_noresize.' name="plugin" src="http://www.youtube.com/v/'.$video_youtube.'?version=3&amp;controls=1&amp;enablejsapi=1&amp;rel=0&amp;showinfo=0&amp;playerapiid=videoPlayer" type="application/x-shockwave-flash" wmode="opaque"></div><img src="'.$video_poster.'" alt="" style="position:absolute;" /></div>';
				return '<div class="myimage myvideo myvideo_yt '.$text_color.'"  '.$slide_desc.' style="height: 100%;"><div style="height: 100%; width: 640px; margin: 0 auto; position: relative;"><iframe class="youtube-player" style="position:absolute;top:0;bottom:0;margin:auto;z-index: 777777;" type="text/html" '.$video_noresize.' src="http://www.youtube.com/embed/'.$video_youtube.'?wmode=opaque" frameborder="0"></iframe></div><img src="'.$video_poster.'" alt="" style="position:absolute;" /></div>';
			}else if(!$ipad){ //disable fullscreen for ipad
				//return '<div class="myimage myvideo myvideo_yt '.$text_color.'" '.$slide_desc.'><embed height="100%" width="100%" name="plugin" src="http://www.youtube.com/v/'.$video_youtube.'?version=3&amp;controls=1&amp;enablejsapi=1&amp;rel=0&amp;showinfo=0&amp;playerapiid=videoPlayer" type="application/x-shockwave-flash" wmode="opaque"></div>';
				return '<div class="myimage myvideo myvideo_yt '.$text_color.'" '.$slide_desc.'><iframe class="youtube-player" type="text/html" width="100%" height="100%" src="http://www.youtube.com/embed/'.$video_youtube.'?wmode=opaque" frameborder="0"></iframe></div>';
			}
		}elseif($class['video_vimeo'] != '' AND !$mobile){
			$video_vimeo = $class['video_vimeo'];
			if($class['slide_noresize'] = 'true'){ $video_noresize = 'height="360" width="640"'; }else{ $video_noresize = 'height="100%" width="100%"'; }
			$strText = preg_replace( '/(http|ftp)+(s)?:(\/\/)((\w|\.)+)(\/)?(\S+)?/i', 'link', $video_vimeo );
			if($strText == 'link'){ $array_link_explode = explode('.com/', $video_vimeo); $video_vimeo = $array_link_explode[1]; }
			$video_poster = $class['video_poster'];
			if($video_poster != ''){
				return '<div class="myimage myvideo myvideo_yt '.$text_color.'"  '.$slide_desc.' style="height: 100%;"><div style="height: 100%; width: 640px; margin: 0 auto; position: relative;"><iframe style="bottom: 0; margin: auto; position: absolute; top: 0; z-index: 777777;" src="http://player.vimeo.com/video/'.$video_vimeo.'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" '.$video_noresize.' frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div><img src="'.$video_poster.'" alt="" style="position:absolute;" /></div>';
			}else if(!$ipad){ //disable fullscreen for ipad
				return '<div class="myimage myvideo myvideo_yt '.$text_color.'" '.$slide_desc.'><iframe src="http://player.vimeo.com/video/'.$video_vimeo.'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="100%" height="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
			}
		}else{
			//return '[slide] error: no data<br />'.$content;
			return false;
		}
	}
	add_shortcode("slide", "custom_slidessc");
?>