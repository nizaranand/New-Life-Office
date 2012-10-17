<?php

 /*
Template Name: Landing
*/ 
?>
<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="google-site-verification" content="AlRugGhlkCZt67YEt-PBACsEusJHpfEF7xdRB2QwUEU" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<?php wp_enqueue_script("jquery"); ?>

<?php wp_head(); ?>


<!-- Location Redirect -->
<script src="https://www.google.com/jsapi?key=ABQIAAAAL_Op06NWdBJ0VjFdSW7bLxSig7DVgO4QSWdcn0ES-0v_sLYRnhTlfD4ADs5LLuJ2JtFRImkRpNoUkQ" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/ip_location.js" type="text/javascript"></script>





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



</head>
<body>
<p><a href="http://www.newlifeoffice.com/used-cubicle-furniture/">If the page does does not redict in 5 seconds, please follow this link.</a></p>

</body>
</html>

