<?php global $wp_query;
  $paged = (get_query_var('paged'))? get_query_var('paged'): 1;
  $args=array('post_type'=>array('post'), 'posts_per_page'=>get_option('teardrop_theme_blog_items'), 'paged'=>$paged);
  if(isset($wp_query->query_vars['category_name'])) $args['category_name']=$wp_query->query_vars['category_name'];
  if(isset($wp_query->query_vars['tag'])) $args['tag']=$wp_query->query_vars['tag']; ?>
  <?php query_posts($args); while(have_posts()):the_post()?>
  
  <div class="content-area"> 
  <?php if (get_option('teardrop_theme_blog_date_show')=='true') {?>
	   <div id="time-data"><div id="day"><?php the_time('d')?></div><div id="month"><?php the_time('M')?></div></div>	   
  <?php }?>	
  <h2 id="blog-title">  
  	<a href="<?php the_permalink()?>"><?php the_title()?></a>	 
  </h2>
  <?php if(has_post_thumbnail()) echo teardrop_image(array('type'=>'full','url'=>get_permalink(),'hover'=>true,'width'=>490, 'height'=>250))?>
  <?php if(get_option('teardrop_theme_blog_author_show')=='true'||get_option('teardrop_theme_blog_category_show')=='true'||get_option('teardrop_theme_blog_comments_show')=='true'):?>
  <?php get_template_part("_post_info") ?>
  <?php endif?>
  <div class="post-entry"><?php the_excerpt()?>  </div>
  <div class="content-bg"></div>
  </div>
    	
<?php endwhile?>

<?php teardrop_pages($paged)?>