<?php

/**
 * Template for posts & pages comments
 *
 * @package WordPress
 * @subpackage ut-strange
 * @since Strange 1.0
 */


if ( 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )
    die('Direct access to "comments.php" not allowed!');
if( is_page() )
    $taxonomy = 'pages';
elseif( is_single() )
    $taxonomy = 'blog';
$comment_count = $ping_count = 0;

?>
	
<h4 class="trigger" id="comments"><a class="fancy_link"><?php echo __('Show Comments', UT_THEME_NAME ); ?></a></h4>

    <?php
	if ( ! empty($post->post_password) ) :
	    if ( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) :
    ?>
    <div class="toggle_container grid_8">
	<div class="notice_comments_password"><?php _e( do_shortcode( get_option(UT_THEME_INITIAL.$taxonomy.'_reading_txt_passcomm') ), UT_THEME_NAME ) ?></div>
    </div>
    <?php
		return;
	    endif;
	endif;
    ?>

<div class="toggle_container grid_8">
	<?php
	    foreach( $comments as $comment )
		$comment->comment_type != '' ? $ping_count++ : $comment_count++;
	?>

	<h4><?php $comment_count; printf( ( $comment_count==0 ? __('<span class="theme_color">No</span> Comments', UT_THEME_NAME ) : ( $comment_count==1 ? __('<span class="theme_color">One</span> Comment', UT_THEME_NAME ) : __('<span class="theme_color">%d</span> Comments', UT_THEME_NAME ) ) ), $comment_count ); ?></h4>

	<?php if ( get_comment_pages_count() > 1 ) : ?>
	<div id="comments-nav-above" class="comments-navigation">
	    <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
	</div>
	<?php endif; ?>

	
	<?php if($comment_count>0):
	    $args = array( 'style' => 'div', 'callback' => 'custom_comments', 'type' => 'comment' ); ?>
	<div class="commentlist">
	    <?php wp_list_comments($args); ?>
	</div>
	<?php endif; ?>

	<hr />

	<?php if ( get_comment_pages_count() > 1 ) : ?>
	<div id="comments-nav-below" class="comments-navigation">
	    <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
	</div>
	<?php endif; ?>

	<?php if( 'closed' == $post->comment_status ): ?>
	<h3 id="reply-title"><span class="clear"></span><?php echo __('<span class="theme_color">Add</span> Comment', UT_THEME_NAME ); ?></h3>
	<div class="notice_comments_closed"><p><?php echo __( do_shortcode( get_option(UT_THEME_INITIAL.$taxonomy.'_reading_txt_commentsclosed') ), UT_THEME_NAME ) ?></p></div>
	<?php else:
	global $aria_req;
	$args =  array(
	    'fields' => array(
		'author' => '<ul class="cform"><li><label for="name">' . __( 'Name', UT_THEME_NAME ) . ( $req ? '<span class="required theme_color">*</span>' : '' ).'</label> ' .
			    '<input data-rule="maxlen:3" data-msg="'.esc_attr(get_option( UT_THEME_INITIAL.'general_comments_error_name' )).'" id="name" class="fancyinput" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="22" tabindex="1"' . $aria_req . ' /><div class="valmsg"></div></li>',
		'email'  => '<li><label for="email">' . __( 'Email', UT_THEME_NAME ) . ( $req ? '<span class="required theme_color">*</span>' : '' ) . '</label> ' .
			    '<input id="email" data-rule="email" data-msg="'.esc_attr(get_option( UT_THEME_INITIAL.'general_comments_error_mail' )).'" class="fancyinput" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="22" tabindex="2"' . $aria_req . ' /><div class="valmsg"></div></li>',
		'url'    => '<li><label for="website">' . __( 'Website', UT_THEME_NAME ) . '</label>' .
			    '<input id="website" class="fancyinput" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="22" tabindex="3" /></li>',
	    ),
	    'comment_field' =>	'<li><label for="message">' . __( 'Message', UT_THEME_NAME ) . '</label>'.
				'<textarea name="comment" data-rule="maxlen:1" data-msg="'.esc_attr(get_option( UT_THEME_INITIAL.'general_comments_error_message' )).'" id="message" class="fancyinput" rows="10" cols="65" tabindex="4"></textarea><div class="valmsg"></div></li></ul>',
	    'must_log_in'   =>	'<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
	    'logged_in_as'  =>	'<ul class="cform"><li><label>'.__('Logged in as', UT_THEME_NAME ).'&nbsp;<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>.&nbsp;<a href="'.wp_logout_url(get_permalink()).'" title="'.__('Log out of this account', UT_THEME_NAME ).'">'.__('Log out', UT_THEME_NAME ).'</a></label></li>',
	    'comment_notes_before' => '<p class="comment-notes">' . __( do_shortcode( get_option(UT_THEME_INITIAL.'general_reading_txt_commentsmail') ), UT_THEME_NAME ) . ( $req ? __( do_shortcode( get_option(UT_THEME_INITIAL.'general_reading_txt_commentsreq') ),UT_THEME_NAME ) : '' ) . '</p>',
	    'comment_notes_after'  => '<!--<p class="form-allowed-tags">' . sprintf( __(do_shortcode(get_option(UT_THEME_INITIAL.'general_reading_txt_commentstags')), UT_THEME_NAME).' %s', ' <code>' . allowed_tags() . '</code>' ) . '</p><div class="clear"></div>-->',
	    'title_reply'	=> '<span class="clear"></span>'.__( '<span class="theme_color">Add</span> comment', UT_THEME_NAME ),
	    'title_reply_to'	=> __( 'Reply to %s', UT_THEME_NAME )
	);
	comment_form( $args );
	endif; ?>

	<?php if($ping_count>0):
	    $args = array( 'style' => 'div', 'callback' => 'custom_trackbacks', 'type' => 'pings' ); ?>
	<hr />
	<h4><?php printf($ping_count > 1 ? __('<span class="theme_color">%d</span> Trackbacks', UT_THEME_NAME ) : ( $ping_count == 1 ? __('<span class="theme_color">One</span> Trackback', UT_THEME_NAME) : __('<span class="theme_color">No</span> Trackbacks', UT_THEME_NAME) ), $ping_count ) ?></h4>
	<div class="commentlist">
	<?php wp_list_comments($args); ?>
	</div>
	<?php endif; ?>

</div>

<div class="clear"></div>