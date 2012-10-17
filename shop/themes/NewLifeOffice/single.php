<?php
get_header(); ?>
<div id="content_b">
<div id="content_2b">
	<div id="content" class="hometopcontent">
<?php include (TEMPLATEPATH . '/nav.php'); ?>			
			
			<?php if (have_posts()) : ?>
			
			<?php while (have_posts()) : the_post(); ?>
			
			<div id="post">			
			
			<h2>
			
			<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title();?></a>
			
			</h2>
			
			<small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>		
			

				<div class="entry">
					
					<?php the_content();?>
					
				</div>		
				
				

				
			</div>
			
				<div style="margin:0 0 15px 0; padding:0 10px 0 28px;">
				<?php comments_template(); ?>
				</div>

		<?php endwhile; ?>

		
	<?php endif; ?>

	</div>
	
	<?php get_sidebar();?>	
	
</div>
</div>



<?php
get_footer();  
?>