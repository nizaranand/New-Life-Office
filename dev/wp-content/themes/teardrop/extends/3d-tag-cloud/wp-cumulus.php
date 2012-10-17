<?php
/* 3D Tag Cloud by FiveSquared - Original Plugin info Below:

  Plugin Name: WP-Cumulus
  Plugin URI: http://www.roytanck.com/2008/03/15/wp-cumulus-released
  Description: Flash based Tag Cloud for WordPress
  Version: 1.23
  Author: Roy Tanck
  Author URI: http://www.roytanck.com
  
  Copyright 2009, Roy Tanck

  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
 (at your option)any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program. If not, see <http://www.gnu.org/licenses/>.
*/
class teardrop_tag_cloud extends WP_Widget {
  function teardrop_tag_cloud(){
    $widget_ops = array('classname' => 'teardrop_tag_cloud', 'description' => __('Display a 3D tag cloud on your site.'));
    $this->WP_Widget('teardrop_tag_cloud', __('Teardrop 3D Tag Cloud'), $widget_ops);
  }

  function widget($args, $instance){
    extract($args);
    $title = $instance['title'];
    $speed = $instance['speed'];

    ob_start();
    wp_tag_cloud($options['args']);
    $tagcloud = urlencode(str_replace("&nbsp;", " ", ob_get_clean()));

    echo $before_widget;
    echo $before_title.$title.$after_title; 
    echo '<div id="tagcloud"></div>';

    $soname.=rand(0,9999999);
    $movie.='?r='.rand(0,9999999);
    $divname.=rand(0,9999999);

    $turl = get_template_directory_uri();
    $movie = "$turl/extends/3d-tag-cloud/tagcloud.swf";
    $path = "$turl/extends/3d-tag-cloud/";

    $flashtag.='<script type="text/javascript" src="'.$path.'swfobject.js"></script>';
    $flashtag.='<script type="text/javascript">';
    $flashtag.='var so = new SWFObject("'.$movie.'", "tagcloudflash", "200", "200", "9", "#F4F4F2");';
    $flashtag.='so.addParam("wmode", "transparent");';
    $flashtag.='so.addParam("allowScriptAccess", "always");';
    $flashtag.='so.addVariable("tcolor", "0x333333");';
    $flashtag.='so.addVariable("tcolor2", "0x333333");';
    $flashtag.='so.addVariable("hicolor", "0xFFFFFF");';
    $flashtag.='so.addVariable("tspeed", "'.$speed.'");';
    $flashtag.='so.addVariable("distr", "true");';
    $flashtag.='so.addVariable("mode", "tags");';
    $flashtag.='so.addVariable("tagcloud", "'.urlencode('<tags>').$tagcloud.urlencode('</tags>').'");';
    $flashtag.='so.write("tagcloud")';
    $flashtag.='</script>';
    echo $flashtag;

    echo $after_widget;
  }

  function update($newInstance, $oldInstance){
    $instance = $oldInstance;
    $instance['title'] = strip_tags($newInstance['title']);
    $instance['speed'] = $newInstance['speed'];

    return $instance;
  }

  function form($instance){
    ?><input type="hidden" id="custom_recent" name="custom_recent" value="1" />
    <p><label>Title:<input class="widefat" id="<?php echo $this->get_field_id('title')?>" name="<?php echo $this->get_field_name('title')?>" type="text" value="<?php echo $instance['title']?>" /></label></p>
    <p><label>Speed:<input class="widefat" id="<?php echo $this->get_field_id('speed')?>" name="<?php echo $this->get_field_name('speed')?>" type="text" value="<?php echo $instance['speed']?>" /><br /><small>Recommended speed between 100-300</small></label></p>
    <?php
  }
}

add_action('widgets_init', create_function('', 'return register_widget("teardrop_tag_cloud");'));
?>