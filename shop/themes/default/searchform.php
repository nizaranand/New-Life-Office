<form method="get" id="searchform" action="<?php the_search_action(); ?>">
<label class="hidden" for="s">Search for:</label>
<input type="text" value="" name="keywords" id="s" /><!-- Please use "keywords" as name -->
<?php the_search_key(); ?>
<input type="submit" id="searchsubmit" value="Search" />
</form>