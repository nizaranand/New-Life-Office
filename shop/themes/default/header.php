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
<?php $imgurl = 'https://ssl37.pair.com/inksp3c1/newlifeoffice/wp-content/themes/NewLifeOffice'; ?>
<link rel="stylesheet" href="https://ssl37.pair.com/inksp3c1/newlifeoffice/shop/themes/default/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $imgurl; ?>/layout.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $imgurl; ?>/thickbox.css" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" 
href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script src="<?php echo $imgurl;?>/js/expand.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $imgurl;?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $imgurl;?>/js/thickbox.js"></script>
<script type="text/javascript" src="<?php echo $imgurl;?>/js/expand.js"></script>
<?
$osCsid=$_REQUEST['osCsid'];?>

<?php osc_head(); ?><!-- This function is absolutely required -->
</head>
<body>

<div id="wholecontent_1">

<div id="wholecontent">
<div id="page">

<div id="header_b">
<div id="header">
	<div id="headerimg">
	<h3><a href="http://www.newlifeoffice.com/index.php?osCsid=<?=$osCsid;?>"><img src="<?php echo $imgurl; ?>/images/logo.gif" usemap="#Map" alt="Logo" />
<map name="Map" id="Map" alt="Map" ><area shape="rect" coords="478,63,574,80" href="http://www.newlifeoffice.com/?page_id=131&osCsid=<?=$osCsid;?>" alt="Area Map" /><area shape="rect" coords="477,81,548,97" href="javascript:popup('http://www.newlifeoffice.com/chat.html','pagename','300','400','center','front');" alt="Area Map" /></map></a></h3>	
	<div class="description">
	<div id="header-right">
	<a href="https://ssl37.pair.com/inksp3c1/newlifeoffice/shop/shopping_cart.php?osCsid=<?=$osCsid;?>">Shopping Cart</a><br /><br />
<a href="https://ssl37.pair.com/inksp3c1/newlifeoffice/shop/account.php?osCsid=<?=$osCsid;?>">My Account</a><br /><br />
<a href="mailto:info@newlifeoffice.com">Contact</a>
	</div>
	</div>
	</div>
</div>
</div>

<!-- end header -->