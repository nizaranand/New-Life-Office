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

<div id="homestation">
			
<div class="product">

  <div class="productimg">
  
  
				<?php if ( !$image->hidden ) { ?>
				<img title="<?php echo $image->alttext ?>" width="180px" alt="<?php echo $image->alttext ?>" src="<?php echo $image->imageURL ?>"/>
				<?php } ?>
			</a>
  				
			</div>
			<h2>
			
             <?php echo $image->alttext ?>
          
           
			
			</h2>		
				<div class="entry">
					   <p><?php echo $image->caption ?></p>
                       
				</div>
			
				
               


				</div>
			</div>
            
 	<?php endforeach; ?>
 	
	<!-- Pagination -->
 	<?php echo $pagination ?>
 	


<?php endif; ?>