<?php global $pex_page; ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php 
	$hide_sections=explode(',',get_opt('_exclude_post_sections'));
	
 if(!in_array('date',$hide_sections)){?>
<div class="post-date"><span><?php echo get_the_date('M');?></span><h4><?php echo get_the_date('d');?></h4>
<?php if(is_single()){ ?>
<span class="year"><?php echo get_the_date('Y');?></span>
<?php } ?>
</div>
<?php } ?>
<div class="post-content">
<h2 class="post-title">
<?php if(!is_single()){ ?>
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
<?php }else{ 
 the_title();
 } ?>
</h2>


<div class="post-info">
<?php if(!in_array('category',$hide_sections) && get_the_category( $post->ID )){?>
	<span class="no-caps"> <?php echo(pex_text('_in_text')); ?> </span><?php the_category(' / ');?>
	<?php }?>

</div>

<?php 
$hideThumbnail=(isset($pex_page->hide_thumbnail)&&$pex_page->hide_thumbnail)?true:false;
if(function_exists('has_post_thumbnail') && has_post_thumbnail() && !$hideThumbnail){ ?>
<div class="blog-post-img"><a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('post_box_img'); ?>
</a></div>
<?php } ?>


<?php
$excerpt=(isset($pex_page->excerpt)&&$pex_page->excerpt)?true:false;
if(!$excerpt && get_opt('_post_summary')!='excerpt' || is_single()){
	the_content('');
	if(is_single()){
		wp_link_pages();
	}
	?>
	<div class="clear"></div>
	<?php 
	if(!is_single()){
		$ismore = @strpos( $post->post_content, '<!--more-->');
		if($ismore){?> <a href="<?php the_permalink(); ?>" class="read-more"><?php echo(pex_text('_read_more')); ?><span class="more-arrow">&raquo;</span></a>
	<?php 
		}
	} 
}else{
	the_excerpt(); ?>
	<div class="clear"></div>
	<a href="<?php the_permalink(); ?>" class="read-more"><?php echo(pex_text('_read_more')); ?><span class="more-arrow">&raquo;</span></a>
	<?php 
}?> 
 <span class="post-info alignright">
 <?php if(!in_array('author',$hide_sections)){?>
 <span class="no-caps"> <?php echo(pex_text('_by_text')); ?>  </span><?php the_author_posts_link(); ?>
 <?php } if(!in_array('comments',$hide_sections)){?>
 <span class="comments">
 | 
 <a href="<?php the_permalink();?>#comments">
 <?php comments_number('0', '1', '%'); ?>
 </a><span class="no-caps"><?php echo pex_text('_comments_text'); ?></span>
 </span>
 </span>
 <?php } ?>
</div>
</div>
