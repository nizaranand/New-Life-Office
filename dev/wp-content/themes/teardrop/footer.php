<?php  
$turl = get_template_directory_uri();
$social_facebook = get_option("teardrop_theme_social_facebook");
$social_ftwitter = get_option("teardrop_theme_social_ftwitter");
$social_flickr = get_option("teardrop_theme_social_flickr");
$social_linkedin = get_option("teardrop_theme_social_linkedin");
$image=get_post_meta($post->ID, '_image_bg_value', true);  
 ?>
</div>  </div>  
<!-- end content -->
<!-- srart footer -->



<div class="footer">
<!-- srart footer social -->
<div class="social">
<?php if ($social_facebook!="") :?>
	<a style="display:block;width: 26px;float:left;" title="Facebook" href="<?php echo $social_facebook ?>">
        <img width="22" height="22" title="Facebook" alt="Facebook" src="<?php echo $turl ?>/i/socialmini/facebook.png"></a>
<?php endif?>
<?php if ($social_ftwitter!="") :?>
	<a style="display:block;width: 26px;float:left;" title="Follow Me" href="<?php echo $social_ftwitter ?>">
        <img width="22" height="22" title="Twitter" alt="Twitter" src="<?php echo $turl ?>/i/socialmini/twitter.png"></a>
<?php endif?>
<?php if ($social_flickr!="") :?>
    <a style="display:block;width: 26px;float:left;" title="Flickr" href="<?php echo $social_flickr ?>">
        <img width="22" height="22" title="Flickr" alt="Flickr" src="<?php echo $turl ?>/i/socialmini/flickr.png"></a>
<?php endif?>
<?php if ($social_linkedin!="") :?>
    <a style="display:block;width: 26px;float:left;" title="Linkedin" href="<?php echo $social_linkedin ?>">
        <img width="22" height="22" title="Linkedin" alt="Linkedin" src="<?php echo $turl ?>/i/socialmini/linkedin.png"></a>
<?php endif?>
</div>
<!-- end footer social -->
<!-- srart copywrap -->
<div class="copywrap"><?php echo get_option("teardrop_theme_copyrights")?> </div>
<!-- end copywrap -->

<!-- srart footer menu -->
<div class="footer-links"><?php wp_nav_menu(array('menu_class'=>'footer_menu','theme_location'=>'nav-bottom','depth' => 1, 'fallback_cb' => false)); ?></div>
<!-- end footer menu -->
</div>
<!-- end footer --> 

</body></html>
