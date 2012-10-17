	
	<div id="sidebar">
	<!--<div id="blog_i_sidebar">-->
	<div id="sidebar_b_shade">		
		<ul>
			<li class="search-form">
				<form style="text-align:left; padding-top:20px;" action="https://ssl37.pair.com/inksp3c1/newlifeoffice/shop/advanced_search_result.php" id="searchform" method="get">
					<label for="s" class="hidden">Search for:</label>
					<input type="text" id="s" name="keywords" value=""/><!-- Please use "keywords" as name -->
					<input type="hidden" value="c6b793fcba66fd2cd21ac297c2972d30" name="osCsid"/><input type="submit" value="Search" id="searchsubmit"/>
				</form>
			</li>
			<?php osc_shopping_cart('title_li=<h2>'._c(BOX_HEADING_SHOPPING_CART).'</h2>'); ?>
			<?php osc_list_user_pages ('title_li=<h2>'._c(STORE_NAME).'</h2>'); ?>
			<?php osc_list_categories('show_count=1&title_li=<h2>' . _c(BOX_HEADING_CATEGORIES) . '</h2>'); ?>
			<?php osc_list_catalog_pages ('title_li=<h2>'._c(HEADER_TITLE_CATALOG).'</h2>'); ?>
			<?php osc_list_info_pages ('title_li=<h2>'._c(BOX_HEADING_INFORMATION).'</h2>'); ?>
		</ul>
	</div>	
	
	<!--</div>-->
	</div>
	<div id="quickship">
	<img src="https://ssl37.pair.com/inksp3c1/newlifeoffice/wp-content/themes/NewLifeOffice/images/quickship.gif"  />
	</div>