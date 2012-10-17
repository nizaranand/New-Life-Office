<?php
/**
 * Single Portfolio Template - This is the template for the single portfolio item content.
 */
get_header();

if(have_posts()){
	while(have_posts()){
		the_post();
		//get all the page data needed and set it to an object that can be used in other files
		$pex_page=new stdClass();
		$pex_page->subtitle=get_post_meta($post->ID, 'subtitle_value', true);
		$pex_page->slider='none';
		$pex_page->layout=get_opt('_portfolio_layout');
		$pex_page->sidebar=get_opt('_portfolio_sidebar');
		$preview=get_post_meta($post->ID, 'preview_value', true);
		
		//include the before content template
		locate_template( array( 'includes/html-before-content.php'), true, true ); 
		
		if(get_post_meta($post->ID, 'show_title_value', true)!='hide'){ ?>
	  	<h1 class="page-heading"><?php the_title(); ?></h1><hr/><br />	
	  	<?php }
	  	
		if(get_post_meta($post->ID, 'show_preview_value', true)!='hide'){ ?>
			<img class="img-frame" alt="" src="<?php echo pexeto_get_resized_image($preview, 610, ''); ?>" />
		<?php }
		
		
		the_content();
		wp_link_pages();
	}
}

if(get_opt('_portfolio_comments')=='on'){  
	comments_template();  
} 
	 
//include the after content template
locate_template( array( 'includes/html-after-content.php'), true, true );

get_footer();
?>

