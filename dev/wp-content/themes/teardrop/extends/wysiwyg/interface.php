<?php require_once('config.php');
if ( !is_user_logged_in() || !current_user_can('edit_posts') ) wp_die(__("You are not allowed to be here")); ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Shortcodes</title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri() ?>/extends/wysiwyg/wysiwyg.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<base target="_self" />
</head>
<body onLoad="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';" style="display: none" id="link">
<form name="kotofey_shortcode_form" action="#">

	
<div class="shortcode_wrap" style="height:100px;width:250px;margin:0 auto;margin-top:30px;text-align:center;" >
<div id="shortcode_panel" class="current" style="height:50px;">
<fieldset style="border:0;width:100%;text-align:center;">
<select id="style_shortcode" name="style_shortcode" style="width:250px">
<option value="0">Select a Shortcode...</option>
<option value="0" style="font-weight:bold!important;font-style:italic;border-top:1px dotted #e1e1e1;background:#e1e1e1;">Basic shortcodes</option>
     <option value="h1">H1 heading</option>
     <option value="h2">H2 heading</option>
     <option value="h3">H3 heading</option>
     <option value="h4">H4 heading</option>
     <option value="h5">H5 heading</option>
     <option value="h6">H6 heading</option>
<option value="0"></option>
	 <option value="0" style="font-weight:bold!important;font-style:italic;border-top:1px dotted #e1e1e1;background:#e1e1e1;">Dividers</option>
     <option value="hr">Basic Divider</option> 
<option value="0"></option>	 
	 <option value="0" style="font-weight:bold!important;font-style:italic;border-top:1px dotted #e1e1e1;background:#e1e1e1;">Column shortcodes</option>
     <option value="two_columns">2 Columns</option>
     <option value="three_columns">3 Columns</option>
     <option value="four_columns">4 Columns</option>
     <option value="five_columns">5 Columns</option>
     <option value="six_columns">6 Columns</option>
     <option value="3/4+1/4">3/4 Column + 1/4 Column</option>
     <option value="2/3+1/3">2/3 Column + 1/3 Column</option>
<option value="0"></option>
	 <option value="0" style="font-weight:bold!important;font-style:italic;border-top:1px dotted #e1e1e1;background:#e1e1e1;">List shortcodes</option>
     <option value="check-list">Check List</option>
     <option value="error-list">Error List</option>
     <option value="info-list">Info List</option>
     <option value="alert-list">Alert List</option>
	 <option value="arrow-list">Arrow List</option>
	 <option value="download-list">Download List</option>

<option value="0"></option>	 
	 <option value="0" style="font-weight:bold!important;font-style:italic;border-top:1px dotted #e1e1e1;background:#e1e1e1;">Alert boxes</option>
     <option value="alert-info">Info alert</option>
     <option value="alert-success">Success alert</option>
     <option value="alert-alert">Attention alert</option>
     <option value="alert-error">Error alert</option>
     <option value="alert-download">Download alert</option>
<option value="0"></option>	 
	 <option value="0" style="font-weight:bold!important;font-style:italic;border-top:1px dotted #e1e1e1;background:#e1e1e1;">Buttons</option>
	 <option value="custom-button">Custom color button</option>
	 <option value="link-button">Read more link</option>
     <option value="red-button">Red button</option>
	 <option value="blue-button">Blue button</option>
	 <option value="green-button">Green button</option>
	 <option value="orange-button">Orange button</option>
	 <option value="black-button">Black button</option>
	 <option value="grey-button">Grey button</option>

<option value="0"></option>     
	 <option value="0" style="font-weight:bold!important;font-style:italic;border-top:1px dotted #e1e1e1;background:#e1e1e1;">Images</option>
     <option value="ifull">Full image</option>
     <option value="imed">Medium image</option>
	 <option value="ismall">Small image</option>
     <option value="isquare">Square image</option>
	 <option value="ithumb">Thumb image</option>
<option value="0"></option>     
	 <option value="0" style="font-weight:bold!important;font-style:italic;border-top:1px dotted #e1e1e1;background:#e1e1e1;">Lightbox images</option>
     <option value="full">Full image</option>
     <option value="med">Medium image</option>
	 <option value="small">Small image</option>
     <option value="square">Square image</option>
	 <option value="thumb">Thumb image</option>
<option value="0"></option>	 
	 <option value="0" style="font-weight:bold!important;font-style:italic;border-top:1px dotted #e1e1e1;background:#e1e1e1;">Highlight</option>
     <option value="hl-red">Red highlight</option>
     <option value="hl-lightred">Light red highlight</option>
	 <option value="hl-yellow">Yellow highlight</option>
     <option value="hl-blue">Blue highlight</option>
	 <option value="hl-green">Green highlight</option>
	 <option value="hl-grey">Grey highlight</option>
     <option value="hl-black">Black highlight</option>
	 <option value="hl-orange">Orange highlight</option>
	 <option value="hl-pink">Pink highlight</option>
<option value="0"></option>     
	 <option value="0" style="font-weight:bold!important;font-style:italic;border-top:1px dotted #e1e1e1;background:#e1e1e1;">Lightbox video</option>
     <option value="fullv">Full image</option>
     <option value="medv">Medium image</option>
	 <option value="smallv">Small image</option>
     <option value="squarev">Square image</option>
	 <option value="thumbv">Thumb image</option>
<option value="0"></option>	 
	 <option value="0" style="font-weight:bold!important;font-style:italic;border-top:1px dotted #e1e1e1;background:#e1e1e1;">Media</option>
     <option value="youtube">Youtube video</option>
     <option value="vimeo">Vimeo video</option>
<option value="0"></option>	 
	 <option value="0" style="font-weight:bold!important;font-style:italic;border-top:1px dotted #e1e1e1;background:#e1e1e1;">Other</option>
     <option value="feedback-form">Contact form</option>
	 

 
</select>
</fieldset>
</div><!-- end shortcode_panel -->

<div style="float:left"><input type="button" id="cancel" name="cancel" value="<?php echo "Close"; ?>" onClick="tinyMCEPopup.close();" /></div>
<div style="float:right"><input type="submit" id="insert" name="insert" value="<?php echo "Insert"; ?>" onClick="embedshortcode();" /></div>

</div><!-- end shortcode_wrap -->




</form>
</body>
</html>
