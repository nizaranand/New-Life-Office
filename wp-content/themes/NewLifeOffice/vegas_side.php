<div id="youtube"> 
    <span>Click the pictures below to view our Las Vegas Showroom</span>
<?php 
echo do_shortcode('[nggallery id=25 template=vegas_side]');
?>

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("VegasSide") ) : ?>



<?php endif; ?>

</div>

