<?php
/*
Template Name: port list style
*/
/* A list gallery with description */

/* Fetch admin options. */
global $options;
foreach ($options as $value) {
if(isset($value['id']) && isset ($value['std']))
	if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] );}
}
get_header();
		if (is_page() ) {
			$page_opts = get_post_meta( $post->ID, 'page_options', true );
            $category = $page_opts['category'];				
			$post_per_page = $page_opts['post_per_page'];	
			$post_per_page = empty($post_per_page) ? '6' : $post_per_page;
			if( have_posts() ) : ?>
			<?php while (have_posts()) : the_post();
					the_content ();
				endwhile; 
			endif;
		} //if is_page
		if ($category) {
		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}
			$do_not_show_stickies = 1; // 0 to show stickies
			$args=array(
				'cat' => $category,
				'orderby' => 'date',
				'order' => 'desc',
				'paged' => $paged,
				'posts_per_page' => $post_per_page,
				'ignore_sticky_posts' => $do_not_show_stickies
			);
			$temp = $wp_query;  // assign orginal query to temp variable for later use   
			$wp_query = new WP_Query($args); 
			if( have_posts() ) :
			$count = 1;
			?>
				<ul class="port_ls">
					<?php while ($wp_query->have_posts()) : $wp_query->the_post();
						$post_opts = get_post_meta( $post->ID, 'post_options', true );
						$img = (isset($post_opts['thumb'])) ? $post_opts['thumb'] : ''; ?>	
                        <li class="clearfix">
                        <div class="port_ls_img foldify">
                        <?php if ( $img ) { ?><a rel="prettyPhoto[group1]" href="<?php echo $img; ?>"><img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo $img; ?>&amp;w=280&amp;h=198&amp;zc=1&amp;q=100" alt="<?php the_title(); ?>"/></a><?php } ?>
                        </div>
                            <div class="port_ls_content">
                                <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permanent link to %s', 'cruz' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h2>                            
                                <p><?php echo short( get_the_excerpt(), 185 ); ?></p>
                                <p><a class="btn" href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permanent link to %s', 'cruz' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e( 'Read more &rarr;', 'cruz' ); ?></a></p>
                            </div> 
                        </li>					
					<?php endwhile; ?>
				</ul><!-- .port_ls -->
                <?php if ( $wp_query->max_num_pages > 1 ) :?>
                        <?php if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi();
                        else {?>
                            <div class="pagination">				
                                <div class="prev"><?php next_posts_link( __( '&larr; Older Posts', 'cruz' ) ) ?></div>
                                <div class="next"><?php previous_posts_link( __( 'Newer Posts &rarr;', 'cruz' ) ) ?></div>
                            </div>			
                        <?php } ?>   
                <?php endif;
			else : ?>
                <h2><?php _e( 'Not Found', 'cruz' ); ?></h2>
                <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'cruz' ); ?></p>
                <?php get_search_form(); ?>
        <?php endif;
        $wp_query = $temp;  //reset back to original query
    }  // if ($category)
?>			
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