<?php
 /* 
Template Name: Used Furniture 
*/ 
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
<h1 class="mainheader">Used Office Furniture</h1>


<div class="spacers">
<br/>
</div>

<h2 class="top-subheader">Sample Product</h2>

	
<?php echo do_shortcode('[nggallery id=17 template=newlife]'); ?>


	<div id="homestation">
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
    <div id="homesidebar">
	<!-- <div id="i_sidebar"> -->
	<?php  
	
	include("home/sidebar.php");
	
	?>
    </div>
	
	
	<div id="newsletterlink">
		<ul>
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


