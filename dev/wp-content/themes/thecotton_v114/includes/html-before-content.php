<?php
global $pex_page,$slider_data;
if(isset($pex_page->intro) && $pex_page->intro){?>
<div id="intro">
<h1><?php echo $pex_page->intro; ?></h1>
<div class="double-line"></div>
</div>

<?php }
if(isset($pex_page->slider) && $pex_page->slider!='none' && $pex_page->slider!=''){
	if($pex_page->slider=='static'){
		//this is static image
		include(TEMPLATEPATH . '/includes/static-header.php');
	}else{
		//this is a slider
		$slider_data=pexeto_get_slider_data($pex_page->slider);
		include(TEMPLATEPATH . '/includes/'.$slider_data['filename']);
	}
}elseif(isset($pex_page->subtitle)&&$pex_page->subtitle){
	//no slider/header has been selected
	?>

<div id="page-title">
<h1><?php echo($pex_page->subtitle); ?></h1>
<div class="double-line"></div>
</div>

<?php } ?>
<div class="clear"></div>
</div>


<?php
//set the layout variables

$layoutclass='layout-'.$pex_page->layout;

$content_id='content';
if($pex_page->layout=='full'){
	$content_id='full-width';
}elseif($pex_page->layout=='none'){
	//for portfolio and other page templates when no additional stylings are needed for the div
	$content_id='pex-container';
}
?>

<div id="content-container" class="<?php echo $layoutclass; ?>">
<div id="<?php echo $content_id; ?>">