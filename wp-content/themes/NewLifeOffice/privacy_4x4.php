<?php
/*
Template Name: Privacy_4x4
*/
?>

<?php
get_header(); 

$qn = $_GET['qn'];
$type = $_GET['type'];
$qubicles = $_GET['qubicles'];
$img_name =  $qubicles.'-'.$type.'-'.$qn.'.jpg ' ;

$pid = $_GET['pid'];

if(type=='Group')
$height = 180;

if(type=='Raw')
$height = 163;

if($qn==4||$qn==8)
$width = 314;

if($qn==3||$qn==6)
$width = 257;

if($qn==2||$qn==4)
$width = 206;

if ($qn == 8) {
	$cubeCost = '$345';
	$totalCost = '$2,760';
	$paypal = "
	<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
	<input type='hidden' name='cmd' value='_s-xclick'>
	<input type='hidden' name='hosted_button_id' value='UDRAMXMPVSQZW'>
	<table>
	<tr><td><input type='hidden' name='on0' value='Fabric Color'>Fabric Color</td></tr><tr><td><select name='os0'>
		<option value='--Select--'>--Select-- </option>
		<option value='Taupe'>Taupe </option>
		<option value='Camel'>Camel </option>
		<option value='Sage'>Sage </option>
		<option value='Silver'>Silver </option>
	</select> </td></tr>
	<tr><td><input type='hidden' name='on1' value='Worksurface'>Worksurface</td></tr><tr><td><select name='os1'>
		<option value='--Select--'>--Select-- </option>
		<option value='Cherry'>Cherry </option>
		<option value='Maple'>Maple </option>
	</select> </td></tr>
	</table>
	<input type='image' src='https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'>
	<img alt='' border='0' src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' width='1' height='1'>
	</form>
	";
}
else if ($qn == 4) {
	$cubeCost = '$438';
	$totalCost = '$1,752';
	$paypal = "
	<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
	<input type='hidden' name='cmd' value='_s-xclick'>
	<input type='hidden' name='hosted_button_id' value='KPXEWXYLBHNLY'>
	<table>
	<tr><td><input type='hidden' name='on0' value='Fabric Color'>Fabric Color</td></tr><tr><td><select name='os0'>
		<option value='--Select--'>--Select-- </option>
		<option value='Taupe'>Taupe </option>
		<option value='Camel'>Camel </option>
		<option value='Sage'>Sage </option>
		<option value='Silver'>Silver </option>
	</select> </td></tr>
	<tr><td><input type='hidden' name='on1' value='Worksurface'>Worksurface</td></tr><tr><td><select name='os1'>
		<option value='--Select--'>--Select-- </option>
		<option value='Cherry'>Cherry </option>
		<option value='Maple'>Maple </option>
	</select> </td></tr>
	</table>
	<input type='image' src='https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'>
	<img alt='' border='0' src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' width='1' height='1'>
	</form>
	";
}
else {
	// unknown qn, set to 4 and proceed
	$qn = 4;
	$cubeCost = '$438';
	$totalCost = '$1,752';
	$paypal = "
	<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
	<input type='hidden' name='cmd' value='_s-xclick'>
	<input type='hidden' name='hosted_button_id' value='KPXEWXYLBHNLY'>
	<table>
	<tr><td><input type='hidden' name='on0' value='Fabric Color'>Fabric Color</td></tr><tr><td><select name='os0'>
		<option value='--Select--'>--Select-- </option>
		<option value='Taupe'>Taupe </option>
		<option value='Camel'>Camel </option>
		<option value='Sage'>Sage </option>
		<option value='Silver'>Silver </option>
	</select> </td></tr>
	<tr><td><input type='hidden' name='on1' value='Worksurface'>Worksurface</td></tr><tr><td><select name='os1'>
		<option value='--Select--'>--Select-- </option>
		<option value='Cherry'>Cherry </option>
		<option value='Maple'>Maple </option>
	</select> </td></tr>
	</table>
	<input type='image' src='https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'>
	<img alt='' border='0' src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' width='1' height='1'>
	</form>
	";
}


?>
<div id="page_b">
<div id="page_2b">
<div id="content" class="hometopcontent">
<?php include (TEMPLATEPATH . '/page_nav.php'); ?>
</div>
<p class="call">
Questions about a custom order? <br />
Call us at the number above. We're here to help.</p>
<h2 class="cubeTitle"><?echo "4' Call Stations - " . $type . " of " . $qn?></h2>
<a class="moreoptions" style="font-size:12px; " href="http://www.newlifeoffice.com/office-cubicles/">More Office Cubicle Options</a>

			<div id="Privacy_6x6">	
			<div class="s_maximumprivacy_b">
			<div class="s_maximumprivacy">
			<div style="width:100%;height:66px;padding:0;margin:0;background-color:#FFFFFF;">
			<h2 style="width:364px;float:left;height:56px;padding:10px 0 0 10px;margin:0;font-family:FranklinGothic Demi;font-size:23.63px;color:#d70000;">Privacy 4x4</h2>
			<h2 style="width:314px;float:left;height:27px;padding:15px 0 0 0;margin:0;font-family:FranklinGothic Demi;font-size:19.63px;color:#d70000;border-bottom:3px solid #000000;"><?php echo $qubicles;?>  Office Cubicle</h2>
			<h4 style="height:20px;width:314px;float:left;padding:0;margin:0;font-family:FranklinGothic Demi;font-size:19.63px;color:#999999;">65" H</h4>
			</div>			
			<img style="float:left;" width="429" height="302"
			src="<?php bloginfo('stylesheet_directory')?>/images/privacy/4x4/<?php echo $img_name;?>"  />
			
			<div id="privacy_color">
			<ul style="">
			<li>Cost Per Cubicles:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $cubeCost; ?></li>
			</ul>
			<ul style="margin-bottom:30px;">
			<li style="color:#d70000;border-bottom:#000000 2px solid;">Total Cost <?php echo $qn; ?> cubicles:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-size:19.63px;"> <?php echo $totalCost; ?></strong></li>
			</ul>
			<ul style="margin-bottom:2px;">
			<li style="width:43px;float:left;"><img width="43" height="41" src="<?php bloginfo('stylesheet_directory')?>/images/color_icon/taupe.gif"></li>
			<li style="width:43px;float:left;"><img width="43" height="41" src="<?php bloginfo('stylesheet_directory')?>/images/color_icon/camel.gif"></li>
			<li style="width:43px;float:left;"><img width="43" height="41" src="<?php bloginfo('stylesheet_directory')?>/images/color_icon/sage.gif"></li>
			<li style="width:43px;float:left;"><img width="43" height="41" src="<?php bloginfo('stylesheet_directory')?>/images/color_icon/silver.gif"></li>
			</ul>
			<ul style="margin-bottom:2px;">
			<li style="width:43px;float:left;">Taupe</li>
			<li style="width:43px;float:left;">Camel</li>
			<li style="width:43px;float:left;">Sage</li>
			<li style="width:43px;float:left;">Silver</li>
			</ul>
			<ul style="margin-bottom:2px;">
			<li style="width:43px;float:left;"><img width="43" height="41" src="<?php bloginfo('stylesheet_directory')?>/images/color_icon/cherry.gif"></li>
			<li style="width:43px;float:left;"><img width="43" height="41" src="<?php bloginfo('stylesheet_directory')?>/images/color_icon/maple.gif"></li>
			</ul>
			
						
			<ul style="margin-bottom:2px;">
			<li style="width:43px;float:left;">Cherry</li>
			<li style="width:43px;float:left;">Maple</li>
			</ul>
			
			<ul>
			<li>
			<div class="paypal">
			<?echo $paypal?>
			</div>
			</li>
			</ul>
			
			
			</div>
<!-- thickbox content with iframe pointing to Articulate Presenter demo -->

			<div id="Fabrics_n_Workserface" style="display:none;margin:0;padding:0;">
			<form action="https://ssl68.pair.com/new2life/shop/catalog/product_info.php?products_id=<?=$pid;?>" method="post" name="cart_quantity" style="margin:0;padding:0;">
			<input type="hidden" name="products_id" value="<?=$pid;?>" />
			<?php if($osCsid!=""){?>
			<input type="hidden" name="osCsid" value="<?=$osCsid;?>" />
			<? } ?>
			<?php /*?><input type="hidden" name="id[7]" value="20" /><?php */?>
			<h2 style="margin:20px 0 0 0;padding:0;font-family:MyriadPro; font-weight:normal;font-size:32.03px;">Select fabric and work surface.</h2>
				<ul style="list-style-image:none;list-style-type:none;width:162px;float:left;margin:22px 40px 0 0;padding:0 0 0 0;">
					<li style="font-family:MyriadPro; font-weight:bold;font-size:18.76px;color:#d70000;border-bottom:3px solid #d70000;margin-bottom:15px;padding-bottom:10px;width:117px;">  FABRICS	</li>
					<li id="Taupe_checkbox" style="display:none;margin-top:5px;"><input type="radio" name="id[8]" value="22">  Check to Select</li>
					<li onclick="showcheck('Taupe_checkbox');">
					<img width="162" height="162" src="<?php bloginfo('stylesheet_directory')?>/images/fabrics_n_serface/taupe.jpg">
					<li style="font-family:MyriadPro; font-weight:normal;font-size:20.03px;color:#222222;">Taupe</li>
					</li>
					<li id="Camel_checkbox" style="display:none;margin-top:5px;"><input type="radio" name="id[8]" value="23">  Check to Select</li>
					<li onclick="showcheck('Camel_checkbox');">
					<img width="162" height="162" src="<?php bloginfo('stylesheet_directory')?>/images/fabrics_n_serface/camel.jpg">
					<li style="font-family:MyriadPro; font-weight:normal;font-size:20.03px;color:#222222;">Camel</li>
					</li>
					<li id="Sage_checkbox" style="display:none;margin-top:5px;"><input type="radio" name="id[8]" value="24">  Check to Select</li>
					<li onclick="showcheck('Sage_checkbox');">
					<img width="162" height="162" src="<?php bloginfo('stylesheet_directory')?>/images/fabrics_n_serface/sage.jpg">
					<li style="font-family:MyriadPro; font-weight:normal;font-size:20.03px;color:#222222;">Sage</li>
					</li>
					
					<li id="Silver_checkbox" style="display:none;margin-top:5px;"><input type="radio" name="id[8]" value="26">  Check to Select</li>
					<li onclick="showcheck('Silver_checkbox');">
					<img width="162" height="162" src="<?php bloginfo('stylesheet_directory')?>/images/fabrics_n_serface/silver.jpg">
					<li style="font-family:MyriadPro; font-weight:normal;font-size:20.03px;color:#222222;">Silver</li>
					</li>															
				</ul>
				<ul style="list-style-image:none;list-style-type:none;width:170px;float:left;margin:22px 40px 50px 0;padding:0 0 0 0;">
					<li style="font-family:MyriadPro; font-weight:bold;font-size:18.76px;color:#d70000;border-bottom:3px solid #d70000;margin-bottom:15px;padding-bottom:10px;width:117px;">
					TRIM
					</li>
					<li id="Black_checkbox" style="display:none;margin-top:5px;"><input type="radio" name="id[9]" value="27">  Check to Select</li>
					<li onclick="showcheck('Black_checkbox');" style="font-family:MyriadPro; font-weight:normal;font-size:20.03px;color:#222222;">
					<img width="170" height="357" src="<?php bloginfo('stylesheet_directory')?>/images/fabrics_n_serface/black.jpg">
					<li style="font-family:MyriadPro; font-weight:normal;font-size:20.03px;color:#222222;">Black Paint</li>
					</li>
				</ul>
				<ul style="list-style-image:none;list-style-type:none;width:169px;float:left;margin:22px 0 0 0;padding:0;">
					<li style="font-family:MyriadPro; font-weight:bold;font-size:18.76px;color:#d70000;border-bottom:3px solid #d70000;margin-bottom:15px;padding-bottom:10px;width:179px;">
					WORK SURFACES
					</li>
					<li id="Cherry_checkbox" style="display:none;margin-top:5px;"><input type="radio" name="id[10]" value="28">  Check to Select </li>
					<li onclick="showcheck('Cherry_checkbox');">
					<img width="169" height="167" src="<?php bloginfo('stylesheet_directory')?>/images/fabrics_n_serface/cherry.jpg">
					<li  style="font-family:MyriadPro; font-weight:normal;font-size:20.03px;color:#222222;">Cherry</li>
					</li>
					<li id="Mapple_checkbox" style="display:none;margin-top:5px;"><input type="radio" name="id[10]" value="29">  Check to Select</li>
					<li onclick="showcheck('Mapple_checkbox');">
					<img width="169" height="167" src="<?php bloginfo('stylesheet_directory')?>/images/fabrics_n_serface/maple.jpg">
					<li style="font-family:MyriadPro; font-weight:normal;font-size:20.03px;color:#222222;">Maple</li>
					</li>
				</ul>
				
				<ul style="padding:0;margin:20px 0 0 20px;list-style-image:none;list-style-type:none;">
				<li><input type="image" src="<?php bloginfo('stylesheet_directory')?>/images/addtocart.gif" value=""  /></li>
				<li><a href=""><img src="<?php bloginfo('stylesheet_directory')?>/images/continue_shopping.gif"  /></a></li>
				</ul> 
			<!--<div>
			<p>This is inside thick box</p>
			</div>-->
			<!--<center><input type="submit" value="&nbsp;&nbsp;Close&nbsp;&nbsp;" onClick="tb_remove()" /></center>-->
			</form>
			</div>
<!-- end thickbox content -->
												
			</div>
			</div>
			
			</div>				
								
		
	</div>
	</div>
<?php get_footer(); ?>