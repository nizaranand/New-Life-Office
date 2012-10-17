<?php
/*
Template Name: PayPal Cubicle
*/
?>

<?php
get_header(); 

$qn = $_GET['qn'];
$type = $_GET['type'];
$qubicles = $_GET['qubicles'];

/*
$qn = 2;
$type = "g";
$qubicles = "7x7";
*/

$pid = $_GET['pid'];


if($type=='s')
$type = 'Row';
else
$type = 'Group';


$img_name_p = $qubicles."-".$type."-".$qn."-Private.JPG"  ;
$img_name_o = $qubicles."-".$type."-".$qn."-Open.JPG"  ;

if(type=='Group')
$height = 180;

if(type=='Group')
$height = 163;

if($qn==4||$qn==8)
$width = 314;

if($qn==3||$qn==6)
$width = 257;

if($qn==2||$qn==4)
$width = 206;

if ($type == 'Group' && $qubicles == '6x6') {
	switch ($qn) {
		case 4:
			$openPrice = '$3,808';
			$openCube = '$952';
			$privPrice = '$4,652';
			$privCube = '$1,163';
			$openPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='2YEL73VANNXCL'>
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
			$privPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='32X4E5GBMHTNA'>
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
			break;
		case 6:
			$openPrice = '$5,634';
			$openCube ='$939';
			$privPrice = '$6,756';
			$privCube = '$1,126';
			$openPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='D8E6HASJKB6PC'>
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
			$privPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='2STG8T7JBV8KA'>
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
			break;
		case 8:
			$openPrice = '$7,192';
			$openCube = '$899';
			$privPrice = '$8,856';
			$privCube = '$1,107';
			$openPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='ZYT64C8CUYKDS'>
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
			$privPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='N45K3AG63RDEE'>
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
			break;
		default:
			// an unrecognized qn, set to 6 and proceed.
			$qn = 6;
			$openPrice = '$5,634';
			$openCube ='$939';
			$privPrice = '$6,756';
			$privCube = '$1,126';
			$openPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='D8E6HASJKB6PC'>
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
			$privPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='2STG8T7JBV8KA'>
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
			break;
	}
}
else if ($type == 'Row' && $qubicles == '6x6') {
	// type = row
	switch ($qn) {
		case 2:
			$openPrice = '$2,404';
			$openCube = '$1,202';
			$privPrice = '$2,684';
			$privCube = '$1,342';
			$openPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='5WCZS782ZHAS6'>
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
			$privPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='NCJWYNC3MCPUJ'>
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
			break;
		case 3:
			$openPrice = '$3,315';
			$openCube = '$1,105';
			$privPrice = '$3,879';
			$privCube = '$1,293';
			$openPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='4A6FNCYXQGVSW'>
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
			$privPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='N2EKWKH5TAQHW'>
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
			break;
		case 4:
			$openPrice = '$4,232';
			$openCube = '$1,058';
			$privPrice = '$5,068';
			$privCube = '$1,267';
			$openPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='SD6SNNTTJRMQG'>
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
			$privPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='X8PZB5WAGATJ4'>
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
			break;
		default:
			// an unrecognized qn, set to 4  and proceed.
			$qn = 4;
			$openPrice = '$4,232';
			$openCube = '$1,058';
			$privPrice = '$5,068';
			$privCube = '$1,267';
			$openPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='SD6SNNTTJRMQG'>
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
			$privPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='X8PZB5WAGATJ4'>
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
			break;
	}
}
else if ($type == 'Group' && $qubicles == '7x7') {
	switch ($qn) {
		case 4:
			$openPrice = '$3,924';
			$openCube = '$981';
			$privPrice = '$4,792';
			$privCube = '$1,198';
			$openPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='DWC5CS6EX9YL6'>
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
			$privPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='6VKNU9GCRUD9A'>
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
			break;
		case 6:
			$openPrice = '$5,808';
			$openCube ='$968';
			$privPrice = '$6,960';
			$privCube = '$1,160';
			$openPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='FYESJJDGGU9J6'>
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
			$privPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='APC9C5AKJ5WPY'>
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
			break;
		case 8:
			$openPrice = '$7,400';
			$openCube = '$925';
			$privPrice = '$9128';
			$privCube = '$1,141';
			$openPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='L9K5UJ23XEHUA'>
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
			$privPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='TDE337CUEKHE6'>
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
			break;
		default:
			// an unrecognized qn, set to 6 and proceed.
			$qn = 6;
			$openPrice = '$5,808';
			$openCube ='$968';
			$privPrice = '$6,960';
			$privCube = '$1,160';
			$openPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='FYESJJDGGU9J6'>
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
			$privPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='APC9C5AKJ5WPY'>
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
			break;
	}
}
else if ($type == 'Row' && $qubicles == '7x7') {
	// type = row
	switch ($qn) {
		case 2:
			$openPrice = '$2,478';
			$openCube = '$1,239';
			$privPrice = '$2,766';
			$privCube = '$1,383';
			$openPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='8KYYJCKC5K944'>
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
			$privPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='VWFGTG5H7M8VL'>
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
			break;
		case 3:
			$openPrice = '$3,417';
			$openCube = '$1,139';
			$privPrice = '$3,996';
			$privCube = '$1,332';
			$openPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='4P6KBDJLZSHKS'>
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
			$privPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='VMPXP8PUGEMT4'>
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
			break;
		case 4:
			$openPrice = '$4,306';
			$openCube = '$1,090';
			$privPrice = '$5,224';
			$privCube = '$1,306';
			$openPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='8ES4X28BTGQ4Q'>
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
			$privPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='S65VWBKCAE2CG'>
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
			break;
		default:
			// an unrecognized qn, set to 4  and proceed.
			$qn = 4;
			$openPrice = '$4,306';
			$openCube = '$1,090';
			$privPrice = '$5,224';
			$privCube = '$1,306';
			$openPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='8ES4X28BTGQ4Q'>
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
			$privPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='S65VWBKCAE2CG'>
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
			break;
	}
}
else if ($type == 'Group' && $qubicles == '8x8') {
	switch ($qn) {
		case 4:
			$openPrice = '$4,040';
			$openCube = '$1,010';
			$privPrice = '$4,932';
			$privCube = '$1,233';
			$openPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='GDVHRLN5PGWVG'>
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
			$privPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='CZLJ7HKL2FZU8'>
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
			break;
		case 6:
			$openPrice = '$5,982';
			$openCube ='$997';
			$privPrice = '$7,164';
			$privCube = '$1,194';
			$openPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='WFBKBFQSGKP7A'>
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
			$privPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='CXL4JRQ8J3562'>
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
			break;
		case 8:
			$openPrice = '$7,592';
			$openCube = '$949';
			$privPrice = '$9,392';
			$privCube = '$1,174';
			$openPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='M26N8K7VB5SA4'>
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
			$privPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='26UFK5YZ5475U'>
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
			break;
		default:
			// an unrecognized qn, set to 6 and proceed.
			$qn = 6;
			$openPrice = '$5,982';
			$openCube ='$997';
			$privPrice = '$7,164';
			$privCube = '$1,194';
			$openPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='WFBKBFQSGKP7A'>
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
			$privPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='CXL4JRQ8J3562'>
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
			break;
	}
}
else if ($type == Row && $qubicles == '8x8') {
	// type = row
	switch ($qn) {
		case 2:
			$openPrice = '$2,552';
			$openCube = '$1,276';
			$privPrice = '$2,848';
			$privCube = '$1,424';
			$openPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='EXS7T2M2YUB3S'>
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
			$privPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='8T2PMJ862GLDU'>
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
			break;
		case 3:
			$openPrice = '$3,519';
			$openCube = '$1,173';
			$privPrice = '$4,113';
			$privCube = '$1,371';
			$openPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='GKTF6MQ4S7EUN'>
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
			$privPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='A5F9MTR39WGPN'>
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
			break;
		case 4:
			$openPrice = '$4,488';
			$openCube = '$1,122';
			$privPrice = '$5,380';
			$privCube = '$1,345';
			$openPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='HCEHLNM25P468'>
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
			$privPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='ZMCDZEJXU3EG2'>
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
			break;
		default:
			// an unrecognized qn, set to 4  and proceed.
			$qn = 4;
			$openPrice = '$4,488';
			$openCube = '$1,122';
			$privPrice = '$5,380';
			$privCube = '$1,345';
			$openPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='HCEHLNM25P468'>
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
			$privPaypal = "
			<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
			<input type='hidden' name='cmd' value='_s-xclick'>
			<input type='hidden' name='hosted_button_id' value='ZMCDZEJXU3EG2'>
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
			break;
	}
}

?>

<?php
	
	global $wpdb;

   $querystr1 = "
    SELECT ID 
    FROM new_wp_posts 
    WHERE new_wp_posts.post_title = '$qubicles'
	AND new_wp_posts.post_type = 'page'  
    AND new_wp_posts.post_status = 'publish' "
	;

 	$pageid1 = $wpdb->get_results($querystr1, OBJECT);
	
	foreach($pageid1 as $id1)
	{
	$pid1 = $id1->ID;
	}
	
	$querystr2 = "
    SELECT ID 
    FROM new_wp_posts 
    WHERE new_wp_posts.post_title = 'Layout_$qubicles'
	AND new_wp_posts.post_type = 'page'  
    AND new_wp_posts.post_status = 'publish' ";

 	$pageid2 = $wpdb->get_results($querystr2, OBJECT);
	
	foreach($pageid2 as $id2)
	{
	$pid2 = $id2->ID;
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
<h2 class="cubeTitle"><?=$qubicles . " Office Cubicles - " . $type . " of " . $qn?></h2>
<a class="moreoptions" style="font-size:12px; " href="office-cubicles/">More Office Cubicle Options</a>
			<div id="Privacy_6x6">	
			<div class="s_maximumprivacy_b">
			<div class="s_maximumprivacy">
			<div style="width:100%;height:66px;padding:0;margin:0;background-color:#FFFFFF;">
			<h2 style="width:364px;float:left;height:56px;padding:10px 0 0 10px;margin:0;font-family:FranklinGothic Demi;font-size:23.63px;color:#d70000;">Maximum Privacy</h2>
			<h2 style="width:314px;float:left;height:27px;padding:15px 0 0 0;margin:0;font-family:FranklinGothic Demi;font-size:19.63px;color:#d70000;border-bottom:3px solid #000000;"><?php echo $qubicles;?>  Office Cubicle</h2>
			<h4 style="height:20px;width:314px;float:left;padding:0;margin:0;font-family:FranklinGothic Demi;font-size:19.63px;color:#999999;">65" H</h4>
			</div>			
			<img style="float:left;" width="429" height="302"
			src="<?php bloginfo('stylesheet_directory')?>/images/privacy/<?php echo $qubicles;?>/private/<?php echo $img_name_p ;?>"  />
			
			<div id="privacy_color">
			<ul style="">
			<li>Cost Per Cubicles:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $privCube; ?></li>
			</ul>
			<ul style="margin-bottom:30px;">
			<li style="color:#d70000;border-bottom:#000000 2px solid;">Total Cost <?php echo $qn; ?> cubicles:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-size:19.63px;"> <?php echo $privPrice; ?></strong></li>
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
			
			<!--		
			<ul style="margin-bottom:2px;width:63px;float:left;">
			<li style="width:43px;float:left;"><img width="43" height="41" src="<?php bloginfo('stylesheet_directory')?>/images/color_icon/black.gif"></li>			
			</ul>
			-->
			<ul style="width:146px;float:left;">
			<li>
			<div class="paypal">
			<?=$privPaypal?>
			</div>

			</li>
			</ul>
			<!-- 
			</ul>
			<ul style="width:90px;float:left;margin-top:-15px">
			<li style="width:90px;float:left;">Black Paint</li>			
			</ul>
			-->
			
			</div>
<!-- thickbox content with iframe pointing to Articulate Presenter demo -->

			<div id="Fabrics_n_Workserface" style="display:none;margin:0;padding:0;">
			<form action="https://ssl68.pair.com/new2life/shop/catalog/product_info.php?products_id=<?=$pid;?>" method="post" name="cart_quantity" style="margin:0;padding:0;">
			<input type="hidden" name="products_id" value="<?=$pid;?>" />
			<?php if($osCsid!=""){?>
			<input type="hidden" name="osCsid" value="<?=$osCsid;?>" />
			<? } ?>
			<input type="hidden" name="id[7]" value="20" />
			<h2 style="margin:20px 0 0 0;padding:0;font-family:MyriadPro; font-weight:normal;font-size:32.03px;">Select fabric and work surface.</h2>
				<ul style="list-style-image:none;list-style-type:none;width:162px;float:left;margin:22px 40px 0 0;padding:0 0 0 0;">
					<li style="font-family:MyriadPro; font-weight:bold;font-size:18.76px;color:#d70000;border-bottom:3px solid #d70000;margin-bottom:15px;padding-bottom:10px;width:117px;">  FABRICS	</li>
					<li id="Taupe_checkbox1" style="display:none;margin-top:5px;"><input type="radio" name="id[8]" value="22">  Check to Select</li>
					<li onclick="showcheck('Taupe_checkbox1');">
					<img width="162" height="162" src="<?php bloginfo('stylesheet_directory')?>/images/fabrics_n_serface/taupe.jpg">
					<li style="font-family:MyriadPro; font-weight:normal;font-size:20.03px;color:#222222;">Taupe</li>
					</li>
					<li id="Camel_checkbox1" style="display:none;margin-top:5px;"><input type="radio" name="id[8]" value="23">  Check to Select</li>
					<li onclick="showcheck('Camel_checkbox1');">
					<img width="162" height="162" src="<?php bloginfo('stylesheet_directory')?>/images/fabrics_n_serface/camel.jpg">
					<li style="font-family:MyriadPro; font-weight:normal;font-size:20.03px;color:#222222;">Camel</li>
					</li>
					<li id="Sage_checkbox1" style="display:none;margin-top:5px;"><input type="radio" name="id[8]" value="24">  Check to Select</li>
					<li onclick="showcheck('Sage_checkbox1');">
					<img width="162" height="162" src="<?php bloginfo('stylesheet_directory')?>/images/fabrics_n_serface/sage.jpg">
					<li style="font-family:MyriadPro; font-weight:normal;font-size:20.03px;color:#222222;">Sage</li>
					</li>
					
					<li id="Silver_checkbox1" style="display:none;margin-top:5px;"><input type="radio" name="id[8]" value="26">  Check to Select</li>
					<li onclick="showcheck('Silver_checkbox1');">
					<img width="162" height="162" src="<?php bloginfo('stylesheet_directory')?>/images/fabrics_n_serface/silver.jpg">
					<li style="font-family:MyriadPro; font-weight:normal;font-size:20.03px;color:#222222;">Silver</li>
					</li>															
				</ul>
				<ul style="list-style-image:none;list-style-type:none;width:170px;float:left;margin:22px 40px 50px 0;padding:0 0 0 0;">
					<li style="font-family:MyriadPro; font-weight:bold;font-size:18.76px;color:#d70000;border-bottom:3px solid #d70000;margin-bottom:15px;padding-bottom:10px;width:117px;">
					TRIM
					</li>
					<li id="Black_checkbox1" style="display:none;margin-top:5px;"><input type="radio" name="id[9]" value="27">  Check to Select</li>
					<li onclick="showcheck('Black_checkbox1');" style="font-family:MyriadPro; font-weight:normal;font-size:20.03px;color:#222222;">
					<img width="170" height="357" src="<?php bloginfo('stylesheet_directory')?>/images/fabrics_n_serface/black.jpg">
					<li style="font-family:MyriadPro; font-weight:normal;font-size:20.03px;color:#222222;">Black Paint</li>
					</li>
				</ul>
				<ul style="list-style-image:none;list-style-type:none;width:169px;float:left;margin:22px 0 0 0;padding:0;">
					<li style="font-family:MyriadPro; font-weight:bold;font-size:18.76px;color:#d70000;border-bottom:3px solid #d70000;margin-bottom:15px;padding-bottom:10px;width:179px;">
					WORK SURFACES
					</li>
					<li id="Cherry_checkbox1" style="display:none;margin-top:5px;"><input type="radio" name="id[10]" value="28">  Check to Select </li>
					<li onclick="showcheck('Cherry_checkbox1');">
					<img width="169" height="167" src="<?php bloginfo('stylesheet_directory')?>/images/fabrics_n_serface/cherry.jpg">
					<li  style="font-family:MyriadPro; font-weight:normal;font-size:20.03px;color:#222222;">Cherry</li>
					</li>
					<li id="Mapple_checkbox1" style="display:none;margin-top:5px;"><input type="radio" name="id[10]" value="29">  Check to Select</li>
					<li onclick="showcheck('Mapple_checkbox1');">
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
			
			
			<div id="Fabrics_n_Workserface_Open_Layout" style="display:none;margin:0;padding:0;">
			<form action="https://ssl68.pair.com/new2life/shop/catalog/product_info.php?products_id=<?=$pid;?>" name="cart_quantity" method="post" style="margin:0;padding:0;">
			<input type="hidden" name="products_id" value="<?=$pid;?>" />
			<?php if($osCsid!=""){?>
			<input type="hidden" name="osCsid" value="<?=$osCsid;?>" />
			<? } ?>
			<input type="hidden" name="id[7]" value="21" />
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
			
			<div class="s_openlayout_b">
			<div class="s_openlayout">
			<div style="width:100%;height:66px;padding:0;margin:0;background-color:#FFFFFF;">
			<h2 style="width:364px;float:left;height:56px;padding:10px 0 0 10px;margin:0;font-family:FranklinGothic Demi;font-size:23.63px;color:#d70000;">Open Layout</h2>
			<h2 style="width:314px;float:left;height:27px;padding:15px 0 0 0;margin:0;font-family:FranklinGothic Demi;font-size:19.63px;color:#d70000;border-bottom:3px solid #000000;"><?php echo $qubicles;?>  Office Cubicle</h2>
			<h4 style="height:20px;width:314px;float:left;padding:0;margin:0;font-family:FranklinGothic Demi;font-size:19.63px;color:#999999;">65" H</h4>
			</div>
			<img style="float:left;" width="429" height="302" src="<?php bloginfo('stylesheet_directory')?>/images/privacy/<?php echo $qubicles;?>/open/<?php echo $img_name_o;?>">
			
			<div id="privacy_color">
			<ul style="">
			<li>Cost Per Cubicles:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $openCube; ?></li>
			</ul>
			<ul style="margin-bottom:30px;">
			<li style="color:#d70000;border-bottom:#000000 2px solid;">Total Cost <?php echo $qn; ?> cubicles:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-size:19.63px;"> <?php echo $openPrice; ?></strong></li>
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
			<?=$openPaypal?>
			</div>
			</li>
			</ul>
			</div>
			
			</div>
			</div>
												
			</div>				
								
		
	</div>
	</div>
<?php get_footer(); ?>
