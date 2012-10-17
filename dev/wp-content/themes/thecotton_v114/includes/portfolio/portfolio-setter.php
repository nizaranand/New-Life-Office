<?php
/**
 * This file generates the portfolio items HTML.
 */

//display the category filter if enabled
if($pex_page->show_cat=='true'){
	echo('<div id="portfolio-categories">');
	$cats=pexeto_get_taxonomy_children('portfolio_category', $pex_page->cat_id);
	echo '<h6>'.pex_text('_showme_text').'</h6>';
	echo '<ul><li>'.pex_text('_all_text').'</li>';
	for($i=0; $i<count($cats); $i++){
		echo('<li id="'.$cats[$i]->term_id.'" class="category">'.$cats[$i]->name.'</li>');
	}
	echo('</ul></div>');
}

echo '<div class="items">';

//set the query_posts args
$args= array(
    'posts_per_page' =>-1, 
	'post_type' => PEXETO_PORTFOLIO_POST_TYPE
);

if($pex_page->cat_id!='-1'){
	$slug=pexeto_get_taxonomy_slug($pex_page->cat_id);
	$args['portfolio_category']=$slug;
}

//set the order arguments
if($pex_page->order=='custom'){
	$args['orderby']='menu_order';
	$args['order']='asc';
}else{
	$args['orderby']='date';
	$args['order']='desc';
}
	
	
query_posts($args);
	

$html='';
$imgWidth=get_opt('_portfolio_width'.$pex_page->column_number);
$imgHeight=get_opt('_portfolio_height'.$pex_page->column_number);


	if(have_posts()) {
		 while (have_posts()) {
		 	the_post(); 
			
		$permalink=get_permalink();	
			
		$item_title=get_the_title();
		if($pex_page->title_link=='on'){
			$title='<a href="'.$permalink.'" title="'.$item_title.'">'.$item_title.'</a>';
		}else{
			$title=get_the_title();
		}
		
		$description=get_post_meta($post->ID, 'description_value', true);
		$descHtml=$pex_page->show_desc=='true'?'<div class="item-desc" title="'.$item_title.'" style="width:'.($imgWidth+10).'px;"><h4>'.$title.'</h4><p>'.$description.'</p></div>':'';
		//insert the description in the lightbox if descriptions are disabled
		$lightHtml=$pex_page->show_desc=='true'?'':$description;
		$preview=get_post_meta($post->ID, 'preview_value', true);
		$thumbnail=get_post_meta($post->ID, 'thumbnail_value', true);
		
		if(!$thumbnail){
			$thumbnail=pexeto_get_resized_image($preview, $imgWidth, $imgHeight);
		}
		
		$action=get_post_meta($post->ID, 'action_value', true);
		$customlink=get_post_meta($post->ID, 'custom_value', true);
		
		//set the link of the image depending on the action selected
		if($action=='nothing'){
			$openLink='';
			$closeLink='';
		}else if($action=='permalink'){
			$openLink='<a href="'.$permalink.'">';
			$closeLink='</a>';
		}else if($action=='custom'){
			$openLink='<a href="'.$customlink.'" target="_blank">';
			$closeLink='</a>';
		}else{
			$preview=$action=='video'?$customlink:$preview;
			$openLink='<a rel="lightbox[group]" class="single_image" href="'.$preview.'" title="'.$lightHtml.'">';
			$closeLink='</a>';
		}
		
		//get the category IDs to which the items belong and generate a string
		//containing them, separated by commas, for example: 1,2,3
		$terms=wp_get_post_terms($post->ID, 'portfolio_category');
			$term_string='';
			foreach($terms as $term){
				$term_string.=($term->term_id).',';
			}
		$term_string=substr($term_string, 0, strlen($term_string)-1);
			
		//generate the final item HTML
		$html.= '<div class="portfolio-item" title="'.$term_string.'">'.$openLink.'<img src="'.$thumbnail.'" class="img-frame" width="'.$imgWidth.'" height="'.$imgHeight.'" title="'.get_the_title().'"/>'.$closeLink.$descHtml.'</div>';
		}
	}
	echo $html;

echo '</div>';	