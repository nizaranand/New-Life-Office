-jQuery(document).ready(function() {
	

		if(google.loader.ClientLocation)
		{
			visitor_city = google.loader.ClientLocation.address.city;
			visitor_region = google.loader.ClientLocation.address.region;
			
			if (visitor_region == "UT" && location.href == "http://www.newlifeoffice.com/")
			{
				   
					
					  jQuery("#bgpopup").css({
					  "opacity": "0.7"
					  });
					  jQuery("#bgpopup").fadeIn("slow");
					  jQuery("#popup").fadeIn("slow");
				
					
					
					var windowWidth = document.documentElement.clientWidth;
					var windowHeight = document.documentElement.clientHeight;
					var popupHeight = jQuery("#popup").height();
					var popupWidth = jQuery("#popup").width();
					//centering
					jQuery("#popup").css({
					"position": "absolute",
					"top": windowHeight/2-popupHeight/2,
					"left": windowWidth/2-popupWidth/2
					});
					jQuery("#popup").html("<h2><a href='http://www.newlifeoffice.com/salt_lake/'>Come see the New Salt Lake Home page</a></h2><span><a href='http://www.newlifeoffice.com/salt_lake/'>Click Here for Salt Lake City Website</a></span><br /><h2>Website features include:</h2><ul><li>Refurbished Cubicles</li><li>Used Office Furniture in Stock</li><li>New Chairs, Desks, Tables and Filing</li></ul><br /><a href='http://www.newlifeoffice.com/salt_lake/'><img src='http://www.newlifeoffice.com/wp-content/themes/NewLifeOffice/images/landing/landing_logo.png'/></a>");
					//only need force for IE6
					
					jQuery("#bgpopup").css({
					"height": windowHeight
					});
					
					jQuery("#bgpopup").click(function () { 
					jQuery("#bgpopup").fadeOut("slow");
					  jQuery("#popup").fadeOut("slow");});
				  
				
			} 
			if (visitor_region == "NV" && location.href == "http://www.newlifeoffice.com/")
			{
				
								
					  jQuery("#bgpopup").css({
					  "opacity": "0.7"
					  });
					  jQuery("#bgpopup").fadeIn("slow");
					  jQuery("#popup").fadeIn("slow");
				
					
					
					var windowWidth = document.documentElement.clientWidth;
					var windowHeight = document.documentElement.clientHeight;
					var popupHeight = jQuery("#popup").height();
					var popupWidth = jQuery("#popup").width();
					//centering
					jQuery("#popup").css({
					"position": "absolute",
					"top": windowHeight/2-popupHeight/2,
					"left": windowWidth/2-popupWidth/2
					});
					jQuery("#popup").html("<h2><a href='http://www.newlifeoffice.com/las-vegas-office/'>Come see the New Las Vegas Home page</a></h2><br /><span><a href='http://www.newlifeoffice.com/las-vegas-office/'>Click here for Las Vegas Website</a></span><br /><h2>Website features include:</h2><ul><li>Refurbished Cubicles</li><li>Used Office Furniture in Stock</li><li>New Chairs, Desks, Tables and Filing</li></ul><br /><a href='http://www.newlifeoffice.com/las-vegas-office/'><img src='http://www.newlifeoffice.com/wp-content/themes/NewLifeOffice/images/landing/landing_logo.png'/></a>");
					//only need force for IE6
					
					jQuery("#bgpopup").css({
					"height": windowHeight
					});
					
					jQuery("#closePopUp").click(function () { 
					jQuery("#bgpopup").fadeOut("slow");
					  jQuery("#popup").fadeOut("slow");});
					 
					  
				
				
			}
			if (visitor_region == "ID" && location.href == "http://www.newlifeoffice.com/")
			{
									
					  jQuery("#bgpopup").css({
					  "opacity": "0.7"
					  });
					  jQuery("#bgpopup").fadeIn("slow");
					  jQuery("#popup").fadeIn("slow");
				
					
					
					var windowWidth = document.documentElement.clientWidth;
					var windowHeight = document.documentElement.clientHeight;
					var popupHeight = jQuery("#popup").height();
					var popupWidth = jQuery("#popup").width();
					//centering
					jQuery("#popup").css({
					"position": "absolute",
					"top": windowHeight/2-popupHeight/2,
					"left": windowWidth/2-popupWidth/2
					});
					jQuery("#popup").html("<h2><a href='http://www.newlifeoffice.com/boise-office/'>Come see the New Boise Home page</a></h2><span><a href='http://www.newlifeoffice.com/boise-office/'>Click here for Boise Website</a></span><br /><h2>Website features include:</h2><ul><li>Refurbished Cubicles</li><li>Used Office Furniture in Stock</li><li>New Chairs, Desks, Tables and Filing</li></ul><br /><a href='http://www.newlifeoffice.com/salt_lake/'><img src='http://www.newlifeoffice.com/wp-content/themes/NewLifeOffice/images/landing/landing_logo.png'/></a>");
					//only need force for IE6
					
					jQuery("#bgpopup").css({
					"height": windowHeight
					});
					
					jQuery("#closePopUp").click(function () { 
					jQuery("#bgpopup").fadeOut("slow");
					  jQuery("#popup").fadeOut("slow");});
					 
			} 
			

		}

});

