 <div id="rightimg">

    <object width="306" height="230">
	<param name="movie" value="http://www.youtube.com/v/NGQdK1IAd2U"></param>
	<param name="allowFullScreen" value="true"></param>
	<param name="allowScriptAccess" value="always"></param>
	<embed src="http://www.youtube.com/v/NGQdK1IAd2U?&autoplay=1&loop=1"
 		type="application/x-shockwave-flash"
  		allowfullscreen="true"
 		allowscriptaccess="always"
  		width="306" height="230"
  		autoplay=1>
	</embed>
	</object>
    
    </div>
   
    </div>
    <div id="menu">
    <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
	</div>
    
    <div class="sibebarRight">
		<?php include("youtube.php"); ?>
    </div>
     
    <div id="landingbody">
    <div id="banner">
       <div class="imgs">
 	<?php echo do_shortcode('[monoslideshow id=1 w=640 h=480]'); ?>
       </div>
       </div>
      
    	<div class="entry">
         <hr />
    <?php if (have_posts()) : ?>
			
			<?php while (have_posts()) : the_post(); ?>
			
					<?php the_content();?>
				
		<?php endwhile; ?>
		
	<?php endif; ?>
    </div> 