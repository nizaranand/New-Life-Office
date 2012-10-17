<?php /* Template Name: Right sidebar (no right nav) */ ?>

<?php get_header()?>
<?php the_post()?>

  <div class="title-wrapper"><div class="title-bg"></div><div class="title clearfix">
    <?php teardrop_title()?>
  </div></div>
  <div id="freespace-title"></div>

  <div class="content-wrapper clearfix"><div class="content clearfix">
  <?php teardrop_breadcrumb_nav()?>
    <div class="article" id="single">
      <?php get_template_part("inc/_single") ?>
    </div>

    <ul id="sidebar-right">
      <?php teardrop_get_sidebar("right")?>
    </ul>
  </div></div>
  <div id="freespace"></div>

<?php get_footer()?>