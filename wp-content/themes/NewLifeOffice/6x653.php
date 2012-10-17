<?php
/*
Template Name: 6x653
*/
?>

<?php
get_header(); ?>
<div id="page_b">
<div id="page_2b">
<div id="content" class="hometopcontent">
<?php include (TEMPLATEPATH . '/page_nav.php'); ?>
</div>
<div id="order_process">
<div id="Table_01_order1">
	<div id="order-process1-01_">
		
	</div>
	<div id="order-process1-02_">
		<a href="">
			<img id="order_process1_02" src="<?php bloginfo('stylesheet_directory');?>/images/order_process1_02.jpg" width="47" height="28" border="0" alt="" /></a>
	</div>
	<div id="order-process1-03_">
		
			<img id="order_process1_03" src="<?php bloginfo('stylesheet_directory');?>/images/order_process1_03.jpg" width="49" height="28" border="0" alt="" />
	</div>
	<div id="order-process1-04_">
		
			<img id="order_process1_04" src="<?php bloginfo('stylesheet_directory');?>/images/order_process1_04.jpg" width="85" height="28" border="0" alt="" />
	</div>
	<div id="order-process1-05_">
		
			<img id="order_process1_05" src="<?php bloginfo('stylesheet_directory');?>/images/order_process1_05.jpg" width="39" height="28" border="0" alt="" />
	</div>
	<div id="order-process1-06_">
		<img id="order_process1_06" src="<?php bloginfo('stylesheet_directory');?>/images/order_process1_06.jpg" width="42" height="28" alt="" />
	</div>
	<div id="order-process1-07_">
		
	</div>
</div>
</div>
	
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			
				<?php 
						$string=$post->post_content;
						$string = apply_filters('the_content', $string);
						$string = str_replace(']]>', ']]&gt;', $string);
						
						define("IMAGE_FILETYPE", "(bmp|gif|jpeg|jpg|png)", true);
						$p = '/(http:([^"]*.)'.IMAGE_FILETYPE.')/';
						$p2 = '/(<img(.*?)>)/ie';
						preg_match($p,$string,$matches);
						$thumb=$matches[0];						
					?>
			<div id="page6x6">
			<h2>6x6  Office Cubicle - 53" H</h2>		
			

				<div class="entry">
					
					<p>
					<?php echo preg_replace($p2,'',$string); ?>
					</p>
				</div>
			<div id="color">
				<ul>
					<li style="width:208px;">Fabrics:</li>
					<li style="width:115px;">Work Surfaces:</li>
					<li>Trim:</li>
				</ul>
				<ul style="margin:0;">
					<li><img src="<?php bloginfo('stylesheet_directory')?>/images/color_icon/taupe.gif"></li>
					<li><img src="<?php bloginfo('stylesheet_directory')?>/images/color_icon/camel.gif"></li>
					<li><img src="<?php bloginfo('stylesheet_directory')?>/images/color_icon/sage.gif"></li>
					<li style="margin-right:36px;"><img src="<?php bloginfo('stylesheet_directory')?>/images/color_icon/silver.gif"></li>
					<li><img src="<?php bloginfo('stylesheet_directory')?>/images/color_icon/cherry.gif"></li>
					<li style="margin-right:33px;"><img src="<?php bloginfo('stylesheet_directory')?>/images/color_icon/maple.gif"></li>
					<li><img src="<?php bloginfo('stylesheet_directory')?>/images/color_icon/black.gif"></li>										
				</ul>
				<ul>
					<li style="width:40px;font-family:Myriadpro Regular;">Taupe</li>
					<li style="width:40px;font-family:Myriadpro Regular;">Camel</li>
					<li style="width:40px;font-family:Myriadpro Regular;">Sage</li>
					<li style="width:40px;margin-right:36px;font-family:Myriadpro Regular;">Silver</li>
					<li style="width:45px;font-family:Myriadpro Regular;">Cherry</li>
					<li style="width:45px;margin-right:24px;font-family:Myriadpro Regular;">Maple</li>
					<li style="width:64px;font-family:Myriadpro Regular;">Black Paint</li>										
				</ul>								
			</div>									
			</div>
			
			

		<?php endwhile; endif; ?>


	<div id="p_price6x6">
				 <ul>
					<li style="font-family:Arial;font-weight:bold;font-size:12px;">The competitors</li>
					<li style="font-family:FranklinGothic Demi;font-size:19.63px;color:#111111;text-decoration:line-through;">$1399</li>
				 </ul>
				 <ul>
					<li style="font-family:Arial;font-weight:bold;font-size:12px;">Our Price</li>
					<li style="font-family:FranklinGothic Demi;font-size:24.85px;color:#d70000;">$793</li>
				 </ul>
		<ul style="font-family:FranklinGothic Demi;font-size:19.63px;color:#d70000;width:152px;text-align:right;padding-top:10px;">
					<a style="color:#d70000" href="">FREE SHIPPING</a>
				 </ul>
		
				</div>
				<div id="choose_layout">
				<a href="<?php echo get_permalink(163) ?>?osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Choose a Layout &gt;</a>
				</div>
				
				
				<div id="Feature">
				<div id="Featureimage">
				<img src="<?php bloginfo('stylesheet_directory')?>/images/big_cubicles/6x6.jpg"  />
				</div>
				</div>
				<div id="Feature_x_b">
				<div id="Feature_x_6x653">
				<div id="benefits">
				
				<p style="height:57px;padding-right:30px;color:#d70000;">53" High Steelcase Acoustic Panels 
with choice of 4 fabric colors</p>
				<p style="height:55px;padding-right:30px;">24" Deep Laminate Workspaces
in Cherry or Maple Finishes</p>
				<p style="height:38px;color:#d70000;">Locking File Pedestal</p>
				<p style="height:38px;">4 Duplex Receptacles Per Workstation Power</p>
				
				</div>
				</div>
				</div>
				
				<div id="plan_n_veiw">
				<div id="plan_image">
				<img src="<?php bloginfo('stylesheet_directory')?>/images/planview/6x653/6x6_plan.jpg"  />
				<p><b><u>PLAN VIEW</u></b></p>
				</div>
				<div id="quickshipoption">
				<ul>
				<li class="qtitle1"><strong>QUICK SHIP</strong> FEATURES</li>
				</ul>
				<div id="subquickship1">
				<li style="border:none;cursor:default;">Shipped within 10 working days</li>
				<li style="border:none;cursor:default;">6 workstation designs available</li>
				<li style="border:none;cursor:default;">Choice of 4 fabrics and cherry or maple laminates</li>
				<li style="border:none;cursor:default;">Nationwide installation network</li>
				<li style="border:none;cursor:default;">Free shipping</li>
				<li style="border:none;cursor:default;">Lowest pricing on the internet</li>
				</div>
				<ul>				
				<li class="qtitle2"><strong>QUICK SHIP</strong> FABRICS AND FINISHES</li>
				</ul>
				<div id="subquickship2">
				<table><tr><td>
				<li style="width:215px;"><b>Fabrics:</b></li></td>
					<td><li style="width:125px;"><b>Work Surfaces:</b></li></td>
					<td><li><b>Trim:</b></li></td></tr></table>
					
					<li style="border:none;cursor:default;width:40px;padding:10px 0 5px 5px;float:left;"><img src="<?php bloginfo('stylesheet_directory')?>/images/color_icon/taupe.gif"><br>Taupe</li>
					<li style="border:none;cursor:default;width:40px;padding:10px 0 5px 5px;float:left;"><img src="<?php bloginfo('stylesheet_directory')?>/images/color_icon/camel.gif"><br>Camel</li>
					<li style="border:none;cursor:default;width:40px;padding:10px 0 5px 5px;float:left;"><img src="<?php bloginfo('stylesheet_directory')?>/images/color_icon/sage.gif"><br>Sage</li>
					<li style="border:none;cursor:default;width:40px;padding:10px 0 5px 5px;float:left;margin-right:36px;"><img src="<?php bloginfo('stylesheet_directory')?>/images/color_icon/silver.gif"><br>Silver</li>
					<li style="border:none;cursor:default;width:40px;padding:10px 0 5px 5px;float:left;"><img src="<?php bloginfo('stylesheet_directory')?>/images/color_icon/cherry.gif"><br>Cherry</li>
					<li style="border:none;cursor:default;width:40px;padding:10px 0 5px 5px;float:left;margin-right:33px;"><img src="<?php bloginfo('stylesheet_directory')?>/images/color_icon/maple.gif"><br>Maple</li>
					<li style="border:none;cursor:default;width:40px;padding:10px 0 5px 5px;float:left;"><img src="<?php bloginfo('stylesheet_directory')?>/images/color_icon/black.gif"><br>Black</li><br>										

				
				</div>
				<ul>
				<li><a href="<?php echo get_permalink(163); ?>?osCsid=<?=$osCsid;?>">TYPICAL LAYOUTS & 3D VIEWS</a></li>
				</ul>
				</div>
				</div>
				<!--
				<div id="specs_n_testimonials">
				<div id="specs">
			
				</div>
				<div id="n_testimonials">
				<h2>Specs</h2>
				<p>				
<ul>
<li>Acoustic Steelcase Panels (4 fabric colors)</li>
<li>Locking Box/Box/File Pedestal</li>
<li>Locking Binder Bin</li>
<li>4 Duplex Power Receptacles</li>
<li>24" Deep Laminate Work Surfaces</li>
</ul>
				</p>
				</div>
				</div>				
		-->
	</div>
	</div>
<?php get_footer(); ?>
