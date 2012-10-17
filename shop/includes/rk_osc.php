<?php
/*  
	This file is part of WP.osC package.
	WP.osC is a modification of original (c) osCommerce.
	Date the modification was created : <November 2008>
	Modifications Copyright (C) : <November 2008> by <Roya Khosravi>

	WP.osC is free software: you can redistribute it and/or modify 
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	WP.osC is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	You should have received a copy of the GNU General Public License
	along with WP.osC.  If not, see <http://www.gnu.org/licenses/>.

	http://www.wposc.com
	Contact:  roya(at)wposc.com
*/
?>
<?php
/**
 *
 * @since 1.0 RC2
 *
 */

function rk_tag_cloud ($args = '' ) {
	$defaults = array(
		'smallest' => 8, 'largest' => 22,'unit' => 'pt', 'number' => 45, 
		'orderby' => 'name', 'order' => 'ASC','mode' => 'mono', 'color' => '', 'echo' => 1);
	$params = rk_osc_parse_args( $args, $defaults );
	extract( $params );
	$return ='';
	global $languages_id;
	$tagArray = array();
	$countArray = array();
	$s1 = 'TGC_'.$languages_id; /// Tag to Counter
	$s2 = 'TGN_'.$languages_id; /// Tag to Nice name
	if ($mode == 'fade') {
	if ($color == '') $color = '999999';
	$fcolor='000000'; /// fade from $color to black
	$dC = array();
	$dC[0] = hexdec(substr($fcolor, 0, 2));
	$dC[1] = hexdec(substr($fcolor, 2, 2));
	$dC[2] = hexdec(substr($fcolor, 4, 2));
	$dC[3] = hexdec(substr($color, 0, 2));
	$dC[4] = hexdec(substr($color, 2, 2));
	$dC[5] = hexdec(substr($color, 4, 2));
	}
	$add = "";
	if ($order == 'RAND') { 
		$add = " order by RAND()";
	} else { 
		if (($order != 'ASC') && ($order != 'DESC')) $order = 'ASC'; 
		if ($orderby == 'name') { 
		$add = " order by d.wposc_value ".$order;
		} else { 
		$add = " order by b.wposc_value ".$order;
		}
	}
	if ($number != 0) $add .= " limit ".$number;
    	$tag_query = tep_db_query("select b.wposc_name, b.wposc_value, d.wposc_value as name from " . 'wposc_configuration' . " a, " . 'wposc_configuration' . " b, " . 'wposc_configuration' . " c, " . 'wposc_configuration' . " d where a.wposc_name = '" . $s1 . "' and b.wposc_id = a.wposc_value and c.wposc_name= '" . $s2 . "' and c.wposc_value = d.wposc_id and d.wposc_name = b.wposc_name".$add);
	if (tep_db_num_rows($tag_query)) {
	while ($tag = tep_db_fetch_array($tag_query)) {
	$tagArray[] = $tag['name'] . ','.tep_href_link(FILENAME_TAGS, 'tag_id='.$tag['wposc_name'], 'NONSSL', false).','.(int)$tag['wposc_value'];
	$countArray[] = (int)$tag['wposc_value'];
	}
	$min_count = min($countArray);
	$max_count = max($countArray);
	$diff = $max_count - $min_count;
	if ( $diff <= 0 ) $diff = 1;
	$difff = $largest - $smallest;
	if ( $difff <= 0 ) $difff = 1;
	$diffs = $difff / $diff;
	$count=count($tagArray);
	for ($i=0;$i<$count;$i++){
	$tmpArray=explode(',',$tagArray[$i]);
	if(!is_array($tmpArray) && count($tmpArray)<2) { return; }
	list($tagName, $tagLink) = $tmpArray;	
	$size = ( $smallest + ( ( $countArray[$i] - $min_count ) * $diffs ) );
	if ($mode == 'multi') { 
	$color = '#'.substr('00000' . dechex(mt_rand(0, 0xffffff)), -6);
	} else if ($mode == 'fade') {
	$color = array();
        $color[] = dechex(($dC[0] - $dC[3]) / $count * $i + $dC[3]);
        $color[] = dechex(($dC[1] - $dC[4]) / $count * $i + $dC[4]); 
        $color[] = dechex(($dC[2] - $dC[5]) / $count * $i + $dC[5]); 
        foreach ($color as $key => $value) {if (strlen($value) < 2) {$color[$key] = str_repeat($value, 2);}}
        $color = implode($color, ''); 
	}
	$return .= generateTC($tagName,$tagLink,$size, $unit,$mode,$color);
	}
	}
	if ( $echo ) { 
		echo $return;
	} else {
		return $return;
	}

}
/**
 *
 * @since 1.0 RC2
 *
 */
function generateTC($tagName, $tagLink, $size, $unit='pt',$mode='mono', $color='',$sep=' ') {
	$return="";
	$tagName=trim(strip_tags($tagName));
	$tagLink=trim(strip_tags($tagLink));
	$size=$size.$unit;
	if($tagName=="" && $tagLink=="") return;
	if (($mode == 'mono') && ($color == '')) {
	$return='<a href="'.$tagLink.'" style="font-size:'.$size.';">'.$tagName.'</a>'.$sep;
	} else {
	if (strpos($color, '#') === FALSE ) $color = '#'.$color;
	$return = '<span><a href="'.$tagLink.'" style="color:'.$color.';font-size:'.$size.';">'.$tagName.'</a></span>'.$sep;
	}
	return $return;
}
/**
 *
 * @since 1.0 RC2
 * use WP Cumulus Flash tag cloud by Roy Tanck - http://www.roytanck.com 
 * use SWFObject embed by Geoff Stearns geoff@deconcept.com http://blog.deconcept.com/swfobject/
 * adapted to WP.osC by Roya March 2009
 */
function rk_flash_tag_cloud ($args = '' ) {
	$defaults = array(
		'number' => 45, 'bgcolor' => '333333', 'trans' => 'true', 'tcolor' => '666699', 'tcolor2' => '333333', 
		'hicolor' => '666666', 'speed' => 100, 'width' => 160, 'height' => 120, 'echo' => 1);
	$params = rk_osc_parse_args( $args, $defaults );
	extract( $params );
	$smallest=8;
	$largest=22;
	$unit = pt;
	$orderby='name';
	$order = 'ASC';
	$return ='';
	$baseurl = rk_osc_get_storeinfo('url');
	$url = $baseurl.'includes/animation/cumulus/';
	$tag_cloud = rk_tag_cloud ('smallest='.$smallest.'&largest='.$largest.'&unit='.$unit.'&number='.$number.'&orderby='.$orderby.'&order='.$order.'&mode=mono&echo=0');
	$return .= '<p><!-- SWFObject embed by Geoff Stearns geoff@deconcept.com http://blog.deconcept.com/swfobject/ --><script type="text/javascript" src="'.$url.'swfobject.js"></script>';
	$return .= '<div id="wpcumuluscontent"><p style="display:none">'.$tag_cloud.'</p><p>WP Cumulus Flash tag cloud by <a href="http://www.roytanck.com">Roy Tanck</a> requires Flash Player 9 or better.</p></div>';
	$return .= '<script type="text/javascript" defer="defer" >var rnumber = Math.floor(Math.random()*9999999);var so = new SWFObject("'.$baseurl.'tagcloud.swf?r="+rnumber, "tagcloudflash", "'. $width .'", "'.$height.'", "9", "#'.$bgcolor.'");';
	if( $trans == 'true' ) $return .= 'so.addParam("wmode", "transparent");';
	$return .= 'so.addParam("allowScriptAccess","always");';
	$return .= 'so.addVariable("tcolor","0x'.$tcolor.'");';
	if ( $tcolor2 != "" ) $return .= 'so.addVariable("tcolor2","0x'.$tcolor2.'");';
	if ( $hicolor != "" ) $return .= 'so.addVariable("hicolor","0x'.$hicolor.'");';
	$return .= 'so.addVariable("tspeed", "'.$speed.'");';
	$return .= 'so.addVariable("distr", "");';
	$return .= 'so.addVariable("mode", "tags");so.addVariable("tagcloud", "'.urlencode('<tags>').urlencode( str_replace( "&nbsp;"," ", $tag_cloud )) . urlencode('</tags>').'");so.write("wpcumuluscontent");</script> </p>';
	if ( $echo ) {
		echo $return;
	} else {
		return $return;
	}
}
/**
 *
 * @since 1.0 RC2
 * use NextGenGalley by Alex Rabe - http://alexrabe.boelinger.com 
 * use JW Image Rotator from Jeroen Wijering - http://www.jeroenwijering.com
 * use SWFObject embed by Geoff Stearns geoff@deconcept.com http://blog.deconcept.com/swfobject/
 * Adapted to WP.osC by Roya March 2009
 */
function rk_slideshow ($args = '' ) {
	global $current_category_id;
	$defaults = array(
		'number' => 45, 'bgcolor' => 'FFFFFF', 'shownavigation' => 'true', 
		'backcolor' => '000000','frontcolor' => 'FFFFFF', 'lightcolor' => 'CC0000', 
		'screencolor' => 'FFFFFF', 'rotatetime' => 5, 'width' => 160, 'height' => 120);
	$params = rk_osc_parse_args( $args, $defaults );
	extract( $params );
	$return ='';
	$baseurl = rk_osc_get_storeinfo('url');
	$return .='<br />'."\n";
	$return .='<div class="ngg-widget-slideshow" id="slsh_1" style="width:'.$width.'px; height:'.$height.'px;">'."\n";
	$return .='<a href="http://www.macromedia.com/go/getflashplayer">Get the Flash Player</a> to see the slideshow.'."\n";
	$return .='</div>'."\n";
	$return .='<script type="text/javascript" defer="defer">'."\n";
	$return .='<!--'."\n";
	$return .='//<![CDATA['."\n";
	$return .='var slsh_1 = {'."\n";
	$return .='	params : {'."\n";
	$return .='		wmode : "opaque",'."\n";
	$return .='		bgcolor : "#'.$bgcolor.'"},'."\n";
	$return .='	flashvars : {'."\n";
	$return .='		file : "'.$baseurl.'imagerotator.php?number='.$number.'",'."\n";
	$return .='		shownavigation : "'.$shownavigation.'",'."\n";
	$return .='		shuffle : "false",'."\n";
	$return .='		overstretch : "true",'."\n";
	$return .='		rotatetime : "'.$rotatetime.'",'."\n";
	$return .='		backcolor : "0x'.$backcolor.'",'."\n";
	$return .='		frontcolor : "0x'.$frontcolor.'",'."\n";
	$return .='		lightcolor : "0x'.$lightcolor.'",'."\n";
	$return .='		screencolor : "0x'.$screencolor.'",'."\n";
	$return .='		width : "'.$width.'",'."\n";
	$return .='		height : "'.$height.'"},'."\n";
	$return .='	attr : {'."\n";
	$return .='		styleclass : "slideshow-widget"},'."\n";
	$return .='	start : function() {'."\n";
	$return .='		swfobject.embedSWF("'.$baseurl.'imagerotator.swf", "slsh_1", "'.$width.'", "'.$height.'", "7.0.0", false, this.flashvars, this.params , this.attr );'."\n";
	$return .='	}'."\n";
	$return .='}'."\n";
	$return .='slsh_1.start();'."\n";
	$return .='//]]>'."\n";
	$return .='-->'."\n";
	$return .='</script>'."\n";
	echo $return;
}
/**
 *
 * @since 1.0 RC2
 *
 */
function rk_has_tag($product_id,$language_id) {
	$search_name = 'PTG_'.$language_id; /// Product to Tag
    	$tag_query = tep_db_query("select a.wposc_id, a.wposc_value, b.wposc_name from " . 'wposc_configuration' . " a, " . 'wposc_configuration' . " b where a.wposc_name = '" . $search_name . "' and b.wposc_id = a.wposc_value and b.wposc_value = '" . (int)$product_id . "'");
	if (tep_db_num_rows($tag_query)) return true;
	return false;
}
/**
 *
 * @since 1.0 RC2
 *
 */
function rk_the_tags($product_id,$language_id,$before='', $separateur=',',$after='', $echo=true, $param='link') {
	$return = $before.implode($separateur, rk_get_products_tag($product_id, $language_id, $param)).$after;
	if ( !$echo ) return $return;
	echo $return;
}
/**
 *
 * @since 1.0 RC2
 *
 */
function rk_is_tag() {
	global $where;
	if ($where == 50) return true;
	return false;
}
/**
 *
 * @since 1.0 RC2
 *
 */
function rk_the_tag($echo = true) {
	global $where; 
	global $languages_id;
	$HTTP_GET_VARS = &$_GET;
	$tag_id = (int)$HTTP_GET_VARS['tag_id'];
	if (tep_not_null($tag_id)) {
	$return = wposc_get_the_tag_name ($tag_id,$languages_id,'nice',$echo);
	} else { $return = HEADING_TITLE; }
	if ( !$echo ) return $return;
	echo $return;
}
/**
 * return an array of products_id from tag id.
 *
 * @since 1.0 RC2
 *
 * @param int $tag_id.
 * @param int $language_id.
 * @return array.
 */
function rk_get_tag_products($tag_id, $language_id) {
	$return = array();
	$search_name = 'PTG_'.$language_id; /// Product to TaG
    	$tag_query = tep_db_query("select b.wposc_value from " . 'wposc_configuration' . " a, " . 'wposc_configuration' . " b where a.wposc_name = '" . $search_name . "' and b.wposc_id = a.wposc_value and b.wposc_name = '" . (int)$tag_id . "'");
	while ($tag = tep_db_fetch_array($tag_query)) {
	$return[] = (int)$tag['wposc_value'];
	}
    return $return;
}
/**
 * return an array of tag from product id.
 *
 * @since 1.0 RC2
 *
 * @param int $product_id.
 * @param int $language_id.
 * @param string $param : 
 * nice : return nice name
 * reel: return reel name
 * id : return tag id
 * link : return links+ nice name
 * @return array.
 */
function rk_get_products_tag($product_id, $language_id, $param = 'nice') {
	$return = array();
	$search_name = 'PTG_'.$language_id; /// Product to TaG
    	$tag_query = tep_db_query("select a.wposc_id, a.wposc_value, b.wposc_name from " . 'wposc_configuration' . " a, " . 'wposc_configuration' . " b where a.wposc_name = '" . $search_name . "' and b.wposc_id = a.wposc_value and b.wposc_value = '" . (int)$product_id . "'");
	while ($tag = tep_db_fetch_array($tag_query)) {
	if ($param == 'nice') {
	$return[] = wposc_get_the_tag_name ($tag['wposc_name'],$language_id,'nice',false);
	} else if ($param == 'reel') {
	$return[] = wposc_get_the_tag_name ($tag['wposc_name'],$language_id,'reel',false);
	} else if ($param == 'id') {
	$return[] = $tag['wposc_name'];
	} else if ($param == 'link') {
	$return[] = '<a href="' . tep_href_link(FILENAME_TAGS, 'tag_id='.$tag['wposc_name'], 'NONSSL', false) . '">'.wposc_get_the_tag_name ($tag['wposc_name'],$language_id,'nice',false).'</a>';
	} 
	}
    return $return;
  }
/**
 *
 * @since 1.0 RC2
 *
 */
function wposc_get_the_tag_name ($tag_id,$language_id,$param='nice',$echo=false) {
	$return ='';
	if ($param == 'nice') {
	$search_name='TGN_'.$language_id;
    	$tag_query = tep_db_query("select b.wposc_value from " . 'wposc_configuration' . " a, " . 'wposc_configuration' . " b where a.wposc_name = '" . $search_name . "' and b.wposc_id = a.wposc_value and b.wposc_name = '" . (int)$tag_id . "'");
	$tag = tep_db_fetch_array($tag_query);
	} else if ($param == 'reel') { 
	$search_name='TGD_'.$language_id;
    	$tag_query = tep_db_query("select wposc_value from " . 'wposc_configuration' . " where wposc_id = '" . (int)$tag_id . "' and wposc_name = '" . $search_name . "'");
	$tag = tep_db_fetch_array($tag_query);
	}
	$return = $tag['wposc_value'];
	if ( !$echo ) return $return;
	echo $return;
}
/**
 *
 * @since 1.0 RC2
 *
 */
function rk_get_image_gallery($product_id) {
/// trouve l'image gallery d'un product id 
	$image_gallery ='';
   	$img_query = tep_db_query("select wposc_value from " . 'wposc_configuration' . " where wposc_name = '" . 'PIG' . "'");
	while ($img = tep_db_fetch_array($img_query)) {
    	$img2_query = tep_db_query("select wposc_id, wposc_name, wposc_value from " . 'wposc_configuration' . " where wposc_id = '" . (int)$img['wposc_value'] . "' and wposc_name = '" . (int)$product_id . "'");
	if (tep_db_num_rows($img2_query)) {
	$img2 = tep_db_fetch_array($img2_query);
	$image_gallery = $img2['wposc_value'];
	}
	}
   return $image_gallery;
  }

/**
 * display banners.
 * @since 1.0 RC2
 * group : banner group name or banner id
 * echo : 1 (echo banner) or 0 (return)
 */
function rk_show_banner ($args = '' ) {
	$defaults = array('identifier' => '468x50', 'echo' => 1);
	$params = rk_osc_parse_args( $args, $defaults );
	extract( $params );
	$return ='';
	if (is_numeric($identifier)) {
		$mode = 'static';
	} else {
		$mode = 'dynamic';
	}
	$return .= tep_display_banner($mode, $identifier); 
	if ( $echo ) { 
		echo $return;
	} else {
		return $return;
	}
}
/* Applies filters located in "filters" directory to the page's content*/
function rk_filter($content) {
	global $language;
	$file_extension = '.php';
	$files = array();
	if ($dir = @dir(DIR_FS_CATALOG . DIR_WS_INCLUDES. 'filters')) {
	while ($file = $dir->read()) {
        if (substr($file, strrpos($file, '.')) == $file_extension) {
          $files[] = $file;
        } 
	}
	sort($files);
	$dir->close();
	} 
	for ($i=0, $n=sizeof($files); $i<$n; $i++) {
	if (file_exists(DIR_WS_LANGUAGES . $language . '/filters/' . $files[$i])) {
	include(DIR_WS_LANGUAGES . $language . '/filters/' . $files[$i]);
	}
	if (file_exists(DIR_WS_INCLUDES . 'filters/' . $files[$i])) {
	include(DIR_WS_INCLUDES . 'filters/' . $files[$i]);
	}
	}
return $content;
}
function sitemap($parent=0) {
global $languages_id;
	$return ='';
	$cat_query = tep_db_query("select c.categories_id, cd.categories_name, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . $parent . "' and c.categories_id = cd.categories_id and cd.language_id='" . (int)$languages_id ."' order by cd.categories_name");
	while ($cat = tep_db_fetch_array($cat_query))  {
	$cPath_new = tep_get_path($cat['categories_id']);
	$return .=  '<li class="sitemap_category"><a href="' . tep_href_link(FILENAME_DEFAULT, $cPath_new) . '">' .$cat['categories_name'].'</a></li>';

	if (tep_count_products_in_category($cat['categories_id']) > 0 ) {
	$return .=  '<ul class="sitemap">';
	$prod_query = tep_db_query("select p.products_id, pd.products_name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$cat['categories_id'] . "'");
	while ($prod = tep_db_fetch_array($prod_query))  {
	$return .=  '<li class="sitemap_product"><a href="'.tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $prod['products_id']) .'">'. $prod['products_name'] . '</a></li>';
	}
	$return .=  '</ul>';
	}

	if (has_category_articles ($cat['categories_id'],'all')) {
	$return .=  '<ul class="sitemap">';
	$article_query = tep_db_query("select a.articles_id, ad.articles_name from " . 'wposc_articles' . " a, " . 'wposc_articles_description' . " ad, " . 'wposc_articles_to_categories' . " a2c where a.articles_status = '1' and a.articles_id = a2c.articles_id and ad.articles_id = a2c.articles_id and ad.language_id = '" . (int)$languages_id . "' and a2c.categories_id = '" . (int)$cat['categories_id'] . "'");
	while ($article = tep_db_fetch_array($article_query))  {
	$return .=  '<li class="sitemap_article"><a href="'.tep_href_link('articles_info.php', 'articles_id=' . $article['articles_id']) .'">'. $article['articles_name'] . '</a></li>';
	}
	$return .=  '</ul>';
	}
	$new_cat = $cat['categories_id'];
	if (tep_has_category_subcategories($new_cat)) {	$return .=  '<ul class="sitemap">'.sitemap($new_cat).'</ul>';}
	}
	return $return;
}
function rk_display_article($id, $name, $description, $pos, $sum, $type, $image, $date) {
global $cPath;
	if (tep_not_null($name) && (int)$type != 2) {
	$return .= '<a href="' . tep_href_link('articles_info.php', 'cPath=' . $cPath . '&amp;articles_id=' . $id) . '"><u><b>' . $name . '</b></u></a><br />' ."\n";
	$page_content .= '<small>'. sprintf(TEXT_REVIEW_DATE_ADDED, tep_date_long($date)).'</small>'."\n"; 
	}
	if (tep_not_null($image)) {
	if ($image_size = @getimagesize(DIR_WS_IMAGES . $image)) {
          $width = $image_size[0];
          $height = $image_size[1];
	/// je veux que width soit fixe partout, disons 100 pixel
	  $facteur = (int)(100/$width);
	  $height = $facteur* $height;
	  $width = 100;
	} 
	$return .= '<div class="rkImg">'."\n";
	$return .= '<a href="' . tep_href_link('articles_info.php', 'cPath=' . $cPath . '&amp;articles_id=' . $id) . '">' . tep_image(DIR_WS_IMAGES . $image, $name, $width, $height) . '</a>'."\n";
	$return .= '</div>'."\n";
	} 
	if (tep_not_null($description)) $return .= rk_get_sum($description, $sum, $name,$image,$id)."\n";
return $return;
}
function rk_get_sum($str='', $limit=0, $title='',$image='',$id=0) {
global $cPath;
if ($limit <= 0) {
	if (!tep_not_null($title)) {
	if (tep_not_null($image)) {
	$return = '<div class="rkDescRight">'. $str.'</div><div style="clear:both;height:1px"></div>'."\n";
	} else {
	$return = $str.'<div style="clear:both;height:10px"></div>'."\n";
	}
	} else {
	if (tep_not_null($image)) {
	$return = '<div style="clear:both;height:1px">';
	} else {
	$return = '';
	}
	}
} else {
	if (strlen($str) <= $limit ) {
	if (tep_not_null($image)) {
	$return = '<div class="rkDescRight">'. $str.'</div><div style="clear:both;height:1px"></div>'."\n";
	} else {
	$return = $str.'<div style="clear:both;height:10px"></div>'."\n";
	}
	} else { 
	if (tep_not_null($image)) {
	$return = '<div class="rkDescRight">'. short_name($str, $limit) . ' <a href="' . tep_href_link('articles_info.php', 'cPath=' . $cPath . '&amp;articles_id=' . $id) . '">&raquo;</a></div><div style="clear:both;height:1px"></div>'."\n";
	} else {
	$return = short_name($str, $limit) . ' <a href="' . tep_href_link('articles_info.php', 'cPath=' . $cPath . '&amp;articles_id=' . $id) . '">&raquo;</a><div style="clear:both;height:10px"></div>'."\n";
	}
	}
}
return $return;
}

function rk_get_articles($category_id=0, $languages_id, $pos ='', $title='no') {
$return ='';
	if ($pos == 'top') { $pos_id=1; } elseif ($pos=='mid') { $pos_id=2; } else { $pos_id=3; } 
	if ( ($pos == 'top') && has_category_articles ($category_id, 'descriptor') ) {
	$add = "and a.articles_type = '2' and a.articles_status = '1' ";
	$orderby = "";
  	$desc_query = tep_db_query("select a.articles_id, a.articles_image, a.articles_date_added, a.articles_status, a.articles_sum, a.articles_type, a.articles_pos, ad.articles_name, ad.articles_description from " . 'wposc_articles' . " a, " . 'wposc_articles_to_categories' . " a2c,  " . 'wposc_articles_description' . " ad  where a.articles_id = ad.articles_id and a.articles_id = a2c.articles_id " . $add . "and a2c.categories_id = '" . (int)$category_id . "' and ad.language_id = '" . (int)$languages_id . "'".$orderby);
	$desc = tep_db_fetch_array($desc_query);
	if ($title=='yes') return $desc['articles_name'];
	$return .= rk_display_article($desc['articles_id'], $desc['articles_name'], $desc['articles_description'], $desc['articles_pos'],  $desc['articles_sum'],$desc['articles_type'], $desc['articles_image'], $desc['articles_date_added']);

}
if (has_category_articles ($category_id, $pos)) {
	$add = "and a.articles_type = '1' and a.articles_pos = '".$pos_id."' and a.articles_status = '1' ";
	$orderby = " order by a.articles_date_added DESC, ad.articles_name";
  	$desc_query = tep_db_query("select a.articles_id, a.articles_image, a.articles_date_added, a.articles_status, a.articles_sum, a.articles_type, a.articles_pos, ad.articles_name, ad.articles_description from " . 'wposc_articles' . " a, " . 'wposc_articles_to_categories' . " a2c,  " . 'wposc_articles_description' . " ad  where a.articles_id = ad.articles_id and a.articles_id = a2c.articles_id " . $add . "and a2c.categories_id = '" . (int)$category_id . "' and ad.language_id = '" . (int)$languages_id . "'".$orderby);
	while ($desc = tep_db_fetch_array($desc_query)) {
	$return .= rk_display_article($desc['articles_id'], $desc['articles_name'], $desc['articles_description'], $desc['articles_pos'], $desc['articles_sum'], $desc['articles_type'], $desc['articles_image'], $desc['articles_date_added']);
	}
}
return $return;
}
function has_category_articles ($category_id, $arg='')  {
	$add = '';
	switch($arg) {
	case "simple":
		$add = "and a.articles_type = '1' and a.articles_status = '1' ";
	break;
	case "descriptor":
		$add = "and a.articles_type = '2' and a.articles_status = '1' ";
	break;
	case "all":
		$add = "and a.articles_status = '1' ";
	break;
	case "top":
		$add = "and a.articles_type = '1' and a.articles_pos = '1' and a.articles_status = '1' ";
	break;
	case "mid":
		$add = "and a.articles_type = '1' and a.articles_pos = '2' and a.articles_status = '1' ";
	break;
	case "bot":
		$add = "and a.articles_type = '1' and a.articles_pos = '3' and a.articles_status = '1' ";
	break;
	}
	$desc_query = tep_db_query("select count(*) as total from " . 'wposc_articles' . " a, " . 'wposc_articles_to_categories' . " a2c where a.articles_id = a2c.articles_id " . $add . "and a2c.categories_id = '" . (int)$category_id . "'");
	$desc = tep_db_fetch_array($desc_query);
	if ($desc['total'] > 0) return true;
	return false;
}
function category_descriptor_title($category_id,$languages_id) {
return rk_get_articles($category_id,$languages_id, 'top', 'yes');
}

function short_name($str, $limit)
 {
	$str = (strlen($str) > $limit && $limit > 3) ? substr($str, 0, $limit - 3) . '...' : $str;
	$str = trim($str);
	$str = str_replace(array('<br>','<br><br>','<br />','<br /><br />','<p>','</p>', '\t', '\r'), ' ', $str);
	return $str;
 }
function cssclass($str) {
	return strtolower($str);
}
function rk_osc_the_store($arg=''){
	echo STORE_NAME;
}
function rk_osc_the_owner($arg=''){
	echo STORE_OWNER;
}
function rk_osc_the_store_email($arg=''){
	switch($arg) {
	case "mailto":
		echo STORE_OWNER_EMAIL_ADDRESS;
	break;
	case "form":
	default:
		echo tep_href_link(FILENAME_CONTACT_US);
	}
}
//// conditionals
function rk_get_position ($arg='') {
global $where;
	switch ($arg) {
	case 'is_home':
	if ($where == 10) return true;
	break;
	case 'is_products':
	if ($where == 12) return true;
	break;
	case 'is_category':
	if ($where == 11) return true;
	break;
	case 'is_product':
	if ($where == 14) return true;
	break;
	case 'is_create_account':
	if ($where == 33) return true;
	break;
	case 'is_create_account_success':
	if ($where == 34) return true;
	break;
	case 'is_account':
	if ($where == 24) return true;
	break;
	case 'is_login':
	if ($where == 35) return true;
	break;
	case 'is_logout':
	if ($where == 36) return true;
	break;
	case 'is_new_products':
	if ($where == 5) return true;
	break;
	case 'is_reviews':
	if ($where == 6) return true;
	break;
	case 'is_specials':
	if ($where == 7) return true;
	break;
	case 'is_bestsellers':
	if ($where == 8) return true;
	break;
	case 'is_search':
	if ($where == 9) return true;
	break;
	case 'is_search_result':
	if ($where == 13) return true;
	break;
	case 'is_shipping':
	if ($where == 1) return true;
	break;
	case 'is_privacy':
	if ($where == 3) return true;
	break;
	case 'is_conditions':
	if ($where == 2) return true;
	break;
	case 'is_contact':
	if ($where == 4) return true;
	break;
	case 'is_shopping_cart':
	if ($where == 16) return true;
	break;
	case 'is_tell_a_friend':
	if ($where == 40) return true;
	break;
	case 'is_product_reviews_write':
	if ($where == 38) return true;
	break;
	case 'is_product_reviews_info':
	if ($where == 39) return true;
	break;
	case 'is_product_reviews':
	if ($where == 15) return true;
	break;
	case 'is_password_forgotten':
	if ($where == 37) return true;
	break;
}
return false;
}
/// Search Tags
function rk_osc_the_search_query($arg='') {
		echo "";
} 
function rk_osc_the_search_action($arg='') {
		echo tep_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', 'NONSSL', false);
}
function rk_osc_the_search_key($arg='') {
		echo tep_hide_session_id();
} 

///Page Tags
//// user Pages
function rk_osc_list_user_pages ($args = '') {
	$defaults = array(
		'title_li' => _c(STORE_NAME), 
		'echo' => 1,
		'before' => '<li class="pagenav">',
		'after'  => '</li>',
		'link_before' => '<li class="page_item">',
		'link_after'  => '</li>',
		'exclude' => '',
		'show_bloghome'  => 0,
		'show_storehome'  => 0);
	$params = rk_osc_parse_args( $args, $defaults );
	extract( $params );
	$return ='';
	$rk = array();
	if (tep_not_null($exclude)) {
	$exclude = preg_replace('[^0-9,]', '', $exclude);
	$rk = explode(",", $exclude);
	}
	if ( $title_li ) $return .= $before . $title_li . '<ul>';
	if ($show_bloghome == 1) 	
	$return .=  $link_before . '<a href="'.rk_osc_bloginfo('home',0).'/">'. rk_osc_bloginfo('name',0) . '</a>'. $link_after;
	if ($show_storehome == 1) 	
	$return .=  $link_before . '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . HEADER_TITLE_TOP .'</a>'. $link_after;
	$return .=  rk_get_boxes('pages', $link_before, $link_after, $rk,0);
	if ( $title_li ) $return .= '</ul>'.$after;

	if ( $echo ) {
		echo $return;
	} else {
		return $return;
	}
}

function rk_osc_user_pages_menu($args='') {
	return '';
}
function rk_osc_dropdown_user_pages($args='') {
	$defaults = array( 
	'text' =>  _c(STORE_NAME), 
	'class' => 'postform',
	'select_class' => '',
	'exclude' => '',
	'show_bloghome'  => 0,
	'show_storehome'  => 0,
	'echo' => 1
	);
	$params = rk_osc_parse_args( $args, $defaults );
	extract( $params );
	$rk = array();
	if (tep_not_null($exclude)) {
	$exclude = preg_replace('[^0-9,]', '', $exclude);
	$rk = explode(",", $exclude);
	}
	$return ='';
	if (tep_not_null($class)) $class = str_replace ('%class', $class, 'class="%class" ');
	if (tep_not_null($select_class)) $select_class = str_replace ('%class', $select_class, 'class="%class" ');
	$return .= '<form '.$class.'name="rku">'. '<select '.$select_class.'name="rkus" ';
	$return .= 'onChange="location=document.rku.rkus.options[document.rku.rkus.selectedIndex].value;">';
	$return .= '<option value="">'.$text.'</option>';

	if ($show_bloghome == 1) 	
	$return .=  '<option value="' .rk_osc_bloginfo('home',0).'">'. rk_osc_bloginfo('name',0) . '</option>';
	if ($show_storehome == 1) 	
	$return .= '<option value="' . tep_href_link(FILENAME_DEFAULT, '', 'NONSSL', false) . '">' . HEADER_TITLE_TOP .'</option>';

	$return .=  rk_get_boxes('ddpages', '<option value="', '</option>', $rk,1);
	$return .= '</select>';
	$return .= '</form>';
	if ( $echo ) {
		echo $return;
	} else {
		return $return;
	}

} 
function rk_osc_list_info_pages($args='') {
	$defaults = array(
		'title_li' => _c(BOX_HEADING_INFORMATION), 
		'echo' => 1,
		'before' => '<li class="pagenav">',
		'after'  => '</li>',
		'link_before' => '<li class="page_item">',
		'link_after'  => '</li>',
		'exclude' => '',
		'show_bloghome'  => 0,
		'show_storehome'  => 0);

	$params = rk_osc_parse_args( $args, $defaults );
	extract( $params );
	$return ='';
	$rk = array();
	if (tep_not_null($exclude)) {
	$exclude = preg_replace('[^0-9,]', '', $exclude);
	$rk = explode(",", $exclude);
	}
	if ( $title_li ) $return .= $before . $title_li . '<ul>';

	if ($show_bloghome == 1) 	
	$return .=  $link_before . '<a href="'.rk_osc_bloginfo('home',0).'/">'. rk_osc_bloginfo('name',0) . '</a>'. $link_after;
	if ($show_storehome == 1) 	
	$return .=  $link_before . '<a href="' . tep_href_link(FILENAME_DEFAULT, '', 'NONSSL', false) . '">' . HEADER_TITLE_TOP .'</a>'. $link_after;
	$return .=  rk_get_boxes('infos', $link_before, $link_after, $rk,0);
	if ( $title_li ) $return .= '</ul>'.$after;

	if ( $echo ) {
		echo $return;
	} else {
		return $return;
	}
}
function rk_osc_info_pages_menu($args='') {
} 
function rk_osc_dropdown_info_pages($args='') {
	$defaults = array( 
	'text' =>  _c(BOX_HEADING_INFORMATION), 
	'class' => 'postform',
	'select_class' => '',
	'exclude' => '',
	'show_bloghome'  => 0,
	'show_storehome'  => 0,
	'echo' => 1
	);
	$params = rk_osc_parse_args( $args, $defaults );
	extract( $params );
	$rk = array();
	if (tep_not_null($exclude)) {
	$exclude = preg_replace('[^0-9,]', '', $exclude);
	$rk = explode(",", $exclude);
	}
	$return ='';
	if (tep_not_null($class)) $class = str_replace ('%class', $class, 'class="%class" ');
	if (tep_not_null($select_class)) $select_class = str_replace ('%class', $select_class, 'class="%class" ');
	$return .= '<form '.$class.'name="rkip">'. '<select '.$select_class.'name="rkis" ';
$return .= 'onChange="location=document.rkip.rkis.options[document.rkip.rkis.selectedIndex].value;">';
	$return .= '<option value="">'.$text.'</option>';

	if ($show_bloghome == 1) 	
	$return .=  '<option value="' .rk_osc_bloginfo('home',0).'">'. rk_osc_bloginfo('name',0) . '</option>';
	if ($show_storehome == 1) 	
	$return .= '<option value="' . tep_href_link(FILENAME_DEFAULT, '', 'NONSSL', false) . '">' . HEADER_TITLE_TOP .'</option>';

	$return .=  rk_get_boxes('infos', '<option value="', '</option>', $rk,1);
	$return .= '</select>';
	$return .= '</form>';
	if ( $echo ) {
		echo $return;
	} else {
		return $return;
	}

} 
function rk_osc_list_catalog_pages($args='') {
	$defaults = array(
		'title_li' => _c(HEADER_TITLE_CATALOG), 
		'echo' => 1,
		'before' => '<li class="pagenav">',
		'after'  => '</li>',
		'link_before' => '<li class="page_item">',
		'link_after'  => '</li>',
		'exclude' => '',
		'show_bloghome'  => 0,
		'show_storehome'  => 0);

	$params = rk_osc_parse_args( $args, $defaults );
	extract( $params );
	$return ='';
	$rk = array();
	if (tep_not_null($exclude)) {
	$exclude = preg_replace('[^0-9,]', '', $exclude);
	$rk = explode(",", $exclude);
	}
	if ( $title_li ) $return .= $before . $title_li . '<ul>';

	if ($show_bloghome == 1) 	
	$return .=  $link_before . '<a href="'.rk_osc_bloginfo('home',0).'/">'. rk_osc_bloginfo('name',0) . '</a>'. $link_after;
	if ($show_storehome == 1) 	
	$return .=  $link_before . '<a href="' . tep_href_link(FILENAME_DEFAULT, '', 'NONSSL', false) . '">' . HEADER_TITLE_TOP .'</a>'. $link_after;


	$return .=  rk_get_boxes('catalog', $link_before, $link_after, $rk,0);
	if ( $title_li ) $return .= '</ul>'.$after;

	if ( $echo ) {
		echo $return;
	} else {
		return $return;
	}
}
function rk_osc_catalog_pages_menu($args='') {
	return '';
}
function rk_osc_dropdown_catalog_pages($args='') {
	$defaults = array( 
	'text' =>  _c(HEADER_TITLE_CATALOG), 
	'class' => 'postform',
	'select_class' => '',
	'exclude' => '',
	'show_bloghome'  => 0,
	'show_storehome'  => 0,
	'echo' => 1
	);
	$params = rk_osc_parse_args( $args, $defaults );
	extract( $params );
	$rk = array();
	if (tep_not_null($exclude)) {
	$exclude = preg_replace('[^0-9,]', '', $exclude);
	$rk = explode(",", $exclude);
	}
	$return ='';
	if (tep_not_null($class)) $class = str_replace ('%class', $class, 'class="%class" ');
	if (tep_not_null($select_class)) $select_class = str_replace ('%class', $select_class, 'class="%class" ');
	$return .= '<form '.$class.'name="rkcp">'. '<select '.$select_class.'name="rkcs" ';
$return .= 'onChange="location=document.rkcp.rkcs.options[document.rkcp.rkcs.selectedIndex].value;">';
	$return .= '<option value="">'.$text.'</option>';

	if ($show_bloghome == 1) 	
	$return .=  '<option value="' .rk_osc_bloginfo('home',0).'">'. rk_osc_bloginfo('name',0) . '</option>';
	if ($show_storehome == 1) 	
	$return .= '<option value="' . tep_href_link(FILENAME_DEFAULT, '', 'NONSSL', false) . '">' . HEADER_TITLE_TOP .'</option>';

	$return .=  rk_get_boxes('catalog', '<option value="', '</option>', $rk,1);
	$return .= '</select>';
	$return .= '</form>';
	if ( $echo ) {
		echo $return;
	} else {
		return $return;
	}
} 
////
/// Categories Tags
/*
 * rk_osc_dropdown_categories
 */
function rk_osc_dropdown_categories($args='') {
	global $cPath; 
	global $HTTP_GET_VARS;
	global $osCsid;

	$defaults = array(
	'name' => 'cat', 
	'text' =>  _c(BOX_HEADING_CATEGORIES), 
	'class' => 'postform',
	'select_class' => '',
	'echo' => 1
	);
	$params = rk_osc_parse_args( $args, $defaults );
	extract( $params );
	$return ='';
	if (tep_not_null($class)) $class = str_replace ('%class', $class, 'class="%class"');
	if (tep_not_null($select_class)) $select_class = str_replace ('%class', $select_class, ' class="%class"');

	$categories_array = tep_get_categories(array(array('id' => '', 'text' => $text)));
	$return = tep_draw_form($name, tep_href_link(FILENAME_DEFAULT, '', 'NONSSL', false), 'get',$class).tep_draw_pull_down_menu('cPath', $categories_array, (isset($HTTP_GET_VARS['cPath']) ? $HTTP_GET_VARS['cPath'] : ''), 'onChange="this.form.submit();"'.$select_class) . tep_hide_session_id().'</form>';

	if ( $echo ) {
		echo $return;
	} else {
		return $return;
	}

}

/// Categories Tags
/*
 * rk_osc_list_categories
 */
function rk_osc_list_categories($args='') {
	global $cPath;
	global $cPath_array;
	global $current_category_id;
	global $tree, $categories_string;
	global $lng;
	global $language;
	global $languages_id;
	global $HTTP_GET_VARS;
	global $parent_id;

$categories_string = '';
$tree = array();

$defaults = array(
	'orderby' => 'name', 
	'order' => 'ASC', 
	'style' => 'list',
	'show_count' => 0, 
	'hide_empty' => 1, 
	'parent_category' => 0,
	'exclude' => '', 
	'title_li' => _c(BOX_HEADING_CATEGORIES),
	'class' => 'current-cat',
	'echo' => 1
	);
	$params = rk_osc_parse_args( $args, $defaults );
	extract( $params );
	$return ='';
	$categories_string = '';
	$tree = array();
	if ($orderby == 'id') {
		$orderby = 'sort_order, cd.categories_id';
	} else {
		$orderby = 'sort_order, cd.categories_name';
	}
	$non = "";
	if (tep_not_null($exclude)) {
		$exclude = preg_replace('[^0-9,]', '', $exclude);
		$rk = explode(",", $exclude);
		foreach ($rk as $key => $value) {
		$non .= " and c.categories_id != '" . (int)$value . "'";
		}
	}

	$categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . $parent_category . "' and c.categories_id = cd.categories_id and cd.language_id='" . (int)$languages_id ."'" . $non . " order by " . $orderby . " " .$order);
	while ($categories = tep_db_fetch_array($categories_query))  {
	$tree[$categories['categories_id']] = array('name' => $categories['categories_name'],
                                                'parent' => $categories['parent_id'],
                                                'level' => 0,
                                                'path' => $categories['categories_id'],
                                                'next_id' => false);
	if (isset($parent_id)) {
	$tree[$parent_id]['next_id'] = $categories['categories_id'];
	}
	$parent_id = $categories['categories_id'];
	if (!isset($first_element)) {
		$first_element = $categories['categories_id'];
	}
	}
	if (tep_not_null($cPath)) {
	$new_path = '';
	reset($cPath_array);
	while (list($key, $value) = each($cPath_array)) {
	unset($parent_id);
	unset($first_id);
	$categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . (int)$value . "' and c.categories_id = cd.categories_id and cd.language_id='" . (int)$languages_id ."'" . $non . " order by " . $orderby . " " .$order);
	if (tep_db_num_rows($categories_query)) {
	$new_path .= $value;
        while ($row = tep_db_fetch_array($categories_query)) {
          $tree[$row['categories_id']] = array('name' => $row['categories_name'],
                                               'parent' => $row['parent_id'],
                                               'level' => $key+1,
                                               'path' => $new_path . '_' . $row['categories_id'],
                                               'next_id' => false);

          if (isset($parent_id)) {
            $tree[$parent_id]['next_id'] = $row['categories_id'];
          }

          $parent_id = $row['categories_id'];

          if (!isset($first_id)) {
            $first_id = $row['categories_id'];
          }

          $last_id = $row['categories_id'];
        }
        $tree[$last_id]['next_id'] = $tree[$value]['next_id'];
        $tree[$value]['next_id'] = $first_id;
        $new_path .= '_';
      } else {
        break;
      }
    }
  }
	if (tep_not_null($class)) $class = str_replace ('%class', $class, '<li class="%class">');
	if ( $title_li && $style == 'list' )
		$return = '<li class="categories">' . $title_li . '<ul>';

	if ($style == 'list' ) {
		rk_tep_show_category($first_element, '<li>', '</li>', $class, $show_count, $hide_empty); 
		$return .= $categories_string;
	} else {
		rk_tep_show_category($first_element,'', ',', '', $show_count, $hide_empty);
		$return .= $categories_string;
	}
	
	if ( $title_li && $style == 'list' ) $return .= '</ul></li>';
	if ( $echo ) {
		echo $return;
	} else {
		return $return;
	}

}

////Navigation Tags
function rk_osc_the_navigation($arg='') {
	global $breadcrumb;
	if (!tep_not_null($arg))  $arg = ' &raquo; ';
	echo $breadcrumb->trail($arg);
} 
///Shopping Cart
function rk_osc_shopping_cart($args='') {
	$defaults = array(
		'title_li' => _c(BOX_HEADING_SHOPPING_CART), 
		'echo' => 1,
		'before' => '<li class="pagenav">',
		'after'  => '</li>',
		'link_before' => '<li class="page_item">',
		'link_after'  => '</li>');
	$params = rk_osc_parse_args( $args, $defaults );
	extract( $params );
	$return ='';
	if ( $title_li ) $return .= $before . $title_li . '<ul>';
	$return .=  rk_get_boxes('cart', $link_before, $link_after);
	if ( $title_li ) $return .= '</ul>'.$after;
	if ( $echo ) {
		echo $return;
	} else {
		return $return;
	}
} 
///Boxes
function rk_osc_display_best_sellers($args='') {
	$defaults = array(
		'title_li' => _c(BOX_HEADING_BESTSELLERS), 
		'echo' => 1,
		'before' => '<li class="pagenav">',
		'after'  => '</li>',
		'link_before' => '<li class="page_item">',
		'link_after'  => '</li>');
	$params = rk_osc_parse_args( $args, $defaults );
	extract( $params );
	$return ='';
	if ( $title_li ) $return .= $before . $title_li . '<ul>';
	$return .=  rk_get_boxes('best', $link_before, $link_after);
	if ( $title_li ) $return .= '</ul>'.$after;
	if ( $echo ) {
		echo $return;
	} else {
		return $return;
	}
}
function rk_osc_display_reviews($args='') {
	$defaults = array(
		'echo' => 1,
		'before' => '<div class="aligncenter">',
		'after'  => '</div>',
		'class' => 'centered',
		'width' => SMALL_IMAGE_WIDTH,
		'height' => SMALL_IMAGE_HEIGHT,
		'limit' => 1);
	$params = rk_osc_parse_args( $args, $defaults );
	extract( $params );
	$return ='';
	if (tep_not_null($class)) $class = str_replace ('%class', $class, 'class="%class"');
	$rk= array(
			'class' => $class, 
			'width' => $width,
			'height' => $height,
			'limit' => $limit);
	$return .=  rk_get_boxes('rev', $before, $after,$rk);
	if ( $echo ) {
		echo $return;
	} else {
		return $return;
	}
} 
function rk_osc_display_whats_new($args='') {
	$defaults = array(
		'echo' => 1,
		'before' => '<div class="aligncenter">',
		'after'  => '</div>',
		'class' => 'centered',
		'width' => SMALL_IMAGE_WIDTH,
		'height' => SMALL_IMAGE_HEIGHT,
		'limit' => 1);
	$params = rk_osc_parse_args( $args, $defaults );
	extract( $params );
	$return ='';
	if (tep_not_null($class)) $class = str_replace ('%class', $class, 'class="%class"');
	$rk= array(
			'class' => $class, 
			'width' => $width,
			'height' => $height,
			'limit' => $limit);
	$return .=  rk_get_boxes('new', $before, $after,$rk);
	if ( $echo ) {
		echo $return;
	} else {
		return $return;
	}
} 
function rk_osc_display_specials($args='') {
	$defaults = array(
		'echo' => 1,
		'before' => '<div class="aligncenter">',
		'after'  => '</div>',
		'class' => 'centered',
		'width' => SMALL_IMAGE_WIDTH,
		'height' => SMALL_IMAGE_HEIGHT,
		'limit' => 1);
	$params = rk_osc_parse_args( $args, $defaults );
	extract( $params );
	$return ='';
	if (tep_not_null($class)) $class = str_replace ('%class', $class, 'class="%class"');
	$rk= array(
			'class' => $class, 
			'width' => $width,
			'height' => $height,
			'limit' => $limit);
	$return .=  rk_get_boxes('spec', $before, $after,$rk);
	if ( $echo ) {
		echo $return;
	} else {
		return $return;
	}
} 
function rk_osc_display_manufacturers($args='') {
	global $cPath; 
	global $HTTP_GET_VARS;
	global $osCsid;

	$defaults = array(
	'name' => 'manufacturers', 
	'text' =>  _c(PULL_DOWN_DEFAULT), 
	'class' => 'postform',
	'select_class' => '',
	'echo' => 1
	);
	$params = rk_osc_parse_args( $args, $defaults );
	extract( $params );
	$return ='';
	if (tep_not_null($class)) $class = str_replace ('%class', $class, 'class="%class"');
	if (tep_not_null($select_class)) $select_class = str_replace ('%class', $select_class, ' class="%class"');

	$manufacturers_array = tep_get_manufacturers(array(array('id' => '', 'text' => $text)));
	$return = tep_draw_form($name, tep_href_link(FILENAME_DEFAULT, '', 'NONSSL', false), 'get',$class).tep_draw_pull_down_menu('manufacturers_id', $manufacturers_array, (isset($HTTP_GET_VARS['manufacturers_id']) ? $HTTP_GET_VARS['manufacturers_id'] : ''), 'onChange="this.form.submit();"'.$select_class) . tep_hide_session_id().'</form>';

	if ( $echo ) {
		echo $return;
	} else {
		return $return;
	}
} 
///The Loop
function rk_osc_have_posts($arg=''){
	global $nbs;
	global $count;
	global $where;
	if ($count<$nbs) { 
		return true; 
	} else { 
		return false;
	}
}
function rk_osc_the_post($arg=''){
	global $nbs;
	global $count;
	global $where;
	$count++;
	echo "";
}
function rk_osc_the_title($arg='') {
	global $nbs;
	global $count;
	global $where;
	global $current_category_id, $languages_id;
	if ($where == 47) {
	$tab = rk_contenu_page($where, $count,$nbs);
	echo $tab['page_title'];
	} else {
	if ( has_category_articles($current_category_id, 'descriptor') ) {
	echo category_descriptor_title($current_category_id,$languages_id);
	} else {
	$tab = rk_contenu_page($where, $count,$nbs);
	echo $tab['page_title'];
	}
	}
}
function rk_osc_the_content($arg=''){
	global $nbs;
	global $count;
	global $where;
	$content = '';
	$tab = rk_contenu_page($where, $count,$nbs);
	$content = $tab['page_content'];

	/* allows you to apply filter to a page's content*/
	/* control : $where parameter*/
	$content = rk_filter ($content);

	echo $content;
} 
function rk_osc_in_category( $category ) {
	global $current_category_id;

	if ( empty($category) ) return false;
	if ( ! is_int($category) ) return false;
	if ( $category == $current_category_id ) {
		return true;
	} else {
		return false;

	}
} 
function rk_osc_the_category($args=''){
	global $current_category_id, $languages_id;

	$defaults = array('echo' => 1);
	$params = rk_osc_parse_args( $args, $defaults );
	extract( $params );
	$return ='';
	if(tep_not_null($current_category_id)) {
	$cat_query = tep_db_query("select categories_name from " . TABLE_CATEGORIES_DESCRIPTION . " where categories_id = '". (int)$current_category_id  . "' and language_id = '" . (int)$languages_id . "'");
	$cat = tep_db_fetch_array($cat_query);
	$return = $cat['categories_name']; 
	}
	if ( $echo ) {
		echo $return;
	} else {
		return $return;
	}
}
///General Tags
function rk_osc_storeinfo($param = '',$echo=1){
	extract($GLOBALS,EXTR_SKIP);
	$HTTP_GET_VARS = &$_GET;
	$HTTP_POST_VARS = &$_POST;
	$HTTP_ENV_VARS = &$_ENV;
	$HTTP_SERVER_VARS  = &$_SERVER;
	$HTTP_COOKIE_VARS  = &$_COOKIE;
	switch($param) {

		case 'url' :
			$output = HTTP_SERVER.DIR_WS_HTTP_CATALOG;
			break;
		case 'home' : 
			$output = HTTP_SERVER.DIR_WS_HTTP_CATALOG.FILENAME_DEFAULT;
			break;
		case 'stylesheet_url':
			$output = HTTP_SERVER.DIR_WS_HTTP_CATALOG.TEMPLATEPATH.'/'.'style.css';
			break;
		case 'stylesheet_directory':
			$output = HTTP_SERVER.DIR_WS_HTTP_CATALOG.TEMPLATEPATH;
			break;
		case 'template_directory':
		case 'template_url':
			$output = HTTP_SERVER.DIR_WS_HTTP_CATALOG.TEMPLATEPATH;
			break;
		case 'admin_email':
			$output = STORE_OWNER_EMAIL_ADDRESS;
			break;
		case 'charset':
			$output = CHARSET;
			break;
		case 'html_params':
			$output = strtolower(HTML_PARAMS);
			break;
		case 'html_type':
			$output = 'text/html';
			break;
		case 'text_direction':
			$output = HTML_PARAMS;
			$pos = strpos(strtolower($output), 'ltr');
			if ($pos !== false) {  $output = 'ltr'; } else { $output = 'rtl'; }
			break;
		case 'rss2_url':
		case 'rss_url':
		case 'rss':
			$lang_string='';
			$lang_code = $lng->language['code'];
			if (!tep_not_null($lang_code)) $lang_code='en';
			$lang_string='?language='.$lang_code;
			$output = HTTP_SERVER.DIR_WS_HTTP_CATALOG.'rss.php' . $lang_string;
			break;
		case 'name':
		default:
			$output = STORE_NAME;
			break;

	}
	if (!$echo) return $output;
	echo $output;
}

function rk_osc_rss($echo=1) {
	$return = '';
	$return .= '<a href="'.rk_osc_storeinfo('rss',0).'" title="RSS Feed">'.tep_image(DIR_WS_IMAGES .  "rss_icon.jpg" , STORE_NAME . " - " .' RSS Feed').'</a>';
	if (!$echo) return $return;
	echo $return;
}
function rk_osc_bloginfo($param = '',$echo=1){
	extract($GLOBALS,EXTR_SKIP);
	$HTTP_GET_VARS = &$_GET;
	$HTTP_POST_VARS = &$_POST;
	$HTTP_ENV_VARS = &$_ENV;
	$HTTP_SERVER_VARS  = &$_SERVER;
	$HTTP_COOKIE_VARS  = &$_COOKIE;
	if (WPOSC_MODE == 'STANDALONE'){
	$output = '';
	} else {
	switch($param) {

		case 'url' :
		case 'home' : 
		case 'siteurl' : 
			$output = rk_osc_get_option('home');
			break;
		case 'wpurl' :
			$output = rk_osc_get_option('siteurl');
			break;
		case 'description':
			$output = rk_osc_get_option('blogdescription');
			break;
		case 'rdf_url':
			$output = '';
			break;
		case 'rss_url':
			$output = rk_osc_get_option('siteurl') .'/?feed=rss';
			break;
		case 'rss2_url':
			$output = rk_osc_get_option('siteurl') .'/?feed=rss2';
			break;
		case 'atom_url':
			$output = '';
			break;
		case 'comments_atom_url':
			$output = '';
			break;
		case 'comments_rss2_url':
			$output = rk_osc_get_option('siteurl') .'/?feed=comments-rss2';
			break;
		case 'pingback_url':
			$output = rk_osc_get_option('siteurl') .'/xmlrpc.php';
			break;
		case 'stylesheet_url':
			$output = rk_osc_get_option('siteurl').'/wp-content/themes/'.get_option('stylesheet').'/'.'style.css';
			break;
		case 'stylesheet_directory':
			$output = rk_osc_get_option('siteurl').'/wp-content/themes/'.get_option('stylesheet');
			break;
		case 'template_directory':
		case 'template_url':
			$output = rk_osc_get_option('siteurl').'/wp-content/themes/'.get_option('template');
			break;
		case 'admin_email':
			$output = rk_osc_get_option('admin_email');
			break;
		case 'charset':
			////$output = CHARSET;
			$output = rk_osc_get_option('blog_charset');
			if ('' == $output) $output = 'UTF-8';
			break;
		case 'html_type' :
			$output = rk_osc_get_option('html_type');
			break;
		case 'version':
			$wp_version = '2.6';
			$output = $wp_version;
			break;
		case 'language':
			$output = '';
			break;
		case 'text_direction':
			$output = 'ltr';
			break;
		case 'name':
		default:
			$output = rk_osc_get_option('blogname');
			break;

	}
	}
	if (!$echo) return $output;
	echo $output;
}
function rk_osc_get_bloginfo($arg=''){
	return rk_osc_bloginfo($arg,0);
}
function rk_osc_get_storeinfo($arg=''){
	return rk_osc_storeinfo($arg,0);
}

function rk_osc_e($arg=''){
	echo $arg;
}
/*
 * rk_osc_c
 * todo : renforcer l'utilisation des constantes avec control "if defined"
 */
function rk_osc_c($arg=''){
  		return $arg;
}

function rk_osc_x($arg=''){
	return $arg;
}

function rk_osc_get_option($param='', $blog_id=0) {
	extract($GLOBALS,EXTR_SKIP);
	$HTTP_GET_VARS = &$_GET;
	$HTTP_POST_VARS = &$_POST;
	$HTTP_ENV_VARS = &$_ENV;
	$HTTP_SERVER_VARS  = &$_SERVER;
	$HTTP_COOKIE_VARS  = &$_COOKIE;
	$wp_table = WORDPRESS_TABLE_PREFIX . 'options';
	$wp_query = wp_tep_db_query("select option_id, blog_id, option_name, option_value, autoload from " . $wp_table . " where option_name = '" . $param . "' and blog_id = '" . (int)$blog_id . "'");
	$wp = wp_tep_db_fetch_array($wp_query);
	return $wp['option_value'];
}
function rk_osc_get_settings($arg=''){
	return rk_osc_bloginfo($arg,0);
}

function rk_osc_counter($args='') {
	$defaults = array(
		'echo' => 1,
		'before' => '<div class="aligncenter">',
		'after'  => '</div>');
	$params = rk_osc_parse_args( $args, $defaults );
	extract( $params );
	$return ='';
	$return .=  rk_get_boxes('counter', $before, $after);
	if ( $echo ) {
		echo $return;
	} else {
		return $return;
	}
} 
function rk_osc_wp_head($arg=''){
	global $where;
	extract($GLOBALS,EXTR_SKIP);
	$HTTP_GET_VARS = &$_GET;
	$HTTP_POST_VARS = &$_POST;
	$HTTP_ENV_VARS = &$_ENV;
	$HTTP_SERVER_VARS  = &$_SERVER;
	$HTTP_COOKIE_VARS  = &$_COOKIE;

	echo '<base href="' . (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG.'" />'."\n";
	echo '<link rel="stylesheet" type="text/css" href="stylesheet.css" />'."\n";
	$foo = rk_get_include_contents(DIR_WS_INCLUDES.'menu.php');
	echo "\n".$foo."\n";
	Define ('TEMPHEADFILENAME','head'.$where.'.php');
	if ( file_exists( DIR_WS_INCLUDES . TEMPHEADFILENAME) ) {
	$foo = rk_get_include_contents( DIR_WS_INCLUDES . TEMPHEADFILENAME );
	echo "\n".$foo."\n";
	}
	if ($where==18) echo $payment_modules->javascript_validation();

}
function rk_osc_wp_title($arg=''){
	return '';
}
function rk_osc_language_attributes($arg=''){
	return rk_osc_storeinfo('html_params');
}
function rk_osc_wp_footer($arg=''){
	echo "";
}
////Date and Time Tags
function rk_osc_the_time($arg=''){
	if (!empty($arg)) {
		echo date($arg); 
	} else {
		echo date(DATE_FORMAT);
	}
}
function rk_osc_the_date($arg=''){
	if (!empty($arg)) {
		echo date($arg); 
	} else {
		echo date(DATE_FORMAT);
	}
}

function rk_osc_the_modified_date($arg='') {
	if ((strpos($arg, ' ')) !== false) {
		echo str_replace('-', ' ',  date(str_replace(' ', '-', $arg)));
	} else {
		return the_time($arg);
	}
}
////Load functions
function rk_osc_get_header($arg='') {
	if ( file_exists( TEMPLATEPATH . '/header.php') ) {
		include( TEMPLATEPATH . '/header.php');
	} else {
		include( 'themes/default/header.php');
	}
}
function rk_osc_get_sidebar($name = null){
	if ( isset($name) && file_exists( TEMPLATEPATH . "/sidebar-{$name}.php") ) {
		rk_include( TEMPLATEPATH . "/sidebar-{$name}.php");
	} elseif ( file_exists( TEMPLATEPATH . '/sidebar.php') ) {
		rk_include( TEMPLATEPATH . '/sidebar.php');
	} else {
		rk_include( 'themes/default/sidebar.php');
	}
}
function rk_osc_get_footer($arg=''){
	if ( file_exists( TEMPLATEPATH . '/footer.php') ) {
		include( TEMPLATEPATH . '/footer.php');
	} else {
		include( 'themes/default/footer.php');
	}
}
function rk_osc_get_page($arg=''){
	if ( file_exists( TEMPLATEPATH . '/index.php') ) {
		rk_include( TEMPLATEPATH . '/index.php',2);
	} else {
		rk_include( 'themes/default/index.php',2);
	}
}
########################################################
function rk_include($filename='', $type=1) {
	$foo = rk_get_include_contents($filename);
	////$foo= rk_get_definition($foo,$type);
	echo $foo; 
}
function rk_get_include_contents($filename) {
  if (is_file($filename)) {
    ob_start();
    include $filename;
    $contents = ob_get_contents();
    ob_end_clean();
    return $contents;
  }
  return false;
}
function rk_contenu_page($where=0, $count=0,$nbs=0) {
	extract($GLOBALS,EXTR_SKIP);
	$HTTP_GET_VARS = &$_GET;
	$HTTP_POST_VARS = &$_POST;
	$HTTP_ENV_VARS = &$_ENV;
	$HTTP_SERVER_VARS  = &$_SERVER;
	$HTTP_COOKIE_VARS  = &$_COOKIE;
	switch ($where) {
	case 1: 
	case 2: 
	case 3: 
	case 42:
	case 43:
		$page_title = HEADING_TITLE;
		$page_content = TEXT_INFORMATION;
		$pagination ='<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . IMAGE_BUTTON_CONTINUE .' &#187;'. '</a>';
		if ($where==42) $pagination ='<a href="' . tep_href_link(FILENAME_LOGIN) . '">' . IMAGE_BUTTON_CONTINUE .' &#187;'. '</a>';
		$page_content .=  '<br /><br />'.$pagination;
		break;	
	
	default:

		Define ('TEMPFILENAME','module'.$where.'.php');
		include(DIR_WS_MODULES . TEMPFILENAME);
		$page_title = HEADING_TITLE;
		if ($where==8) $page_title = BOX_HEADING_BESTSELLERS;
		if ($where==9) $page_title = HEADING_TITLE_1;
		if ($where==13) $page_title = HEADING_TITLE_2;
		if ($where==14) $page_title = $products_name;
		if ($where==15) $page_title = $products_name;
		if ($where==38) $page_title = $products_name;
		if ($where==39) $page_title = $products_name;
		if ($where==40) $page_title = sprintf(HEADING_TITLE, $product_info['products_name']);
		if ($where==32) {
			if (isset($HTTP_GET_VARS['edit'])) { 
			$page_title = HEADING_TITLE_MODIFY_ENTRY; 
			} elseif (isset($HTTP_GET_VARS['delete'])) { 
			$page_title = HEADING_TITLE_DELETE_ENTRY; 
			} else { 
			$page_title = HEADING_TITLE_ADD_ENTRY; }

		}
		if ($where==47) $page_title = $articles_name;

	}

		$data = array(
			'page_title'=> $page_title,
			'page_content'=> $page_content);
		return $data;
}

function rk_tep_show_category($counter,$before='', $after='', $class='', $show_count=0,$hide_empty=1) {
	global $tree, $categories_string, $cPath, $cPath_array,	$current_category_id;
	
	if (($hide_empty==1) && (tep_count_products_in_category($counter) <= 0 ) && ($tree[$counter]['next_id'] != false)) {
		rk_tep_show_category($tree[$counter]['next_id'],$before, $after, $class, $show_count,$hide_empty);
	} else {

		for ($i=0; $i<$tree[$counter]['level']; $i++) {
			$categories_string .= '';
		}
		if ($counter == $current_category_id)  {
			$categories_string .= $class.'<a href="';
		} else {
			$categories_string .= $before.'<a href="';
		}
		if ($tree[$counter]['parent'] == 0) {
			$cPath_new = 'cPath=' . $counter;
		} else {
			$cPath_new = 'cPath=' . $tree[$counter]['path'];
		}

		$categories_string .= tep_href_link(FILENAME_DEFAULT, $cPath_new) . '">';
		if (tep_has_category_subcategories($counter)) $categories_string .= '<b>';
		$categories_string .= $tree[$counter]['name'];
		if (tep_has_category_subcategories($counter)) $categories_string .= '</b>';
		$categories_string .= '</a>';

		if ($show_count == 1) {
			$products_in_category = tep_count_products_in_category($counter);
			if ($products_in_category > 0) {
        		$categories_string .= '&nbsp;(' . $products_in_category . ')';
			}
		}

		$categories_string .= $after;

		if ($tree[$counter]['next_id'] != false) {
		rk_tep_show_category($tree[$counter]['next_id'],$before, $after,$class, $show_count,$hide_empty);
	
		}

    }
  }
function rk_osc_parse_args( $args = '' , $defaults = '' ) {
	if ( is_array( $args ) ) {
		$return =& $args;
	} else {
	parse_str( $args, $return );
		if ( get_magic_quotes_gpc() ) {
			if (is_array($return)) {
				$return = array_map('stripslashes', $return); 
			} else {
				$return = stripslashes($return);
			}
		}
	}
	if ( is_array( $defaults ) ) return array_merge( $defaults, $return );
	return $return;
}

function rk_get_boxes($from, $before='', $after='', $exclude = array(), $ddm=0) {
	extract($GLOBALS,EXTR_SKIP);
	$HTTP_GET_VARS = &$_GET;
	$HTTP_POST_VARS = &$_POST;
	$HTTP_ENV_VARS = &$_ENV;
	$HTTP_SERVER_VARS  = &$_SERVER;
	$HTTP_COOKIE_VARS  = &$_COOKIE;
/// variable
	switch ($from) {
		case "cart":
			return rk_box(1,$before, $after);
    			break;
		case "pages":
			$bmenu = '<ul>'; 
			$amenu = '</ul>'; 
			$bsubmenu = '<li>'; 
			$asubmenu ='</li>';
			return rk_box(2,$before, $after, $exclude, $ddm, $bmenu,$amenu,$bsubmenu,$asubmenu);
    			break;
		case "ddpages":
			$bmenu = ''; 
			$amenu = ''; 
			$bsubmenu = ''; 
			$asubmenu ='';
			return rk_box(2,$before, $after, $exclude, $ddm, $bmenu,$amenu,$bsubmenu,$asubmenu);
    			break;
		case "catalog":
			return rk_box(4,$before, $after,$exclude,$ddm);
    			break;
		case "infos":
			return rk_box(5,$before, $after,$exclude,$ddm);
    			break;
		case "counter":
			return rk_box(7,$before, $after);
    			break;
		case "spec":
			return rk_box(8,$before, $after,$exclude);
    			break;
		case "new":
			return rk_box(9,$before, $after,$exclude);
    			break;
		case "rev":
			return rk_box(10,$before, $after,$exclude);
    			break;
		case "best":
			return rk_box(11,$before, $after);
    			break;
/*
		case "categories":
			return rk_box(3,$before, $after);
    			break;

		case "meta2":
			return rk_box(6,$before, $after);
    			break;

*/
		default:
	}
}

function rk_box($id,$before='', $after='',$exclude = array(), $ddm=0, $bmenu='', $amenu='',$bsubmenu='', $asubmenu='') {
	global $where; 
	global $count;
	global $nbs;
	extract($GLOBALS,EXTR_SKIP);
	$HTTP_GET_VARS = &$_GET;
	$HTTP_POST_VARS = &$_POST;
	$HTTP_ENV_VARS = &$_ENV;
	$HTTP_SERVER_VARS  = &$_SERVER;
	$HTTP_COOKIE_VARS  = &$_COOKIE;
/// fixe
	switch ($id) {
		case 1: /// box1 : shopping cart
			$title = BOX_HEADING_SHOPPING_CART;
			require(DIR_WS_BOXES . 'box1.php');
			break;
		case 2: 
			$title = STORE_NAME;
			require(DIR_WS_BOXES . 'box2.php');
			break;
		case 3: 
			$title = BOX_HEADING_CATEGORIES;
			require(DIR_WS_BOXES . 'box3.php');
			break;
		case 4: 
			$title = HEADER_TITLE_CATALOG;
			require(DIR_WS_BOXES . 'box4.php');
			break;
		case 5: 
			require(DIR_WS_INCLUDES . 'counter.php');
			$title = BOX_HEADING_INFORMATION;
			require(DIR_WS_BOXES . 'box5.php');
			break;
		case 6: 
			require(DIR_WS_BOXES . 'box6.php');
			break;
		case 7:  
			require(DIR_WS_INCLUDES . 'counter.php');
			require(DIR_WS_BOXES . 'box7.php');
			break;
		case 8:  
			$class = $exclude['class']; /// img class
			$width = $exclude['width']; /// img width
			$height = $exclude['height']; /// img height
			$limit = $exclude['limit']; 
			$title = BOX_HEADING_SPECIALS;
			require(DIR_WS_BOXES . 'box8.php');
			break;
		case 9:  
			$class = $exclude['class']; /// img class
			$width = $exclude['width']; /// img width
			$height = $exclude['height']; /// img height
			$limit = $exclude['limit'];
			$title = BOX_HEADING_WHATS_NEW;
			require(DIR_WS_BOXES . 'box9.php');
			break;
		case 10:  
			$class = $exclude['class']; /// img class
			$width = $exclude['width']; /// img width
			$height = $exclude['height']; /// img height
			$limit = $exclude['limit'];
			$title = BOX_HEADING_REVIEWS;
			require(DIR_WS_BOXES . 'box10.php');
			break;
		case 11:  
			$limit = 10;
			$title = BOX_HEADING_BESTSELLERS;
			require(DIR_WS_BOXES . 'box11.php');
			break;
		case 12:  
			$title = STORE_NAME;
			require(DIR_WS_BOXES . 'box12.php');
			break;
		default:
	}
return $box_contents;
}



    function rktableBox($contents, $direct_output = false, $table_border='0', $table_width='100%', $table_cellspacing='0', $table_cellpadding='1', $table_parameters='class="infoBox"', $table_row_parameters='', $table_data_parameters='') {
      $tableBox_string = '<table border="' . tep_output_string($table_border) . '" width="' . tep_output_string($table_width) . '" cellspacing="' . tep_output_string($table_cellspacing) . '" cellpadding="' . tep_output_string($table_cellpadding) . '"';
      if (tep_not_null($table_parameters)) $tableBox_string .= ' ' . $table_parameters;
      $tableBox_string .= '>' . "\n";

      for ($i=0, $n=sizeof($contents); $i<$n; $i++) {
        if (isset($contents[$i]['form']) && tep_not_null($contents[$i]['form'])) $tableBox_string .= $contents[$i]['form'] . "\n";
        $tableBox_string .= '  <tr';
        if (tep_not_null($table_row_parameters)) $tableBox_string .= ' ' . $table_row_parameters;
        if (isset($contents[$i]['params']) && tep_not_null($contents[$i]['params'])) $tableBox_string .= ' ' . $contents[$i]['params'];
        $tableBox_string .= '>' . "\n";

        if (isset($contents[$i][0]) && is_array($contents[$i][0])) {
          for ($x=0, $n2=sizeof($contents[$i]); $x<$n2; $x++) {
            if (isset($contents[$i][$x]['text']) && tep_not_null($contents[$i][$x]['text'])) {
              $tableBox_string .= '    <td';
              if (isset($contents[$i][$x]['align']) && tep_not_null($contents[$i][$x]['align'])) $tableBox_string .= ' align="' . tep_output_string($contents[$i][$x]['align']) . '"';
              if (isset($contents[$i][$x]['params']) && tep_not_null($contents[$i][$x]['params'])) {
                $tableBox_string .= ' ' . $contents[$i][$x]['params'];
              } elseif (tep_not_null($table_data_parameters)) {
                $tableBox_string .= ' ' . $table_data_parameters;
              }
              $tableBox_string .= '>';
              if (isset($contents[$i][$x]['form']) && tep_not_null($contents[$i][$x]['form'])) $tableBox_string .= $contents[$i][$x]['form'];
              $tableBox_string .= $contents[$i][$x]['text'];
              if (isset($contents[$i][$x]['form']) && tep_not_null($contents[$i][$x]['form'])) $tableBox_string .= '</form>';
              $tableBox_string .= '</td>' . "\n";
            }
          }
        } else {
          $tableBox_string .= '    <td';
          if (isset($contents[$i]['align']) && tep_not_null($contents[$i]['align'])) $tableBox_string .= ' align="' . tep_output_string($contents[$i]['align']) . '"';
          if (isset($contents[$i]['params']) && tep_not_null($contents[$i]['params'])) {
            $tableBox_string .= ' ' . $contents[$i]['params'];
          } elseif (tep_not_null($table_data_parameters)) {
            $tableBox_string .= ' ' . $table_data_parameters;
          }
          $tableBox_string .= '>' . $contents[$i]['text'] . '</td>' . "\n";
        }

        $tableBox_string .= '  </tr>' . "\n";
        if (isset($contents[$i]['form']) && tep_not_null($contents[$i]['form'])) $tableBox_string .= '</form>' . "\n";
      }

      $tableBox_string .= '</table>' . "\n";

      if ($direct_output == true) echo $tableBox_string;

      return $tableBox_string;
    }
  function rk_create_sort_heading($sortby, $colnum, $heading) {
    global $PHP_SELF;

    $sort_prefix = '';
    $sort_suffix = '';

    if ($sortby) {
      $sort_prefix = '<a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('page', 'info', 'sort')) . 'page=1&amp;sort=' . $colnum . ($sortby == $colnum . 'a' ? 'd' : 'a')) . '" title="' . tep_output_string(TEXT_SORT_PRODUCTS . ($sortby == $colnum . 'd' || substr($sortby, 0, 1) != $colnum ? TEXT_ASCENDINGLY : TEXT_DESCENDINGLY) . TEXT_BY . $heading) . '">' ;
      $sort_suffix = (substr($sortby, 0, 1) == $colnum ? (substr($sortby, 1, 1) == 'a' ? '&#9650;' : '&#9660;') : '') . '</a>';
    }

    return $sort_prefix . $heading . $sort_suffix;
  }
?>