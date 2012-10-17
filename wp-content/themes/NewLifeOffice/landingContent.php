 <div id="rightimg">

 <?php include("headerTube.php"); ?>

    </div>

    </div>
    <div id="menu">
    <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
  </div>

    <div class="sibebarRight">
<?php 
if($vegas)
  include("vegas_side.php");
else
  include("youtube.php"); 
?>
    </div>

    <div id="landingbody">
    <div id="banner">
       <div class="imgs">



<?php 
//if($vegas){
//  echo do_shortcode('[monoslideshow id=6 w=640 h=480]');
//} else if($boise){
//  echo do_shortcode('[monoslideshow id=16 w=640 h=480]');
//} else {
//  echo do_shortcode('[monoslideshow id=1 w=640 h=480]');
//}
//?>
       </div>
       </div>

      <div class="entry">
         <hr />
    <?php if (have_posts()) : ?>

      <?php while (have_posts()) : the_post(); ?>

          <?php the_content();?>
<?php 
if($vegas){
  echo do_shortcode('[monoslideshow id=6 w=640 h=480]');
} else if($boise){
  echo do_shortcode('[monoslideshow id=16 w=640 h=480]');
} else {
  echo do_shortcode('[monoslideshow id=1 w=640 h=480]');
}
?>
    <?php endwhile; ?>

  <?php endif; ?>
    </div> 
