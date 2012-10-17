<?php
/* Search Template */

/* Fetch admin options. */
global $options;
foreach ($options as $value) {
if(isset($value['id']) && isset ($value['std']))
	if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] );}
}
get_header();
		if ( have_posts() ) : 
                get_template_part( 'loop', 'search' );
                else : ?>
                <div id="post-0" class="post no-results not-found">
                    <h2 class="entry-title"><?php _e( 'Nothing Found!', 'cruz' ); ?></h2>
                    <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'cruz' ); ?></p>
                    <?php get_search_form(); ?>
                </div><!-- .post -->
		<?php endif; ?>
	</div><!-- .content -->
    </div><!-- .primary_wrap --> 
</div><!-- .primary -->     
<?php get_footer(); ?>