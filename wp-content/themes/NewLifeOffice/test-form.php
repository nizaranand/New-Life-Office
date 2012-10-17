<?php /*
Template Name: Test Form
*/ ?>

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
	
	<div id="sidebar">
	<div id="blog_i_sidebar">
	<div id="sidebar_b_shade">	

		<ul>&nbsp;
		 <?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
			
			<?php wp_list_categories('show_count=1&title_li=<h2>&nbsp;</h2>'); ?>

			
				<?php wp_list_bookmarks(); ?>

				<!--<li><h2>&nbsp;</h2>
				<ul>-->
					<!--<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
					<?php wp_meta(); ?>-->
<!--<br /><br /><br /><br /><br /><br /><br />&nbsp;
				</ul>
				</li>-->
				<br />
				
				<?php insert_cform('Contact'); ?>
			

			<?php endif; ?>	
	
	
		</ul>
	</div>	
	
	</div>
	</div>
	<div id="quickship">
	<img src="<?php bloginfo('stylesheet_directory')?>/images/quickship.gif"  />
	</div>
	

	</div>
	
	<?php //get_sidebar();?>	
	
</div>
</div>



<?php
get_footer();  
?>