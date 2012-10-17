jQuery(document).ready(function() { 

jQuery('.90WideReceptionStation').click(function() {
			
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
					"left": windowWidth/2-popupWidth/2,
					"height": 315,
					"width": 560
					});
					jQuery("#popup").html("<iframe width='560' height='315' src='http://www.youtube.com/embed/XYDVgQ0fSVk' frameborder='0' allowfullscreen></iframe>");
				
					//only need force for IE6
					jQuery("#bgpopup").css({
					"height": windowHeight
					});
					
					jQuery("#bgpopup").click(function () { 
					jQuery("#bgpopup").fadeOut("slow");
				    jQuery("#popup").fadeOut("slow");});
		});

jQuery('.5x5BenchDesksfor4').click(function() {
			
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
					"left": windowWidth/2-popupWidth/2,
					"height": 315,
					"width": 560
					});
					jQuery("#popup").html("<iframe width='560' height='315' src='http://www.youtube.com/embed/aswmjIp91jw' frameborder='0' allowfullscreen></iframe>");
				
					//only need force for IE6
					jQuery("#bgpopup").css({
					"height": windowHeight
					});
					
					jQuery("#bgpopup").click(function () { 
					jQuery("#bgpopup").fadeOut("slow");
				    jQuery("#popup").fadeOut("slow");});
		});
 
jQuery('.BlackLobbychair').click(function() {
			
		 jQuery("#bgpopup").css({
					  "opacity": "0.7"
					  });
					  jQuery("#bgpopup").fadeIn("slow");
					  jQuery("#popup").fadeIn("slow");
					

					var windowWidth = jQuery(window).width();
					var windowHeight = jQuery(window).height();;
					var popupHeight = jQuery("#popup").height();
					var popupWidth = jQuery("#popup").width();
					//centering
					jQuery("#popup").css({
					"position": "absolute",
					"top": windowHeight/1.5-popupHeight/2,
					"left": windowWidth/2-popupWidth/2,
					"height": 315,
					"width": 560
					});
					jQuery("#popup").html("<iframe width='560' height='315' src='http://www.youtube.com/embed/D5KxHPl5UcM' frameborder='0' allowfullscreen></iframe>");
				
					//only need force for IE6
					jQuery("#bgpopup").css({
					"height": windowHeight
					});
					
					jQuery("#bgpopup").click(function () { 
					jQuery("#bgpopup").fadeOut("slow");
				    jQuery("#popup").fadeOut("slow");});
		});

});
