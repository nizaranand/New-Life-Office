<?php
/*
Template Name: Blog Page
*/

/* Fetch Theme Admin Options */
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
} 
if ($category) {
	if ( get_query_var('paged') ) {
		$paged = get_query_var('paged');
	} 
	elseif ( get_query_var('page') ) {
		$paged = get_query_var('page');
	} 
	else {
		$paged = 1;
	}
	$do_not_show_stickies = 1; // 0 to show stickies
	$args=array(
		'cat' => $category,
		'orderby' => 'date',
		'order' => 'desc',
		'paged' => $paged,
		'posts_per_page' => $post_per_page,
		'ignore_sticky_posts' => 1
	);
	$temp = $wp_query;  // Assign orginal query to temp variable for later use
	$wp_query = new WP_Query($args);
	if( have_posts() ) : 
		while ($wp_query->have_posts()) : $wp_query->the_post();
			$post_opts = get_post_meta( $post->ID, 'post_options', true );
			$img = (isset($post_opts['thumb'])) ? $post_opts['thumb'] : '' ;	
			?>
			<div id="post-<?php the_ID();?>" <?php post_class('entry clearfix'); ?> >
            <h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <div class="meta-box"><?php cruz_posted_in(); ?></div>
			<?php global $more; $more = 0; the_content( __( 'Read more &rarr;', 'cruz' ) ); ?>
            </div><!-- .entry -->
		<?php endwhile; // End the loop			
		if ( $wp_query->max_num_pages > 1 ) :?>
			<?php if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi();
            else {?>
                <div class="pagination">				
                    <div class="prev"><?php next_posts_link( __( '&larr; Older Posts', 'cruz' ) ) ?></div>
                    <div class="next"><?php previous_posts_link( __( 'Newer Posts &rarr;', 'cruz' ) ) ?></div>
                </div>			
            <?php }  
        endif;
        else : ?>
            <h2 class="entry-title"><?php _e( 'Not Found', 'cruz' ); ?></h2>
            <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'cruz' ); ?></p>
            <?php get_search_form();
		endif;
	$wp_query = $temp;  //reset back to original query
}  // if ($category) ?>
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
    }?>
    </div><!-- .primary_wrap --> 
</div><!-- .primary -->     
<?php get_footer(); ?>