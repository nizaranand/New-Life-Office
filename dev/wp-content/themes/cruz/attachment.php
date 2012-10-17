<?php
/* Attachmemnt Template */

/* Fetch admin options. */
global $options;
foreach ($options as $value) {
if(isset($value['id']) && isset ($value['std']))
	if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] );}
}
get_header(); ?>
		<?php if (have_posts()) :
			while (have_posts()) : the_post(); ?>
                <div id="post-<?php the_ID(); ?>" class="entry clearfix">
                    <h2><?php the_title(); ?></h2>
                    <div class="meta-box"><?php cruz_attachment_meta(); ?></div>
                    <p class="small"><?php if ( wp_attachment_is_image() ) :
                    $attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
                    foreach ( $attachments as $k => $attachment ) {
                    if ( $attachment->ID == $post->ID )
                    break;
                    }
                    $k++;
                    // If there is more than 1 image attachment in a gallery
                    if ( count( $attachments ) > 1 ) {
                    if ( isset( $attachments[ $k ] ) )
                    // get the URL of the next image attachment
                    $next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
                    else
                    // or get the URL of the first image attachment
                    $next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
                    } else {
                    // or, if there's only 1 image attachment, get the URL of the image
                    $next_attachment_url = wp_get_attachment_url();
                    }
                    ?>
                    <p class="attachment"><a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php
                    echo wp_get_attachment_image( $post->ID, array( 590, 999 ), true ); // filterable image width with, essentially, no limit for image height.
                    ?></a></p>                    
                    <?php else : ?>
                    <a href="<?php echo wp_get_attachment_url(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php echo basename( get_permalink() ); ?></a>
                    <?php endif; ?>                    
                    <div class="entry-caption"><?php if ( !empty( $post->post_excerpt ) ) the_excerpt(); ?></div>
                    <?php the_content( __( 'Read more &rarr;', 'cruz' ) ); ?>
                </div><!-- .entry -->
                <?php comments_template( '', true );               
			endwhile; // end of the loop.
        else : ?>
            <h2><?php _e( 'Not Found', 'cruz' ); ?></h2>
            <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'cruz' ); ?></p>
        <?php endif; ?>
        <div class="pagination">
            <div class="prev"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'cruz' ) . '</span> Previous Post' ); ?></div>
            <div class="next"><?php next_post_link( '%link', 'Next post<span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'cruz' ) . '</span>' ); ?></div>
        </div><!-- .pagination -->
    </div><!-- .content -->            
	<?php
	$sidebar_opts = '';
	if ( is_page() ) {
			$page_opts = get_post_meta( $post->ID, 'page_options', true );
            $sidebar_opts = $page_opts['sidebar_opts'];
	}
	if ( ( $sidebar_opts == 'right' ) && ( !( $sidebar_opts == 'left' || $sidebar_opts == 'none' ) ) ){
		get_sidebar();
	}
	elseif ( ( $crz_sidebar == 'right' ) && ( !( $sidebar_opts == 'left' || $sidebar_opts == 'none' ) ) ) {
		get_sidebar();
	}
	?>
    </div><!-- .primary_wrap --> 
</div><!-- .primary -->     
<?php get_footer(); ?>