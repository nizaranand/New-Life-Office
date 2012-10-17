<?php 
/*Initialize Custom Widgets*/
function custom_widget_init() {
	register_widget('Cruz_Cat_Widget');
	register_widget('Cruz_Recent_Posts');
	register_widget('Cruz_Mini_Folio');
	register_widget('Cruz_Popular_Posts');
	register_widget('Cruz_Recent_Comments');
	register_widget('Cruz_Flickr_Widget');
	register_widget('Cruz_Social_Widget');
	register_widget('Cruz_Twitter_Widget');	
	register_widget('Cruz_Mini_Slider');
	register_widget('Cruz_Content_Slider');
}
add_action('widgets_init', 'custom_widget_init');?>