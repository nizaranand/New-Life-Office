<?php
$page_content = '';
$page_content .= rk_get_articles($current_category_id, $languages_id,'top');
$page_content .= '<div style="clear:both;height:1px"></div>'."\n";
    if (isset($cPath) && strpos('_', $cPath)) {
// check to see if there are deeper categories within the current category
      $category_links = array_reverse($cPath_array);
      for($i=0, $n=sizeof($category_links); $i<$n; $i++) {
        $categories_query = tep_db_query("select count(*) as total from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . (int)$category_links[$i] . "' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "'");
        $categories = tep_db_fetch_array($categories_query);
        if ($categories['total'] < 1) {
          // do nothing, go through the loop
        } else {
          $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.categories_image, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . (int)$category_links[$i] . "' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "' order by sort_order, cd.categories_name");
          break; // we've found the deepest category the customer is in
        }
      }
    } else {
      $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.categories_image, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . (int)$current_category_id . "' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "' order by sort_order, cd.categories_name");
    }

    $number_of_categories = tep_db_num_rows($categories_query);
    $no_img=0;
    $add_content ='';
    while ($categories = tep_db_fetch_array($categories_query)) {
      $cPath_new = tep_get_path($categories['categories_id']);
if (tep_not_null($categories['categories_image'])) {
$add_content .= '<div class="rkImg" style="height:'.(1.7*SUBCATEGORY_IMAGE_HEIGHT).'px;">';
$add_content .= '<a href="' . tep_href_link(FILENAME_DEFAULT, $cPath_new) . '">' . tep_image(DIR_WS_IMAGES . $categories['categories_image'], $categories['categories_name'], SUBCATEGORY_IMAGE_WIDTH, SUBCATEGORY_IMAGE_HEIGHT).'</a>';
} else {
$no_img=1;
$add_content .= '<div class="rkImg">';
}
$add_content .= '<div class="desc" style="height:'.(0.2*SUBCATEGORY_IMAGE_HEIGHT).'px;"><a href="' . tep_href_link(FILENAME_DEFAULT, $cPath_new) . '">' .$categories['categories_name'];

if (!tep_not_null($categories['categories_image'])) {
$countpr = tep_count_products_in_category($categories['categories_id']);
if ((int)$countpr > 0) $add_content .= ' ('.$countpr.')';
}
$add_content .= '</a></div>'."\n";
$add_content .= '</div>'."\n";

}
if ( $no_img == 1 ) $add_content .= '<div style="clear:both;height:10px"></div>'."\n";
$page_content .= $add_content;
$page_content .= '<div style="clear:both;height:2px"></div>'."\n";
$page_article .= rk_get_articles($current_category_id, $languages_id,'mid');
if (tep_not_null($page_article)) $page_content .= '<div style="clear:both;height:10px"></div>'.$page_article."\n";
// needed for the new products module shown below
$new_products_category_id = $current_category_id;
$countprcur = tep_count_products_in_category((int)$current_category_id);
if ((int)$countprcur > 0) {
include(DIR_WS_MODULES . 'module1.php'); 
$page_content .= $module;
}
$page_content .= rk_get_articles($current_category_id, $languages_id,'bot');
?>