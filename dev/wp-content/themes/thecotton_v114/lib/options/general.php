<?php

$pexeto_general_options= array( array(
"name" => "General",
"type" => "title",
"img" => PEXETO_IMAGES_URL."icon_general.png"
),

array(
"type" => "open",
"subtitles"=>array(array("id"=>"main", "name"=>"Main Settings"), array("id"=>"sidebars", "name"=>"Sidebars"), array("id"=>"seo", "name"=>"SEO"))
),

/* ------------------------------------------------------------------------*
 * MAIN SETTINGS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'main'
),


array(
"name" => "Favicon image URL",
"id" => PEXETO_SHORTNAME."_favicon",
"type" => "upload",
"desc" => "Upload a favicon image - with .ico extention."
),

array(
"name" => "Widgetized Footer",
"id" => PEXETO_SHORTNAME."_widgetized_footer",
"type" => "checkbox",
"std" => 'on'),

array(
"name" => "Display page title on pages",
"id" => PEXETO_SHORTNAME."_show_page_title",
"type" => "checkbox",
"std" => 'on',
"desc" => 'If "ON" selected, the page title will be displayed in the beginning of the page content
as a main title. This option is available for the Default Page Template and Contact Page Template.'
),


array(
"name" => "Google Analytics Code",
"id" => PEXETO_SHORTNAME."_analytics",
"type" => "textarea",
"desc" => "You can paste your generated Google Analytics here and it will be automatically set to the theme."
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * SIDEBARS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'sidebars'
),

array(
"name"=>"Add Sidebar",
"id"=>'sidebars',
"type"=>"custom",
"button_text"=>'Add Sidebar',
"fields"=>array(
	array('id'=>'_sidebar_name', 'type'=>'text', 'name'=>'Sidebar Name')
),
"desc"=>"You can add as many custom sidebars you like and after that for each page you will be
able to assign a different sidebar/"
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * SEO
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'seo'
),

array(
"type" => "documentation",
"text" => '<div class="note_box">
		 <b>Note: </b> This section contains some basic SEO options. For more advanced options, you may consider
		 using a SEO plugin - some plugins that we recommend are <a href="http://wordpress.org/extend/plugins/wordpress-seo/">WordPress SEO by Yoast</a> 
		 and <a href="http://wordpress.org/extend/plugins/all-in-one-seo-pack/">All in One SEO Pack</a>
		</div>'
),

array(
"name" => "Site keywords",
"id" => PEXETO_SHORTNAME."_seo_keywords",
"type" => "text",
"desc" => 'The main keywords that describe your site, separated by commas. Example:<br />
<i>photography,design,art</i>'
),

array(
"name" => "Home Page Description",
"id" => PEXETO_SHORTNAME."_seo_description",
"type" => "textarea",
"desc" => "By default the Tagline set in <b>Settings &raquo; General</b> will be displayed as a description of the site. Here
you can set a description that will be displayed on your home page only."
),

array(
"name" => "Home page title",
"id" => PEXETO_SHORTNAME."_seo_home_title",
"type" => "text",
"desc" => 'This is the home page document title. By default the blog name is displayed and if you insert a title here,
it will be prepended to the blog name'
),

array(
"name" => "Page title separator",
"id" => PEXETO_SHORTNAME."_seo_serapartor",
"type" => "text",
"std" => '@',
"desc" => 'Separates the different title parts'
),

array(
"name" => "Page title for category browsing",
"id" => PEXETO_SHORTNAME."_seo_category_title",
"type" => "text",
"std" => 'Category &raquo; ',
"desc" => 'This is the page title that is set to the document when browsing a category - the title is built by the
text entered here, the name of the category and the name of the blog - for example:<br /><i>Category &raquo; Business &laquo; @  Blog name</i>'
),

array(
"name" => "Page title for tag browsing",
"id" => PEXETO_SHORTNAME."_seo_tag_title",
"type" => "text",
"std" => 'Tag &raquo; ',
"desc" => 'This is the page title that is set to the document when browsing a tag - the title is built by the
text entered here, the name of the tag and the name of the blog - for example:<br /><i>Tag &raquo; business &laquo; @  Blog name</i>'
),

array(
"name" => "Page title for search results",
"id" => PEXETO_SHORTNAME."_search_tag_title",
"type" => "text",
"std" => 'Search results &raquo; ',
"desc" => 'This is the page title that is set to the document when displaying search results - the title is built by the
text entered here, the search query and the name of the blog - for example:<br /><i>Search results &raquo;  business &laquo; @  Blog name</i>'
),

array(
"name" => "Exclude pages from indexation",
"id" => PEXETO_SHORTNAME."_seo_indexation",
"type" => "multicheck",
"options" => array(array('id'=>'category', 'name'=>'Category Archive'), array('id'=>'date', 'name'=>'Date Archive'), array('id'=>'tag', 'name'=>'Tag Archive'), array('id'=>'author', 'name'=>'Author Archive'), array('id'=>'search', 'name'=>'Search Results')),
"class"=>"exclude",
"desc" => 'Pages, such as archives pages, display some duplicate content - for example, the same post can be found on your main Blog
page, but also in a category archive, date archive, etc. Some search engines are reported to penalize sites associated with too much duplicate
content. Therefore, excluding the pages from this option will remove the search engine indexiation by adding "noindex" and
"nofollow" meta tags which would prevent the search engines to index this duplicate content. By default, all the pages are indexed. '),

array(
"type" => "close"),


array(
"type" => "close"));

pexeto_add_options($pexeto_general_options);