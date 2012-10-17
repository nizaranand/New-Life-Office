<?php
/**********************************************************
****** UnitedThemes custom post meta
***********************************************************

Name	    :	ap_<?php echo $term; ?>_meta.php
Version	    :	1.0
Author	    :	Alex Schornberg
URL	    :	http://www.unitedthemes.com

Description :	custom post meta for UT themes

Theme	    :	strange

Created :	2011-05-29
Modified :

*/


    /*************
     * PORTFOLIO *
     *************/

    add_action('admin_menu', 'add_ap_portfolio_options');
    add_action('save_post', 'save_ap_portfolio_options');
    function add_ap_portfolio_options() {
	add_meta_box( 'ap_portfolio_options', UT_THEME_NAME.' Options', 'ap_portfolio_options', 'portfolio' );
    }
    function save_ap_portfolio_options(){
	global $post;

	if (!wp_verify_nonce($_POST['portfolio_options_nonce'], basename(__FILE__))) {
	    return $post->ID;
	}
	if ('page' == $_POST['post_type']) {
	    if (!current_user_can('edit_page', $post_id)) {
		return $post->ID;
	    }
	} elseif (!current_user_can('edit_post', $post_id)) {
	    return $post->ID;
	}
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
	    return $post->ID;
	}

	update_post_meta($post->ID, UT_THEME_INITIAL.'portfolio_work', $_POST[UT_THEME_INITIAL.'portfolio_work']);
	update_post_meta($post->ID, UT_THEME_INITIAL.'teaser', $_POST[UT_THEME_INITIAL.'teaser']);
	update_post_meta($post->ID, UT_THEME_INITIAL.'title', $_POST[UT_THEME_INITIAL.'title']);
	update_post_meta($post->ID, UT_THEME_INITIAL.'portfolio_link', $_POST[UT_THEME_INITIAL.'portfolio_link']);
	update_post_meta($post->ID, UT_THEME_INITIAL.'preview_type', $_POST[UT_THEME_INITIAL.'preview_type']);
	update_post_meta($post->ID, UT_THEME_INITIAL.'preview_code', $_POST[UT_THEME_INITIAL.'preview_code']);
	update_post_meta($post->ID, UT_THEME_INITIAL.'image_link', $_POST[UT_THEME_INITIAL.'image_link']);
	update_post_meta($post->ID, UT_THEME_INITIAL.'image_custom_link', $_POST[UT_THEME_INITIAL.'image_custom_link']);

	foreach( $_POST[UT_THEME_INITIAL.'portfolio_list'] as $num => $item ){
	    if( empty($item['title']) && empty($item['value']) )
		unset($_POST[UT_THEME_INITIAL.'portfolio_list'][$num]);
	}
	update_post_meta($post->ID, UT_THEME_INITIAL.'portfolio_list', json_encode($_POST[UT_THEME_INITIAL.'portfolio_list']));

    }

    function ap_portfolio_options() {

	wp_enqueue_script( 'jquery' );

	global $post;
	if( !get_post_meta( $post->ID, UT_THEME_INITIAL.'portfolio_work') ) add_post_meta( $post->ID, UT_THEME_INITIAL.'portfolio_work', '' );
	if( !get_post_meta( $post->ID, UT_THEME_INITIAL.'teaser') ) add_post_meta( $post->ID, UT_THEME_INITIAL.'teaser', '' );
	if( !get_post_meta( $post->ID, UT_THEME_INITIAL.'title') ) add_post_meta( $post->ID, UT_THEME_INITIAL.'title', '' );
	if( !get_post_meta( $post->ID, UT_THEME_INITIAL.'portfolio_list') ) add_post_meta( $post->ID, UT_THEME_INITIAL.'portfolio_list', '' );
	if( !get_post_meta( $post->ID, UT_THEME_INITIAL.'portfolio_link') ) add_post_meta( $post->ID, UT_THEME_INITIAL.'portfolio_link', '' );

	echo '<input type="hidden" name="portfolio_options_nonce" value="',wp_create_nonce(basename(__FILE__)),'" />';

	$ap_title = get_post_meta( $post->ID, UT_THEME_INITIAL.'title' );
	echo '
	    <h4>'.__('Title', UT_THEME_NAME).'</h4>
	    <input type="text" style="width:100%;" name="'.UT_THEME_INITIAL.'title" id="'.UT_THEME_INITIAL.'title" value="'.$ap_title[0].'" />
	    <p class="description">'.__( 'The title. Leave blank to show the default title from its category.', UT_THEME_NAME ).'</p>';
	
	$ap_teaser = get_post_meta( $post->ID, UT_THEME_INITIAL.'teaser' );
	echo '
	    <div style="margin:0; padding: 0; height: 1px; border-top:1px solid #dfdfdf;"></div>
	    <h4>'.__('Teaser', UT_THEME_NAME).'</h4>
	    <input type="text" style="width:100%;" name="'.UT_THEME_INITIAL.'teaser" id="'.UT_THEME_INITIAL.'teaser" value="'.$ap_teaser[0].'" />
	    <p class="description">'.__( 'The teaser. Leave blank to show the default teaser as from its category.', UT_THEME_NAME ).'</p>
	    <div style="margin:0; padding: 0; height: 1px; border-top:1px solid #dfdfdf;"></div>';

	$ap_preview_type = get_post_meta( $post->ID, UT_THEME_INITIAL.'preview_type' );
	$ap_preview_url = get_post_meta( $post->ID, UT_THEME_INITIAL.'preview_code' );
	echo '
	    <h4>'.__('Preview Media', UT_THEME_NAME).'</h4>
	    <input type="radio"'.($ap_preview_type[0]=='featured'||empty($ap_preview_type[0])?' checked="checked"':'').' name="'.UT_THEME_INITIAL.'preview_type" id="'.UT_THEME_INITIAL.'preview_type_featured" value="featured" />
	    <label for="'.UT_THEME_INITIAL.'preview_type_featured">'.__('Featured Image',UT_THEME_NAME).'</label>
	    &nbsp;&nbsp;<input type="radio"'.($ap_preview_type[0]=='custom'?' checked="checked"':'').' name="'.UT_THEME_INITIAL.'preview_type" id="'.UT_THEME_INITIAL.'preview_type_image" value="custom" />
	    <label for="'.UT_THEME_INITIAL.'preview_type_image">'.__('Custom Image/Video',UT_THEME_NAME).'</label>
	    <div style="clear:both;"></div>
	    <input type="text" style="width:100%;" name="'.UT_THEME_INITIAL.'preview_code" id="'.UT_THEME_INITIAL.'preview_code" value="'.htmlspecialchars($ap_preview_url[0]).'" />
	    <p class="description">'.__( 'Select the preview type and, if it\'s not the featured image, enter shortcode for custom image or video.', UT_THEME_NAME ).'</p>';

	$ap_image_link = get_post_meta( $post->ID, UT_THEME_INITIAL.'image_link' );
	$ap_image_custom_link = get_post_meta( $post->ID, UT_THEME_INITIAL.'image_custom_link' );
	echo '<div class="ap-featured-link">
	    <div style="margin:0; padding: 0; height: 1px; border-top:1px solid #dfdfdf;"></div>
	    <h4>'.__('Featured Image Link', UT_THEME_NAME).'</h4>
	    &nbsp;&nbsp;<input type="radio"'.($ap_image_link[0]=='medium'?' checked="checked"':'').' name="'.UT_THEME_INITIAL.'image_link" id="'.UT_THEME_INITIAL.'image_link_medium" value="medium" />
	    <label for="'.UT_THEME_INITIAL.'image_link_medium">'.__('Featured Medium', UT_THEME_NAME).'</label>
	    &nbsp;&nbsp;<input type="radio"'.($ap_image_link[0]||empty($ap_image_link[0])=='large'?' checked="checked"':'').' name="'.UT_THEME_INITIAL.'image_link" id="'.UT_THEME_INITIAL.'image_link_large" value="large" />
	    <label for="'.UT_THEME_INITIAL.'image_link_large">'.__('Featured Large', UT_THEME_NAME).'</label>
	    &nbsp;&nbsp;<input type="radio"'.($ap_image_link[0]=='full'?' checked="checked"':'').' name="'.UT_THEME_INITIAL.'image_link" id="'.UT_THEME_INITIAL.'image_link_full" value="full" />
	    <label for="'.UT_THEME_INITIAL.'image_link_full">'.__('Featured Full', UT_THEME_NAME).'</label>
	    &nbsp;&nbsp;<input type="radio"'.($ap_image_link[0]=='none'?' checked="checked"':'').' name="'.UT_THEME_INITIAL.'image_link" id="'.UT_THEME_INITIAL.'image_link_none" value="none" />
	    <label for="'.UT_THEME_INITIAL.'image_link_none">'.__('No link',UT_THEME_NAME).'</label>
	    &nbsp;&nbsp;<input type="radio"'.($ap_image_link[0]=='post'?' checked="checked"':'').' name="'.UT_THEME_INITIAL.'image_link" id="'.UT_THEME_INITIAL.'image_link_post" value="post" />
	    <label for="'.UT_THEME_INITIAL.'image_link_post">'.__('Work', UT_THEME_NAME).'</label>
	    &nbsp;&nbsp;<input style="" type="radio"'.($ap_image_link[0]=='url'?' checked="checked"':'').' name="'.UT_THEME_INITIAL.'image_link" id="'.UT_THEME_INITIAL.'image_link_url" value="url" />
	    <label style="" for="'.UT_THEME_INITIAL.'image_link_url">'.__('Custom Url',UT_THEME_NAME).':</label>
	    &nbsp;<input type="text" style="width:100%;" name="'.UT_THEME_INITIAL.'image_custom_link" value="'.$ap_image_custom_link[0].'" />
	    <p class="description">'.__( 'How to link the featured image in column layout. To one of the featured image sizes, no linking, permalink to the work or a custom url to an image or video, opened in pretty box.', UT_THEME_NAME ).'</p>
	    <div style="clear:both;"></div></div>';

	$ap_portfolio_works = get_post_meta( $post->ID, UT_THEME_INITIAL.'portfolio_work' );
	echo '
	    <div style="margin:0; padding: 0; height: 1px; border-top:1px solid #dfdfdf;"></div>
	    <h4>'.__('Work', UT_THEME_NAME).'</h4>
	    <textarea name="'.UT_THEME_INITIAL.'portfolio_work" id="'.UT_THEME_INITIAL.'portfolio_work" style="width:100%">'.$ap_portfolio_works[0].'</textarea>
	    <p class="description">'.__( 'Enter the work with shortcodes or regular HTML.', UT_THEME_NAME ).'. The preview Image/Video is just for the listings and will not be shown.</p>';

	echo '
	    <div style="margin:0; padding: 0; height: 1px; border-top:1px solid #dfdfdf;"></div>
	    <h4>'.__('Work Description', UT_THEME_NAME).'</h4><div id="portfolio-description-items">';
	$ap_portfolio_list = get_post_meta( $post->ID, UT_THEME_INITIAL.'portfolio_list' );
	$ap_portfolio_list = json_decode( $ap_portfolio_list[0], TRUE );
	if( !empty($ap_portfolio_list) ){
	    foreach( $ap_portfolio_list as $num => $item ){
		echo '
		<span><input type="text" style="width:40%;" class="ap-portfolio-descr-item" value="'.htmlspecialchars($item['title']).'" />
		<input type="text" style="width:40%;" class="ap-portfolio-descr-item" value="'.htmlspecialchars($item['value']).'" /><input class="button" id="ut-del-portfolio-desc-item" value="-" type="button"><br /></span>';
	}   }
	$num = count($ap_portfolio_list)+1;
	echo '
	    <span><input type="text" style="width:40%;" class="ap-portfolio-descr-item" value="" />
	    <input type="text" style="width:40%;" class="ap-portfolio-descr-item" value="" /><input class="button" id="ut-del-portfolio-desc-item" value="-" type="button"><br /></span></div>
	    <input class="button" id="ut-add-portfolio-desc-item" value="add item" type="button">
	    <p class="description">'.__( 'Enter some further description.', UT_THEME_NAME ).'</p>';
	
	$ap_portfolio_link = get_post_meta( $post->ID, UT_THEME_INITIAL.'portfolio_link' );
	echo '
	    <div style="margin:0; padding: 0; height: 1px; border-top:1px solid #dfdfdf;"></div>
	    <h4>'.__('Project Link', UT_THEME_NAME).'</h4>
	    <input type="text" style="width:100%;" name="'.UT_THEME_INITIAL.'portfolio_link" value="'.$ap_portfolio_link[0].'" />
	    <p class="description">'.__( 'Url to e.g. an external ressource. Leave blank for no project link.', UT_THEME_NAME ).'</p>';

	$name_prefix = UT_THEME_INITIAL.'portfolio_list';
	echo <<<EOT
	<script type="text/javascript">
	    jQuery(document).ready(function($){
		function ap_prortfolio_desrc_item_names(){
		    var count=0;
		    $('#portfolio-description-items input.ap-portfolio-descr-item').each(function(){
			count++;
			$(this).attr('name', '$name_prefix\x5B'+(count%2==0?count/2:(count+1)/2)+']['+(count%2==0?'value':'title')+']' )
		    });
		}
		ap_prortfolio_desrc_item_names();
		$("#ut-add-portfolio-desc-item").live('click', function(){
		    $("#portfolio-description-items").append('<span><input class="ap-portfolio-descr-item" type="text" style="width:40%;" value="" /><input class="ap-portfolio-descr-item" type="text" style="width:40%;" value="" /><input class="button" id="ut-del-portfolio-desc-item" value="-" type="button"><br /></span>');
		    ap_prortfolio_desrc_item_names();
		});
		$("#ut-del-portfolio-desc-item").live('click', function(){
		    $(this).parent().remove();
		    ap_prortfolio_desrc_item_names();
		});
	    });
	</script>
EOT;
    }

    /********************
     * POSTS & PAGES *
     ********************/

    add_action('admin_menu', 'add_ap_postpage_options');
    add_action('save_post', 'save_ap_postpage_options');
    function add_ap_postpage_options() {
	add_meta_box( 'ap_postpage_options', UT_THEME_NAME.' Options', 'ap_postpage_options', 'post' );
	add_meta_box( 'ap_postpage_options', UT_THEME_NAME.' Options', 'ap_postpage_options', 'page' );
    }
    function save_ap_postpage_options(){
	global $post;

	if (!wp_verify_nonce($_POST['postpage_options_nonce'], basename(__FILE__))) {
	    return $post->ID;
	}
	if ('page' == $_POST['post_type']) {
	    if (!current_user_can('edit_page', $post_id)) {
		return $post->ID;
	    }
	} elseif (!current_user_can('edit_post', $post_id)) {
	    return $post->ID;
	}
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
	    return $post->ID;
	}
	update_post_meta($post->ID, UT_THEME_INITIAL.'teaser', $_POST[UT_THEME_INITIAL.'teaser']);
	update_post_meta($post->ID, UT_THEME_INITIAL.'sidebar_id', $_POST[UT_THEME_INITIAL.'sidebar_id']);
	update_post_meta($post->ID, UT_THEME_INITIAL.'sidebar_align', $_POST[UT_THEME_INITIAL.'sidebar_align']);
	update_post_meta($post->ID, UT_THEME_INITIAL.'title', $_POST[UT_THEME_INITIAL.'title']);
	update_post_meta($post->ID, UT_THEME_INITIAL.'preview_type', $_POST[UT_THEME_INITIAL.'preview_type']);
	update_post_meta($post->ID, UT_THEME_INITIAL.'preview_code', $_POST[UT_THEME_INITIAL.'preview_code']);
	update_post_meta($post->ID, UT_THEME_INITIAL.'image_link', $_POST[UT_THEME_INITIAL.'image_link']);
	update_post_meta($post->ID, UT_THEME_INITIAL.'image_custom_link', $_POST[UT_THEME_INITIAL.'image_custom_link']);
    }
    function ap_postpage_options() {
	
	wp_enqueue_script( 'jquery' );
	global $post;

	if( !get_post_meta( $post->ID, UT_THEME_INITIAL.'teaser') ) add_post_meta( $post->ID, UT_THEME_INITIAL.'teaser', '' );
	if( !get_post_meta( $post->ID, UT_THEME_INITIAL.'title') && $post->post_type=='post' ) add_post_meta( $post->ID, UT_THEME_INITIAL.'title', '' );
	if( !get_post_meta( $post->ID, UT_THEME_INITIAL.'sidebar_id') ) add_post_meta( $post->ID, UT_THEME_INITIAL.'sidebar_id', '0' );
	if( !get_post_meta( $post->ID, UT_THEME_INITIAL.'sidebar_align') ) add_post_meta( $post->ID, UT_THEME_INITIAL.'sidebar_align', 'right' );
	
	echo '<input type="hidden" name="postpage_options_nonce" value="',wp_create_nonce(basename(__FILE__)),'" />';

        $ap_post_title = get_post_meta( $post->ID, UT_THEME_INITIAL.'title' );
        echo '
	    <h4>'.__('Title', UT_THEME_NAME).'</h4>
	    <input type="text" style="width:100%;" name="'.UT_THEME_INITIAL.'title" id="'.UT_THEME_INITIAL.'title" value="'.$ap_post_title[0].'" />';
        if( $post->post_type=='page' )
	    echo '<p class="description">'.__('The title. Leave blank to show the regular page title.', UT_THEME_NAME).'</p>';
	elseif( $post->post_type=='post' )
	    echo '<p class="description">'.__('The title. Leave blank to show the default title from its category.', UT_THEME_NAME).'</p>';
	echo '<div style="margin:0; padding: 0; height: 1px; border-top:1px solid #dfdfdf;"></div>';

	$ap_post_teaser = get_post_meta( $post->ID, UT_THEME_INITIAL.'teaser' );
	echo '
	    <h4>'.__('Teaser', UT_THEME_NAME).'</h4>
	    <input type="text" style="width:100%;" name="'.UT_THEME_INITIAL.'teaser" id="'.UT_THEME_INITIAL.'teaser" value="'.$ap_post_teaser[0].'" />
	    <p class="description">'.__( 'The teaser. Leave blank to show the default teaser from its category.', UT_THEME_NAME ).'</p>
	    <div style="margin:0; padding: 0; height: 1px; border-top:1px solid #dfdfdf;"></div>';

	$ap_sidebar_id = get_post_meta( $post->ID, UT_THEME_INITIAL.'sidebar_id' );
	$ap_sidebars = get_option(UT_THEME_INITIAL.'sidebars_manage_sidebar');

	$options = '<option value="default"'.($ap_sidebar_id[0]=='default'||empty($ap_sidebar_id[0])?' selected="selected"':'').'>Default Sidebar (as defined in category options)</option>';
	$options .= '<option value="none"'.($ap_sidebar_id[0]=='none'?' selected="selected"':'').'>No Sidebar (full width)</option>';
	if( is_array($ap_sidebars) ){
	    foreach( $ap_sidebars as $num => $sidebar_options ){
		$options .= '<option'.($ap_sidebar_id[0]==$num?' selected="selected"':'').' value="'.$num.'">'.$sidebar_options['name'].'</option>';
	}   }
	echo '
	    <h4>'.__('Sidebar', UT_THEME_NAME).'</h4>
	    <select name="'.UT_THEME_INITIAL.'sidebar_id" id="'.UT_THEME_INITIAL.'sidebar_id" style="float:left;">'.$options.'</select><br />';

	$ap_sidebar_align = get_post_meta( $post->ID, UT_THEME_INITIAL.'sidebar_align' );
	echo '
	    <div style="float:left;">
		<input type="radio"'.($ap_sidebar_align[0]=='left'?' checked="checked"':'').' name="'.UT_THEME_INITIAL.'sidebar_align" id="'.UT_THEME_INITIAL.'sidebar_align_left" value="left" /><label for="'.UT_THEME_INITIAL.'sidebar_align_left">Left</label>
		&nbsp;
		<input type="radio"'.($ap_sidebar_align[0]=='right'||empty($ap_sidebar_align[0])?' checked="checked"':'').' name="'.UT_THEME_INITIAL.'sidebar_align" id="'.UT_THEME_INITIAL.'sidebar_align_right" value="right" /><label for="'.UT_THEME_INITIAL.'sidebar_align_right">Right</label>
	    </div><div style="clear:both"></div>
	    <p class="description">'.__( 'Select sidebar and its position.', UT_THEME_NAME ).'</p>';

	if( $post->post_type=='post' ){
	    $ap_preview_type = get_post_meta( $post->ID, UT_THEME_INITIAL.'preview_type' );
	    $ap_preview_url = get_post_meta( $post->ID, UT_THEME_INITIAL.'preview_code' );
	    echo '
	    <div style="margin:0; padding: 0; height: 1px; border-top:1px solid #dfdfdf;"></div>
	    <h4>'.__('Preview Media', UT_THEME_NAME).'</h4>
	    <input type="radio"'.($ap_preview_type[0]=='featured'||empty($ap_preview_type[0])?' checked="checked"':'').' name="'.UT_THEME_INITIAL.'preview_type" id="'.UT_THEME_INITIAL.'preview_type_featured" value="featured" />
	    <label for="'.UT_THEME_INITIAL.'preview_type_featured">'.__('Featured Image',UT_THEME_NAME).'</label>
	    &nbsp;&nbsp;<input type="radio"'.($ap_preview_type[0]=='custom'?' checked="checked"':'').' name="'.UT_THEME_INITIAL.'preview_type" id="'.UT_THEME_INITIAL.'preview_type_image" value="custom" />
	    <label for="'.UT_THEME_INITIAL.'preview_type_image">'.__('Custom Image/Video',UT_THEME_NAME).'</label>
	    <div style="clear:both;"></div>
	    <input type="text" style="width:100%;" name="'.UT_THEME_INITIAL.'preview_code" id="'.UT_THEME_INITIAL.'preview_code" value="'.htmlspecialchars($ap_preview_url[0]).'" />
	    <p class="description">'.__( 'Select the preview type and, if it\'s not the featured image, enter shortcode for custom image or video.', UT_THEME_NAME ).'</p>';

	    $ap_image_link = get_post_meta( $post->ID, UT_THEME_INITIAL.'image_link' );
	    $ap_image_custom_link = get_post_meta( $post->ID, UT_THEME_INITIAL.'image_custom_link' );
	    echo '<div class="ap-featured-link">
	    <div style="margin:0; padding: 0; height: 1px; border-top:1px solid #dfdfdf;"></div>
	    <h4>'.__('Featured Image Link', UT_THEME_NAME).'</h4>
	    &nbsp;&nbsp;<input type="radio"'.($ap_image_link[0]=='medium'?' checked="checked"':'').' name="'.UT_THEME_INITIAL.'image_link" id="'.UT_THEME_INITIAL.'image_link_medium" value="medium" />
	    <label for="'.UT_THEME_INITIAL.'image_link_medium">'.__('Featured Medium', UT_THEME_NAME).'</label>
	    &nbsp;&nbsp;<input type="radio"'.($ap_image_link[0]||empty($ap_image_link[0])=='large'?' checked="checked"':'').' name="'.UT_THEME_INITIAL.'image_link" id="'.UT_THEME_INITIAL.'image_link_large" value="large" />
	    <label for="'.UT_THEME_INITIAL.'image_link_large">'.__('Featured Large', UT_THEME_NAME).'</label>
	    &nbsp;&nbsp;<input type="radio"'.($ap_image_link[0]=='full'?' checked="checked"':'').' name="'.UT_THEME_INITIAL.'image_link" id="'.UT_THEME_INITIAL.'image_link_full" value="full" />
	    <label for="'.UT_THEME_INITIAL.'image_link_full">'.__('Featured Full', UT_THEME_NAME).'</label>
	    &nbsp;&nbsp;<input type="radio"'.($ap_image_link[0]=='none'?' checked="checked"':'').' name="'.UT_THEME_INITIAL.'image_link" id="'.UT_THEME_INITIAL.'image_link_none" value="none" />
	    <label for="'.UT_THEME_INITIAL.'image_link_none">'.__('No link',UT_THEME_NAME).'</label>
	    &nbsp;&nbsp;<input type="radio"'.($ap_image_link[0]=='post'?' checked="checked"':'').' name="'.UT_THEME_INITIAL.'image_link" id="'.UT_THEME_INITIAL.'image_link_post" value="post" />
	    <label for="'.UT_THEME_INITIAL.'image_link_post">'.__('Work', UT_THEME_NAME).'</label>
	    &nbsp;&nbsp;<input style="" type="radio"'.($ap_image_link[0]=='url'?' checked="checked"':'').' name="'.UT_THEME_INITIAL.'image_link" id="'.UT_THEME_INITIAL.'image_link_url" value="url" />
	    <label style="" for="'.UT_THEME_INITIAL.'image_link_url">'.__('Custom Pretty Link Url',UT_THEME_NAME).':</label>
	    &nbsp;<input type="text" style="width:100%;" name="'.UT_THEME_INITIAL.'image_custom_link" value="'.$ap_image_custom_link[0].'" />
	    <p class="description">'.__( 'How to link the featured image. To one of the featured image sizes, no linking, permalink to the post or a custom url to an image or video, opened in pretty box.', UT_THEME_NAME ).'</p>
	    <div style="clear:both;"></div></div>';
	}
    }

    /*************
     * CAEGORIES *
     *************/

    add_action ( 'category_edit_form_fields', 'ap_edit_category_options');
    add_action ( 'portfolio_category_edit_form_fields', 'ap_edit_category_options');
    add_action ( 'category_add_form_fields', 'ap_edit_category_options');
    add_action ( 'portfolio_category_add_form_fields', 'ap_edit_category_options');
    function ap_edit_category_options( $tag ) {

	$theme_path = get_template_directory_uri();
	
	wp_enqueue_script( 'jquery' );

	if( is_object($tag) ){
	    $name = $tag->taxonomy == 'portfolio_category' ? 'portfolio' : 'category';
	    $term = $tag->taxonomy == 'portfolio_category' ? 'work' : 'post';
	    $taxonomy = $tag->taxonomy;

	    $elemnt_1_o = '<tr class="form-field">';
	    $elemnt_1_c = '</tr>';
	    $elemnt_21_o = '<th scope="row" valign="top">';
	    $elemnt_21_c = '</th>';
	    $elemnt_22_o = '<td>';
	    $elemnt_22_c = '</td>';
	}else{
	    $name = $tag == 'portfolio_category' ? 'portfolio' : 'category';
	    $term = $tag == 'portfolio_category' ? 'work' : 'post';
	    $taxonomy = $tag;

	    $elemnt_1_o = '<div class="form-field">';
	    $elemnt_1_c = '</div>';
	    $elemnt_21_o = '';
	    $elemnt_21_c = '';
	    $elemnt_22_o = '';
	    $elemnt_22_c = '';
	}
?>
<script type="text/javascript" src="<?php echo get_template_directory_uri().'/addpress/js/ap.fancyselect.js'; ?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri().'/addpress/js/ap.fileupload.js'; ?>"></script>
<link media="screen" href="<?php echo get_template_directory_uri().'/addpress/css/select-upload.css'; ?>" type="text/css" rel="stylesheet" >

<script type="text/javascript">
    var  theme_path = '<?php echo $theme_path; ?>',
          template = '<?php echo get_template(); ?>',
          home_url = '<?php echo home_url(); ?>';
    jQuery(document).ready(function($){
	$('body').prepend('<form id="upload-form" enctype="multipart/form-data" action="<?php echo $theme_path; ?>/addpress/includes/ap_fileupload.php?themeroot=<?php echo get_theme_root().'/'.get_template(); ?>&homeurl=<?php echo home_url(); ?>&template=<?php echo get_template(); ?>" method="POST" onsubmit="return true;" target="iframe_upload"></form><iframe id="iframe_upload" name="iframe_upload" src="" style="width:0px;height:0px;border:0"></iframe>');
	$('.selectset').apFancySelect();
    });
</script>
<?php
	if( $taxonomy == 'portfolio_category' ):
	    echo $elemnt_1_o;
	    echo $elemnt_21_o; ?>
		<label for="<?php echo UT_THEME_INITIAL; ?>portfolio_layout"><?php _e( 'Portfolio layout', UT_THEME_NAME ); ?></label>
	    <?php
	    echo $elemnt_21_c;
	    echo $elemnt_22_o; ?>
		<?php $layout = get_option( UT_THEME_INITIAL.'portfolio_layout_catid'.$tag->term_id ); $sel = ' selected="selected"'; ?>
		<select name="<?php echo UT_THEME_INITIAL; ?>portfolio_layout" id="<?php echo UT_THEME_INITIAL; ?>portfolio_layout">
		    <option value="default"<?php echo ($layout=='default'||empty($layout)?$sel:''); ?>>Default (as set in <?php echo UT_THEME_NAME ?>-options)</option>
		    <option value="filt"<?php echo ($layout=='filt'?$sel:''); ?>>Filter</option>
		    <option value="1col"<?php echo ($layout=='1col'?$sel:''); ?>>1 Column</option>
		    <option value="2col"<?php echo ($layout=='2col'?$sel:''); ?>>2 Column</option>
		    <option value="3col"<?php echo ($layout=='3col'?$sel:''); ?>>3 Column</option>
		    <option value="4col"<?php echo ($layout=='4col'?$sel:''); ?>>4 Column</option>
		</select>
		<p class="description"><?php _e( 'Layout for portfolio listing.', UT_THEME_NAME ); ?></p>
	    <?php
		echo $elemnt_22_c;
	    echo $elemnt_1_c;
	    echo $elemnt_1_o;
		echo $elemnt_21_o; ?>
<?php

$dir_icons = '/img/icons/portfolio-filter';
$dir_root = get_theme_root().'/'.get_template().$dir_icons;
$dir_url = get_template_directory_uri().$dir_icons;

$icon_select = '
    <div id="portfolio-icon-upload" class="upload-wrap">
	<div class="selectset">
	    <select name="'.UT_THEME_INITIAL.'filter_icon" id="portfolio-filter-icon" class="ap-upload-dir--img-icons-portfolio-filter">';
foreach( scandir( $dir_root ) as $file ) {
    if( $file != '.' && $file != '..' ){
	$mime_type = ap_get_mime_content_type( $dir_root.'/'.$file ).'<br />';
	if( strpos( $mime_type, 'image' ) === 0 )
	    $image = '<img src="'.$dir_url.'/'.$file.'" class="ap-upload-preview" />';
	else
	    $image = '<img src="'.$theme_path.'/addpress/images/darkicons/icon_webdev.gif" class="ap-fileicon" />';
	$icon_select .= '
	    <option'.($dir_url.'/'.$file==get_option( UT_THEME_INITIAL.'filter_icon_catid'.$tag->term_id )?' selected="selected"':'').' value="'. $dir_url.'/'.$file.'">';
	$icon_select .= str_replace( array('<','>'), array('%(%','%)%'), '
	    <div class="clear file-list-file">
		<div class="ap-thumb">'.$image.'</div>
		<div class="ap-file-info"><strong>'.$file.'</strong></div>
			<span><a href="#" class="delete-file" data-file="'.$dir_icons.'/'.$file.'"></a></span>
	    </div>' );
	$icon_select .= '
	    </option>';
    }
}
$icon_select .= '
	    </select>
	</div>
	<span class="upload-button-wrap" style="cursor:pointer;">
	    <input style="cursor:pointer;" class="fileupload-file" id="portfolio-icon-file" name="file_upload" type="file" data-id="portfolio-icon" data-dir="'.$dir_icons.'" />
	    <button type="button" class="select-file" id="portfolio-icon-button" style="cursor:pointer;">upload file</button>
	    <div class="uploadstatus"></div>
	</span>
    </div>';
?>
		<label for="<?php echo UT_THEME_INITIAL; ?>filter_icon"><?php _e( 'Filter icon', UT_THEME_NAME ); ?></label>
	    <?php
		echo $elemnt_21_c;
		echo $elemnt_22_o; ?>
		<?php echo $icon_select; ?>
		<p class="description"><?php _e( 'Set an icon for the portfolio filter menu.', UT_THEME_NAME ); ?></p>
	    <?php
		echo $elemnt_22_c;
	    echo $elemnt_1_c;
	endif;
	    echo $elemnt_1_o;
		echo $elemnt_21_o; ?>
		<label for="<?php echo UT_THEME_INITIAL; ?>default_<?php echo $name; ?>_<?php echo $term; ?>_title"><?php _e( 'Default '.$term.' title', UT_THEME_NAME ); ?></label>
	    <?php 
		echo $elemnt_21_c;
		echo $elemnt_22_o; ?>
		<input name="<?php echo UT_THEME_INITIAL; ?>default_<?php echo $name; ?>_<?php echo $term; ?>_title" id="<?php echo UT_THEME_INITIAL; ?>default_<?php echo $name; ?>_<?php echo $term; ?>_title" value="<?php echo get_option( UT_THEME_INITIAL.'default_'.$name.'_'.$term.'_title_catid'.$tag->term_id ) ?>" size="40" type="text">
		<p class="description"><?php _e( 'Default header title for each '.$term.' in this category. Leave blank for default as defined in '.UT_THEME_NAME.'-options.', UT_THEME_NAME ); ?></p>
	    <?php 
		echo $elemnt_22_c;
	    echo $elemnt_1_c;
	    echo $elemnt_1_o;
		echo $elemnt_21_o; ?>
		<label for="<?php echo UT_THEME_INITIAL; ?>default_<?php echo $name; ?>_<?php echo $term; ?>_teaser"><?php _e( 'Default '.$term.' teaser', UT_THEME_NAME ); ?></label>
	    <?php 
		echo $elemnt_21_c;
		echo $elemnt_22_o; ?>
		<input name="<?php echo UT_THEME_INITIAL; ?>default_<?php echo $name; ?>_<?php echo $term; ?>_teaser" id="<?php echo UT_THEME_INITIAL; ?>default_<?php echo $name; ?>_<?php echo $term; ?>_teaser" value="<?php echo get_option( UT_THEME_INITIAL.'default_'.$name.'_'.$term.'_teaser_catid'.$tag->term_id ); ?>" size="40" type="text">
		<p class="description"><?php _e( 'Default header title for each '.$term.' in this category. Leave blank for default as defined in '.UT_THEME_NAME.'-options.', UT_THEME_NAME ); ?></p>
	    <?php
		echo $elemnt_22_c;
	    echo $elemnt_1_c;
	    echo $elemnt_1_o;
		echo $elemnt_21_o; ?>
		<label for="<?php echo UT_THEME_INITIAL; ?>default_<?php echo $name; ?>_category_title"><?php _e( 'Default category title', UT_THEME_NAME ); ?></label>
	    <?php
		echo $elemnt_21_c;
		echo $elemnt_22_o; ?>
		<input name="<?php echo UT_THEME_INITIAL; ?>default_<?php echo $name; ?>_category_title" id="<?php echo UT_THEME_INITIAL; ?>default_<?php echo $name; ?>_category_title" value="<?php echo get_option( UT_THEME_INITIAL.'default_'.$name.'_category_title_catid'.$tag->term_id ); ?>" size="40" type="text">
		<p class="description"><?php _e( 'Default header title for '.$term.' list in this category. Leave blank for default as defined in '.UT_THEME_NAME.'-options.', UT_THEME_NAME ); ?></p>
	    <?php
		echo $elemnt_22_c;
	    echo $elemnt_1_c;
	    echo $elemnt_1_o;
		echo $elemnt_21_o; ?>
		<label for="<?php echo UT_THEME_INITIAL; ?>default_<?php echo $name; ?>_category_teaser"><?php _e( 'Default category teaser', UT_THEME_NAME ); ?></label>
	    <?php
		echo $elemnt_21_c;
		echo $elemnt_22_o; ?>
		<input name="<?php echo UT_THEME_INITIAL; ?>default_<?php echo $name; ?>_category_teaser" id="<?php echo UT_THEME_INITIAL; ?>default_<?php echo $name; ?>_category_teaser" value="<?php echo get_option( UT_THEME_INITIAL.'default_'.$name.'_category_teaser_catid'.$tag->term_id ); ?>" size="40" type="text">
		<p class="description"><?php _e( 'Default header title for '.$term.' list in this category. Leave blank for default as defined in '.UT_THEME_NAME.'-options.', UT_THEME_NAME ); ?></p>
	    <?php
		echo $elemnt_22_c;
	    echo $elemnt_1_c; ?>
<?php if( $taxonomy == 'category' ):
	$default_sidebar_id = get_option( UT_THEME_INITIAL.'category_sidebar_catid'.$tag->term_id );
	$ap_sidebars = get_option(UT_THEME_INITIAL.'sidebars_manage_sidebar');
	$options = '<option value="default"'.($default_sidebar_id=='default'||empty($default_sidebar_id)?' selected="selected"':'').'>Default sidebar (as defined in '.UT_THEME_NAME.'-options)</option>';
	$options .= '<option value="none"'.($default_sidebar_id=='none'?' selected="selected"':'').'>No Sidebar (full width)</option>';
	if( is_array($ap_sidebars) ){
	    foreach( $ap_sidebars as $num => $sidebar_options ){
		$options .= '<option'.($selected_sidebar_id==$num?' selected="selected"':'').' value="'.$num.'">'.$sidebar_options['name'].'</option>';
	}   } ?>
	<?php echo $elemnt_1_o; ?>
	    <?php echo $elemnt_21_o; ?>
		<label for="<?php echo UT_THEME_INITIAL; ?>category_sidebar"><?php _e( 'Category sidebar', UT_THEME_NAME ); ?></label>
	    <?php echo $elemnt_21_c; ?>
	    <?php echo $elemnt_22_o; ?>
		<select style="float:left;" name="<?php echo UT_THEME_INITIAL; ?>category_sidebar" id="<?php echo UT_THEME_INITIAL; ?>category_sidebar"><?php echo $options; ?></select>
		<?php $checked_sidebar_align = get_option( UT_THEME_INITIAL.'category_sidebar_align_catid'.$tag->term_id ); ?>
		<input style="margin: 0 0 0 10px; padding: 0; width: auto; float: left;"<?php echo $checked_sidebar_align=='left'?' checked="checked"':''; ?> name="<?php echo UT_THEME_INITIAL; ?>category_sidebar_align" id="<?php echo UT_THEME_INITIAL; ?>category_sidebar_align_left" value="left" type="radio" /><label style="margin: 0; padding: 0; float: left;" for="<?php echo UT_THEME_INITIAL; ?>category_sidebar_align_left"><?php _e( 'left', UT_THEME_NAME ); ?></label>
		<input style="margin: 0 0 0 10px; padding: 0; width: auto; float: left;"<?php echo $checked_sidebar_align!='left'?' checked="checked"':''; ?> name="<?php echo UT_THEME_INITIAL; ?>category_sidebar_align" id="<?php echo UT_THEME_INITIAL; ?>category_sidebar_align_right" value="right" type="radio" /><label style="margin: 0; padding: 0; float: left;" for="<?php echo UT_THEME_INITIAL; ?>category_sidebar_align_right"><?php _e( 'right', UT_THEME_NAME ); ?></label>
		<p style="clear:both;" class="description"><?php _e( 'Sidebar & sidebar align for post list.', UT_THEME_NAME ); ?></p>
	    <?php echo $elemnt_22_c; ?>
	<?php echo $elemnt_1_c; ?>
	<?php $selected_sidebar_id = get_option( UT_THEME_INITIAL.'post_sidebar_catid'.$tag->term_id );
	$options = '<option value="default"'.($selected_sidebar_id=='default'||empty($selected_sidebar_id)?' selected="selected"':'').'>Default Sidebar (as defined in '.UT_THEME_NAME.'-options)</option>';
	$options .= '<option value="none"'.($selected_sidebar_id=='none'?' selected="selected"':'').'>No Sidebar (full width)</option>';
	if( is_array($ap_sidebars) ){
	    foreach( $ap_sidebars as $num => $sidebar_options ){
		$options .= '<option'.($selected_sidebar_id==$num?' selected="selected"':'').' value="'.$num.'">'.$sidebar_options['name'].'</option>';
	}   } ?>
	<?php echo $elemnt_1_o; ?>
	    <?php echo $elemnt_21_o; ?>
		<label for="<?php echo UT_THEME_INITIAL; ?>post_sidebar"><?php _e( 'Default post sidebar', UT_THEME_NAME ); ?></label>
	    <?php echo $elemnt_21_c; ?>
	    <?php echo $elemnt_22_o; ?>
		<select style="float:left;" name="<?php echo UT_THEME_INITIAL; ?>post_sidebar" id="<?php echo UT_THEME_INITIAL; ?>post_sidebar"><?php echo $options; ?></select>
		<?php $checked_sidebar_align = get_option( UT_THEME_INITIAL.'post_sidebar_align_catid'.$tag->term_id ); ?>
		<input style="margin: 0 0 0 10px; padding: 0; width: auto; float: left;"<?php echo $checked_sidebar_align=='left'?' checked="checked"':''; ?> name="<?php echo UT_THEME_INITIAL; ?>post_sidebar_align" id="<?php echo UT_THEME_INITIAL; ?>post_sidebar_align_left" value="left" type="radio" /><label style="margin: 0; padding: 0; float: left;" for="<?php echo UT_THEME_INITIAL; ?>post_sidebar_align_left"><?php _e( 'left', UT_THEME_NAME ); ?></label>
		<input style="margin: 0 0 0 10px; padding: 0; width: auto; float: left;"<?php echo $checked_sidebar_align!='left'?' checked="checked"':''; ?> name="<?php echo UT_THEME_INITIAL; ?>post_sidebar_align" id="<?php echo UT_THEME_INITIAL; ?>post_sidebar_align_right" value="right" type="radio" /><label style="margin: 0; padding: 0; float: left;" for="<?php echo UT_THEME_INITIAL; ?>post_sidebar_align_right"><?php _e( 'right', UT_THEME_NAME ); ?></label>
		<p style="clear:both;" class="description"><?php _e( 'Sidebar & sidebar align for each post in this category.', UT_THEME_NAME ); ?></p>
	    <?php echo $elemnt_22_c; ?>
	<?php echo $elemnt_1_c; ?>
<?php endif; ?>
	<?php echo $elemnt_1_o; ?>
	    <?php echo $elemnt_21_o; ?>
		<label for="<?php echo UT_THEME_INITIAL; ?>category_priority"><?php _e( 'Category priority', UT_THEME_NAME ); ?></label>
	    <?php echo $elemnt_21_c; ?>
	    <?php echo $elemnt_22_o; ?>
		<input style="width:35px;" name="<?php echo UT_THEME_INITIAL; ?>category_priority" id="<?php echo UT_THEME_INITIAL; ?>default_category_category_teaser" value="<?php echo get_option( UT_THEME_INITIAL.'category_priority_catid'.$tag->term_id ); ?>" size="4" type="text">
		<p class="description"><?php _e( 'Set the categories priority with a number. If an arctile is assigned to more than one category, the higher priority defines the category to get the default options from.', UT_THEME_NAME ); ?></p>
	    <?php echo $elemnt_22_c; ?>
	<?php echo $elemnt_1_c; ?>
    <?php }
    add_action( 'created_category', 'ap_save_category_options' );
    add_action( 'edited_category', 'ap_save_category_options' );
    add_action( 'created_portfolio_category', 'ap_save_category_options' );
    add_action( 'edited_portfolio_category', 'ap_save_category_options' );
    function ap_save_category_options( $term_id ){
	foreach( $_POST as $key => $value ){
	    if( strpos( $key, UT_THEME_INITIAL ) === 0 ){
		if( get_option( $key.'_catid'.$term_id )!== FALSE )
		    update_option( $key.'_catid'.$term_id, $value );
		else
		    add_option( $key.'_catid'.$term_id, $value );
    }	}   }

    add_action( 'delete_category', 'ap_delete_category_options' );
    function ap_delete_category_options( $term_id ){
	delete_option( UT_THEME_INITIAL.'default_category_post_title'.$term_id );
	delete_option( UT_THEME_INITIAL.'default_category_post_teaser'.$term_id );
	delete_option( UT_THEME_INITIAL.'default_category_category_title'.$term_id );
	delete_option( UT_THEME_INITIAL.'default_category_category_teaser'.$term_id );
	delete_option( UT_THEME_INITIAL.'category_sidebar'.$term_id );
	delete_option( UT_THEME_INITIAL.'category_sidebar_align'.$term_id );
	delete_option( UT_THEME_INITIAL.'post_sidebar'.$term_id );
	delete_option( UT_THEME_INITIAL.'post_sidebar_align'.$term_id );
	delete_option( UT_THEME_INITIAL.'category_priority'.$term_id );
    }
    add_action( 'delete_portfolio_category', 'ap_delete_portfolio_category_options' );
    function ap_delete_portfolio_category_options( $term_id ){
	delete_option( UT_THEME_INITIAL.'portfolio_layout'.$term_id );
	delete_option( UT_THEME_INITIAL.'filter_icon'.$term_id );
	delete_option( UT_THEME_INITIAL.'default_portfolio_work_title'.$term_id );
	delete_option( UT_THEME_INITIAL.'default_portfolio_work_teaser'.$term_id );
	delete_option( UT_THEME_INITIAL.'default_portfolio_category_title'.$term_id );
	delete_option( UT_THEME_INITIAL.'default_portfolio_category_teaser'.$term_id );
    }

?>