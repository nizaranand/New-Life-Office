<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="google-site-verification" content="AlRugGhlkCZt67YEt-PBACsEusJHpfEF7xdRB2QwUEU" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/layout.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/thickbox.css" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script src="<?php bloginfo('stylesheet_directory');?>/js/expand.js" type="text/javascript"></script>
<?php wp_enqueue_script("jquery"); ?>

<?php wp_head(); ?>

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/thickbox.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/expand.js"></script>
<!-- Location Redirect -->
<script src="https://www.google.com/jsapi?key=ABQIAAAAL_Op06NWdBJ0VjFdSW7bLxSig7DVgO4QSWdcn0ES-0v_sLYRnhTlfD4ADs5LLuJ2JtFRImkRpNoUkQ" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory');?>/js/ip_location.js" type="text/javascript"></script>

<script language='javascript' type='text/javascript'>
<!--
var popupWindow=null;
function popup(mypage,myname,w,h,pos,infocus){

if (pos == 'random')
{LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
else
{LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;}
settings='width='+ w + ',height='+ h + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=no,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';popupWindow=window.open('',myname,settings);
if(infocus=='front'){popupWindow.focus();popupWindow.location=mypage;}
if(infocus=='back'){popupWindow.blur();popupWindow.location=mypage;popupWindow.blur();}

}
// -->
</script>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
<?
if($_REQUEST['osCsid']!=""){
$_SESSION["osCsid"]=$_REQUEST['osCsid'];
$osCsid=$_SESSION["osCsid"];

}
else
{
$osCsid=$_SESSION["osCsid"];
}?>

<meta name="google-site-verification" content="6elWgWTkpKzRdJXTyzdJ28MUF6zXjxWEhIlgmTx7iMY" />

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-645362-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>

<body>
<div id='popup'><h2><a href='http://www.newlifeoffice.com/salt_lake/'>Come see the New Salt Lake Home page</a></h2>
<br />
<h2>New fetures include:</h2>
<ul>
<li>Used Products Currently in stock</li>
<li>New Product Currently in stock</li>
<li>New Chairs, Tables, Cabnets, and Desks</li>
</ul>
<br />
<p id="closePopUp"><a>Stay on current home page</a></p>
</div>
<div id='bgpopup'></div>
<div id="wholecontent_1">

<div id="wholecontent">
<div id="page">

<div id="header_b">
<div id="header">
	<div id="headerimg">
	<h3><a href="http://www.newlifeoffice.com/"><img src="<?php bloginfo('stylesheet_directory');?>/images/logo.gif" usemap="#Map" alt="Map Image" />
<map name="Map" id="Map"><area shape="rect" coords="478,63,574,80" href="<?php echo get_permalink(131); ?>?osCsid=<?=$osCsid;?>" alt="Map Area" /><area shape="rect" coords="477,81,548,97" href="javascript:popup('http://www.newlifeoffice.com/chat.html','pagename','300','400','center','front');" alt="Map Area" /></map></a></h3>

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