<?php
 /*
Template Name: Salt Lake City
*/ 
?>

<?php include("landingheader.php"); ?>
<?php


$_SESSION['boise'] = false; 
$_SESSION['SLC'] = true;
$_SESSION['vegas'] = false; 

?>
<div id="header">
	<div id="headerimg">
	<a href="http://www.newlifeoffice.com/"><img src="<?php bloginfo('stylesheet_directory');?>/images/landing/landing_logo.png"/></a>
     <div id="headtext">
	<h1>New Life Office</h1>
    <h2>1050 S State St<br />
	Salt Lake City, UT 84111</h2>
	<h2>801-359-7257</h2>
    </div>
    </div>
   <?php include("landingContent.php"); ?>

    <div id="location">
    <h1>Showroom Location</h1>
    <br />
     <div id="map">
   <iframe width="400" height="250" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="http://maps.google.com/maps/ms?client=safari&amp;oe=UTF-8&amp;ie=UTF8&amp;hl=en&amp;msa=0&amp;msid=202096012779243528890.000495b498e82272f1669&amp;source=embed&amp;t=p&amp;ll=40.769654,-111.94768&amp;spn=0.014626,0.021415&amp;z=15&amp;output=embed"></iframe><br /><small>View <a href="http://maps.google.com/maps/ms?client=safari&amp;oe=UTF-8&amp;ie=UTF8&amp;hl=en&amp;msa=0&amp;msid=202096012779243528890.000495b498e82272f1669&amp;source=embed&amp;t=p&amp;ll=40.769654,-111.94768&amp;spn=0.014626,0.021415&amp;z=15" style="color:#0000FF;text-align:left">Salt Lake Office</a> in a larger map</small></div>
   <div id="locphoto"><img src="<?php bloginfo('stylesheet_directory');?>/images/slcoffice.jpg"/></div>  
   	 </div>
    

<hr />
        <?php
get_footer();  
?>
</div>
		
