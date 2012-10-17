<?php
/* Comments Template */

/* Fetch Theme Admin Options */
global $options;
foreach ($options as $value) {
if(isset($value['id']) && isset($value['std']))
if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] );}
}
?>
<div id="comments" class="entry">
	<?php if ( post_password_required() ) : ?>
    <p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'cruz' ); ?></p>
</div><!-- #comments -->
<?php
return;
endif;
if ( have_comments() ) : ?>
    <h4 id="comments-title" class="single_headings"><?php printf( _n( 'One Comment', '%1$s Comments', get_comments_number(), 'cruz' ), number_format_i18n( get_comments_number() ) ); ?></h4>
    <ol class="commentlist"><?php wp_list_comments( array( 'callback' => 'cruz_comments' ) ); ?></ol>
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
    <div class="pagination">
        <div class="prev"><?php previous_comments_link( __( '&larr; Older Comments', 'cruz' ) ); ?></div>
        <div class="next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'cruz' ) ); ?></div>
    </div><!-- .pagination -->
    <?php endif; // comment navigation
    else :
		if ( ! comments_open() ) : ?>
            <p class="nocomments"><?php _e( 'Comments are closed.', 'cruz' ); ?></p>
		<?php endif; // end ! comments_open()
	endif; // end have_comments()

if ( comments_open() ) :
	$custom_args = array( 'title_reply' => __( 'Leave a reply', 'cruz' ), 'comment_notes_after'  => '', 'comment_field'        => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea><label for="comment">' . _x( 'Comment*', 'cruz' ) . '</label></p>' );
	comment_form($custom_args);
endif; ?>
</div><!-- #comments -->