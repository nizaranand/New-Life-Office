<?php
  $logo = get_option('teardrop_theme_logo_admin');
  if(empty($logo)) $logo=get_bloginfo("template_url")."/i/logo.png";
?>

<style type='text/css'>
  h1 a{background-image:url(<?php echo $logo?>) !important;}
</style>