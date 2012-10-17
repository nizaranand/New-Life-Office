
<?
if($_REQUEST['osCsid']!=""){
$_SESSION["osCsid"]=$_REQUEST['osCsid'];
$osCsid=$_SESSION["osCsid"];

}
else
{
$osCsid=$_SESSION["osCsid"];
}?>
<?php
	
	$parent_title = get_the_title($post->post_parent);
  
	
	if(is_home())
	{ 
	 $current_home = 'current_home';
     $current_About = '';
     $current_Cubicles = '';
     $current_Seating = '';
     $current_Gallery = '';
     $current_Blog = '';
	 $current_FAQ = '';
     $current_Awards = '';
     $current_Location = '';
	}
	else if(is_page(2))
	{	 
	 $current_home = '';
     $current_About = 'current_About';
     $current_Cubicles = '';
     $current_Seating = '';
     $current_Gallery = '';
     $current_Blog = '';
	 $current_FAQ = '';
     $current_Awards = '';
     $current_Location = '';
	}
	/*if(is_page(6)||is_page(21)||is_page(31)||is_page(35)||is_page(39)||is_page(37)||is_page(69)||is_page(81)||is_page(37)||is_page(57)||is_page(59)||is_page(63)||is_page(67)||is_page(71))
	{	
	 $current_home = '';
     $current_About = '';
     $current_Cubicles = 'current_Cubicles';
     $current_Seating = '';
     $current_Gallery = '';
     $current_Blog = '';
	 $current_FAQ = '';
     $current_Awards = '';
     $current_Location = '';
	 	}*/
	
	else if($parent_title =='Cubicles')
	{	
	 $current_home = '';
     $current_About = '';
     $current_Cubicles = 'current_Cubicles';
     $current_Seating = '';
     $current_Gallery = '';
     $current_Blog = '';
	 $current_FAQ = '';
     $current_Awards = '';
     $current_Location = '';
	 	}
		
	
	else if(is_page(11))
	{		 
	 $current_home = '';
     $current_About = '';
     $current_Cubicles = '';
     $current_Seating = '';
     $current_Gallery = 'current_Gallery';
     $current_Blog = '';
	 $current_FAQ = '';
     $current_Awards = '';
     $current_Location = '';
	 	}
	
	else if(is_page(75))
	{		 
	 $current_home = '';
     $current_About = '';
     $current_Cubicles = '';
     $current_Seating = '';
     $current_Gallery = '';
     $current_Blog = '';
	 $current_FAQ = 'current_FAQ';
     $current_Awards = '';
     $current_Location = '';
	 	}
	else if(is_page(15))
	{		 
	 $current_home = '';
     $current_About = '';
     $current_Cubicles = '';
     $current_Seating = '';
     $current_Gallery = '';
     $current_Blog = '';
	 $current_FAQ = '';
     $current_Awards = 'current_Awards';
     $current_Location = '';
	 	}
	else if(is_page(77))
	{		 
	 $current_home = '';
     $current_About = '';
     $current_Cubicles = '';
     $current_Seating = '';
     $current_Gallery = '';
     $current_Blog = '';
	 $current_FAQ = '';
     $current_Awards = '';
     $current_Location = 'current_Location';
	 	}
		
	else if(is_page(8))
	{		 
	 $current_home = '';
     $current_About = '';
     $current_Cubicles = '';
     $current_Seating = 'current_Seating';
     $current_Gallery = '';
     $current_Blog = '';
	 $current_FAQ = '';
     $current_Awards = '';
     $current_Location = '';
	 	}
	
	else
	{		 
	 $current_home = '';
     $current_About = '';
     $current_Cubicles = '';
     $current_Seating = '';
     $current_Gallery = '';
     $current_Blog = '';
	 $current_FAQ = '';
     $current_Awards = '';
     $current_Location = '';
	 	}
	
	if($_REQUEST['page']=='blog')
	{		 
	 $current_home = '';
     $current_About = '';
     $current_Cubicles = '';
     $current_Seating = '';
     $current_Gallery = '';
     $current_Blog = 'current_Blog';
	 $current_FAQ = '';
     $current_Awards = '';
     $current_Location = '';
	 	}
	
	
	?>


	<div id="navleft">
	</div>
	<ul class="cssMenu cssMenum">
	<li class=" cssMenui"><a id="<?php echo $current_home;?>" class="  cssMenui" href="<?php bloginfo('home');?>/?osCsid=<?=$osCsid;?>">Home</a></li>
	<li class=" cssMenui"><a id="<?php echo $current_About;?>"  class="  cssMenui" href="<?php echo get_permalink(2)?>?osCsid=<?=$osCsid;?>">About</a></li>
	<li class=" cssMenui"><a id="<?php echo $current_Cubicles;?>"  class="  cssMenui" href="#"><span>Cubicles</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class=" cssMenum">
		<li class=" cssMenui"><a class="  cssMenui" href="<?php echo get_permalink(21);?>?osCsid=<?=$osCsid;?>" >6x6</a></li>		
		<li class=" cssMenui"><a class="  cssMenui" href="<?php echo get_permalink(31);?>?osCsid=<?=$osCsid;?>" >7x7</a></li>		
		<li class=" cssMenui"><a class="  cssMenui" href="<?php echo get_permalink(35);?>?osCsid=<?=$osCsid;?>" >8x8</a></li>
		<li class=" cssMenui"><a class="  cssMenui" href="<?php echo get_permalink(37);?>?osCsid=<?=$osCsid;?>" >4' Call Center</a></li>
		<li class=" cssMenui" style="border:none;"><a class="  cssMenui" href="<?php echo get_permalink(39);?>?osCsid=<?=$osCsid;?>" >Executive</a></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	<li class=" cssMenui"><a id="<?php echo $current_Seating;?>"  class="  cssMenui" href="<?php echo get_permalink(8)?>?osCsid=<?=$osCsid;?>" >Seating</a></li>
	<li class=" cssMenui"><a id="<?php echo $current_Gallery;?>"  class="  cssMenui" href="<?php echo get_permalink(11)?>?osCsid=<?=$osCsid;?>" >Gallery</a></li>
	<li class=" cssMenui"><a id="<?php echo $current_Blog;?>" class="  cssMenui" href="<?php echo get_permalink(73);?>?osCsid=<?=$osCsid;?>" >Blog</a></li>
	<li class=" cssMenui"><a id="<?php echo $current_FAQ;?>"  class="  cssMenui" href="<?php echo get_permalink(75)?>?osCsid=<?=$osCsid;?>" >FAQ</a></li>
	<li class=" cssMenui"><a id="<?php echo $current_Awards;?>" class="  cssMenui" href="<?php echo get_permalink(15)?>?osCsid=<?=$osCsid;?>" >Awards</a></li>
	<li class="cssMenui"><a id="<?php echo $current_Media; ?>"  class="cssMenui" href="<?php echo get_permalink(210)?>" >Media</a></li>
	<li class="cssMenui"><a id="<?php echo $current_Testimonial; ?>"  class="cssMenui" href="<?php echo get_permalink(147)?>" >Testimonials</a></li>
	<li class=" cssMenui" style="background:none;"><a id="<?php echo $current_Location;?>"  class="  cssMenui" href="<?php echo get_permalink(77)?>?osCsid=<?=$osCsid;?>" >Location</a></li>
</ul>

	<div id="navright">	
	</div>
	