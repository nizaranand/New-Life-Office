function embedshortcode() {
	
	var shortcodetext;
	var style = document.getElementById('shortcode_panel');
	

	if (style.className.indexOf('current') != -1) {
		var selected_shortcode = document.getElementById('style_shortcode').value;
		
		
		
/* ----- BASIC ----- */	

if (selected_shortcode == 'h1'){
	shortcodetext = "[h1]Title goes here...[/h1]<br />";	
}

if (selected_shortcode == 'h2'){
	shortcodetext = "[h2]Title goes here...[/h2]<br />";	
}

if (selected_shortcode == 'h3'){
	shortcodetext = "[h3]Title goes here...[/h3]<br />";	
}

if (selected_shortcode == 'h4'){
	shortcodetext = "[h4]Title goes here...[/h4]<br />";	
}

if (selected_shortcode == 'h5'){
	shortcodetext = "[h5]Title goes here...[/h5]<br />";	
}

if (selected_shortcode == 'h6'){
	shortcodetext = "[h6]Title goes here...[/h6]<br />";	
}



/* ----- HIGHLIGHTS ----- */

if (selected_shortcode == 'hl-red'){
	shortcodetext = "[hl-red]highlighted text goes here[/hl-red]";	
}

if (selected_shortcode == 'hl-lightred'){
	shortcodetext = "[hl-lightred]highlighted text goes here[/hl-lightred]";	
}

if (selected_shortcode == 'hl-yellow'){
	shortcodetext = "[hl-yellow]highlighted text goes here[/hl-yellow]";	
}

if (selected_shortcode == 'hl-green'){
	shortcodetext = "[hl-green]highlighted text goes here[/hl-green]";	
}

if (selected_shortcode == 'hl-grey'){
	shortcodetext = "[hl-grey]highlighted text goes here[/hl-grey]";	
}

if (selected_shortcode == 'hl-black'){
	shortcodetext = "[hl-black]highlighted text goes here[/hl-black]";	
}

if (selected_shortcode == 'hl-orange'){
	shortcodetext = "[hl-orange]highlighted text goes here[/hl-orange]";	
}

if (selected_shortcode == 'hl-pink'){
	shortcodetext = "[hl-pink]highlighted text goes here[/hl-pink]";	
}





/* ----- COLUMNS ----- */	

if (selected_shortcode == 'two_columns'){
	shortcodetext = "[one_half]<br />Content goes here...<br />[/one_half]<br /><br />[one_half_last]<br />Content goes here...<br />[/one_half_last]<br />";	
}

if (selected_shortcode == 'three_columns'){
	shortcodetext = "[one_third]<br />Content goes here...<br />[/one_third]<br /><br />[one_third]<br />Content goes here...<br />[/one_third]<br /><br />[one_third_last]<br />Content goes here...<br />[/one_third_last]<br />";	
}

if (selected_shortcode == 'four_columns'){
	shortcodetext = "[one_fourth]<br />Content goes here...<br />[/one_fourth]<br /><br />[one_fourth]<br />Content goes here...<br />[/one_fourth]<br /><br />[one_fourth]<br />Content goes here...<br />[/one_fourth]<br /><br />[one_fourth_last]<br />Content goes here...<br />[/one_fourth_last]<br />";	
}

if (selected_shortcode == 'five_columns'){
	shortcodetext = "[one_fifth]<br />Content goes here...<br />[/one_fifth]<br /><br />[one_fifth]<br />Content goes here...<br />[/one_fifth]<br /><br />[one_fifth]<br />Content goes here...<br />[/one_fifth]<br /><br />[one_fifth]<br />Content goes here...<br />[/one_fifth]<br /><br />[one_fifth_last]<br />Content goes here...<br />[/one_fifth_last]<br />";	
}

if (selected_shortcode == 'six_columns'){
	shortcodetext = "[one_sixth]<br />Content goes here...<br />[/one_sixth]<br /><br />[one_sixth]<br />Content goes here...<br />[/one_sixth]<br /><br />[one_sixth]<br />Content goes here...<br />[/one_sixth]<br /><br />[one_sixth]<br />Content goes here...<br />[/one_sixth]<br /><br />[one_sixth]<br />Content goes here...<br />[/one_sixth]<br /><br />[one_sixth_last]<br />Content goes here...<br />[/one_sixth_last]<br />";	
}

if (selected_shortcode == '3/4+1/4'){
	shortcodetext = "[three_fourth]<br />Content goes here...<br />[/three_fourth]<br /><br />[three_fourth_last]<br />Content goes here...<br />[/three_fourth_last]<br />";	
}

if (selected_shortcode == '2/3+1/3'){
	shortcodetext = "[two_thirds]<br />Content goes here...<br />[/two_thirds]<br /><br />[two_thirds_last]<br />Content goes here...<br />[/two_thirds_last]<br />";	
}


/* ----- LISTS ----- */	

if (selected_shortcode == 'check-list'){
	shortcodetext = "[check-list]<br />[li]List item goes here[/li]<br />[li]List item goes here[/li]<br />[li]List item goes here[/li]<br />[/check-list]";	
}

if (selected_shortcode == 'error-list'){
	shortcodetext = "[error-list]<br />[li]List item goes here[/li]<br />[li]List item goes here[/li]<br />[li]List item goes here[/li]<br />[/error-list]";	
}

if (selected_shortcode == 'info-list'){
	shortcodetext = "[info-list]<br />[li]List item goes here[/li]<br />[li]List item goes here[/li]<br />[li]List item goes here[/li]<br />[/info-list]";	
}

if (selected_shortcode == 'alert-list'){
	shortcodetext = "[alert-list]<br />[li]List item goes here[/li]<br />[li]List item goes here[/li]<br />[li]List item goes here[/li]<br />[/alert-list]";	
}

if (selected_shortcode == 'arrow-list'){
	shortcodetext = "[arrow-list]<br />[li]List item goes here[/li]<br />[li]List item goes here[/li]<br />[li]List item goes here[/li]<br />[/arrow-list]";	
}

if (selected_shortcode == 'download-list'){
	shortcodetext = "[download-list]<br />[li]List item goes here[/li]<br />[li]List item goes here[/li]<br />[li]List item goes here[/li]<br />[/download-list]";	
}


/* ----- ALERT BOXES ----- */	

if (selected_shortcode == 'alert-info'){
	shortcodetext = "[alert-info]<br />Type here your message<br />[/alert-info]";	
}

if (selected_shortcode == 'alert-success'){
	shortcodetext = "[alert-success]<br />Type here your message<br />[/alert-success]";	
}

if (selected_shortcode == 'alert-alert'){
	shortcodetext = "[alert-alert]<br />Type here your message<br />[/alert-alert]";	
}

if (selected_shortcode == 'alert-error'){
	shortcodetext = "[alert-error]<br />Type here your message<br />[/alert-error]";	
}

if (selected_shortcode == 'alert-download'){
	shortcodetext = "[alert-download]<br />Type here your message<br />[/alert-download]";	
}


/* ----- BUTTONS ----- */	

if (selected_shortcode == 'red-button'){
	shortcodetext = "[button text=' Button text ' url=' Paste url ' color=' #ff0000 ']";	
}

if (selected_shortcode == 'blue-button'){
	shortcodetext = "[button text=' Button text ' url=' Paste url ' color=' #0033cc ']";	
}

if (selected_shortcode == 'link-button'){
	shortcodetext = "[read-more type='link' url='#' ]";	
}

if (selected_shortcode == 'custom-button'){
	shortcodetext = "[button text=' Button text ' url=' Paste url ' color=' Paste color code ']";	
}

if (selected_shortcode == 'green-button'){
	shortcodetext = "[button text=' Button text ' url=' Paste url ' color=' #003300 ']";	
}

if (selected_shortcode == 'black-button'){
	shortcodetext = "[button text=' Button text ' url=' Paste url ' color=' #000000 ']";	
}

if (selected_shortcode == 'grey-button'){
	shortcodetext = "[button text=' Button text ' url=' Paste url ' color=' #cccccc']";	
}

if (selected_shortcode == 'orange-button'){
	shortcodetext = "[button text=' Button text ' url=' Paste url ' color=' #ff9900']";	
}


/* ----- IMAGES ----- */	

if (selected_shortcode == 'ifull'){
	shortcodetext = "[img type='full' <br />src='type here url to image' <br />title='Custom title' <br />alt='Custom alt']";	
}

if (selected_shortcode == 'imed'){
	shortcodetext = "[img type='med' <br />src='type here url to image' <br />title='Custom title' <br />alt='Custom alt']";
}

if (selected_shortcode == 'isquare'){
	shortcodetext = "[img type='square' <br />src='type here url to image' <br />title='Custom title' <br />alt='Custom alt']";
}

if (selected_shortcode == 'ismall'){
	shortcodetext = "[img type='small' <br />src='type here url to image' <br />title='Custom title' <br />alt='Custom alt']";
}

if (selected_shortcode == 'ithumb'){
	shortcodetext = "[img type='thumb' <br />src='type here url to image' <br />title='Custom title' <br />alt='Custom alt']";
}


/* ----- LIGHTBOX IMAGES ----- */	

if (selected_shortcode == 'full'){
	shortcodetext = "[image type='full' <br />url='type here url to full image' <br />src='type here url to full image or custom thumb image' <br />title='Custom title' <br />alt='Custom alt']";	
}

if (selected_shortcode == 'med'){
	shortcodetext = "[image type='med' <br />url='type here url to full image' <br />src='type here url to full image or custom thumb image' <br />title='Custom title' <br />alt='Custom alt']";	
}

if (selected_shortcode == 'square'){
	shortcodetext = "[image type='square' <br />url='type here url to full image' <br />src='type here url to full image or custom thumb image' <br />title='Custom title' <br />alt='Custom alt']";	
}

if (selected_shortcode == 'small'){
	shortcodetext = "[image type='small' <br />url='type here url to full image' <br />src='type here url to full image or custom thumb image' <br />title='Custom title' <br />alt='Custom alt']";	
}

if (selected_shortcode == 'thumb'){
	shortcodetext = "[image type='thumb' <br />url='type here url to full image' <br />src='type here url to full image or custom thumb image' <br />title='Custom title' <br />alt='Custom alt']";	
}





/* ----- LIGHTBOX VIDEO ----- */	

if (selected_shortcode == 'fullv'){
	shortcodetext = "[image type='full' <br />url='type here url to embed video (ex. http://player.vimeo.com/video/13526349 or http://www.youtube.com/v/lhEN6E2CCA8?version=3' <br />src='type here url to full image or custom thumb image' <br />title='Custom title' <br />alt='Custom alt']";	
}

if (selected_shortcode == 'medv'){
	shortcodetext = "[image type='med' <br />url='type here url to embed video (ex. http://player.vimeo.com/video/13526349 or http://www.youtube.com/v/lhEN6E2CCA8?version=3' <br />src='type here url to full image or custom thumb image' <br />title='Custom title' <br />alt='Custom alt']";
}

if (selected_shortcode == 'squarev'){
	shortcodetext = "[image type='square' <br />url='type here url to embed video (ex. http://player.vimeo.com/video/13526349 or http://www.youtube.com/v/lhEN6E2CCA8?version=3' <br />src='type here url to full image or custom thumb image' <br />title='Custom title' <br />alt='Custom alt']";	
}

if (selected_shortcode == 'smallv'){
	shortcodetext = "[image type='small' <br />url='type here url to embed video (ex. http://player.vimeo.com/video/13526349 or http://www.youtube.com/v/lhEN6E2CCA8?version=3' <br />src='type here url to full image or custom thumb image' <br />title='Custom title' <br />alt='Custom alt']";
}

if (selected_shortcode == 'thumbv'){
	shortcodetext = "[image type='thumb' <br />url='type here url to embed video (ex. http://player.vimeo.com/video/13526349 or http://www.youtube.com/v/lhEN6E2CCA8?version=3' <br />src='type here url to full image or custom thumb image' <br />title='Custom title' <br />alt='Custom alt']";	
}


/* ----- MEDIA ----- */	

if (selected_shortcode == 'youtube'){
	shortcodetext = "[youtube id=\"paste here youtube video ID\"  width=\"100%\"  height=\"auto\"]";	
}

if (selected_shortcode == 'vimeo'){
	shortcodetext = "[vimeo id=\"paste here vimeo video ID\"  width=\"100%\"  height=\"px\"]";	
}

/* ----- DIVIDERS ----- */	

if (selected_shortcode == 'hr'){
	shortcodetext = "[hr]<br />";	
}

/* ----- CONTACT FORM ----- */	

if (selected_shortcode == 'feedback-form'){
	shortcodetext = "[feedback-form]";	
}


	if ( selected_shortcode == 0 ){tinyMCEPopup.close();}}
	if(window.tinyMCE) {
		window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, shortcodetext);
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();
	}return;
}