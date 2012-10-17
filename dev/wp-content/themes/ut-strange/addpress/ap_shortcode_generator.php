<?php

//Split path to locate wordpress root!
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];

// Access to WordPress
require_once( $path_to_wp . '/wp-load.php' );
require_once( 'ap_shortcodes.php' );

function ap_get_option_element( $name, $attr_opt, $type, $code ){
    switch( $attr_opt['type'] ){
	CASE 'radio':
	    $return .= '<strong>'.$attr_opt['title'].': </strong><br />';
	    foreach( $attr_opt['opt'] as $val => $title ){
		$return .= '
		    <input class="attr" type="radio" data-attrname="'.$name.'" name="'.$code.'-'.$name.'" value="'.$val.'" id="sc-opt-'.$code.'-'.$name.'-'.$val.'"'.($val==$attr_opt['def']?' checked="checked"':'').'>
		    <label for="sc-opt-'.$code.'-'.$name.'-'.$val.'">'.$title.'</label>&nbsp;&nbsp;';
	    }
	    break;
	CASE 'color':
		$return .= '
		    <strong>'.$attr_opt['title'].': </strong>
		    <div class="option" style="margin:0 0 .5em 0">
			<input type="text" data-attrname="'.$name.'" id="colorpicker-'.$name.'" value="'.$attr_opt['def'].'" class="attr color" maxlength="11" style="width:100px" /><div class="cp" id="'.$name.'-colpick" style="background-color:'.$attr_opt['def'].'"></div>
		    </div>';
		break;
	CASE 'custom':
	    if( $name == 'item' ){
		$return .= '
		<br /><strong>List Items:</strong><br />
		<div class="sc-list-items" id="options-item" data-name="item" data-type="s">
		    <div><input class="sc-list-item" type="text" name="" /><a href="#" class="button remove-list-item">-</a></div>
		</div>
		<a href="#" style="line-height:3em;" class="button add-list-item">Add Item</a>';
	    }elseif( $type == 'c' ){
		$return .= '
		<input type="checkbox" class="lastcolumn" id="'.$code.'-lastcolumn" /><label for="'.$code.'-lastcolumn"><strong>Last column</strong></label>';
	    }elseif( $name == 'videoid' ){
		$return .= '
		<label for="'.$name.'-videoid"><strong>Video&ndash;ID: </strong></label><br />
		<input class="video-id" id="'.$name.'-videoid" type="text" />';
	    }elseif( $name == 'number' ){
		$return .= '
		<label for="'.$name.'-iconnum"><strong>Number: </strong></label><br />
		<select id="'.$name.'-iconnum" class="icon-number">';
		for( $i=1; $i<=9; $i++ ){
		    $return .= '
		    <option value="'.$i.'">'.$i.'</option>';
		}
		$return .= '
		</select>';
	    }elseif( $name == 'heading' ){
		$return .= '
		<label for="'.$name.'-num"><strong>Heading: </strong></label><br />
		<select id="'.$name.'-num" class="head-number">';
		for( $i=1; $i<=6; $i++ ){
		    $return .= '
		    <option value="'.$i.'">'.$i.'</option>';
		}
		$return .= '
		</select>';
	    }elseif( $name == 'customname' ){
		$return .= '<input type="text" id="custom-box-name">';
	    }
	    break;
	CASE 'text':
	DEFAULT:
	    $return .= '
		<label for="sc-opt-'.$name.'"><strong>'.$attr_opt['title'].': </strong></label><br />
		<input class="attr" type="text" data-attrname="'.$name.'" value="'.$attr_opt['def'].'" />';
	    break;
    }
    if( isset($attr_opt['desc']) && !empty($attr_opt['desc']) )
	$return .= '<p class="description">'.$attr_opt['desc'].'</p>';
    else
	$return .= '<br />';
    
    return $return;
}

$shortcodes = $ap_shortcodes;

$htmlselect = '
<div style="padding:10px 0; font-size: 8pt; line-height: 1.5em;">
    <label for="ap-shortcodes"><strong>Select Shortcode:</strong></label>&nbsp;
    <select id="ap-shortcodes">';
foreach( $shortcodes as $code => $options ){
	$htmlselect .= '
	<option value="'.$code.'" data-clabel="'.$options['clabel'].'">'.$options['title'].'</option>';
	$htmloptions .= '
	<div class="sc-options" id="options-'.$code.'" style="display:none;" data-name="'.$code.'" data-type="'.$options['type'].'">';
	if( isset($options['attr']) ){
	    foreach( $options['attr'] as $name => $attr_opt ){
		$htmloptions .= '<br />'.ap_get_option_element( $name, $attr_opt, $options['type'], $code );
	    }
	}
	$htmloptions .= '
	</div>';
}
$htmlselect .= '
    </select>
    <div class="hr" style="margin:1em 0 1em 0; border-bottom:1px solid #999;"></div>';
?>



<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Shortcode Generator</title>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/addpress/css/colorpicker.css" />
	<script type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/jquery/jquery.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/addpress/js/colorpicker.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>

<style type="text/css">
.description{margin-top:-.5em; }
input.color{float:left; margin-top:3px;}
input[type="text"], textarea, select, #insert-shortcode{ padding: 5px; }
.description{ margin: 3px 0 0 0; color: #666; font-style: italic; }
.cp{
    width: 28px;
    height: 28px;
    background: url(<?php echo get_template_directory_uri(); ?>/addpress/images/select2.png) center;
    float: left;
    z-index:9;
    margin:0;
}
</style>

<script type="text/javascript">

jQuery(document).ready(function($){

    var editor = tinyMCE.activeEditor;
    var content = editor.selection.getContent();
    $('#sc-content textarea').val( content );
    
    preview_shortcode();

    $('#insert-shortcode').click(function(){

	editor.selection.setContent( $('#shortcode-preview-o').text() + $('#shortcode-preview-m').text() + $('#shortcode-preview-c').text() );
	tinyMCEPopup.close();
	return false;
    });

    $( '#ap-shortcodes' ).change(function(){

	$( '.sc-options' ).hide();
	$( '#options-'+$(this).val() ).show();

	var datatype = $('#options-'+$(this).val()).attr('data-type');
	if( datatype == 'e' || datatype == 'c' ){
	    $('#sc-content').show().find('textarea').val( content );
	    if($(this).children('option:selected').attr('data-clabel')!='' )
		$('#clabel').html( $(this).children('option:selected').attr('data-clabel')+':' );
	    else
		$('#clabel').html( 'Content:' );
	}else{
	    $('#sc-content textarea').val('').parent().hide();
	}
	preview_shortcode();
    });

    $('#sc-content textarea').keyup(function(){
	preview_shortcode();
    });

    $('.sc-options input.attr').live('keyup click', function(){
	preview_shortcode();
    });

    $('#options-box input[type="radio"]').click(function(){
	$this=$(this);
	if( $this.val()=='custom' ){
	    $('#custom-box-name').attr('data-attrname','style').addClass('attr');
	    $('#options-box input[type="radio"]').attr('data-attrname','temp').removeClass('attr');
	}else{
	    $('#options-box input[type="radio"]').attr('data-attrname','style').addClass('attr');
	    $('#custom-box-name').attr('data-attrname','temp').removeClass('attr');
	}
	preview_shortcode();
    });
 
    $('.add-list-item').click(function(){
	$(this).prevAll('div').append( '<div><input class="sc-list-item" type="text" name="" /><a href="#" class="button remove-list-item">-</a></div>' );
	return false;
    });
    $('.remove-list-item').live('click', function(){
	$(this).parent().remove();
	list_items_code();
	return false;
    });
    $('.sc-list-item').live('keyup', function(){
	list_items_code();
    });
    
    $('.video-id').keyup(function(){
	$('#shortcode-preview-m').html( $(this).val() );
    });
    $('.icon-number').change(function(){
	preview_shortcode( $(this).val() );
    });
    $('.head-number').change(function(){
	preview_shortcode( $(this).val() );
    });
    $('.lastcolumn').click(function(){
	if( $(this).attr('checked')=='checked' )
	    preview_shortcode( '_last' );
	else
	    preview_shortcode();
    });

    $('.cp, .color').live('click',function(){
	$this=$(this);
	$this.ColorPicker({
	    color: '#FF0000',
	    onBeforeShow: function(){ elID = this; },
	    onShow: function (colpkr) { $(colpkr).show().css( 'z-index', $('#TB_window').css('z-index')+1 ); return false; },
	    onHide: function (colpkr) { $(colpkr).hide(); },
	    onChange: function (hsb, hex, rgb) {
		$(elID).parents('.option').find('.cp').css('backgroundColor', '#'+hex);
		$(elID).parents('.option').find('input').val('#'+hex.toUpperCase());
		preview_shortcode();
	    }
	}).live('keyup',function(){
	    $this = $(this);
	    if( $this.hasClass('color') )
		$this.ColorPickerSetColor( $this.val().replace('#','') ).parents('.option').find('.cp').css( 'background-color', $this.val() );
	}).css('z-index','999999').click();
    });

    function list_items_code(){
	var code = '';
	$('.sc-list-items input').each(function(){
	    if( $(this).val() != '' )
		code += ' [item]'+$(this).val();
	});
	$('#shortcode-preview-m').html( code );
    }
    function preview_shortcode( add ){
	
	name = $('#ap-shortcodes').val();
	add=add||'';
	if((name=='num'||name=='h') && add=='') add='1';

	var code = '['+name;
	if( $('#options-'+name).attr('data-type')=='c' ){
	    if( $('#options-'+name+' input.lastcolumn').attr('checked') == 'checked' )
		add = '_last';
	}
	code += add;
	$('#options-'+name+' input.attr').each(function(){
	    $this = $(this);
	    switch( $this.attr('type') ){
		case 'text':
		    code += ' '+$this.attr('data-attrname')+'="'+$this.val()+'"';
		    break;
		case 'radio':
		case 'checkbox':
		    if( $this.attr('checked')=='checked' )
			code += ' '+$this.attr('data-attrname')+'="'+$this.val()+'"';
		    break;
	    }
	});
	code += ']';

	datatype=$('#options-'+name).attr('data-type');
	if( datatype=='s' ){
	    $('#shortcode-preview-m').html( '' );
	}else{
	    if( datatype!='m' )
		$('#shortcode-preview-m').text(  $('#sc-content textarea').val() );
	}
	$('#shortcode-preview-o').html( code );
	if( $('#options-'+name).attr('data-type') != 's' )
	    $('#shortcode-preview-c').html( '[/'+name+add+']' );
	else
	    $('#shortcode-preview-c').html( '' );

	if(name=='button')
	    $('#sg-result').show().html('<style type="text/css">#previewbutton { color: '+$('#colorpicker-text').val()+' !important; background-color: '+$('#colorpicker-background').val()+' !important; border:0; border-right:2px solid '+$('#colorpicker-border').val()+' !important; }#previewbutton:hover { color: '+$('#colorpicker-text_h').val()+' !important; background-color: '+$('#colorpicker-background_h').val()+' !important; border-color: '+$('#colorpicker-border_h').val()+' !important; }</style><input id="previewbutton" type="button" value="'+$('#sc-content textarea').val()+'" style="'+$('input[data-attrname="css"]').val()+'" /><br />');
	else
	    $('#sg-result').hide();

    }
});
</script>

</head>
<body>
<?php
echo $htmlselect;
echo $htmloptions;
echo '
    <div id="sc-content" style="display:none;"><br />
	<label id="clabel" for="sc-content" style="font-weight:bold;"></label><br />
	<textarea id="" style="width:250px; height:100px;"></textarea>
	<div class="hr" style="margin:1em 0 1em 0; border-bottom:1px solid #999;"></div>
    </div>
    <style type="text/css">
	#previewbutton{
	    -moz-border-bottom-colors: none;
	    -moz-border-image: none;
	    -moz-border-left-colors: none;
	    -moz-border-right-colors: none;
	    -moz-border-top-colors: none;
	    border-radius: 3px 3px 3px 3px;
	    box-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
	    cursor: pointer;
	    display: inline-block;
	    overflow: hidden;
	    padding: 3px 10px;
	    -moz-transition: all 0.3s ease-in-out 0s;
	    font-family: "PTSansBold",sans-serif;
	    font-size: 11px;
	    font-weight: 400;
	    text-transform: uppercase;
	    width: auto;
	    margin: 0 0 10px 0;
	}
    </style>
    <span id="sg-result"></span>
    <code><span id="shortcode-preview-o" style=""></span><span id="shortcode-preview-m"></span><span id="shortcode-preview-c" style=""></span></code>
    <div class="hr" style="margin:1em 0 1em 0; border-bottom:1px solid #999;"></div>
    <input class="button-primary" id="insert-shortcode" value="insert shortcode" type="button">
</div>';
?>
</body>
</html>