<?php


/**
 * Load the patterns into arrays.
 */
$patterns=array();
$patterns[0]='none';
for($i=1; $i<=40; $i++){
	$patterns[]='pattern'.$i.'.png';
}


$pexeto_styles_options=array(array(
"name" => "Style settings",
"type" => "title",
"img" => PEXETO_IMAGES_URL.'icon_style.png'
),

array(
"type" => "open",
"subtitles"=>array(array("id"=>"general", "name"=>"General"), array("id"=>"logo", "name"=>"Logo"), array("id"=>"text", "name"=>"Text Styles"), array("id"=>"bg", "name"=>"Backgrounds"), array("id"=>"fonts", "name"=>"Fonts"))
),

/* ------------------------------------------------------------------------*
 * GENERAL
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id" => 'general'
),

array(
"name" => "Base Theme Skin",
"id" => PEXETO_SHORTNAME."_theme_skin",
"type" => "select",
"options" => array(array('id'=>'light','name'=>'Light'), array('id'=>'dark','name'=>'Dark'), array('id'=>'grunge','name'=>'Grunge')),
"std" => 'light',
"desc" => 'This is the default theme skin. If you select a skin here, you can still change the other style settings in this section.'
),

array(
"name" => "Predefined Style Colors",
"id" => PEXETO_SHORTNAME."_skin",
"type" => "stylecolor",
"options" => array( "ff842c","ff3e1f","db001b","bd26bd","cf1b75","BD1550","29b3d0","00a2b1","0088cc","29d02d","6ead0f","00a851"),
"std" => 'ff842c',
"desc" => 'You can either select a predefined skin or pick your custom color below.'
),

array(
"name" => "Custom Theme Color",
"id" => PEXETO_SHORTNAME."_custom_skin",
"type" => "color",
"desc" => 'You can select a custom color for your theme. This field has priority over the "Predefined Skins" one. '
),

array(
"name" => "Theme Pattern",
"id" => PEXETO_SHORTNAME."_pattern",
"type" => "pattern",
"options" => $patterns,
"desc" => 'Here you can choose the pattern for the theme. There are 3 types of patterns - each of them suits best
for the different skin bases. '
),

array(
"name" => "Custom Pattern",
"id" => PEXETO_SHORTNAME."_custom_pattern",
"type" => "upload",
"desc" => 'You can upload your custom pattern image here.'
),


array(
"name" => "Main body text size",
"id" => PEXETO_SHORTNAME."_body_text_size",
"type" => "text",
"desc" => "The main body font size in pixels. Default: 12"
),

array(
"name" => "Additional CSS styles",
"id" => PEXETO_SHORTNAME."_additional_styles",
"type" => "textarea",
"desc" => "You can insert some more additional CSS code here."
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * LOGO OPTIONS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'logo'
),

array(
"name" => "Logo image",
"id" => PEXETO_SHORTNAME."_logo_image",
"type" => "upload",
"desc" => "If you wouldn't like to use the uploader: if the image is located within the images folder you can just insert images/image-name.jpg, otherwise
you have to insert the full path to the image, for example: http://site.com/image-name.jpg"
),

array(
"name" => "Logo image width",
"id" => PEXETO_SHORTNAME."_logo_width",
"type" => "text",
"desc" => "The logo image width in pixels- default:160"
),


array(
"name" => "Logo Container Height",
"id" => PEXETO_SHORTNAME."_logo_height",
"type" => "text",
"desc" => "This is the height of the whole header containing the logo and should be changed when the logo image is higher or smaller than the original one."
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * TEXT STYLES
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'text',
),

array(
"name" => "Main body text color",
"id" => PEXETO_SHORTNAME."_body_color",
"type" => "color",
"desc" => "This setting will change the main content and sidebar text color."
),

array(
"name" => "Headings color",
"id" => PEXETO_SHORTNAME."_heading_color",
"type" => "color"
),

array(
"name" => "Menu links color",
"id" => PEXETO_SHORTNAME."_menu_link_color",
"type" => "color"
),

array(
"name" => "Menu links hover color",
"id" => PEXETO_SHORTNAME."_menu_link_hover",
"type" => "color",
"desc" => "This is the color of the menu links when the mouse cursor gets positioned over the link"
),

array(
"name" => "Footer text color",
"id" => PEXETO_SHORTNAME."_footer_text_color",
"type" => "color"
),

array(
"name" => "Footer copyright text color",
"id" => PEXETO_SHORTNAME."_copyright_text_color",
"type" => "color"
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * BACKGROUNDS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id" => 'bg'
),

array(
"name" => "Body background color",
"id" => PEXETO_SHORTNAME."_body_bg",
"type" => "color"
),

array(
"name" => "Top line background color",
"id" => PEXETO_SHORTNAME."_top_line_bg",
"type" => "color"
),

array(
"name" => "Drop-down menu hover background",
"id" => PEXETO_SHORTNAME."_menu_hover_bg",
"type" => "color"
),

array(
"name" => "Lines and borders color",
"id" => PEXETO_SHORTNAME."_border_color",
"type" => "color"
),


array(
"name" => "Comments background color",
"id" => PEXETO_SHORTNAME."_comments_bg",
"type" => "color"
),

array(
"name" => "Footer background color",
"id" => PEXETO_SHORTNAME."_footer_bg",
"type" => "color"
),

array(
"name" => "Footer copyright section background color",
"id" => PEXETO_SHORTNAME."_copyright_bg",
"type" => "color"
),

array(
"name" => "Footer lines color",
"id" => PEXETO_SHORTNAME."_footer_lines_color",
"type" => "color"
),


array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * FONTS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id" => 'fonts'
),

array(
"type" => "documentation",
"text" => "<h3>Cufon Fonts</h3>"
),

array(
"name" => "Enable Cufon for headings",
"id" => PEXETO_SHORTNAME."_enable_cufon",
"type" => "checkbox",
"std" =>"off",
"desc" => "If it is enabled, you will be able to use another custom fonts for the headings. You will be able to
either select one of the default fonts that the theme comes with or upload your own font below."
),

array(
"name" => "Heading Cufon Font",
"id" => PEXETO_SHORTNAME."_cufon_font",
"type" => "select",
"options" => array(array('id'=>'andika.js','name'=>'Andika Basic'),array('id'=>'caviar_dreams.js','name'=>'Caviar Dreams'),array('id'=>'charis_sil.js','name'=>'Charis'),array('id'=>'chunk_five.js','name'=>'Chunk Five'),array('id'=>'comfortaa.js','name'=>'Comfortaa'),array('id'=>'droid_serif.js','name'=>'Droid Serif'), array('id'=>'kingthings_exeter.js','name'=>'Kingthings Exeter'), array('id'=>'luxy_sans.js','name'=>'Luxy Sans'), array('id'=>'sling.js','name'=>'Sling'), array('id'=>'vegur.js','name'=>'Vegur')),
"desc" => 'You can select one of the fonts that the theme goes with. In order the font to replace the default one
the "Enable Cufon" field above should be enabled.'
),

array(
"name" => "Custom Heading Font",
"id" => PEXETO_SHORTNAME."_custom_cufon_font",
"type" => "upload",
"desc" => 'You can upload your custom JavaScript font file here. You can generate the font here: http://cufon.shoqolate.com/generate/'
),

array(
"type" => "documentation",
"text" => "<h3>Google API Fonts</h3>"
),

array(
"name" => "Enable Google Fonts",
"id" => PEXETO_SHORTNAME."_enable_google_fonts",
"type" => "checkbox",
"std" =>"on"
),

array(
"name"=>"Add Google Font",
"id"=>'google_fonts',
"type"=>"custom",
"button_text"=>'Add Font',
"fields"=>array(
	array('id'=>'pex_google_fonts_name', 'type'=>'textarea', 'name'=>'Font URL',"std"=>PEXETO_GOOGLE_FONTS)
),
"desc"=>"In this field you can add or remove Google Fonts to the theme. Please note that only the font
URL should be inserted here (the value that is set within the 'href' attribute of the embed link tag Google provides), not the whole embed link tag.
<b>Example:</b><br />
http://fonts.googleapis.com/css?family=Lato<br />
<br />In order to enable the new font for the theme, simply add its name before the other font names in the Font Family fields below."

),

array(
"type" => "documentation",
"text" => "<h3>Font Family</h3>"
),

array(
"name" => "Headings font family",
"id" => PEXETO_SHORTNAME."_heading_font_family",
"type" => "textarea",
"std" => '"Droid Serif", Georgia, "Times New Roman", Times, serif',
"desc" => 'You can change the font family for the theme headings in this field. If you have loaded a Google API font,
you can insert its name here. 
<br />Notes:
<br />1. If the font name contains an empty space, you have to surround its name with a quotation marks, for example: "Times New Roman"
<br />2. If Cufon font replacement is enabled above, the Cufon font selected will have higher priority than the fonts set in here
<br />3. The different font names should be separated by commas'
),

array(
"name" => "Body text font family",
"id" => PEXETO_SHORTNAME."_body_font_family",
"type" => "textarea",
"std" => '"Droid Sans", Verdana, Geneva, sans-serif',
"desc" => 'You can change the main body font family for the theme in this field. If you have loaded a Google API font,
you can insert its name here. 
<br />Notes:
<br />1. If the font name contains an empty space, you have to surround its name with a quotation marks, for example: "Times New Roman"
<br />2. The different font names should be separated by commas'
),


array(
"type" => "close"),


array(
"type" => "close"));

pexeto_add_options($pexeto_styles_options);