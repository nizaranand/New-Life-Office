<?php
/**
 * Default page template - all the pages by default use this template unless another page template has been assigned.
 */
get_header();

if(have_posts()){
	while(have_posts()){
		the_post();
		//get all the page data needed and set it to an object that can be used in other files
		$pex_page=new stdClass();
		$pex_page->subtitle=get_post_meta($post->ID, 'subtitle_value', true);
		$pex_page->intro=get_post_meta($post->ID, 'intro_value', true);
		$pex_page->slider=get_post_meta($post->ID, 'slider_value', $single = true);
		$pex_page->slider_prefix=get_post_meta($post->ID, 'slider_name_value', true);
		if($pex_page->slider_prefix=='default'){
			$pex_page->slider_prefix='';
		}
		$pex_page->layout=get_post_meta($post->ID, 'layout_value', true);
		if($pex_page->layout==''){
			$pex_page->layout='right';
		}
		$pex_page->show_title=get_opt('_show_page_title');
		$pex_page->sidebar=get_post_meta($post->ID, 'sidebar_value', $single = true);
		if($pex_page->sidebar==''){
			$pex_page->sidebar='default';
		}
		$pex_page->carousel=get_post_meta($post->ID, 'carousel_value', true);
		$pex_page->carousel_title=get_post_meta($post->ID, 'carouselTitle_value', true);
		
		//include the before content template
		locate_template( array( 'includes/html-before-content.php'), true, true );
    	wp_reset_postdata();
    if($pex_page->show_title!='off'){?>
    	<h1 class="page-heading"><?php the_title(); ?></h1><hr/>	
    <?php }
    
the_content();
wp_link_pages();
	}
}
//include the after content template
locate_template( array( 'includes/html-after-content.php'), true, true );

get_footer();
?>

