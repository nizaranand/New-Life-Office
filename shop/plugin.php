<?php
/*  
	This file is part of WP.osC package.
	Copyright (C) : Dec 2008 by Roya Khosravi

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
	plugin.php version 1.4
*/
 if (!function_exists('rk_scale_image')) {
  function rk_scale_image($p,$mw='',$mh='',$name='') { // path max_width max_height
	$p = get_bloginfo('wpurl').'/'.$p;
    if(list($w,$h) = @getimagesize($p)) {
    foreach(array('w','h') as $v) { $m = "m{$v}";
        if(${$v} > ${$m} && ${$m}) { $o = ($v == 'w') ? 'h' : 'w';
        $r = ${$m} / ${$v}; ${$v} = ${$m}; ${$o} = ceil(${$o} * $r); } }
	$arr = array (
	'width' => $w,
	'height'=> $h,
	'source' => "<img src='{$p}' alt='{$name}' width='{$w}' height='{$h}' />");
	return $arr; }
}
}
 if (!function_exists('rk_get_image_dir')) {
function rk_get_image_dir($wposcdir,$pimage) {
if (substr($wposcdir, -1) == '/') {
$image_dir = $wposcdir. DIR_WS_IMAGES . $pimage;
} else {
$image_dir = $wposcdir. '/'.DIR_WS_IMAGES . $pimage;
}
return $image_dir;
}
}

 if (!function_exists('rk_get_product_link')) {
function rk_get_product_link($wposcdir){
if (substr($wposcdir, -1) == '/') {
$plink = $wposcdir . FILENAME_PRODUCT_INFO;
} else {
$plink = $wposcdir .'/'. FILENAME_PRODUCT_INFO;
}
$plink = get_bloginfo('wpurl').'/'.$plink;
return $plink;
}
}
 if (!function_exists('tep_db_connect')) {
/* un marqueur typiquement oscommerce afin de savoir si le plugin a déjà été utilisé dans la page , évite de redéclarer le style plusieurs fois*/
?>
<style type="text/css">
div.rkImg
{
  margin: 2px;
  border: 0px;
  height: auto;
  width: auto;
  float: left;
  text-align: center;
}	
div.rkImg img
{
  display: inline;
  margin: 3px;
  border: 0px;
}
div.rkImg a:hover img {border: 0px;}
div.desc
{
  text-align: center;
  font-weight: normal;
  width: 120px;
  margin: 2px;
}
div.rkDescRight
{
  text-align: left;
  font-weight: normal;
  width: auto;
  margin: 4px;
}	
</style>
<?php
}
  define('PAGE_PARSE_START_TIME', microtime());
  error_reporting(E_ALL & ~E_NOTICE);
  if (function_exists('ini_get') && (ini_get('register_globals') == false) && (PHP_VERSION < 4.3) ) {
    exit('Server Requirement Error: register_globals is disabled in your PHP configuration. This can be enabled in your php.ini configuration file or in the .htaccess file in your catalog directory. Please use PHP 4.3+ if register_globals cannot be enabled on the server.');
  }
  if (file_exists('includes/local/configure.php')) include('includes/local/configure.php');
  require('includes/configure.php');

  if (strlen(DB_SERVER) < 1) {
    if (is_dir('install')) {
      header('Location: install/index.php');
    }
  }


 if (!function_exists('do_magic_quotes_gpc')) require(DIR_WS_FUNCTIONS . 'compatibility.php');

  $request_type = (getenv('HTTPS') == 'on') ? 'SSL' : 'NONSSL';
  if (!isset($PHP_SELF)) $PHP_SELF = $HTTP_SERVER_VARS['PHP_SELF'];

  if ($request_type == 'NONSSL') {
    define('DIR_WS_CATALOG', DIR_WS_HTTP_CATALOG);
  } else {
    define('DIR_WS_CATALOG', DIR_WS_HTTPS_CATALOG);
  }
if (!function_exists('tep_db_connect') ) {
  require(DIR_WS_INCLUDES . 'filenames.php');
  require(DIR_WS_INCLUDES . 'database_tables.php');
  require(DIR_WS_FUNCTIONS . 'database.php');
}

  tep_db_connect() or die('Unable to connect to database server!');

if (!function_exists('short_name') ) { 
  function short_name($str, $limit)
  {
     	return (strlen($str) > $limit && $limit > 3) ? substr($str, 0, $limit - 3) . '...' : $str;
  }
}
/// find default language
  $default_languages_id = 0;
  $default_language_query = tep_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'DEFAULT_LANGUAGE'");
  $default_language = tep_db_fetch_array($default_language_query);
  $language_query = tep_db_query("select languages_id from " . TABLE_LANGUAGES . " where code = '" . $default_language['configuration_value'] ."'");
  $language = tep_db_fetch_array($language_query);
  (int)$default_languages_id = $language['languages_id'];

/// set parameters
$return='';
if (empty($image_height)) $image_height = 150;
if (empty($image_width)) $image_width = 150;

$addImgh = 44;
$addImgw = 20;
$charlimit = 28;

$addImgh_w = 20;
$addImgw_w = 20;
$charlimit_w = 28;

if (empty($limit_new)) $limit_new = 9;
if (empty($limit_new_w)) $limit_new_w = 1;
if (empty($limit_rand)) $limit_rand = 9;
if (empty($limit_rand_w)) $limit_rand_w = 1;
if (empty($limit_best)) $limit_best = 10;

switch ($wposc_params) {
case "new":
	/// New products in post/page
	$new_products_query = tep_db_query("select p.products_id, p.products_image, p.products_tax_class_id, pd.products_name, if(s.status, s.specials_new_products_price, p.products_price) as products_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$default_languages_id . "' order by p.products_date_added desc limit " . $limit_new);
	$return .= '<div style="clear:both;height:10px"></div>'."\n";
	while ($new_products = tep_db_fetch_array($new_products_query)) {
$arr = rk_scale_image(rk_get_image_dir($wposcdir,$new_products['products_image']),$image_width,$image_height,$new_products['products_name']);
$image_source = $arr['source'];
$rkImgh = $arr['height']+$addImgh;
$rkImgw = $arr['width']+$addImgw;
$plink = rk_get_product_link($wposcdir);
	$return .= '<div class="rkImg" style="height:'.$rkImgh.'px;width:'.$rkImgw.'px;"><a href="' . $plink . '?products_id=' . $new_products['products_id'] . '">' . $image_source . '</a><div class="desc"><a href="' . $plink . '?products_id=' . $new_products['products_id'].'">' . short_name($new_products['products_name'], $charlimit) . '</a></div></div>';
	}
	$return .= '<div style="clear:both;height:10px"></div>'."\n";
    break;
case "new_w":
	/// New products in widget
    $new_products_query = tep_db_query("select p.products_id, p.products_image, p.products_tax_class_id, pd.products_name, if(s.status, s.specials_new_products_price, p.products_price) as products_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$default_languages_id . "' order by p.products_date_added desc limit " . $limit_new_w);
	while($new_products = tep_db_fetch_array($new_products_query)) {
$arr = rk_scale_image(rk_get_image_dir($wposcdir,$new_products['products_image']),$image_width,$image_height,$new_products['products_name']);
$image_source = $arr['source'];
$rkImgh_w = $arr['height']+$addImgh_w;
$rkImgw_w = $arr['width']+$addImgw_w;
$plink = rk_get_product_link($wposcdir);

	$return .= '<div style="clear:both;height:10px"></div>'."\n";
	$return .= '<div class="rkImg" style="height:'.$rkImgh_w.'px;width:'.$rkImgw_w.'px;"><a href="' . $plink. '?products_id=' . $new_products['products_id'] . '">' . $image_source . '</a><div class="desc"><a href="' . $plink . '?products_id=' . $new_products['products_id'].'">' . short_name($new_products['products_name'], $charlimit_w) . '</a></div></div>';
	$return .= '<div style="clear:both;height:10px"></div>'."\n";
	}
    break;
case "rand":
	/// random products in post/page
	$new_products_query = tep_db_query("select p.products_id, p.products_image, p.products_tax_class_id, pd.products_name, if(s.status, s.specials_new_products_price, p.products_price) as products_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$default_languages_id . "' order by rand() limit " . $limit_rand);
	$return .= '<div style="clear:both;height:10px"></div>'."\n";
	while ($new_products = tep_db_fetch_array($new_products_query)) {

$arr = rk_scale_image(rk_get_image_dir($wposcdir,$new_products['products_image']),$image_width,$image_height,$new_products['products_name']);
$image_source = $arr['source'];
$rkImgh = $arr['height']+$addImgh;
$rkImgw = $arr['width']+$addImgw;
$plink = rk_get_product_link($wposcdir);


	$return .= '<div class="rkImg" style="height:'.$rkImgh.'px;width:'.$rkImgw.'px;"><a href="' . $plink. '?products_id=' . $new_products['products_id'] . '">' . $image_source . '</a><div class="desc"><a href="' . $plink . '?products_id=' . $new_products['products_id'].'">' . short_name($new_products['products_name'], $charlimit) . '</a></div></div>';
	}
	$return .= '<div style="clear:both;height:10px"></div>'."\n";
    break;
case "rand_w":
	/// random products in post/page
	$new_products_query = tep_db_query("select p.products_id, p.products_image, p.products_tax_class_id, pd.products_name, if(s.status, s.specials_new_products_price, p.products_price) as products_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$default_languages_id . "' order by rand() limit " . $limit_rand_w);
	$return .= '<div style="clear:both;height:10px"></div>'."\n";
	while($new_products = tep_db_fetch_array($new_products_query)) {

$arr = rk_scale_image(rk_get_image_dir($wposcdir,$new_products['products_image']),$image_width,$image_height,$new_products['products_name']);
$image_source = $arr['source'];
$rkImgh_w = $arr['height']+$addImgh_w;
$rkImgw_w = $arr['width']+$addImgw_w;
$plink = rk_get_product_link($wposcdir);

	$return .= '<div class="rkImg" style="height:'.$rkImgh_w.'px;width:'.$rkImgw_w.'px;"><a href="' . $plink. '?products_id=' . $new_products['products_id'] . '">' . $image_source . '</a><div class="desc"><a href="' . $plink . '?products_id=' . $new_products['products_id'].'">' . short_name($new_products['products_name'], $charlimit_w) . '</a></div></div>';
	$return .= '<div style="clear:both;height:10px"></div>'."\n";
	}

    break;
case "best":
	$row = 0;
	$col = 0;
    $new_products_query = tep_db_query("select distinct p.products_id, p.products_image, pd.products_name,pd.products_description from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_ordered > 0 and p.products_id = pd.products_id and pd.language_id = '" . (int)$default_languages_id . "' order by p.products_ordered desc, pd.products_name limit " . $limit_best);
	while ($new_products = tep_db_fetch_array($new_products_query)) {

$arr = rk_scale_image(rk_get_image_dir($wposcdir,$new_products['products_image']),$image_width,$image_height,$new_products['products_name']);
$image_source = $arr['source'];
$rkImgh = $arr['height']+$addImgh_w;
$rkImgw = $arr['width']+$addImgw_w;
$plink = rk_get_product_link($wposcdir);


	$row ++;
	$return .= '<div class="rkImg" style="height:'.$rkImgh.'px;width:'.$rkImgw.'px;"><a href="' . $plink. '?products_id=' . $new_products['products_id'] . '">' . $image_source . '</a></div><div class="rkDescRight"><strong>' .  $row .'.</strong> <a href="' . $plink . '?products_id=' . $new_products['products_id'].'">'. $new_products['products_name'] . '</a><br />'.short_name($new_products['products_description'],150) .'</div>';
	$return .= '<div style="clear:both;height:10px"></div>'."\n";
	}
    break;
default:
}
echo $return;
?>