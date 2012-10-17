<?php
/* Header Template */

/* Fetch admin options. */
global $options;
foreach ($options as $value) {
if(isset($value['id']) && isset ($value['std']))
if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] );}
}
$dir = get_template_directory_uri();
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="keywords" content="<?php echo $crz_meta_keywords; ?>" />
<title><?php global $page, $paged; wp_title( '|', true, 'right' ); bloginfo( 'name' ); $site_description = get_bloginfo( 'description', 'display' ); if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description"; ?></title>
<link rel="shortcut icon" href="<?php echo $dir ?>/favicon.ico"/>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />        

<!-- STYLE SHEETS -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>"/>      	
<link rel="stylesheet" type="text/css" href="<?php echo $dir; ?>/css/prettyPhoto.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $dir; ?>/css/nivo-slider.css" />

<!--[if IE]>
<link rel="stylesheet" type="text/css" href="<?php echo $dir; ?>/css/ie.css" >
<![endif]-->

<?php
wp_enqueue_script('jquery');
wp_enqueue_script('tabber', $dir.'/js/tabs.js', array('jquery-ui-core', 'jquery-ui-tabs'), '1.0');
if ( is_singular() && get_option('thread_comments') )
	wp_enqueue_script('comment-reply');
wp_enqueue_script("jq-cycle", $dir."/js/jquery.cycle.all.min.js"); 
wp_enqueue_script("jq-nivo", $dir."/js/jquery.nivo.slider.pack.js");
wp_enqueue_script("jq-pretty-photo", $dir."/js/jquery.prettyPhoto.js");
wp_enqueue_script("jq-validate", $dir."/js/jquery.validate.pack.js");
wp_enqueue_script("contact-form", $dir."/js/form_.js");
wp_enqueue_script("custom", $dir."/js/custom.js");
wp_enqueue_script("nivo-init", $dir."/js/nivo_init.js");
wp_head();
?> 

<!-- GOOGLE ANALYTICS -->
<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
	var pageTracker = _gat._getTracker("<?php echo $crz_analytics;?>");
	pageTracker._trackPageview();
</script>

<?php include_once('includes/load_styles.php'); ?>       
</head>
<body <?php if(isset($class)) body_class($class); ?>>
    <div class="header">
        <div class="header_wrap">
            <div class="brand"><?php if ( $crz_blog_name == 'true' ){ ?>                
            <h1 class="blogname"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo('name') ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1><span class="tagline"><?php bloginfo('description'); ?></span>
            <?php }
            else { ?>
            <a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr( get_bloginfo('name') ); ?>" rel="home"><img src=<?php if ( $crz_logo != '' ) echo ( '"'.$crz_logo.'"'); else { echo ('"'.$dir.'/images/logo.png"' );} ?> alt="<?php bloginfo('name'); ?>" /></a><?php } ?>
            </div><!-- .brand -->
            <div class="header_wgt_area">
			<?php if (is_page()) {
					$page_opts = get_post_meta( $posts[0]->ID, 'page_options', true );
					$unique_header_bar = (isset($page_opts['unique_header_bar'])) ? $page_opts['unique_header_bar'] : '';
					if ( $unique_header_bar )
					{
						if ( is_active_sidebar( $posts[0]->ID.'-header-bar') )
							dynamic_sidebar( $posts[0]->ID.'-header-bar' );						
					}
					else {
						if ( is_active_sidebar( 'default-header-bar' ) )
							dynamic_sidebar( 'default-header-bar' ); 
					}
				} // is_page
				else // other pages like single, search, archives
				{			
					if ( is_active_sidebar( 'default-header-bar' ) )
						dynamic_sidebar( 'default-header-bar' ); 
				}
			?> 
            </div><!-- .header_wgt_area -->
        </div><!-- .header_wrap -->
        <div class="utility">
            <div class="utility_wrap clearfix">
            <?php wp_nav_menu( array( 'container' => 'none', 'menu_class' => 'nav1', 'theme_location' => 'primary' ) ); ?>
            <?php wp_nav_menu( array( 'container' => 'none', 'menu_class' => 'nav2', 'theme_location' => 'secondary' ) ); ?>
            </div><!-- .utility_wrap -->
        </div><!-- .utility -->
    </div><!-- .header --> 
    <?php
    if( !( $crz_hide_slider == 'true' ) ):
		if( is_home() || is_front_page() ):?>   
            <div class="featured">
                <div class="slider_wrap clearfix">
					<?php if ( $crz_slider_type == 'cycle' ) { // Begin Cycle Slider ?>
                    <div class="slider">
						<?php
                        $crz_feat_cat_id = empty($crz_feat_cat_id) ? '1' : $crz_feat_cat_id ;
                        $slide_args = array( 'showposts' => $crz_num_of_slides, 'cat'=> $crz_feat_cat_id, 'order' => $crz_feat_order );
                        $temp = $post;
                        $blogdir = get_template_directory_uri();
                        global $post;
                        $slideshow_query = new WP_Query($slide_args); ?> 
                        <ul class="cycle_slider"><?php 
                            if( $slideshow_query->have_posts() ):
								while ($slideshow_query->have_posts()): $slideshow_query->the_post();
									$post_opts = get_post_meta( $post->ID, 'post_options', true);
									$img = (isset($post_opts['thumb'])) ? $post_opts['thumb'] : '';
									$caption = (isset($post_opts['caption'])) ? $post_opts['caption'] : '';
									$hide_caption = (isset($post_opts['hide_caption'])) ? $post_opts['hide_caption'] : '';
									$img_link = (isset($post_opts['img_link'])) ? $post_opts['img_link'] : '';
									$no_link = (isset($post_opts['no_link'])) ? $post_opts['no_link'] : '';								
									$title = get_the_title(); 
									$perma = get_permalink();?>
                                    <li><?php if($img):
									if( $no_link != 'true' ) { // If image links enabled ?>									
                                        <a href="<?php if($img_link) echo $img_link; else the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><img class="slide_img" src="<?php echo $dir; ?>/scripts/timthumb.php?src=<?php echo $img; ?>&amp;w=960&amp;h=<?php echo $crz_sl_ht; ?>&amp;zc=1&amp;q=100" alt="<?php the_title(); ?>"/></a>                                    
                                    <?php } 
									else { // If image links disabled ?>									
                                        <img class="slide_img" src="<?php echo $dir; ?>/scripts/timthumb.php?src=<?php echo $img; ?>&amp;w=960&amp;h=<?php echo $crz_sl_ht; ?>&amp;zc=1&amp;q=100" alt="<?php the_title(); ?>"/>									
									<?php }
									if( $hide_caption != 'true' ) { ?>
									<div class="show_desc">
									<?php if( $caption != '')
										echo $caption;
									else 
										the_title(); ?>
									</div>                                
									<?php }								
									endif; //img ?>
									</li>
								<?php endwhile; 
                            endif;
                            $post = $temp;
                            wp_reset_query();
                            ?>                    
                        </ul><!-- .cycle_slider -->
                        <ul class="cycle_nav"></ul>
                        <div class="controls">
                            <a class="prev" href="#" title="Previous"></a>
                            <a class="next" href="#" title="Next"></a>
                        </div><!-- .controls -->
                    </div><!-- .slider -->
                    <?php } // End Cycle Slider 
                    else { // Begin Nivo Slider ?>
                    <div class="nivo_wrapper">
						<?php
                        $crz_feat_cat_id = empty($crz_feat_cat_id) ? '1' : $crz_feat_cat_id ;
                        $slide_args = array( 'showposts' => $crz_num_of_slides, 'cat'=> $crz_feat_cat_id, 'order' => $crz_feat_order );
                        $temp = $post;
                        $blogdir = get_template_directory_uri();
                        global $post;
                        $slideshow_query = new WP_Query($slide_args); ?> 
                        <div id="nivo_slider">
							<?php
                            $slides = 1;
							$format = '';
                            if( $slideshow_query->have_posts() ):
								while ($slideshow_query->have_posts()): $slideshow_query->the_post();
									$post_opts = get_post_meta( $post->ID, 'post_options', true);
									$img = (isset($post_opts['thumb'])) ? $post_opts['thumb'] : '';
									$caption = (isset($post_opts['caption'])) ? $post_opts['caption'] : '';
									$hide_caption = (isset($post_opts['hide_caption'])) ? $post_opts['hide_caption'] : '';
									$img_link = (isset($post_opts['img_link'])) ? $post_opts['img_link'] : '';
									$no_link = (isset($post_opts['no_link'])) ? $post_opts['no_link'] : '';	
									$title = get_the_title(); 
									$perma = get_permalink();?>
									<?php if($img):
                                    if( $no_link != 'true' ) { // If image links enabled ?>                                    
                                    <a class="nivo-imageLink" href="<?php if($img_link) echo $img_link; else the_permalink(); ?>"><img class="slide_img" src="<?php echo $dir; ?>/scripts/timthumb.php?src=<?php echo $img; ?>&amp;w=960&amp;h=<?php echo $crz_sl_ht; ?>&amp;zc=1&amp;q=100" alt="<?php the_title(); ?>" <?php if( $hide_caption != 'true' ) { ?> title="<?php if( $caption != '') { echo( '#caption'.$slides ); $format .= '<div id="caption'.$slides.'" class="nivo-html-caption">'.$caption.'</div>'; } else the_title(); ?>"<?php } //hide caption ?> /></a><?php }
									else { // If image links disabled ?>									
<img class="slide_img" src="<?php echo $dir; ?>/scripts/timthumb.php?src=<?php echo $img; ?>&amp;w=960&amp;h=<?php echo $crz_sl_ht; ?>&amp;zc=1&amp;q=100" alt="<?php the_title(); ?>" <?php if( $hide_caption != 'true' ) { ?> title="<?php if( $caption != '') { echo( '#caption'.$slides ); $format .= '<div id="caption'.$slides.'" class="nivo-html-caption">'.$caption.'</div>'; } else the_title(); ?>"<?php } //hide caption ?> />
									<?php }									
									 endif; //img ?>
									<?php $slides += 1;                                
								endwhile; 
                            endif;
                            $post = $temp;
                            wp_reset_query();
                            ?> 
                        </div><!-- #nivo_slider -->
                        <?php echo $format; ?>
                    </div><!-- .nivo_wrapper -->
                    <?php } // Nivo Slider ?>            
                </div><!-- .slider_wrap -->
            </div><!-- .featured -->
            <?php 
		endif; // If on Home
    endif; // If not Hide Slider ?>    
    <?php if( is_page() && (!is_home() && !is_front_page()) ){
		$page_opts = get_post_meta( $posts[0]->ID, 'page_options', true );
		$custom_caption = (isset($page_opts['custom_caption'])) ? $page_opts['custom_caption'] : '';
		$cust_embed = (isset($page_opts['cust_embed'])) ? $page_opts['cust_embed'] : '';
		$hide_feat = (isset($page_opts['hide_feat'])) ? $page_opts['hide_feat'] : '';
		if( !$hide_feat ) {	
	?>   
    <div class="featured">
        <div class="featured_wrap clearfix <?php if ( $cust_embed ) echo ( 'custom_embed' ); ?>">
		<?php
        if( $cust_embed ) { // Custom Page Header or Flash Embed
		echo stripslashes( $cust_embed );
		}
		else {		
		?>
            <div class="page_titles">
                <h1><?php if( $custom_caption ) echo( $custom_caption ); else crz_page_titles(); ?></h1>
            </div>
            <div class="feat_widget_area">
				<?php 
                $unique_feat_bar = (isset($page_opts['unique_feat_bar'])) ? $page_opts['unique_feat_bar'] : '';
                if ( $unique_feat_bar )
                {
                    if ( is_active_sidebar( $posts[0]->ID.'-feat-bar') ) :
                        dynamic_sidebar( $posts[0]->ID.'-feat-bar' );
                    endif;
                }
                else
                {			
                    if ( is_active_sidebar( 'default-feat-bar' ) ) :
                        dynamic_sidebar( 'default-feat-bar' ); 
                    endif; 
                }?> 
            </div><!-- .feat_widget_area -->
            <?php } // Not Custom embed ?>
            </div><!-- .featured_wrap -->
    </div><!-- .featured -->
    <?php } // Hide Featured
	} // Featured Area
	elseif(!is_home() && !is_front_page()) { // Normal Pages like single, search, archives ?>
        <div class="featured">
            <div class="featured_wrap clearfix">
                <div class="page_titles">
                    <h1><?php crz_page_titles(); ?></h1>
                </div>
                <div class="feat_widget_area">
					<?php
                    if ( is_active_sidebar( 'default-feat-bar' ) ) :
                    dynamic_sidebar( 'default-feat-bar' ); 
                    endif; 
                    ?> 
                </div><!-- .feat_widget_area -->
            </div><!-- .featured_wrap -->
        </div><!-- .featured -->
	<?php } ?>
    <div class="primary">
    <div class="primary_wrap">           
    <?php 
    $content_class = 'content';
	$full_width = '';
	$sidebar_opts = '';
	$is_full = '';
    if ( is_page() ) {
		$page_opts = get_post_meta( $posts[0]->ID, 'page_options', true );
		$sidebar_opts = (isset($page_opts['sidebar_opts'])) ? $page_opts['sidebar_opts'] : '';
    }
    
    if ( $sidebar_opts == 'none' || ( $crz_sidebar == 'none' && ( !( $sidebar_opts == 'right' || $sidebar_opts == 'left' ) ) ) ) {
			$full_width = 'true';
    }            
    if ( $full_width == 'true' || is_page_template('port3.php') || is_page_template('port4.php') || is_search() || is_404() ) {
		$is_full = 'true';
		$content_class = 'content wide';				
    }            
    if ( ( $sidebar_opts == 'left' ) && ( !( $sidebar_opts == 'right' || $sidebar_opts == 'none' ) ) && !$is_full ){
		$content_class = 'content right';    
		get_sidebar(); ?>
		<div class="<?php echo $content_class; ?>">
		<?php  }			
		elseif ( ( $crz_sidebar == 'left' ) && ( !( $sidebar_opts == 'right' || $sidebar_opts == 'none' ) ) && !$is_full ) {
		$content_class = 'content right';
		get_sidebar();?>
		<div class="<?php echo $content_class; ?>">
		<?php  } 
		else { ?>
		<div class="<?php echo $content_class; ?>">
		<?php }?>