<?php
/*
 Template Name: Portfolio Showcase Page
 Can be used for portfolio items with more content to them - displays the content of the item on the left
 and a list with the other items on the right.
 */
get_header();?>

<?php

if(have_posts()){
	while(have_posts()){
		the_post();
		
		//get all the page data needed and set it to an object that can be used in other files
		$pex_page=new stdClass();
		$pex_page->subtitle=get_post_meta($post->ID, 'subtitle_value', true);
		$pex_page->intro=get_post_meta($post->ID, 'intro_value', true);
		$pex_page->cat_id=get_post_meta($post->ID,'postCategory_value',true);
		$pex_page->post_number=get_post_meta($post->ID,'postNumber_value',true);
		$pex_page->slider=get_post_meta($post->ID, "slider_value", $single = true);
		$pex_page->slider_prefix=get_post_meta($post->ID, 'slider_name_value', true);
		if($pex_page->slider_prefix=='default'){
			$pex_page->slider_prefix='';
		}
		$pex_page->order=get_post_meta($post->ID, 'order_value', true);
		$pex_page->layout='full';
		$pex_page->carousel=get_post_meta($post->ID, 'carousel_value', true);
		$pex_page->carousel_title=get_post_meta($post->ID, 'carouselTitle_value', true);
		$pex_page->sidebar_title=get_post_meta($post->ID, 'sidebarTitle_value', true);
		
		//include the before content template
		locate_template( array( 'includes/html-before-content.php'), true, true );
	}
}
?>



<div id="portfolio-preview-container">
<div class="loading"></div>


<?php include(TEMPLATEPATH . '/includes/portfolio/portfolio-previewer.php'); ?>

<script type="text/javascript">
jQuery(document).ready(function($){
	$('#portfolio-preview-container').portfolioPreviewer({
		itemnum:<?php echo $pex_page->post_number; ?>,
		order:"<?php echo $pex_page->order; ?>",
		prev:"<?php echo pex_text('_previous_text'); ?>",
		next:"<?php echo pex_text('_next_text'); ?>",
		more:"<?php echo $pex_page->sidebar_title; ?>"
		});
});
</script>	

    </div>

<?php

//include the after content template
locate_template( array( 'includes/html-after-content.php'), true, true );

get_footer();
?>
