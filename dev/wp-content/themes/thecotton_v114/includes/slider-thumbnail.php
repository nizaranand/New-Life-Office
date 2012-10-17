<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/script/slider.js"></script>
<?php 
	global $slider_data;
	$autoplay=get_opt('_thum_autoplay')=='on'?'true':'false';
	$interval=get_opt('_thum_interval');
	$pauseInterval=get_opt('_thum_pause');
	$pauseOnHover=get_opt('_thum_pause_hover')=='on'?'true':'false';
?>	
	
<script type="text/javascript">
(function($){
	$(window).load(function(){
		$('#slider').slider({thumbContainerId:'slider-navigation', autoplay:<?php echo($autoplay); ?>, interval:<?php echo($interval);?>, pauseInterval:<?php echo($pauseInterval);?>, pauseOnHover:<?php echo($pauseOnHover); ?>});
	});
})(jQuery);
</script>

<div id="slider-container" class="center">
    <div id="slider" class="slider-frame"> 
    <div id="slider-img-wrapper">
		<div class="loading"></div>
		
			  <?php 
			  $posts=$slider_data['posts'];
					
					foreach($posts as $key=>$post){
						
						$link=get_post_meta($post->ID, PEXETO_CUSTOM_PREFIX.'image_link', true);
						$description=get_post_meta($post->ID, PEXETO_CUSTOM_PREFIX.'description', true);
						$imgurl=get_post_meta($post->ID, PEXETO_CUSTOM_PREFIX.'image_url', true);
					
						if($link){
							echo('<a href="'.$link.'">');
						}
						echo('<img src="');
					if(get_opt('_thum_auto_resize')=='true' || get_opt('_thum_auto_resize')=='on'){
						$path=pexeto_get_resized_image($imgurl, 950, 350);
		      		}else{
						$path=$imgurl;
		      		}
					echo($path);
					echo('" alt=""');
					if($key==0){
						echo(' class="first"');
					}
					if($description){
						echo(' title="'.stripslashes($description).'"');
					}
					echo('/>');
					if($link){
						echo('</a>');
					}
				}
				?>									
	
 	</div>
 	</div>
 	</div>
 	<?php $count=sizeof($posts); 
 	$nav_class=$count<=9?'no-arrows':'with-arrows'; ?>
    <div id="slider-navigation-container" class="center <?php echo $nav_class; ?>">
      <div class="relative">
        <div id="slider-navigation" >
      	  <div class="items">
	      	<?php 
	      	$closed=true;
	      	foreach($posts as $key=>$post){

			$imgurl=get_post_meta($post->ID, PEXETO_CUSTOM_PREFIX.'image_url', true);
	      		if($key%9==0){ 
	      			echo('<div>'); 
	      			$closed=false;
	      		}
	      		if(get_opt('_thum_auto_resize')=='true' || get_opt('_thum_auto_resize')=='on'){
					$path=pexeto_get_resized_image($imgurl, 70, 50);
		      	}else{
					$path=$imgurl;
		      	}
		      	echo('<img src="'.$path.'" alt="" />');
				if(($key+1)%9==0){
					echo('</div>');
					$closed=true;
				}
			}
			if(!$closed){
				echo('</div>');
			}
	      	?>
        </div>
      </div>
    </div>
  </div>
