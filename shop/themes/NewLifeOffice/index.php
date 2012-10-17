<?php
$page = $_REQUEST['page'];
$osCsid=$_REQUEST['osCsid'];
if($page=='')
{
?>
<?php
get_header(); ?>
<div id="content_b">
<div id="content_2b">
	<div id="content" class="hometopcontent">
<?php include (TEMPLATEPATH . '/nav.php'); ?>
<h2 class="topheader">Bestselling Workstations</h2>
	
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
			<div id="home6x6img"><img src="<?php echo $thumb;?>"  />				
			</div>
			<h2>
			
			<a href="<?php the_permalink() ?>&osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">6x6  Office Cubicle, Discounted</a>
			
			</h2>		
			

				<div class="entry">
					
					<p>
					<?php echo preg_replace($p2,'',$string); ?>
					</p>
				</div>
				
				<div id="price6x6">
				 <ul>
					<li style="font-family:Arial;font-weight:bold;font-size:12px;">The competetors</li>
					<li style="font-family:FranklinGothic Demi;font-size:19.63px;color:#111111;text-decoration:line-through;">$1499</li>
				 </ul>
				 <ul>
					<li style="font-family:Arial;font-weight:bold;font-size:12px;">Our Price</li>
					<li style="font-family:FranklinGothic Demi;font-size:19.63px;color:#d70000;">$899</li>
				 </ul>
		<ul style="font-family:FranklinGothic Demi;font-size:18px;color:#d70000;width:142px;text-align:right;padding-top:10px;">
					FREE SHIPPING
				 </ul>
				</div>
				<div id="customize">
				<a href="<?php the_permalink() ?>&osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Customize</a>
				</div>

				
			</div>

		<?php endforeach; ?>

		
	<?php endif; ?>

	</div>
	
	<div id="homesidebar">
	<div id="i_sidebar">
	
		<ul>
	
			<li style="padding-bottom:35px;border:none;width:185px;">
			  
			  <h2> Testimonials</h2>
			  <p class="Testimonial"> I liked these cubicles so much, I  </p>
			  <p class="Testimonial"> bought the company! </p>
			  <p class="Testimonial"> A. Fox, New Life Office </p>
			  	
			</li>
			<li style="float: right; width:50px; height:100px;border:none;"><a style="display:block;width:50px; height:100px;" href=""></a></li>
			<hr>
			
			<li  style="border-top:1px solid #000000;">
			  
			  <h2>Sign up for our Email Newsletter</h2>
			  <form action="" method="get" style="" id="newsletter">
			 <div style="margin:0;padding:0;">
			 <input id="subcriber_name" style="" type="text" name="name" value="" />
			 <input id="subcriber_email" style="" type="text" name="email" value="" />
			 </div>
			  <small class="subcriber_name">Name</small>
			  <small class="subcriber_email">Email</small>
			 
			  </form>
	
			</li>
			
			<li>
			  
			  <div style="float:left;width:82px;padding:0;margin:0;">
			  <h2 class="media">Media</h2>
			  <p class="media">See why New Life Office is the leader in office cubicles!</p>
			  </div>
			  <a class="medialink" href="#"><img src="<?php bloginfo('stylesheet_directory')?>/images/media.gif"></a>
	
			</li>
	
		</ul>
	
	</div>
	</div>
	<div id="quickship">
	<a href=""><img height="110" src="<?php bloginfo('stylesheet_directory')?>/images/quickship.gif"  /></a>
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
			
			<div id="w_station7x7img"><img src="<?php echo $thumb;?>"  />				
			</div>
			<h2>			
			<a href="<?php the_permalink() ?>&osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">7x7 Workstation</a>			
			</h2>		
			

				<div class="entry">					
					<p>
					<?php echo preg_replace($p2,'',$string); ?>
					</p>
				</div>
				<div id="w_station7x7price">
				<p>$345</p>
				</div>
				<div id="customize">
				<a href="<?php the_permalink() ?>&osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Customize</a>
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
			
			<div id="w_station8x8img"><img src="<?php echo $thumb;?>"  />				
			</div>
			<h2>			
			<a href="<?php the_permalink() ?>&osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">8x8 Workstation</a>			
			</h2>		
			

				<div class="entry">					
					<p>
					<?php echo preg_replace($p2,'',$string); ?>
					</p>
				</div>
				<div id="w_station8x8price">
				<p>$345</p>
				</div>
				<div id="customize">
				<a href="<?php the_permalink() ?>&osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Customize</a>
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
			
			<div id="call4img"><img src="<?php echo $thumb;?>"  />				
			</div>
			<h2>			
			<a href="<?php the_permalink() ?>&osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">4' Call Station</a>			
			</h2>		
			

				<div class="entry">					
					<p>
					<?php echo preg_replace($p2,'',$string); ?>
					</p>
				</div>
				<div id="callprice">
				<p>$345</p>
				</div>
				<div id="customize">
				<a href="<?php the_permalink() ?>&osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Customize</a>
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
			
			<div id="executiveimg"><img src="<?php echo $thumb;?>"  />				
			</div>
			<h2>			
			<a href="<?php the_permalink() ?>&osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Executive Station</a>			
			</h2>		
			

				<div class="entry">					
					<p>
					<?php echo preg_replace($p2,'',$string); ?>
					</p>
				</div>
				<div id="executiveprice">
				<p>$345</p>
				</div>
				<div id="customize">
				<a href="<?php the_permalink() ?>&osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Customize</a>
				</div>
				
	
	</div>
 
 	<?php endforeach; ?>		
	<?php endif; ?>
 
	
	</div>
	
	<div id="bringnewlife">
	<h2>Bring New Life to Your Office</h2>
	<p class="left">
		Although recyclying and remanufacturing have always been the cornerstone of New Life Office, we have now introduced a 					        variety of new components and products to enhance your office's appearance.
	</p>
	<p class="right">
	Our environmentally friendly approach of combining premium new product with remanufactured steelcase panes is unique in the 				    office cubicle industry.
	</p>
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
			
			<a href="<?php the_permalink() ?>&osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title();?></a>
			
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