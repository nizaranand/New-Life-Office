/**
 * This is the JS file for the page add/edit section
 * 
 * Author: Pexeto http://pexeto.com/
 */

var pexetoPageOptions={
		
	init:function(){
		this.setColorPickerFunc();
	},
	
	setColorPickerFunc:function(){
		//set the colorpciker to be opened when the input has been clicked
		
		jQuery('input.color').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				jQuery(el).val('#'+hex);
				jQuery(el).ColorPickerHide();
			},
			onBeforeShow: function () {
				jQuery(this).ColorPickerSetColor(this.value);
			}
		});
		
	}
};

jQuery(function(){
	pexetoPageOptions.init();
});


