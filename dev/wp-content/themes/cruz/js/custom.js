// -- CUSTOM FUNCTIONS AND EFFECTS --

// -- NO CONFLICT MODE

var $s = jQuery.noConflict();

$s(document).ready(function(){
								
	// -- HIDE IMAGES BEFORE LOADING
	
	$s(".foldify, .cycle_slider li, #nivo_slider").addClass('preload').find('img').hide();								
	
	
	// -- NAVIGATION MENU
	
	$s('.nav1 ul, .nav2 ul').css({display: "none"});
	$s('.nav1 li:has(ul), .nav2 li:has(ul)').addClass('has_child');
	$s('.nav1 li, .nav2 li').hover(function(){	
		$s(this).find('ul:first').css({visibility: "visible",display: "none"}).fadeIn(300);
	},
	function(){
		$s(this).find('ul:first').css({visibility: "visible",display: "none"});
	});	
	
	$s(".nav1 ul li:has(ul), .nav2 ul li:has(ul)").removeClass('has_child').addClass("arrow");
	
	$s(".nav1 ul li a, .nav2 ul li a").hover(
		function(){
			$s(this).animate({paddingLeft:"12px"},160);
		}, 
		function() {
			$s(this).animate({paddingLeft:"5px"},160);
		}
	);
	
	
	// -- ACCORDION
	
	$s('h5.handle').click(function() {
		$s(this).next().slideToggle(300);
		$s(this).toggleClass("activehandle");
		return false;
	}).next().hide();
	
	
	// -- FAQ
	
	$s('h5.question').click(function() {
		$s(this).next().slideToggle(300);
		$s(this).toggleClass("activeques");
		return false;
	}).next().hide();	
	
	
	// -- TOGGLE
	
	$s('h5.toggle').click(function() {
		$s(this).next().slideToggle(300);
		$s(this).toggleClass("activetoggle");
		return false;
	}).next().hide();	
	
	
	// -- PRETTYPHOTO INIT
	
	$s("a[rel^='prettyPhoto[group1]'], a[rel^='prettyPhoto[group2]'], a[rel^='prettyPhoto[inline]']").prettyPhoto()


	// -- TOP OF PAGE
	
	$s('.top').click(function(){ 
		$s('html, body').animate({scrollTop:0}, 500 ); 
		return false; 
	});
	

	// Box Close Button
	
	$s(".box").each(function(){
		$s(this).append('<span class="hide_box"></span>');
			$s(this).find('.hide_box').click(function(){
			$s(this).parent().hide();
		});
	});
	
}) // END DOCUMENT.READY

$s(window).load( function() {
	
	// -- SHOW IMAGES ON LOAD
	
	$s(".foldify, .cycle_slider li, #nivo_slider").removeClass('preload').find('img').fadeIn();
	
	// -- CYCLE SLIDER INIT
	
	$s('.cycle_slider').cycle({ 
		fx:     'fade', 
		speed:  400, 
		timeout: 4000, 
		next: '.next',  
		prev: '.prev',
		sync: 1,
		pause: 1,
		cleartype: true,
		pager:  '.cycle_nav', 
		pagerAnchorBuilder: function(idx, slide) { 
			return '<li><a href="#"></a></li>'; 
		} 
	});
	
	
	// -- SHOW/HIDE SLIDER CONTROLS
	
	$s('.show_desc').fadeIn();
	$s('.controls').hide();
	$s('.slider').hover(function(){
		$s('.controls').show();
	}, function() {
		$s('.controls').hide();
	});

	// -- Foldify Images
	
	$s(".foldify").append('<span class="fold_wrap"><span class="fold"></span></span>');
	$s(".fold_wrap").css({right:"-50px", bottom:"-50px"});
	$s(".fold").css({top:"-25px", left:"-25px"});
	$s(".foldify").each(function(){
		$s(this).hover(function(){
			$s(this).find(".fold_wrap").stop().animate({right:"0px", bottom:"0px"}, 300);
			$s(this).find(".fold").stop().animate({top:"0px", left:"0px"}, 300);
		}, function(){
			$s(this).find(".fold_wrap").stop().animate({right:"-50px", bottom:"-50px"}, 400);
			$s(this).find(".fold").stop().animate({top:"-25px", left:"-25px"}, 400);
		});
	});	
})