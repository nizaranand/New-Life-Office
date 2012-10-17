<?php
/* Footer Template */

/* Fetch admin options. */
global $options;
foreach ($options as $value) {
if(isset($value['id']) && isset ($value['std']))
if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] );}
}
$unique_secondarybar = '';
if ( is_page() ) {
	$page_opts = get_post_meta( $posts[0]->ID, 'page_options', true );
	$unique_secondarybar = (isset($page_opts['unique_secondarybar'])) ? $page_opts['unique_secondarybar']: '' ;		
	if ( ( $unique_secondarybar ) && ( is_active_sidebar( $posts[0]->ID.'-secondary-column-1' ) || is_active_sidebar( $posts[0]->ID.'-secondary-column-2' ) || is_active_sidebar( $posts[0]->ID.'-secondary-column-3' ) || is_active_sidebar( $posts[0]->ID.'-secondary-column-4' ) ) ) 
		$show_secondary = 'true'; 
	else 
		$show_secondary = 'false';
} // is page
if ( ( !($unique_secondarybar) ) && (  is_active_sidebar( 'secondary-column-1' ) || is_active_sidebar( 'secondary-column-2' ) || is_active_sidebar( 'secondary-column-3' ) || is_active_sidebar( 'secondary-column-4' ) ) )
	$show_secondary = 'true';

if ( $show_secondary == 'true' ): ?>
<div class="secondary">
    <div class="secondary_wrap">
        <div class="one_fourth">            
        <?php if ( $unique_secondarybar == 'true' ) {
        if ( is_active_sidebar( $posts[0]->ID.'-secondary-column-1' ) )
			dynamic_sidebar( $posts[0]->ID.'-secondary-column-1' ); 
        }
        else {
        if ( is_active_sidebar( 'secondary-column-1' ) )
			dynamic_sidebar( 'secondary-column-1' ); 					
        } ?>
        </div><!-- .one_fourth -->
        <div class="one_fourth">            
        <?php if ( $unique_secondarybar == 'true' ) {
            if ( is_active_sidebar( $posts[0]->ID.'-secondary-column-2' ) )
                dynamic_sidebar( $posts[0]->ID.'-secondary-column-2' ); 
        }
        else {
            if ( is_active_sidebar( 'secondary-column-2' ) )
                dynamic_sidebar( 'secondary-column-2' ); 					
        }
        ?>
        </div><!-- .one_fourth -->
        <div class="one_fourth">            
        <?php if ( $unique_secondarybar == 'true' ) {
            if ( is_active_sidebar( $posts[0]->ID.'-secondary-column-3' ) )
                dynamic_sidebar( $posts[0]->ID.'-secondary-column-3' ); 
        }
        else {
            if ( is_active_sidebar( 'secondary-column-3' ) )
                dynamic_sidebar( 'secondary-column-3' ); 					
        } ?>
        </div><!-- .one_fourth -->                    
        <div class="one_fourth last clearfix">
        <?php if ( $unique_secondarybar == 'true' )
        {
			if ( is_active_sidebar( $posts[0]->ID.'-secondary-column-4' ) )
				dynamic_sidebar( $posts[0]->ID.'-secondary-column-4' ); 
        }
        else {
			if ( is_active_sidebar( 'secondary-column-4' ) )
				dynamic_sidebar( 'secondary-column-4' ); 					
        } ?>
        </div><!-- .one_fourth last -->
    </div><!-- .secondary_wrap -->
</div><!-- .secondary -->
<?php endif; //show secondary ?> 
<div class="footer">
    <div class="footer_wrap clearfix">
        <div class="notes_left"><?php echo stripslashes($crz_footer_left); ?></div><!-- .notes_left -->
        <a class="top" href="#" title="<?php _e( 'Scroll to top', 'cruz' ); ?>"><?php _e( 'Top &uarr;', 'cruz' ); ?></a>
        <div class="notes_right"><?php echo stripslashes($crz_footer_right); ?></div><!-- .notes_right -->
    </div><!-- .footer_wrap -->
</div><!-- .footer -->
<?php wp_footer(); ?>
</body>
</html>