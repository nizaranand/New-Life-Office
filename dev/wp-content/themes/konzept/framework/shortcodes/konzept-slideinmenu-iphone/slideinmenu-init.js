jQuery(document).ready(function() {
	if(navigator.userAgent.toLowerCase().match(/(iphone|ipod)/)){
		var header_height = jQuery('#header').height();
		jQuery('#header').css({ 'position' : 'absolute', top: ~header_height+50 });
		jQuery('#header').append('<div class="handle"><div class="handle-pattern"></div></div>');
		menu = new slideInMenu('header',true);
	}
});