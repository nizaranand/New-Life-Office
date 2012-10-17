<?php
/* Custom Page options */ 
$page_key = "page_options";
$page_options = array(
				"info1" => array( "type" => "heading",
								"description" => __( 'Sidebar', 'cruz' ) ),
								
				"sidebar_opts" => array(
								"id" => "sidebar_opts",
								"title" => __( 'Sidebar Placement', 'cruz' ),
								"std" => "right",
								"type" => "select",
								"options" => array("right", "left", "none"),	
								"description" => __( 'Choose right, left or none.', 'cruz' ) ),
								
				"info2" => array(
								"type" => "heading",
								"description" => __( 'Exclusive widget areas', 'cruz' ) ),
								
				"unique_header_bar" => array(
								"id" => "unique_header_bar",
								"title" => __( 'Create an exclusive header widget area', 'cruz' ),
								"type" => "checkbox",
								"description" => __( 'If unchecked, default header widget area will be used, as on blog pages.', 'cruz' ) ),									
								
				"unique_feat_bar" => array(
								"id" => "unique_feat_bar",
								"title" => __( 'Create an exclusive featured widget area', 'cruz' ),
								"type" => "checkbox",
								"description" => __( 'If unchecked, default featured widget area will be used, as on blog pages.', 'cruz' ) ),													
				
				"unique_sidebar" => array(
								"id" => "unique_sidebar",
								"title" => __( 'Create an exclusive sidebar', 'cruz' ),
								"type" => "checkbox",
								"description" => __( 'If unchecked, default sidebar will be used, as on blog pages.', 'cruz' ) ),	
								
			"unique_secondarybar" => array(
								"id" => "unique_secondarybar",
								"title" => __( 'Create an exclusive secondary area', 'cruz' ),
								"type" => "checkbox",
								"description" => __( 'If unchecked, default secondary area will be used, as on blog pages.', 'cruz' ) ),	
								
				"hr1" => array(	"type" => "hr"),									
								
				"info3" => array( "type" => "heading",
								"description" => __( 'Page Caption', 'cruz' ) ),																													
				
				"custom_caption" => array(
								"id" => "custom_caption",
								"title" => __( 'Custom page Caption', 'cruz' ),
								"type" => "text",
								"description" => __( 'Enter a custom caption for this page.', 'cruz' ) ),
								
				"hide_feat" => array(
								"id" => "hide_feat",
								"title" => __( 'Hide Featured Area', 'cruz' ),
								"type" => "checkbox",
								"description" => __( 'Check to completely hide Featured Area section on this page.', 'cruz' ) ),								
								
				"hr2" => array(	"type" => "hr"),								
												
				"info4" => array(
								"type" => "heading",
								"description" => __( 'If using this page as Portfolio or Blog Template', 'cruz' ) ),									
								
				"category" => array(
								"id" => "category",
								"title" => __( 'Category for Posts', 'cruz' ),
								"type" => "text",
								"description" => __( 'Enter a category ID, or IDs separated by commas, from which you wish to show posts.', 'cruz' ) ),
								
				"post_per_page" => array(
								"id" => "post_per_page",
								"title" => __( 'Posts per page', 'cruz' ),
								"type" => "text",
								"description" => __( 'The number of posts to show per page.', 'cruz' ) ),
								
			"titles" => array(
								"id" => "titles",
								"title" => __( 'Hide Portfolio Captions', 'cruz' ),
								"type" => "checkbox",
								"description" => __( 'Check to hide portfolio captions, so that you can show a classic gallery.', 'cruz' ) ),
								
				"info5" => array(
								"type" => "heading",
								"description" => __( 'Custom Header image or embed code', 'cruz' ) ),									
								
				"cust_embed" => array(
								"id" => "cust_embed",
								"title" => __( 'Custom image or flash embed code:', 'cruz' ),
								"type" => "textarea",
								"description" => __( 'Enter an HTML source code for image or Flash header here. Important: The page caption and featured widget area will be overridden by this image.', 'cruz' ) ),																								
);

function create_page_options() {
	global $page_key;	
	if( function_exists( 'add_meta_box' ) ) {
		add_meta_box( 'page-banner-options', ' Page Options', 'display_page_options', 'page', 'normal', 'high');
	}
}

function display_page_options() {
	global $post, $page_options, $page_key; ?>
	
	<div class="form-wrap">	
		<?php
        wp_nonce_field( plugin_basename( __FILE__ ), $page_key . '_wpnonce', false, true );
        
        foreach($page_options as $meta_box) {
			$data = get_post_meta($post->ID, $page_key, true);

			if( $meta_box[ 'type' ] == "heading" ) {
				echo ('<h4>'.$meta_box[ 'description' ].'</h4>'); 
			}
			
			elseif( $meta_box[ 'type' ] == "hr" ) {
				echo ('<div style="border-bottom:1px solid #e6e6e6; margin:14px 0px 12px"></div>'); 
			}
			elseif ( $meta_box[ 'type' ] == "text" ) {?>
                <div>
                <label for="<?php echo $meta_box[ 'id' ]; ?>"><?php echo $meta_box[ 'title' ]; ?></label>
                <input style="width:100%" type="text" name="<?php if( isset($meta_box['id']) ) echo $meta_box[ 'id' ]; ?>" id="<?php if( isset($meta_box['id']) ) echo $meta_box['id']; ?>" value="<?php if( isset($data[ $meta_box[ 'id' ] ]) ) echo htmlspecialchars( $data[ $meta_box[ 'id' ] ] ); ?>" />
                <p><?php echo $meta_box[ 'description' ]; ?></p>
                </div>
				<?php }
			elseif ( $meta_box[ 'type' ] == "textarea" ) {?>
                <div>
                <label for="<?php echo $meta_box[ 'id' ]; ?>"><?php echo $meta_box[ 'title' ]; ?></label>
                <textarea class="code" name="<?php if( isset($meta_box['id']) ) echo $meta_box[ 'id' ]; ?>" cols="40" rows="6"><?php if( isset($data[ $meta_box['id'] ]) ) echo stripslashes( $data[ $meta_box[ 'id' ] ] ); ?></textarea>
                <p style="clear:both"><?php echo $meta_box[ 'description' ]; ?></p>                
                </div>
			<?php }
				elseif ( $meta_box[ 'type' ] == "select" ) {?>
                <div>
                <label for="<?php echo $meta_box[ 'id' ]; ?>"><?php echo $meta_box[ 'title' ]; ?></label>
                <select style="width:100%" name="<?php echo $meta_box['id']; ?>" id="<?php echo $meta_box['id']; ?>">
                            <?php foreach ($meta_box['options'] as $option) { ?>
                            <option <?php if ( isset($data[ $meta_box[ 'id' ] ]) && ( $data[ $meta_box[ 'id' ] ] == $option ) ) { echo ' selected="selected"'; } elseif ($option == $meta_box['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
                            <?php } ?>
                        </select>
              <p style="clear:both"><?php echo $meta_box[ 'description' ]; ?></p>
              </div>
			<?php }
			
				elseif ($meta_box[ 'type' ] == "checkbox" ) {?>
                 <div>                   
<?php if( isset($data[ $meta_box[ 'id' ] ]) && ( $data[$meta_box['id']] )){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input style="float:left; width:20px" type="checkbox" name="<?php echo $meta_box['id']; ?>" id="<?php echo $meta_box['id']; ?>" value="true" <?php echo $checked; ?> />
                        <label for="<?php echo $meta_box[ 'id' ]; ?>"><?php echo $meta_box[ 'title' ]; ?></label>
                        <p><?php echo $meta_box[ 'description' ]; ?></p>
                </div>
       <?php }
	   } ?>
	</div>
<?php
}
function save_page_options( $post_id ) {
	global $post, $page_options, $page_key;
	
	foreach( $page_options as $meta_box ) {
	if(isset ($meta_box['id']) && isset($_POST[ $meta_box['id'] ]))
		$data[ $meta_box[ 'id' ] ] = $_POST[ $meta_box[ 'id' ] ];
	}
		
	if (isset($_POST[ $page_key . '_wpnonce' ]))
		if ( !wp_verify_nonce( $_POST[ $page_key . '_wpnonce' ], plugin_basename(__FILE__) ) )
			return $post_id;
			
	if ( !current_user_can( 'edit_post', $post_id ))
		return $post_id;
			
	if(isset($data))
		update_post_meta( $post_id, $page_key, $data );
}

add_action( 'admin_menu', 'create_page_options' );
add_action( 'save_post', 'save_page_options' );
?>