<div id="sidebar">
	<div id="blog_i_sidebar">
	<div id="sidebar_b_shade">	

		<ul>
		 <?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
			

			<?php //wp_list_pages('title_li=<h2>Pages</h2>' ); ?>
<!--<li><h2> </h2>
				<ul>
				
				</ul>
			</li>-->

			<?php //wp_list_categories('show_count=1&title_li=<h2>&nbsp;</h2>'); ?>

			
				<?php wp_list_bookmarks(); ?>

			
			<br />
			<h2 class="form-pad">Request Information</h2>
			<?php insert_cform('Contact'); ?>

			<?php endif; ?>	
	
	
		</ul>
	</div>	
	
	</div>
	</div>
	<div id="quickship">
	<img src="<?php bloginfo('stylesheet_directory')?>/images/quickship.png" alt="Quick Ship Label" />
	</div>
