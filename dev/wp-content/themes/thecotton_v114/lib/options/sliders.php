<?php

$pexeto_slider_options= array( array(
"name" => "Slider Settings",
"type" => "title",
"img" => PEXETO_IMAGES_URL."icon_slider.png"
),

array(
"type" => "open",
"subtitles"=>array(array("id"=>"thumbnail", "name"=>"Thumbnail Slider"), array("id"=>"accordion", "name"=>"Accordion Slider"), array("id"=>"nivo", "name"=>"Nivo Slider"))
),

/* ------------------------------------------------------------------------*
 * THUMBNAIL SLIDER
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'thumbnail'
),

array(
"name" => "Automatic image resizing",
"id" => PEXETO_SHORTNAME."_thum_auto_resize",
"type" => "checkbox",
"std" => 'off',
"desc" => 'If ON selected, the images will be resized automatically.'
),

array(
"name" => "Autoplay",
"id" => PEXETO_SHORTNAME."_thum_autoplay",
"type" => "checkbox",
"std" => 'on',
"desc" => 'If ON selected, the images will rotate automatically'
),

array(
"name" => "Rotate Interval",
"id" => PEXETO_SHORTNAME."_thum_interval",
"type" => "text",
"desc" => "The interval between changing the images when autoplay is enabled (in miliseconds)",
"std" => '4000'
),

array(
"name" => "Pause Interval",
"id" => PEXETO_SHORTNAME."_thum_pause",
"type" => "text",
"desc" => "The pause interval (in miliseconds)- when an user clicks on an image or arrow, the autoplay pauses for this interval of time",
"std" => '5000'
),

array(
"name" => "Pause on hover",
"id" => PEXETO_SHORTNAME."_thum_pause_hover",
"type" => "checkbox",
"std" => 'on',
"desc" => 'If ON selected, when the user hovers the image, the automatic rotation will pause.'
),

array(
"type" => "close"),


/* ------------------------------------------------------------------------*
 * ACCORDION SLIDER
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'accordion'
),

array(
"name" => "Automatic image resizing",
"id" => PEXETO_SHORTNAME."_accord_auto_resize",
"type" => "checkbox",
"std" => 'off',
"desc" => 'If enabled, the images will be resized automatically.'
),


array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * NIVO SLIDER
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'nivo'
),


array(
"name" => "Automatic image resizing",
"id" => PEXETO_SHORTNAME."_nivo_auto_resize",
"type" => "checkbox",
"std" => 'off',
"desc" => 'If enabled, the images will be resized automatically.'
),

array(
"name" => "Show navigation",
"id" => PEXETO_SHORTNAME."_exclude_nivo_navigation",
"type" => "multicheck",
"options" => array(array("id"=>"arrows", "name"=>"Arrows"), array("id"=>"buttons", "name"=>"Navigation Buttons")),
"class"=>"exclude"
),

array(
"name" => "Animation Effect",
"id" => PEXETO_SHORTNAME."_nivo_animation",
"type" => "select",
"options" => array(array('id'=>'random','name'=>'Random'),array('id'=>'fold','name'=>'Fold'),array('id'=>'fade','name'=>'Fade'),
array('id'=>'sliceDown','name'=>'Slice Down'),array('id'=>'sliceDownLeft','name'=>'Slice Down Left'),array('id'=>'sliceUp','name'=>'Slice Up'),
array('id'=>'sliceUpDown','name'=>'Slice Up Down'),array('id'=>'sliceUpLeft','name'=>'Slice Up Left'),array('id'=>'sliceUpDownLeft','name'=>'Slice Up Down Left'),array('id'=>'slideInRight','name'=>'Slide In Right'),array('id'=>'slideInLeft','name'=>'Slide In Left'),
array('id'=>'boxRandom','name'=>'Box Random'),array('id'=>'boxRain','name'=>'Box Rain'),array('id'=>'boxRainReverse','name'=>'Box Rain Reverse'),array('id'=>'boxRainGrow','name'=>'Box Rain Grow'),array('id'=>'boxRainGrowReverse','name'=>'Box Rain Grow Reverse')
),
"std" => 'random'
),

array(
"name" => "Number of slices",
"id" => PEXETO_SHORTNAME."_nivo_slices",
"type" => "text",
"std" => "15",
"desc" => "For slice animations only."
),

array(
"name" => "Number of box rows",
"id" => PEXETO_SHORTNAME."_nivo_rows",
"type" => "text",
"std" => "4",
"desc" => "For box animations only."
),

array(
"name" => "Number of box columns",
"id" => PEXETO_SHORTNAME."_nivo_columns",
"type" => "text",
"std" => "8",
"desc" => "For box animations only."
),

array(
"name" => "Animation Speed",
"id" => PEXETO_SHORTNAME."_nivo_speed",
"type" => "text",
"std" => "800",
"desc" => "The animation speed in miliseconds"
),

array(
"name" => "Pause interval",
"id" => PEXETO_SHORTNAME."_nivo_interval",
"type" => "text",
"std" => "3000",
"desc" => "The time interval between image changes in miliseconds"
),

array(
"name" => "Autoplay",
"id" => PEXETO_SHORTNAME."_nivo_autoplay",
"type" => "checkbox",
"std" => 'on',
"desc" => 'If enabled, the images will rotate automatically'
),

array(
"name" => "Pause on hover",
"id" => PEXETO_SHORTNAME."_nivo_pause_hover",
"type" => "checkbox",
"std" => 'on',
"desc" => 'If enabled, when the user hovers the image, the automatic rotation will pause.'
),


array(
"type" => "close"),


array(
"type" => "close"));

$new_pexeto_slider_options = pexeto_add_custom_options($pexeto_slider_options);

pexeto_add_options($new_pexeto_slider_options);