<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head>
<meta http-equiv="Content-Type"
	content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title>
<?php if (is_home() || is_front_page()) {
	if(pex_text('_seo_home_title')){
		echo pex_text('_seo_home_title').' '.get_opt('_seo_serapartor').' ';
	}
	echo bloginfo('name');
} elseif (is_category()) {
	echo pex_text('_seo_category_title'); wp_title('&laquo; '.get_opt('_seo_serapartor').' ', TRUE, 'right');
	echo bloginfo('name');
} elseif (is_tag()) {
	echo pex_text('_seo_tag_title'); wp_title('&laquo; '.get_opt('_seo_serapartor').' ', TRUE, 'right');
	echo bloginfo('name');
} elseif (is_search()) {
	echo pex_text('_search_tag_title');
	echo the_search_query();
	echo '&laquo; '.get_opt('_seo_serapartor').' ';
	echo bloginfo('name');
} elseif (is_404()) {
	echo '404 '; wp_title(' '.get_opt('_seo_serapartor').' ', TRUE, 'right');
	echo bloginfo('name');
} else {
	echo wp_title(' '.get_opt('_seo_serapartor').' ', TRUE, 'right');
	echo bloginfo('name');
} ?>
</title>

<!-- Description meta-->
<meta name="description" content="<?php if ((is_home() || is_front_page()) && get_opt('_seo_description')) { echo (get_opt('_seo_description')); }else{ bloginfo('description');}?>" />

<?php if(get_opt('_seo_keywords')){ ?>
<!-- Keywords-->
<meta name="keywords" content="<?php echo get_opt('_seo_keywords'); ?>" />
<?php } ?>

<?php 
//remove SEO indexation and following for the selected archives pages
if(is_archive() || is_search()){
	$pages=pex_get_multiopt('_seo_indexation');
	if((is_category() && in_array('category', $pages))
	|| (is_author() && in_array('author', $pages))
	|| (is_tag() && in_array('tag', $pages))
	|| (is_date() && in_array('date', $pages))
	|| (is_search() && in_array('search', $pages))){ ?>
	<!-- Disallow contain indexation on this page to remove duplicate content problems -->
	<meta name="googlebot" content="noindex,nofollow" />
	<meta name="robots" content="noindex,nofollow" />
	<meta name="msnbot" content="noindex,nofollow" />
	<?php }
}
?>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/nivo-slider.css" type="text/css" media="screen" charset="utf-8" />

<!--Google fonts-->
<?php if(get_opt('_enable_google_fonts')!='off'){
$fonts=pexeto_get_google_fonts();
foreach($fonts as $font){
	?>
<link href='<?php echo $font; ?>' rel='stylesheet' type='text/css' />
<?php }
}
?>


<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/cssLoader.php" type="text/css" media="screen" charset="utf-8" />
	
<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_opt('_favicon'); ?>" />


<?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/script/script.js"></script>

<?php 
$enable_cufon=get_opt('_enable_cufon');
if($enable_cufon=='on'){
if(get_opt('_custom_cufon_font')!=''){
	$font_file=get_opt('_custom_cufon_font');
}else{
	$font_file=get_template_directory_uri().'/script/fonts/'.get_opt('_cufon_font');
}
?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/script/cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo $font_file; ?>"></script>
<?php 
}
?>

<script type="text/javascript">
pexetoSite.ajaxurl="<?php echo admin_url('admin-ajax.php'); ?>";
pexetoSite.enableCufon="<?php echo $enable_cufon; ?>";
jQuery(document).ready(function($){
	pexetoSite.initSite();
});
</script>

<?php if (is_page_template('template-portfolio.php')) { 
//load the scripts for the portfolio template
	?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/script/portfolio-previewer.js"></script>
<?php } ?>

<?php if (is_page_template('template-portfolio-gallery.php')) { 
//load the scripts for the portfolio gallery template
	?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/script/portfolio-setter.js"></script>
<?php } ?>
	
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<!-- enables nested comments in WP 2.7 -->


<!--[if lte IE 6]>
<link href="<?php echo get_template_directory_uri(); ?>/css/style_ie6.css" rel="stylesheet" type="text/css" /> 
<![endif]-->
<!--[if IE 7]>
<link href="<?php echo get_template_directory_uri(); ?>/css/style_ie7.css" rel="stylesheet" type="text/css" />  
<![endif]-->

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>


</head>
<body>
<div id="main-container">

<div id="line-top"></div>
<div class="center" >
<!--HEADER -->
  <div id="header"  >
<div id="logo-container"><a href="<?php echo home_url(); ?>"></a></div>
 <div id="menu-container">
                    <div id="menu">
<?php wp_nav_menu(array('theme_location' => 'pexeto_main_menu' )); ?>

                  </div>
                </div>
         <div class="clear"></div>     
             