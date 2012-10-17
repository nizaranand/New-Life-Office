<?php
/* The loop */

/* Fetch admin options. */
global $options;
foreach ($options as $value) {
if(isset($value['id']) && isset ($value['std']))
	if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] );}
}

if ( !have_posts() ) : ?>
    <div id="post-0" <?php post_class(); ?>>
        <h2><?php _e( 'Not Found', 'cruz' ); ?></h2>
        <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'cruz' ); ?></p>
        <?php get_search_form(); ?>
    </div><!-- .post-0 -->
<?php endif;

while ( have_posts() ) : the_post(); 
			$post_opts = get_post_meta( $post->ID, 'post_options', true );
            $img = (isset($post_opts['thumb'])) ? $post_opts['thumb'] : '';
?>
        <div id="post-<?php the_ID();?>" <?php post_class('entry clearfix'); ?> >
            <h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <?php if(!is_search()) { // Hide post meta for search pages ?>
                <div class="meta-box"><?php cruz_posted_in(); ?></div>
                <?php the_content( __( 'Read more &rarr;', 'cruz' ), 'false' );
                wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'cruz' ), 'after' => '</div>' ) );
            } // Not Search
            elseif( is_search() ) { // Only show excerpts for search results
				the_excerpt();
            } ?>
        </div><!-- .entry -->
    <?php comments_template( '', true );
endwhile; // End the loop

if ( $wp_query->max_num_pages > 1 ) :?>
	<?php if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi();
    else {?>
    <div class="pagination">				
        <div class="prev"><?php next_posts_link( __( '&larr; Older Posts', 'cruz' ) ) ?></div>
        <div class="next"><?php previous_posts_link( __( 'Newer Posts &rarr;', 'cruz' ) ) ?></div>
    </div>			
    <?php }   
endif; ?>