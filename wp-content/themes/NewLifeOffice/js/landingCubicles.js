jQuery(function() {

	jQuery('#lasVegasProduct').html("");
	jQuery('#lasVegasProduct').css('border-bottom','none');

	var img;
	var hover = function(){ 
		img = jQuery(this).attr("src");
		var src = jQuery(this).attr("src").replace("2D", "3D");
		jQuery(this).attr("src", src);
	}

	var out = function(){
		jQuery(this).attr("src", img);
	}

	jQuery(".imgChange").hover(hover,out)
});
