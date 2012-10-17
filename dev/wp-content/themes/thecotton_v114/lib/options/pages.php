<?php
global $pexeto_data;

array_unshift($pexeto_categories, array('id'=>-1, 'name'=>'All Categories'));

//load the porftfolio categeories
$portf_taxonomies=pexeto_get_taxonomies('portfolio_category');
$portf_categories=array(array('id'=>'hide','name'=>'Hide'), (array('id'=>'disabled','name'=>'Show:', 'class'=>'caption')), array('id'=>'-1', 'name'=>'All Categories'));
foreach($portf_taxonomies as $taxonomy){
	$portf_categories[]=array("name"=>$taxonomy->name, "id"=>$taxonomy->term_id);
}

$pexeto_pages_options= array( array(
"name" => "Page Settings",
"type" => "title",
"img" => PEXETO_IMAGES_URL."icon_home.png"
),

array(
"type" => "open",
"subtitles"=>array(array("id"=>"home_page", "name"=>"Home"), array("id"=>"blog", "name"=>"Blog"), array("id"=>"portfolio", "name"=>"Portfolio"), array("id"=>"contact", "name"=>"Contact"),array("id"=>"featured", "name"=>"Featured"))
),

/* ------------------------------------------------------------------------*
 * HOME PAGE SETTINGS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'home_page'
),

array(
"name" => "First box title",
"id" => PEXETO_SHORTNAME."_home_box_title1",
"type" => "text",
"std" => "Unlimited skins"
),

array(
"name" => "First box description",
"id" => PEXETO_SHORTNAME."_home_box_desc1",
"type" => "textarea",
"std" => "Changing template's colors is super simple - check out how your favorite color looks."
),

array(
"name" => "First box image",
"id" => PEXETO_SHORTNAME."_home_box_icon1",
"type" => "upload",
"desc" => "Optimal image size: 263 x 160 pixels"
),

array(
"name" => "First box button text",
"id" => PEXETO_SHORTNAME."_home_box_btn_text1",
"type" => "text",
"std" => "Learn More",
"desc" => "If you don't need a link, just insert a blank space."
),

array(
"name" => "First box button link",
"id" => PEXETO_SHORTNAME."_home_box_btn_link1",
"type" => "text"
),

array(
"name" => "Second box title",
"id" => PEXETO_SHORTNAME."_home_box_title2",
"type" => "text",
"std" => "Advanced Admin"
),

array(
"name" => "Second box description",
"id" => PEXETO_SHORTNAME."_home_box_desc2",
"type" => "textarea",
"std" => "Changing template's colors is super simple - check out how your favorite color looks."
),

array(
"name" => "Second box image",
"id" => PEXETO_SHORTNAME."_home_box_icon2",
"type" => "upload",
"desc" => "Optimal image size: 263 x 160 pixels"
),

array(
"name" => "Second box button text",
"id" => PEXETO_SHORTNAME."_home_box_btn_text2",
"type" => "text",
"std" => "Learn More",
"desc" => "If you don't need a link, just insert a blank space."
),

array(
"name" => "Second box button link",
"id" => PEXETO_SHORTNAME."_home_box_btn_link2",
"type" => "text"
),

array(
"name" => "Third box title",
"id" => PEXETO_SHORTNAME."_home_box_title3",
"type" => "text",
"std" => "jQuery Powered"
),

array(
"name" => "Third box description",
"id" => PEXETO_SHORTNAME."_home_box_desc3",
"type" => "textarea",
"std" => "Changing template's colors is super simple - check out how your favorite color looks."
),

array(
"name" => "Third box image",
"id" => PEXETO_SHORTNAME."_home_box_icon3",
"type" => "upload",
"desc" => "Optimal image size: 263 x 160 pixels"
),

array(
"name" => "Third box button text",
"id" => PEXETO_SHORTNAME."_home_box_btn_text3",
"type" => "text",
"std" => "Learn More",
"desc" => "If you don't need a link, just insert a blank space."
),

array(
"name" => "Third box button link",
"id" => PEXETO_SHORTNAME."_home_box_btn_link3",
"type" => "text"
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * BLOG PAGE SETTINGS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'blog'
),



array(
"name" => "Page Layout",
"id" => PEXETO_SHORTNAME."_blog_layout",
"type" => "select",
"options" => array(array('id'=>'right','name'=>'Right Sidebar'), array('id'=>'left','name'=>'Left Sidebar'), array('id'=>'full','name'=>'Full width')),
"std" => 'right',
"desc" => 'This layout setting will affect the blog page, blog posts template, archives and search pages'
),

array(
"name" => "Blog sidebar",
"id" => PEXETO_SHORTNAME."_blog_sidebar",
"type" => "select",
"options" => $pexeto_data->pexeto_sidebars,
"std" => 'default',
"desc" => 'This sidebar setting will affect the blog page, blog posts template, archives and search pages'
),


array(
"name" => "Slider",
"id" => PEXETO_SHORTNAME."_home_slider",
"type" => "select",
"options" => pexeto_get_created_sliders(),
"std" => 'none',
"desc" => 'If you have created additional sliders, you can select the name of the slider to be displayed
on the blog. By default the Default slider for each slider type is displayed.'
),

array(
"name" => "Static Image URL",
"id" => PEXETO_SHORTNAME."_blog_static_image",
"type" => "upload",
"desc" => 'The header image URL when "Static Header Image" selected above. Optimal image size: 980 x 370 pixels.',
),

array(
"name" => "Page Subtitle",
"id" => PEXETO_SHORTNAME."_posts_subtitle",
"type" => "text",
"desc" => "Available only when no slider has been selected above."
),

array(
"name" => "Intro Text",
"id" => PEXETO_SHORTNAME."_posts_intro",
"type" => "text",
"desc" => "This is the intro text that will be displayed below the header."
),

array(
"name" => "Show portfolio projects in the bottom of the blog page",
"id" => PEXETO_SHORTNAME."_blog_carousel",
"type" => "select",
"none" => true,
"options" => $portf_categories,
"std" => 'hide',
"description" => 'Displays a carousel(slider) containing the portfolio project images from the selected category in the bottom of the page.'
),

array(
"name" => "Portfolio projects title",
"id" => PEXETO_SHORTNAME."_blog_carousel_title",
"type" => "text",
"desc" => 'The title of the portfolio projects carousel - available only when the "Show portfolio projects in the bottom of the blog page"
		field above is enabled.'
),


array(
"name" => "Exclude categories from blog",
"id" => PEXETO_SHORTNAME."_exclude_cat_from_blog",
"type" => "multicheck",
"options" => $pexeto_categories,
"class"=>"exclude",
"desc" => "You can select which categories not to be shown on the blog"),

array(
"name" => "Number of posts per page",
"id" => PEXETO_SHORTNAME."_post_per_page_on_blog",
"type" => "text",
"std" => "5"
),

array(
"name" => "Show sections from post info",
"id" => PEXETO_SHORTNAME."_exclude_post_sections",
"type" => "multicheck",
"options" => array(array("id"=>"date", "name"=>"Post Date"), array("id"=>"author", "name"=>"Post Author"), array("id"=>"category", "name"=>"Post Category"), array("id"=>"comments", "name"=>"Comment Number")),
"class"=>"exclude",
"desc" => "You can select which sections from the post info to be dispplayed.",
"std" => "")
,

array(
"name" => "Show post summary as",
"id" => PEXETO_SHORTNAME."_post_summary",
"type" => "select",
"options" => array(array('id'=>'readmore','name'=>"Separated with 'More' tag"), array('id'=>'excerpt','name'=>"Excerpt")),
"std" => 'readmore',
"desc" => "This is the way the summary is displayed. Using the 'More' tag is more flexible than using the excerpt. With this
option selected, only the text that is displayed before the 'More' tag will be displayed as summary. 
You can insert a 'More' tag by using the 'Insert More tag' button that is located above the main content area.
<br /><br />With the Excerpt option
selected, only the first several words of the post will be displayed as summary."
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * PORTFOLIO PAGE SETTINGS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'portfolio'
),

array(
"name" => "Page Layout",
"id" => PEXETO_SHORTNAME."_portfolio_layout",
"type" => "select",
"options" => array(array('id'=>'right','name'=>'Right Sidebar'), array('id'=>'left','name'=>'Left Sidebar'), array('id'=>'full','name'=>'Full width')),
"std" => 'right',
"desc" => 'This is the layout of the portfolio item content page'
),

array(
"name" => "Show comments",
"id" => PEXETO_SHORTNAME."_portfolio_comments",
"type" => "checkbox",
"std" =>'off'
),

array(
"name" => "Content sidebar",
"id" => PEXETO_SHORTNAME."_portfolio_sidebar",
"type" => "select",
"options" => $pexeto_data->pexeto_sidebars,
"std" => 'default',
"desc" => 'This is the sidebar that is displayed on the item content page.'
),

array(
"name" => "Portfolio carousel max item number",
"id" => PEXETO_SHORTNAME."_carousel_max_items",
"type" => "text",
"std" => "30",
"desc" => 'The portfolio carousel is the one that can be appended in the bottom of the page (or in the content by using
the [carousel] shortcode) - it displays the latest portfolio items from a category (or all categories). Here you can set
the maximum number of items to display in the carousel.'
),

array(
"name" => "Two column image width",
"id" => PEXETO_SHORTNAME."_portfolio_width2",
"desc" => "The image width in pixels in a two column portfolio gallery layout",
"std" => "450",
"type" => "text"),

array(
"name" => "Two column image height",
"id" => PEXETO_SHORTNAME."_portfolio_height2",
"std" => "250",
"desc" => "The image height in pixels in a two column portfolio gallery layout",
"type" => "text"),

array(
"name" => "Three column image width",
"id" => PEXETO_SHORTNAME."_portfolio_width3",
"desc" => "The image width in pixels in a three column portfolio gallery layout",
"std" => "284",
"type" => "text"),

array(
"name" => "Three column image height",
"id" => PEXETO_SHORTNAME."_portfolio_height3",
"std" => "190",
"desc" => "The image height in pixels in a three column portfolio gallery layout",
"type" => "text"),

array(
"name" => "Four column image width",
"id" => PEXETO_SHORTNAME."_portfolio_width4",
"desc" => "The image width in pixels in a four column portfolio gallery layout",
"std" => "201",
"type" => "text"),

array(
"name" => "Four column image height",
"id" => PEXETO_SHORTNAME."_portfolio_height4",
"std" => "130",
"desc" => "The image height in pixels in a four column portfolio gallery layout",
"type" => "text"),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * CONTACT PAGE SETTINGS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'contact'
),

array(
"name" => "Email to which to send contact form message",
"id" => PEXETO_SHORTNAME."_email",
"type" => "text"),


array(
"name" => "Ask your question",
"id" => PEXETO_SHORTNAME."_ask_question_text",
"type" => "text",
"std" => "Ask your question"
),

array(
"name" => "Name text",
"id" => PEXETO_SHORTNAME."_name_text",
"type" => "text",
"std" => "Name"
),

array(
"name" => "Your e-mail text",
"id" => PEXETO_SHORTNAME."_your_email_text",
"type" => "text",
"std" => "Your e-mail"
),

array(
"name" => "Question text",
"id" => PEXETO_SHORTNAME."_question_text",
"type" => "text",
"std" => "Question"
),

array(
"name" => "Send text",
"id" => PEXETO_SHORTNAME."_send_text",
"type" => "text",
"std" => "Send"
),

array(
"name" => "Message sent text",
"id" => PEXETO_SHORTNAME."_message_sent_text",
"type" => "text",
"std" => "Message sent"
),

array(
"name" => "Validation error message",
"id" => PEXETO_SHORTNAME."_contact_error",
"type" => "text",
"std" => "Please fill in all the fields correctly."
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * FEATURED PAGE SETTINGS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'featured'
),


array(
"name" => "Featured Category",
"id" => PEXETO_SHORTNAME."_featured_cat",
"type" => "select",
"options" => $pexeto_categories,
"desc" => "If you use the Featured Posts Template you can select the Featured category here."),

array(
"name" => "Number of posts to display",
"id" => PEXETO_SHORTNAME."_post_per_page_on_featured",
"type" => "text",
"std" => "3"
),

array(
"type" => "close"),

array(
"type" => "close"));

pexeto_add_options($pexeto_pages_options);