<?php 
/* CRUZ Theme Admin Options */

load_theme_textdomain( 'cruz', TEMPLATEPATH . '/languages' );
$themename = 'CRUZ';
$shortname = 'crz';
$options = array (
				array(	"type" => "wrap_start" ),
				
				array(	"type" => "tabs_start" ),
						
				array(	"name" => __( 'General', 'cruz' ),
						"id" => $shortname."_general",
						"type" => "heading"),
						
				array(	"name" => __( 'Slider', 'cruz' ),
						"id" => $shortname."_slider_area",
						"type" => "heading"),
						
				
				array(	"name" => __( 'Single', 'cruz' ),
						"id" => $shortname."_single",
						"type" => "heading"),
						
				array(	"name" => __( 'Headings', 'cruz' ),
						"id" => $shortname."_headings",
						"type" => "heading"),
						
				array(	"type" => "tabs_end" ),
				
				array(	"type" => "tabbed_start",
						"id" => $shortname."_general" ),
						
				array(	"name" => __( 'General Settings for the theme', 'cruz' ),
						"type" => "subheading" ),
						
				array(	"name" => __( 'Layout Style:', 'cruz' ),
						"desc" => __( 'Select a layout style for your theme', 'cruz' ),
						"id" => $shortname."_layout",
						"std" => "boxed",
						"type" => "select",
						"options" => array("boxed", "stretched")),																	
					
				array(  "name" => __( 'Display Blog Name:', 'cruz' ),
						"desc" => __( 'Check to display blog name and description in place of Logo.', 'cruz' ),
						"id" => $shortname."_blog_name",
						"type" => "checkbox",
						"std" => "false"),	
						
				array(	"name" => __( 'Custom Logo URL:', 'cruz' ),
						"desc" => __( 'Enter full URL of your Logo image.', 'cruz' ),
						"id" => $shortname."_logo",
						"std" => "",
						"type" => "text"),																		
						
				array(	"name" => __( 'Logo MarginTop(px):', 'cruz' ),
						"desc" => __( 'Enter a top margin for Logo or Blog name', 'cruz' ),
						"id" => $shortname."_logo_mrgtop",
						"std" => "30",
						"type" => "text"),	
						
				array(	"name" => __( 'Logo MarginBottom(px):', 'cruz' ),
						"desc" => __( 'Enter a bottom margin for Logo or Blog name', 'cruz' ),
						"id" => $shortname."_logo_mrgbtm",
						"std" => "30",
						"type" => "text"),
						
				array(	"name" => __( 'Global Sidebar Placement:', 'cruz' ),
						"desc" => __( 'Select a placement for sidebar', 'cruz' ),
						"id" => $shortname."_sidebar",
						"std" => "right",
						"type" => "select",
						"options" => array("right", "left")),
						
				array(	"name" => __( 'Meta Keywords for SEO:', 'cruz' ),
						"desc" => __( 'Enter a brief and concise list of some unique keywords that best describes the content of your page. Seperate each keyword with comma.', 'cruz' ),
						"id" => $shortname."_meta_keywords",
						"std" => "",
						"type" => "textarea"),					
						
				array(	"name" => __( 'Google Analytics Code:', 'cruz' ),
						"desc" => __( 'Enter your Google Analytics ID code. For ex: UA-XXXXXXXX-X', 'cruz' ),
						"id" => $shortname."_analytics",
						"std" => "UA-15840210-1",
						"type" => "text"),						
						
				array(	"name" => __( 'Contact e-mail:', 'cruz' ),
						"desc" => __( 'Enter the e-mail address to which mail should be recieved from contact page.', 'cruz' ),
						"id" => $shortname."_email",
						"std" => "saagar_1982@yahoo.com",
						"type" => "text"),
						
				array(	"name" => __( 'Mail Sent Message:', 'cruz' ),
						"desc" => __( 'Enter your copyright details and other footer information here. You can use <code>HTML</code> here.', 'cruz' ),
						"id" => $shortname."_success_msg",
						"std" => __( '<h4>Thank You! Your message has been sent.</h4>', 'cruz' ),
						"type" => "textarea"),
						
				array(	"name" => __( 'Custom Footer Text (Left):', 'cruz' ),
						"desc" => __( 'Enter custom text for left side of the footer. You can use <code>HTML</code> here.', 'cruz' ),
						"id" => $shortname."_footer_left",
						"std" => "",
						"type" => "textarea"),
						
				array(	"name" => __( 'Custom Footer Text (Right):', 'cruz' ),
						"desc" => __( 'Enter custom text for right side of the footer. You can use <code>HTML</code> here.', 'cruz' ),
						"id" => $shortname."_footer_right",
						"std" => "",
						"type" => "textarea"),						
					
				array(	"type" => "tabbed_end" ),
				
				array(	"type" => "tabbed_start",
						"id" => $shortname."_slider_area" ),
						
				array(	"name" => __( 'Slider Settings', 'cruz' ),
						"type" => "subheading" ),																														
						
				array(  "name" => __( 'Hide Slider:', 'cruz' ),
						"desc" => __( 'Check to hide slider on home page.', 'cruz' ),
						"id" => $shortname."_hide_slider",
						"type" => "checkbox",
						"std" => "false"),	
						
				array(	"name" => __( 'Slider Type:', 'cruz' ),
						"desc" => __( 'Select a slider - Cycle Slider or Nivo Slider', 'cruz' ),
						"id" => $shortname."_slider_type",
						"std" => "cycle",
						"type" => "select",
						"options" => array("cycle", "nivo")),											
						
				array(	"name" => __( 'Category ID to fetch images from:', 'cruz' ),
						"desc" => __( 'Enter your featured category ID (or IDs separated by comma) from which images will be shown on slider.', 'cruz' ),
						"id" => $shortname."_feat_cat_id",
						"std" => "1",
						"type" => "text"),
						
				array(	"name" => __( 'Number of slides to show:', 'cruz' ),
						"desc" => __( 'Enter number of slides to show.', 'cruz' ),
						"id" => $shortname."_num_of_slides",
						"std" => "2",
						"type" => "text"),
						
				array(	"name" => __( 'Order of slides:', 'cruz' ),
						"desc" => __( 'Select an order - Ascending or descending', 'cruz' ),
						"id" => $shortname."_feat_order",
						"std" => "desc",
						"type" => "select",
						"options" => array("desc", "asc")),
						
				array(	"name" => __( 'Slider Height (px):', 'cruz' ),
						"desc" => __( 'Enter a height for slider', 'cruz' ),
						"id" => $shortname."_sl_ht",
						"std" => "360",
						"type" => "text"),										
						
				array(	"type" => "tabbed_end" ),			
				
				array(	"type" => "tabbed_start",
						"id" => $shortname."_single" ),
						
				array(	"name" => __( 'Single Post Settings', 'cruz' ),
						"type" => "subheading" ),						
						
					array(  "name" => __( 'Show Author Bio:', 'cruz' ),
						"desc" => __( 'Check to display Author bio on single posts.', 'cruz' ),
						"id" => $shortname."_author",
						"type" => "checkbox",
						"std" => "false"),
						
				array(  "name" => __( 'Show related posts:', 'cruz' ),
						"desc" => __( 'Check to display related posts on single posts.', 'cruz' ),
						"id" => $shortname."_rp",
						"type" => "checkbox",
						"std" => "false"),
						
				array(	"name" => __( 'Related posts taxonomy:', 'cruz' ),
						"desc" => __( 'Select a taxonomy for related posts.', 'cruz' ),
						"id" => $shortname."_rp_taxonomy",
						"std" => "tags",
						"type" => "select",
						"options" => array("tags", "category")),
						
				array(	"name" => __( 'Related posts display style:', 'cruz' ),
						"desc" => __( 'Select a display style for related posts.', 'cruz' ),
						"id" => $shortname."_rp_style",
						"std" => "thumbnail",
						"type" => "select",
						"options" => array("thumbnail", "list")),
						
				array(	"name" => __( 'Number of related posts to show:', 'cruz' ),
						"desc" => __( 'Enter a number for posts to show.', 'cruz' ),
						"id" => $shortname."_rp_num",
						"std" => "4",
						"type" => "text"),
																
				array(	"type" => "tabbed_end" ),
				
				array(	"type" => "tabbed_start",
						"id" => $shortname."_headings" ),
						
				array(	"name" => __( 'Global Heading Settings', 'cruz' ),
						"type" => "subheading" ),	
						
				array(  "name" => __( 'Use custom heading settings:', 'cruz' ),
						"desc" => __( 'Check to use your custom heading settings. Your custom settings will only take effect if you enable this option.', 'cruz' ),
						"id" => $shortname."_custom_headings",
						"type" => "checkbox",
						"std" => "false"),												
						
				array(	"name" => __( 'Heading Font:', 'cruz' ),
						"desc" => __( 'Select a font for headings', 'cruz' ),
						"id" => $shortname."_heading_font",
						"std" => "Open Sans",
						"type" => "select",
						"options" => array("Open Sans", "Arial", "Georgia", "Allan", "Allerta", "Anton", "Arimo", "Arvo", "Cabin", "Calligraffitti", "Cantarell", "Cardo", "Chewy", "Copse", "Crafty Girls", "Crimson Text", "Crushed", "Cuprum", "Dancing Script", "Droid Sans", "Droid Serif", "EB Garamond", "Expletus Sans", "Gruppo", "Judson", "Just Another Hand", "Kreon", "Lobster", "Luckiest Guy", "Merriweather", "Metrophobic", "Molengo", "Neuton", "Nobile", "Open Sans Condensed", "Orbitron", "Play", "PT Sans", "PT Serif", "Philosopher", "Rokkitt", "Tangerine", "Ubuntu", "Vollkorn", "Yanone Kaffeesatz")),
						
				array(	"name" => __( 'Font Style:', 'cruz' ),
						"desc" => __( 'Select a font style for headings. This style will be loaded only if available within the font.', 'cruz' ),
						"id" => $shortname."_heading_font_style",
						"std" => "regular",
						"type" => "select",
						"options" => array("regular", "italic", "bold", "bold italic")),											
						
				array(	"name" => __( 'Heading Color:', 'cruz' ),
						"desc" => __( 'Choose a color for headings', 'cruz' ),
						"id" => $shortname."_heading_color",
						"std" => "333333",
						"type" => "color_text"),						
						
						
				array(	"name" => __( 'Featured Area Heading Settings', 'cruz' ),
						"type" => "subheading" ),						
						
				array(	"name" => __( 'Featured area Heading Font:', 'cruz' ),
						"desc" => __( 'Select a font for featured area headings', 'cruz' ),
						"id" => $shortname."_ft_heading_font",
						"std" => "Open Sans",
						"type" => "select",
						"options" => array("Open Sans", "Arial", "Georgia", "Allan", "Allerta", "Anton", "Arimo", "Arvo", "Cabin", "Calligraffitti", "Cantarell", "Cardo", "Chewy", "Copse", "Crafty Girls", "Crimson Text", "Crushed", "Cuprum", "Dancing Script", "Droid Sans", "Droid Serif", "EB Garamond", "Expletus Sans", "Gruppo", "Judson", "Just Another Hand", "Kreon", "Lobster", "Luckiest Guy", "Merriweather", "Metrophobic", "Molengo", "Neuton", "Nobile", "Open Sans Condensed", "Orbitron", "Play", "PT Sans", "PT Serif", "Philosopher", "Rokkitt", "Tangerine", "Ubuntu", "Vollkorn", "Yanone Kaffeesatz")),
						
				array(	"name" => __( 'Featured area Heading Font Style:', 'cruz' ),
						"desc" => __( 'Select a font style for featured area headings. This style will be loaded only if available within the font.', 'cruz' ),
						"id" => $shortname."_ft_heading_font_style",
						"std" => "regular",
						"type" => "select",
						"options" => array("regular", "italic", "bold", "bold italic")),											
						
				array(	"name" => __( 'Featured area Heading Color:', 'cruz' ),
						"desc" => __( 'Choose a color for headings', 'cruz' ),
						"id" => $shortname."_ft_heading_color",
						"std" => "555555",
						"type" => "color_text"),	
						
				array(	"name" => __( 'Blog post titles Settings', 'cruz' ),
						"type" => "subheading" ),
						
				array(	"name" => __( 'Post titles heading Font:', 'cruz' ),
						"desc" => __( 'Select a font for blog post titles', 'cruz' ),
						"id" => $shortname."_bl_heading_font",
						"std" => "Open Sans",
						"type" => "select",
						"options" => array("Open Sans", "Arial", "Georgia", "Allan", "Allerta", "Anton", "Arimo", "Arvo", "Cabin", "Calligraffitti", "Cantarell", "Cardo", "Chewy", "Copse", "Crafty Girls", "Crimson Text", "Crushed", "Cuprum", "Dancing Script", "Droid Sans", "Droid Serif", "EB Garamond", "Expletus Sans", "Gruppo", "Judson", "Just Another Hand", "Kreon", "Lobster", "Luckiest Guy", "Merriweather", "Metrophobic", "Molengo", "Neuton", "Nobile", "Open Sans Condensed", "Orbitron", "Play", "PT Sans", "PT Serif", "Philosopher", "Rokkitt", "Tangerine", "Ubuntu", "Vollkorn", "Yanone Kaffeesatz")),
						
				array(	"name" => __( 'Post titles font style:', 'cruz' ),
						"desc" => __( 'Select a font style for post titles. This style will be loaded only if available within the font.', 'cruz' ),
						"id" => $shortname."_bl_heading_font_style",
						"std" => "regular",
						"type" => "select",
						"options" => array( "regular", "italic", "bold", "bold italic")),																	
						
						
				array(	"name" => __( 'Post Title Color:', 'cruz' ),
						"desc" => __( 'Choose a color for post titles', 'cruz' ),
						"id" => $shortname."_bl_col",
						"std" => "333333",
						"type" => "color_text"),
						
				array(	"name" => __( 'Post Title Hover Color:', 'cruz' ),
						"desc" => __( 'Choose a hover color for post titles', 'cruz' ),
						"id" => $shortname."_bl_hvr_col",
						"std" => "000000",
						"type" => "color_text"),
						
				array(	"name" => __( 'Sidebar Heading Settings', 'cruz' ),
						"type" => "subheading" ),						
						
				array(	"name" => __( 'Sidebar Heading Font:', 'cruz' ),
						"desc" => __( 'Select a font for sidebar widget headings', 'cruz' ),
						"id" => $shortname."_sb_heading_font",
						"std" => "Open Sans",
						"type" => "select",
						"options" => array("Open Sans", "Arial", "Georgia", "Allan", "Allerta", "Anton", "Arimo", "Arvo", "Cabin", "Calligraffitti", "Cantarell", "Cardo", "Chewy", "Copse", "Crafty Girls", "Crimson Text", "Crushed", "Cuprum", "Dancing Script", "Droid Sans", "Droid Serif", "EB Garamond", "Expletus Sans", "Gruppo", "Judson", "Just Another Hand", "Kreon", "Lobster", "Luckiest Guy", "Merriweather", "Metrophobic", "Molengo", "Neuton", "Nobile", "Open Sans Condensed", "Orbitron", "Play", "PT Sans", "PT Serif", "Philosopher", "Rokkitt", "Tangerine", "Ubuntu", "Vollkorn", "Yanone Kaffeesatz")),
						
				array(	"name" => __( 'Sidebar Heading Font Style:', 'cruz' ),
						"desc" => __( 'Select a font style for sidebar widget headings. This style will be loaded only if available within the font.', 'cruz' ),
						"id" => $shortname."_sb_heading_font_style",
						"std" => "regular",
						"type" => "select",
						"options" => array("regular", "italic", "bold", "bold italic")),
						
				array(	"name" => __( 'Sidebar Heading Color:', 'cruz' ),
						"desc" => __( 'Choose a color for headings', 'cruz' ),
						"id" => $shortname."_sb_heading_color",
						"std" => "555555",
						"type" => "color_text"),
						
				array(	"name" => __( 'Secondary Area Heading Settings', 'cruz' ),
						"type" => "subheading" ),						
						
				array(	"name" => __( 'Secondary area Heading Font:', 'cruz' ),
						"desc" => __( 'Select a font for secondary area widget headings', 'cruz' ),
						"id" => $shortname."_sc_heading_font",
						"std" => "Open Sans",
						"type" => "select",
						"options" => array("Open Sans", "Arial", "Georgia", "Allan", "Allerta", "Anton", "Arimo", "Arvo", "Cabin", "Calligraffitti", "Cantarell", "Cardo", "Chewy", "Copse", "Crafty Girls", "Crimson Text", "Crushed", "Cuprum", "Dancing Script", "Droid Sans", "Droid Serif", "EB Garamond", "Expletus Sans", "Gruppo", "Judson", "Just Another Hand", "Kreon", "Lobster", "Luckiest Guy", "Merriweather", "Metrophobic", "Molengo", "Neuton", "Nobile", "Open Sans Condensed", "Orbitron", "Play", "PT Sans", "PT Serif", "Philosopher", "Rokkitt", "Tangerine", "Ubuntu", "Vollkorn", "Yanone Kaffeesatz")),
						
				array(	"name" => __( 'Secondary area Heading Font Style:', 'cruz' ),
						"desc" => __( 'Select a font style for secondary area widget headings. This style will be loaded only if available within the font.', 'cruz' ),
						"id" => $shortname."_sc_heading_font_style",
						"std" => "regular",
						"type" => "select",
						"options" => array("regular", "italic", "bold", "bold italic")),
						
				array(	"name" => __( 'Secondary area Heading Color:', 'cruz' ),
						"desc" => __( 'Choose a color for secondary area widget headings', 'cruz' ),
						"id" => $shortname."_sc_heading_color",
						"std" => "777777",
						"type" => "color_text"),
						
				array(	"type" => "tabbed_end" ),
				array(	"type" => "wrap_end" )
);

function mytheme_add_admin() {
    global $themename, $shortname, $options;
	
	// Load admin styling files.
	$file_dir = get_template_directory_uri();
	wp_enqueue_style("admin_css", $file_dir."/admin/admin.css", false, "1.0", "all");
	wp_enqueue_style("colorpicker_css", $file_dir."/admin/css/colorpicker.css", false, "1.0", "all");
	wp_enqueue_script("colorpicker_js", $file_dir."/admin/colorpicker.js", false, "1.0");
	wp_enqueue_script("admin_js", $file_dir."/admin/admin.js", false, "1.0");	
	    if ( isset($_GET['page']) && ($_GET['page'] == basename(__FILE__)) ) {
		 if ( isset($_REQUEST['action']) && ('save' == $_REQUEST['action']) ) {
                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
                header("Location: themes.php?page=theme_admin_options.php&saved=true");
                die;
        } else if( isset($_REQUEST['action']) && ('reset' == $_REQUEST['action'] )) {
            foreach ($options as $value) {
                delete_option( $value['id'] ); }
            header("Location: themes.php?page=theme_admin_options.php&reset=true");
            die;
        }
    }
    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( isset($_REQUEST['saved']) && $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p>'.$themename.' settings saved. w p l o c k e r . c o m</p></div>';
    if ( isset($_REQUEST['reset']) && $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p>'.$themename.' settings reset.</p></div>';
    
?>
<div class="wrap">
    <h2><?php echo $themename; ?> settings</h2>
    <form method="post">
		<?php foreach ($options as $value) {     
            switch ( $value['type'] ) {
			
                case "wrap_start":
                ?>
                <div class="ss_wrap">
                <?php break;
				
                case "wrap_end":
                ?>
                </div>
                <?php break;							
                    
                case "tabs_start":
                ?>
                <ul class="tabs">
                <?php break;
				
                case "tabs_end":
                ?>
                </ul>
                <?php break;
				
                case "tabbed_start":
                ?>
                <div class="tabbed" id="<?php echo $value['id']; ?>">
                <?php break;
				
                case "tabbed_end":
                ?>
                </div>
                <?php break;											
                    
                case "heading":
                ?>
                <li><a href="#<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a></li>
                <?php break;
				
                case "subheading":
                ?>
                <div class="subheading"><?php echo $value['name']; ?></div>
                <?php break;				
                
                case 'select':
                ?>
                <ul class="item_row">
                    <li class="left_col"><?php echo $value['name']; ?></li>
                    <li class="mid_col">
                        <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                            <?php foreach ($value['options'] as $option) { ?>
                            <option <?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
                            <?php } ?>
                        </select>
                    </li>
                    <li class="right_col">
                        <small><?php echo $value['desc']; ?></small>
                    </li>
                </ul>
                <?php break;
        
                case 'text':
                ?>
                <ul class="item_row">
                    <li class="left_col"><?php echo $value['name']; ?></li>
                    <li class="mid_col">
                        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
                    </li>
                    <li class="right_col">
                        <small><?php echo $value['desc']; ?></small>
                    </li>
                </ul>
                <?php break;
				
				case 'color_text':
                ?>
                <ul class="item_row">
                    <li class="left_col"><?php echo $value['name']; ?></li>
                    <li class="mid_col">
                        <input class="mycolor" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
                    <div id="pick_ico_<?php echo $value['id']; ?>" class="picker_ico">
                      <div></div>            
                    </div>                         
                    </li>
                    <li class="right_col">
                        <small><?php echo $value['desc']; ?></small>
                    </li>
                </ul>
              
                <?php break;
                case 'textarea':
                ?>
                <ul class="item_row">
                    <li class="left_col"><?php echo $value['name']; ?></li>
                    <li class="mid_col">
                        <textarea class="code" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="30" rows="6"><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'] )); } else { echo $value['std'];} ?></textarea>
                    </li>
                    <li class="right_col">
                        <small><?php echo $value['desc']; ?></small>
                    </li>
                </ul>
                <?php break;		
                
                    
                case "checkbox":
                ?>
                <ul class="item_row">
                    <li class="left_col"><?php echo $value['name']; ?></li>
                    <li class="mid_col">
                        <?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                    </li>
                    <li class="right_col">
                        <small><?php echo $value['desc']; ?></small>
                    </li>
                </ul>
                <?php break;
                } 
            }
            ?>
            <p class="submit">
            <input name="save" type="submit" value="Save changes" />    
            <input type="hidden" name="action" value="save" />
            </p>
    </form>
    <form method="post">
        <p class="submit">
        <input name="reset" type="submit" value="Reset all settings" />
        <input type="hidden" name="action" value="reset" />
        </p>
    </form>
</div>
<?php
}
add_action('admin_menu', 'mytheme_add_admin');?>