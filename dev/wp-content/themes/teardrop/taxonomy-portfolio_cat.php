<?php get_header()?>
<?php $pcolumns = get_option("teardrop_theme_category_columns") ?>

  <div class="title-wrapper"><div class="title-bg"></div><div class="title clearfix">
    <?php teardrop_title()?>
  </div></div>
  <div id="freespace-title"></div>
  
  <div class="content-wrapper nosidebars table clearfix"><div class="content clearfix">
  <?php teardrop_breadcrumb_nav()?>
    <div class="magic-box" id="magic-box">
      <?php get_template_part ("inc/$pcolumns") ?>
	  
    </div>
  </div></div>
  <div id="freespace"></div>

<?php get_footer()?>