<?php 
/**
Template Page for the gallery overview

Follow variables are useable :

	$gallery     : Contain all about the gallery
	$images      : Contain all images, path, title
	$pagination  : Contain the pagination content

 You can check the content when you insert the tag <?php var_dump($variable) ?>
 If you would like to show the timestamp of the image ,you can use <?php echo $exif['created_timestamp'] ?>
**/
?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><?php if (!empty ($gallery)) : ?>



<?php if ($gallery->show_piclens) { ?>
	<!-- Piclense link -->
	<div class="piclenselink">
		<a class="piclenselink" href="<?php echo $gallery->piclens_link ?>">
			<?php _e('[View with PicLens]','nggallery'); ?>
		</a>
	</div>
<?php } ?>

<!-- Thumbnails -->
<?php foreach ( $images as $image ) : ?>

<div id="homestation_vegas">
			
<div class="product_vegas">

  <div class="vegas_gallery_productimg">
				<?php if ( !$image->hidden ) { ?>
				<img title="<?php echo $image->alttext ?>" width="280px" alt="<?php echo $image->alttext ?>" src="<?php echo $image->imageURL ?>"/>
				<?php } ?>
  </div>
		
		<div class="vegas_gallery_entry">
			<h2 class="vegas_gallery_title"><?php echo $image->alttext ?></h2>
			<br />
			<br />
			<span class="vegas_gallery_text"><?php echo $image->caption ?></span>
		</div>

	</div>

	<div class="bottom_border"></div>

	

</div>

 	<?php endforeach; ?>
 	
	<!-- Pagination -->
 	<?php echo $pagination ?>
 	


<?php endif; ?>
