<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>
	<div id="content" class="narrowcolumn">
	<?php  $osCsid=$_REQUEST["osCsid"];?>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>			
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>

				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
					<?php if($osCsid!=""){?>
					<form name="cart_quantity" action="https://ssl37.pair.com/inksp3c1/aspenwoodpublishing/shop/product_info.php?products_id=28&amp;action=add_product&amp;osCsid=c834d3c2cb61ef60706f5377ec8d1db8" method="post" style= "border: 0px; padding: 5px; text-align:left"><input type="hidden" name="products_id" value="28" />
					<input type="image" src="https://ssl37.pair.com/inksp3c1/aspenwoodpublishing/wp-content/themes/default/images/buy-now.gif" />
					<input type="button" onclick="location.href='https://ssl37.pair.com/inksp3c1/aspenwoodpublishing/shop/shopping_cart.php?osCsid=<?=$osCsid;?>';" value="View Cart"/></form>
					<? } else { ?>
					<form name="cart_quantity" action="https://ssl37.pair.com/inksp3c1/aspenwoodpublishing/shop/product_info.php?products_id=28&amp;action=add_product" method="post" style= "border: 0px; padding: 5px; text-align:left"><input type="hidden" name="products_id" value="28" />
					<input type="image" src="https://ssl37.pair.com/inksp3c1/aspenwoodpublishing/wp-content/themes/default/images/buy-now.gif" />
					<input type="button" onclick="location.href='https://ssl37.pair.com/inksp3c1/aspenwoodpublishing/shop/shopping_cart.php';" value="View Cart"/></form>
					<? } ?>
				</div>
				

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
