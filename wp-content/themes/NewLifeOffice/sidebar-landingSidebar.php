

<?php
/**
 * The sidebar2 widget areas.
 *
 *
 */
?>

<?php
	/* The widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'landingSidebar'  ) && dynamic_sidebar('landingSidebar'))
		return;
	// If we get this far, we have widgets. Let do this.
?>
<div id="widget-area">

<?php if ( is_active_sidebar( 'landingSidebar' ) ) : ?>
				<div id="first" class="widget-area">
					<ul class="xoxo">
						<?php dynamic_sidebar( 'landingSidebar' ); ?>
					</ul>
				</div><!-- #first .widget-area -->
<?php endif; ?>

</div><!-- widget-area -->