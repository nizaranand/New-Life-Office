<?php
/* Author Archives Template */

/* Fetch Theme Admin Options */
global $options;
foreach ($options as $value) {
if(isset($value['id']) && isset ($value['std']))
if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] );}
}
get_header();?>
<?php
if (have_posts()) the_post();
	// If a user has filled out their description, show a bio on their entries.
	if ( get_the_author_meta( 'description' ) ) : ?>
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
			</div><!-- #author-description -->
		</div><!-- .entry author-->
	<?php endif; ?>
	<?php rewind_posts();
	get_template_part( 'loop', 'author' ); ?>
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