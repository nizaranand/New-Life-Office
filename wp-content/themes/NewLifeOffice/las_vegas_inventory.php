<?php
 /*
Template Name: Las Vegas Inventory
*/ 
?>

<?php include("landingheader.php"); ?>
<div id="header">
	<div id="headerimg">
	<a href="http://www.newlifeoffice.com/"><img src="<?php bloginfo('stylesheet_directory');?>/images/landing/landing_logo.png"/></a>
     <div id="headtext">
	<h1>Las Vegas | Office</h1>
    <h2>3475 West Post Road, Suite 120<br />
	Las Vegas, Nevada 89118</h2>
	<h2>(702) 212-0407</h2>
    </div>
    </div>
    <div id="rightimg">

    <?php include("headerTube.php"); ?>
    
    </div>
   
    </div>
    <div id="menu">

    <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
 </div>

    <div class="sibebarRight">
    <div id="lasVegasProduct">
    <p>recieve email updates when we recieve new products</p>
    <?php insert_cform('LasVegasProduct'); ?>
    </div>
		<?php include("youtube.php"); ?>
    </div>
    
    <div id="landingbody">
     
    	<div class="entry">
         <h1>Used Office Furniture Currently In Stock</h1>
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
  <iframe width="400" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps/ms?client=safari&amp;oe=UTF-8&amp;ie=UTF8&amp;fb=1&amp;gl=us&amp;hnear=South+Salt+Lake,+UT&amp;hl=en&amp;msa=0&amp;msid=202096012779243528890.000495b4437f0e3ad685d&amp;source=embed&amp;ll=36.069152,-115.183411&amp;spn=0.01561,0.021415&amp;t=p&amp;z=15&amp;output=embed"></iframe><br /><small>View <a href="http://maps.google.com/maps/ms?client=safari&amp;oe=UTF-8&amp;ie=UTF8&amp;fb=1&amp;gl=us&amp;hnear=South+Salt+Lake,+UT&amp;hl=en&amp;msa=0&amp;msid=202096012779243528890.000495b4437f0e3ad685d&amp;source=embed&amp;ll=36.069152,-115.183411&amp;spn=0.01561,0.021415&amp;t=p&amp;z=15" style="color:#0000FF;text-align:left">New Life Office</a> in a larger map</small></div>
  
<div id="locphoto"><a href="http://www.newlifeoffice.com/"><img src="http://www.newlifeoffice.com/wp-content/uploads/2009/06/vegas.jpg"/></a></div>   
</div>
   


		
        <?php include (TEMPLATEPATH . '/footer-LV.php'); ?>
</div>
		