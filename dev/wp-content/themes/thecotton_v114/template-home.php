<?php
/*
 Template Name: Home page
 Displays the content of the page and three services boxes after that.
 */

get_header();

if(have_posts()){
	while(have_posts()){
		the_post();
		//get all the page data needed and set it to an object that can be used in other files
		$pex_page=new stdClass();
		$pex_page->subtitle=get_post_meta($post->ID, 'subtitle_value', true);
		$pex_page->intro=get_post_meta($post->ID, 'intro_value', true);
		$pex_page->slider=get_post_meta($post->ID, 'slider_value', true);	
		$pex_page->carousel=get_post_meta($post->ID, 'carousel_value', true);
		$pex_page->carousel_title=get_post_meta($post->ID, 'carouselTitle_value', true);	
		$pex_page->sidebar='right';
		$pex_page->layout='full';
		
		

		//include the before content template
		locate_template( array( 'includes/html-before-content.php'), true, true );
		the_content();
	}
}

//function located in lib/functions/shortcodes.php file
echo pexeto_services_boxes();

//include the after content template
locate_template( array( 'includes/html-after-content.php'), true, true );

get_footer();
?>