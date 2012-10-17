<form method="get" id="searchform" action="<?php the_search_action(); ?>">
	<label class="hidden" for="s">Search for:</label><div>
	<input type="text" value="" name="keywords" id="s" />
	<?php the_search_key(); ?>
	<input type="submit" id="searchsubmit" value="Search" />
</div></form>