<?php
  $color_a=get_option("teardrop_theme_color_a");
  $color_b=get_option("teardrop_theme_color_b");
  $color_b_text=get_option("teardrop_theme_color_b_text");
  $color_b_bhover=get_option("teardrop_theme_color_b_bhover");
  $color_b_hover=get_option("teardrop_theme_color_b_hover");
  $color_h=get_option("teardrop_theme_color_h");
  $color_h2=get_option("teardrop_theme_color_h2");
  $color_content_text=get_option("teardrop_theme_color_content_text");
  $color_hh=get_option("teardrop_theme_color_hh");
  $color_title=get_option("teardrop_theme_color_title_bg");
  $color_footer=get_option("teardrop_theme_color_footer_bg");
  $color_header=get_option("teardrop_theme_color_header_bg");
  $color_menu_bg=get_option("teardrop_theme_color_menu_bg");
  $color_menu_links=get_option("teardrop_theme_color_menu_links");
  $color_menu_links_hov=get_option("teardrop_theme_color_menu_links_hov");
  $color_body=get_option("teardrop_theme_color_body_bg");
  $color_content=get_option("teardrop_theme_color_content_bg");
  $pattern_body=get_option("teardrop_theme_pattern_body");
  $color_image_border=get_option("teardrop_theme_color_image_border");
  $color_meta=get_option("teardrop_theme_color_meta");
?>

<style type='text/css'>
  /* fonts */
  body{
    font-family: <?php echo get_option("teardrop_theme_font_content")?>;
    font-size: <?php echo get_option("teardrop_theme_font_content_size")?>px;
	color: <?php echo $color_content_text?>;
  }
  h1{font-size: <?php echo get_option("teardrop_theme_h1_size")?>px;}
  h2{font-size: <?php echo get_option("teardrop_theme_h2_size")?>px;}
  h3{font-size: <?php echo get_option("teardrop_theme_h3_size")?>px;}
  h4{font-size: <?php echo get_option("teardrop_theme_h4_size")?>px;}
  h5{font-size: <?php echo get_option("teardrop_theme_h5_size")?>px;}
  h6{font-size: <?php echo get_option("teardrop_theme_h6_size")?>px;}

  /* colors */
   body {background:url("<?php echo $turl ?>/i/patterns/<?php echo $pattern_body ?>") repeat scroll center center transparent;}
   body {background-color: <?php echo $color_body?>;}
  .header, .nav-top-wrapper .nav-top li .sub-menu {background-color: <?php echo $color_menu_bg?>;}
  .widget-bg, .widget-bg, .content-bg, .single-bg {background-color: <?php echo $color_content?>;}
  .image-small, .image-thumb, #thumb-list li img, .image-square, .image-med, .image-full, .image-blog, .image-twocol, .image-onecol, .thumbnail img, p img, .attachment-thumbnail {background-color: <?php echo $color_image_border?>;}
  .masonry-container {border-color: <?php echo $color_image_border?>;}
  .title-bg {background-color: <?php echo $color_header?>;}
  .info {background-color: <?php echo $color_meta?>;}
  .nav-top-wrapper .nav-top li a, .nav-top-wrapper .nav-top li .sub-menu li a {color: <?php echo $color_menu_links?>!important;}
  .nav-top-wrapper .nav-top li a:hover, .nav-top-wrapper .nav-top li .sub-menu li a:hover {color: <?php echo $color_menu_links_hov?>!important;}
  .read-more-a, .read-more-a:hover, .form-submit .submit, #commentform #submit, .passwordform  .submit{color:<?php echo $color_b_text?>;}
  .nav-top .sub-menu-arr{background-color: #F4F4F4;}
   a{color: <?php echo $color_a?>;}
  .nav-top .sub-menu>li>a:hover{color: <?php echo $color_a?>;}
  .nav-header-wrapper .nav-header li a:hover{color: <?php echo $color_a?>;}
  .read-more, #commentform #submit, .form-submit .submit, .article .pagenav a:hover , .pagenav a:hover, .article .pagenav a.active, .pagenav a.active, .pagenav .pages {background-color: <?php echo $color_b?>;}
  .read-more:hover, #commentform #submit:hover,.passwordform  .submit:hover, .form-submit .submit:hover {background-color:<?php echo $color_b_bhover?>;}
  .read-more-link:hover, a:hover{color:<?php echo $color_b_hover?>;}!important
  .read-more-link: {color:<?php echo $color_a?>;}
  .article .date{background-color: <?php echo $color_b?>;}
  .footer, #thumb-tray {background-color: <?php echo $color_footer?>;}
   h1, h1 a {color: <?php echo $color_h?>;text-decoration:none!important;}
   h2, h2 a {color: <?php echo $color_h2?>;text-decoration:none!important;}
   h3, h4, h5, h6, h4 a {color: <?php echo $color_hh?>;}

   /* custom css */
  <?php echo stripslashes(get_option("teardrop_theme_custom_css"))?>
</style>