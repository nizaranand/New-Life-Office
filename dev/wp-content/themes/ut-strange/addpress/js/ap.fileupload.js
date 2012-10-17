jQuery(document).ready(function($){

	$( '.fileupload-file' ).live('change focus click', function(){
	    var $this=$( this );
	    if( $this.val() !== '' ){
		var $real = $this;
		var $clone = $real.clone( true );
		$real.hide();
		$clone.insertAfter( $real );
		
		$this.parent().find('.uploadstatus').html('<img src="'+theme_path+'/addpress/images/ajax-loader.gif" />uploading&#x85;').show().prevAll('.select-file').hide();
		$('#upload-form').append( $real );
		$('#upload-form').find('input[name="id"]').val($this.attr('data-id'));
		$('#upload-form').find('input[name="dir"]').val($this.attr('data-dir'));
		$('#upload-form').submit();
	    }
	});
	$('li.file-list-file').live( 'click', function(){
	    $(this).parents('.upload-wrap').children('.fileupload-destination').val( $(this).find('img').attr('src') ).stop(true,true).effect("highlight", {}, 3000);
	});
	$('.file-list-file a.delete-file').live( 'click', function(event){
	    event.preventDefault();
	    $this=$(this);
	    $s=$this.parents('.upload-wrap').find('.uploadstatus');
	    $.ajax({
		type: 'post',
		url: theme_path+'/addpress/includes/ap_fileupload.php',
		data: 'action=deletefile&file='+$this.attr('data-file')+'&homeurl='+home_url+'&templ='+template+'&upldir='+$this.parents('.upload-wrap').children('.fileupload-file').attr('data-dir'),
		success: function( ret ){
		    if( ret == 1 ){
			$s.html( 'File deleted.' ).show().delay(2000).fadeOut();
			var url = $this.parents('.file-list-file').find('img').attr('src');
			var uplclass = 'select.'+$this.parents('.selectset').children('select').attr('class');
			$(uplclass).children('option[value="'+url+'"]').remove();
			$(uplclass).parents('.selectset').apFancySelect();
		    }else{
			alert('Could not delete file. Check permissions.');
		    }
		}
	    });
	    return false;
	});
	$('.ap-upload-preview').live('mouseenter', function(e){
	    $this=$(this);
	    $('#ap-thumb-preview').stop(true,true).html( $this.parent('.ap-thumb').html() ).css({'top':e.pageY-50+'px', 'left':395-$('#ap-thumb-preview').outerWidth()+'px'}).delay(500).fadeIn()
	});
	$('.ap-upload-preview').live('mouseleave', function(e){
	    $('#ap-thumb-preview').stop(true,true).fadeOut('fast',function(){$(this).html('')});
	});
    });
    function ap_uploadEnd( status, id, message, li, uplclass ){
	id='#'+id;
	jQuery(id+'-upload').find('.select-file').show().prevAll('.fileupload-file').val('');
	if( status == 1 ){
	    jQuery(id+'-upload').find('.uploadstatus').html( message ).delay(2000).fadeOut();
	    $li = jQuery( li );
	    jQuery(uplclass).each(function(){
		if( '#'+jQuery(this).attr('id')==id )
		    $li.clone().attr('selected','selected').appendTo( jQuery(this) );
		else
		    $li.clone().appendTo( jQuery(this) );
	    });
	    jQuery(uplclass).parents('.selectset').apFancySelect();
	}else{
	    jQuery(id+'-upload').find('.uploadstatus').hide();
	    alert( message.replace('<br />', "\n") );
	}
	
    }