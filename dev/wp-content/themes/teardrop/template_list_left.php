<?php /* Template Name: Blog :: Left sidebar */ ?>

<?php get_header()?>

  <div class="title-wrapper"><div class="title-bg"></div><div class="title clearfix">
    <?php teardrop_title()?>
  </div></div>
  <div id="freespace-title"></div>

  <div class="content-wrapper clearfix"><div class="content clearfix">
  <?php teardrop_breadcrumb_nav()?>
    <ul id="sidebar-left">
      <?php teardrop_get_sidebar("blog_left")?>
    </ul>

    <div class="article">
      <?php get_template_part("inc/_list") ?>
    </div>
  </div></div>
  <div id="freespace"></div>

<?php get_footer()?>