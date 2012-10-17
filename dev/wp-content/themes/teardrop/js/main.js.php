<script type="text/javascript">
jQuery(function($) {

  // z-index order fix
  $(function() {
    var zIndexNumber = 1000;
    $('div').each(function() {
      $(this).css('zIndex', zIndexNumber);
      zIndexNumber-=1;
    });
  });
  $("#pp_overlay").css('zIndex', 1001);
  
  $(".footer .social a, .magic-zoom a, .magic-link a").tipsy({gravity:'sw',fade:true});
  $("#fullscreen a").tipsy({gravity:'w',fade:true});
  $("#stop_audio a").tipsy({gravity:'e',fade:true});
  
  //masonry 
	var $container = $('#magic-box');
	$container.imagesLoaded( function(){
	  $container.masonry({
		itemSelector : '.masonry-container',
		gutterWidth : 5
	  });
	});

	$('.article-portfolio, .magic-box').masonry({
	  itemSelector: '#threecol, #twocol, .masonry-container'
	});

	$('.magic-detail')
	.mouseenter(function(){$(this).stop().animate({opacity:'0.8'}, 300);})
    .mouseleave(function(){$(this).stop().animate({opacity:0}, 100)});

  // nav-top dropdown
  $(".nav-top .sub-menu-wrapper").hide();
  $(".nav-top li")
    .mouseenter(function(){$(this).find('.sub-menu-wrapper:first').stop(true,true).slideDown(300)})
    .mouseleave(function(){$(this).find('.sub-menu-wrapper:first').fadeOut(1)});
	
  $(".nav-top .sub-menu-wrapper")
    .mouseenter(function(){$(this).parents('li').addClass('active')})
    .mouseleave(function(){$(this).parents('li').removeClass('active')});
	
  $(".main").draggable({handle:"#drag_btn",opacity: 0.6});
  
  	$("#fullscreen").toggle(function(){	
	$(this).addClass("minimize");
	$(".footer, .header").animate({opacity:0},150,function(){$("#thumb-tray").animate({opacity:0.9},300, function () {$("#prevslide, #nextslide").animate({opacity:0.6},"fast",function(){$(".footer,.header").hide();}).show();}).show();}); 
	$("#fullscreen a").attr('title', 'Normal mode');
	},
	function() {
	$("#thumb-tray").animate({opacity:0},"fast",function(){$(this).hide()});
	$("#prevslide, #nextslide").animate({opacity:0},"fast").hide();
	$(".footer, .header").show().animate({opacity:0.9},"fast");
	$(this).removeClass("minimize");
	$("#fullscreen a").attr('title', 'Fullscreen mode');
	});	
	
	$("#slide_btn").toggle(function(){	
	var m_width = $(".title-wrapper h1").width() +130;
	$(this).addClass("slide_btn_active");
	$(".content").slideUp("normal",function(){$(".main").animate({width: m_width},"normal").animate({opacity:0.6},"fast", 
	function() {$(".footer, .header").animate({opacity:0},150, 
	function(){$("#thumb-tray").animate({opacity:0.9},200,
	function(){$("#prevslide, #nextslide").animate({opacity:0.6},"fast").show(
	function (){$(".footer,.header").hide()
	;});}).show();});});});	
	},
	function() {
	$(".main").animate({width: 800, opacity:1},"normal", function(){$(".content").slideDown("slow");}); 
	$("#thumb-tray").animate({opacity:0},"fast",function(){$(this).hide()});
	$("#prevslide, #nextslide").animate({opacity:0},"fast").hide();
	$(".footer, .header").show().animate({opacity:0.9},"fast");
	$(this).removeClass("slide_btn_active");
	});	
	$('.header .sub-menu li ul').parent('li').addClass('sublevel');
	
//flickr

$('.teardrop_social_widget a img, .teardrop-flickr-widget img, .attachment-thumbnail').each(function(){
      $(this).animate({opacity:'1'},1);
      $(this).mouseover(function(){
          $(this).stop().animate({opacity:'0.6'},400);
      });
      $(this).mouseout(function(){
          $(this).stop().animate({opacity:'1'},350);
      });
});

	//buttons
$('.button').each(function(){
      $(this).animate({opacity:'1'},1);
      $(this).mouseover(function(){
          $(this).stop().animate({opacity:'0.8'},50);
      });
      $(this).mouseout(function(){
          $(this).stop().animate({opacity:'1'},50);
      });
});  

  // title description
  var currdesc=$("#menu-nav-top .current-menu-item a");
  if(currdesc.length) $(".title-wrapper .desc").html(currdesc.attr('title'));

  // cufon font replacement
  Cufon.replace("h1, h2, h3, h4, h5, h6, .desc, #time-data #day, #time-data #month", {
  hover: true,
    fontFamily: '<?php echo get_option("teardrop_theme_font_headers1")?>'
  });
  Cufon.replace("#time-data #day, #time-data #month", {
  hover: true,
    fontFamily: '<?php echo get_option("teardrop_theme_font_date")?>'
  });
  Cufon.replace(".nav-top-wrapper .nav-top li a", {
  hover: true,
    fontFamily: '<?php echo get_option("teardrop_theme_font_headers2")?>'
  });

  // prettyPhoto image box
  $("a[class^='prettyPhoto']").prettyPhoto();
  $("a[rel='prettyPhoto'], a.prettyPhoto, a.hover, a")
    .mouseenter(function(){$(this).find(".zoom").stop().css({opacity:0}).animate({opacity:'0.8'}, 300); this.style.filter=""})
    .mouseleave(function(){$(this).find(".zoom").stop().animate({opacity:0}, 300)});
  $("a[rel='prettyPhoto'], a.prettyPhoto")
    .prettyPhoto();
  $("a[rel='prettyPhoto'].video, a.prettyPhoto.video")
    .prettyPhoto({iframe:true, innerWidth:'640px', innerHeight:'390px'});
  $(".preload img").css({opacity:1}).one('load', function(){
    $(this).animate({opacity:1}, 1200).parents(".preload").css('background-image','none');
  }).each(function(){
    if(this.complete)
    $(this).stop().css({opacity:1}).parents(".preload").css('background-image','none');
  });
  
  $("a[rel^='prettyPhoto']").prettyPhoto({
            animationSpeed: '<?php echo get_option("teardrop_theme_lightbox_speed")?>',
            opacity: <?php echo get_option("teardrop_theme_lightbox_opacity")?>,
            counter_separator_label: '/', 
			<?php echo get_option("teardrop_theme_lightbox_social")?>
            theme: '<?php echo get_option("teardrop_theme_lightbox_theme")?>' 
        });
  
  jQuery.each(jQuery.browser, function(i) {
        if($.browser.msie && $.browser.version.substr(0,1)<9){
            $('.preload img').css({opacity:''});
        }
    });

  // feedback form handling
  $(".feedback :input").each(function(){
    if(this.type=='text' || this.type=='textarea'){
      if(!$(this).attr('title').length) return false;

      $(this).val($(this).attr('title'));
      $(this)
        .focus(function(){if($(this).val()==$(this).attr('title')) $(this).val('');})
        .blur(function(){if($(this).val()=='' || $(this).val()==$(this).attr('title')) $(this).val($(this).attr('title'));});
    }
  })
  function clear_form(form){
    $(form).find(':input').each(function(){
      switch(this.type){
        case 'password':
        case 'select-multiple':
        case 'select-one':
        case 'text':
        case 'textarea':
          $(this).val('');
          break;
        case 'checkbox':
        case 'radio':
          this.checked = false;
          break;
      }
    });
  }
  $(".feedback .form-submit .submit").live("click", function(e){
    var form=$(this).parent().parent();
    var to = form.find(".to").val();
    var name = form.find(".name").val();
    var email = form.find(".email").val();
    var message = form.find(".message").val();
    
    if(!name.length || !email.length || name==form.find(".name").attr('title') || email==form.find(".email").attr('title')){
      $(".feedback .alert").text("Please input your Name and Email first");
      return false;
    }
    
    var ajax_url = '<?php echo admin_url("admin-ajax.php")?>';
    var data = {
      action: 'of_ajax_feedback_action',
      to: to,
      name: name,
      email: email,
      message: message
    };
    $.post(ajax_url, data, function(response){
      $(".feedback .alert").text("<?php echo get_option('teardrop_theme_feedback_message')?>");
      clear_form(form);
    });

    return false;
  })
  
  //IPad/IPhone fix
  if(navigator.platform == 'iPad' || navigator.platform == 'iPhone' || navigator.platform == 'iPod')
	{
     $(".footer").css("position", "static");
	};
	
	//Audio player
	<?php $audio=get_post_meta($post->ID, '_audio_value', true)?>;
	$("#audio").jPlayer( {
	ready: function () {
	$(this).jPlayer("setMedia", {mp3: "<?php echo get_post_meta($post->ID, '_audio_value', true) ?>"}).jPlayer("play");
	},
    swfPath: "<?php echo $turl ?>/js/jplayer/"
    });
	
	$('.pause').toggle(function() {
  $("#audio").jPlayer("pause");
  $("#stop_audio a").attr('title', 'Play audio');
	}, function() {
  $("#audio").jPlayer("play");
  $("#stop_audio a").attr('title', 'Pause audio');
	});



	//bg-images
	$.supersized({
		//Functionality
	startwidth: 640,  
	startheight: 480,
	vertical_center: 1,
	navigation: 0,
	thumbnail_navigation:       0,	   
	progress_bar			:	1,			// Timer for each slide							
	mouse_scrub				:	1,
	slide_links				:	'blank',	// Individual links for each slide (Options: false, 'number', 'name', 'blank')
	thumb_links				:	1,			// Individual thumb links for each slide
	slideshow               :   1,		//Slideshow on/off
	autoplay				:	1,		//Slideshow starts playing automatically
	start_slide             :   <?php echo get_option("teardrop_theme_fullscreen_start_slide")?>,		//Start slide (0 is random)
	random					: 	0,
	slide_interval          :   <?php echo get_option("teardrop_theme_fullscreen_delay")?>,
	transition              :   <?php echo get_option("teardrop_theme_fullscreen_effect")?>,
	transition_speed		:	<?php echo get_option("teardrop_theme_fullscreen_transition")?>,
	pause_hover             :   0,		//Pause slideshow on hover
	keyboard_nav            :   <?php echo get_option("teardrop_theme_fullscreen_nav_keyb")?>,
	performance				:	<?php echo get_option("teardrop_theme_fullscreen_performance")?>,
	image_protect			:	<?php echo get_option("teardrop_theme_fullscreen_protect")?>,
	slide_counter: 0,
	slide_captions: 0,
	<?php if (get_option('teardrop_theme_fullscreen_stream')=='supersized.flickr.js') {?>
	source					:	2,
	user					:	'<?php echo get_option("teardrop_theme_sflickr_userid")?>',
	total_slides			:	<?php echo get_option("teardrop_theme_sflickr_icount")?>,
	image_size              :   '<?php echo get_option("teardrop_theme_sflickr_isize")?>',
	api_key					:	'<?php echo get_option("teardrop_theme_sflickr_api")?>',
	<?php }?>
	image_path				:	'../i/',
	<?php if (get_option('teardrop_theme_fullscreen_stream')=='supersized.js') {?>
	slides:[
		<?php wp_reset_query(); ?>
		<?php 
		$tti=0; 
		query_posts(array('post_type'=>'slide','posts_per_page'=>-1)); while(have_posts()): the_post(); if ($tti) echo ',';
		$tti++;
		?>
		<?php $full = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
		$bg_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'teardrop-slide');
		echo "{image:'"; echo $full[0] ; echo "',thumb:'";echo $bg_thumb[0] ; echo "'}"?>
		<?php endwhile?>
		<?php wp_reset_query(); ?>]
	<?php }?>
			});

<?php   $video=get_post_meta($post->ID, '_video_bg_value', true); ?>
<?php if ($video!="") :?>
var w_height = $(document).height();
var w_width = $(document).width();
jwplayer("player").setup({
flashplayer: "<?php echo $turl ?>/jwplayer/player.swf",
file: "<?php echo get_post_meta($post->ID, '_video_bg_value', true) ?>",
controlbar: 'none',
stretching: "fill",
autostart: true,
bufferlength: 3,
repeat: "none",
events: { onComplete: function() {
jwplayer("player").remove();
$("#video_bg").remove();
} },
height: w_height,
width: w_width 
});

<?php endif?>
}); 				
</script>


