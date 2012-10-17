<?php

function theme_options_array(){
  $tfonts=array(
    "Verdana,Arial,sans-serif"=>"Verdana",
    "Tahoma,Arial,sans-serif"=>"Tahoma",
    "Helvetica,Arial,sans-serif"=>"Helvetica",
    "'Lucida Grande',Arial,sans-serif"=>"Lucida Grande",
    "Arial,Verdana,sans-serif"=>"Arial",
    "Georgia,Times,serif"=>"Georgia",
    "Trebuchet MS"=>"Trebuchet MS",
  );
  $hfonts=array(
    "Aaargh"=>"Aaargh",
    "Aller"=>"Aller",
    "Arial_Narrow"=>"Arial Narrow",
    "Aurulent_Sans"=>"Aurulent Sans",
    "BonvenoCF"=>"BonvenoCF",
    "Candela_Book"=>"Candela Book",
    "Caviar_Dreams"=>"Caviar Dreams",
    "Cicle"=>"Cicle",
    "Colaborate"=>"Colaborate",
    "Comfortaa"=>"Comfortaa",
    "Droid_Sans"=>"Droid Sans",
	"DroidItalic_Serif"=>"Droid Italic Serif",
    "Dustismo"=>"Dustismo",
    "GeosansLight"=>"Geosans Light",
    "GoodDog"=>"GoodDog",
    "GreyscaleBasic"=>"Greyscale Basic",
    "Hattori_Hanzo"=>"Hattori Hanzo",
    "Josefin_Sans"=>"Josefin Sans",
    "Lane_Narrow"=>"Lane Narrow",
    "Luxi_Sans"=>"Luxi Sans",
    "MgOpen_Canonica"=>"MgOpen Canonica",
    "MgOpen_Cosmetica"=>"MgOpen Cosmetica",
    "Myriad_Pro"=>"Myriad Pro",
	"Myriad_Pro_Bold_Condensed"=>"Myriad Pro Bold Condensed",
    "Nobile"=>"Nobile",
    "Philosopher"=>"Philosopher",
    "PT_Sans_Caption"=>"PT Sans Caption",
    "PT_Sans_Narrow"=>"PT Sans Narrow",
    "Quicksand_Book"=>"Quicksand Book",
    "Raleway"=>"Raleway",
    "Samba"=>"Samba",
    "Sansation"=>"Sansation",
    "Santana"=>"Santana",
    "Segan"=>"Segan",
    "TitilliumText11"=>"Titillium Text Thin",
    "TitilliumText22"=>"Titillium Text Reg",
    "Vegur"=>"Vegur",
    "Walkway"=>"Walkway",
    "Yanone_Kaffeesatz"=>"Yanone Kaffeesatz",
  );
  $stemplates=array(
    "none"=>"Full width",
    "left"=>"Left sidebar",
    "right"=>"Right sidebar",
    );
  $hpatterns=array(
    "pattern1.png"=>"Pattern 1",
	"pattern2.png"=>"Pattern 2",
	"pattern18.png"=>"Pattern 3",
	"pattern4.png"=>"Pattern 4",
	"pattern3.png"=>"Left Strip Pattern",	
	"pattern5.png"=>"Right Strip Pattern",
	"pattern6.png"=>"Vertical Strip Pattern",
	"pattern7.png"=>"Horizontal Strip Pattern",
	"pattern8.png"=>"Square Pattern",
	"pattern9.png"=>"Square Pattern 2",
	"pattern10.png"=>"Pattern 10 white",
	"pattern11.png"=>"Pattern 10 black ",
	"pattern12.png"=>"Whirlpool Pattern",
	"pattern13.png"=>"Flower Pattern",
	"pattern14.png"=>"Wave Pattern",
	"pattern15.png"=>"Waved Strip Pattern",
	"pattern16.png"=>"Circle Pattern",
	"pattern17.png"=>"Maze Pattern",	
	);


  $options=array(

    // MAIN PAGE OPTIONS
    "main"=>array("title"=>__("Theme Options",'teardrop'),

      // GENERAL SECTION
      __("General",'teardrop')=>array(
        array("options"=>array("title"=>__("Site Logo",'teardrop'), "class"=>"section-upload"),
            "logo_main"=>array("name"=>__('Site Logo'),
              "type"=>"image",
              "desc"=>__("Upload a custom logo (JPG, PNG, GIF) for your Website",'teardrop'),
              "std"=>""
            ),
        ),
        array("options"=>array("title"=>__("Admin Logo",'teardrop'), "class"=>"section-upload"),
            "logo_admin"=>array("name"=>__('Admin Logo'),
              "type"=>"image",
              "desc"=>__("Upload a custom logo (JPG, PNG, GIF) for your Wordpress login screen"),
              "std"=>""
            ),
        ),
        array("options"=>array("title"=>__("Site Favicon",'teardrop'), "class"=>"section-upload"),
            "favicon"=>array("name"=>__('Site Favicon'),
              "type"=>"image",
              "desc"=>__("Upload a 16x16px image (ICO, JPG, PNG, GIF) that will your website's favicon",'teardrop'),
              "std"=>""
            )
        ),
		array("options"=>array("title"=>__("Read More Options",'teardrop')),
            "readmore_type"=>array("name"=>__('Readmore Type','teardrop'),
              "type"=>"select",
              "options"=>array(
                "button"=>__("Button",'teardrop'),
                "link"=>__("Link",'teardrop')
              ),
              "desc"=>__("Readmore Type",'teardrop'),
              "std"=>"button"
            ),
            "readmore_text"=>array("name"=>__('Readmore Text','teardrop'),
              "type"=>"text",
              "desc"=>__("Readmore Text",'teardrop'),
              "std"=>"read more"
            ),
        ),
        array("options"=>array("title"=>__("Breadcrumb navigation",'teardrop')),
            "breadcrumb_show"=>array("name"=>__('Show breadcrumb navigation','teardrop'),
              "type"=>"checkbox",
              "desc"=>__("Uncheck to hide breadcrumb navigation",'teardrop'),
              "std"=>"false"
            ),
        ),
		array("options"=>array("title"=>__("Feedback Form",'teardrop')),
            "feedback_email"=>array("name"=>__('Feedback Email','teardrop'),
              "type"=>"text",
              "desc"=>__("Enter your email for feedback messages",'teardrop'),
              "std"=>""
            ),
            "feedback_message"=>array("name"=>__('Feedback Message','teardrop'),
              "type"=>"text",
              "desc"=>__("Success feedback message",'teardrop'),
              "std"=>"Thanks! Your message was sent."
            ),
        ),
        array("options"=>array("title"=>__("Tracking code",'teardrop')),
            "custom_footer"=>array("name"=>__('Footer Custom Code','teardrop'),
              "type"=>"textarea",
              "desc"=>__("Paste your Google Analytics or other tracking code here",'teardrop'),
              "std"=>""
            ),
		),
		array("options"=>array("title"=>__("Footer copyrights",'teardrop')),
            "copyrights"=>array("name"=>__('Paste your copyrights text here','teardrop'),
              "type"=>"textarea",
              "desc"=>__("Paste your copyrights text here. You may use these HTML tags and attributes",'teardrop'),
              "std"=>"Copyright © 2011 teardropTheme by <a href='http://themeforest.net/user/kotofey?ref=kotofey'>kotofey</a> for <a href='http://themeforest.net?ref=kotofey'>ThemeForest.net</a>"
            ),
        ),
        array("options"=>array("title"=>__("Custom CSS",'teardrop')),
            "custom_css"=>array("name"=>__('Paste your custom css here','teardrop'),
              "type"=>"textarea",
              "desc"=>__("Paste your custom css here",'teardrop'),
              "std"=>".readmore {}"
            ),
        ),
      ),
	  
  
	  // PORTFOLIO SECTION
      __("Portfolio",'teardrop')=>array(
		array("options"=>array("title"=>__("Default template for portfolio item",'teardrop')),
            "template_portfolio"=>array("name"=>__('Default template for portfolio item','teardrop'),
              "type"=>"select",
              "desc"=>__("Select the default template for single post from the portfolio. Use drop-down list",'teardrop'),
              "options"=>$stemplates,
              "std"=>"right"
            ),
		),
		array("options"=>array("title"=>__("Categories",'teardrop')),
	  		"category_columns"=>array("name"=>__('Default columns in category','teardrop'),
              "type"=>"select",
              "options"=>array(
                "_table_3"=>"1",
				"_table_2"=>"2",
				"_table"=>"3",
				"_table_4"=>"Magic style",
              ),
              "desc"=>__("Default columns in category",'teardrop'),
              "std"=>"3"
            ),
		),
		array("options"=>array("title"=>__("Items per page",'teardrop')),
		    "portfolio_items"=>array("name"=>__('Items per page','teardrop'),
            "type"=>"text",
            "desc"=>__("Enter the number of displayed works on the one column template page",'teardrop'),
            "std"=>"6"
          ),		  
		),
      ),
	  
	  
	  	  // BLOG SECTION
      __("Blog",'teardrop')=>array(
	  array("options"=>array("title"=>__("Default template for blog item",'teardrop')),
            "template_post"=>array("name"=>__('Default template for blog item','teardrop'),
              "type"=>"select",
              "desc"=>__("Select the default template for single post from the blog. Use drop-down list",'teardrop'),
              "options"=>$stemplates,
              "std"=>"right"
            ),
		),
        array("options"=>array("title"=>__("Appearance",'teardrop')),
          "blog_date_show"=>array("name"=>__('Show date','teardrop'),
            "type"=>"checkbox",
            "desc"=>__("Uncheck to hide the date near the title",'teardrop'),
            "std"=>"true"
          ),
		  "blog_author_show"=>array("name"=>__('Show author','teardrop'),
            "type"=>"checkbox",
            "desc"=>__("Uncheck to hide the author"),
            "std"=>"true"
          ),
		  "blog_comments_show"=>array("name"=>__('Show comments count','teardrop'),
            "type"=>"checkbox",
            "desc"=>__("Uncheck to hide the comments count",'teardrop'),
            "std"=>"true"
          ),
		  "blog_category_show"=>array("name"=>__('Show the category','teardrop'),
            "type"=>"checkbox",
            "desc"=>__("Uncheck to hide the category",'teardrop'),
            "std"=>"true"
          ),
		  "blog_single_meta_show"=>array("name"=>__('Show post meta on the single post page','teardrop'),
            "type"=>"checkbox",
            "desc"=>__("Uncheck to hide the post meta on single post page",'teardrop'),
            "std"=>"true"
          ),
		  "blog_image_show"=>array("name"=>__('Show featured image on the single post page','teardrop'),
            "type"=>"checkbox",
            "desc"=>__("Uncheck to hide featured image on single post page",'teardrop'),
            "std"=>"true"
          ),
		),
		array("options"=>array("title"=>__("Items per page",'teardrop')),
		    "blog_items"=>array("name"=>__('Items per page','teardrop'),
            "type"=>"text",
            "desc"=>__("Enter the number of displayed posts on the same page",'teardrop'),
            "std"=>"3"
          ),		  
		),
      ),
	  
	  // FULLSCREEN BACKGROUND
      __("Background",'teardrop')=>array(
	  array("options"=>array("title"=>__("Source",'teardrop')),
	  		"fullscreen_stream"=>array("name"=>__('Source images','teardrop'),
              "type"=>"select",
              "options"=>array(
                "supersized.js"=>"Background image",
				"supersized.flickr.js"=>"Flickr stream",
              ),
              "desc"=>__("Select source for background images",'teardrop'),
              "std"=>"supersized.js"
            ),
		),
		array("options"=>array("title"=>__("Flickr settings",'teardrop')),
			"sflickr_userid"=>array("name"=>__('Flickr user ID','teardrop'),
              "type"=>"text",
              "desc"=>__("Flickr user ID (<a href='http://idgettr.com/', target='_blank'>http://idgettr.com/</a>)",'teardrop'),
              "std"=>""
            ),
			"sflickr_api"=>array("name"=>__('Flickr API Key','teardrop'),
              "type"=>"text",
              "desc"=>__("Flickr API key. Need to get your own (<a href='http://www.flickr.com/services/apps/create/', target='_blank'>http://www.flickr.com/services/apps/create/</a>)",'teardrop'),
              "std"=>""
            ),
			"sflickr_icount"=>array("name"=>__('Images count','teardrop'),
              "type"=>"text",
              "desc"=>__("How many pictures to pull (Between 1-500)",'teardrop'),
              "std"=>"10"
            ),
			"sflickr_isize"=>array("name"=>__('Images size','teardrop'),
              "type"=>"select",
			  "options"=>array(
         		"s"=>"Small square (75x75)",
				"t"=>"Thumbnail (100 on longest side)",
                "m"=>"Small (240 on longest side)",
                "z"=>"Medium (640 on longest side)",
                "b"=>"Large(1024 on longest side)",
              ),
              "desc"=>__("Flickr Image Size (<a href='http://www.flickr.com/services/api/misc.urls.html', target='_blank'>http://www.flickr.com/services/api/misc.urls.html</a>",'teardrop'),
              "std"=>"z"
            ),
			
            		
        ),
        array("options"=>array("title"=>__("Animation Effects",'teardrop')),
            "fullscreen_effect"=>array("name"=>__('Animation Effect','teardrop'),
              "type"=>"select",
              "options"=>array(
                "0"=>"None",
				"1"=>"Fade",
                "2"=>"Slide Top",
                "3"=>"Slide Right",
                "4"=>"Slide Bottom",
                "5"=>"Slide Left",
                "6"=>"Carousel Right",
                "7"=>"Carousel Left",
              ),
              "desc"=>__("Animation Effect",'teardrop'),
              "std"=>"1"
            ),
			"fullscreen_transition"=>array("name"=>__('Transition Speed','teardrop'),
              "type"=>"text",
              "desc"=>__("Transition Speed",'teardrop'),
              "std"=>"1000"
            ),			
            "fullscreen_delay"=>array("name"=>__('Length between transitions','teardrop'),
              "type"=>"text",
              "desc"=>__("Length between transitions",'teardrop'),
              "std"=>"4000"
            ),
        ),
		array("options"=>array("title"=>__("Slideshow performance",'teardrop')),
		"fullscreen_performance"=>array("name"=>__('Slideshow performance','teardrop'),
              "type"=>"select",
              "options"=>array(
                "0"=>"Normal",
				"1"=>"Hybrid speed/quality",
                "2"=>"Optimizes image quality",
                "3"=>"Optimizes transition speed (Only works for Firefox/IE, not Webkit)",
              ),
              "desc"=>__("Slideshow performance",'teardrop'),
              "std"=>"0"
            ),
		),
        array("options"=>array("title"=>__("Other options",'teardrop')),
			"fullscreen_start_slide"=>array("name"=>__('Start slide','teardrop'),
              "type"=>"text",
              "desc"=>__("Start slide (0 is random)",'teardrop'),
              "std"=>"0"
            ),
            "fullscreen_protect"=>array("name"=>__('Image protect','teardrop'),
              "type"=>"checkbox",
              "desc"=>__("Disables image dragging and right click with Javascript",'teardrop'),
              "std"=>"true"
            ),
            "fullscreen_nav_keyb"=>array("name"=>__('Navigation Throught Keyboard','teardrop'),
              "type"=>"checkbox",
              "desc"=>__("Navigation Throught Keyboard",'teardrop'),
              "std"=>"true"
            ),
			"fullscreen_dotted_pat"=>array("name"=>__('Dotted pattern','teardrop'),
              "type"=>"checkbox",
              "desc"=>__("Enable dotted pattern over the image",'teardrop'),
              "std"=>"true"
            ),			
        ),
      ),

	  // FULLSCREEN BACKGROUND
      __("Lightbox",'teardrop')=>array(
	  array("options"=>array("title"=>__("Settings",'teardrop')),
		"lightbox_theme"=>array("name"=>__('Lightbox theme','teardrop'),
              "type"=>"select",
              "options"=>array(
                "pp_default"=>"Default",
				"light_rounded"=>"Light rounded",
				"dark_rounded"=>"Dark rounded",
				"light_square"=>"Light square",
				"dark_square"=>"Dark square",
				"facebook"=>"Facebook",
              ),
              "desc"=>__("Select lightbox theme",'teardrop'),
              "std"=>"dark_rounded"
            ),
	  		"lightbox_speed"=>array("name"=>__('Animation speed','teardrop'),
              "type"=>"select",
              "options"=>array(
                "fast"=>"Fast",
				"normal"=>"Normal",
				"slow"=>"Slow",
              ),
              "desc"=>__("Select animation speed",'teardrop'),
              "std"=>"normal"
            ),
			"lightbox_social"=>array("name"=>__('Show social tools','teardrop'),
              "type"=>"select",
              "options"=>array(
                ""=>"Show social icons",
				"social_tools: false,"=>"Hide social icons",
              ),
			  "desc"=>__("Social tools settings",'teardrop'),
              "std"=>""
            ),
			"lightbox_opacity"=>array("name"=>__('Lightbox opacity','teardrop'),
              "type"=>"text",
              "desc"=>__("Set lightbox opacity. Value between 0 and 1 (example: 0.3)",'teardrop'),
              "std"=>"0.4"
            ),
		),
	 ),            		
		
      // COLORS SECTION
      __("Colors",'teardrop')=>array(
        array("options"=>array("title"=>__("Links color",'teardrop')),
            "color_a"=>array("name"=>__('Enter your color code for links or select by color picker','teardrop'),
              "type"=>"color",
              "desc"=>__("Enter your color code for links or select by color picker",'teardrop'),
              "std"=>"#bcd8e0"
            ),
		),
		array("options"=>array("title"=>__("Links hover color",'teardrop')),
			"color_b_hover"=>array("name"=>__('Links hover color','teardrop'),
              "type"=>"color",
              "desc"=>__("Enter your color code for hover link or select by color picker",'teardrop'),
              "std"=>"#00b8f0"
            ),
		),
		array("options"=>array("title"=>__("Read more button",'teardrop')),
            "color_b"=>array("name"=>__('Read more button color','teardrop'),
              "type"=>"color",
              "desc"=>__("Enter your color code for read more button or select by color picker",'teardrop'),
              "std"=>"#404040"
            ),
		),
		array("options"=>array("title"=>__("Read more button hover",'teardrop')),
            "color_b_bhover"=>array("name"=>__('Read more button hover color','teardrop'),
              "type"=>"color",
              "desc"=>__("Enter your color code for read more button when hover on or select by color picker",'teardrop'),
              "std"=>"#545454"
            ),
		),
		array("options"=>array("title"=>__("Read more button text",'teardrop')),
            "color_b_text"=>array("name"=>__('Read more button text color','teardrop'),
              "type"=>"color",
              "desc"=>__("Enter your color code for read more button text or select by color picker",'teardrop'),
              "std"=>"#ffffff"
            ),
		),
		array("options"=>array("title"=>__("Body text",'teardrop')),
			"color_content_text"=>array("name"=>__('Content text color','teardrop'),
              "type"=>"color",
              "desc"=>__("Enter your color code for body text or select by color picker",'teardrop'),
              "std"=>"#e0e0e0"
            ),
		),
		array("options"=>array("title"=>__("H1",'teardrop')),
            "color_h"=>array("name"=>__('H1 color','teardrop'),
              "type"=>"color",
              "desc"=>__("Enter your color code for H1 or select by color picker",'teardrop'),
              "std"=>"#ffffff"
            ),
		),
		array("options"=>array("title"=>__("H2",'teardrop')),
            "color_h2"=>array("name"=>__('H2 color','teardrop'),
              "type"=>"color",
              "desc"=>__("Enter your color code for H2 or select by color picker",'teardrop'),
              "std"=>"#ffffff"
            ),
		),
		array("options"=>array("title"=>__("H3, H4, H5, H6",'teardrop')),
            "color_hh"=>array("name"=>__('H3, H4, H5, H6 color','teardrop'),
              "type"=>"color",
              "desc"=>__("Enter your color code for H3-H6 or select by color picker",'teardrop'),
              "std"=>"#ffffff"
            ),
		),  
		array("options"=>array("title"=>__("Menu links color",'teardrop')),
            "color_menu_links"=>array("name"=>__('Menu links color','teardrop'),
              "type"=>"color",
              "desc"=>__("Enter your color code for menu links or select by color picker",'teardrop'),
              "std"=>"#ffffff"
            ),
		),
		array("options"=>array("title"=>__("Menu links color hover",'teardrop')),
            "color_menu_links_hov"=>array("name"=>__('Menu links color hover','teardrop'),
              "type"=>"color",
              "desc"=>__("Enter your color code for menu links or select by color picker",'teardrop'),
              "std"=>"#777777"
            ),
		),
		array("options"=>array("title"=>__("Images border color",'teardrop')),
            "color_image_border"=>array("name"=>__('Images border color','teardrop'),
              "type"=>"color",
              "desc"=>__("Enter your color code for images border or select by color picker",'teardrop'),
              "std"=>"#404040"
            ),
		), 
		array("options"=>array("title"=>__("Meta background color",'teardrop')),
            "color_meta"=>array("name"=>__('Meta background color','teardrop'),
              "type"=>"color",
              "desc"=>__("Enter your color code for meta background or select by color picker",'teardrop'),
              "std"=>"#404040"
            ),
		), 
		array("options"=>array("title"=>__("Body background color",'teardrop')),
            "color_body_bg"=>array("name"=>__('Body background color','teardrop'),
              "type"=>"color",
              "desc"=>__("Enter your color code for body or select by color picker",'teardrop'),
              "std"=>"#666666"
            ),
		),
		array("options"=>array("title"=>__("Content background color",'teardrop')),
            "color_content_bg"=>array("name"=>__('Content background color','teardrop'),
              "type"=>"color",
              "desc"=>__("Enter your color code for content or select by color picker",'teardrop'),
              "std"=>"#232323"
            ),
		),
		array("options"=>array("title"=>__("Header background color",'teardrop')),
            "color_header_bg"=>array("name"=>__('Header background color','teardrop'),
              "type"=>"color",
              "desc"=>__("Enter your color code for header or select by color picker",'teardrop'),
              "std"=>"#232323"
            ),
		),
		array("options"=>array("title"=>__("Footer background color",'teardrop')),
            "color_footer_bg"=>array("name"=>__('Footer background color','teardrop'),
              "type"=>"color",
              "desc"=>__("Enter your color code for footer or select by color picker",'teardrop'),
              "std"=>"#232323"
            ),
		), 
		array("options"=>array("title"=>__("Menu background color",'teardrop')),
            "color_menu_bg"=>array("name"=>__('Menu background color','teardrop'),
              "type"=>"color",
              "desc"=>__("Enter your color code for menu or select by color picker",'teardrop'),
              "std"=>"#232323"
            ),
		),
		array("options"=>array("title"=>__("Background pattern",'teardrop')),
            "pattern_body"=>array("name"=>__('Background pattern','teardrop'),
              "type"=>"select",
              "desc"=>__("Select pattern from drop-down list",'teardrop'),
              "options"=>$hpatterns,
              "std"=>"pattern2.png"
            ),
		), 		
      ),

      // FONTS SECTION
      __("Fonts",'teardrop')=>array(
        array("options"=>array("title"=>__("Main font family",'teardrop')),
            "font_content"=>array("name"=>__('Body font'),
              "type"=>"select",
              "desc"=>__("Select your main font family for content from drop-down list",'teardrop'),
              "options"=>$tfonts,
              "std"=>"Verdana"
            ),
		),
		array("options"=>array("title"=>__("Main font family size",'teardrop')),
            "font_content_size"=>array("name"=>__('Main font family size','teardrop'),
              "type"=>"text",
              "desc"=>__("Enter the font size for main content in px",'teardrop'),
              "std"=>"12"
            ),
        ),
        array("options"=>array("title"=>__("H1, H2, H3, H4, H5, H6 font family",'teardrop')),
            "font_headers1"=>array("name"=>__('H1, H2, H3, H4, H5, H6 font family','teardrop'),
              "type"=>"select",
              "desc"=>__("Select your font family for H1, H2, H3, H4, H5, H6 heading from drop-down list",'teardrop'),
              "options"=>$hfonts,
              "std"=>"Droid_Sans"
            ),
		),
		array("options"=>array("title"=>__("Date font family",'teardrop')),
            "font_date"=>array("name"=>__('Date font family','teardrop'),
              "type"=>"select",
              "desc"=>__("Select your font family for blog date from drop-down list",'teardrop'),
              "options"=>$hfonts,
              "std"=>"Droid_Sans"
            ),
		),
		array("options"=>array("title"=>__("Nav menu font family",'teardrop')),
            "font_headers2"=>array("name"=>__('Nav menu font family','teardrop'),
              "type"=>"select",
              "desc"=>__("Select your font family for nav menu from drop-down list",'teardrop'),
              "options"=>$hfonts,
              "std"=>"Droid_Sans"
            ),
		),
		array("options"=>array("title"=>__("H1 font size",'teardrop')),
            "h1_size"=>array("name"=>__('H1 font size','teardrop'),
              "type"=>"text",
              "desc"=>__("Enter the font size for H1 in px",'teardrop'),
              "std"=>"42"
            ),
		),
		array("options"=>array("title"=>__("H2 font size",'teardrop')),
            "h2_size"=>array("name"=>__('H2 font size','teardrop'),
              "type"=>"text",
              "desc"=>__("Enter the font size for H2 in px",'teardrop'),
              "std"=>"24"
            ),
		),
		array("options"=>array("title"=>__("H3 font size",'teardrop')),
            "h3_size"=>array("name"=>__('H3 font size','teardrop'),
              "type"=>"text",
              "desc"=>__("Enter the font size for H3 in px",'teardrop'),
              "std"=>"22"
            ),
		),
		array("options"=>array("title"=>__("H4 font size",'teardrop')),
            "h4_size"=>array("name"=>__('H4 font size','teardrop'),
              "type"=>"text",
              "desc"=>__("Enter the font size for H4 in px",'teardrop'),
              "std"=>"20"
            ),
		),
		array("options"=>array("title"=>__("H5 font size",'teardrop')),
            "h5_size"=>array("name"=>__('H5 font size','teardrop'),
              "type"=>"text",
              "desc"=>__("Enter the font size for H5 in px",'teardrop'),
              "std"=>"18"
            ),
		),
		array("options"=>array("title"=>__("H6 font size",'teardrop')),
            "h6_size"=>array("name"=>__('H6 font size','teardrop'),
              "type"=>"text",
              "desc"=>__("Enter the font size for H6 in px",'teardrop'),
              "std"=>"14"
            ),
        ),
      ),
	  
	// SOCIAL SECTION
    __("Socials",'teardrop')=>array(
        array("options"=>array("title"=>__("Facebook link",'teardrop')),
            "social_facebook"=>array("name"=>__('Enter your link to your facebook account or leave this field blank','teardrop'),
              "type"=>"text",
              "desc"=>__("Enter your link to your facebook account or leave this field blank",'teardrop'),
              "std"=>""
            ),
		),
		array("options"=>array("title"=>__("Twitter link",'teardrop')),
            "social_ftwitter"=>array("name"=>__('Enter your link to your twitter account or leave this field blank','teardrop'),
              "type"=>"text",
              "desc"=>__("Enter your link to your twitter account or leave this field blank",'teardrop'),
              "std"=>""
            ),
		),
		array("options"=>array("title"=>__("Flickr link",'teardrop')),
            "social_flickr"=>array("name"=>__('Enter your link to your flickr account or leave this field blank','teardrop'),
              "type"=>"text",
              "desc"=>__("Enter your link to your flickr account or leave this field blank",'teardrop'),
              "std"=>""
            ),
		),
		array("options"=>array("title"=>__("Linkedin link",'teardrop')),
            "social_linkedin"=>array("name"=>__('Enter your link to your linkedin account or leave this field blank','teardrop'),
              "type"=>"text",
              "desc"=>__("Enter your link to your linkedin account or leave this field blank",'teardrop'),
              "std"=>""
            ),
		),
      ),

    ), // END MAIN PAGE

  );

  return $options;
}