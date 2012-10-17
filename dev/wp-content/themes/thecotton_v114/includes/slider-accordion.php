<?php
/**
 * This file contains the functionality of the accordion slider.
 */
?>
<script
	type="text/javascript"
	src="<?php echo get_template_directory_uri(); ?>/script/accordion-slider.js"></script>

<script type="text/javascript">
(function($){
	$(window).load(function(){
		$('#slider').accordionSlider();
	});
})(jQuery);
</script>

<div id="slider-container" class="center">
<div class="slider-frame">
<div id="slider">
<div class="loading"></div>


<?php
global $slider_data;
$posts=$slider_data['posts'];

foreach($posts as $key=>$post){

	$link=get_post_meta($post->ID, PEXETO_CUSTOM_PREFIX.'image_link', true);
	$description=get_post_meta($post->ID, PEXETO_CUSTOM_PREFIX.'description', true);
	$imgurl=get_post_meta($post->ID, PEXETO_CUSTOM_PREFIX.'image_url', true);
	$title=get_post_meta($post->ID, PEXETO_CUSTOM_PREFIX.'imgtitle', true);

	$showDesc=false;
	if($description || $link || $title){
		$showDesc=true;
	}

	if(get_opt('_accord_auto_resize')=='on'){
		$path=pexeto_get_resized_image($imgurl, 700, 350);
	}else{
		$path=$imgurl;
	}
	echo('<div class="accordion-holder"><img src="'.$path.'" alt="" />');
	if($showDesc){
		echo('<div class="accordion-description">');
		if($title) echo ('<h4 class="nocufon">'.stripslashes($title).'</h4>');
		if($description) echo ('<p>'.stripslashes($description).'</p>');
		if($link) echo ('<a href="'.$link.'">'.get_opt('_learn_more').'</a>');
		echo('</div>');

	}
	echo('</div>');
}
?>
<div class="inner-shadow-top"></div>
<div class="inner-shadow-bottom"></div>
<div class="inner-shadow-left"></div>
<div class="inner-shadow-right"></div>
</div>
</div>
</div>
