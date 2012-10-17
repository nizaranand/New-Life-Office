<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php storeinfo('html_type'); ?>; charset=<?php storeinfo('charset'); ?>" />

<title><?php if(WPOSC_MODE == 'SYMBIOSIS') { ?><?php bloginfo('name'); ?> &raquo; <?php } ?><?php storeinfo('name'); ?> &raquo;	<?php 
if ( (is_category()) ||  ( is_products() ) ) { the_category(); } 
else if ( is_tag()) { the_tag(); } 
else { the_title(); } 
?></title>

<link rel="alternate" type="application/rss+xml" title="<?php storeinfo('name'); ?> RSS Feed" href="<?php storeinfo('rss2_url'); ?>" />

<link rel="stylesheet" href="<?php storeinfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<style type="text/css" media="screen">
	#page { background: url("<?php storeinfo('stylesheet_directory'); ?>/images/kubrickbg-<?php storeinfo('text_direction'); ?>.jpg") repeat-y top; border: none; }
</style>

<?php osc_head(); ?>

</head>
<body>
<!--<div id="page">
<div id="header">
		<?php $osCsid=$_REQUEST["osCsid"];?>
	<img src="https://ssl37.pair.com/inksp3c1/aspenwoodpublishing/shop/themes/default/images/kubrickheader.jpg" width="760" height="200" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="288,55,489,158" href="http://www.aspenwoodpublishing.com/index.php?osCsid=<?=$osCsid;?>" />

	<div id="headerimg">

		<?php if(WPOSC_MODE == 'SYMBIOSIS') { ?>
		<h1><!--<a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a>--></h1>
		
		<div class="description"><?php bloginfo('description'); ?></div>
	<?php } else { ?>
		<h1><!--<a href="<?php storeinfo('url'); ?>"><?php storeinfo('name'); ?></a>--></h1>
	<?php } ?>
	</div>
</div>
<hr />-->
<div id="wholecontent_1">

<div id="wholecontent">
<div id="page">

<div id="header_b">
<div id="header">
	<div id="headerimg">
	<h1><a href="<?php echo get_option('home'); ?>/"><img src="<?php bloginfo('stylesheet_directory');?>/images/logo.jpg"  /></a></h1>
	
	<div class="description">
	<div id="header-right">
	<a href="">Shopping Cart</a>
	</div>
	</div>
	</div>
</div>
</div>
