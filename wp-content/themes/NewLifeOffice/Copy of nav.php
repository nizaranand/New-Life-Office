
	<?php
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
	if(is_page(2))
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
	if(is_page(6))
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
	if(is_page(8))
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
	if(is_page(10))
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
	if(is_page(12))
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
	if(is_page(14))
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
	if(is_page(16))
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
	if(is_page(18))
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
	?>


	<div id="navleft">
	</div>
	<div id="nav">
	<ul>
	  <li><a class="<?php echo $current_home;?>" href="<?php bloginfo('home');?>">Home</a></li>
	  <li><a class="<?php echo $current_About;?>" href="<?php echo get_permalink(2)?>">About</a></li>
	  <li><a class="<?php echo $current_Cubicles;?>" href="<?php echo get_permalink(6)?>">Cubicles</a>	  
	  <ul> 
			<li><a href="">6x6</a></li>
			<li><a href="">6x7</a></li>
			<li><a href="">7X7</a></li>
			<li><a href="">7x8</a></li>
			<li><a href="">8x8</a></li>
			<li><a href="">4' Call Center</a></li>
			<li><a href="">Executive</a></li>
		  </ul>	    
		</li>
	  <li><a class="<?php echo $current_Seating;?>" href="<?php echo get_permalink(8)?>">Seating</a></li>
	  <li><a class="<?php echo $current_Gallery;?>" href="<?php echo get_permalink(10)?>">Gallery</a></li>
	  <li><a class="<?php echo $current_Blog;?>" href="<?php echo get_permalink(12)?>">Blog</a></li>
	  <li><a class="<?php echo $current_FAQ;?>" href="<?php echo get_permalink(14)?>">FAQ</a></li>
	  <li><a class="<?php echo $current_Awards;?>" href="<?php echo get_permalink(16)?>">Awards</a></li>
	  <li><a class="<?php echo $current_Location;?>" href="<?php echo get_permalink(18)?>">Location</a></li>
	</ul>
	

	</div>	
	<div id="navright">	
	</div>
	