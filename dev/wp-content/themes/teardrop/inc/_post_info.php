<div class="info clearfix">
		<?php if (get_option('teardrop_theme_blog_author_show')=='true') {?>
		<span class="author"><?php the_author()?></span>		
	<?php }?>
<?php if (get_option('teardrop_theme_blog_category_show')=='true') {?>
		<span class="tags"><?php the_category(', ')?></span>		
	<?php }?>
	<?php if (get_option('teardrop_theme_blog_comments_show')=='true') {?>
		<span class="comments"><a href="<?php comments_link(); ?>"><?php comments_number(__('No comments', '1 Comment', '% Comments'))?></a></span>
	<?php }?> 

</div>

