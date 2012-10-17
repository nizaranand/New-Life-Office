<?php
/**
 * This file generates the portfolio items HTML.
 */

echo '<div class="preview-items">';

//set the query_posts args
$args= array(
         'posts_per_page' =>-1, 
		 'post_type' => PEXETO_PORTFOLIO_POST_TYPE,
		 'orderby' => 'menu_order'
	);

	if($pex_page->cat_id!='-1'){
		$slug=pexeto_get_taxonomy_slug($pex_page->cat_id);
		$args['portfolio_category']=$slug;
	}
	
//set the order args	
if($pex_page->order=='custom'){
	$args['orderby']='menu_order';
	$args['order']='asc';
}else{
	$args['orderby']='date';
	$args['order']='desc';
}


	
query_posts($args);
	
	if(have_posts()) {
		 while (have_posts()) {
		 	the_post(); 
		 	$html = '<div class="portfolio-showcase-item">';
		 	$html.='<div class="preview-item">';
			
			$preview=get_post_meta($post->ID, 'preview_value', true);	
			
			if(get_post_meta($post->ID, 'show_preview_value', true)!='hide'){
				$html.='<img class="alignleft img-frame portfolio-big-img" alt="" src="'.$preview.'">';
			}
			if(get_post_meta($post->ID, 'show_title_value', true)!='hide'){
				$html.='<h1 class="page-heading">'.get_the_title().'</h1><div class="double-line"></div>';
			}
			$html.=do_shortcode(get_the_content()).'</div>';
			
			//generate the HTML for the smaller preview item
			$html.='<div class="showcase-item">';
			
			$thumbnail=get_post_meta($post->ID, 'thumbnail_value', true);
		 	if(!$thumbnail){
				$thumbnail=pexeto_get_resized_image($preview, 65, 47);
			}
			
			
			$html.='<img class="alignleft img-frame" alt="" src="'.$thumbnail.'">';
			
			//get the categories
		 	$terms=wp_get_post_terms($post->ID, 'portfolio_category');
			$term_string='';
			$first=true;
			foreach($terms as $term){
				if(!$first){
					$term_string.=' / ';	
				}
				$term_string.=($term->name);
				$first=false;
			}
			$html.='<h6>'.get_the_title().'</h6>';
			if($term_string){
				$html.='<span class="no-caps">'.pex_text('_in_text').' </span><span class="post-info">'.$term_string.'</span>';
			}
			$html.='</div>';
			
			$html.= '</div>';
			echo $html;
		}
	}
	
echo '</div>';	
