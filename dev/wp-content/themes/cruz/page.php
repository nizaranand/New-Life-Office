<?php
/* Page Template */

/* Fetch admin options. */
global $options;
foreach ($options as $value) {
if(isset($value['id']) && isset ($value['std']))
	if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] );}
}
get_header(); ?>
		<?php if (have_posts()) :
		while (have_posts()) : the_post(); ?> 
				<?php the_content( __( 'More &rarr;', 'cruz' ) );
				wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'cruz' ), 'after' => '</div>' ) );
				edit_post_link( __( 'Edit this page', 'cruz' ), '<p class="small">', '</p>' );
                // Uncomment the line below if you wish to have comments on pages.
                // comments_template( '', true );
		endwhile;
		else : ?>
                <h2><?php _e( 'Not Found', 'cruz' ); ?></h2>
                <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'cruz' ); ?></p>
            <?php endif;?>
	</div><!-- .content -->
	<?php
	$sidebar_opts = '';
	if ( is_page() ) {
			$page_opts = get_post_meta( $post->ID, 'page_options', true );
            $sidebar_opts = (isset($page_opts['sidebar_opts'])) ? $page_opts['sidebar_opts'] : '';
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