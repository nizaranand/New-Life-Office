<?php
require_once dirname(__FILE__)."/options.php";
load_theme_textdomain('teardrop', get_template_directory() . '/languages');
error_Reporting(E_ALL & ~E_NOTICE);


global $teardrop_theme;
$teardrop_theme = new teardrop_theme();

class teardrop_theme{
  var $title;
  var $name;
  var $icon;
  var $turl;
  var $options;

  function teardrop_theme(){
    $this->title=__('Teardrop Options','teardrop');
    $this->name=get_class($this);
    $this->icon="";
    $this->turl=get_bloginfo('template_url');

    $this->options = $this->get_options();
    if(!get_option($this->name)) $this->set_default_options();

    add_action('admin_menu', array(&$this, 'action_add_theme_admin'));
    add_action('wp_ajax_of_ajax_post_action', array(&$this, 'ajax_callback'));
    add_action('login_head', 'teardrop_custom_login_params');
  }


  function action_add_theme_admin(){
    $page=add_menu_page($this->title, $this->title, "edit_themes", $this->name, array(&$this, "admin_page_main"), $icon, 61);
    add_action("admin_print_styles-$page", array(&$this, "admin_styles"));
    foreach($this->options as $slug=>$v) if($slug!="main"){
      $title=isset($v['title']) ? $v['title'] : $slug;
      add_submenu_page($this->name, $title, $title, "edit_themes", $this->name."_".$slug, array(&$this, "admin_page_".$slug));
    }
  }
  function admin_page_main(){$page='main'; include('interface.php');}
  function admin_styles(){
    wp_enqueue_style('admin-style', $this->turl."/admin/css/style.css");
    wp_enqueue_style('color-picker', $this->turl."/admin/css/colorpicker.css");
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-input-mask', $this->turl.'/admin/js/jquery.maskedinput-1.2.2.js', array('jquery'));
    wp_enqueue_script('color-picker', $this->turl.'/admin/js/colorpicker.js', array('jquery'));
    wp_enqueue_script('ajaxupload', $this->turl.'/admin/js/ajaxupload.js', array('jquery'));
  }


  function get_options(){
    $options=theme_options_array();

    foreach($options as $page=>$pdata) if(is_array($pdata))
      foreach($pdata as $group=>$gdata) if(is_array($gdata))
        foreach($gdata as $section=>$sdata) if(is_array($sdata))
          foreach($sdata as $id=>$v) if(is_array($v))
            $options[$page][$group][$section][$id]['val']=get_option($this->name."_".$id, $v['std']);

    return $options;
  }
  
  function set_default_options(){
    update_option($this->name, $this->title);

    foreach($this->options as $page=>$pdata) if(is_array($pdata))
      foreach($pdata as $group=>$gdata) if(is_array($gdata))
        foreach($gdata as $section=>$sdata) if(is_array($sdata))
          foreach($sdata as $id=>$v) if(is_array($v))
            update_option($this->name."_".$id, $v['std']);
  }
  function validate_options($opts=null){
    if(!isset($opts)) $opts=$this->options;
    if(!is_plugin_active('piecemaker/piecemaker.php'))
      $opts['General'][3]['slider_type']['options']['piecemaker']=array('text'=>'Piecemaker (installed plugin needed)','disabled'=>true);
    return $opts;
  }

  function ajax_callback(){
    global $wpdb;

    switch($_POST['type']){
      case 'upload':
        $clickedID = $_POST['data'];
        $filename = $_FILES[$clickedID];
        $filename['name'] = preg_replace('/[^a-zA-Z0-9._\-]/', '', $filename['name']); 

        $override['test_form'] = false;
        $override['action'] = 'wp_handle_upload';
        $uploaded_file = wp_handle_upload($filename,$override);

        $upload_tracking[] = $clickedID;
        update_option($clickedID, $uploaded_file['url']);

        if(!empty($uploaded_file['error'])){
          echo 'Upload Error: '.$uploaded_file['error'];
        }else{
          echo $uploaded_file['url'];
        }
        break;

      case 'image_reset':
        $wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '".$_POST['data']."'");
        break;


      case 'reset':
        $this->set_default_options();
        break;


      case 'save':
        foreach(wp_parse_args($_POST['data']) as $id=>$v) update_option($id, $v);
        $this->options = $this->set_options();
        break;
    }
    die();
  }
}

function siteoptions_uploader_function($id,$std,$mod){
  $uploader = '';
  $upload = get_option($id);

  if($mod != 'min') { 
    $val = $std;
    if(get_option($id) != "") $val=get_option($id);
    $uploader .= '<input class="of-input" name="'.$id.'" id="'.$id.'_upload" type="text" value="'.$val.'" />';
  }

  $uploader .= '<div class="upload_button_div"><span class="button image_upload_button" id="'.$id.'">Upload Image</span>';

  if(!empty($upload)) {$hide = '';} else { $hide = 'hide';}

  $uploader .= '<span class="button image_reset_button '. $hide.'" id="reset_'. $id .'" title="' . $id . '">Remove</span>';
  $uploader .='</div>';
  $uploader .= '<div class="clear"></div>';
  if(!empty($upload)){
    $uploader .= '<a class="of-uploaded-image" href="'. $upload . '">';
    $uploader .= '<img class="of-option-image" id="image_'.$id.'" src="'.$upload.'" alt="" />';
    $uploader .= '</a>';
  }
  $uploader .= '<div class="clear"></div>';
  echo $uploader;
}

function teardrop_custom_login_params(){
  include(dirname(__FILE__)."/css/main.css.php");
}

?>
