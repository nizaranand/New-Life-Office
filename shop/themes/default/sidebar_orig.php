	<div id="sidebar">
		<ul>
		<li>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		</li>
		<?php osc_shopping_cart('title_li=<h2>'._c(BOX_HEADING_SHOPPING_CART).'</h2>'); ?>


		
		<?php osc_list_user_pages ('title_li=<h2>'._c(STORE_NAME).'</h2>'); ?>
		<?php osc_list_categories('show_count=1&title_li=<h2>' . _c(BOX_HEADING_CATEGORIES) . '</h2>'); ?>

		<?php osc_list_catalog_pages ('title_li=<h2>'._c(HEADER_TITLE_CATALOG).'</h2>'); ?>

		<?php osc_list_info_pages ('title_li=<h2>'._c(BOX_HEADING_INFORMATION).'</h2>'); ?>
		</ul>
	</div>
