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
			
			

				<div class="entry">
					
					<?php the_content();?>
					
				</div>		
				
				

				
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