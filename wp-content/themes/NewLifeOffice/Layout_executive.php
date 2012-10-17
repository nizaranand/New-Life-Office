<?php
/*
Template Name: Layout_executive
*/
?>

<?php
get_header(); 

?>
<div id="page_b">
<div id="page_2b">
<div id="content" class="hometopcontent">
<?php include (TEMPLATEPATH . '/page_nav.php'); ?>
</div>
<div id="order_process">
<div id="Table_01_order2">
	<div id="order-process2-01_">
		<img id="order_process2_01" src="<?php bloginfo('stylesheet_directory');?>/images/order_process2_01.jpg" width="262" height="22" alt="" />
	</div>
	<div id="order-process2-02_">
	<a href="<?php echo get_permalink(31);?>">
		<img id="order_process2_02" src="<?php bloginfo('stylesheet_directory');?>/images/order_process2_02.jpg" width="42" height="28" alt="" />
		</a>
	</div>
	<div id="order-process2-03_">
		<a href="">
			<img id="order_process2_03" src="<?php bloginfo('stylesheet_directory');?>/images/order_process2_03.jpg" width="52" height="28" border="0" alt="" /></a>
	</div>
	<div id="order-process2-04_">
		<img id="order_process2_04" src="<?php bloginfo('stylesheet_directory');?>/images/order_process2_04.jpg" width="88" height="28" alt="" />
	</div>
	<div id="order-process2-05_">
		<img id="order_process2_05" src="<?php bloginfo('stylesheet_directory');?>/images/order_process2_05.jpg" width="37" height="28" alt="" />
	</div>
	<div id="order-process2-06_">
		<img id="order_process2_06" src="<?php bloginfo('stylesheet_directory');?>/images/order_process2_06.jpg" width="43" height="28" alt="" />
	</div>
	<div id="order-process2-07_">
		<img id="order_process2_07" src="<?php bloginfo('stylesheet_directory');?>/images/order_process2_07.jpg" width="262" height="11" alt="" />
	</div>
</div>
</div>

			<div id="Layout">
			<div id="top" style="width:875px;text-align:center;"><p style="text-align:center;font-family:FranklinGothic Demi;
font-size:16px;color:#000000;padding:10px 0 0 0;margin:0;">Choose a layout - Mouseover to see the 3D photo</p></div>		
			
			
			<div class="openlayout_b">
			<div class="openlayout">
			<a class="executive_left" href="<?php echo get_permalink(79);?>?type=left&qubicles=executive&pid=34&position=30&osCsid=<?=$osCsid;?>"></a>
			<a class="executive_right" href="<?php echo get_permalink(79);?>?type=right&qubicles=executive&pid=34&position=31&osCsid=<?=$osCsid;?>"></a>
			</div>
			</div>
												
			</div>				
								
		
	</div>
	</div>
<?php get_footer(); ?>
