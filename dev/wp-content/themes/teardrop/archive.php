<?php get_header(); ?>
<div class="title-wrapper"><div class="title-bg"></div><div class="title clearfix"><div id="drag_btn" href="#"></div><div id="slide_btn" href="#"></div>
   <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
	<h1>Archive for '<?php single_cat_title(); ?>'</h1>
	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
	<h1>Posts Tagged '<?php single_tag_title(); ?>'</h1>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	<h1>Archive for <?php the_time('F jS, Y'); ?></h1>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	<h1>Archive for <?php the_time('F, Y'); ?></h1>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	<h1>Archive for <?php the_time('Y'); ?></h1>
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
	<h1>Author Archive</h1>
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h1>Blog Archives</h1>
	<?php } ?>
<?php echo tag_description(); ?>
</div>

<!-- end frame -->
</div>
<div id="freespace-title"></div>

  <div class="content-wrapper clearfix"><div class="content clearfix">
    <ul id="sidebar-right">
      <?php teardrop_get_sidebar("blog_right")?>
    </ul>

    <div class="article">
      <?php teardrop_breadcrumb_nav()?>
      <?php get_template_part("inc/_list") ?>
    </div>
  </div></div>
  <div id="freespace"></div>
  
  <?php get_footer()?>
