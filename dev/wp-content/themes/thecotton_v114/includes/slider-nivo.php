<script type="text/javascript"
	src="<?php echo get_template_directory_uri(); ?>/script/jquery.nivo.slider.pack.js"></script>
<?php
$interval=get_opt('_nivo_interval');
$animation=get_opt('_nivo_animation');
$slices=get_opt('_nivo_slices');
$columns=get_opt('_nivo_columns');
$rows=get_opt('_nivo_rows');
$speed=get_opt('_nivo_speed');
$autoplay=get_opt('_nivo_autoplay')=='on'?'true':'false';
$pauseOnHover=get_opt('_nivo_pause_hover')=='on'?'true':'false';

$exclude_navigation=explode(',', get_opt('_exclude_nivo_navigation'));
$arrows=in_array('arrows', $exclude_navigation)?"false":"true";
$buttons=in_array('buttons', $exclude_navigation)?"false":"true";
$sliderClass=in_array('buttons', $exclude_navigation)?"":" nivo-margin";
?>
<script type="text/javascript">
jQuery(function(){
	pexetoSite.loadNivoSlider(jQuery('#nivo-slider'), "<?php echo $animation; ?>" , <?php echo $buttons; ?>, <?php echo $arrows; ?>, <?php echo $slices; ?>, <?php echo $speed; ?>, <?php echo $interval; ?>, <?php echo $pauseOnHover; ?>, <?php echo $autoplay; ?>, <?php echo $columns; ?>, <?php echo $rows; ?>);
});
</script>
<div id="slider-container" class="center<?php echo $sliderClass;?>">

<div class="slider-frame">
<div id="nivo-slider"><?php 


global $slider_data;
$posts=$slider_data['posts'];

foreach($posts as $key=>$post){

	$link=get_post_meta($post->ID, PEXETO_CUSTOM_PREFIX.'image_link', true);
	$description=get_post_meta($post->ID, PEXETO_CUSTOM_PREFIX.'description', true);
	$imgurl=get_post_meta($post->ID, PEXETO_CUSTOM_PREFIX.'image_url', true);

	if($link){
		echo('<a href="'.$link.'">');
	}
	echo('<img src="');
	if(get_opt('_nivo_auto_resize')=='true'||get_opt('_nivo_auto_resize')=='on'){
		$path=pexeto_get_resized_image($imgurl, 950, 350);
	}else{
		$path=$imgurl;
	}
	echo($path);
	echo('" alt=""');
	if($description){
		echo(' title="'.stripslashes($description).'"');
	}
	echo('/>');
	if($link){
		echo('</a>');
	}
}
?></div>
</div>
<?php if($buttons=='true'){ ?>
<div id="nivo-controlNav-holder"></div>
<?php } ?></div>

