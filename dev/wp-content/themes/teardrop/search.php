<?php global $wp_query?>
<?php get_header()?>

  <div class="title-wrapper"><div class="title-bg"></div><div class="title clearfix">
    <h1>Search results</h1><div id="drag_btn" href="#"></div><div id="slide_btn" href="#"></div>
  </div></div>
  <div id="freespace-title"></div>
  
  <div class="content-wrapper nosidebars clearfix"><div class="content clearfix">
    <div class="article">
	
      <?php teardrop_breadcrumb_nav()?>

      <h2>Search for <?php echo get_search_query()?>: <?php echo $wp_query->post_count?> results</h2>

      <?php while(have_posts()):the_post()?>
	  <ul class="search-results">
			<li><h5><a href="<?php the_permalink()?>"><?php the_title()?></a></h5>
			<?php
				ob_start();
				the_content();
				$old_content = ob_get_clean();
				$new_content = strip_tags($old_content);
				echo substr($new_content,0,300).'...';
			?>
			</li>
		<hr/>
		</ul>
		
      <?php endwhile?>

      
    </div>
  </div></div>
  <div id="freespace"></div>

<?php get_footer()?>


