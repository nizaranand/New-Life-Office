<?php

 /*
Template Name: Salt Lake City
*/ 
?>

<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="google-site-verification" content="AlRugGhlkCZt67YEt-PBACsEusJHpfEF7xdRB2QwUEU" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/landing.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/thickbox.css" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script src="<?php bloginfo('stylesheet_directory');?>/js/expand.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/thickbox.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/expand.js"></script>

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

</head>

<body>
<div id="wholecontent">
<div id="page">


<div id="header">
	<div id="headerimg">
	<h3><a href="http://www.newlifeoffice.com/"><img src="<?php bloginfo('stylesheet_directory');?>/images/landing/landing_logo.jpg"/></a></h3>
	<div class="description">
	</div>
    <div id="landingbody">


	<div class="menuleft">
	<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    </div>
    <?php if (have_posts()) : ?>
			
			<?php while (have_posts()) : the_post(); ?>
			
			<div id="post">			
			
			<h2>
			
			<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title();?></a>
			
			</h2>
			
				<div class="entry">
					
					<?php the_content();?>
					
				</div>		
					
			</div>	
				
		<?php endwhile; ?>

		
	<?php endif; ?>
		
    
</div>
</div>
		
