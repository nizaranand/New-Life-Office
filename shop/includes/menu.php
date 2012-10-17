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
<script type="text/javascript">
<!--
function unhide(divID) {
  var item = document.getElementById(divID);
  if (item) {
    item.className=(item.className=='hidden')?'unhidden':'hidden';
  }
}
function rk_redirect(url) 
{ 
    window.location.href=url;
/// document.location.href=url;
} 
-->
</script>
<?php $root = HTTP_SERVER.DIR_WS_HTTP_CATALOG; ?>
<!-- Lightbox 2 Begin///-->
<script type="text/javascript" src="<?php echo $root; ?>includes/animation/js/prototype.js"></script>
<script type="text/javascript" src="<?php echo $root; ?>includes/animation/js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="<?php echo $root; ?>includes/animation/js/lightbox.js"></script>
<link rel="stylesheet" href="<?php echo $root; ?>includes/animation/css/lightbox.css" type="text/css" media="screen" />
<!-- Lightbox 2 End///-->
<!-- NGG Begin///-->
<link rel="stylesheet" href="<?php echo $root; ?>includes/animation/ngcss/ngg_shadow.css" type="text/css" media="screen" />
<script type='text/javascript' src='<?php echo $root; ?>includes/animation/js/swfobject.js?ver=2.1'></script>
<!-- NGG  End///-->