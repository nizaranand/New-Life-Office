<?php /* Template Name: Blog :: Right sidebar */ ?>

<?php get_header()?>
<!-- srart title -->
  <div class="title-wrapper"><div class="title-bg"></div><div class="title clearfix">
    <?php teardrop_title()?>
  </div></div>
 <!-- end title -->
  <div id="freespace-title"></div>
  
  <div class="content-wrapper clearfix"><div class="content clearfix">
  <?php teardrop_breadcrumb_nav()?>
    <div class="article">
      <?php get_template_part("inc/_list") ?>
    </div>

    <ul id="sidebar-right">
      <?php teardrop_get_sidebar("blog_right")?>
    </ul>
  </div></div>
  <div id="freespace"></div>

<?php get_footer()?>