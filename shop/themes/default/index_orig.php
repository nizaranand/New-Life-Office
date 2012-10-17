<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

	<div class="navigation">
	<div class="alignleft"><?php the_navigation(); ?></div>
	</div>

	<div class="post">
		<h2><?php the_title(); ?></h2>
		<div class="entry"><?php the_content(); ?></div>
	</div>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>