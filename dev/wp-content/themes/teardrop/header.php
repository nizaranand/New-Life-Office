<?php
  global $burl, $turl, $furl;
  $burl = home_url();
  $turl = get_template_directory_uri();
  $furl = dirname(__FILE__);
  $hfont1=get_option("teardrop_theme_font_headers1");
  $hfont2=get_option("teardrop_theme_font_headers2");
  $hfont3=get_option("teardrop_theme_font_date");
  $logo = get_option("teardrop_theme_logo_main");
  $isource = get_option("teardrop_theme_fullscreen_stream");
  $image=get_post_meta($post->ID, '_image_bg_value', true);  
  if(empty($logo)) $logo= $turl."/i/logo.png";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
  <link rel="shortcut icon" href="<?php echo get_option("teardrop_theme_favicon")?>" type="image/x-icon" />
  <link rel="icon" href="<?php echo get_option("teardrop_theme_favicon")?>" type="image/x-icon" />
  <meta http-equiv="Content-Type" content="text/html; charset=<?php echo home_url('charset')?>" />
  <title><?php wp_title('&raquo;', true, 'right'); ?> <?php echo home_url('name'); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php echo home_url('pingback_url'); ?>" />
 
  <?php
    wp_enqueue_style("style", "$turl/style.css");
    wp_deregister_script(array("jquery", "jquery-ui-core"));
    wp_enqueue_script("jquery", "$turl/js/jquery.min.js");
	wp_enqueue_script("masonry", "$turl/js/jquery.masonry.min.js");	
    wp_enqueue_script("cufon", "$turl/js/cufon-yui.js");  
	wp_enqueue_script("jqueryui", "$turl/js/jquery-ui-custom.min.js");
    wp_enqueue_script($hfont1, "$turl/js/fonts/$hfont1.font.js");
    wp_enqueue_script($hfont2, "$turl/js/fonts/$hfont2.font.js");
	wp_enqueue_script($hfont3, "$turl/js/fonts/$hfont3.font.js");
	wp_enqueue_script("tooltip", "$turl/js/tooltip.js");
	wp_enqueue_script("cufon", "$turl/js/cufon-yui.js");  
	wp_enqueue_script("supersized", "$turl/js/$isource");	
	wp_enqueue_script("prettyPhoto", "$turl/js/jquery.prettyPhoto.js");
	wp_enqueue_script("jwpplayer", "$turl/jwplayer/jwplayer.js");
	wp_enqueue_script("jplayer", "$turl/js/jplayer/jquery.jplayer.min.js");
	wp_enqueue_script("shutter", "$turl/js/supersized.shutter.min.js");	
	wp_enqueue_script("easing", "$turl/js/jquery.easing.min.js");	
    wp_head();
  ?>
  
  <?php include("$furl/css/main.css.php") ?>
  <?php include("$furl/js/main.js.php") ?>
  <?php echo stripslashes(get_option("teardrop_theme_custom_footer"))?>
  
</head>

<body <?php body_class()?> >
<?php if (get_option('teardrop_theme_fullscreen_dotted_pat')=='true') {?>
<div class="home-bg"></div>
<?php }?> 
<?php if ($video!="") :?>
<div class="video-bg">
<div id="player" style="position:fixed;"></div></div>
<?php elseif ($image!="") :?>
<div id="single-bg">
<img id="single-img" src="<?php echo $image ?>" />
</div>
<?php elseif ($isource!="supersized.flickr.js") :?>
<div id="thumb-tray" class="load-item">
<!--Arrow Navigation-->
	<a id="prevslide" class="load-item"></a>
	<a id="nextslide" class="load-item"></a>
<div id="progress-back" class="load-item">
		<div id="progress-bar"></div>
	</div>		
	</div>
<?php endif?>
<?php if ($audio!="") :?>
<div id="audio"></div>
<div id="stop_audio" class="pause"><a class="pause_bt" href="#" title="Pause audio"></a></div>
<?php endif?>
<div class="header">
<!-- start logo -->
<div  class="logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php echo $logo?>" alt="<?php bloginfo('title')?>" /></a></div>
<!-- end logo -->
<!-- start nav -->
<div class="nav-top-wrapper">
    <?php wp_nav_menu(array('echo'=>true,'container'=>'','menu'=>'nav-top','menu_class'=>'nav-top','depth'=>0, 'walker'=>new teardrop_Walker()))?>
</div>
<!-- end nav -->
</div>
<div class="main-wrapper"><div class="main">

