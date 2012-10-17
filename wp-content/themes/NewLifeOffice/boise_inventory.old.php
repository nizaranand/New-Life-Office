<?php

 /*
Template Name: Boise Inventory
*/ 
?>

<?php include("landingheader.php"); ?>
<div id="header">
	<div id="headerimg">
	<a href="http://www.newlifeoffice.com/"><img src="<?php bloginfo('stylesheet_directory');?>/images/landing/landing_logo.png"/></a>
     <div id="headtext">
	<h1>Boise | Office</h1>
    <h2>2926 S. Jupiter Ave<br />
	Boise ID, 83709</h2>
	<h2>(208) 321-9211</h2>
    </div>
    </div>
    <div id="rightimg">

  <?php include("headerTube.php"); ?>
  
    </div>
   
    </div>
    <div id="menu">

    <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
 
    <div class="sibebarRight">
    <div id="lasVegasProduct">
    <p>recieve email updates when we recieve new products</p>
    <?php insert_cform('BoiseProduct'); ?>
    </div>
		<?php include("youtube.php"); ?>
    </div>  
    <div id="landingbody">
    	<div class="entry">
         <h1>Used Office Furniture Currently In Stock</h1>
         <?php echo do_shortcode('[nggallery id=8 template=caption]'); ?>
    <?php if (have_posts()) : ?>
			
			<?php while (have_posts()) : the_post(); ?>
			
					<?php the_content();?>
				
		<?php endwhile; ?>
		
	<?php endif; ?>
    </div> 
    <div id="location">
    <h1>Showroom Location</h1>
    <br />
   <iframe width="400" height="250" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="http://maps.google.com/maps/ms?client=safari&amp;oe=UTF-8&amp;ie=UTF8&amp;hl=en&amp;msa=0&amp;msid=202096012779243528890.000495b498e82272f1669&amp;source=embed&amp;t=p&amp;ll=40.769654,-111.94768&amp;spn=0.014626,0.021415&amp;z=15&amp;output=embed"></iframe><br /><small>View <a href="http://maps.google.com/maps/ms?client=safari&amp;oe=UTF-8&amp;ie=UTF8&amp;hl=en&amp;msa=0&amp;msid=202096012779243528890.000495b498e82272f1669&amp;source=embed&amp;t=p&amp;ll=40.769654,-111.94768&amp;spn=0.014626,0.021415&amp;z=15" style="color:#0000FF;text-align:left">Salt Lake Office</a> in a larger map</small>
   	 </div>
    

<hr />
		
        <?php
get_footer();  
?>
</div>
		
