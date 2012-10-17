<?php

 /*
Template Name: Salt Lake New
*/ 
?>

<?php include("landingheader.php"); ?>
<div id="header">
	<div id="headerimg">
	<a href="http://www.newlifeoffice.com/"><img src="<?php bloginfo('stylesheet_directory');?>/images/landing/landing_logo.png"/></a>
     <div id="headtext">
	<h1>Salt Lake City | Office</h1>
    <h2>1975 West North Temple<br />
	Salt Lake City, UT 84116</h2>
	<h2>801-359-7257</h2>
    </div>
    </div>
    <div id="rightimg">

 <?php include("headerTube.php"); ?>
    
    </div>
   
    </div>
    <div id="menu">

    <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
 
    <div class="sibebarRight">
		<?php include("youtube.php"); ?>
    </div>  
    <div id="landingbody">
    	<div class="entry">
          <h1>New Office Furniture Currently In Stock</h1>
    <?php if (have_posts()) : ?>
			
			<?php while (have_posts()) : the_post(); ?>
			
					<?php the_content();?>
				
		<?php endwhile; ?>
		
	<?php endif; ?>
    </div> 
    <div id="location">
    <h1>Showroom Location</h1>
    <br />
     <div id="map">
   <iframe width="400" height="250" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="http://maps.google.com/maps/ms?client=safari&amp;oe=UTF-8&amp;ie=UTF8&amp;hl=en&amp;msa=0&amp;msid=202096012779243528890.000495b498e82272f1669&amp;source=embed&amp;t=p&amp;ll=40.769654,-111.94768&amp;spn=0.014626,0.021415&amp;z=15&amp;output=embed"></iframe><br /><small>View <a href="http://maps.google.com/maps/ms?client=safari&amp;oe=UTF-8&amp;ie=UTF8&amp;hl=en&amp;msa=0&amp;msid=202096012779243528890.000495b498e82272f1669&amp;source=embed&amp;t=p&amp;ll=40.769654,-111.94768&amp;spn=0.014626,0.021415&amp;z=15" style="color:#0000FF;text-align:left">Salt Lake Office</a> in a larger map</small></div>
   <div id="locphoto"><a href="http://www.newlifeoffice.com/"><img src="<?php bloginfo('stylesheet_directory');?>/images/slcoffice.jpg"/></a></div>   
   	 </div>
    

<hr />
		
        <?php
get_footer();  
?>
</div>
		
