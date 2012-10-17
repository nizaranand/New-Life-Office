<?php
get_header(); ?>
<?
$osCsid=$_REQUEST['osCsid'];?>
<div id="content_b">
<div id="content_2b">
	<div id="content" class="hometopcontent">
		<div id="navleft"></div>
		<ul class="cssMenu cssMenum">
			<li class="cssMenui"><a href="http://www.newlifeoffice.com/?osCsid=<?=$osCsid;?>" class="cssMenui" id="current_home">Home</a></li>
			<li class="cssMenui"><a href="http://www.newlifeoffice.com/?page_id=2&osCsid=<?=$osCsid;?>" class="cssMenui" >About</a></li>
			<li class="cssMenui"><a href="#" class="cssMenui" id=""><span>Cubicles</span></a>
			<ul class="cssMenum">
				<li class="cssMenui"><a href="http://www.newlifeoffice.com/?page_id=21&osCsid=<?=$osCsid;?>" class="cssMenui">6x6</a></li>		
				<li class="cssMenui"><a href="http://www.newlifeoffice.com/?page_id=31&osCsid=<?=$osCsid;?>" class="cssMenui">7x7</a></li>		
				<li class="cssMenui"><a href="http://www.newlifeoffice.com/?page_id=35&osCsid=<?=$osCsid;?>" class="cssMenui">8x8</a></li>
				<li class="cssMenui"><a href="http://www.newlifeoffice.com/?page_id=37&osCsid=<?=$osCsid;?>" class="cssMenui">4' Call Center</a></li>
				<li style="border: medium none ;" class="cssMenui"><a href="http://www.newlifeoffice.com/?page_id=39&osCsid=<?=$osCsid;?>" class="cssMenui">Executive</a></li>
			</ul>
			<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
			<li class="cssMenui"><a href="http://www.newlifeoffice.com/?page_id=8&osCsid=<?=$osCsid;?>" class="cssMenui" >Seating</a></li>
			<li class="cssMenui"><a href="http://www.newlifeoffice.com/?page_id=11&osCsid=<?=$osCsid;?>" class="cssMenui" >Gallery</a></li>
			<li class="cssMenui"><a href="http://www.newlifeoffice.com/category/blog/" class="cssMenui" >Blog</a></li>
			<li class="cssMenui"><a href="http://www.newlifeoffice.com/?page_id=75&osCsid=<?=$osCsid;?>" class="cssMenui" >FAQ</a></li>
			<li class="cssMenui"><a href="http://www.newlifeoffice.com/?page_id=15&osCsid=<?=$osCsid;?>" class="cssMenui" >Awards</a></li>
			<li class="cssMenui"><a href="http://www.newlifeoffice.com/?page_id=77&osCsid=<?=$osCsid;?>" class="cssMenui" >Location</a></li>
			<li class="cssMenui"><a href="http://www.newlifeoffice.com/media" class="cssMenui" >Media</a></li>
			<li class="cssMenui"><a href="http://www.newlifeoffice.com/testimonials-customer-satisfaction/" class="cssMenui" >Testimonials</a></li>
			<li class="cssMenui" style="background: transparent none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;"><a href="http://www.newlifeoffice.com/?page_id=2&osCsid=<?=$osCsid;?>" class="cssMenui" id="">About</a>
				<ul class="cssMenum">
					<li class="cssMenui"><a class="cssMenui" href="http://www.newlifeoffice.com/blog" >News</a></li>				
				</ul>
			</li>
			</ul>
				<div id="navright"></div>
			<div id="post">			
			<h2><?php the_title(); ?></h2>	
				<div class="entry">					
					<?php the_content(); ?>					
				</div>	
			</div>
	</div>	
	<?php get_sidebar();?>	


</div>
</div>
<?php
get_footer();  
?>