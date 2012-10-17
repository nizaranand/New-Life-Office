<?php
/*
Template Name: port 4col wide
*/
/* A three columnar portfolio */

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
			$titles = (isset($page_opts['titles'])) ? $page_opts['titles'] : '' ;
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
				$counter = 1; 
				$thumbClass = '';
				$col = 4; ?>
				<ul class="port4">
					<?php while ($wp_query->have_posts()) : $wp_query->the_post();
                        $thumbClass = ($counter == $col) ? 'last' : '';
						$post_opts = get_post_meta( $post->ID, 'post_options', true );
						$img = (isset($post_opts['thumb'])) ? $post_opts['thumb'] : '';	
                        ?>
                        <li class="<?php echo $thumbClass; ?>">
                        <div class="port4_img foldify <?php if ( $titles ) echo ( ' title_off' ); ?>">
						<?php if ( $img ) { ?><a rel="prettyPhoto[group1]" href="<?php echo $img; ?>"><img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo $img; ?>&amp;w=204&amp;h=144&amp;zc=1&amp;q=100" alt="<?php the_title(); ?>"/></a><?php } ?> </div>
<?php if ( !$titles ) { ?>
                        <div class="port_content">
                            <a class="port_title" href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permanent link to %s', 'cruz' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></div> <?php } ?></li>
                        <?php $counter++; 
                        if($counter > $col){
                        $col = $col + 4; ?>
                        <li class="clear"></li>
                        <?php } ?> 
                    <?php endwhile; ?>
				</ul><!-- .port2 -->	
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
    } ?>			
	</div><!-- .content -->            
    </div><!-- .primary_wrap --> 
</div><!-- .primary -->     
<?php get_footer(); ?>