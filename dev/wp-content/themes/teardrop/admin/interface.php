<?php
  include('js/main.js.php');
  if(!isset($page)) $page='main';
  $options=$this->validate_options($this->options[$page]);
  $turl=get_bloginfo('template_url');
?>

<script type="text/javascript" src="<?php echo $this->turl?>/admin/js/main.js"></script>

<div id="of_container" class="wrap">
  <div class="of-save-popup" id="of-popup-save"><div class="of-save-save">Options Updated</div></div>
  <div class="of-save-popup" id="of-popup-reset"><div class="of-save-reset">Options Reset</div></div>

  <form id="ofform" enctype="multipart/form-data" action="" method="post">
    <div id="header">
      <div class="logo"><h2><?php echo $options['title']?></h2></div><div class="icon-option"> </div>
      <div class="clear">&nbsp;</div>
    </div>

    <div id="main">
      <div id="of-nav"><ul>
        <?php $first=true;foreach($options as $group=>$data) if($group != "title"){?>
        <li <?php if($first){echo 'class="first"';$first=false;}?>>
          <a href="#<?php echo $group?>" title="<?php echo $group?>">
            <?php echo $group?>
          </a>
        </li>
        <?php }?>
      </ul><div class="clear">&nbsp;</div></div>

      <div id="content">
        <?php foreach($options as $group=>$gdata) if($group != "title"){?>
        <div id="<?php echo $group?>" class="group" style="display: block;">
          <h2><?php echo $group?></h2>

          <?php foreach($gdata as $section=>$sdata){?>
          <div class="section <?php echo $sdata['options']['class']?>">
            <h3 class="heading"><?php echo $sdata['options']['title']?></h3>

            <?php foreach($sdata as $id=>$v) if($id != 'options'){?>
              <div class="option"><div class="controls">
              <?php $id=$this->name."_".$id;
              switch($v['type']){
                case 'text':?>
                  <input type="text" class="regular-text" id="<?php echo $id?>" name="<?php echo $id?>" value="<?php echo stripslashes($v['val'])?>">
                  <?php break;
                case 'textarea':?>
                  <textarea name="<?php echo $id?>" type="<?php echo $v['type']?>" cols="" rows=""><?php echo esc_html(stripslashes($v['val']))?></textarea>
                  <?php break;
                case 'select':?>
                  <select name="<?php echo $id?>" id="<?php echo $id?>">
                    <?php foreach($v['options'] as $value=>$text){
                      if(is_array($text)){$select_opts=$text;$text=$select_opts['text'];}?>
                      <option
                        value="<?php echo $value?>"
                        <?php if($value==$v['val']) echo 'selected="selected"'?>>
                        <?php echo $text?>
                      </option>
                    <?php }?>
                  </select>
                  <?php break;
                case "checkbox":?>
                  <label for="<?php echo $id?>">
                    <input type="checkbox" name="<?php echo $id?>" id="<?php echo $id?>" <?php if($v['val']=='true') echo 'checked="checked"'?>><?php echo $v['name']?>
                  </label>
                  <?php
                  break;
                case "image":?>
                  <?php siteoptions_uploader_function($id,$v['std'],null)?>
                  <?php break;
                case "color":?>
                  <div id="<?php echo $id?>" class="color_picker"><input type="text" id="<?php echo $id?>" name="<?php echo $id?>" value="<?php echo $v['val']?>"> <div class="preview"></div></div>
                  <?php break;
              }?>
              </div><div class="explain"><?php echo $v['desc']; ?></div><div class="clear">&nbsp;</div></div>
            <?php }?>
            <div class="clear">&nbsp;</div>
          </div>
          <?php }?>
          <div class="clear">&nbsp;</div>
        </div>
        <?php }?>
      <div class="clear">&nbsp;</div>
      </div>
    <div class="clear">&nbsp;</div>
    </div>

    <div class="save_bar_top">
      <input type="hidden" name="type" value="save">
      <img alt="Saving..." class="ajax-loading-img ajax-loading-img-bottom" src="<?php echo $this->turl?>/admin/i/loading.gif" style="display:none">
      <input type="submit" class="button-primary" value="Save All Changes">
    </div>
  </form>
  <form id="ofform-reset" method="post" action="">
    <span class="submit-footer-reset">
      <input type="hidden" name="type" value="reset">
      <input type="submit" onclick="return confirm('CAUTION: Any and all settings will be lost! Click OK to reset.');" class="button submit-button reset-button" value="Reset All Options" name="reset">
    </span>
  </form>
  <div class="clear">&nbsp;</div>
</div>