<?php
 /*
Template Name: Salt Lake Cubicles 6x6
*/ 
?>
<?php include("landingheader.php"); ?>
<script src="<?php bloginfo('stylesheet_directory')?>/js/landingCubicles.js" type="text/javascript"></script>
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

    </div>
        <div class="sibebarRight">
    <div id="lasVegasProduct">
    <p>recieve email updates when we recieve new products</p>
    <?php insert_cform('SaltLakeProduct'); ?>
    </div>
		<?php include("youtube.php"); ?>
    </div>  
    <div id="landingbody">
    	<div class="entry">
	<div id="page6x6">
			<h2>6x6  Office Cubicle</h2>		
					<p style="float:left;">Meet our best-selling all-purpose office cubicle that can be tailored to perfectly fit your office needs. The 6×6 accommodates any size computer, file drawers, phone stations, shelving, etc. with enough room for comfort. The two available heights accommodate privacy and openness.</p>

				<div id="cubicle_features">
					<div id="cf_img">
						<img src="<?php bloginfo('stylesheet_directory')?>/images/big_cublicles/6x6.jpg" />
						<img src="<?php bloginfo('stylesheet_directory')?>/planview/6x6/6x6_plan.jpg" />
					</div>
				<div id="benefits">
					<ul>
						<li>65" High Steelcase Acoustic Panels with choice of 4 fabric colors</li>
						<li>Locking Overhead Storage Bins with Optional Task Light</li>
						<li>24" Deep Laminate Workspaces in Cherry or Maple Finishes</li>
						<li>Locking File Pedestal</li>
						<li>4 Duplex Receptacles Per Workstation Power</li>
					</ul>
				
				</div>
		</div>
	</div>
	</div>
	<div id="cubicles">
<h1>6x6 Maximum Privacy</h1>
<div id="maximumPrivacy">
	<ul id="group">
		<li><img class="imgChange"  src="<?php bloginfo('stylesheet_directory')?>/images/2D_Layout/6x6/private/6x6-priv-4.jpg" /></li>
		<li><img class="imgChange"  src="<?php bloginfo('stylesheet_directory')?>/images/2D_Layout/6x6/private/6x6-priv-6.jpg" /></li>
		<li><img class="imgChange"  src="<?php bloginfo('stylesheet_directory')?>/images/2D_Layout/6x6/private/6x6-priv-8.jpg" /></li>
	</ul>
	<ul id="single">
		<li ><img class="imgChange" src="<?php bloginfo('stylesheet_directory')?>/images/2D_Layout/6x6/private/6x6-priv-r-2.jpg" /></li>
		<li ><img class="imgChange" src="<?php bloginfo('stylesheet_directory')?>/images/2D_Layout/6x6/private/6x6-priv-r-3.jpg" /></li>
		<li ><img class="imgChange" src="<?php bloginfo('stylesheet_directory')?>/images/2D_Layout/6x6/private/6x6-priv-r-4.jpg" /></li>
	</ul>
</div>
<h1>6X6 Open Layout</h1>
<div id="openLayout">
	<ul id="group">
		<li><img class="imgChange" src="<?php bloginfo('stylesheet_directory')?>/images/2D_Layout/6x6/open/6x6-open-4.jpg" /></li>
		<li><img class="imgChange" src="<?php bloginfo('stylesheet_directory')?>/images/2D_Layout/6x6/open/6x6-open-6.jpg" /></li>
		<li><img class="imgChange" src="<?php bloginfo('stylesheet_directory')?>/images/2D_Layout/6x6/open/6x6-open-8.jpg" /></li>
	</ul>
	<ul id="single">
		<li><img class="imgChange" src="<?php bloginfo('stylesheet_directory')?>/images/2D_Layout/6x6/open/6x6-open-r-2.jpg" /></li>
		<li><img class="imgChange" src="<?php bloginfo('stylesheet_directory')?>/images/2D_Layout/6x6/open/6x6-open-r-3.jpg" /></li>
		<li><img class="imgChange" src="<?php bloginfo('stylesheet_directory')?>/images/2D_Layout/6x6/open/6x6-open-r-4.jpg" /></li>
	</ul>
</div>	
 </div>
    <div id="location">
    <h1>Showroom Location</h1>
    <br />
     <div id="map">
   <iframe width="400" height="250" frameborder="0" srcolling="yes" marginheight="0" marginwidth="0" src="http://maps.google.com/maps/ms?client=safari&amp;oe=UTF-8&amp;ie=UTF8&amp;hl=en&amp;msa=0&amp;msid=202096012779243528890.000495b498e82272f1669&amp;source=embed&amp;t=p&amp;ll=40.769654,-111.94768&amp;spn=0.014626,0.021415&amp;z=15&amp;output=embed"></iframe><br /><small>View <a href="http://maps.google.com/maps/ms?client=safari&amp;oe=UTF-8&amp;ie=UTF8&amp;hl=en&amp;msa=0&amp;msid=202096012779243528890.000495b498e82272f1669&amp;source=embed&amp;t=p&amp;ll=40.769654,-111.94768&amp;spn=0.014626,0.021415&amp;z=15" style="color:#0000FF;text-align:left">Salt Lake Office</a> in a larger map</small></div>
   <div id="locphoto"><a href="http://www.newlifeoffice.com/"><img src="<?php bloginfo('stylesheet_directory');?>/images/slcoffice.jpg"/></a></div>   
   	 </div>
    

<hr />
		
        <?php get_footer(); ?>
</div>
