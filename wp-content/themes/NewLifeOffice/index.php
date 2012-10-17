<?php
$page = $_REQUEST['page'];
if($page=='')
{
?>
<?php
get_header(); ?>

<div id="content_b">
<div id="content_2b">
	<div id="content" class="hometopcontent">
<?php include (TEMPLATEPATH . '/nav.php'); ?>
<h1 class="topheader">Office Cubicles</h1><h2 class="top-subheader">Best-selling Workstations</h2>
<?php
	
	global $wpdb;

   $querystr = "
    SELECT *
    FROM new_wp_posts 
    WHERE new_wp_posts.ID = '21' 
	AND new_wp_posts.post_type = 'page'  
    AND new_wp_posts.post_status = 'publish' ";

	$pageposts = $wpdb->get_results($querystr, OBJECT);
 
 ?>
	
	<?php if ($pageposts): 
	
	foreach ($pageposts as $post):
	setup_postdata($post); 

 ?>

			
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
			<div id="home6x6">
			<div id="home6x6img"><img src="<?php echo $thumb;?>" alt="6x6 Used Office Cubicle" />				
			</div>
			<h2>
			
			<a href="<?php the_permalink() ?>?osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">6x6  Office Cubicle, Discounted</a>
			</h2>		
				<div class="entry">
					
					<!--<?php echo preg_replace($p2,'',$string); ?>-->
<p><small class="utitle"><b>65" H.   (<a href="<?php echo get_permalink(161); ?>?osCsid=<?=$osCsid;?>">Also available 53" H.</a>)</b></small><br />

Introducing the perennial winner of NewLifeOffice's all-purpose cubicle award. Our 6x6 cubicle is our most popular product, ever. Experience space, comfort, and ergonomics at an untouchable price. Your employees will thank you.  <a href="<?php echo get_permalink(21); ?>?osCsid=<?=$osCsid;?>">More...</a>

</p>
				</div>
				<div id="price6x6">
				 <ul>
					<li style="font-family:Arial;font-weight:bold;font-size:12px;">Competitors</li>
					<li style="font-family:Arial;font-size:19.63px;color:#111111;text-decoration:line-through;">$1499</li>
				 </ul>
				 <ul>
					<li style="font-family:Arial;font-weight:bold;font-size:12px;">As Low As</li>
					<li style="font-family:Arial;font-size:19.63px;color:#d70000;">$899</li>
				 </ul>
		<span class="free-ship" >
				FREE SHIPPING
			</span>
				</div>
				<div class="customize">
				<a href="<?php the_permalink() ?>?osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Purchase</a>
				</div>

				
			</div>

		<?php endforeach; ?>

		
	<?php endif; ?>

	<div id="homesidebar">
	<!-- <div id="i_sidebar"> -->
	<h2 class="form-pad">Request Information</h2>
	<?php insert_cform('Contact'); ?>
	<!--</div>-->
	</div>
	<div id="quickship">
	<a href="<?php echo get_permalink(131);?>?osCsid=<?=$osCsid;?>"><img height="110" src="<?php bloginfo('stylesheet_directory')?>/images/quickship.gif" alt="Free Shipping image" /></a>
	</div>
</div>
	
	<div id="home_w_station">
	<?php
	
	global $wpdb;

   $querystr = "
    SELECT * 
    FROM new_wp_posts 
    WHERE new_wp_posts.ID = '31' 
	AND new_wp_posts.post_type = 'page'  
    AND new_wp_posts.post_status = 'publish' ";

	$pageposts = $wpdb->get_results($querystr, OBJECT);
 
 ?>
	
	<?php if ($pageposts): 
	
	foreach ($pageposts as $post):
	setup_postdata($post); 

 ?>
	<div id="w_station7x7">
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
			
			<div id="w_station7x7img"><img src="<?php echo $thumb;?>" alt="7x7 Used Office Cubicle" />				
			</div>
			<h2>			
			<a href="<?php the_permalink() ?>?osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">7x7 Workstation</a>			
			</h2>		
			

				<div class="entry">	
<p><small class="utitle">65" H</small><br />
Enjoy 11 more square feet for <br />space-needy employees. More <br />spacious, always flexible.</p>
									
					<!--<p>
					<?php echo preg_replace($p2,'',$string); ?>
					</p>-->
				</div>
				<div id="w_station7x7price">
                 <ul>
					<li style="font-family:Arial;font-weight:bold;font-size:12px;">As Low As</li>
					<li style="font-family:Arial;font-size:19.63px;color:#d70000;">$925</li>
				 </ul>
				</div>
				<div class="customize">
				<a href="<?php the_permalink() ?>?osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Purchase</a>
				</div>
				
	
	</div>
 
	<?php endforeach; ?>		
	<?php endif; ?>
	
	
	
		<?php
	
	global $wpdb;

   $querystr = "
    SELECT * 
    FROM new_wp_posts 
    WHERE new_wp_posts.ID = '35' 
	AND new_wp_posts.post_type = 'page'  
    AND new_wp_posts.post_status = 'publish' ";

	$pageposts = $wpdb->get_results($querystr, OBJECT);
 
 ?>
	
	<?php if ($pageposts): 
	
	foreach ($pageposts as $post):
	setup_postdata($post); 

 ?>
	<div id="w_station8x8">
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
			
			<div id="w_station8x8img">			
			</div>
			<h2>			
			<a href="<?php the_permalink() ?>?osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">8x8 Workstation</a>			
			</h2>		
			

				<div class="entry">
<p><small class="utitle">65" H</small><br />
The ultimate in the office cubicle <br />spacial experience. Fit for <br />managers or multi-purpose.</p>
					</p>							
					<!--<p>
					<?php echo preg_replace($p2,'',$string); ?>
					</p>-->
				</div>
				<div id="w_station8x8price">
                 <ul>
					<li style="font-family:Arial;font-weight:bold;font-size:12px;">As Low As</li>
					<li style="font-family:Arial;font-size:19.63px;color:#d70000;">$949</li>
				 </ul>
				</div>
				<div class="customize">
				<a href="<?php the_permalink() ?>?osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Purchase</a>
				</div>
				
	
	</div>
 
	<?php endforeach; ?>		
	<?php endif; ?>
 
	
	</div>
	
	
	
	<div id="homestation">
	<?php
	
	global $wpdb;

   $querystr = "
    SELECT * 
    FROM new_wp_posts 
    WHERE new_wp_posts.ID = '37' 
	AND new_wp_posts.post_type = 'page'  
    AND new_wp_posts.post_status = 'publish' ";

	$pageposts = $wpdb->get_results($querystr, OBJECT);
 
 ?>
	
	<?php if ($pageposts): 
	
	foreach ($pageposts as $post):
	setup_postdata($post); 

 ?>
	<div id="call4">
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
			
			<div id="call4img"><img src="<?php echo $thumb;?>" alt="4' Call Station" />				
			</div>
			<h2>			
			<a href="<?php the_permalink() ?>?osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">4' Call Station</a>			
			</h2>		
			

				<div class="entry">	
<p><small class="utitle">53" H</small><br />
Call center with style? Easy. <br />A perfect spacial mix for optimal <br />supervision and minimum privacy.</p>
					</p>						
					<!--<p>
					<?php echo preg_replace($p2,'',$string); ?>
					</p>-->
				</div>
				<div id="callprice">
                 <ul>
					<li style="font-family:Arial;font-weight:bold;font-size:12px;">As Low As</li>
					<li style="font-family:Arial;font-size:19.63px;color:#d70000;">$345</li>
				 </ul>
				</div>
				<div class="customize">
				<a href="<?php the_permalink() ?>?osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Purchase</a><br /><br />&nbsp;
				</div>
				
	
	</div>
 
	<?php endforeach; ?>		
	<?php endif; ?>
	
	
	
		<?php
	
	global $wpdb;

   $querystr = "
    SELECT * 
    FROM new_wp_posts 
    WHERE new_wp_posts.ID = '39' 
	AND new_wp_posts.post_type = 'page'  
    AND new_wp_posts.post_status = 'publish' ";

	$pageposts = $wpdb->get_results($querystr, OBJECT);
 
 ?>
	
	<?php if ($pageposts): 
	
	foreach ($pageposts as $post):
	setup_postdata($post); 

 ?>
	<div id="executive">
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
			
			<div id="executiveimg"><img src="<?php echo $thumb;?>" alt="Executive Office Furniture" />				
			</div>
			<h2>			
			<a href="<?php the_permalink() ?>?osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Executive Station</a>			
			</h2>		
			

				<div class="entry">					
<p><br /><br />Freestanding work surface for <br />freethinking individuals. Ideal <br />for private office optimization.</p>
					</p>							
<!--<p>
					<?php echo preg_replace($p2,'',$string); ?>
					</p>-->
				</div>
				<div id="executiveprice">
				 <ul>
					<li style="font-family:Arial;font-weight:bold;font-size:12px;">As Low As</li>
					<li style="font-family:Arial;font-size:19.63px;color:#d70000;">$979</li>
				 </ul>
				</div>
				<div class="customize">
				<a href="<?php the_permalink() ?>?osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Purchase</a><br /><br />&nbsp;
				</div>
				
	
	</div>
 
	<?php endforeach; ?>		
	<?php endif; ?>
 
	
	</div>
	
	<div id="bringnewlife">
	<h2>Used Office Cubicles</h2>
	<p class="left">
		<strong class="sub-title">Raising the Green Standard in Office Décor</strong><br />
		With New Life Office cubicles, your workspace comes alive. We seamlessly combine new, refurbished and used cubicles to create unmatched beauty, environmental friendliness, and durability. Stick around and you'll find that a new standard in <a href="http://www.newlifeoffice.com/used-cubicle-furniture/">used office furniture</a> has been set. <br />&nbsp;<br />
After years of perfecting a process of material refinement previously unheard of in the office cubicles industry, we're proud of the award-winning end result: better than new office cubicles. Our unique process takes <a href="http://www.newlifeoffice.com/refurbished-cubicles/">refurbished office furniture</a> and cubicles, and builds products that put brand new cubicles to shame. See for yourself by customizing your own New Life Office cubicle set today!
<br />&nbsp;<br />
<a href="http://www.newlifeoffice.com/refurbished-cubicles/">Modular Office Furniture</a><br />
<a href="http://www.newlifeoffice.com/used-cubicle-furniture/">Cubicle Furniture</a><br />
<a href="http://www.newlifeoffice.com/cubicles/executive-station/">Executive Office Furniture</a><br />
<a href="http://www.newlifeoffice.com/used-cubicle-furniture/">Refurbished Cubicles</a><br />
<a href="http://www.newlifeoffice.com/used-cubicle-furniture/">Used Office Furniture</a></p>

	<h2 class="right">Refurbished Office Cubicles</h2>
	<p class="right">
	What's different about a New Life Office cubicle?<br />&nbsp;<br />
For the last 20 years, we've been making it a point to break the old mold in the office furniture industry. With an impeccable, <a href="http://www.newlifeoffice.com/awards/?osCsid=<?=$osCsid;?>">award-winning</a> track record of service to companies small and large, we are known for exceeding our customer's expectations for a less-than-expected price.<br />&nbsp;<br />
 Our rates run at 50% of typical showroom-new office furniture, and we ship in just two weeks. Beyond beauty and design, our office cubicles are beautifully functional, economical, durable, and flexible. And each office cubicle comes with a solid 10 year warranty.<br />&nbsp;<br />
Design conscious? No problem. Our designers have years of experience in customizing colors to match your office space. Our office cubicles start as stripped down top-of-the-line Steelcase panels and end up as better than new, environmentally friendly, built-to-last, New Life Office cubicles. With new paint, new fabric, and a new look, you'll see how your new life office breaks the mold.
	</p>
	
	</div>
	<div id="newsletterlink">
		<ul>
			<!--<li style="padding-bottom:15px;border:none;width:187px;">
			  
			  <h2> <a href="<?php echo get_permalink(147); ?>?osCsid=<?=$osCsid;?>"><u>Product Reviews</u></a></h2>
			  <p class="Testimonial"> "New Life Office gave options which worked within our budget and timeframe."</a><br />
-Linda Jacobson, Operations Manager, Commerce CRG</p>	-->
<li class="newslet" >
	<h2>Newsletter</h2><br /> 
			  <p>Subscribe to our Members Only Newsletter and Download the FREE report "How to Run Your Office On The Power of Green"</p>
<form method="post" action="http://www.aweber.com/scripts/addlead.pl" id="newsletter">
<input type="hidden" name="meta_web_form_id" value="2018318919" />
<input type="hidden" name="meta_split_id" value="" />
<input type="hidden" name="unit" value="nlosnewsletter" />
<input type="hidden" name="redirect" value="http://www.aweber.com/form/thankyou_vo.html" id="redirect_bbba1de1931fc686f6e51a82824012e4" />
<input type="hidden" name="meta_redirect_onlist" value="" />
<input type="hidden" name="meta_adtracking" value="" />
<input type="hidden" name="meta_message" value="1" />
<input type="hidden" name="meta_required" value="from" />
<input type="hidden" name="meta_forward_vars" value="0" />			  
			 <div style="margin:0;padding:0;">
			 <input id="subcriber_name" style="" type="text" />
			 <input id="subcriber_email" style="" type="text" name="from" />
			 <input style="background-color:#c3c3c3; text-color: black;" type="submit" name="submit" value="Go" />
			 </div>
			  <small class="subcriber_name">Name</small>
			  <small class="subcriber_email">Email</small>
			  </form>
			</li><span class="clear-me"></span>		
			<li class="mediasect">			  
			  <div style="float:left;width:135px;padding:0;margin:0;">
			  <h2>Media</h2><br />
			  <p class="media">Introducing a "Green By Design" Experience. <!--Your introduction to a new wave in office furniture.--></p>
			  </div>
			  <a class="medialink" href="<?php echo get_permalink(210); ?>"><img src="<?php bloginfo('stylesheet_directory')?>/images/media.gif" alt="Media Image" /></a>
			</li>  	

			<li style="float: right; width:50px; height:100px;border:none;">
				<a style="display:block;width:50px; height:100px;" href="<?php echo get_permalink(131);?>"></a>
			</li>
			<hr />	
				
		</ul>
	</div>
</div>
</div>
<?php get_footer(); 
}
else
{
?>


<?php
get_header(); ?>
<div id="content_b">
<div id="content_2b">
	<div id="content" class="hometopcontent">
<?php include (TEMPLATEPATH . '/nav.php'); ?>			
			
			<?php if (have_posts()) : ?>
			
			<?php while (have_posts()) : the_post(); ?>
			
			<div id="post">			
			
			<h2>
			
			<a href="<?php the_permalink() ?>?osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title();?></a>
			
			</h2>
			
			<small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>		
			

				<div class="entry">
					
					<?php the_content('...readmore');?>
					
				</div>		
				
				

				
			</div>

		<?php endwhile; ?>

		
	<?php endif; ?>

	</div>
	
	<?php get_sidebar();?>	
	
</div>
</div>


<?php
get_footer();  
}
?>
