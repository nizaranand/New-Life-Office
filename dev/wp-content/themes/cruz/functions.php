<?php
/* Functions and definitions */

/* Load custom functions, widgets and options from various files.
 * Organizing different functions in different files makes it easy to modify them later.
*/ 

include_once('includes/cats_widget.php');
include_once('includes/recent_posts_widget.php');
include_once('includes/minifolio_widget.php');
include_once('includes/popular_posts_widget.php');
include_once('includes/recent_comments_widget.php');
include_once('includes/flickr_widget.php');
include_once('includes/social_links_widget.php');
include_once('includes/twitter_widget.php');
include_once('includes/mini_slider_widget.php');
include_once('includes/content_slider_widget.php');
include_once('includes/init_custom_widgets.php');
include_once('includes/post_options.php');
include_once('includes/page_options.php');
include_once('includes/theme_admin_options.php');
include_once('includes/shortcodes/shortcodes.php');
include_once('includes/shortcodes/visual_shortcodes.php');

if ( ! isset( $content_width ) )
	$content_width = 590;
	
/* Match Theme styles inside visual editor using editor-style.css */
add_editor_style();

/* The Theme allows users to set a custom background */
add_custom_background();

/* Add default posts and comments RSS feed links to head */
add_theme_support( 'automatic-feed-links' );

/* Add support for post thumbnails */
add_theme_support( 'post-thumbnails' );	

/* Make theme available for translation */
load_theme_textdomain( 'cruz', TEMPLATEPATH . '/languages' );

$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable( $locale_file ) )
	require_once( $locale_file );
	
/* Add support for wp_nav_menu() */
function register_my_menu() {
	register_nav_menu( 'primary', __( 'Primary Menu', 'cruz' ) );
	register_nav_menu( 'secondary', __( 'Secondary Menu', 'cruz' ) );
}
add_action( 'init', 'register_my_menu' );	


/* Create and register Sidebar Widgets */
function cruz_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Default Header Widget Area', 'cruz' ),
		'id' => 'default-header-bar',
		'description' => __( 'The default header widget area', 'cruz' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	) );

	register_sidebar( array(
		'name' => __( 'Default Featured Widget Area', 'cruz' ),
		'id' => 'default-feat-bar',
		'description' => __( 'The default featured widget area', 'cruz' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	) );

	register_sidebar( array(
		'name' => __( 'Default Sidebar', 'cruz' ),
		'id' => 'default-sidebar',
		'description' => __( 'The default primary widget area', 'cruz' ),
		'before_widget' => '<div class="widgetwrap">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Default Secondary Column 1', 'cruz' ),
		'id' => 'secondary-column-1',
		'description' => __( 'First column of secondary widget area', 'cruz' ),
		'before_widget' => '<div class="widgetwrap">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>'
	) );	

	register_sidebar( array(
		'name' => __( 'Default Secondary Column 2', 'cruz' ),
		'id' => 'secondary-column-2',
		'description' => __( 'Second column of secondary widget area', 'cruz' ),
		'before_widget' => '<div class="widgetwrap">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Default Secondary Column 3', 'cruz' ),
		'id' => 'secondary-column-3',
		'description' => __( 'Third column of secondary widget area', 'cruz' ),
		'before_widget' => '<div class="widgetwrap">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Default Secondary Column 4', 'cruz' ),
		'id' => 'secondary-column-4',
		'description' => __( 'Fourth column of secondary widget area', 'cruz' ),
		'before_widget' => '<div class="widgetwrap">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>'
	) );	

	$mypages = get_pages();
	$unique_header_bar = '';
	$unique_feat_bar = '';
	$unique_sidebar = '';
	$unique_secondarybar = '';
	
	foreach($mypages as $pp) {
		$page_opts = get_post_meta( $pp->ID, 'page_options', true );
		if (isset($page_opts['unique_header_bar']))
			$unique_header_bar = $page_opts['unique_header_bar'];
		if (isset($page_opts['unique_feat_bar']))
			$unique_feat_bar = $page_opts['unique_feat_bar'];	
		if (isset($page_opts['unique_sidebar']))
			$unique_sidebar = $page_opts['unique_sidebar'];	
		if (isset($page_opts['unique_secondarybar']))
			$unique_secondarybar = $page_opts['unique_secondarybar'];
		
		/* Register exclusive widget areas for each page */
		
		if ( $unique_header_bar ){
				register_sidebar( array(
					'name' => __( $pp->post_title.' Header Widget Area', 'cruz' ),
					'id' => $pp->ID.'-header-bar',
					'description' => sprintf( esc_attr__( '%s header widget area', 'cruz' ), $pp->post_title ),
					'before_widget' => '',
					'after_widget' => '',
					'before_title' => '',
					'after_title' => ''
				) );
		}		
		
		if ( $unique_feat_bar ){
				register_sidebar( array(
					'name' => __( $pp->post_title.' Featured Widget Area', 'cruz' ),
					'id' => $pp->ID.'-feat-bar',
					'description' => sprintf( esc_attr__( '%s featured widget area', 'cruz' ), $pp->post_title ),
					'before_widget' => '',
					'after_widget' => '',
					'before_title' => '',
					'after_title' => ''
				) );
		}		
		
		if ( $unique_sidebar ){
			register_sidebar( array(
				'name' => __( $pp->post_title.' Sidebar', 'cruz' ),
				'id' => $pp->ID.'-sidebar',
				'description' => sprintf( esc_attr__( '%s Sidebar', 'cruz' ), $pp->post_title ),
				'before_widget' => '<div class="widgetwrap">',
				'after_widget' => '</div>',
				'before_title' => '<h5>',
				'after_title' => '</h5>'
			) );
		}
		if ( $unique_secondarybar ){
			register_sidebar( array(
				'name' => __( $pp->post_title.' Secondary Column 1' ),
				'id' => $pp->ID.'-secondary-column-1',
				'description' => sprintf( esc_attr__( 'Secondary Column 1 of %s', 'cruz' ), $pp->post_title ),
				'before_widget' => '<div class="widgetwrap">',
				'after_widget' => '</div>',
				'before_title' => '<h5>',
				'after_title' => '</h5>'
			) );	
		
			register_sidebar( array(
				'name' => __( $pp->post_title.' Secondary Column 2' ),
				'id' => $pp->ID.'-secondary-column-2',
				'description' => sprintf( esc_attr__( 'Secondary Column 2 of %s', 'cruz' ), $pp->post_title ),
				'before_widget' => '<div class="widgetwrap">',
				'after_widget' => '</div>',
				'before_title' => '<h5>',
				'after_title' => '</h5>'
			) );
			
			register_sidebar( array(
				'name' => __( $pp->post_title.' Secondary Column 3' ),
				'id' => $pp->ID.'-secondary-column-3',
				'description' => sprintf( esc_attr__( 'Secondary Column 3 of %s', 'cruz' ), $pp->post_title ),
				'before_widget' => '<div class="widgetwrap">',
				'after_widget' => '</div>',
				'before_title' => '<h5>',
				'after_title' => '</h5>'
			) );
			
			register_sidebar( array(
				'name' => __( $pp->post_title.' Secondary Column 4' ),
				'id' => $pp->ID.'-secondary-column-4',
				'description' => sprintf( esc_attr__( 'Secondary Column 4 of %s', 'cruz' ), $pp->post_title ),
				'before_widget' => '<div class="widgetwrap">',
				'after_widget' => '</div>',
				'before_title' => '<h5>',
				'after_title' => '</h5>'
			) );			

		}
	}
}
add_action( 'widgets_init', 'cruz_widgets_init' );

/* Cruz Comments List */
if ( ! function_exists( 'cruz_comments' ) ) :
	function cruz_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div class="commentwrapper clearfix <?php $author_id = get_the_author_meta('ID'); if($author_id == $comment->user_id) $author_flag = 'true';?>" id="comment-<?php comment_ID(); ?>">
            <div class="author-card">
				<?php $dir = get_template_directory_uri();
                $default_avatar = $dir . '/images/default_avatar.jpg';
                echo get_avatar( $comment, $size='64', $default = $default_avatar ); ?>
            </div>
            <div class="comment_data">
                <p class="comment_meta"><span class="comment_author_link"><?php comment_author_link(); ?></span><span class="comment-date"><?php printf( __( '%1$s at %2$s', 'cruz' ), get_comment_date(),  get_comment_time() );?></span><span class="comment-reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => __( 'Reply', 'cruz' )))); ?></span><?php edit_comment_link( __( 'Edit', 'cruz' ), '<span class="edit_comment">', '</span>' ); if (isset($author_flag) && ($author_flag == 'true')) { ?><span class="author_comment"><?php _e( 'Author', 'cruz' ); ?></span><?php }?></p>
                <?php if ($comment->comment_approved == '0') : ?><p><em><?php _e( 'Your comment is awaiting moderation.', 'cruz' ); ?></em></p><?php endif;
                comment_text(); ?>
            </div><!-- .comment-data -->
		</div><!-- .commentwrapper -->  
<?php }
endif; //if not function exists cruz comments

/* Related Posts on single post pages */
function cruz_related_posts( $crz_rp_taxonomy, $crz_rp_style, $crz_rp_num ) {
	$temp = (isset($post)) ? $post : '';
	global $post;
	if ( $crz_rp_taxonomy == 'tags' )
	{
		$tags = wp_get_post_tags($post->ID);
		if ($tags) {
			$tag_ids = array();
			foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
			$args=array(
				'tag__in' => $tag_ids,
				'post__not_in' => array($post->ID),
				'posts_per_page'=> $crz_rp_num,
				'ignore_sticky_posts'=>1
			);
		} // end if tags	
	} //end taxonomy tags 
	else
	{
		$categories = get_the_category($post->ID);
		if ($categories) {
			$category_ids = array();
			foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;		
			$args=array(
			'category__in' => $category_ids,
			'post__not_in' => array($post->ID),
			'posts_per_page'=> $crz_rp_num,
			'ignore_sticky_posts'=>1
			);
		} // end if categories
	} // end taxonomy categories
		$new_query = new WP_Query( $args );
		$list_class = ( $crz_rp_style == 'thumbnail' ) ? 'related_posts' : 'related_list';
		if( $new_query->have_posts() ) { ?>	
			<div class="entry clearfix">
            <h4 class="single_headings"><?php _e( 'Related Posts', 'cruz' ); ?></h4><ul class="<?php echo $list_class; ?> clearfix">				
		<?php while( $new_query->have_posts() ) {
				$new_query->the_post(); ?>				
				<li><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permanent link to %s', 'cruz' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php
				$post_opts = get_post_meta( $post->ID, 'post_options', true);
				$img = (isset($post_opts['thumb'])) ? $post_opts['thumb'] : '' ;
				if ( $crz_rp_style == 'thumbnail' ) { ?><img src="<?php 
				if ( $img != '' ) {
				echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo $img; ?>&amp;w=64&amp;h=64&amp;zc=1&amp;q=100<?php }
				else { echo get_template_directory_uri(); ?>/images/post_thumb.jpg" <?php } ?> alt="<?php the_title(); ?>"/>
				<?php } else the_title(); ?></a></li>
			<?php } // while have posts
			echo '</ul></div>';
		} // if have posts
	$post = $temp;
	wp_reset_query();
}

/* Show meta information for posts */
function cruz_posted_in() {          
	printf( __( '<span class="date">%1$s</span><span class="author">%3$s</span><span class="cats">%2$s</span>', 'cruz' ), get_the_time('F j, Y'), get_the_category_list( ', ' ), sprintf( '<a href="%1$s" title="%2$s">%3$s</a>', get_author_posts_url( get_the_author_meta( 'ID' ) ), sprintf( esc_attr__( 'View all posts by %s', 'cruz' ), get_the_author() ), get_the_author() ));?><span class="comment_link"><?php comments_popup_link( __( '0', 'cruz' ), __( '1', 'cruz' ), __( '%', 'cruz' ) );?></span><?php edit_post_link( __( 'Edit', 'cruz' ), '<span class="edit">', '</span>' );
}

function cruz_attachment_meta() {          
	printf( __( '<span class="date">%1$s</span><span class="author">%2$s</span>', 'cruz' ), get_the_time('F j, Y'), sprintf( '<a href="%1$s" title="%2$s">%3$s</a>', get_author_posts_url( get_the_author_meta( 'ID' ) ), sprintf( esc_attr__( 'View all posts by %s', 'cruz' ), get_the_author() ), get_the_author() ));?></span><?php edit_post_link( __( 'Edit', 'cruz' ), '<span class="edit">', '</span>' );
	if ( wp_attachment_is_image() ) {
								$metadata = wp_get_attachment_metadata();
								printf( __( '<span class="size">Full size is %s pixels</span>', 'cruz' ),
									sprintf( '<a href="%1$s" title="%2$s">%3$s &times; %4$s</a>',
										wp_get_attachment_url(),
										esc_attr( __( 'Link to full-size image', 'cruz' ) ),
										$metadata['width'],
										$metadata['height']
									)
								);
							}						
}

// Shorten Any Text
function short($text, $limit)
{
	$chars_limit = $limit;
	$chars_text = strlen($text);
	$text = strip_tags($text);
	$text = $text." ";
	$text = substr($text,0,$chars_limit);
	$text = substr($text,0,strrpos($text,' '));
	if ($chars_text > $chars_limit)
	{
		$text = $text."...";
	}
	return $text;
}

//Thanks to dimox for this awesome breadcrumbs logic. http://dimox.net
function crz_breadcrumbs(){
$delimiter = '/';
  $name = __( 'Home', 'cruz' ); //text for the 'Home' link
  $currentBefore = '<span class="current">';
  $currentAfter = '</span>';
 
  if ( !is_home() && !is_front_page() || is_paged() ) { 
    global $post;
    $home = home_url();
    echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $currentBefore . __( 'Archive by category', 'cruz' ) . ' &#39;';
      single_cat_title();
      echo '&#39;' . $currentAfter;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('d') . $currentAfter;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('F') . $currentAfter;
 
    } elseif ( is_year() ) {
      echo $currentBefore . get_the_time('Y') . $currentAfter;
 
    } elseif ( is_single() ) {
      $cat = get_the_category(); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_search() ) {
      echo $currentBefore . __( 'Search results for', 'cruz' ) . ' &#39;' . get_search_query() . '&#39;' . $currentAfter;
 
    } elseif ( is_tag() ) {
      echo $currentBefore . __( 'Posts tagged', 'cruz' ) .' &#39;';
      single_tag_title();
      echo '&#39;' . $currentAfter;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $currentBefore . __( 'Articles posted by ', 'cruz' ) . $userdata->display_name . $currentAfter;
 
    } elseif ( is_404() ) {
      echo $currentBefore . __( 'Error 404', 'cruz' ) . $currentAfter;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_page() ) echo ' (';
      echo __( 'Page', 'cruz' ) . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_page() ) echo ')';
    }
   }
}

/* Dynamic Page Titles on Featured Area */
function crz_page_titles(){
	if ( !is_home() && !is_front_page() || is_paged() ) { 
		if ( is_category() ) {
			single_cat_title();
		} 
		elseif ( is_day() ) {
			_e( 'Daily Archives', 'cruz' );
		} 
		elseif ( is_month() ) {
			_e( 'Monthly Archives', 'cruz' );
		} 
		elseif ( is_year() ) {
			_e( 'Yearly Archives', 'cruz' );
		} 
		elseif ( is_single() && !is_attachment() ) {
			$cat = get_the_category(); $cat = $cat[0];
			echo get_category_parents( $cat, false, '' );
		} 
		elseif ( is_page() ) {
			the_title();
		}  
		elseif ( is_search() ) {
			_e( 'Search Results', 'cruz' );
		} 
		elseif ( is_tag() ) {
			_e( 'Tag Archives', 'cruz' );
		} 
		elseif ( is_author() ) {
			_e( 'Author Archives', 'cruz' ); 
		}
		elseif ( is_404() ) {
			_e( 'Error 404', 'cruz' );
		}
		elseif ( is_attachment() ) {
		_e( 'Attachments', 'cruz' );
		}		
	}
}

/* Remove auto DIV container on WP Menus */
function my_wp_nav_menu_args( $args = '' )
{
	$args['container'] = false;
	return $args;
}
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );


//Shortcodes autoformatting prevention
//http://www.wprecipes.com/disable-wordpress-automatic-formatting-on-posts-using-a-shortcode
function my_formatter($content) {
	$new_content = '';
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	foreach ($pieces as $piece) {
		if (preg_match($pattern_contents, $piece, $matches)) {
			$new_content .= $matches[1];
		} else {
			$new_content .= wptexturize(wpautop($piece));
		}
	}
	return $new_content;
}
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');
add_filter('the_content', 'my_formatter', 99);

function new_field($fields) {
$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$fields =  array(
	'author' => '<p class="comment-form-author">' . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /><label for="author">' . __( 'Name', 'cruz' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '</p>',
	'email'  => '<p class="comment-form-email"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /><label for="email">' . __( 'Email', 'cruz' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '</p>',
	'url'    => '<p class="comment-form-url"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /><label for="url">' . __( 'Website', 'cruz' ) . '</label></p>',
	);
return $fields;
}
// the filter required to do so
add_filter('comment_form_default_fields','new_field');

// Enable short codes inside Widgets
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');
?>