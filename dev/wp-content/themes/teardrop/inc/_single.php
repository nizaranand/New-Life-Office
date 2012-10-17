<?php global $wp_query;
$postid = $wp_query->post->ID;
$pimg_url=get_post_meta($postid, '_portimage_full_value', true); ?>
<div class="content-area"> 
<?php if((is_single()) && ($wp_query->query_vars['post_type']!='portfolio')):?>
  <?php if(get_option('teardrop_theme_blog_image_show')=='true'):?>
	<?php if(has_post_thumbnail()) {
      echo teardrop_image(array('type'=>'blog','url'=>$pimg_url,'width'=>490, 'height'=>250))
    ;}?>
  <?php endif?>
  <?php if((get_option('teardrop_theme_blog_single_meta_show')=='true')):?>
	<?php get_template_part("_post_info") ?>
  <?php endif?>
  <?php the_content()?>
	<?php comments_template(); ?>
    <?php else:?>
	<?php if(($wp_query->query_vars['post_type']!='page')):?>
  <?php   
  if(has_post_thumbnail()) {
      echo teardrop_image(array('type'=>'fullfea','url'=>$pimg_url,'width'=>490, 'height'=>350))
    ;}?>
  <?php endif?>
  <?php the_content()?>
<?php endif?>
<div class="single-bg"></div>
</div>	
