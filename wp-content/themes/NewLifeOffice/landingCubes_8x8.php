<?php
/*
   Template Name: Salt Lake Cubicles 8x8
 */ 
?>
<?php include("landingheader.php"); ?>
<script src="<?php bloginfo('stylesheet_directory')?>/js/landingCubicles.js" type="text/javascript"></script>
<div id="header">
<div id="headerimg">
<a href="http://www.newlifeoffice.com/"><img src="<?php bloginfo('stylesheet_directory');?>/images/landing/landing_logo.png"/></a>
<?php include("cubicle_location.php"); ?>
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
<p>receive email updates when we receive new products</p>
<?php insert_cform('SaltLakeProduct'); ?>
</div>
<?php include("youtube.php"); ?>
</div>  
<div id="landingbody">
<div class="entry">
<div id="page8x8">
<h1 class="title_red">8x8  Office Cubicle</h1>
<br />		
<p id="desc_text">A larger station for larger responsibilities. This heavy-weight challenger is ideal for management or employees with greater space requirements. You can comfortably fit two employees with limited space requirements (additional furniture sold separately). The added space offers more room for additional equipment usage such as printers, copiers, scanners, multiple computers or desktops.</p>
<div id="cf_img">
<img src="<?php bloginfo('stylesheet_directory')?>/images/planview/8x8/plan_n_view_small.gif" />
</div>
<div id="cf_text">
<h4>Features and Benefits</h4>
<ul id="small_boarder">
<li>-65" High Steelcase Acoustic Panels with choice of 4 fabric colors</li>
<li>-24" Deep Laminate work surfaces in Cherry or Maple Finishes</li>
<li>-Locking File Pedestal</li>
<li>-Locking Overhead Storage Bins with Optional Task Light</li>
<li>-Also available in <a href="">53" & 42"</a> high panels (call for pricing)</li>
</ul>
</div>
<div id="cubicle_features">
<div id="color">
<ul>
<li class="color_title"><span>Fabrics:</span></li>
<li><img src="http://www.newlifeoffice.com/wp-content/themes/NewLifeOffice/images/color_icon/taupe.gif"></img><span>Taupe</span></li>
<li><img src="http://www.newlifeoffice.com/wp-content/themes/NewLifeOffice/images/color_icon/camel.gif"><span>Camel</span></li>
<li><img src="http://www.newlifeoffice.com/wp-content/themes/NewLifeOffice/images/color_icon/sage.gif"><span>Sage</span></li>
<li><img src="http://www.newlifeoffice.com/wp-content/themes/NewLifeOffice/images/color_icon/silver.gif"><span>Silver</span></li>
<li class="color_title"><span>Work Surfaces:</span></li>
<li><img src="http://www.newlifeoffice.com/wp-content/themes/NewLifeOffice/images/color_icon/cherry.gif"><span>Cherry</span></li>
<li><img src="http://www.newlifeoffice.com/wp-content/themes/NewLifeOffice/images/color_icon/maple.gif"><span>Maple</span></li>
<li class="color_title"><span>Trim:</span></li>
<li><img src="http://www.newlifeoffice.com/wp-content/themes/NewLifeOffice/images/color_icon/black.gif"><span>Black</span></li>										
</ul>
</div>

</div>
</div>

</div>
<div id="cubicles">
<h1><span class="title_red">8x8 Maximum Privacy</span> Choose a layout - Mouseover to see the 3D photo</h1>
<div id="maximumPrivacy">
<ul id="group">
<li><img class="imgChange"  src="<?php bloginfo('stylesheet_directory')?>/images/2D_Layout/8x8/private/8x8-priv-4.jpg" /></li>
<li><img class="imgChange"  src="<?php bloginfo('stylesheet_directory')?>/images/2D_Layout/8x8/private/8x8-priv-6.jpg" /></li>
<li><img class="imgChange"  src="<?php bloginfo('stylesheet_directory')?>/images/2D_Layout/8x8/private/8x8-priv-8.jpg" /></li>
</ul>
<ul id="single">
<li ><img class="imgChange" src="<?php bloginfo('stylesheet_directory')?>/images/2D_Layout/8x8/private/8x8-priv-r-2.jpg" /></li>
<li ><img class="imgChange" src="<?php bloginfo('stylesheet_directory')?>/images/2D_Layout/8x8/private/8x8-priv-r-3.jpg" /></li>
<li ><img class="imgChange" src="<?php bloginfo('stylesheet_directory')?>/images/2D_Layout/8x8/private/8x8-priv-r-4.jpg" /></li>
</ul>
</div>
<h1><span class="title_red">8x8 Open Layout</span> Choose a layout - Mouseover to see the 3D photo</h1>
<div id="openLayout">
<ul id="group">
<li><img class="imgChange" src="<?php bloginfo('stylesheet_directory')?>/images/2D_Layout/8x8/open/8x8-open-4.jpg" /></li>
<li><img class="imgChange" src="<?php bloginfo('stylesheet_directory')?>/images/2D_Layout/8x8/open/8x8-open-6.jpg" /></li>
<li><img class="imgChange" src="<?php bloginfo('stylesheet_directory')?>/images/2D_Layout/8x8/open/8x8-open-8.jpg" /></li>
</ul>
<ul id="single">
<li><img class="imgChange" src="<?php bloginfo('stylesheet_directory')?>/images/2D_Layout/8x8/open/8x8-open-r-2.jpg" /></li>
<li><img class="imgChange" src="<?php bloginfo('stylesheet_directory')?>/images/2D_Layout/8x8/open/8x8-open-r-3.jpg" /></li>
<li><img class="imgChange" src="<?php bloginfo('stylesheet_directory')?>/images/2D_Layout/8x8/open/8x8-open-r-4.jpg" /></li>
</ul>
</div>
</div>
<?php include("cubicle_footer.php"); ?>
<hr />
<?php get_footer(); ?>
</div>
