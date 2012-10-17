<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php storeinfo('html_type'); ?>; charset=<?php storeinfo('charset'); ?>" />
<title>
    <?php if(WPOSC_MODE == 'SYMBIOSIS') { ?>
    <?php bloginfo('name'); ?> &raquo;
    <?php } ?>
    <?php storeinfo('name'); ?>
</title>
<style type="text/css" media="screen">
@import url( <?php storeinfo('stylesheet_url'); ?> );
</style>
<?php $imgurl = 'https://ssl37.pair.com/inksp3c1/newlifeoffice/wp-content/themes/NewLifeOffice'; ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $imgurl; ; ?>/layout.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $imgurl; ; ?>/thickbox.css" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" 
href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script src="<?php echo $imgurl; ;?>/js/expand.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $imgurl; ;?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $imgurl; ;?>/js/thickbox.js"></script>
<script type="text/javascript" src="<?php echo $imgurl; ;?>/js/expand.js"></script>


<?php osc_head(); ?><!-- This function is absolutely required -->
</head>
<body>

<div id="wholecontent_1">

<div id="wholecontent">
<div id="page">

<div id="header_b">
<div id="header">
	<div id="headerimg">
	<?php if(WPOSC_MODE == 'SYMBIOSIS') { ?>
     <h1><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1>
     <?php } else { ?>
     <h1><a href="<?php storeinfo('url'); ?>"><?php storeinfo('name'); ?></a></h1>
<?php } ?>
	
	<div class="description">
	<div id="header-right">
	<a href="">Shopping Cart</a>
	</div>
	</div>
	</div>
</div>
</div>

<!-- end header -->