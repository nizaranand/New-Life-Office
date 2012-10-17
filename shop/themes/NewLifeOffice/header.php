<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php if(WPOSC_MODE == 'SYMBIOSIS') { ?><?php bloginfo('name'); ?> &raquo; <?php } ?><?php storeinfo('name'); ?> &raquo;	<?php 
if ( (is_category()) ||  ( is_products() ) ) { the_category(); } 
else if ( is_tag()) { the_tag(); } 
else { the_title(); } 
?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/layout.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/thickbox.css" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" 
href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script src="<?php bloginfo('stylesheet_directory');?>/js/expand.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/thickbox.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/expand.js"></script>




<?php osc_head(); ?>
</head>

<body>
<?
$osCsid=$_REQUEST['osCsid'];?>
<div id="wholecontent_1">

<div id="wholecontent">
<div id="page">

<div id="header_b">
<div id="header">
	<div id="headerimg">
	<h1><a href="<?php echo get_option('home'); ?>/"><img src="<?php bloginfo('stylesheet_directory');?>/images/logo.jpg"  /></a></h1>
	
	<div class="description">
	<div id="header-right">
	<a href="https://ssl37.pair.com/inksp3c1/newlifeoffice/shop/shopping_cart.php?osCsid=<?=$osCsid;?>">Shopping Cart</a>
	</div>
	</div>
	</div>
</div>
</div>

