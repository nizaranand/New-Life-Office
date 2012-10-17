<?php 
/**
 * Search form - this is the template for the search form - can be used in the sidebar (with the Search widget)
 */
?>
<div id="sidebar_search">
  <form role="search" method="get" id="searchform" action="<?php echo home_url(); ?>" >
    <input type="text" name="s" id="search-input"  />
<input type="submit" value="<?php echo pex_text('_search_text');?>" class="button" id="search-button"/>
  </form>
</div>
