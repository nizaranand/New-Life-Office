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
			
			<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title();?></a>
			
			</h2>
			
				<div class="entry">
					
					<?php the_content();?>
					
				</div>		
					
			</div>	
				
		<?php endwhile; ?>

		
	<?php endif; ?>
	
	
    
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



<?php
get_footer();  
?>