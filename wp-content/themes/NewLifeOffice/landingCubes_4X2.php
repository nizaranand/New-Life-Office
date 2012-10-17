<?php
/*
   Template Name: Salt Lake Cubicles 4 Call Center Cubicle
 */
?>
<?php include("landingheader.php"); ?>
<script src="<?php bloginfo('stylesheet_directory') ?>/js/landingCubicles.js" type="text/javascript"></script>
<div id="header">
<div id="headerimg">
<a href="http://www.newlifeoffice.com/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/landing/landing_logo.png"/></a>
<?php include("cubicle_location.php"); ?>
</div>
<div id="rightimg">
<?php include("headerTube.php"); ?>
</div>
</div>
<div id="menu">
<?php wp_nav_menu(array('theme_location' => 'header-menu')); ?>
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
<div id="page6x6">
<h1 class="title_red">4' Call Center Cubicle</h1>
<br />		
<p id="desc_text">The essence of efficiency. This space-efficient call station cubicle was built with call centers and customer service in mind. These slick cubicles will help create an environment where training, supervision, and accountability are natural. Building unity and working together is important to the success of any floor and the 4' call station is the perfect ingredient.</p>
<div id="cf_img">
<img src="<?php bloginfo('stylesheet_directory') ?>/images/planview/4call/plan_n_view_small.jpg" />
</div>
<div id="cf_text">
<h4>Features and Benefits</h4>
<ul id="small_boarder">
<li>-53" High Steelcase Acoustic Panels with choice of 4 fabric colors</li>
<li>-24" Deep Laminate work surfaces in Cherry or Maple Finishes</li>
<li>-Locking File Pedestal</li>
<li>-Also available in <a href="">65" & 42"</a> high panels (call for pricing)</li>
<li>-Locking Overhead Storage Bins with Optional Task Light</li>
<li>-1 Duplex Receptacle Per Workstation Power</li>
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
<li><img src="http://www.newlifeoffice.com/wp-content/themes/NewLifeOffice/images/color_icon/cherry.gif"><span>Cherrry</span></li>
<li><img src="http://www.newlifeoffice.com/wp-content/themes/NewLifeOffice/images/color_icon/maple.gif"><span>Maple</span></li>
<li class="color_title"><span>Trim:</span></li>
<li><img src="http://www.newlifeoffice.com/wp-content/themes/NewLifeOffice/images/color_icon/black.gif"><span>Black</span></li>										
</ul>
</div>

</div>
</div>

</div>
<div id="cubicles">
<h1><span class="title_red">4' Call Center Cubicle</span> Choose a layout - Mouseover to see the 3D photo</h1>
<div id="fourCall">
<ul>
<li><a id='top_left'></a></li>
<li ><a id='move_left'></a></li>
</ul>
</div>
</div>
<?php include("cubicle_footer.php"); ?>
<hr />
<?php get_footer(); ?>
</div>
