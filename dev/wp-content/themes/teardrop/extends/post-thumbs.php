<?php
/* ADDS WRITE PANELS TO PORTFOLIO */
add_action('admin_menu', 'create_meta_box_bg');
add_action('save_post', 'save_postdata_bg');

$video_bg_meta_box=array(
  "video-bg"=>array(
    "name"=>"_video_bg",
    "std"=>"",
    "title"=>"Background Video URL",
    "title_desc"=>"(Leave this field blank for use the slideshow as default on this page)",
    "description"=>"
	<b>Self hosted flw video:</b>&nbsp;&nbsp; http://www.yourdomain.com/wp-content/uploads/sample.flv<br />
	<b>Self hosted mp4 video:</b>&nbsp;&nbsp; http://www.yourdomain.com/wp-content/uploads/sample.mp4<br />
    <b>YouTube:</b>&nbsp;&nbsp; http://www.youtube.com/watch?v=qqXi8WmQ_WM<br />
    ",
  ),
  
    "image-bg"=>array(
    "name"=>"_image_bg",
    "std"=>"",
    "title"=>"Background Image URL",
    "title_desc"=>"(Leave this field blank for use the slideshow as default on this page)",
    "description"=>"
	 <b>Image:</b>&nbsp;&nbsp; http://www.yourdomain.com/wp-content/uploads/sample.png<br />
    ",
  ),
  
  "audio"=>array(
    "name"=>"_audio",
    "std"=>"",
    "title"=>"Background Audio URL",
    "title_desc"=>"(Leave this field blank for use the slideshow as default on this page)",
	"description"=>"
	 <b>Mp3:</b>&nbsp;&nbsp; http://www.yourdomain.com/wp-content/uploads/sample.mp3<br />
    ",
  ),

);



function create_meta_box_bg(){
  if(function_exists('add_meta_box')){
    add_meta_box('new-meta-boxes', 'Background Settings', 'video_bg_meta_box', 'post', 'normal', 'high');
	add_meta_box('new-meta-boxes', 'Background Settings', 'video_bg_meta_box', 'page', 'normal', 'high');
	add_meta_box('new-meta-boxes', 'Background Settings', 'video_bg_meta_box', 'portfolio', 'normal', 'high');
  }
}
function video_bg_meta_box(){
  global $post, $video_bg_meta_box;
  foreach($video_bg_meta_box as $meta_box){
    $meta_box_value=get_post_meta($post->ID, $meta_box['name'].'_value', true);
    if($meta_box_value=="")$meta_box_value=$meta_box['std'];

    echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce(plugin_basename(__FILE__)).'" />';
    echo'<h3>'.$meta_box['title'].'&nbsp;&nbsp;<span style="font-weight:normal !important;"><em>'.$meta_box['title_desc'].'</em></span>'.'</h3>';
    echo'<input type="text" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" style="width:100%;height:30px;"/><br />';
    echo'<p style="color: #21759B;"><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p><br /><br /><br />';
  }
}



function save_postdata_bg($post_id){
  global $post, $video_bg_meta_box;
  foreach($video_bg_meta_box as $meta_box){
    if(!wp_verify_nonce($_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__))) return $post_id;
    if(!current_user_can('edit_post', $post_id)) return $post_id;
    
    $data=$_POST[$meta_box['name'].'_value'];
    if(get_post_meta($post_id, $meta_box['name'].'_value')=="") add_post_meta($post_id, $meta_box['name'].'_value', $data, true);
    elseif($data !=get_post_meta($post_id, $meta_box['name'].'_value', true)) update_post_meta($post_id, $meta_box['name'].'_value', $data);
    elseif($data=="") delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
  }
}
/* ADDS WRITE PANELS TO PORTFOLIO */
add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');

$portfolio_meta_boxes=array(
  "portfull"=>array(
    "name"=>"_portimage_full",
    "std"=>"",
    "title"=>"Portfolio Video URL",
    "title_desc"=>"(Image, Flash Video, Youtube Video, Vimeo video etc)",
    "description"=>"
      <b>Image:</b>&nbsp;&nbsp; http://www.yourdomain.com/wp-content/uploads/sample.png<br />
      <b>YouTube:</b>&nbsp;&nbsp; http://www.youtube.com/watch?v=qqXi8WmQ_WM<br />
	  <b>Vimeo:</b>&nbsp;&nbsp; http://vimeo.com/25924530<br />
	  <b>QuickTime:</b>&nbsp;&nbsp; http://trailers.apple.com/movies/universal/despicableme/despicableme-tlr1_r640s.mov?width=640&height=360<br />
      <b>Flash:</b>&nbsp;&nbsp; http://www.adobe.com/products/flashplayer/include/marquee/design.swf?width=792&height=294<br />	  
      <b>iFrame:</b>&nbsp;&nbsp; http://www.google.com?iframe=true&width=100%&height=100%<br />
    ",
  ),
  "video-bg"=>array(
    "name"=>"_video_bg",
    "std"=>"",
    "title"=>"Background Video URL",
    "title_desc"=>"(Leave this field blank for use the slideshow as default on this page)",
    "description"=>"
	<b>Self hosted flw video:</b>&nbsp;&nbsp; http://www.yourdomain.com/wp-content/uploads/sample.flv<br />
	<b>Self hosted mp4 video:</b>&nbsp;&nbsp; http://www.yourdomain.com/wp-content/uploads/sample.mp4<br />
    <b>YouTube:</b>&nbsp;&nbsp; http://www.youtube.com/watch?v=qqXi8WmQ_WM<br />
    ",
  ),
  
    "image-bg"=>array(
    "name"=>"_image_bg",
    "std"=>"",
    "title"=>"Background Image URL",
    "title_desc"=>"(Leave this field blank for use the slideshow as default on this page)",
    "description"=>"
	 <b>Image:</b>&nbsp;&nbsp; http://www.yourdomain.com/wp-content/uploads/sample.png<br />
    ",
  ),
  
  "audio"=>array(
    "name"=>"_audio",
    "std"=>"",
    "title"=>"Background Audio URL",
    "title_desc"=>"(Leave this field blank for use the slideshow as default on this page)",
	"description"=>"
	 <b>Mp3:</b>&nbsp;&nbsp; http://www.yourdomain.com/wp-content/uploads/sample.mp3<br />
    ",
  ),


);


function create_meta_box(){
  if(function_exists('add_meta_box')){
    add_meta_box('new-meta-boxes', 'Custom Settings', 'portfolio_meta_boxes', 'portfolio', 'normal', 'high');
  }
}
function portfolio_meta_boxes(){
  global $post, $portfolio_meta_boxes;
  foreach($portfolio_meta_boxes as $meta_box){
    $meta_box_value=get_post_meta($post->ID, $meta_box['name'].'_value', true);
    if($meta_box_value=="")$meta_box_value=$meta_box['std'];

    echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce(plugin_basename(__FILE__)).'" />';
    echo'<h3>'.$meta_box['title'].'&nbsp;&nbsp;<span style="font-weight:normal !important;"><em>'.$meta_box['title_desc'].'</em></span>'.'</h3>';
    echo'<input type="text" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" style="width:100%;height:30px;"/><br />';
    echo'<p style="color: #21759B;"><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p><br /><br /><br />';
  }
}



function save_postdata($post_id){
  global $post, $portfolio_meta_boxes;
  foreach($portfolio_meta_boxes as $meta_box){
    if(!wp_verify_nonce($_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__))) return $post_id;
    if(!current_user_can('edit_post', $post_id)) return $post_id;
    
    $data=$_POST[$meta_box['name'].'_value'];
    if(get_post_meta($post_id, $meta_box['name'].'_value')=="") add_post_meta($post_id, $meta_box['name'].'_value', $data, true);
    elseif($data !=get_post_meta($post_id, $meta_box['name'].'_value', true)) update_post_meta($post_id, $meta_box['name'].'_value', $data);
    elseif($data=="") delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
  }
}