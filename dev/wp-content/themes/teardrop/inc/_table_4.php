<?php $tdir = get_template_directory_uri(); global $wp_query;?>
<?php
  $paged = (get_query_var('paged'))? get_query_var('paged'): 1;
  $args=array('post_type'=>'portfolio', 'posts_per_page'=> -1, 'paged'=>$paged);
  if(isset($wp_query->query_vars['portfolio_cat'])) $args['portfolio_cat']=$wp_query->query_vars['portfolio_cat'];
  query_posts($args); $i=0; while(have_posts()):the_post()?>
  <?php 
  $postid = $post->ID;
  $pimg_url=get_post_meta($postid, '_portimage_full_value', true);
  $url=wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
  if(empty($pimg_url)) $pimg_url=$url[0]  ?>
  
<div class="masonry-container">  
  <?php
$tt=array(array(253,170),array(253,420),array(253,253),array(253,300));
$tt=$tt[rand(0,(sizeof($tt)-1))];
 echo teardrop_image_mans(array('type'=>'mans-img','url'=>$pimg_url,'width'=>$tt[0],'height'=>$tt[1])) ?> 
 <div class="magic-detail">
<div class="magic-zoom"><a class="prettyPhoto" rel="prettyPhoto" href='<?php echo $pimg_url ?>' title="Open in Lightbox"><img src='<?php echo $tdir ?>/i/icon-zoom.png' alt="" title="" /></a></div>
<div class="magic-link"><a href='<?php the_permalink()?>' title="Open Full Post '<?php the_title()?>'"><img src='<?php echo $tdir ?>/i/permalink.png' alt="" title="" /></a></div>
</div>

</div>


<?php endwhile?>


<?php teardrop_pages($paged)?>
