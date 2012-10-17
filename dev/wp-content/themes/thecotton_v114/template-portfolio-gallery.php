<?php
/*
 Template Name: Portfolio Gallery
 Displays the portfolio items in a grid, separated by pages. The items can be also
 filtered by a category.
 */
get_header();

if(have_posts()){
	while(have_posts()){
		the_post();
		
		//get all the page data needed and set it to an object that can be used in other files
		$pex_page=new stdClass();
		$pex_page->page_title=get_the_title();
		$pex_page->subtitle=get_post_meta($post->ID, 'subtitle_value', true);
		$pex_page->intro=get_post_meta($post->ID, 'intro_value', true);
		$show_cat=get_post_meta($post->ID,'categories_value',true);
		$pex_page->show_cat=$show_cat=='hide'?'false':'true';
		$pex_page->show_desc=get_post_meta($post->ID,'showdesc_value',true);
		$pex_page->cat_id=get_post_meta($post->ID,'postCategory_value',true);
		$pex_page->post_per_page=get_post_meta($post->ID,'postNumber_value',true);
		$pex_page->slider=get_post_meta($post->ID, "slider_value", $single = true);
		$pex_page->slider_prefix=get_post_meta($post->ID, 'slider_name_value', true);
		if($pex_page->slider_prefix=='default'){
			$pex_page->slider_prefix='';
		}
		$pex_page->title_link=get_post_meta($post->ID, '_title_link_value', true);
		if($pex_page->title_link==''){
			$pex_page->title_link='on';
		}
		$pex_page->column_number=get_post_meta($post->ID, 'column_number_value', true);
		if($pex_page->column_number==''){
			$pex_page->column_number=3;
		}
		$pex_page->order=get_post_meta($post->ID, 'order_value', true);
		$pex_page->layout='full';
		$pex_page->carousel=get_post_meta($post->ID, 'carousel_value', true);
		$pex_page->carousel_title=get_post_meta($post->ID, 'carouselTitle_value', true);
		
		//include the before content template
		locate_template( array( 'includes/html-before-content.php'), true, true );
	}
}
?>

<div id="gallery">

<?php include(TEMPLATEPATH . '/includes/portfolio/portfolio-setter.php'); ?>

<script type="text/javascript">
jQuery(document).ready(function($){
	$('#gallery').portfolioSetter({
		itemsPerPage:<?php echo $pex_page->post_per_page; ?>, 
		pageWidth:960,
		showCategories:<?php echo $pex_page->show_cat?>,
		showDescriptions:<?php echo $pex_page->show_desc?>,
		columns:<?php echo $pex_page->column_number?>
		});
});

</script>	
</div>
<?php
//include the after content template
locate_template( array( 'includes/html-after-content.php'), true, true );

get_footer();
?>
