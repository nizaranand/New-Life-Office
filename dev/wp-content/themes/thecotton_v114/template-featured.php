<?php
/*
 Template Name: Featured page
 Displays the posts from a category that is set to be featured.
 */

get_header();

if(have_posts()){
	while(have_posts()){
		the_post();
		//get all the page data needed and set it to an object that can be used in other files
		$pex_page=new stdClass();
		$pex_page->title=get_the_title();
		$pex_page->cat_id=get_opt('_featured_cat');
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
		$pex_page->sidebar=get_post_meta($post->ID, 'sidebar_value', true);
		if($pex_page->sidebar==''){
			$pex_page->sidebar='default';
		}
		$pex_page->carousel=get_post_meta($post->ID, 'carousel_value', true);	
		$pex_page->carousel_title=get_post_meta($post->ID, 'carouselTitle_value', true);
		$pex_page->hide_thumbnail=true;
		$pex_page->excerpt=true;

		//include the before content template
		locate_template( array( 'includes/html-before-content.php'), true, true );
		
		the_content();

		}
}
?>
<div id="blog-latest">
<?php 
$args=array('posts_per_page' =>get_opt('_post_per_page_on_featured'));
if(isset($pex_page->cat_id) && $pex_page->cat_id && $pex_page->cat_id!='-1'){
   $args['cat']=$pex_page->cat_id;
}
query_posts($args);

$closed=true;
if(have_posts()){
	$i=0;
	while(have_posts()){
		the_post();
		global $more;
		$more = 0;
		
	if($i==0){
		locate_template( array( 'includes/post-template.php'), true, false );
	}else{
	
	$right = $i%2==0?' latest-small-right':''; 
	
	if($right==''){
		$closed=false;
	?>
	<div class="columns-wrapper">
	<?php } ?>

	 <div class="latest-small<?php echo $right;?>">
    <div class="post-date"><span><?php echo get_the_date('M');?></span><h4><?php echo get_the_date('d');?></h4></div>
    <div class="post-content">
    <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    
<p>
    <?php 
    $excerpt = substr(get_the_excerpt(), 0, 100);
    echo $excerpt.'[...]';
    ?>
    </p>
   <a href="<?php the_permalink(); ?>" class="read-more"><?php echo(pex_text('_read_more')); ?><span class="more-arrow">&raquo;</span></a>
    
    </div>
    </div>
    <?php if($right!=''){
    $closed=true;
    	?>
    	</div>
    	<?php }?>
	<?php
	} 
	
	$i++;
	}  
}   
if(!$closed){
?>
</div>
<?php } ?>


</div>

<?php 
//include the after content template
locate_template( array( 'includes/html-after-content.php'), true, true );

get_footer();
?>
