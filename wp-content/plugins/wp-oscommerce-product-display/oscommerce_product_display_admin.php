<?php

	if($_POST['oscommerce_hidden'] == 'Y') {
		
		/* Send form data. */
		$database_host = $_POST['oscommerce_db_host'];
		update_option('oscommerce_db_host', $database_host);
		
		$database_name = $_POST['oscommerce_db_name'];
		update_option('oscommerce_db_name', $database_name);
		
		$database_user = $_POST['oscommerce_db_user'];
		update_option('oscommerce_db_user', $database_user);
		
		$database_password = $_POST['oscommerce_db_password'];
		update_option('oscommerce_db_password', $database_password);

		$product_image_folder = $_POST['oscommerce_product_image_folder'];
		update_option('oscommerce_product_image_folder', $product_image_folder);

		$store_url = $_POST['oscommerce_store_url'];
		update_option('oscommerce_store_url', $store_url);

?>
		
	<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>

<?php

	} else {
		
		/* Display page normally. */
		$database_host = get_option('oscommerce_db_host');
		$database_name = get_option('oscommerce_db_name');
		$database_user = get_option('oscommerce_db_user');
		$database_password = get_option('oscommerce_db_password');
		$product_image_folder = get_option('oscommerce_product_image_folder');
		$store_url = get_option('oscommerce_store_url');
	}
	
?>

<!-- The HTML form for the admin page. -->
<div class="wrap">

	<?php echo "<h2>".__('OSCommerce Product Generator Options', 'oscommerce_trdom')."</h2>"; ?>

	<form name="oscommerce_form" method="post" action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="oscommerce_hidden" value="Y" />
			<?php echo "<h4>".__('OSCommerce Database Settings', 'oscommerce_trdom')."</h4>"; ?>
			<p>
				<?php _e("Database host: "); ?>
                <input type="text" name="oscommerce_db_host" value="<?php echo $database_host; ?>" size="20" />
				<?php _e(" ex: localhost"); ?>
            </p>
			<p>
				<?php _e("Database name: "); ?>
                <input type="text" name="oscommerce_db_name" value="<?php echo $database_name; ?>" size="20" />
				<?php _e(" ex: oscommerce_shop"); ?>
            </p>
			<p>
				<?php _e("Database user: "); ?>
                <input type="text" name="oscommerce_db_user" value="<?php echo $database_user; ?>" size="20" />
				<?php _e(" ex: admin"); ?>
            </p>
			<p>
				<?php _e("Database password: "); ?>
                <input type="text" name="oscommerce_db_password" value="<?php echo $database_password; ?>" size="20" />
				<?php _e(" ex: SamplePassword"); ?>
            </p>
            
			<hr />
			
			<?php echo "<h4>".__( 'OSCommerce Store Settings', 'oscommerce_trdom')."</h4>"; ?>
			<p>
				<?php _e("Store URL: "); ?>
                <input type="text" name="oscommerce_store_url" value="<?php echo $store_url; ?>" size="20" />
				<?php _e(" ex: http://www.samplesite.com/catalog/"); ?>
            </p>
			<p>
				<?php _e("Product image folder: "); ?>
                <input type="text" name="oscommerce_product_image_folder" value="<?php echo $product_image_folder; ?>" size="20" />
				<?php _e(" ex: http://www.samplesite.com/catalog/images/" ); ?>
            </p>
	
			<p class="submit">
				<input type="submit" name="Submit" value="<?php _e('Update Options', 'oscommerce_trdom' ) ?>" />
			</p>
	</form>
    
</div>