<?php
/*
 * ************************************* *
 *           ADDPRESS WIDGET             *
 *                Flickr                 *
 * ************************************* *
 *                                       *
 * this widget displays flickr images    *
 * by user or tags                       *
 *                                       *
 * ************************************* *
 *     copyright by Alex Schornberg      *
 *            www.herz-as.net            *
 *                 for                   *
 *             UnitedThemes              *
 *         www.unitedthemes.com          *
 *****************************************
 * created with Wordpress V 3.2.1        *
 *****************************************
 */

class ap_Contact_Info extends WP_Widget {

    protected $slug = 'ap_contact_info', $title = 'Contact Info', $description = 'Add some contact information details.';

    function ap_Contact_Info() {
        parent::WP_Widget( $this->slug, __( $this->title, UT_THEME_NAME ), array( 'description' => __( $this->description, UT_THEME_NAME ) ) );
    }

    function form($instance) {
	
	wp_enqueue_script('jquery');
	$items = json_decode($instance['items'], true);
?>
    <style type="text/css">
	#widget-items-<?php echo $this->number; ?> .widget-item{
	    margin: 0 0 10px 0;
	}
	#widget-items-<?php echo $this->number; ?> .widget-item label{
	    display: block;
	    margin: 0 0 10px 0;
	}
	#widget-items-<?php echo $this->number; ?> input{
	    width:190px;
	    float: right;
	    margin: -3px 0 0 0;
	}
	#widget-items-<?php echo $this->number; ?> .clear{
	    clear: both;
	}

    </style>
    <script type="text/javascript">
	jQuery(document).ready(function($){
	    var item = '<div class="widget-item"><label><?php _e('Label'); ?>:<input type="text" class="widefat label" /></label><label><?php _e('Value'); ?>:<input type="text" class="widefat value" /></label><a href="#" class="del-item button clear">-</a></div>';
	    $('.del-item').live('click', function(){
		$(this).parent().remove();
	    });
	    $('#add-item-<?php echo $this->number; ?>').click(function(event){
		event.stopPropagation();
		$('#widget-items-<?php echo $this->number; ?>').append(item);
	    });
	    $('#widget-<?php echo $this->id; ?>-savewidget').click(function() {
		get_data_object_string();
	    });
	    function get_data_object_string(){
		var i=0, data={};
		$('#widget-items-<?php echo $this->number; ?> .widget-item').each(function(){
		    if( $(this).find('.label').val()!='' || $(this).find('.value').val()!='' ){
			i++;
			data[i]={};
			data[i]['label'] = $(this).find('.label').val();
			data[i]['value'] = $(this).find('.value').val();
		    }
		});
		$( '#<?php echo $this->get_field_id('items'); ?>' ).val( JSON.stringify( data ) );
	    }
	});
    </script>

    <label><?php _e('Title'); ?>: <input type="text" style="width:100%;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" /></label>

    <div class="clear"></div>
    <br />
    <div id="widget-items-<?php echo $this->number; ?>">
	<?php foreach( $items as $num => $fileds ): ?>
	<div class="widget-item">
	    <label><?php _e('Label'); ?>:<input type="text" class="label" value="<?php echo esc_attr($fileds['label']); ?>" /></label>
	    <div class="clear"></div>
	    <label><?php _e('Value'); ?>:<input type="text" class="value" value="<?php echo esc_attr($fileds['value']); ?>" /></label>
	    <div class="clear"></div>
	    <a href="#" class="del-item button">-</a>
	</div>
	
	<?php endforeach; ?>
	<div class="widget-item">
	    <label><?php _e('Label'); ?>:<input type="text" class="label" /></label>
	    <div class="clear"></div>
	    <label><?php _e('Value'); ?>:<input type="text" class="value" /></label>
	    <div class="clear"></div>
	    <a href="#" class="del-item button">-</a>
	</div>
	
    </div>
    <?php if( $this->number == '__i__' ): ?>
    <div id="" style="padding:3px; margin-top:10px;" class="updated below-h2"><strong>Note:</strong> Save once to add more items.</div>
    <?php else: ?>
    <input type="button" id="add-item-<?php echo $this->number; ?>" class="button" value="Add Item" />
    <?php endif; ?>
    <input type="hidden" id="<?php echo $this->get_field_id('items'); ?>" name="<?php echo $this->get_field_name('items'); ?>" value="" />

<?php

    }

    function update($new_instance, $old_instance) {
        return $new_instance;
    }

    function widget( $args, $instance ){

	extract( $args );
	$items = json_decode($instance['items'], true);
	$title = $instance['title'];
	$title = apply_filters( $this->slug, $title );
	
	$out = '
	    <ul class="contact">';
	foreach( $items as $num => $fields ){
	    $out .= '
		<li>
		    <span class="contact-title">'.do_shortcode($fields['label']).'</span>
		    <span class="contact-content">'.do_shortcode($fields['value']).'</span>
		</li>';
	}
	$out .='
	    </ul>';

	if( $title )
	    $title = $before_title.do_shortcode($title).$after_title;
	    
	echo "
	$before_widget
	    $title
	    $out
	$after_widget
	";
    }

}

add_action( 'widgets_init', create_function( '', 'return register_widget("ap_Contact_Info");' ) );

?>
