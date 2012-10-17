<?php /* Template Name: Portfolio :: Magic style */ ?>

<?php get_header()?>

  <div class="title-wrapper"><div class="title-bg"></div><div class="title clearfix">
    <?php teardrop_title()?>
  </div></div>
  <div id="freespace-title"></div>

  <div class="content-wrapper nosidebars table clearfix"><div class="content clearfix">
  <?php teardrop_breadcrumb_nav()?>
    <div id="magic-box">
      <?php get_template_part("inc/_table_4") ?>
    </div>
  </div></div>
  <div id="freespace"></div>

<?php get_footer()?>