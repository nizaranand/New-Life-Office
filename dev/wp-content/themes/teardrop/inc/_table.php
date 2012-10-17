<?php $tdir=get_bloginfo('template_directory'); global $wp_query;?>
<?php
  $paged = (get_query_var('paged'))? get_query_var('paged'): 1;
  $args=array('post_type'=>'portfolio', 'posts_per_page'=> -1, 'paged'=>$paged);
  if(isset($wp_query->query['portfolio_cat'])) $args['portfolio_cat']=$wp_query->query['portfolio_cat'];
  query_posts($args); $i=0; while(have_posts()):the_post()?>
  <?php 
  $postid = $post->ID;
  $pimg_url=get_post_meta($postid, '_portimage_full_value', true); ?>

  <div class="portfolio" id="threecol">    
  <?php echo teardrop_image(array('type'=>'med','url'=>$pimg_url,'width'=>194,'height'=>240)) ?>
	<h4 class="port-title">
			<a href="<?php the_permalink()?>"><?php the_title()?></a> 
	</h4>	
  <?php the_excerpt()?>
  <div class="content-bg"></div>
  </div>
<?php if($i++%3==2) echo "<div class='clearfix' style='height:5px;'>&nbsp;</div>"; endwhile?>


<?php teardrop_pages($paged)?>
