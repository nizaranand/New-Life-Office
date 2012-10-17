<?php
/* Single Posts Template */

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
                <div class="meta-box"><?php cruz_posted_in(); ?></div>
				<?php the_content();
					$tags_list = get_the_tag_list( '', ', ' );
					if ( $tags_list ) { ?>
                        <p class="small"><?php printf( __( 'Tagged %1$s', 'cruz' ), $tags_list ); ?></p>
						<?php } ?>                    
				</div> <!-- .entry -->
			<?php if ( $crz_author == 'true' ):
            if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
            <div class="entry clearfix">                
                <div id="author-avatar">
                    <?php 
					$dir = get_template_directory_uri();
					$default_avatar = $dir . '/images/default_avatar.jpg';
					echo get_avatar( get_the_author_meta( 'user_email' ), $size='64', $default = $default_avatar ); ?>
                </div><!-- #author-avatar -->
                <div id="author-description">
                <h4><?php printf( esc_attr__( 'About %s', 'cruz' ), get_the_author() ); ?></h4>                    
                    <p><?php the_author_meta( 'description' ); ?></p>
                    <p class="small"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php printf( __( 'View all posts by %s &rarr;', 'cruz' ), get_the_author() ); ?></a></p>
                </div><!-- #author-description -->
            </div><!-- .entry author--><?php endif; //author description
            endif; // author bio display check
			if ( $crz_rp == 'true' )
			cruz_related_posts( $crz_rp_taxonomy, $crz_rp_style, $crz_rp_num );
			comments_template( '', true );?>                
	<?php endwhile; // end of the loop.
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