<?php
 /* 
Template Name: New Home Page
*/ 
?>


<?php

if($_SESSION['vegas'])
	header('location: http://www.newlifeoffice.com/las-vegas-office/');

if($_SESSION['SLC'])
	header('location: http://www.newlifeoffice.com/salt_lake/');

if($_SESSION['boise'])
	header('location: http://www.newlifeoffice.com/boise-office/');



 //   if(isset($_SESSION['newlife']))
//	{
  //	switch($_SESSION['newlife'])
//	{
//	case '1':
//	session_destroy(); 
//	header('location: http://www.newlifeoffice.com/las-vegas-office/');
  //      break;
//
  //  	case '2':
	//	session_destroy();
      //  header('location: http://www.newlifeoffice.com/boise-office/');
       	//break;
//
  //      case '3':
	//session_destroy();
//	header('location: http://www.newlifeoffice.com/salt_lake/');
//	break;

//	default:
//	session_destroy();
//	session_start();
//	$_SESSION['views'] = 0;
//	header('location: http://www.newlifeoffice.com/');
//	}    	
//	}  
?>

<?php
$page = $_REQUEST['page'];
if($page=='')
{
?>
<?php
$home = true;
get_header(); ?>

<div id="mainlayout">
	<div id="content" class="hometopcontent">
<div id="navleft"> </div>
<?php wp_nav_menu( array( 'theme_location' => 'extra-menu' ) ); ?>
<div id="navright"> </div>
<h1 class="mainheader">Office Cubicles - Used Office Furniture - Used Office Cubicles</h1>
<div id="boxes">

<ul class="box">
<li id="officeCube"><a href="http://www.newlifeoffice.com/office-cubicles/">
<h3>
Office Cubicles & Used Office Cubicles
</h3>
<h4>
View Product
</h4>
</a></li>
<li id="usedFurniture"><a href="http://www.newlifeoffice.com/used-office-furniture/">
<h3>
Used Office Furniture
</h3>
<h4>
  View Product
</h4>
</a></li>
</ul>
<ul class="box"> 
<li id="executiv"><a href="http://www.newlifeoffice.com/office-desk/">
<h3>
Office Desks
</h3>
<h4>
  View Product
</h4>
</a></li>
<li id="chair"><a href="http://www.newlifeoffice.com/office-chairs/">
  <h3>
    Office Chairs
  </h3>
  <h4>
    View Product
  </h4>
</a></li>
</ul>
</div>


<div class="spacers">
<br/>
</div>

<div id="whatwedo">
<h2>What We Do:
<img src="<?php bloginfo('stylesheet_directory')?>/images/whiteleaf.png" width="19" height="15" /></h2> <br/>
<span>We provide you the best combination of new, used, and remanufactured office furniture to meet your needs while saving your pocket book and the evnvironment. Learn more about the <a href="http://www.newlifeoffice.com/office-cubicles/">office cubicles</a>, <a href="http://www.newlifeoffice.com/used-cubicle-furniture/">used office cubicles</a>, <a href="http://www.newlifeoffice.com/refurbished-cubicles/">used office furniture</a> and <a href="http://www.newlifeoffice.com/office-desk/">new office furniture</a> we use to make your office beautiful and functional.</span>
</div>


	<div id="homesidebar">
	<!-- <div id="i_sidebar"> -->
	<?php  
	
	include("home/sidebar.php");
	
	?>
    </div>


<h2 class="top-subheader">Best-selling Workstations</h2>
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
 <div id="homestation">
			
<div class="product">

  <div class="productimg"><img src="<?php bloginfo('stylesheet_directory')?>/images/cublicles/6x6.jpg" width="217" height="203" />				
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
				<div class="productprice">
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
                
                <div class="productbreak"></div>

				
			</div>
            </div>

		<?php endforeach; ?>

		
	<?php endif; ?>

	
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
  <div id="homestation">
	<div class="product">
			
			<div class="productimg"><img src="<?php bloginfo('stylesheet_directory')?>/images/cublicles/7x7.jpg" width="217" height="203" />					
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
				<div class="productprice">
                 <ul>
					<li style="font-family:Arial;font-weight:bold;font-size:12px;">As Low As</li>
					<li style="font-family:Arial;font-size:19.63px;color:#d70000;">$925</li>
				 </ul>
				</div>
				<div class="customize">
				<a href="<?php the_permalink() ?>?osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Purchase</a>
				</div>
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
  <div id="homestation">
	<div class="product">
	
			<div class="productimg"><img src="<?php bloginfo('stylesheet_directory')?>/images/cublicles/8x8.jpg" width="217" height="203" />				
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
				<div class="productprice">
                 <ul>
					<li style="font-family:Arial;font-weight:bold;font-size:12px;">As Low As</li>
					<li style="font-family:Arial;font-size:19.63px;color:#d70000;">$949</li>
				 </ul>
				</div>
				<div class="customize">
				<a href="<?php the_permalink() ?>?osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Purchase</a>
				</div>
				
	
	</div>
    </div>
 
	<?php endforeach; ?>		
	<?php endif; ?>
 
	
	
	
	
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
  <div id="homestation">
	<div class="product">
    
	
			<div class="productimg"><img src="<?php bloginfo('stylesheet_directory')?>/images/cublicles/4'call.jpg" width="217" height="203" />			
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
				<div class="productprice">
                 <ul>
					<li style="font-family:Arial;font-weight:bold;font-size:12px;">As Low As</li>
					<li style="font-family:Arial;font-size:19.63px;color:#d70000;">$345</li>
				 </ul>
				</div>
				<div class="customize">
				<a href="<?php the_permalink() ?>?osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Purchase</a><br /><br />&nbsp;
				</div>
				
	
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
  <div id="homestation">
	<div class="product">

			
			<div class="productimg"><img src="<?php bloginfo('stylesheet_directory')?>/images/privacy/executive/executive_right.jpg" width="217" height="203" /></div>
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
				<div class="productprice">
				 <ul>
					<li style="font-family:Arial;font-weight:bold;font-size:12px;">As Low As</li>
					<li style="font-family:Arial;font-size:19.63px;color:#d70000;">$979</li>
				 </ul>
				</div>
				<div class="customize">
				<a href="<?php the_permalink() ?>?osCsid=<?=$osCsid;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Purchase</a><br /><br />&nbsp;
				</div>
				
	
	</div>
    </div>
 
	<?php endforeach; ?>		
	<?php endif; ?>
 
	
	
    <div id="bringnewlife">
    <?php if (have_posts()) : ?>
			
			<?php while (have_posts()) : the_post(); ?>
			
			<div id="post">			
			
				<div class="entry">
					
					<?php the_content();?>
					
				</div>		
					
			</div>	
				
		<?php endwhile; ?>

		
	<?php endif; ?>
    
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
			
			<li style="float: right; width:50px; height:100px;border:none;">
				<a style="display:block;width:50px; height:100px;" href="<?php echo get_permalink(131);?>"></a>
			</li>
			<hr />	
				
		</ul>
	</div>
</div>
</div>
</div>
</div>
<?php get_footer(); 
}

?>

