<h2 class="form-pad">Request Information</h2>
	<?php insert_cform('Contact'); ?>
	<div id="quickship">
	<a href="<?php echo get_permalink(131);?>?osCsid=<?=$osCsid;?>"><img height="110" src="<?php bloginfo('stylesheet_directory')?>/images/quickship.png" alt="Free Shipping image" /></a>
    	</div>
         <div id="blogposts">
    <div id="youtube"> 
    <span>Watch videos to learn about our remanufacturing process.</span>

<iframe src="http://player.vimeo.com/video/30404528?byline=0&amp;portrait=0&amp;color=e13a3e" width="200" height="150" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>
</div>
    <div class="spacers"></div>
    <div class="spacers"></div>
    <div class="spacers"></div>
    <div class="spacers"></div>
   <div id="posts">
    <span id="archives"><?php _e('New Life Office Blog:'); ?></span>
   
<?php wp_get_archives('type=postbypost'); ?>
     </ul>
     </div>
     </div>
